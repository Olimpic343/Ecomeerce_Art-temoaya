<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    // Mostrar la vista de inventario
    public function index()
    {
        // Paginamos 10 productos por página (puedes ajustar a tu gusto)
        $products = Product::paginate(10);

        return view('admin.inventory.index', compact('products'));
    }

    // Retornar el partial con los datos del producto (AJAX)
    public function show($id)
    {
        // 1) Obtenemos el producto (con marca y categoría para mostrar detalles)
        $product = Product::with('brand', 'category')->findOrFail($id);

        // 2) Stock Inicial: tomamos directamente el campo stock de la tabla products
        $stockInicial = $product->stock;

        // 3) Total vendido: sumamos todas las order_items.quantity de este producto
        $totalSold = DB::table('order_items')
            ->where('product_id', $product->id)
            ->sum('quantity');

        // 4) Stock Actual: restamos al stock inicial las unidades vendidas
        $stockActual = $stockInicial - $totalSold;
        if ($stockActual < 0) {
            $stockActual = 0; // opcional: para no mostrar negativos
        }

        // 5) Construimos los datos para la gráfica de los últimos 6 meses
        $months     = [];
        $monthlyQty = [];

        for ($i = 5; $i >= 0; $i--) {
            $date     = Carbon::now()->subMonths($i);
            $months[] = $date->format('M Y'); // por ejemplo: "Jun 2025"

            // Cantidad vendida de este producto en ese mes y año (solo órdenes pagadas)
            $qty = DB::table('order_items')
                ->join('orders', 'order_items.order_id', '=', 'orders.id')
                ->where('order_items.product_id', $product->id)
                ->whereYear('orders.created_at', $date->year)
                ->whereMonth('orders.created_at', $date->month)
                ->where('orders.status', 'paid')
                ->sum('order_items.quantity');

            $monthlyQty[] = $qty;
        }

        // 6) Devolvemos el partial con todas estas variables
        return view('admin.inventory._detail', compact(
            'product',
            'stockInicial',
            'stockActual',
            'totalSold',
            'months',
            'monthlyQty'
        ));
    }
}
