<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class OrderController extends Controller
{
    public function index()
    {
        // Obtén todas las órdenes, sin verificar si el usuario es admin o no
        $orders = Order::all();  // Ahora, se obtienen todas las órdenes sin importar el usuario

        // Devuelve la vista con las órdenes
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all(); 
        // Devuelve la vista para crear una nueva orden
        return view('orders.create',compact('users'));
    }

    public function store(Request $request)
    {
        // Crea una nueva orden
        $order = Order::create([
            'user_id' => $request->user_id,
            'status' => $request->status,
            'total' => $request->total,
        ]);

        // Redirige al índice de órdenes con un mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'Orden creada');
    }

    public function show(Order $order)
    {
        // Devuelve la vista con los detalles de la orden sin verificación de permisos
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        // Devuelve la vista para editar la orden sin verificación de permisos
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        // Actualiza la orden con los datos del formulario
        $order->update($request->all());

        // Redirige con mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'Orden actualizada');
    }

    public function destroy(Order $order)
    {
        // Elimina la orden
        $order->delete();

        // Redirige con mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'Orden eliminada');
    }
}
