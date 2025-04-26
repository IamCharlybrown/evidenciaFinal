<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
        return view('orders.create', compact('users'));
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:pendiente,pagada,cancelada,entregada',
            'total' => 'required|numeric|min:0',
            'initial_image' => 'nullable|image|max:2048',
        ]);

        // Procesamiento de la imagen inicial
        $initialImagePath = null;
        if ($request->hasFile('initial_image')) {
            $initialImagePath = $request->file('initial_image')->store('orders', 'public');
        }

        // Crea una nueva orden
        $order = Order::create([
            'user_id' => $request->user_id,
            'status' => $request->status,
            'total' => $request->total,
            'initial_image' => $initialImagePath,
            'delivery_image' => null,
        ]);

        // Redirige al índice de órdenes con un mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'Orden creada correctamente');
    }

    public function show(Order $order)
    {
        // Devuelve la vista con los detalles de la orden sin verificación de permisos
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $users = User::all();
        // Devuelve la vista para editar la orden sin verificación de permisos
        return view('orders.edit', compact('order', 'users'));
    }

    public function update(Request $request, Order $order)
    {
        // Validación de los datos
        $request->validate([
            'status' => 'required|in:pendiente,pagada,cancelada,entregada',
            'total' => 'required|numeric|min:0',
            'initial_image' => 'nullable|image|max:2048',
            'delivery_image' => 'nullable|image|max:2048',
        ]);

        // Datos para actualizar
        $data = [
            'status' => $request->status,
            'total' => $request->total,
        ];

        // Procesamiento de la imagen inicial
        if ($request->hasFile('initial_image')) {
            // Eliminar la imagen anterior si existe
            if ($order->initial_image) {
                Storage::disk('public')->delete($order->initial_image);
            }

            $data['initial_image'] = $request->file('initial_image')->store('orders', 'public');
        }

        // Procesamiento de la imagen de entrega
        if ($request->hasFile('delivery_image')) {
            // Eliminar la imagen anterior si existe
            if ($order->delivery_image) {
                Storage::disk('public')->delete($order->delivery_image);
            }

            $data['delivery_image'] = $request->file('delivery_image')->store('orders', 'public');
        }

        // Actualiza la orden con los datos
        $order->update($data);

        // Redirige con mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'Orden actualizada correctamente');
    }

    public function destroy(Order $order)
    {
        // Eliminar imágenes asociadas
        if ($order->initial_image) {
            Storage::disk('public')->delete($order->initial_image);
        }

        if ($order->delivery_image) {
            Storage::disk('public')->delete($order->delivery_image);
        }

        // Elimina la orden
        $order->delete();

        // Redirige con mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'Orden eliminada correctamente');
    }
}