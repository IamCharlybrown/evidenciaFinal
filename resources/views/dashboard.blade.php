<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 600; font-size: 1.25rem; color: #2D3748; margin-bottom: 1rem;">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('content')
        <div style="padding: 3rem 0;">
            <div style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem;">
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem;">
                    <!-- Card Users -->
                    <div style="background-color: white; border-radius: 0.375rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5rem;">
                        <h3 style="font-size: 1.25rem; font-weight: 600; color: #2D3748;">Users</h3>
                        <p style="color: #4A5568;">Manage users in the system.</p>
                        <a href="{{ route('users.index') }}" style="background-color: #3B82F6; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; font-weight: 500; display: inline-block; text-align: center; transition: background-color 0.3s ease;">View Users</a>
                    </div>

                    <!-- Card Products -->
                    <div style="background-color: white; border-radius: 0.375rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5rem;">
                        <h3 style="font-size: 1.25rem; font-weight: 600; color: #2D3748;">Products</h3>
                        <p style="color: #4A5568;">Manage products in the system.</p>
                        <a href="{{ route('products.index') }}" style="background-color: #3B82F6; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; font-weight: 500; display: inline-block; text-align: center; transition: background-color 0.3s ease;">View Products</a>
                    </div>

                    <!-- Card Order Items -->
                    <div style="background-color: white; border-radius: 0.375rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5rem;">
                        <h3 style="font-size: 1.25rem; font-weight: 600; color: #2D3748;">Order Items</h3>
                        <p style="color: #4A5568;">Manage items within orders.</p>
                        <a href="{{ route('order_items.index') }}" style="background-color: #3B82F6; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; font-weight: 500; display: inline-block; text-align: center; transition: background-color 0.3s ease;">View Order Items</a>
                    </div>

                    <!-- Card Payments -->
                    <div style="background-color: white; border-radius: 0.375rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5rem;">
                        <h3 style="font-size: 1.25rem; font-weight: 600; color: #2D3748;">Payments</h3>
                        <p style="color: #4A5568;">Manage payments in the system.</p>
                        <a href="{{ route('payments.index') }}" style="background-color: #3B82F6; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; font-weight: 500; display: inline-block; text-align: center; transition: background-color 0.3s ease;">View Payments</a>
                    </div>
                </div>

                <!-- Large Rectangle for Orders -->
                <div style="background-color: white; border-radius: 0.375rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 2rem; margin-top: 2rem;">
                    <h3 style="font-size: 1.5rem; font-weight: 600; color: #2D3748;">Orders</h3>
                    <p style="color: #4A5568;">Manage all the orders in the system.</p>
                    <a href="{{ route('orders.index') }}" style="background-color: #3B82F6; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; text-decoration: none; font-weight: 600; display: inline-block; text-align: center; transition: background-color 0.3s ease;">View Orders</a>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
