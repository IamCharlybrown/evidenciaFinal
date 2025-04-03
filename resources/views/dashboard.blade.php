<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 700; font-size: 1.5rem; color: #1a365d; margin-bottom: 1.5rem; border-bottom: 2px solid #3182ce; padding-bottom: 0.5rem;">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('content')
        <div style="padding: 3rem 0; background-color: #f7fafc;">
            <div style="max-width: 1200px; margin: 0 auto; padding: 0 2rem;">
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem;">
                    <!-- Card Users -->
                    <div style="background-color: white; border-radius: 0.5rem; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); padding: 2rem; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #2c5282; margin-bottom: 0.75rem;">Users</h3>
                        <p style="color: #4a5568; margin-bottom: 1.5rem;">Manage users in the system.</p>
                        <a href="{{ route('users.index') }}" style="background-color: #3182ce; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; text-decoration: none; font-weight: 600; display: inline-block; text-align: center; transition: all 0.3s ease; border: none; cursor: pointer;">View Users</a>
                    </div>

                    <!-- Card Products -->
                    <div style="background-color: white; border-radius: 0.5rem; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); padding: 2rem; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #2c5282; margin-bottom: 0.75rem;">Products</h3>
                        <p style="color: #4a5568; margin-bottom: 1.5rem;">Manage products in the system.</p>
                        <a href="{{ route('products.index') }}" style="background-color: #3182ce; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; text-decoration: none; font-weight: 600; display: inline-block; text-align: center; transition: all 0.3s ease; border: none; cursor: pointer;">View Products</a>
                    </div>

                    <!-- Card Order Items -->
                    <div style="background-color: white; border-radius: 0.5rem; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); padding: 2rem; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #2c5282; margin-bottom: 0.75rem;">Order Items</h3>
                        <p style="color: #4a5568; margin-bottom: 1.5rem;">Manage items within orders.</p>
                        <a href="{{ route('order_items.index') }}" style="background-color: #3182ce; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; text-decoration: none; font-weight: 600; display: inline-block; text-align: center; transition: all 0.3s ease; border: none; cursor: pointer;">View Order Items</a>
                    </div>

                    <!-- Card Payments -->
                    <div style="background-color: white; border-radius: 0.5rem; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); padding: 2rem; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #2c5282; margin-bottom: 0.75rem;">Payments</h3>
                        <p style="color: #4a5568; margin-bottom: 1.5rem;">Manage payments in the system.</p>
                        <a href="{{ route('payments.index') }}" style="background-color: #3182ce; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; text-decoration: none; font-weight: 600; display: inline-block; text-align: center; transition: all 0.3s ease; border: none; cursor: pointer;">View Payments</a>
                    </div>
                </div>

                <!-- Large Rectangle for Orders -->
                <div style="background-color: white; border-radius: 0.5rem; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); padding: 2.5rem; margin-top: 2.5rem; transition: transform 0.3s ease, box-shadow 0.3s ease; border-left: 5px solid #3182ce;">
                    <h3 style="font-size: 1.75rem; font-weight: 700; color: #2c5282; margin-bottom: 1rem;">Orders</h3>
                    <p style="color: #4a5568; margin-bottom: 1.5rem; font-size: 1.1rem;">Manage all the orders in the system.</p>
                    <a href="{{ route('orders.index') }}" style="background-color: #3182ce; color: white; padding: 0.875rem 1.75rem; border-radius: 0.5rem; text-decoration: none; font-weight: 600; display: inline-block; text-align: center; transition: all 0.3s ease; border: none; cursor: pointer; font-size: 1.1rem;">View Orders</a>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>