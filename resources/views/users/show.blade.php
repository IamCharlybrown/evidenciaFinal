@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Detalles del Usuario</h1>

        <div class="mt-6 space-y-4">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Información de Usuario</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Detalles sobre el usuario</p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Nombre</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $user->name }}</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Correo Electrónico</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $user->email }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <a href="{{ route('users.index') }}" class="w-full py-2 px-4"
                style="background-color: #3182ce; color: white; font-weight: 600; border-radius: 0.375rem; transition: background-color 0.3s;">
                Regresar a la Lista de Usuarios
            </a>
        </div>
    </div>
@endsection