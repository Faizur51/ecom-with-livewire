<?php

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

Route::middleware(['auth'])->group(function (){
    Route::get('user/dashboard',\App\Http\Livewire\User\UserDashboardComponent::class)->name('user.dashboard');
});

Route::middleware(['auth','authadmin'])->group(function (){
    Route::get('admin/dashboard',\App\Http\Livewire\Admin\AdminDashboardComponent::class)->name('admin.dashboard');
});


require __DIR__.'/auth.php';
