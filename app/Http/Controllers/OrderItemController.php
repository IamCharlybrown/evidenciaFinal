<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index(Order $order)
    {
        // Obtenemos todos los items de la orden
        $orderItems = $order->orderItems;
        return view('order_items.index', compact('order', 'orderItems'));
    }

    public function create(Order $order)
    {
        $orders = Order::all();
        return view('order_items.create', compact('orders'));
    }

    public function store(Request $request, Order $order)
    {
        // Validamos la información recibida
        $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price_unit' => 'required|numeric|min:0',
        ]);

        // Creamos el nuevo item en la orden
        $orderItem = $order->orderItems()->create([
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'price_unit' => $request->price_unit,
            'subtotal' => $request->quantity * $request->price_unit,
        ]);

        // Redirigimos a la vista de los items de la orden
        return redirect()->route('order_items.index', $order->id)->with('success', 'Item agregado a la orden');
    }

    public function show(Order $order, OrderItem $orderItem)
    {
        return view('order_items.show', compact('order', 'orderItem'));
    }

    public function edit(Order $order, OrderItem $orderItem)
    {
        return view('order_items.edit', compact('order', 'orderItem'));
    }

    public function update(Request $request, Order $order, OrderItem $orderItem)
    {
        // Validamos la información recibida
        $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price_unit' => 'required|numeric|min:0',
        ]);

        // Actualizamos el item
        $orderItem->update([
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'price_unit' => $request->price_unit,
            'subtotal' => $request->quantity * $request->price_unit,
        ]);

        // Redirigimos a la vista de los items de la orden
        return redirect()->route('order_items.index', $order->id)->with('success', 'Item actualizado');
    }

    public function destroy(Order $order, OrderItem $orderItem)
    {
        // Eliminamos el item de la orden
        $orderItem->delete();

        // Redirigimos a la vista de los items de la orden
        return redirect()->route('order_items.index', $order->id)->with('success', 'Item eliminado');
    }
}
