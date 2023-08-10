<?php

namespace App\Repository;

use App\Models\Order;

class OrderRepository
{

    private Order $order;

    public function __construct()
    {
        $this->order = app()->make(Order::class);
    }

    public function getOrdersUser($userId)
    {
        return $this->order->query()->where('user_id', $userId)->get();
    }

    public function getAllOrder($field = 'id', $param)
    {
        return $this->order->query()->where($field, $param)->with(['user', 'invoice'])->paginate(10);
    }

    public function update($id, $data)
    {
        $this->order->query()->where('id', $id)->update($data);
    }

}
