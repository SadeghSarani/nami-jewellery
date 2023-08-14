<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Managers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController as ProductControllerClient;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use UniSharp\LaravelFilemanager\Lfm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::prefix('product')->group(function () {
    Route::get('/', [ProductControllerClient::class, 'allProducts'])->name('allProducts');
    Route::get('/get/category/{category_id}', [ProductControllerClient::class, 'getProductWithCategory'])->name('get.product.withCategory');
    Route::get('/get/{category_id}/{product_group_id}', [ProductControllerClient::class, 'getProductWithProductGroup'])->name('get.product-group-id');
    Route::get('/single/{product}', [ProductController::class, 'getProduct'])->name('singleProduct');
    Route::post('price', [ProductControllerClient::class, 'getPrice'])->name('price');
    Route::get('/filter', [ProductControllerClient::class, 'getFilter'])->name('get-filter');
    Route::post('/search', [ProductControllerClient::class, 'getSearch'])->name('search-product');
});

Route::prefix('user')->group(function () {
    Route::post('login', [UserController::class, 'login'])->name('userLogin');
    Route::post('signing', [UserController::class, 'signing'])->name('userSign');
    Route::get('login', [UserController::class, 'loginPage'])->name('userLoginPage');
    Route::get('sign', [UserController::class, 'signInPage'])->name('UserSignInPage');
    Route::get('profile', [UserController::class, 'profilePage'])->name('userProfilePage');
    Route::get('edit-profile', [UserController::class, 'editProfilePage'])->name('userEditProfilePage');
    Route::get('logout', [UserController::class, 'logout'])->name('userLogout');
    Route::get('order', [InvoiceController::class, 'getInvoice'])->name('orderUser');
    Route::get('order/{invoice}', [InvoiceController::class, 'getSingleInvoice'])->name('getOneOrder');
    Route::post('address', [AddressController::class, 'addAddressUser'])->name('address-user');
    Route::get('buy', [UserController::class, 'buy'])->name('userBuy');
    Route::get('change-pass', [UserController::class, 'changePassPage'])->name('changePassPage');
    Route::post('change-pass', [UserController::class, 'changePass'])->name('changePass');
    Route::get('verify-mobile', [UserController::class, 'verifyMobilePage'])->name('verifyMobilePage');
    Route::post('verify-mobile', [UserController::class, 'verifyTwoStepWithMobile'])->name('verifyMobile');
    Route::post('verify-code', [UserController::class, 'verifyCode'])->name('verifyCode');
    Route::post('comment/create', [CommentController::class, 'create'])->name('comment.create');
});


Route::prefix('cart')->group(function () {
    Route::post('carts', [CartController::class, 'addCart'])->name('addCarts');
    Route::get('/', [CartController::class, 'getCarts'])->name('getCarts');
    Route::post('/update', [CartController::class, 'updateCart'])->name('updateCart');
});

Route::group(['prefix' => 'laravel-filemanager'], function () {
    Lfm::routes();
});

Route::get('about-us', [UserController::class, 'aboutUs'])->name('aboutUs');
Route::view('contact-us', 'clients.contact-us')->name('contactUs');
Route::post('contact-us/create', [UserController::class, 'contactUs'])->name('contact-us.create');


Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/single/{id}', [BlogController::class, 'single'])->name('blog.single');

Route::get('migrate', function () {
    Artisan::call('migrate');
});

Route::prefix('invoice')->group(function () {
    Route::post('update', [InvoiceController::class, 'update'])->name('invoice-update');
});

Route::prefix('order')->group(function () {
    Route::post('update', [OrderController::class, 'update'])->name('order-update');
});

Route::get('/link/storage', function () {
    Artisan::call('storage:link');
});

Route::get('view/clear', function () {
    Artisan::call('view:clear');
});

Route::get('cache/clear', function () {
    Artisan::call('cache:clear');
});

Route::get('/272948.txt', function () {
    return file_get_contents(base_path('/272948.txt'));
});

include_once __DIR__ . '/manager/admin.php';
