@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 ">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Users List</h1>

        <div class="my-4 justify-end flex">
            <a href="{{ route('users.create') }}" class="px-4 py-2 mb-4 rounded-md text-white"
                style="background-color: #2563eb; hover:background-color: #1d4ed8;">
                <i class="fas fa-plus"></i> New User
            </a>
        </div>

        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <table class="min-w-full table-auto ">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>


                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($users as $user)
                        <tr class="border-t">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->role }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right">
                                <a href="{{ route('users.show', $user) }}" class="text-green-600 hover:text-green-900"
                                    title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right">
                                <a href="{{ route('users.edit', $user) }}" class="text-blue-600 hover:text-blue-900 ml-4"
                                    title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right">
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-4" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection