<?php
namespace App\Http\Repositories\Repository;
use App\Http\Repositories\BaseRepository;
use App\Models\Voucher;
class VoucherRepository extends BaseRepository
{
    public function getModel()
    {
        return Voucher::class;
    }
    public function getAllVoucher()
    {
        return Voucher::OrderByDesc('created_at');
    }
}
