<?php


namespace App\Http\Services;

use App\Http\Repositories\Repository\OrderRepository;
use App\Utils\Constants;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class OrderService
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    public function getPaginate()
    {
        return $this->orderRepository->PaginateIndex($this->orderRepository->getAllOrder(),Constants::DEFAULT_PER_PAGE);
    }

    public function validatorOrders(Request $request)
    {
       $request->validate([
           'user_id' => 'required|integer|exists:users,id',
           'voucher_id' => 'nullable|integer|exists:vouchers,id',
           'address_detail_id' => 'required|integer|exists:address_details,id',
           'payment_id' => 'required|integer|exists:payments,id',
           'before_total_amount' => 'required|numeric|min:0',
           'shipping' => 'required|numeric|min:0',
           'after_total_amount' => 'required|numeric|min:0',
           'note' => 'nullable|string|max:1000',
           'order_code' => 'required|string|unique:orders,order_code',
           'status' => 'required',
       ]);

    }

    public function getAll()
    {
        return $this->orderRepository->getAll();
    }

    public function create(Request $request): Model
    {
        return $this->orderRepository->create([
            'user_id' => $request->input('user_id'),
            'voucher_id' => $request->input('voucher_id'),
            'address_detail_id' => $request->input('address_detail_id'),
            'payment_id' => $request->input('payment_id'),
            'before_total_amount' => $request->input('before_total_amount'),
            'shipping' => $request->input('shipping'),
            'after_total_amount' => $request->input('after_total_amount'),
            'note' => $request->input('note'),
            'order_code' => $request->input('order_code'),
            'status' => $request->input('status'),
        ]);
    }

    public function update(int $id, array $data): Model
    {
        return $this->orderRepository->update($id, $data);
    }

    public function findOrFail(int $id): Model|null
    {
        return $this->orderRepository->findOrFail($id);
    }

    public function destroy(int|array $id): int
    {
        return $this->orderRepository->destroy($id);
    }

    public function restore(int|array $id): bool
    {
        return $this->orderRepository->restore($id);
    }
}
