@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Crear Nueva Orden</h1>

        <form action="{{ route('orders.store') }}" method="POST" class="mt-6 space-y-4">
            @csrf

            <div class="flex flex-col space-y-4">
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700">Usuario</label>
                    <select name="user_id" id="user_id"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                        <option value="">Selecciona un usuario</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
                    <select name="status" id="status"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                        <option value="pendiente">Pendiente</option>
                        <option value="pagada">Pagada</option>
                        <option value="cancelada">Cancelada</option>
                        <option value="entregada">Entregada</option>
                    </select>
                </div>

                <div>
                    <label for="total" class="block text-sm font-medium text-gray-700">Total</label>
                    <input type="number" name="total" id="total"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="w-full py-2 px-4"
                    style="background-color: #3182ce; color: white; font-weight: 600; border-radius: 0.375rem; transition: background-color 0.3s;">
                    Crear Orden
                </button>
            </div>
        </form>
    </div>
@endsection