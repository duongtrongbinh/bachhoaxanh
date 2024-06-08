<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Services\BrandService;
use App\Http\Services\CategoryService;
use App\Http\Services\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    const PATH_VIEW = 'products.';
    protected $productService;
    protected $brandService;
    protected $categoryService;

    public function __construct(ProductService $productService, BrandService $brandService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->brandService = $brandService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $products = $this->productService->getAllWithRelations(['brands', 'categories']);

        return view(self::PATH_VIEW . __FUNCTION__, compact('products'));
    }

    public function create()
    {   
        $brands = $this->brandService->getAll();
        $categories = $this->categoryService->getAll();

        return view(self::PATH_VIEW . __FUNCTION__, compact('brands', 'categories'));
    }

    public function store(ProductCreateRequest $request)
    {
        $this->productService->create($request->validated());

        return redirect()
            ->route('products.index')
            ->with('status', 'Success');
    }

    public function show(Product $product)
    {
        $this->productService->findOrFail($product->id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('product'));
    }

    public function edit(Product $product)
    {   
        $product = $this->productService->getWithRelationId($product->id, ['brands', 'categories']);
        $brands = $this->brandService->getAll();
        $categories = $this->categoryService->getAll();

        return view(self::PATH_VIEW . __FUNCTION__, compact('product', 'brands', 'categories'));
    }

    public function update(ProductCreateRequest $request, Product $product)
    {
        $this->productService->update($product->id, $request->validated());

        return back()
            ->with('status', 'Success');
    }

    public function destroy(Product $product)
    {
        $this->productService->destroy($product->id);

        return back()->with(['status' => 'Success']);
    }
}
