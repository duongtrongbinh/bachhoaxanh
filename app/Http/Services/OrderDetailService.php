<?php


namespace App\Http\Services;

use App\Http\Repositories\OrderDetailRepository;
use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;


class OrderDetailService
{
    protected $orderDetailRepository;

    public function __construct(OrderDetailRepository $orderDetailRepository)
    {
        $this->orderDetailRepository = $orderDetailRepository;
    }
    public function getPaginate( string $id)
    {
        return $this->orderDetailRepository->PaginateIndex($this->orderDetailRepository->getAllOrderDetail($id),Constants::DEFAULT_PER_PAGE);
    }

    public function getAll()
    {
        return $this->orderDetailRepository->getAll();
    }

    public function create(array $data): Model
    {
        return $this->orderDetailRepository->create($data);
    }

    public function update(int $id, array $data): Model
    {
        return $this->orderDetailRepository->update($id, $data);
    }

    public function findOrFail(int $id): Model|null
    {
        return $this->orderDetailRepository->findOrFail($id);
    }

    public function destroy(int|array $id): int
    {
        return $this->orderDetailRepository->destroy($id);
    }

    public function restore(int|array $id): bool
    {
        return $this->orderDetailRepository->restore($id);
    }

    public function deletedSoft($id)
    {
        return $this->orderDetailRepository->statusChange($id);
    }
}
