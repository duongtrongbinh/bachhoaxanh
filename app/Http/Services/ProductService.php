<?php
namespace App\Http\Services;

use App\Http\Repositories\ProductRepository;
use Illuminate\Support\Str;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function getAllWithRelations($relations)
    {
        return $this->productRepository->getAllWithRelations($relations);
    }

    public function getWithRelationId($id, $relations)
    {
        return $this->productRepository->getWithRelationId($id, $relations);
    }

    public function getPaginate($perPage)
    {
        return $this->productRepository->getPaginate($perPage);
    }

    public function create($data)
    {   
        $data['slug'] = Str::slug($data['name']);
        return $this->productRepository->create($data);
    }

    public function findOrFail($id)
    {
        return $this->productRepository->findOrFail($id);
    }

    public function update($id, $data)
    {
        $data['slug'] = Str::slug($data['name']);
        return $this->productRepository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->productRepository->delete($id);
    }
}