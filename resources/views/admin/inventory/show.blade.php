{{-- resources/views/admin/inventory/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Inventario: ' . $product->name)

@section('content')
<div class="container py-4">
  <h2 class="mb-4">Inventario: {{ $product->name }}</h2>

  {{-- 1) Información general del producto --}}
  <div class="card mb-4">
    <div class="card-body">
      <h5>ID: {{ $product->id }} — {{ $product->name }}</h5>
      <p><strong>Stock Actual:</strong> {{ $stock }}</p>
      <p><strong>Total Vendido:</strong> {{ $totalSold }} unidades</p>
      <p><strong>Precio:</strong> ${{ number_format($product->price, 2) }}</p>
      <p><strong>Marca:</strong> {{ $product->brand->name ?? '—' }}</p>
      <p><strong>Categoría:</strong> {{ $product->category->name ?? '—' }}</p>
    </div>
  </div>

  {{-- 2) Gráfica de ventas mensuales (últimos 6 meses) --}}
  <div class="card mb-4 p-3">
    <h6 class="mb-3">Ventas Mensuales (últimos 6 meses)</h6>
    <canvas id="productSalesChart"></canvas>
  </div>

  {{-- 3) Botón para volver al listado --}}
  <a href="{{ route('admin.inventory.index') }}" class="btn btn-secondary">
    ← Volver al Inventario
  </a>
</div>
@endsection

@push('scripts')
  {{-- Chart.js desde CDN --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // PHP envía $months (["Dec 2024","Jan 2025",…,"May 2025"]) y $monthlyQty ([...]).
      const labels = @json($months);
      const data   = @json($monthlyQty);

      new Chart(document.getElementById('productSalesChart'), {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: 'Unidades Vendidas',
            data: data,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true,
              title: { display: true, text: 'Unidades Vendidas' }
            },
            x: {
              title: { display: true, text: 'Mes' }
            }
          }
        }
      });
    });
  </script>
@endpush
