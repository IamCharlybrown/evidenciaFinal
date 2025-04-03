<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Order $order)
    {
        // Verifica que el usuario sea el propietario de la orden o admin
        if (auth()->user()->id !== $order->user_id && !auth()->user()->isAdmin()) {
            abort(403);
        }

        // Obtiene los pagos de la orden
        $payments = $order->payments;

        return view('payments.index', compact('payments', 'order'));
    }

    public function create(Order $order)
    {
        // Verifica que el usuario sea el propietario de la orden o admin
        if (auth()->user()->id !== $order->user_id && !auth()->user()->isAdmin()) {
            abort(403);
        }

        return view('payments.create', compact('order'));
    }

    public function store(Request $request, Order $order)
    {
        // Verifica que el usuario sea el propietario de la orden o admin
        if (auth()->user()->id !== $order->user_id && !auth()->user()->isAdmin()) {
            abort(403);
        }

        // Validación de los datos de pago
        $request->validate([
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'payment_date' => 'required|date',
        ]);

        // Crea el pago
        $payment = Payment::create([
            'order_id' => $order->id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'payment_date' => $request->payment_date,
        ]);

        return redirect()->route('payments.index', $order->id)
            ->with('success', 'Pago creado con éxito');
    }

    public function show(Order $order, Payment $payment)
    {
        // Verifica que el usuario sea el propietario de la orden o admin
        if (auth()->user()->id !== $order->user_id && !auth()->user()->isAdmin()) {
            abort(403);
        }

        return view('payments.show', compact('payment', 'order'));
    }

    public function edit(Order $order, Payment $payment)
    {
        // Verifica que el usuario sea el propietario de la orden o admin
        if (auth()->user()->id !== $order->user_id && !auth()->user()->isAdmin()) {
            abort(403);
        }

        return view('payments.edit', compact('payment', 'order'));
    }

    public function update(Request $request, Order $order, Payment $payment)
    {
        // Verifica que el usuario sea el propietario de la orden o admin
        if (auth()->user()->id !== $order->user_id && !auth()->user()->isAdmin()) {
            abort(403);
        }

        // Validación de los datos de pago
        $request->validate([
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'payment_date' => 'required|date',
        ]);

        // Actualiza el pago
        $payment->update([
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'payment_date' => $request->payment_date,
        ]);

        return redirect()->route('payments.index', $order->id)
            ->with('success', 'Pago actualizado con éxito');
    }

    public function destroy(Order $order, Payment $payment)
    {
        // Verifica que el usuario sea el propietario de la orden o admin
        if (auth()->user()->id !== $order->user_id && !auth()->user()->isAdmin()) {
            abort(403);
        }

        // Elimina el pago
        $payment->delete();

        return redirect()->route('payments.index', $order->id)
            ->with('success', 'Pago eliminado con éxito');
    }
}
