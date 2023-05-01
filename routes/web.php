<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HalamanController::class, 'home'])->name('home');
Route::get('shop-now', [HalamanController::class, 'shop'])->name('shop');
Route::get('shop-now/{product}/detail', [HalamanController::class, 'productdetail'])->name('shop.productdetail');
Route::get('about', [HalamanController::class, 'about'])->name('about');
Route::get('gallery', [HalamanController::class, 'contact'])->name('contact');

Route::middleware('auth')->group(function(){
    Route::get('user-transaction', [TransactionController::class, 'transaction'])->name('usertransaction');
    Route::post('user-transaction/book', [TransactionController::class, 'book'])->name('book');
    Route::get('user-transaction/{transaction}/payment', [TransactionController::class, 'payment'])->name('payment');
    Route::post('upload-tf', [TransactionController::class, 'tfupload']);
    Route::post('user-transaction/confirmpayment', [TransactionController::class, 'confirmpayment'])->name('transactionconfirmation');
    Route::get('user-transaction/{transaction}/invoice', [TransactionController::class, 'transactioninvoice'])->name('transactioninvoice');
    Route::post('user-transaction/uphari', [TransactionController::class, 'uphari'])->name('uphari');
});



Route::middleware('auth', 'isselleradmin')->group(function(){
    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');

});

Route::middleware('auth', 'isseller')->group(function(){
    Route::get('product', [PagesController::class, 'product'])->name('product');
    Route::get('product/create', [PagesController::class, 'addproduct'])->name('product.add');
    Route::post('upload-temp-product', [ProductController::class, 'uptempimage']);
    Route::post('product/create', [ProductController::class, 'store'])->name('product.store');
    Route::get('order-confirmation', [PagesController::class, 'orderconfirmation'])->name('confirmorder');
    Route::post('order-confirmation/confirm', [TransactionController::class, 'orderconfirmed'])->name('transaction.confirm');
    Route::post('order-confirmation/reject', [TransactionController::class, 'ordercanceled'])->name('transaction.cancel');
    Route::get('mytransaction', [PagesController::class, 'mytransaction'])->name('mytrans');
    
});

Route::middleware('auth', 'isadmin')->group(function () {

    Route::get('users', [PagesController::class, 'user'])->name('user');
    Route::get('users/create', [PagesController::class, 'adduser'])->name('user.add');
    Route::post('users/create', [UserController::class, 'storeuser'])->name('user.store');
    Route::post('users/edit', [UserController::class, 'updateuser'])->name('user.edit');
    Route::delete('users/destroy', [UserController::class, 'destroyuser'])->name('user.destroy');

    Route::get('category', [PagesController::class, 'category'])->name('category');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::post('category/edit', [CategoryController::class, 'update'])->name('category.edit');
    Route::delete('category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('upload-image', [CategoryController::class, 'uptempimage']);
    // Route::get('coba', function(){
    //     return view('pages.admin.coba');
    // })->middleware('isadmin');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
