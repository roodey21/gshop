<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\Shop\AboutController;
use App\Http\Controllers\Shop\ProductController as ShopProductController;
use App\Http\Controllers\Shop\CartController as ShopCartController;
use App\Http\Controllers\Shop\ContactController;
use App\Http\Controllers\Shop\PaymentController;
use App\Http\Controllers\Shop\TransactionController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use Illuminate\Support\Facades\Route;

/**
 * Shop Routes
 * for the customer only
 */

Route::get('/', [HomeController::class, 'index'])->name('shop.index');
Route::get('about', [AboutController::class, 'index'])->name('shop.about');
Route::get('contact', [ContactController::class, 'index'])->name('shop.contact');
Route::get('produk', [ShopProductController::class, 'index'])->name('shop.product.index');
Route::get('produk/{product:slug}', [ShopProductController::class, 'show'])->name('shop.product.show');

// route untuk menambahkan produk ke keranjang
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user', [UserHomeController::class, 'account'])->name('user.account');
    Route::get('/user/review',[UserHomeController::class, 'review'])->name('user.review');
    Route::get('/user/dashboard', [UserHomeController::class, 'index'])->name('user.dashboard');
    Route::get('/user/transaction/{transaction}', [UserHomeController::class, 'show'])->name('user.transaction.show');
    Route::put('/user/transaction/{transaction}/confirm', [TransactionController::class, 'confirm'])->name('user.transaction.confirm');
    Route::post('produk/{product:slug}/keranjang', [ShopCartController::class, 'store'])->name('shop.cart.add');
    Route::get('keranjang', [ShopCartController::class, 'index'])->name('shop.cart.index');
    Route::delete('keranjang/{cart}', [ShopCartController::class, 'destroy'])->name('shop.cart.destroy');
    Route::patch('keranjang/{cart}/update', [ShopCartController::class, 'update'])->name('shop.cart.update');

    Route::get('getCity', [ShopCartController::class, 'getCity'])->name('ongkir.getCity');
    Route::get('getSubdistrict', [ShopCartController::class, 'getSubdistrict'])->name('ongkir.getSubdistrict');
    Route::get('cekOngkir', [ShopCartController::class, 'cekOngkir'])->name('ongkir.cekOngkir');

    Route::get('checkout/delivery-cost', [TransactionController::class, 'deliveryCost'])->name('shop.cart.cekOngkir');
    Route::get('checkout', [TransactionController::class, 'index'])->name('shop.cart.checkout');
    Route::post('checkout', [TransactionController::class, 'store'])->name('cart.checkout.store');
    Route::get('payment/{transaction:code}', [PaymentController::class, 'index'])->name('shop.payment');
    Route::put('payment/{transaction}', [PaymentController::class, 'uploadProof'])->name('shop.payment.upload-proof');
});

Route::get('seed-province', [ProvinceController::class, 'seedProvince']);
