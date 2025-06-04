{{-- resources/views/admin/orders/index.blade.php --}}
@extends('layouts.app')
@section('title','Dashboard de Órdenes')

@section('content')
<div class="container py-4">

  {{-- Métricas superiores --}}
  <div class="row mb-4 g-3">
    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-body">
          <h6>Total Productos</h6>
          <h3>{{ $totalProducts }}</h3>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-body">
          <h6>Total Usuarios</h6>
          <h3>{{ $totalUsers }}</h3>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-body">
          <h6>Órdenes Pagadas</h6>
          <h3>{{ $totalPaidOrders }}</h3>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-body">
          <h6>Total Ventas</h6>
          <h3>${{ number_format($totalRevenue, 2) }}</h3>
        </div>
      </div>
    </div>
  </div>

  {{-- Gráficas --}}
  <div class="row mb-5">

    {{-- A) Ingresos Pagados --}}
    <div class="col-md-6">
      <div class="card p-3">
        <h6 class="mb-3">Ingresos Pagados (últimos 6 meses)</h6>
        <canvas id="incomeChart"></canvas>
      </div>
    </div>

    {{-- B) Órdenes por Estado --}}
    <div class="col-md-6">
      <div class="card p-3">
        <h6 class="mb-3">Órdenes por Estado</h6>
        <canvas id="statusChart"></canvas>
      </div>
    </div>

  </div>

  {{-- Top 5 Productos --}}
  <div class="row mb-5">
    <div class="col-md-6 mx-auto">
      <div class="card p-3">
        <h6 class="mb-3">Top 5 Productos Vendidos</h6>
        <canvas id="pieChart"></canvas>
      </div>
    </div>
  </div>

  {{-- Tabla de Órdenes --}}
  <h2 class="mb-3">Listado de Órdenes</h2>
  <div class="table-responsive">
    <table class="table table-striped align-middle">
      <thead>
        <tr>
          <th>ID</th>
          <th>Usuario</th>
          <th>Items</th>
          <th>Total</th>
          <th>Fecha</th>
          <th>Estado</th>
          <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)
        <tr>
          <td>{{ $order->id }}</td>
          <td>{{ $order->user->name }}</td>
          <td>{{ $order->orderItems->count() }}</td>
          <td>${{ number_format($order->orderItems->sum(fn($i)=> $i->quantity * $i->price),2) }}</td>
          <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
          <td>
            <span class="badge bg-{{ $order->status=='paid'?'success':'warning' }}">
              {{ ucfirst($order->status) }}
            </span>
          </td>
          <td class="text-center">
            <div class="d-flex justify-content-center align-items-center gap-2">
              {{-- Botón Ver --}}
              <button
                class="btn btn-sm btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#orderDetailModal"
                data-url="{{ route('admin.orders.show', $order) }}"
              >
                Ver
              </button>
              {{-- Botón Eliminar --}}
              <form action="{{ route('admin.orders.destroy', $order) }}"
                    method="POST"
                    class="m-0 p-0"
                    onsubmit="return confirm('¿Eliminar la orden #{{ $order->id }}?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                  Eliminar
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- Paginación --}}
  <div class="d-flex justify-content-center mt-3">
    {{ $orders->links('pagination::bootstrap-5') }}
  </div>

</div>

{{-- Modal de Detalle --}}
<div class="modal fade" id="orderDetailModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detalle de Orden</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="orderDetailContent" class="px-1">
          <p class="text-center py-4">Cargando...</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
  {{-- Incluir Chart.js --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {

      // A) Gráfica Ingresos Pagados (últimos 6 meses)
      new Chart(document.getElementById('incomeChart'), {
        type: 'bar',
        data: {
          labels: @json($months),     // ej. ['Dec 2024','Jan 2025','Feb 2025','Mar 2025','Apr 2025','May 2025']
          datasets: [{
            label: 'Ingresos Pagados ($)',
            data: @json($salesData),
            backgroundColor: 'rgba(54, 162, 235, 0.6)'
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true,
              title: { display: true, text: 'Ingresos ($)' }
            },
            x: {
              title: { display: true, text: 'Mes' }
            }
          }
        }
      });

      // B) Gráfica Órdenes por Estado
      new Chart(document.getElementById('statusChart'), {
        type: 'bar',
        data: {
          labels: @json($statusLabels),   // ej. ['pending','paid','cancelled']
          datasets: [{
            label: 'Cantidad de Órdenes',
            data: @json($statusData),     // ej. [12,35,5]
            backgroundColor: [
              'rgba(255, 159, 64, 0.6)',   // pending
              'rgba(75, 192, 192, 0.6)',   // paid
              'rgb(0, 128, 0)'    // cancelled
            ]
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true,
              title: { display: true, text: 'Número de Órdenes' }
            },
            x: {
              title: { display: true, text: 'Estado' }
            }
          }
        }
      });

      // C) Doughnut Top 5 Productos
      new Chart(document.getElementById('pieChart'), {
        type: 'doughnut',
        data: {
          labels: @json($pieLabels),
          datasets: [{
            data: @json($pieData),
            backgroundColor: [
              '#3498db','#e74c3c','#f1c40f','#2ecc71','#9b59b6'
            ]
          }]
        },
        options: { responsive: true }
      });

      // D) AJAX Detalle de Orden en Modal
      const detailModal = document.getElementById('orderDetailModal');
      const content     = detailModal.querySelector('#orderDetailContent');

      detailModal.addEventListener('show.bs.modal', function(event) {
        const btn = event.relatedTarget;
        const url = btn.getAttribute('data-url');

        content.innerHTML = '<p class="text-center py-4">Cargando...</p>';

        fetch(url, {
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => {
          if (!res.ok) throw new Error(`HTTP ${res.status}`);
          return res.text();
        })
        .then(html => {
          content.innerHTML = html;
        })
        .catch(err => {
          console.error('Error al cargar detalle:', err);
          content.innerHTML = '<p class="text-danger text-center">Error cargando la orden.</p>';
        });
      });

    });
  </script>
@endpush
