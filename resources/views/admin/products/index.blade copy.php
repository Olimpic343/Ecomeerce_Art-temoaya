{{-- resources/views/admin/products/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
<div class="container py-4">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Productos</h2>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">+ Nuevo</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Marca</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td class="align-middle">
                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}"
                             width="60"
                             alt="Imagen {{ $product->name }}">
                    @endif
                </td>
                <td class="align-middle">{{ $product->name }}</td>
                <td class="align-middle">${{ number_format($product->price,2) }}</td>
                <td class="align-middle">{{ $product->brand->name ?? '—' }}</td>
                <td class="text-center align-middle">
                    <div class="d-flex justify-content-center gap-2">
                        {{-- Botón Editar abre el modal --}}
                        <button
    class="btn btn-sm btn-warning"
    data-bs-toggle="modal"
    data-bs-target="#editProductModal"
    data-url="{{ route('admin.products.update', $product) }}"
    data-name="{{ $product->name }}"
    data-price="{{ $product->price }}"
    data-brand="{{ $product->brand_id }}"
    data-description="{{ $product->description }}"
    data-image="{{ $product->image }}"
>
  Editar
</button>


                        {{-- Botón Eliminar --}}
                        <form action="{{ route('admin.products.destroy', $product) }}"
                              method="POST"
                              onsubmit="return confirm('¿Eliminar este producto?')"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center py-4">No hay productos.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{-- Paginación centrada --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>

{{-- Modal de edición --}}
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="editProductForm" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title" id="editProductLabel">Editar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          {{-- Nombre --}}
          <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" required />
          </div>
          {{-- Precio --}}
          <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" step="0.01" name="price" class="form-control" required />
          </div>
          {{-- Marca --}}
          <div class="mb-3">
            <label class="form-label">Marca</label>
            <select name="brand_id" class="form-select" required>
              <option value="">-- Seleccionar --</option>
              @foreach($brands as $b)
                <option value="{{ $b->id }}">{{ $b->name }}</option>
              @endforeach
            </select>
          </div>
          {{-- Descripción --}}
          <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
          </div>
          {{-- Imagen actual --}}
          <div class="mb-3 text-center">
            <label class="form-label d-block">Imagen actual</label>
            <img id="currentImage" src="" width="120" alt="Sin imagen" style="display:none;">
          </div>
          {{-- Subir nueva imagen --}}
          <div class="mb-3">
            <label class="form-label">Cambiar imagen</label>
            <input type="file" name="image" class="form-control" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){
  var editModal = document.getElementById('editProductModal');
  editModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;

    // URL completa de la ruta update
    var url = button.getAttribute('data-url');

    // Formulario y campos
    var form   = document.getElementById('editProductForm');
    form.action = url;      // <-- aquí ponemos la URL exacta

    // Rellenar campos
    form.querySelector('input[name="name"]').value         = button.getAttribute('data-name');
    form.querySelector('input[name="price"]').value        = button.getAttribute('data-price');
    form.querySelector('select[name="brand_id"]').value    = button.getAttribute('data-brand');
    form.querySelector('textarea[name="description"]').value = button.getAttribute('data-description') || '';

    // Imagen actual
    var imgPath = button.getAttribute('data-image');
    var imgTag  = document.getElementById('currentImage');
    if (imgPath) {
      imgTag.src           = '{{ url("storage") }}/' + imgPath;
      imgTag.style.display = 'inline-block';
    } else {
      imgTag.style.display = 'none';
    }
  });
});
</script>

@endpush
