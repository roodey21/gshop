<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\Shop\ProductController as ShopProductController;
use App\Http\Controllers\Shop\CartController as ShopCartController;
use App\Http\Controllers\Shop\TransactionController;
use Illuminate\Support\Facades\Route;

/**
 * Shop Routes
 * for the customer only
 */

 Route::get('/', [HomeController::class, 'index'])->name('shop.index');
Route::get('produk', [ShopProductController::class, 'index'])->name('shop.product.index');
Route::get('produk/{product:slug}', [ShopProductController::class, 'show'])->name('shop.product.show');

// route untuk menambahkan produk ke keranjang
Route::middleware(['auth','role:user'])->group(function () {
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
    Route::get('payment', [TransactionController::class, 'payment'])->name('cart.payment');
});

Route::get('seed-province', [ProvinceController::class, 'seedProvince']);
