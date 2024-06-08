<?php

namespace App\Http\Services;

use App\Http\Repositories\TagRepository;
use Illuminate\Support\Str;

class TagService
{
    protected $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function getAll()
    {
        return $this->tagRepository->getAll();
    }

    public function getPaginate($perPage)
    {
        return $this->tagRepository->getPaginate($perPage);
    }

    public function create($data)
    {   
        $data['slug'] = Str::slug($data['name']);
        return $this->tagRepository->create($data);
    }

    public function findOrFail($id)
    {
        return $this->tagRepository->findOrFail($id);
    }

    public function update($id, $data)
    {
        $data['slug'] = Str::slug($data['name']);
        return $this->tagRepository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->tagRepository->delete($id);
    }
}