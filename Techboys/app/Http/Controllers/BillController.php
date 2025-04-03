<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BillRequest;
use App\Models\AttributesValue;
use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Promotion;
use App\Models\User;
use App\Models\Status;
use App\Models\Voucher;
use Kjmtrue\VietnamZone\Models\Province;
use Kjmtrue\VietnamZone\Models\District;
use Kjmtrue\VietnamZone\Models\Ward;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    // public function index()
    // {
    //     $bills = Bill::orderByDesc('created_at')->paginate(10);
    //     return view('admin.bill.index', compact('bills'));
    // }
    public function index(Request $request)
    {
        $query = Bill::query();

        // Lọc theo trạng thái nếu có request
        if ($request->has('status')) {
            $query->where('status_id', $request->status);
        }

        $bills = $query->orderByDesc('created_at')->paginate(10);
        return view('admin.bill.index', compact('bills'));
    }

    public function create()
    {
        $users = User::whereNotNull('phone')->get();
        $products = Product::all();
        return view('admin.bill.create', compact('users', 'products'));
    }

    // Tạo mới một đơn hàng với việc lựa chọn sản phẩm và biến thể
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'variant_id' => 'nullable|exists:product_variants,id',  // Cho phép chọn biến thể nếu có
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
        ]);

        DB::beginTransaction();

        try {
            $bill = Bill::create([
                'user_id' => $request->user_id,
                'status_id' => 1,  // Trạng thái ban đầu là "Chờ xác nhận"
                'total' => $request->quantity * $request->price,
            ]);

            // Thêm chi tiết hóa đơn
            BillDetails::create([
                'bill_id' => $bill->id,
                'product_id' => $request->product_id,
                'variant_id' => $request->variant_id,  // Nếu có
                'quantity' => $request->quantity,
                'price' => $request->price,
            ]);

            // Nếu có biến thể, giảm số lượng stock
            if ($request->variant_id) {
                $variant = ProductVariant::findOrFail($request->variant_id);
                $variant->decrement('stock', $request->quantity);
            } else {
                $product = Product::findOrFail($request->product_id);
                $product->decrement('base_stock', $request->quantity);
            }

            DB::commit();
            return redirect()->route('admin.bill.index')->with('success', 'Đơn hàng đã được tạo thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.bill.index')->with('error', 'Có lỗi xảy ra khi tạo đơn hàng!');
        }
    }

    // Lấy thông tin chi tiết sản phẩm khi chọn
    public function getProductDetails(Request $request)
    {
        $productId = $request->input('product_id');
        $variantId = $request->input('variant_id');

        $product = Product::with('variants')->find($productId);

        if ($product) {
            $price = $product->base_price;
            if ($variantId) {
                $variant = ProductVariant::find($variantId);
                if ($variant) {
                    $price = $variant->price;
                }
            }
            return response()->json([
                'product_name' => $product->name,
                'price' => $price,
                'variants' => $product->variants->map(function ($variant) {
                    return [
                        'id' => $variant->id,
                        'name' => $variant->name,
                        'price' => $variant->price,
                    ];
                }),
            ]);
        }

        return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
    }

    // Cập nhật giỏ hàng khi người dùng thay đổi lựa chọn sản phẩm hoặc biến thể
    public function updateCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'variant_id' => 'nullable|exists:product_variants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);
        $variant = null;

        if ($request->variant_id) {
            $variant = ProductVariant::find($request->variant_id);
        }

        $price = $variant ? $variant->price : $product->base_price;
        $total = $price * $request->quantity;

        return response()->json([
            'product_name' => $product->name,
            'variant_name' => $variant ? $variant->name : null,
            'price' => $price,
            'total' => $total,
        ]);
    }

    // Tạo hóa đơn từ giỏ hàng đã chọn
    public function createBillFromCart(Request $request)
    {
        $cartItems = $request->input('cart_items'); // Một mảng các sản phẩm và biến thể được chọn từ giỏ hàng

        DB::beginTransaction();

        try {
            $bill = Bill::create([
                'user_id' => Auth::id(),
                'status_id' => 1,  // "Chờ xác nhận"
                'total' => 0,  // Tính sau
            ]);

            $total = 0;

            foreach ($cartItems as $item) {
                $price = $item['variant_id'] ? ProductVariant::find($item['variant_id'])->price : Product::find($item['product_id'])->base_price;
                $total += $price * $item['quantity'];

                BillDetails::create([
                    'bill_id' => $bill->id,
                    'product_id' => $item['product_id'],
                    'variant_id' => $item['variant_id'],
                    'quantity' => $item['quantity'],
                    'price' => $price,
                ]);

                // Cập nhật số lượng kho
                if ($item['variant_id']) {
                    ProductVariant::find($item['variant_id'])->decrement('stock', $item['quantity']);
                } else {
                    Product::find($item['product_id'])->decrement('base_stock', $item['quantity']);
                }
            }

            $bill->update(['total' => $total]);

            DB::commit();
            return redirect()->route('client.orders')->with('success', 'Đơn hàng đã được tạo thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('client.orders')->with('error', 'Có lỗi xảy ra khi tạo đơn hàng!');
        }
    }

    public function hide($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->deleted_at = now();
        $bill->save();
        return redirect()->route('admin.bill.index')->with('success', 'Hóa đơn đã được ẩn!');
    }

    public function restore($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->deleted_at = null;
        $bill->save();
        return redirect()->route('admin.bill.index')->with('success', 'Hóa đơn đã được khôi phục!');
    }

    public function download($id)
    {
        $bill = Bill::findOrFail($id);
        $billDetails = BillDetails::where('bill_id', $bill->id)->get();
        $productPromotions = Promotion::get();
        $attributeValues = AttributesValue::all()->keyBy('id');

        foreach ($billDetails as $detail) {
            $promotion = Promotion::where('product_id', $detail->product_id)->first();
            if ($promotion && now()->lt(Carbon::parse($promotion->end_date))) {
                $detail->discounted_price = $detail->price * (1 - $promotion->discount_percent / 100);
            } else {
                $detail->discounted_price = $detail->price;
            }

            if ($detail->variant_id) {
                $attributeJson = ProductVariant::where('id', $detail->variant_id)->value('attribute_values');
                $attributeArray = json_decode($attributeJson, true) ?? [];

                $attributeValuesList = collect($attributeArray)->map(function ($attrValueId) use ($attributeValues) {
                    return $attributeValues[$attrValueId]->value ?? 'Không xác định';
                })->toArray();

                $detail->attributes = implode(' ', $attributeValuesList);
            } else {
                $detail->attributes = '';
            }
        }

        $total = $billDetails->sum(function ($detail) {
            return $detail->quantity * $detail->discounted_price;
        });

        $pdf = Pdf::loadView('admin.bill.my_invoice', compact('bill', 'billDetails', 'productPromotions', 'total'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);

        $fileName = 'bill_' . $bill->order_id . '_' . $bill->created_at->format('Ymd') . '.pdf';
        // return view('admin.bill.my_invoice',compact('bill', 'billDetails', 'productPromotions', 'total'));
        return $pdf->download($fileName);
    }

    public function invoiceBill($id)
    {
        $bill = Bill::find($id);

        if (!$bill) {
            return redirect()->route('admin.bill.index')->with('error', 'Không tìm thấy hóa đơn!');
        }

        if ($bill->status_id != 1) {
            return redirect()->route('admin.bill.index')->with('error', 'Hoá đơn không hợp lệ để xuất!');
        }

        $billDetails = BillDetails::where('bill_id', $id)->get();

        try {
            DB::beginTransaction();

            $bill->update([
                'status_id' => 2,
            ]);

            foreach ($billDetails as $billDetail) {
                if ($billDetail->variant_id) {
                    // Trừ stock cho biến thể sản phẩm
                    $updated = ProductVariant::where('id', $billDetail->variant_id)
                        ->where('stock', '>=', $billDetail->quantity)
                        ->decrement('stock', $billDetail->quantity);

                    if (!$updated) {
                        DB::rollBack();
                        return redirect()->route('admin.bill.index')->with('error', 'Sản phẩm biến thể không đủ hàng!');
                    }
                } else {
                    // Trừ stock cho sản phẩm gốc
                    $updated = Product::where('id', $billDetail->product_id)
                        ->where('base_stock', '>=', $billDetail->quantity)
                        ->decrement('base_stock', $billDetail->quantity);

                    if (!$updated) {
                        DB::rollBack();
                        return redirect()->route('admin.bill.index')->with('error', 'Sản phẩm không đủ hàng!');
                    }
                }

                $product = Product::find($billDetail->product_id);
                if ($product) {
                    $product->increment('purchases', $billDetail->quantity);
                }
            }

            DB::commit();
            return redirect()->route('admin.bill.index')->with('success', 'Hoá đơn đã được xuất!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.bill.index')->with('error', 'Đã xảy ra lỗi khi xuất hoá đơn!');
        }
    }



    public function cancelBill(Request $request, $id)
    {
        $bill = Bill::find($id);

        if (!$bill) {
            return redirect()->route('admin.bill.index')->with('error', 'Không tìm thấy hóa đơn!');
        }

        // Kiểm tra chỉ cho phép hủy đơn nếu đang ở trạng thái "Chờ xác nhận"
        if ($bill->status_id != 1) {
            return redirect()->route('admin.bill.index')->with('error', 'Hoá đơn không hợp lệ để huỷ!');
        }

        try {
            DB::beginTransaction();

            // Lấy danh sách sản phẩm trong hóa đơn
            // $billDetails = BillDetails::where('bill_id', $id)->get();

            // foreach ($billDetails as $billDetail) {
            //     if ($billDetail->variant_id) {
            //         $variant = ProductVariant::find($billDetail->variant_id);
            //         if ($variant) {
            //             $variant->increment('stock', $billDetail->quantity);
            //         }
            //     } else {
            //         $product = Product::find($billDetail->product_id);
            //         if ($product) {
            //             $product->increment('base_stock', $billDetail->quantity);
            //         }
            //     }
            // }

            // Cập nhật trạng thái hóa đơn thành "Đã huỷ" (giả sử status_id = 0 là "Đã huỷ")
            $bill->update([
                'status_id' => 0,
                'note' => $request->note
            ]);

            DB::commit();

            return redirect()->route('admin.bill.index')->with('success', 'Hoá đơn đã được huỷ thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.bill.index')->with('error', 'Đã xảy ra lỗi khi huỷ hoá đơn!');
        }
    }
    public function confirm($id)
    {
        $bill = Bill::find($id);

        if (!$bill) {
            return redirect()->route('admin.bill.index')->with('error', 'Không tìm thấy hóa đơn!');
        }

        if ($bill->status_id != 2) {
            return redirect()->route('admin.bill.index')->with('error', 'Hoá đơn không hợp lệ!');
        }

        $billDetails = BillDetails::where('bill_id', $id)->get();

        try {
            DB::beginTransaction();

            $bill->update([
                'status_id' => 3,
            ]);

            DB::commit();
            return redirect()->route('admin.bill.index')->with('success', 'Hoá đơn đã được giao thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.bill.index')->with('error', 'Đã xảy ra lỗi khi xác nhận!');
        }
    }


    //client
    public function indexClient()
    {
        $loadAll = Bill::with(['billDetails.product', 'billDetails.variant'])
            ->where('user_id', Auth::id())
            ->get();

        foreach ($loadAll as $bill) {
            foreach ($bill->billDetails as $detail) {
                if ($detail->variant_id) {
                    $attributeJson = ProductVariant::where('id', $detail->variant_id)->value('attribute_values');
                    $attributeArray = json_decode($attributeJson, true) ?? [];
                    $detail->attributes = implode(', ', AttributesValue::whereIn('id', $attributeArray)->pluck('value')->toArray());
                }
            }
        }

        return view('client.order.order', compact('loadAll'));
    }

    public function searchOrder(Request $request)
    {
        $orderId = $request->input('order_id');
        $phone = $request->input('phone');

        $query = Bill::with(['billDetails.product', 'billDetails.variant'])->where('order_id', $orderId);

        // If the user is not logged in, validate the phone number
        if (!Auth::check()) {
            $query->where('phone', $phone);
        }

        $searchedOrder = $query->first();

        if ($searchedOrder) {
            foreach ($searchedOrder->billDetails as $detail) {
                if ($detail->variant_id) {
                    $attributeJson = ProductVariant::where('id', $detail->variant_id)->value('attribute_values');
                    $attributeArray = json_decode($attributeJson, true) ?? [];
                    $detail->attributes = implode(', ', AttributesValue::whereIn('id', $attributeArray)->pluck('value')->toArray());
                }
            }
        } else {
            return redirect()->route('client.orders')->with('error', 'Mã hóa đơn hoặc số điện thoại không chính xác!');
        }

        $loadAll = Auth::check() ? Bill::with(['billDetails.product', 'billDetails.variant'])
            ->where('user_id', Auth::id())
            ->get() : [];

        return view('client.order.order', compact('searchedOrder', 'loadAll'));
    }


    public function CancelOrder(Request $request)
    {
        $order = Bill::with('billDetails.product')->where('id', $request->input('order_id'))->first();



        return view('client.order.CancelOrder', compact('order'));
    }

    public function submitCancelOrder(Request $request, $id)
    {
        $request->validate([
            'cancel_reason' => 'required|string|max:255',
        ], [
            'cancel_reason.required' => 'Lý do hủy đơn không được để trống.',
            'cancel_reason.max' => 'Lý do hủy đơn không được vượt quá 255 ký tự.',
        ]);

        $bill = Bill::find($id);
        if ($bill->status_id != 1) {
            return redirect()->route('client.orders')->with('error', 'Hoá đơn không hợp lệ để xác nhận!');
        }
        try {
            DB::beginTransaction();
            $bill->update([
                'status_id' => 0,
                'note' => $request->cancel_reason,
            ]);
            DB::commit();
            return redirect()->route('client.orders')->with('success', 'Đơn hàng đã được hủy thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('client.orders')->with('error', 'Đã xảy ra lỗi khi hủy đơn hàng!');
        }
    }

    public function confirmClient(Request $request, $id)
    {
        $bill = Bill::find($id);

        if (!$bill) {
            return redirect()->route('client.orders')->with('error', 'Không tìm thấy đơn hàng!');
        }

        if ($bill->status_id != 3) {
            return redirect()->route('client.orders')->with('error', 'Hoá đơn không hợp lệ để xác nhận!');
        }

        try {
            DB::beginTransaction();

            $bill->update([
                'status_id' => 4,
            ]);

            DB::commit();
            return redirect()->route('client.orders')->with('success', 'Đơn hàng đã được xác nhận thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('client.orders')->with('error', 'Đã xảy ra lỗi khi xác nhận đơn hàng!');
        }
    }
    public function detailClient(Request $request)
    {
        $orderId = $request->query('order_id');
        $order = Bill::with('user')->find($orderId);

        if (!$order) {
            return redirect()->route('client.orders')->with('error', 'Không tìm thấy đơn hàng!');
        }

        $provinces = Province::all();
        $districts = District::where('province_id', $order->province_id)->get();
        $wards = Ward::where('district_id', $order->district_id)->get();
        $payment_method = $order->payment_method;

        return view('client.order.detail', compact('order', 'provinces', 'districts', 'wards', 'payment_method'));
    }
}
