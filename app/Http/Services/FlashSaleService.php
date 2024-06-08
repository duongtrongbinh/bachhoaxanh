<?php


namespace App\Http\Services;

use App\Http\Repositories\FlashSaleRepository;
use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;


class FlashSaleService
{
    protected $flashSaleRepository;

    public function __construct(FlashSaleRepository $flashSaleRepository)
    {
        $this->flashSaleRepository = $flashSaleRepository;
    }
    public function getPaginate()
    {
        return $this->flashSaleRepository->PaginateIndex($this->flashSaleRepository->getAllFlashSale(),Constants::DEFAULT_PER_PAGE);
    }

    public function getAll()
    {
        return $this->flashSaleRepository->getAll();
    }

    public function create(array $data): Model
    {
        return $this->flashSaleRepository->create($data);
    }

    public function update(int $id, array $data): Model
    {
        return $this->flashSaleRepository->update($id, $data);
    }

    public function findOrFail(int $id): Model|null
    {
        return $this->flashSaleRepository->findOrFail($id);
    }

    public function destroy(int|array $id): int
    {
        return $this->flashSaleRepository->destroy($id);
    }

    public function restore(int|array $id): bool
    {
        return $this->flashSaleRepository->restore($id);
    }

    public function deletedSoft($id)
    {
        return $this->flashSaleRepository->statusChange($id);
    }
}
