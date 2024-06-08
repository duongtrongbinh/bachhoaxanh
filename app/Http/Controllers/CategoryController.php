<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryBannerCreateRequest;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Services\CategoryBannerService;
use App\Http\Services\CategoryService;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryBanner;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    const PATH_VIEW = 'dashboard.categories.';
    protected $categoryService;
    protected $categoryBannerService;

    public function __construct(CategoryService $categoryService, CategoryBannerService $categoryBannerService)
    {
        $this->categoryService = $categoryService;
        $this->categoryBannerService = $categoryBannerService;
    }

    public function index()
    {
        $categories = $this->categoryService->getPaginate(5);

        return view(self::PATH_VIEW . __FUNCTION__, compact('categories'));
    }

    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    public function store(CategoryCreateRequest $requestCategory)
    {
        $this->categoryService->create($requestCategory->validated());

        return redirect()
            ->route('categories.index')
            ->with('status', 'Success');
    }

    public function show(Category $category)
    {
        $this->categoryService->findOrFail($category->id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('category'));
    }

    public function edit(Category $category)
    {
        $this->categoryService->findOrFail($category->id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('category'));
    }

    public function update(CategoryCreateRequest $request, Category $category)
    {
        $this->categoryService->update($category->id, $request->validated());

        return back()
            ->with('status', 'Success');
    }

    public function destroy(Category $category)
    {
        $this->categoryService->destroy($category->id);

        return back()->with(['status' => 'Success']);
    }
}