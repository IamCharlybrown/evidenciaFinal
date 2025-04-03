<!-- resources/views/payments/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pagos</h2>

    @if ($payments->isEmpty())
        <p>No hay pagos realizados para esta orden.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Monto</th>
                    <th>Método de pago</th>
                    <th>Fecha de pago</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ ucfirst($payment->payment_method) }}</td>
                        <td>{{ $payment->payment_date }}</td>
                        <td>
                            <a href="{{ route('payments.show', [$order->id, $payment->id]) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('payments.edit', [$order->id, $payment->id]) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('payments.destroy', [$order->id, $payment->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('payments.create', $order->id) }}" class="btn btn-success">Agregar Pago</a>
</div>
@endsection
