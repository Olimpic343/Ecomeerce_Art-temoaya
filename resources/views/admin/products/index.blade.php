{{-- resources/views/admin/products/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Gestionar Productos')

@section('content')
<div class="container mt-4">

    {{-- 1) Mensaje Flash --}}
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- 2) Título y Tabla de Productos --}}
    <div class="row mb-3">
        <div class="col-12">
            <h2>Listado de Productos</h2>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-12">
            <div class="d-flex justify-content-end">
                <button
                  class="btn btn-success btn-sm"
                  data-bs-toggle="modal"
                  data-bs-target="#createProductModal"
                >
                  + Agregar Nuevo
                </button>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <table class="table table-bordered table-striped" id="products-table">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Marca</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Estado</th>
                        <th class="text-center">
                            {{-- Botón “+ Agregar Nuevo” de Producto --}}

                            <br>Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p)
                        <tr
                            data-id="{{ $p->id }}"
                            data-name="{{ $p->name }}"
                            data-slug="{{ $p->slug }}"
                            data-description="{{ $p->description }}"
                            data-category="{{ $p->category_id }}"
                            data-brand="{{ $p->brand_id }}"
                            data-price="{{ $p->price }}"
                            data-price2="{{ $p->price2 }}"
                            data-stock="{{ $p->stock }}"
                            data-status="{{ $p->status }}"
                            data-image="{{ $p->image }}"
                        >
                            <td>{{ $p->id }}</td>
                            <td>
                                @if($p->image)
                                  <img src="{{ asset('storage/' . $p->image) }}"
                                       alt="{{ $p->name }}"
                                       width="60" height="60"
                                       style="object-fit: cover;">
                                @else
                                  <small class="text-muted">Sin imagen</small>
                                @endif
                            </td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->category ? $p->category->name : '—' }}</td>
                            <td>{{ $p->brand ? $p->brand->name : '—' }}</td>
                            <td>${{ number_format($p->price, 2) }}</td>
                            <td>{{ $p->stock }}</td>
                            <td>
                                @if ($p->status === 'active')
                                  <span class="badge bg-success">Activo</span>
                                @else
                                  <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-center">
                                {{-- Botón “Editar” abre modal de edición de producto --}}
                                <button
                                  class="btn btn-sm btn-primary btn-open-edit"
                                  data-bs-toggle="modal"
                                  data-bs-target="#editProductModal"
                                >
                                  Editar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Paginación de Productos --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    {{-- 3) Modales para Crear/Editar Producto --}}
    {{-- -------------------------------------- --}}

    {{-- 3.1) Modal “Crear Producto” --}}
    <div
      class="modal fade"
      id="createProductModal"
      tabindex="-1"
      aria-labelledby="createProductModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="modal-header">
              <h5 class="modal-title" id="createProductModalLabel">Agregar Nuevo Producto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
              {{-- Nombre --}}
              <div class="mb-3">
                <label for="create-name" class="form-label">Nombre</label>
                <input
                  type="text"
                  class="form-control"
                  id="create-name"
                  name="name"
                  required
                >
              </div>

              {{-- Slug --}}
              <div class="mb-3">
                <label for="create-slug" class="form-label">Slug</label>
                <input
                  type="text"
                  class="form-control"
                  id="create-slug"
                  name="slug"
                  required
                >
              </div>

              {{-- Descripción --}}
              <div class="mb-3">
                <label for="create-description" class="form-label">Descripción</label>
                <textarea
                  class="form-control"
                  id="create-description"
                  name="description"
                  rows="3"
                ></textarea>
              </div>

              <div class="row">
                {{-- Categoría --}}
                <div class="col-md-6 mb-3">
                  <label for="create-category" class="form-label">Categoría</label>
                  <select
                    class="form-select"
                    id="create-category"
                    name="category_id"
                    required
                  >
                    <option value="">-- Seleccionar --</option>
                    @foreach ($categories as $cat)
                      <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                  </select>
                </div>

                {{-- Marca --}}
                <div class="col-md-6 mb-3">
                  <label for="create-brand" class="form-label">Marca</label>
                  <select
                    class="form-select"
                    id="create-brand"
                    name="brand_id"
                    required
                  >
                    <option value="">-- Seleccionar --</option>
                    @foreach ($brands as $brand)
                      <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row">
                {{-- Precio --}}
                <div class="col-md-4 mb-3">
                  <label for="create-price" class="form-label">Precio</label>
                  <input
                    type="number"
                    class="form-control"
                    id="create-price"
                    name="price"
                    step="0.01"
                    required
                  >
                </div>

                {{-- Precio 2 --}}
                <div class="col-md-4 mb-3">
                  <label for="create-price2" class="form-label">Precio 2</label>
                  <input
                    type="number"
                    class="form-control"
                    id="create-price2"
                    name="price2"
                    step="0.01"
                  >
                </div>

                {{-- Stock --}}
                <div class="col-md-4 mb-3">
                  <label for="create-stock" class="form-label">Stock</label>
                  <input
                    type="number"
                    class="form-control"
                    id="create-stock"
                    name="stock"
                    required
                  >
                </div>
              </div>

              {{-- Estado --}}
              <div class="mb-3">
                <label for="create-status" class="form-label">Estado</label>
                <select
                  class="form-select"
                  id="create-status"
                  name="status"
                  required
                >
                  <option value="active">Activo</option>
                  <option value="inactive">Inactivo</option>
                </select>
              </div>

              {{-- Imagen --}}
              <div class="mb-3">
                <label for="create-image" class="form-label">Imagen</label>
                <input
                  type="file"
                  class="form-control"
                  id="create-image"
                  name="image"
                  accept="image/*"
                  required
                >
              </div>
            </div>

            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Cancelar
              </button>
              <button type="submit" class="btn btn-success">
                Guardar Producto
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    {{-- 3.2) Modal “Editar Producto” --}}
    {{-- Modal “Editar Producto” corregido para que no anide forms --}}
