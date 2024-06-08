<?php

namespace App\Http\Services;

use App\Http\Repositories\CategoryBannerRepository;

class CategoryBannerService
{
    protected $categoryBannerRepository;

    public function __construct(CategoryBannerRepository $categoryBannerRepository)
    {
        $this->categoryBannerRepository = $categoryBannerRepository;
    }

    public function getAll()
    {
        return $this->categoryBannerRepository->getAll();
    }

    public function getPaginate($perPage)
    {
        return $this->categoryBannerRepository->getPaginate($perPage);
    }

    public function create($data)
    {   
        return $this->categoryBannerRepository->create($data);
    }

    public function findOrFail($id)
    {
        return $this->categoryBannerRepository->findOrFail($id);
    }

    public function update($id, $data)
    {
        return $this->categoryBannerRepository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->categoryBannerRepository->delete($id);
    }
}