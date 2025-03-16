<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductModel;
use App\Models\ProductCategory;
use App\Service\PhotoService;
use Illuminate\Http\Request;
use App\Service\ProductService;


class ProductController extends Controller
{
    private $productService;
    private $photoService;
    public function __construct(ProductService $productService, PhotoService $photoService)
    {
        $this->productService = $productService;
        $this->photoService = $photoService;
    }
    // ADMIN CTRL
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->productService->createProduct();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        return $this->productService->storeProduct($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        return $this->productService->editProduct($request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id)
    {
        return $this->productService->updateProduct($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->productService->destroyProduct($request);
    }
    public function hide($request)
    {
        return $this->productService->hide($request);
    }
    public function restore($request)
    {
        return $this->productService->restore($request);
    }
    public function imageIndex($request)
    {
        return $this->productService->imageIndex($request);
    }
    public function imageStore(Request $request, $productId)
    {
        try {
            $this->photoService->addPhoto($request, $productId);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Lỗi trong quá trình lưu ảnh');
        }

        return redirect()->route('admin.product.imageIndex', $productId)->with('success', 'Ảnh được thêm thành công!');
    }
    public function imageDestroy($projectId, $id)
    {
        try {
            $this->photoService->deletePhoto($id);
        } catch (\Throwable $th) {
            return redirect()->route('admin.product.imageIndex', $projectId)->with('error', 'Đã xảy ra lỗi khi xóa tất cả ảnh.');
        }

        return redirect()->route('admin.product.imageIndex', $projectId)->with('success', 'Ảnh đã được xóa thành công.');
    }

    // CLIENT 
    public function productDetails($request)
    {
        return $this->productService->getProductBySlug($request);
    }

    public function productList(Request $request)
    {
        // Lấy danh sách thương hiệu và model
        $brands = Brand::all();
        $models = ProductModel::all();

        // Tạo query sản phẩm
        $query = Product::query();

        if ($request->has('brand_id') && !empty($request->brand_id)) {
            $query->whereIn('brand_id', $request->brand_id);
        }

        if ($request->has('model_id') && !empty($request->model_id)) {
            $query->whereIn('model_id', $request->model_id);
        }

        // Phân trang sản phẩm
        $products = $query->paginate(21);

        // Trả về view chính
        return view('client.product.list', compact('products', 'brands', 'models'));
    }

    // public function search(Request $request)
    // {
    //     // Lấy từ khóa tìm kiếm đúng theo input của form
    //     $keyword = trim($request->input('s')); // Thay đổi 'keyword' thành 's' cho đúng form

    //     // Nếu không có từ khóa, trả về tất cả sản phẩm
    //     if (!$keyword) {
    //         return redirect()->route('client.product.list')->with('error', 'Vui lòng nhập từ khóa tìm kiếm.');
    //     }

    //     // Chỉ tìm kiếm theo tên sản phẩm
    //     $products = Product::where('name', 'LIKE', "%{$keyword}%")->paginate(12);

    //     // Lấy danh sách thương hiệu và model để hiển thị bộ lọc
    //     $brands = Brand::all();
    //     $models = ProductModel::all();

    //     return view('client.product.search', compact('products', 'keyword', 'brands', 'models'));
    // }

    // public function search(Request $request)
    // {
    //     $keyword = trim($request->input('s'));

    //     if (!$keyword) {
    //         return response()->json('<p class="text-muted p-2">Không có sản phẩm gợi ý...</p>');
    //     }

    //     // Tìm kiếm sản phẩm không phân biệt hoa/thường
    //     $products = Product::where('name', 'LIKE', "%{$keyword}%")
    //         ->limit(10) // Giới hạn số lượng gợi ý
    //         ->get();

    //     if ($products->isEmpty()) {
    //         return response()->json('<p class="text-muted p-2">Không tìm thấy sản phẩm...</p>');
    //     }

    //     // Tạo HTML cho dropdown sản phẩm
    //     $html = '<ul class="list-group">';
    //     foreach ($products as $product) {
    //         $html .= '<li class="list-group-item">
    //                 <a href="' . route('client.product.show', ['slug' => $product->slug]) . '" class="d-flex align-items-center">
    //                     <img src="' . url('') . '/admin/assets/images/product/' . $product->img . '" class="me-2" style="width: 50px; height: 50px; object-fit: cover;">
    //                     <span>' . $product->name . '</span>
    //                 </a>
    //               </li>';
    //     }
    //     $html .= '</ul>';

    //     return response()->json($html);
    // }

    public function search(Request $request)
    {
        $keyword = trim($request->input('s'));

        if ($request->ajax()) {
            // Nếu là AJAX thì trả về danh sách sản phẩm gợi ý
            if (!$keyword) {
                return response()->json('<p class="text-muted p-2">Không có sản phẩm gợi ý...</p>');
            }

            $products = Product::where('name', 'LIKE', "%{$keyword}%")->limit(10)->get();

            if ($products->isEmpty()) {
                return response()->json('<p class="text-muted p-2">Không tìm thấy sản phẩm...</p>');
            }

            $html = '<ul class="list-group">';
            foreach ($products as $product) {
                $html .= '<li class="list-group-item">
                        <a href="' . route('client.product.show', ['slug' => $product->slug]) . '" class="d-flex align-items-center">
                            <img src="' . url('') . '/admin/assets/images/product/' . $product->img . '" class="me-2" style="width: 50px; height: 50px; object-fit: cover;">
                            <span>' . $product->name . '</span>
                        </a>
                      </li>';
            }
            $html .= '</ul>';

            return response()->json($html);
        }

        // Nếu không phải AJAX => Chuyển hướng đến trang tìm kiếm
        return redirect()->route('client.product.index', ['s' => $keyword]);
    }


    public function filter(Request $request)
    {
        $brands = Brand::all();
        $models = ProductModel::all();

        $query = Product::query();

        if ($request->has('brand_id')) {
            $query->whereIn('brand_id', $request->brand_id);
        }

        if ($request->has('model_id') && !empty($request->model_id)) {
            $query->whereHas('variant', function ($q) use ($request) {
                $q->whereIn('model_id', $request->model_id);
            });
        }

        $products = $query->paginate(21)->appends($request->query());

        return view('client.product.list', compact('products', 'brands', 'models'));
    }
}
