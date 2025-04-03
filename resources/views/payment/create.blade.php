<!-- resources/views/payments/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Pago</h2>
    <form action="{{ route('payments.store', $order->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="amount">Monto</label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ old('amount') }}" required>
        </div>

        <div class="form-group">
            <label for="payment_method">Método de pago</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="credit_card">Tarjeta de Crédito</option>
                <option value="paypal">PayPal</option>
                <option value="bank_transfer">Transferencia Bancaria</option>
            </select>
        </div>

        <div class="form-group">
            <label for="payment_date">Fecha de pago</label>
            <input type="date" name="payment_date" id="payment_date" class="form-control" value="{{ old('payment_date') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Pago</button>
    </form>
</div>
@endsection
