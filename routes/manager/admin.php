<?php

use App\Http\Controllers\Managers\BlogController;
use App\Http\Controllers\Managers\ContactUsController;
use App\Http\Controllers\Managers\InvoiceController;
use App\Http\Controllers\Managers\ManagerController;
use App\Http\Controllers\Managers\ProductCategoryController;
use App\Http\Controllers\Managers\ProductController;
use App\Http\Controllers\Managers\ProductGroupController;
use App\Http\Controllers\Managers\SliderController;
use App\Http\Controllers\Managers\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('manager')->middleware('AdminLogin')->group(function () {
    Route::get('/index', [ManagerController::class, 'index'])->name('manager.manager');
    Route::get('/list-user', [UserController::class, 'getUsers'])->name('list.user');

    Route::get('list/blog', [BlogController::class, 'index'])->name('blog.list');
    Route::post('blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::get('blog/create/view', [BlogController::class, 'blogCreateTemplate'])->name('blog.create.template');
    Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');


    Route::get('/product/categories', [ProductCategoryController::class, 'index'])->name('product.categories');
    Route::post('/product/category', [ProductCategoryController::class, 'create'])->name('product.category.create');
    Route::delete('/product/category/delete/{productCategory}', [ProductCategoryController::class, 'destroy'])->name('product.category.delete');


    Route::get('/product/groups', [ProductGroupController::class, 'index'])->name('product.groups.template');
    Route::post('/product/groups/create', [ProductGroupController::class, 'create'])->name('product.groups.create');
    Route::delete('/product/groups/delete/{productGroup}', [ProductGroupController::class, 'destroy'])->name('product.groups.delete');


    Route::get('/products', [ProductController::class, 'index'])->name('products.list');
    Route::get('/products/create/index', [ProductController::class, 'productCreateTemplateIndex'])->name('manager-product-create');
    Route::post('/products/create', [ProductController::class, 'create'])->name('manager.product.create');
    Route::get('/products/update/template/{product}', [ProductController::class, 'updateTemplate'])->name('manager.product.update.template');
    Route::post('/products/update/{product}', [ProductController::class, 'update'])->name('manager-product-update');
    Route::post('/products/item/delete', [ProductController::class, 'deleteProductItem'])->name('manager.productItem.delete');
    Route::post('/products/custom-failed/delete', [ProductController::class, 'deleteCustomFailed'])->name('manager.CustomFailed.delete');
    Route::delete('/products/delete/{productId}', [ProductController::class, 'delete'])->name('manager.product.delete');
    Route::get('/products/image/delete/{id}/{key}', [ProductController::class, 'deleteImage'])->name('manager.product.delete.image');


    Route::get('/slider', [SliderController::class, 'index'])->name('manager.slider');
    Route::post('/slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::delete('/slider/create/{slider}', [SliderController::class, 'destroy'])->name('slider.delete');

    Route::prefix('orders')->group(function () {
        Route::get('/new', [OrderController::class, 'getNewOrders'])->name('getNewOrders');
        Route::get('/posted', [OrderController::class, 'getPostedOrder'])->name('getPostedOrder');
        Route::get('/sending', [OrderController::class, 'getSendingOrders'])->name('getSendingOrders');
    });

    Route::prefix('invoice')->group(function () {
        Route::get('/{id}', [InvoiceController::class, 'getInvoiceDetails'])->name('getInvoiceDetails');
    });

    Route::get('/contact-us/list', [ContactUsController::class, 'index'])->name('contact-us.list');

});
