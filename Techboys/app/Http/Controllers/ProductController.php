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
        $brandIds = $request->brand_id;
        $modelIds = $request->model_id;

        // Xây dựng truy vấn cơ bản
        $query = Product::query();

        if ($brandIds) {
            $query->whereIn('brand_id', $brandIds);
        }

        if ($modelIds) {
            $query->whereIn('model_id', $modelIds);
        }

        // Lấy sản phẩm với phân trang
        $products = $query->paginate(21);

        // Lấy các dữ liệu cần thiết cho bộ lọc
        $brands = Brand::all();
        $models = ProductModel::all();

        // Kiểm tra xem có phải là yêu cầu AJAX không
        if ($request->ajax()) {
            return response()->json([
                'products' => view('client.product.list', compact('products', 'brands', 'models'))->render(),
                'pagination' => $products->links()->render(),
            ]);
        }

        // Nếu không phải là yêu cầu AJAX, trả về view bình     
        return view('client.product.list', compact('products', 'brands', 'models'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = Product::where('name', 'LIKE', "%{$keyword}%")
            ->orWhere('description', 'LIKE', "%{$keyword}%")
            ->orWhereHas('category', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            })
            ->paginate(12);

        return view('client.product.search', compact('products', 'keyword'));
    }
}
