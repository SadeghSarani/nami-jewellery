<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class ManagerController extends Controller
{
    public function index()
    {
        $countProduct = Product::all()->count();
        $countBlog = Blog::all()->count();
        $countUser = User::all()->count();
        $countOrderNew = Order::query()->where('status', OrderController::NEW_STATUS)->count();
        $countOrderPosted = Order::query()->where('status', OrderController::POSTED_STATUS)->count();
        $countOrderSending = Order::query()->where('status', OrderController::SENDING_STATUS)->count();

        return view('manager.manager', [
            'countProduct' => $countProduct,
            'countBlog' => $countBlog,
            'countUser' => $countUser,
            'countOrderNew' => $countOrderNew,
            'countOrderPosted' => $countOrderPosted,
            'countOrderSending' => $countOrderSending,
        ]);
    }
}
