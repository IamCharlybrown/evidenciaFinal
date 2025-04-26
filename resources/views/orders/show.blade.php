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
            <!-- Order Images Section -->
            @if ($order->initial_image || $order->delivery_image)
                <div class="mt-6 bg-white shadow sm:rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Order Images</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @if ($order->initial_image)
                            <div>
                                <h3 class="text-md font-medium text-gray-600 mb-2">Initial Image</h3>
                                <img src="{{ asset('storage/' . $order->initial_image) }}" alt="Initial Image"
                                    class="w-full h-auto rounded-md shadow">
                            </div>
                        @endif

                        @if ($order->delivery_image)
                            <div>
                                <h3 class="text-md font-medium text-gray-600 mb-2">Delivery Image</h3>
                                <img src="{{ asset('storage/' . $order->delivery_image) }}" alt="Delivery Image"
                                    class="w-full h-auto rounded-md shadow">
                            </div>
                        @endif
                    </div>
                </div>
            @endif

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
                        <td class="px-4 py-3 text-sm font-semibold text-gray-900 shadow-md rounded-sm">
                            ${{ number_format($total, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Payments Section -->
        <div class="mt-6 bg-white shadow sm:rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Payment Information</h2>

            @if($order->payments->count() > 0)
                    <table class="min-w-full mt-4 table-auto">
                        <thead>
                            <tr class="border-b">
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Payment ID</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Method</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Amount</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Status</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Transaction ID</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPaid = 0;
                            @endphp

                            @foreach ($order->payments as $payment)
                                        @php
                                            if ($payment->status == 'completed') {
                                                $totalPaid += $payment->amount;
                                            }
                                        @endphp
                                        <tr class="border-b">
                                            <td class="px-4 py-2 text-sm text-gray-900">{{ $payment->id }}</td>
                                            <td class="px-4 py-2 text-sm text-gray-900">{{ ucfirst($payment->payment_method) }}</td>
                                            <td class="px-4 py-2 text-sm text-gray-900">${{ number_format($payment->amount, 2) }}</td>
                                            <td class="px-4 py-2 text-sm text-gray-900">
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                                                {{ $payment->status == 'completed' ? 'bg-green-100 text-green-800' :
                                    ($payment->status == 'pending' ? 'bg-yellow-100 text-yellow-800' :
                                        'bg-red-100 text-red-800') }}">
                                                    {{ ucfirst($payment->status) }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-2 text-sm text-gray-900">{{ $payment->transaction_id ?? 'N/A' }}</td>
                                            <td class="px-4 py-2 text-sm text-gray-900">{{ $payment->created_at->format('d/m/Y H:i') }}</td>
                                        </tr>
                            @endforeach

                            <!-- Payment Summary -->
                            <tr class="bg-gray-50">
                                <td colspan="2" class="px-4 py-3 text-sm font-medium text-gray-900 text-right">Total Paid:</td>
                                <td class="px-4 py-3 text-sm font-semibold text-gray-900">${{ number_format($totalPaid, 2) }}</td>
                                <td colspan="3" class="px-4 py-3 text-sm font-medium text-gray-900">
                                    @php
                                        $remaining = $total - $totalPaid;
                                    @endphp
                                    @if($remaining > 0)
                                        <span class="text-red-600 font-semibold">
                                            Remaining: ${{ number_format($remaining, 2) }}
                                        </span>
                                    @elseif($remaining == 0)
                                        <span class="text-green-600 font-semibold">
                                            Fully Paid
                                        </span>
                                    @else
                                        <span class="text-blue-600 font-semibold">
                                            Overpaid: ${{ number_format(abs($remaining), 2) }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
            @else
                <div class="mt-4 p-4 bg-gray-50 rounded-md text-gray-700">
                    No payment records found for this order.
                </div>
            @endif
        </div>

        <div class="mt-6">
            <a href="{{ route('orders.index') }}" class="px-4 py-2 rounded-md text-white"
                style="background-color: #2563eb; hover:background-color: #1d4ed8;">
                Volver
            </a>
        </div>
    </div>
@endsection