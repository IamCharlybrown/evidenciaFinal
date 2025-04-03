@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Item de la Orden #{{ $order->id }}</h1>

        <p><strong>Producto:</strong> {{ $orderItem->product_name }}</p>
        <p><strong>Cantidad:</strong> {{ $orderItem->quantity }}</p>
        <p><strong>Precio Unitario:</strong> ${{ number_format($orderItem->price_unit, 2) }}</p>
        <p><strong>Subtotal:</strong> ${{ number_format($orderItem->subtotal, 2) }}</p>

        <a href="{{ route('order_items.edit', [$order->id, $orderItem->id]) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('order_items.destroy', [$order->id, $orderItem->id]) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
@endsection
