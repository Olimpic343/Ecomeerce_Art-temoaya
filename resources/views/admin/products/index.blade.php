{{-- resources/views/admin/products/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
<div class="container py-4">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Título + “+ Nuevo” abre el modal --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Productos</h2>
        <button class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#createProductModal">
          + Nuevo
        </button>
    </div>

    {{-- Tabla de Productos --}}
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
                        {{-- Editar (modal) --}}
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
                            data-stock="{{ $product->stock }}"
                        >Editar</button>

                        {{-- Eliminar --}}
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

{{-- ============================================== --}}
{{-- Modal de CREACIÓN de Producto                --}}
{{-- ============================================== --}}
<div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="createProductLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">




    <div class="modal-content">
      <form id="createProductForm"
            action="{{ route('admin.products.store') }}"
            method="POST"
            enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="createProductLabel">Nuevo Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          {{-- Nombre --}}
          <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   class="form-control @error('name') is-invalid @enderror"
                   required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          {{-- Precio --}}
          <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number"
                   step="0.01"
                   name="price"
                   value="{{ old('price') }}"
                   class="form-control @error('price') is-invalid @enderror"
                   required>
            @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          {{-- Stock --}}
            <div class="mb-3">
              <label class="form-label">Stock</label>
               <input type="number" name="stock"
                value="{{ old('stock', $product->stock ?? '') }}"
                   class="form-control @error('stock') is-invalid @enderror"
                      min="0" required>
                    @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

          {{-- Marca --}}
          <div class="mb-3">
            <label class="form-label">Marca</label>
            <select name="brand_id"
                    class="form-select @error('brand_id') is-invalid @enderror"
                    required>
              <option value="">-- Seleccionar --</option>
              @foreach($brands as $b)
                <option value="{{ $b->id }}"
                  {{ old('brand_id') == $b->id ? 'selected' : '' }}>
                  {{ $b->name }}
                </option>
              @endforeach
            </select>
            @error('brand_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
           {{-- Categoría --}}
<div class="mb-3">
  <label class="form-label">Categoría</label>
  <select name="category_id"
          class="form-select @error('category_id') is-invalid @enderror"
          required>
    <option value="">-- Seleccionar --</option>
    @foreach($categories as $c)
      <option value="{{ $c->id }}"
        {{ old('category_id') == $c->id ? 'selected':'' }}>
        {{ $c->name }}
      </option>
    @endforeach
  </select>
  @error('category_id')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>



          {{-- Descripción --}}
          <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="description"
                      class="form-control @error('description') is-invalid @enderror"
                      rows="3">{{ old('description') }}</textarea>
            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          {{-- Imagen --}}
          <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input type="file"
                   name="image"
                   class="form-control @error('image') is-invalid @enderror">
            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Crear producto</button>
        </div>
      </form>




    </div>
  </div>
</div>

{{-- ============================================== --}}
{{-- Modal de EDICIÓN (ya existente)              --}}
{{-- ============================================== --}}
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

            {{-- Stock --}}
    <div class="mb-3">
      <label class="form-label">Stock</label>
      <input type="number"
             name="stock"
             class="form-control"
             min="0"
             required>
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
          {{-- Cambiar imagen --}}
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
  // 1) Limpiar form de creación cada vez que se abra
  var createModal = document.getElementById('createProductModal');
  createModal.addEventListener('show.bs.modal', function () {
    var form = document.getElementById('createProductForm');
    form.reset();
    form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
  });

  // 2) Rellenar form de edición
  var editModal = document.getElementById('editProductModal');
  editModal.addEventListener('show.bs.modal', function (event) {
    var btn = event.relatedTarget;
    var form = document.getElementById('editProductForm');

    form.action = btn.getAttribute('data-url');
    form.querySelector('input[name="name"]').value         = btn.getAttribute('data-name');
    form.querySelector('input[name="price"]').value        = btn.getAttribute('data-price');
    form.querySelector('select[name="brand_id"]').value    = btn.getAttribute('data-brand');
    form.querySelector('textarea[name="description"]').value = btn.getAttribute('data-description') || '';
      form.querySelector('input[name="stock"]').value = btn.getAttribute('data-stock') || 0;

    var imgPath = btn.getAttribute('data-image'),
        imgTag  = document.getElementById('currentImage');
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
