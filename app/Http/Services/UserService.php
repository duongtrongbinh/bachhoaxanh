<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    // phân trang
    public function getPaginate(array $params): LengthAwarePaginator|Collection
    {
        return $this->userRepository->getPaginate($params);
    }
    // list danh sach
    public function getAll()
    {
        return $this->userRepository->getAll();
    }
    // create
    public function create(array $data): Model
    {
        if ($data['avatar']) {
            $data['avatar'] = $this->uploadImage($data['avatar']);
        }
        $user = $this->userRepository->create($data);
        return $user;
    }

    protected function uploadImage($image): string
    {
        $imagePath = Storage::disk('public')->put('image', $image);

        return $imagePath;
    }
    public function update(int $id, array $data): Model
    {
        return $this->userRepository->update($id, $data);
    }
    public function destroy($id)
    {
        return $this->userRepository->destroy($id);
    }
}
