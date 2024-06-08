<?php

namespace App\Http\Services;

use App\Http\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    public function getPaginate($perPage)
    {
        return $this->categoryRepository->getPaginate($perPage);
    }

    public function create($data)
    {   
        return $this->categoryRepository->create($data);
    }

    public function findOrFail($id)
    {
        return $this->categoryRepository->findOrFail($id);
    }

    public function update($id, $data)
    {
        return $this->categoryRepository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->categoryRepository->delete($id);
    }
}