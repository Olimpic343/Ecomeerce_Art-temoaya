{{-- resources/views/admin/inventory/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Inventario de Productos')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">Inventario de Productos</h2>

  <div class="table-responsive">
    <table class="table table-striped align-middle">
      <thead>
        <tr>
          {{-- Columna 1: ID (10% ancho aproximado) --}}
          <th style="width: 10%;">ID</th>
          {{-- Columna 2: Nombre (65% ancho aproximado) --}}
          <th style="width: 40%;">Nombre</th>
          {{-- Columna 3: Acciones (25% ancho aproximado, centrado) --}}
          <th style="width: 5%;" class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $prod)
        <tr>
          {{-- COLUMNA 1: ID --}}
          <td>{{ $prod->id }}</td>

          {{-- COLUMNA 2: Nombre --}}
          <td>{{ $prod->name }}</td>

          {{-- COLUMNA 3: Botón “Ver detalle” centrado --}}
          <td class="text-center">
            <button
              class="btn btn-sm btn-primary"
              data-bs-toggle="modal"
              data-bs-target="#productDetailModal"
              data-url="{{ route('admin.inventory.show', $prod->id) }}"
            >
              Ver detalle
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- Paginación centrada --}}
  <div class="d-flex justify-content-center mt-3">
    {{ $products->links('pagination::bootstrap-5') }}
  </div>
</div>

{{-- Modal de detalle de producto (no se modifica) --}}
<div class="modal fade" id="productDetailModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      {{-- Cabecera --}}
      <div class="modal-header">
        <h5 class="modal-title">Detalle de Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      {{-- Cuerpo: aquí inyectamos el partial vía AJAX --}}
      <div class="modal-body" id="productDetailContent">
        <p class="text-center py-4">Cargando...</p>
      </div>
      {{-- Pie del modal --}}
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
<script>
document.addEventListener('DOMContentLoaded', function() {
  const detailModal = document.getElementById('productDetailModal');
  const content     = detailModal.querySelector('#productDetailContent');

  detailModal.addEventListener('show.bs.modal', function(event) {
    const button = event.relatedTarget;
    const url    = button.getAttribute('data-url');

    content.innerHTML = '<p class="text-center py-4">Cargando...</p>';

    fetch(url, {
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(response => {
      if (!response.ok) throw new Error(`HTTP ${response.status}`);
      return response.text();
    })
    .then(html => {
      content.innerHTML = html;
      drawProductSalesChartInModal();
    })
    .catch(error => {
      console.error('Error al cargar detalle de producto:', error);
      content.innerHTML = '<p class="text-danger text-center">Error cargando la información.</p>';
    });
  });

  function drawProductSalesChartInModal() {
    const canvas = document.getElementById('productSalesChartModal');
    if (!canvas) {
      console.warn('Canvas para la gráfica no encontrado.');
      return;
    }

    let labelsJson = canvas.getAttribute('data-labels');
    let valuesJson = canvas.getAttribute('data-values');

    if (!labelsJson || !valuesJson) {
      console.warn('No se encontraron data-labels o data-values en el canvas.');
      return;
    }

    let labels = JSON.parse(labelsJson);
    let values = JSON.parse(valuesJson);

    new Chart(canvas, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Unidades Vendidas',
          data: values,
          backgroundColor: 'rgba(54, 162, 235, 0.6)'
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 10
            },
            title: {
              display: true,
              text: 'Unidades Vendidas'
            }
          },
          x: {
            title: {
              display: true,
              text: 'Mes'
            }
          }
        }
      }
    });
  }
});
</script>
@endpush