<div
  class="modal fade"
  id="editProductModal"
  tabindex="-1"
  aria-labelledby="editProductModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      {{-- ↓ FORMULARIO DE EDICIÓN (PUT) --}}
      <form id="form-edit-product" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="modal-header">
          <h5 class="modal-title" id="editProductModalLabel">Editar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>

        <div class="modal-body">
          {{-- ID oculto --}}
          <input type="hidden" id="edit-product-id" name="product_id">

          {{-- Nombre --}}
          <div class="mb-3">
            <label for="edit-name" class="form-label">Nombre</label>
            <input
              type="text"
              class="form-control"
              id="edit-name"
              name="name"
              required
            >
          </div>

          {{-- Slug --}}
          <div class="mb-3">
            <label for="edit-slug" class="form-label">Slug</label>
            <input
              type="text"
              class="form-control"
              id="edit-slug"
              name="slug"
              required
            >
          </div>

          {{-- Descripción --}}
          <div class="mb-3">
            <label for="edit-description" class="form-label">Descripción</label>
            <textarea
              class="form-control"
              id="edit-description"
              name="description"
              rows="3"
            ></textarea>
          </div>

          <div class="row">
            {{-- Categoría --}}
            <div class="col-md-6 mb-3">
              <label for="edit-category" class="form-label">Categoría</label>
              <select
                class="form-select"
                id="edit-category"
                name="category_id"
                required
              >
                <option value="">-- Seleccionar --</option>
                @foreach ($categories as $cat)
                  <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
              </select>
            </div>

            {{-- Marca --}}
            <div class="col-md-6 mb-3">
              <label for="edit-brand" class="form-label">Marca</label>
              <select
                class="form-select"
                id="edit-brand"
                name="brand_id"
                required
              >
                <option value="">-- Seleccionar --</option>
                @foreach ($brands as $brand)
                  <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row">
            {{-- Precio --}}
            <div class="col-md-4 mb-3">
              <label for="edit-price" class="form-label">Precio</label>
              <input
                type="number"
                class="form-control"
                id="edit-price"
                name="price"
                step="0.01"
                required
              >
            </div>

            {{-- Precio 2 --}}
            <div class="col-md-4 mb-3">
              <label for="edit-price2" class="form-label">Precio 2</label>
              <input
                type="number"
                class="form-control"
                id="edit-price2"
                name="price2"
                step="0.01"
              >
            </div>

            {{-- Stock --}}
            <div class="col-md-4 mb-3">
              <label for="edit-stock" class="form-label">Stock</label>
              <input
                type="number"
                class="form-control"
                id="edit-stock"
                name="stock"
                required
              >
            </div>
          </div>

          {{-- Estado --}}
          <div class="mb-3">
            <label for="edit-status" class="form-label">Estado</label>
            <select
              class="form-select"
              id="edit-status"
              name="status"
              required
            >
              <option value="active">Activo</option>
              <option value="inactive">Inactivo</option>
            </select>
          </div>

          {{-- Imagen actual --}}
          <div class="mb-3">
            <label class="form-label">Imagen actual:</label>
            <div id="current-image-container"></div>
          </div>

          {{-- Subir nueva imagen --}}
          <div class="mb-3">
            <label for="edit-image" class="form-label">Cambiar Imagen</label>
            <input
              type="file"
              class="form-control"
              id="edit-image"
              name="image"
              accept="image/*"
              required
            >
          </div>
        </div> {{-- /.modal-body --}}

        {{-- 3.3) FOOTER del formulario de EDICIÓN --}}
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >
            Cancelar
          </button>
          <button
            type="submit"
            class="btn btn-primary"
          >
            Guardar Cambios
          </button>
        </div>
      </form> {{-- /form-edit-product --}}

      {{-- ↓ Ahora cerramos el form de edición ANTES de abrir el form de eliminación --}}
      {{-- 3.4) FORMULARIO DE ELIMINACIÓN (DELETE) TOTALMENTE FUERA del form-edit-product --}}
      <form
        id="form-delete-product"
        method="POST"
        class="px-3 pb-3"
      >
        @csrf
        @method('DELETE')
        <button
          type="submit"
          class="btn btn-danger w-100"
          onclick="return confirm('¿Seguro que deseas eliminar este producto?')"
        >
          Eliminar Producto
        </button>
      </form>
    </div> {{-- /.modal-content --}}
  </div> {{-- /.modal-dialog --}}
