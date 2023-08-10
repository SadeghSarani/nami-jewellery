<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Repository\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    const NEW_STATUS = 'new';
    const SENDING_STATUS = 'sending';
    const POSTED_STATUS = 'posted';

    private OrderRepository $orderRepository;


    public function __construct()
    {
        $this->orderRepository = app()->make(OrderRepository::class);
    }

    public function order()
    {
        $orders = $this->orderRepository->getOrdersUser(checkUserLogin()->id);

        return view('clients.user-order')->with(['user' => checkUserLogin(), 'orders' => $orders]);
    }

    public function getOrder(Order $order)
    {
        return view('clients.single-order-user')->with(['order' => $order, 'user' => checkUserLogin()]);
    }

    public function getAllOrder(Request $request)
    {
        return view('manager.orders')
            ->with('orders', $this->orderRepository->getAllOrder('status', $request->status));

    }

    public function getNewOrders(Request $request)
    {
        return view('manager.orders', ['orders' => $this->orderRepository->getAllOrder('status', self::NEW_STATUS)]);
    }

    public function getPostedOrder(Request $request)
    {
        return view('manager.orders')
            ->with('orders', $this->orderRepository->getAllOrder('status', self::POSTED_STATUS));

    }

    public function getSendingOrders(Request $request)
    {
        return view('manager.orders')
            ->with('orders', $this->orderRepository->getAllOrder('status', self::SENDING_STATUS));
    }

    public function update(Request $request)
    {
        return $this->orderRepository->update($request->id, $request->all());
    }
}
