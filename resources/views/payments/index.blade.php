@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pagos de la Orden #{{ $order->id }}</h1>

    <div class="mb-4">
        <a href="{{ route('payments.create', $order->id) }}" class="btn btn-primary">Crear Pago</a>
    </div>

    @if ($payments->isEmpty())
        <p>No hay pagos registrados para esta orden.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>Metodo de Pago</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->payment_date }}</td>
                        <td>${{ number_format($payment->amount, 2) }}</td>
                        <td>{{ $payment->payment_method }}</td>
                        <td>
                            <a href="{{ route('payments.show', [$order->id, $payment->id]) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('payments.edit', [$order->id, $payment->id]) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('payments.destroy', [$order->id, $payment->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este pago?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
