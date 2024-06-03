<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryService;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request): JsonResponse
    {
        $categories = $this->categoryService->getPaginate($request->validated());
        return $this->responseOk($categories);
    }

    public function list()
    {
        return $this->responseOk($this->categoryService->getAll());
    }

    public function store(Request $request): JsonResponse
    {
        $author = $this->categoryService->create($request->validated());
        return $this->responseOk($author);
    }

    public function show(Category $category): JsonResponse
    {
        return $this->responseOk($category);
    }

    public function update(Request $request, Category $category): JsonResponse
    {
        $category = $this->categoryService->update($category->id, $request->validated());
        return $this->responseOk($category);
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->categoryService->destroy($request->id);
        return $this->responseOk($result);
    }

    public function restore(Request $request): JsonResponse
    {
        $result = $this->categoryService->restore($request->id);
        return $this->responseOk($result);
    }
}