</div> {{-- /.modal --}}


    {{-- 4) Tabs: Administrar Categorías / Marcas --}}
    {{-- -------------------------------------- --}}
    <div class="row mb-3">
        <div class="col-12">
            <ul class="nav nav-tabs" id="adminTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button
                      class="nav-link active"
                      id="tab-categories"
                      data-bs-toggle="tab"
                      data-bs-target="#categoriesTab"
                      type="button"
                      role="tab"
                      aria-controls="categoriesTab"
                      aria-selected="true"
                    >
                      Administrar Categorías
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                      class="nav-link"
                      id="tab-brands"
                      data-bs-toggle="tab"
                      data-bs-target="#brandsTab"
                      type="button"
                      role="tab"
                      aria-controls="brandsTab"
                      aria-selected="false"
                    >
                      Administrar Marcas
                    </button>
                </li>
            </ul>

            <div class="tab-content mt-3" id="adminTabsContent">
                {{-- 4.1) Módulo Categorías --}}
                <div
                  class="tab-pane fade show active"
                  id="categoriesTab"
                  role="tabpanel"
                  aria-labelledby="tab-categories"
                >
                    <div class="d-flex justify-content-end mb-2">
                        <button
                          class="btn btn-success btn-sm"
                          data-bs-toggle="modal"
                          data-bs-target="#createCategoryModal"
                        >
                          + Nueva Categoría
                        </button>
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $cat)
                              <tr
                                data-id="{{ $cat->id }}"
                                data-name="{{ $cat->name }}"
                                data-description="{{ $cat->description }}"
                              >
                                <td>{{ $cat->id }}</td>
                                <td>{{ $cat->name }}</td>
                                <td>{{ $cat->description }}</td>
                                <td class="text-center">
                                  <button
                                    class="btn btn-primary btn-sm btn-open-edit-category"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editCategoryModal"
                                  >
                                    Editar
                                  </button>
                                  <form
                                    action="{{ route('admin.categories.destroy', $cat->id) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('¿Eliminar esta categoría?')"
                                  >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                      Eliminar
                                    </button>
                                  </form>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- 4.2) Módulo Marcas --}}
                <div
                  class="tab-pane fade"
                  id="brandsTab"
                  role="tabpanel"
                  aria-labelledby="tab-brands"
                >
                    <div class="d-flex justify-content-end mb-2">
                        <button
                          class="btn btn-success btn-sm"
                          data-bs-toggle="modal"
                          data-bs-target="#createBrandModal"
                        >
                          + Nueva Marca
                        </button>
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                              <tr
                                data-id="{{ $brand->id }}"
                                data-name="{{ $brand->name }}"
                                data-description="{{ $brand->description }}"
                              >
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->description }}</td>
                                <td class="text-center">
                                  <button
                                    class="btn btn-primary btn-sm btn-open-edit-brand"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editBrandModal"
                                  >
                                    Editar
                                  </button>
                                  <form
                                    action="{{ route('admin.brands.destroy', $brand->id) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('¿Eliminar esta marca?')"
                                  >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                      Eliminar
                                    </button>
                                  </form>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


