<?php
namespace App\Http\Repositories\Repository;
use App\Http\Repositories\BaseRepository;
use App\Models\OrderDetail;

class OrderDetailRepository extends BaseRepository
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
