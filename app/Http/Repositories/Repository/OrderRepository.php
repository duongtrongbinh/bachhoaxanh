<?php
namespace App\Http\Repositories\Repository;
use App\Http\Repositories\BaseRepository;
use App\Models\Order;

class OrderRepository extends BaseRepository
{
    public function getModel()
    {
        return Order::class;
    }
    public function getAllOrder()
    {
        return Order::OrderByDesc('created_at');
    }
}