{{-- ******************************************************************** --}}
{{-- 5) Modales para Categorías y Marcas (con campo “Descripción”) --}}
{{-- ******************************************************************** --}}

{{-- 5.1) Modal crear Categoría --}}
<div
  class="modal fade"
  id="createCategoryModal"
  tabindex="-1"
  aria-labelledby="createCategoryModalLabel"
  aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel">Nueva Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    {{-- Nombre --}}
                    <div class="mb-3">
                        <label for="category-name" class="form-label">Nombre</label>
                        <input
                          type="text"
                          class="form-control"
                          id="category-name"
                          name="name"
                          required
                        >
                    </div>
                    {{-- Descripción --}}
                    <div class="mb-3">
                        <label for="category-description" class="form-label">Descripción</label>
                        <textarea
                          class="form-control"
                          id="category-description"
                          name="description"
                          rows="3"
                        ></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Cancelar
                    </button>
                    <button type="submit" class="btn btn-success">
                      Crear
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- 5.2) Modal editar Categoría --}}
<div
  class="modal fade"
  id="editCategoryModal"
  tabindex="-1"
  aria-labelledby="editCategoryModalLabel"
  aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- Este formulario se completará dinámicamente con JS --}}
            <form id="form-edit-category" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Editar Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    {{-- ID oculto --}}
                    <input type="hidden" id="edit-category-id" name="category_id">

                    {{-- Nombre --}}
                    <div class="mb-3">
                        <label for="edit-category-name" class="form-label">Nombre</label>
                        <input
                          type="text"
                          class="form-control"
                          id="edit-category-name"
                          name="name"
                          required
                        >
                    </div>
                    {{-- Descripción --}}
                    <div class="mb-3">
                        <label for="edit-category-description" class="form-label">Descripción</label>
                        <textarea
                          class="form-control"
                          id="edit-category-description"
                          name="description"
                          rows="3"
                        ></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                      Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- 5.3) Modal crear Marca --}}
<div
  class="modal fade"
  id="createBrandModal"
  tabindex="-1"
  aria-labelledby="createBrandModalLabel"
  aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.brands.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createBrandModalLabel">Nueva Marca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    {{-- Nombre --}}
                    <div class="mb-3">
                        <label for="brand-name" class="form-label">Nombre</label>
                        <input
                          type="text"
                          class="form-control"
                          id="brand-name"
                          name="name"
                          required
                        >
                    </div>
                    {{-- Descripción --}}
                    <div class="mb-3">
                        <label for="brand-description" class="form-label">Descripción</label>
                        <textarea
                          class="form-control"
                          id="brand-description"
                          name="description"
                          rows="3"
                        ></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Cancelar
                    </button>
                    <button type="submit" class="btn btn-success">
                      Crear
                    </button>


                </div>
            </form>
        </div>
    </div>
</div>

