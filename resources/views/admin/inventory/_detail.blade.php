{{-- resources/views/admin/inventory/_detail.blade.php --}}
<div>
  {{-- Título: ID y nombre del producto --}}
  <h5>ID: {{ $product->id }} — {{ $product->name }}</h5>

  {{-- Mostramos Stock Inicial (dato que viene de products.stock) --}}
  <p><strong>Stock Inicial:</strong> {{ $stockInicial }}</p>

  {{-- Mostramos Stock Actual (stockInicial - totalSold) --}}
  <p><strong>Stock Actual:</strong> {{ $stockActual }}</p>

  {{-- Mostramos Total Vendido (sumatoria de todas las order_items) --}}
  <p><strong>Total Vendido:</strong> {{ $totalSold }} unidades</p>

  {{-- Datos extra --}}
  <p><strong>Precio:</strong> ${{ number_format($product->price, 2) }}</p>
  <p><strong>Marca:</strong> {{ $product->brand->name ?? '—' }}</p>
  <p><strong>Categoría:</strong> {{ $product->category->name ?? '—' }}</p>

  {{-- Gráfica de Ventas Mensuales (últimos 6 meses) --}}
  <div class="mt-4">
    <h6>Ventas Mensuales (últimos 6 meses)</h6>
    <canvas
      id="productSalesChartModal"
      data-labels='@json($months)'
      data-values='@json($monthlyQty)'
    ></canvas>
  </div>
</div>
