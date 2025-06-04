@extends('layouts.app')

@section('title','Editar Producto')

@section('content')

<div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" name="name"
           value="{{ old('name',$product->name ?? '') }}"
           class="form-control @error('name') is-invalid @enderror">
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Precio</label>
    <input type="number" step="0.01" name="price"
           value="{{ old('price',$product->price ?? '') }}"
           class="form-control @error('price') is-invalid @enderror">
    @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Marca</label>
    <select name="brand_id"
            class="form-select @error('brand_id') is-invalid @enderror">
        <option value="">-- Seleccionar --</option>
        @foreach($brands as $b)
            <option value="{{ $b->id }}"
                {{ old('brand_id',$product->brand_id ?? '') == $b->id ? 'selected':'' }}>
                {{ $b->name }}
            </option>
        @endforeach
    </select>
    @error('brand_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Descripción</label>
    <textarea name="description"
              class="form-control @error('description') is-invalid @enderror"
              rows="3">{{ old('description',$product->description ?? '') }}</textarea>
    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Imagen</label>
    <input type="file" name="image"
           class="form-control @error('image') is-invalid @enderror">
    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror

    @if(!empty($product->image))
        <img src="{{ asset('storage/'.$product->image) }}"
             width="80" class="mt-2">
    @endif
</div>

@endsection
