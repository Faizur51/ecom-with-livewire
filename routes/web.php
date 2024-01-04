<?php

use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/


/*Route::get('/', function () {
    return view('layouts.app');
});*/


Route::get('/',\App\Http\Livewire\HomeComponent::class)->name('home');
Route::get('/shop',\App\Http\Livewire\ShopComponent::class)->name('shop');
Route::get('/cart',\App\Http\Livewire\CartComponent::class)->name('cart');
Route::get('/checkout',\App\Http\Livewire\CheckoutComponent::class)->name('checkout');
Route::get('/contact',\App\Http\Livewire\ContactComponent::class)->name('contact');
Route::get('/product/details/{slug}',\App\Http\Livewire\ProductDetailsComponent::class)->name('product.details');
Route::get('category/product/{slug}',\App\Http\Livewire\CategoryProductComponent::class)->name('category.product');

Route::get('/search',\App\Http\Livewire\SearchResultComponent::class)->name('search.product');
Route::get('/wishlist',\App\Http\Livewire\WishlistComponent::class)->name('wishlist.product');

Route::get('/thankyou',\App\Http\Livewire\ThankyouComponent::class)->name('thankyou');





Route::middleware(['auth'])->group(function (){
    Route::get('user/dashboard',\App\Http\Livewire\User\UserDashboardComponent::class)->name('user.dashboard');

    Route::get('/user/address',\App\Http\Livewire\User\UserShippingComponent::class)->name('user.address');
    Route::get('/user/order',\App\Http\Livewire\User\UserOrderComponent::class)->name('user.order');
    Route::get('user/orderdetails/{order_id}',\App\Http\Livewire\User\UserOrderDetailsComponent::class)->name('user.orderdetails');
    Route::get('/user/change-password',\App\Http\Livewire\User\UserChangePasswordComponent::class)->name('user.changepassword');
});

Route::middleware(['auth','authadmin'])->group(function (){
    Route::get('admin/dashboard',\App\Http\Livewire\Admin\AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('admin/slider',\App\Http\Livewire\Admin\AdminManageSliderComponent::class)->name('admin.slider');
    Route::get('admin/category',\App\Http\Livewire\Admin\AdminManageCategoryComponent::class)->name('admin.category');

    Route::get('admin/manage/product',\App\Http\Livewire\Admin\AdminManageProductComponent::class)->name('admin.manage.product');
    Route::get('admin/add/product',\App\Http\Livewire\Admin\AdminAddProductComponent::class)->name('admin.add.product');
    Route::get('admin/edit/product/{product_slug}',\App\Http\Livewire\Admin\AdminEditProductComponent::class)->name('admin.edit.product');


    Route::get('admin/order',\App\Http\Livewire\Admin\AdminOrderComponent::class)->name('admin.order');
    Route::get('admin/orderdetails/{order_id}',\App\Http\Livewire\Admin\AdminOrderDetailsComponent::class)->name('admin.orderdetails');

    Route::get('admin/setting',\App\Http\Livewire\Admin\AdminSettingComponent::class)->name('admin.setting');

});




// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);



Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


require __DIR__.'/auth.php';
