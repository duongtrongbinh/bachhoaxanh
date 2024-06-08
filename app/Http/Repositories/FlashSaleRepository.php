<?php
namespace App\Http\Repositories;
use App\Models\FlashSale;

class FlashSaleRepository extends Repository
{
    public function getModel()
    {
        return FlashSale::class;
    }

    public function getAllFlashSale()
    {
       return FlashSale::OrderByDesc('created_at');
    }
}
