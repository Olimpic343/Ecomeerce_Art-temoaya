@extends('layouts.app')

@section('title','Crear Producto')

@section('content')
<div class="container py-4">
    <h2>Nuevo Producto</h2>

    <form action="{{ route('admin.products.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        @include('admin.products._form')

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
