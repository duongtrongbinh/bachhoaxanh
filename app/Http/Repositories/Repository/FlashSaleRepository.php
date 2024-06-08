<?php
namespace App\Http\Repositories\Repository;
use App\Http\Repositories\BaseRepository;
use App\Models\FlashSale;

class FlashSaleRepository extends BaseRepository
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
