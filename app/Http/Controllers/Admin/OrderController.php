<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
    {
        // 1) Paginado de órdenes (tabla)
        $orders = Order::with(['user', 'orderItems'])
                       ->latest()
                       ->paginate(15);

        // 2) Métricas simples
        $totalProducts   = Product::count();
        $totalUsers      = User::count();
        $totalPaidOrders = Order::where('status', 'paid')->count();

        // 3) Monto global de ventas (status='paid')
        $totalRevenue = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.status', 'paid')
            ->sum(DB::raw('order_items.quantity * order_items.price'));

        // 4) Últimos 6 meses (sin repeticiones ni arrastres)
        $months    = [];
        $salesData = [];


         for ($i = 5; $i >= 0; $i--) {
            // Cada iteración parte de Carbon::now() sin arrastrar
            $date = Carbon::now()->subMonths($i);

            // Etiqueta: "Dec 2024", "Jan 2025", "Feb 2025", "Mar 2025", "Apr 2025", "May 2025"
            $months[] = $date->format('M Y');

            // Sumar ingresos de órdenes pagadas en ese mes/año
            $amount = DB::table('order_items')
                ->join('orders', 'order_items.order_id', '=', 'orders.id')
                ->whereYear('orders.created_at', $date->year)
                ->whereMonth('orders.created_at', $date->month)
                ->where('orders.status', 'paid')
                ->sum(DB::raw('order_items.quantity * order_items.price'));

            $salesData[] = $amount;
        }

        // 5) Conteo total de órdenes por estado
        $statusCounts = Order::select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status')
            ->all();

        $statusLabels = array_keys($statusCounts);     // ej: ['pending','paid','cancelled']
        $statusData   = array_values($statusCounts);   // ej: [12, 35, 5]

        // 6) Top 5 productos por unidades vendidas (solo órdenes pagadas)
        $salesByProductQuery = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products','order_items.product_id','=','products.id')
            ->where('orders.status','paid')
            ->select('products.name', DB::raw('SUM(order_items.quantity) as total_qty'))
            ->groupBy('products.name')
            ->orderByDesc('total_qty')
            ->limit(5)
            ->get();

        $pieLabels = $salesByProductQuery->pluck('name')->all();
        $pieData   = $salesByProductQuery->pluck('total_qty')->all();

        // 7) Enviar todo a la vista
        return view('admin.orders.index', [
            'orders'          => $orders,
            'totalProducts'   => $totalProducts,
            'totalUsers'      => $totalUsers,
            'totalPaidOrders' => $totalPaidOrders,
            'totalRevenue'    => $totalRevenue,
            'months'          => $months,
            'salesData'       => $salesData,
            'statusLabels'    => $statusLabels,
            'statusData'      => $statusData,
            'pieLabels'       => $pieLabels,
            'pieData'         => $pieData,
        ]);
    }

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


public function show(Request $request, Order $order)
{
    $order->load(['user','orderItems.product']);

    // Si es petición AJAX, devolvemos sólo el HTML del partial
    if ($request->ajax() || $request->wantsJson()) {
        return view('admin.orders._detail', compact('order'));
    }

    // Si no, devolvemos la vista completa (por si alguien accede directo)
    return view('admin.orders.show', compact('order'));
}


    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
{
    // Si quisiera evitar borrar pedidos ya pagados, podrías chequeo aquí
    $order->delete();

    return redirect()
        ->route('admin.orders.index')
        ->with('success','Orden #'.$order->id.' eliminada correctamente.');
}



}
