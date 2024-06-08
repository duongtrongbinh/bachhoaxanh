<?php

namespace App\Http\Services;
use App\Http\Repositories\VoucherRepository;
use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;


class VoucherService
{
    protected $voucherRepository;

    public function __construct(VoucherRepository $voucherRepository)
    {
        $this->voucherRepository = $voucherRepository;
    }
    public function getPaginate()
    {
       return $this->voucherRepository->PaginateIndex($this->voucherRepository->getAllVoucher(),Constants::DEFAULT_PER_PAGE);
    }

    public function getAll(){
        return $this->voucherRepository->getAll();
    }

    public function create(array $data): Model
    {
        return $this->voucherRepository->create($data);
    }

    public function update(int $id, array $data): Model
    {
        return $this->voucherRepository->update($id, $data);
    }

    public function findOrFail(int $id): Model|null
    {
        return $this->voucherRepository->findOrFail($id);
    }

    public function destroy(int|array $id): int
    {
        return $this->voucherRepository->destroy($id);
    }

    public function restore(int|array $id): bool
    {
        return $this->voucherRepository->restore($id);
    }

    public function deletedSoft($id)
    {
        return $this->voucherRepository->statusChange($id);
    }
}
