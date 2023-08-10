<?php

namespace App\Http\Controllers;

use App\Repository\CartRepository;
use App\Repository\ProductItemRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private CartRepository $cartRepository;
    private ProductItemRepository $productItemRepository;

    public function __construct()
    {
        $this->cartRepository = app()->make(CartRepository::class);
        $this->productItemRepository = app()->make(ProductItemRepository::class);
    }

    public function addCart(Request $request)
    {
        $user = checkUserLogin();

        $productItem = $this->productItemRepository->getCount($request->data['product_item_id']);
        if ($productItem->quantity < $request->data['count']) {

            return ['status' => false, 'message' => 'موجودی این کالا از درخواست شما کمتر است'];
        }

        $data = [
            'user_id' => $user->id,
            'product_item_id' => $request->data['product_item_id'],
            'count' => $request->data['count'],
        ];


        return ['status' => true, 'data' => $this->cartRepository->add($data)];
    }

    public function getCarts()
    {
        $carts = $this->cartRepository->getAll(checkUserLogin()->id);

        $total = 0;

        collect($carts)->map(function ($cart) use (&$total) {
            for ($i = 0; $i < $cart->count; $i++) {
                if ($cart->productItem->discount_percent == 0 || $cart->productItem->discount_percent == null) {

                    $total += $cart->productItem->price;
                }

                $total += $cart->productItem->price - ($cart->productItem->price * ($cart->productItem->discount_percent) / 100);
            }
        });
        return view('clients.carts-user')->with(['user' => checkUserLogin(),
            'carts' => $this->cartRepository->getCarts(checkUserLogin()->id), 'total_price' => $total]);
    }

    public function updateCart(Request $request)
    {
        $action = $this->cartRepository->update($request->all());

        if (!$action) {
            return ['status' => false, 'message' => 'عملیات با خطا مواجه شد'];
        }

        return ['status' => true, 'message' => 'عملیات با موفیقیت انجام شد'];
    }
}
