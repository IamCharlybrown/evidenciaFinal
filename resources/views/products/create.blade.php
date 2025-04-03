{{-- resources/views/products/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Crear Producto</h1>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" required>
            </div>

            <div class="form-group">
                <label for="quantity">Cantidad</label>
                <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Crear Producto</button>
        </form>
    </div>
@endsection
