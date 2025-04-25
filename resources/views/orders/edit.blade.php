@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Editar Orden #{{ $order->id }}</h1>

        <div class="mt-6 bg-white shadow sm:rounded-lg p-6">
            <form action="{{ route('orders.update', $order) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
                    <select name="status" id="status"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="pendiente" {{ $order->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="pagada" {{ $order->status == 'pagada' ? 'selected' : '' }}>Pagada</option>
                        <option value="cancelada" {{ $order->status == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                        <option value="entregada" {{ $order->status == 'entregada' ? 'selected' : '' }}>Entregada</option>
                    </select>
                </div>

                <div>
                    <label for="total" class="block text-sm font-medium text-gray-700">Total</label>
                    <input type="number" step="0.01" name="total" id="total" value="{{ old('total', $order->total) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>

                <div>
                    <label for="initial_image" class="block text-sm font-medium text-gray-700">Imagen Inicial</label>
                    @if($order->initial_image)
                        <div class="mt-2 mb-3">
                            <img src="{{ Storage::url($order->initial_image) }}" alt="Imagen inicial" class="h-32 w-auto object-cover rounded">
                            <p class="text-xs text-gray-500 mt-1">Imagen actual</p>
                        </div>
                    @endif
                    <input type="file" name="initial_image" id="initial_image" accept="image/*"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <p class="text-xs text-gray-500 mt-1">Subir nueva imagen (opcional)</p>
                </div>

                <div>
                    <label for="delivery_image" class="block text-sm font-medium text-gray-700">Imagen de Entrega</label>
                    @if($order->delivery_image)
                        <div class="mt-2 mb-3">
                            <img src="{{ Storage::url($order->delivery_image) }}" alt="Imagen de entrega" class="h-32 w-auto object-cover rounded">
                            <p class="text-xs text-gray-500 mt-1">Imagen actual</p>
                        </div>
                    @endif
                    <input type="file" name="delivery_image" id="delivery_image" accept="image/*"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <p class="text-xs text-gray-500 mt-1">Subir nueva imagen (opcional)</p>
                </div>

                <div class="mt-4">
                    <button type="submit" class="w-full py-2 px-4 text-white font-semibold rounded-md"
                        style="background-color: #22c55e; transition: background-color 0.3s;">
                        Actualizar Orden
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-6">
            <a href="{{ route('orders.index') }}" class="px-4 py-2 rounded-md text-white"
                style="background-color: #2563eb; hover:background-color: #1d4ed8;">
                Volver
            </a>
        </div>
    </div>
@endsection