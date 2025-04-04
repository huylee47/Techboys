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
    public function stock($productId)
    {
        return $this->productService->getStockByProductId($productId);
    }
    public function updateStock(Request $request, $productId)
    {
        // dd($request->all());
        return $this->productService->updateStock($request, $productId);
    }
    // CLIENT 
    public function productDetails($request)
    {
        return $this->productService->getProductBySlug($request);
    }

    public function productList(Request $request)
    {
        $brands = Brand::all();


        // Tạo query sản phẩm
        $query = Product::query();

        if ($request->has('brand_id') && !empty($request->brand_id)) {
            $query->whereIn('brand_id', $request->brand_id);
        }
        $categoryId = $query->get('category_id')->value('category_id');
        // dd($categoryId);
        // Phân trang sản phẩm
        $products = $query->paginate(21);

        return view('client.product.list', compact('products', 'brands', 'categoryId'));
    }


    public function search(Request $request)
    {
        $keyword = trim($request->input('s'));
        $query = Product::where('name', 'LIKE', "%{$keyword}%");
        if (!$keyword) {
            return redirect()->route('client.product.index')->with('error', 'Vui lòng nhập từ khóa tìm kiếm.');
        }
        if ($request->has('categoryId') && !empty($request->categoryId)) {
            $query->where('category_id', $request->categoryId);
        }
        if ($request->ajax()) {
            $products = Product::where('name', 'LIKE', "%{$keyword}%")->limit(5)->get();
            return response()->json($products);
        }

        $products = Product::where('name', 'LIKE', "%{$keyword}%")->paginate(12);
        $brands = Brand::all();
        $categoryId = $request->get('categoryId');

        return view('client.product.search', compact('products', 'keyword', 'brands', 'categoryId', 'keyword'));
    }

    public function filter(Request $request)
    {
        $brands = Brand::all();

        $query = Product::query()->with(['promotion', 'variant']);

        if ($request->has('brand_id')) {
            $query->whereIn('brand_id', $request->brand_id);
        }

        if ($request->has('price_range') && !empty($request->price_range)) {
            $query->where(function ($q) use ($request) {
                foreach ($request->price_range as $range) {
                    list($minPrice, $maxPrice) = explode('-', $range);

                    $q->orWhere(function ($subQuery) use ($minPrice, $maxPrice) {
                        // Lọc sản phẩm có biến thể
                        $subQuery->whereHas('variant', function ($q2) use ($minPrice, $maxPrice) {
                            $q2->whereRaw('price * (1 - COALESCE((SELECT discount_percent FROM promotions WHERE promotions.product_id = product_variants.product_id AND promotions.end_date >= NOW() LIMIT 1) / 100, 0)) BETWEEN ? AND ?', [(int) $minPrice, (int) $maxPrice]);
                        })
                            // Lọc sản phẩm không có biến thể (dùng base_price)
                            ->orWhereRaw('base_price * (1 - COALESCE((SELECT discount_percent FROM promotions WHERE promotions.product_id = products.id AND promotions.end_date >= NOW() LIMIT 1) / 100, 0)) BETWEEN ? AND ?', [(int) $minPrice, (int) $maxPrice]);
                    });
                }
            });
        }

        $products = $query->paginate(21)->appends($request->query());

        $categoryId = $request->get('categoryId');

        // return response()->json([
        //     'products' => $products,
        //     'brands' => $brands,
        //     'categoryId' => $categoryId,
        // ]);
        return view('client.product.list', compact('products', 'brands', 'categoryId'));
    }

    public function filterSearch(Request $request)
    {
        // dd($request->all());
        $keyword = $request->keyword;
        // dd($keyword);
        if (!$keyword) {
            return redirect()->route('client.product.index')->with('error', 'Vui lòng nhập từ khóa tìm kiếm.');
        }

        $brands = Brand::all();
        $query = Product::query()->with(['promotion', 'variant'])
            ->where('name', 'LIKE', "%{$keyword}%");

        if ($request->has('categoryId') && !empty($request->categoryId)) {
            $query->where('category_id', $request->categoryId);
        }

        if ($request->has('brand_id')) {
            $query->whereIn('brand_id', $request->brand_id);
        }

        if ($request->has('price_range') && !empty($request->price_range)) {
            $query->where(function ($q) use ($request) {
                foreach ($request->price_range as $range) {
                    list($minPrice, $maxPrice) = explode('-', $range);

                    $q->orWhere(function ($subQuery) use ($minPrice, $maxPrice) {
                        $subQuery->whereHas('variant', function ($q2) use ($minPrice, $maxPrice) {
                            $q2->whereRaw('price * (1 - COALESCE((SELECT discount_percent FROM promotions WHERE promotions.product_id = product_variants.product_id AND promotions.end_date >= NOW() LIMIT 1) / 100, 0)) BETWEEN ? AND ?', [(int) $minPrice, (int) $maxPrice]);
                        })
                            ->orWhereRaw('base_price * (1 - COALESCE((SELECT discount_percent FROM promotions WHERE promotions.product_id = products.id AND promotions.end_date >= NOW() LIMIT 1) / 100, 0)) BETWEEN ? AND ?', [(int) $minPrice, (int) $maxPrice]);
                    });
                }
            });
        }

        $products = $query->paginate(21)->appends($request->query());

        return view('client.product.search', compact('products', 'brands', 'keyword'));
    }




    public function ListProductByCategoryId($categoryId)
    {
        $brands = Brand::all();
        $categoryId = ProductCategory::where('id', $categoryId)->value('id');
        // dd($categoryId);
        $products = Product::where('category_id', $categoryId)->paginate(21);
        return view('client.product.list', compact('products', 'brands', 'categoryId'));
    }
}
