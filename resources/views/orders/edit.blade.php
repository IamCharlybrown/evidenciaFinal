@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Orden #{{ $order->id }}</h1>
    
    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select class="form-control" name="status">
                <option value="pendiente" {{ $order->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="pagada" {{ $order->status == 'pagada' ? 'selected' : '' }}>Pagada</option>
                <option value="cancelada" {{ $order->status == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                <option value="entregada" {{ $order->status == 'entregada' ? 'selected' : '' }}>Entregada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
