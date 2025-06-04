@extends('layouts.app')

@section('title','Editar Producto')

@section('content')
<div class="container py-4">
    <h2>Editar: {{ $product->name }}</h2>

    <form action="{{ route('admin.products.update', $product) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Incluimos el partial con los campos --}}
        @include('admin.products._form')

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
