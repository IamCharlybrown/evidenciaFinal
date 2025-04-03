<!-- resources/views/payments/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Pago</h2>

    <div class="form-group">
        <label for="amount">Monto</label>
        <p id="amount">{{ $payment->amount }}</p>
    </div>

    <div class="form-group">
        <label for="payment_method">Método de pago</label>
        <p id="payment_method">{{ ucfirst($payment->payment_method) }}</p>
    </div>

    <div class="form-group">
        <label for="payment_date">Fecha de pago</label>
        <p id="payment_date">{{ $payment->payment_date }}</p>
    </div>

    <a href="{{ route('payments.edit', [$order->id, $payment->id]) }}" class="btn btn-warning">Editar Pago</a>
    <form action="{{ route('payments.destroy', [$order->id, $payment->id]) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar Pago</button>
    </form>
</div>
@endsection
