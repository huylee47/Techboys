<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
// use App\Models\Color;
use App\Models\Product;
// use App\Models\ProductModel;
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
        // dd($request->all());

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
    public function edit($id)
    {
        return $this->productService->editProduct($id);
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
    public function stock($productId){
        return $this->productService->getStockByProductId($productId);
    }
    public function updateStock(Request $request, $productId){
        // dd($request->all());
        return $this->productService->updateStock($request,$productId);
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


    public function search(Request $request)
    {
        $keyword = trim($request->input('s'));

        if (!$keyword) {
            return redirect()->route('client.product.index')->with('error', 'Vui lòng nhập từ khóa tìm kiếm.');
        }

        // Nếu là AJAX request (dropdown tìm kiếm)
        if ($request->ajax()) {
            $products = Product::where('name', 'LIKE', "%{$keyword}%")->limit(5)->get();
            return response()->json($products);
        }

        // Nếu là tìm kiếm bằng nút "Tìm kiếm", hiển thị trang search.blade.php
        $products = Product::where('name', 'LIKE', "%{$keyword}%")->paginate(12);
        $brands = Brand::all();
        

        return view('client.product.search', compact('products', 'keyword', 'brands', 'models'));
    }

    public function filter(Request $request)
    {
        $brands = Brand::all();
        

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
