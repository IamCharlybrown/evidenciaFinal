@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Orden #{{ $order->id }}</h1>

        <div class="mt-6 bg-white shadow sm:rounded-lg p-6">
            <dl class="divide-y divide-gray-200">
                <div class="py-3 flex justify-between">
                    <dt class="text-sm font-medium text-gray-500">Usuario</dt>
                    <dd class="text-sm text-gray-900">{{ $order->user->name }}</dd>
                </div>
                <div class="py-3 flex justify-between">
                    <dt class="text-sm font-medium text-gray-500">Estado</dt>
                    <dd class="text-sm font-semibold text-gray-900">{{ ucfirst($order->status) }}</dd>
                </div>
                <div class="py-3 flex justify-between">
                    <dt class="text-sm font-medium text-gray-500">Total</dt>
                    <dd class="text-sm text-gray-900">${{ number_format($order->total, 2) }}</dd>
                </div>
                <div class="py-3 flex justify-between">
                    <dt class="text-sm font-medium text-gray-500">Fecha</dt>
                    <dd class="text-sm text-gray-900">{{ $order->created_at->format('d/m/Y') }}</dd>
                </div>
            </dl>
        </div>

        <div class="mt-6">
            <a href="{{ route('orders.index') }}"
                class="px-4 py-2 rounded-md text-white"
                style="background-color: #2563eb; hover:background-color: #1d4ed8;">
                Volver
            </a>
        </div>
    </div>
@endsection
