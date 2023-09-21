<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'role:admin'])->prefix('dashboard')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('bank', BankController::class);
    Route::resource('transaction', TransactionController::class)->only(['index', 'show', 'update', 'edit', 'destroy']);
    Route::put('transaction/{transaction}/update-confirm', [TransactionController::class, 'updateConfirm'])->name('transaction.update-confirm');
    Route::put('transaction/{transaction}/update-resi', [TransactionController::class, 'updateResi'])->name('transaction.update-resi');
    Route::put('transaction/{transaction}/finish-order', [TransactionController::class, 'finishOrder'])->name('transaction.finish-order');
    Route::get('courier', [CourierController::class, 'index'])->name('courier.index');
    Route::get('courier/edit', [CourierController::class, 'edit'])->name('courier.edit');
    Route::put('courier/edit', [CourierController::class, 'update'])->name('courier.update');
    Route::resource('setting', SettingController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/shop.php';
require __DIR__ . '/user.php';
