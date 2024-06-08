<?php
namespace App\Http\Services;
use App\Http\Repositories\CommentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
class CommentService
{
  protected $CommentRepository;
  public function __construct(CommentRepository $CommentRepository)
  {
      $this->CommentRepository = $CommentRepository;
  }
    // phân trang
    public function getPaginate(array $params): LengthAwarePaginator|Collection
    {
        return $this->CommentRepository->getPaginate($params);
    }
    public function getAll()
    {
        return $this->CommentRepository->getAll();
    }
    public function destroy($id)
    {
        return $this->CommentRepository->destroy($id);
    }
}
