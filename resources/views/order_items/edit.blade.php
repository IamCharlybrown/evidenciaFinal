@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Item de la Orden #{{ $order->id }}</h1>

        <form action="{{ route('order_items.update', [$order->id, $orderItem->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="product_name" class="form-label">Producto</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $orderItem->product_name }}" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $orderItem->quantity }}" required min="1">
            </div>

            <div class="mb-3">
                <label for="price_unit" class="form-label">Precio Unitario</label>
                <input type="number" class="form-control" id="price_unit" name="price_unit" value="{{ $orderItem->price_unit }}" required min="0" step="0.01">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
