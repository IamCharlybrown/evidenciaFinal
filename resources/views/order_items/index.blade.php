@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Orden #{{ $order->id }} - Items</h1>

        <a href="{{ route('order_items.create', $order->id) }}" class="btn btn-primary">Agregar Item</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->price_unit, 2) }}</td>
                        <td>${{ number_format($item->subtotal, 2) }}</td>
                        <td>
                            <a href="{{ route('order_items.edit', [$order->id, $item->id]) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('order_items.destroy', [$order->id, $item->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

