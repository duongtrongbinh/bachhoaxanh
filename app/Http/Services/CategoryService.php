<?php

namespace App\Http\Services;

use App\Http\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getPaginate(array $params): LengthAwarePaginator|Collection
    {
        return $this->categoryRepository->getPaginate($params);
    }

    public function getAll(){
        return $this->categoryRepository->getAll();
    }

    public function create(array $data): Model
    {
        $data['slug'] = str()->slug($data['name']);
        return $this->categoryRepository->create($data);
    }

    public function update(int $id, array $data): Model
    {
        return $this->categoryRepository->update($id, $data);
    }

    public function findOrFail(int $id): Model|null
    {
        return $this->categoryRepository->findOrFail($id);
    }

    public function destroy(int|array $id): int
    {
        return $this->categoryRepository->destroy($id);
    }

    public function restore(int|array $id): bool
    {
        return $this->categoryRepository->restore($id);
    }
}