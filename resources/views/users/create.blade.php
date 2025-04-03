@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Create new user</h1>

        <form action="{{ route('users.store') }}" method="POST" class="mt-6 space-y-4">
            @csrf

            <div class="flex flex-col space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Maik</label>
                    <input type="email" name="email" id="email"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="w-full py-2 px-4"
                    style="background-color: #3182ce; color: white; font-weight: 600; border-radius: 0.375rem; transition: background-color 0.3s;">
                    Create user
                </button>
            </div>
        </form>
    </div>
@endsection