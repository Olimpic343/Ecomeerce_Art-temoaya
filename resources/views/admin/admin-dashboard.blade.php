@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
<section class="breadcrumb-section pt-0">
  <!-- ... tu breadcrumb ... -->
</section>

<section class="admin-panel mt-4">
  <div class="container">
    <div class="row g-3">

      <div class="col-md-4">
        <a href="{{ route('admin.products.index') }}"
           class="btn btn-outline-primary w-100">
          📦 Gestionar Productos
        </a>
      </div>

      <div class="col-md-4">
        <a href="{{ route('admin.inventory.index') }}"
           class="btn btn-outline-secondary w-100">
           📊 Inventario
        </a>
      </div>

      {{-- Nuevo botón “Dashboard” que abre/cierra el collapse --}}
      <div class="col-md-4">
  <a href="{{ route('admin.orders.index') }}"
     class="btn btn-outline-info w-100">
    🛒 Dashboard de Órdenes
  </a>
</div>


    </div>


  </div>
</section>
@endsection
