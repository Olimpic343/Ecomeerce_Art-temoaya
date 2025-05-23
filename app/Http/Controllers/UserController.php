<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\Cart;

class UserController extends Controller
{
     public function dashboard(){
         $user = auth()->user();
        $userId = $user->id;

        $totalOrdenes = Order::where('user_id', $userId)->count();
        $totalPendientes = Cart::where('user_id', $userId)->count();
        $totalWishlist = Wishlist::where('user_id', $userId)->count();

        $orders = Order::with(['orderItems.product', 'shippingAddress', 'payment'])
            ->where('user_id', $userId)
            ->latest()
            ->get();

        return view('dashboard', compact('user', 'totalOrdenes', 'totalPendientes', 'totalWishlist', 'orders'));
    }




}
