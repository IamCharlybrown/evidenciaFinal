@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Orden #{{ $order->id }}</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Usuario:</strong> {{ $order->user->name }}</li>
        <li class="list-group-item"><strong>Estado:</strong> {{ ucfirst($order->status) }}</li>
        <li class="list-group-item"><strong>Total:</strong> ${{ number_format($order->total, 2) }}</li>
        <li class="list-group-item"><strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y') }}</li>
    </ul>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
