<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function details($id, $slug)
    {
        $product = Product::where('id', $id)
                          ->where('slug', $slug)
                          ->firstOrFail();

         $topSellingProducts = $this->getTopSellingProducts(6);

        return view('products.details', compact('product', 'topSellingProducts'));
    }


    public function getTopSellingProducts($limit = 6){

        return Product::withCount('orderItems')
        ->orderBy('order_items_count')
        ->take($limit)
        ->get();
    }
}
