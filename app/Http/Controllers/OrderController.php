<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Services\OrderService;
use App\Http\Services\OrderDetailService;
use function Symfony\Component\Translation\t;


class OrderController extends Controller
{
    public $orderService;

    public $orderDetailService;
    public function __construct(OrderService $orderService,OrderDetailService $orderDetailService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

    public function index()
    {
        $orders = $this->orderService->getPaginate();
        return view('order.index',compact('orders'));
    }

    public function create(Request $request)
    {
      if($request->isMethod('POST')){
          $this->orderService->validatorOrders($request);
          $this->orderService->create($request);
          return redirect()->back()->withErrors(['success'=>'Create order voucher successs']);
      }
     return view('order.add');
    }

    public function detail(string $id)
    {
        $orderDetail = $this->orderDetailService->getPaginate($id);
        dd($orderDetail);
        return view('order.detail',compact('orderDetail'));
    }
}
