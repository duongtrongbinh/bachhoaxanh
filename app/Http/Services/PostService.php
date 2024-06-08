<?php
namespace App\Http\Services;
use App\Http\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
class PostService
{
    protected $PostRepository;
    public function __construct(PostRepository $postRepository)
    {
        $this->PostRepository = $postRepository;
    }
    public function getPaginate(array $params): LengthAwarePaginator|Collection
    {
        return $this->PostRepository->getPaginate($params);
    }
    public function getAll()
    {
        return $this->PostRepository->getAll();
    }
    public function create(array $data): Model
    {
        if (isset($data['image'])) {
            $imagePath = $this->uploadAvatar($data['image']);
            $data['image_path'] = $imagePath;
        }

        $post = $this->PostRepository->create($data);

        return $post;
    }

    public function update(int $id, array $data): Model
    {
        return $this->PostRepository->update($id, $data);
    }
    protected function uploadAvatar(UploadedFile $image): string
    {
        $imagePath = $image->store('image', 'public');

        return $imagePath;
    }
    public function destroy($id)
    {
        return $this->PostRepository->destroy($id);
    }
}
