<?php
namespace App\Http\Services;

use App\Http\Repositories\BrandRepository;
use Illuminate\Support\Str;

class BrandService
{
    protected $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function getAll()
    {
        return $this->brandRepository->getAll();
    }

    public function getPaginate($perPage)
    {
        return $this->brandRepository->getPaginate($perPage);
    }

    public function create($data)
    {   
        $data['slug'] = Str::slug($data['name']);
        return $this->brandRepository->create($data);
    }

    public function findOrFail($id)
    {
        return $this->brandRepository->findOrFail($id);
    }

    public function update($id, $data)
    {
        $data['slug'] = Str::slug($data['name']);
        return $this->brandRepository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->brandRepository->delete($id);
    }
}