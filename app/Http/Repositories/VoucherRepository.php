<?php
namespace App\Http\Repositories;
use App\Models\Voucher;

class VoucherRepository extends Repository
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
