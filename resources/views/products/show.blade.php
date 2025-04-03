{{-- resources/views/products/show.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detalles del Producto</h1>

        <div class="form-group">
            <label for="name">Nombre</label>
            <p id="name">{{ $product->name }}</p>
        </div>

        <div class="form-group">
            <label for="price">Precio</label>
            <p id="price">${{ number_format($product->price, 2) }}</p>
        </div>

        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <p id="quantity">{{ $product->quantity }}</p>
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>
@endsection
