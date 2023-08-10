<?php

namespace App\Repository;

use App\Models\Cart;

class CartRepository
{

    private Cart $cart;

    public function __construct()
    {
        $this->cart = app()->make(Cart::class);
    }

    public function add($data)
    {
        return $this->cart->query()->create($data);
    }

    public function getCarts($userId)
    {
        return $this->cart->query()->where('user_id', $userId)->where('status', 'open')->paginate(10);
    }

    public function getAll($userId)
    {
        return $this->cart->query()->where('user_id', $userId)->where('status', 'open')->get();
    }

    public function update($data)
    {

        if ($data['itemCount'] == 0) {
            return $this->cart->query()->where('id', $data['cartId'])->delete();
        } else {
            return $this->cart->query()->where('id', $data['cartId'])->update([
                'count' => $data['itemCount']
            ]);
        }
    }

    public function deleteAll($userId)
    {
        return $this->cart->query()
            ->where('user_id', $userId)
            ->where('status', 'open')
            ->update(['status' => 'close']);

    }
}
