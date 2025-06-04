@extends('layouts.app')

@section('title','Detalle de Orden #'.$order->id)

@section('content')
<div class="container py-4">
  <h2>Detalle de Orden #{{ $order->id }}</h2>
  <p><strong>Usuario:</strong> {{ $order->user->name }} ({{ $order->user->email }})</p>
  <p><strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
  <p><strong>Estado:</strong> {{ ucfirst($order->status) }}</p>

  <h4 class="mt-4">Productos</h4>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Imagen</th>
          <th>Nombre</th>
          <th>Cantidad</th>
          <th>Precio unitario</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        @foreach($order->orderItems as $item)
        <tr>
          <td>
            @if($item->product->image)
              <img src="{{ asset('storage/'.$item->product->image) }}"
                   width="50" alt="">
            @endif
          </td>
          <td>{{ $item->product->name }}</td>
          <td>{{ $item->quantity }}</td>
          <td>${{ number_format($item->price,2) }}</td>
          <td>${{ number_format($item->quantity * $item->price,2) }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <h4 class="text-end">Total: $
    {{ number_format($order->orderItems->sum(fn($i)=> $i->quantity*$i->price),2) }}
  </h4>

  <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-3">
    ← Volver al listado
  </a>
</div>
@endsection
