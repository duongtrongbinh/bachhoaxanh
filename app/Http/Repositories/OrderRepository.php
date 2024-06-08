<?php
namespace App\Http\Repositories;
use App\Models\Order;

class OrderRepository extends Repository
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