{{-- 5.4) Modal editar Marca --}}
<div
  class="modal fade"
  id="editBrandModal"
  tabindex="-1"
  aria-labelledby="editBrandModalLabel"
  aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-edit-brand" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="editBrandModalLabel">Editar Marca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    {{-- ID oculto --}}
                    <input type="hidden" id="edit-brand-id" name="brand_id">

                    {{-- Nombre --}}
                    <div class="mb-3">
                        <label for="edit-brand-name" class="form-label">Nombre</label>
                        <input
                          type="text"
                          class="form-control"
                          id="edit-brand-name"
                          name="name"
                          required
                        >
                    </div>
                    {{-- Descripción --}}
                    <div class="mb-3">
                        <label for="edit-brand-description" class="form-label">Descripción</label>
                        <textarea
                          class="form-control"
                          id="edit-brand-description"
                          name="description"
                          rows="3"
                        ></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                      Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


{{-- ******************************************************************** --}}
{{-- 6) JavaScript para rellenar dinámicamente los modales de edición --}}
{{-- ******************************************************************** --}}
@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {

    // ----- PRODUCTOS: Rellenar modal de edición -----
    document.querySelectorAll('.btn-open-edit').forEach(btn => {
      btn.addEventListener('click', function() {
        const tr       = this.closest('tr');
        const id       = tr.dataset.id;
        const name     = tr.dataset.name;
        const slug     = tr.dataset.slug;
        const desc     = tr.dataset.description || '';
        const category = tr.dataset.category;
        const brand    = tr.dataset.brand;
        const price    = tr.dataset.price;
        const price2   = tr.dataset.price2 || '';
        const stock    = tr.dataset.stock;
        const status   = tr.dataset.status;
        const image    = tr.dataset.image;

        // Rellenar inputs del modal
        document.getElementById('edit-product-id').value  = id;
        document.getElementById('edit-name').value        = name;
        document.getElementById('edit-slug').value        = slug;
        document.getElementById('edit-description').value = desc;
        document.getElementById('edit-category').value    = category;
        document.getElementById('edit-brand').value       = brand;
        document.getElementById('edit-price').value       = price;
        document.getElementById('edit-price2').value      = price2;
        document.getElementById('edit-stock').value       = stock;
        document.getElementById('edit-status').value      = status;

        // Mostrar imagen actual en contenedor
        const imgContainer = document.getElementById('current-image-container');
        imgContainer.innerHTML = '';
        if (image) {
          const img = document.createElement('img');
          img.src            = '/storage/' + image;
          img.style.maxWidth  = '150px';
          img.style.maxHeight = '150px';
          img.style.objectFit = 'cover';
          imgContainer.appendChild(img);
        } else {
          imgContainer.innerHTML = '<small class="text-muted">Sin imagen</small>';
        }

        // Ajustar action del formulario de edición
        document.getElementById('form-edit-product').action = '/admin/products/' + id;

        // Ajustar action del formulario de eliminación:
        document.getElementById('form-delete-product').action = '/admin/products/' + id;
      });
    });

    // ----- CATEGORÍAS: Rellenar modal de edición -----
    document.querySelectorAll('.btn-open-edit-category').forEach(btn => {
      btn.addEventListener('click', function() {
        const tr   = this.closest('tr');
        const id   = tr.dataset.id;
        const name = tr.dataset.name;
        const desc = tr.dataset.description || '';

        document.getElementById('edit-category-id').value           = id;
        document.getElementById('edit-category-name').value         = name;
        document.getElementById('edit-category-description').value  = desc;
        document.getElementById('form-edit-category').action         = '/admin/categories/' + id;
      });
    });

    // ----- MARCAS: Rellenar modal de edición -----
    document.querySelectorAll('.btn-open-edit-brand').forEach(btn => {
      btn.addEventListener('click', function() {
        const tr   = this.closest('tr');
        const id   = tr.dataset.id;
        const name = tr.dataset.name;
        const desc = tr.dataset.description || '';

        document.getElementById('edit-brand-id').value           = id;
        document.getElementById('edit-brand-name').value         = name;
        document.getElementById('edit-brand-description').value  = desc;
        document.getElementById('form-edit-brand').action         = '/admin/brands/' + id;
      });
    });

  });
</script>
@endpush
