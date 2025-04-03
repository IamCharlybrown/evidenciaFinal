<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Obtén todas las órdenes si es admin, o solo las del usuario autenticado si no lo es
        $orders = auth()->user()->isAdmin() ? Order::all() : auth()->user()->orders;

        // Devuelve la vista con las órdenes
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        // Devuelve la vista para crear una nueva orden
        return view('orders.create');
    }

    public function store(Request $request)
    {
        // Crea una nueva orden
        $order = Order::create([
            'user_id' => auth()->id(),
            'status' => 'pendiente',
            'total' => 0
        ]);

        // Redirige al índice de órdenes con un mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'Orden creada');
    }

    public function show(Order $order)
    {
        // Verifica si el usuario tiene acceso a la orden
        if (!auth()->user()->isAdmin() && $order->user_id !== auth()->id()) {
            abort(403);
        }

        // Devuelve la vista con los detalles de la orden
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        // Verifica si el usuario tiene permisos para editar
        if (!auth()->user()->isAdmin() && $order->user_id !== auth()->id()) {
            abort(403);
        }

        // Devuelve la vista para editar la orden
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        // Verifica si el usuario tiene permisos para actualizar
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        // Actualiza la orden con los datos del formulario
        $order->update($request->all());

        // Redirige con mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'Orden actualizada');
    }

    public function destroy(Order $order)
    {
        // Verifica si el usuario tiene permisos para eliminar
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        // Elimina la orden
        $order->delete();

        // Redirige con mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'Orden eliminada');
    }
}
