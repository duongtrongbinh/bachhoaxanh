<?php
namespace App\Http\Repositories;
use App\Models\OrderDetail;

class OrderDetailRepository extends Repository
{
    public function getModel()
    {
        return OrderDetail::class;
    }
    public function getAllOrderDetail(string $id)
    {
      return OrderDetail::with('order')
            ->orderByDesc('created_at')
            ->where('order_id', '=', $id);
    }
}
