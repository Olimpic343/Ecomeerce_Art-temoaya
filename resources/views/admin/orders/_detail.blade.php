{{-- Este es solo el contenido que irá dentro del modal --}}
<p><strong>Orden #{{ $order->id }}</strong></p>
<p><strong>Usuario:</strong> {{ $order->user->name }} ({{ $order->user->email }})</p>
<p><strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
<p><strong>Estado:</strong>
  <span class="badge bg-{{ $order->status=='paid'?'success':'warning' }}">
    {{ ucfirst($order->status) }}
  </span>
</p>

<h5 class="mt-4">Productos</h5>
<div class="table-responsive">
  <table class="table table-sm">
    <thead>
      <tr>
        <th>Imagen</th><th>Nombre</th><th>Cantidad</th><th>Precio</th><th>Subtotal</th>
      </tr>
    </thead>
    <tbody>
      @foreach($order->orderItems as $item)
      <tr>
        <td>
          @if($item->product->image)
            <img src="{{ asset('storage/'.$item->product->image) }}" width="40">
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

<p class="text-end"><strong>Total:</strong>
  ${{ number_format($order->orderItems->sum(fn($i)=> $i->quantity * $i->price),2) }}
</p>
