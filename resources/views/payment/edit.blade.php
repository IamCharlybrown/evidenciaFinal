<!-- resources/views/payments/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Pago</h2>
    <form action="{{ route('payments.update', [$order->id, $payment->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="amount">Monto</label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ old('amount', $payment->amount) }}" required>
        </div>

        <div class="form-group">
            <label for="payment_method">Método de pago</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="credit_card" {{ $payment->payment_method == 'credit_card' ? 'selected' : '' }}>Tarjeta de Crédito</option>
                <option value="paypal" {{ $payment->payment_method == 'paypal' ? 'selected' : '' }}>PayPal</option>
                <option value="bank_transfer" {{ $payment->payment_method == 'bank_transfer' ? 'selected' : '' }}>Transferencia Bancaria</option>
            </select>
        </div>

        <div class="form-group">
            <label for="payment_date">Fecha de pago</label>
            <input type="date" name="payment_date" id="payment_date" class="form-control" value="{{ old('payment_date', $payment->payment_date) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Pago</button>
    </form>
</div>
@endsection
