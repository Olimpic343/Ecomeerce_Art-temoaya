<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Auth\NewPasswordController;/
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShippingAddressController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Http\Controllers\Auth\CustomForgotPasswordController;
use App\Http\Controllers\Auth\CustomResetPasswordController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;


Route::get('/',[HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
         ->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
         ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
         ->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])
         ->name('password.update');
});






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

     Route::post('/sync/cart-wishlist', [CartController::class, 'syncCartWishlist'])
        ->name('sync.cart.wishlist')
        ->middleware('auth');

    Route::delete('/cart/{product_id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/wishlist/{product_id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
    Route::post('/shipping-address', [ShippingAddressController::class, 'store'])->name('shipping.store');
    Route::post('/checkout/stripe', [PaymentController::class, 'checkout'])->name('stripe.checkout');
    Route::get('/checkout/success', [PaymentController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/cancel', [PaymentController::class, 'cancel'])->name('checkout.cancel');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

      Route::post('/dashboard/address', [ShippingAddressController::class, 'storeAddress'])->name('address.store');
    Route::put('/dashboard/address/{id}', [ShippingAddressController::class, 'updateAddress'])->name('address.update');
    Route::delete('/dashboard/address/{id}', [ShippingAddressController::class, 'destroyAddress'])->name('address.destroy');

    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    // Dashboard común
Route::middleware('auth')->get('/dashboard', [UserController::class, 'dashboard'])
     ->name('dashboard');





// CRUD Productos solo admin
Route::middleware(['auth','admin'])
     ->prefix('admin')
     ->name('admin.')
     ->group(function(){
         Route::resource('products', ProductController::class)->except(['show']);
 // CRUD Categorías
         Route::resource('categories', CategoryController::class)->except(['show']);

         // CRUD Marcas
         Route::resource('brands', BrandController::class)->except(['show']);
         Route::get('orders', [AdminOrderController::class, 'index'])
              ->name('orders.index');

         Route::get('orders/{order}', [Admin\OrderController::class, 'show'])
              ->name('orders.show');

               Route::get('orders', [OrderController::class, 'index'])
              ->name('orders.index');

         // detalle de orden
         Route::get('orders/{order}', [OrderController::class, 'show'])
              ->name('orders.show');


     Route::delete('admin/orders/{order}',  [OrderController::class,'destroy'])->name('admin.orders.destroy');
     Route::resource('orders', OrderController::class)
              ->only(['index','show','destroy']);


              // Inventario (solo lectura)
         Route::get('inventory', [InventoryController::class,'index'])
              ->name('inventory.index');
         Route::get('inventory/{product}', [InventoryController::class,'show'])
              ->name('inventory.show');


     Route::middleware(['auth','can:manage-products'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
     Route::resource('products', ProductController::class)->except(['show']);
});






     });


});

Route::get('/producto/{id}', [ProductController::class, 'show'])->name('product.details');
Route::get('/{id}/{slug}', [ProductController::class, 'details'])->name('product.details');
Route::post('/review/', [ReviewController::class, 'store'])->middleware('auth')->name('reviews.store');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/shop', [ProductController::class, 'shop'])->name('shop.index');

require __DIR__.'/auth.php';



