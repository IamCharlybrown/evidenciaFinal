@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Edit user</h1>

        <form action="{{ route('users.update', $user) }}" method="POST" class="mt-6 space-y-4">
            @csrf
            @method('PUT')

            <div class="flex flex-col space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Mail</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">New password</label>
                    <input type="password" name="password" id="password"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Modify role</label>
                    <div class="mt-2 space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="role" value="user" class="form-radio" {{ $user->role === 'user' ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-900">User</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="role" value="admin" class="form-radio" {{ $user->role === 'admin' ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-900">Admin</span>
                        </label>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="w-full py-2 px-4"
                        style="background-color: #3182ce; color: white; font-weight: 600; border-radius: 0.375rem; transition: background-color 0.3s;">Edit
                        user</button>
                </div>
        </form>
    </div>
@endsection