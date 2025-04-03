@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Order #{{ $order->id }}</h1>

        <div class="mt-6 bg-white shadow sm:rounded-lg p-6">
            <dl class="divide-y divide-gray-200">
                <div class="py-3 flex justify-between">
                    <dt class="text-sm font-medium text-gray-500">User</dt>
                    <dd class="text-sm text-gray-900">{{ $order->user->name }}</dd>
                </div>
                <div class="py-3 flex justify-between">
                    <dt class="text-sm font-medium text-gray-500">Order status</dt>
                    <dd class="text-sm font-semibold text-gray-900">{{ ucfirst($order->status) }}</dd>
                </div>
                <div class="py-3 flex justify-between">
                    <dt class="text-sm font-medium text-gray-500">Total</dt>
                    <dd class="text-sm text-gray-900">${{ number_format($order->total, 2) }}</dd>
                </div>
                <div class="py-3 flex justify-between">
                    <dt class="text-sm font-medium text-gray-500">Date</dt>
                    <dd class="text-sm text-gray-900">{{ $order->created_at->format('d/m/Y') }}</dd>
                </div>
            </dl>
        </div>

        <div class="mt-6 bg-white shadow sm:rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Order Products</h2>
            <table class="min-w-full mt-4 table-auto">
                <thead>
                    <tr class="border-b">
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Product</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Units</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Price per unit</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp

                    @foreach ($order->orderItems as $item)
                                    @php
                                        $total += $item->subtotal;
                                    @endphp
                                    <tr class="border-b">
                                        <td class="px-4 py-2 text-sm text-gray-900">{{ $item->product->name }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900">{{ $item->quantity }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900">${{ number_format($item->price_unit, 2) }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900">${{ number_format($item->subtotal, 2) }}</td>
                                    </tr>
                    @endforeach

                    <!-- Total row -->
                    <tr class="bg-gray-50">
                        <td colspan="3" class="px-4 py-3 text-sm font-medium text-gray-900 text-right">Total:</td>
                        <td class="px-4 py-3 text-sm font-semibold text-gray-900 shadow-md rounded-sm">${{ number_format($total, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('orders.index') }}" class="px-4 py-2 rounded-md text-white"
                style="background-color: #2563eb; hover:background-color: #1d4ed8;">
                Volver
            </a>
        </div>
    </div>
@endsection