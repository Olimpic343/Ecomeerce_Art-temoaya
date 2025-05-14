<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Auth\NewPasswordController;/
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;


Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/producto/{id}', [ProductController::class, 'show'])->name('product.details');
Route::get('/{id}/{slug}', [ProductController::class, 'details'])->name('product.details');

Route::post('/review/', [ReviewController::class, 'store'])->middleware('auth')->name('reviews.store');


Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');


require __DIR__.'/auth.php';
