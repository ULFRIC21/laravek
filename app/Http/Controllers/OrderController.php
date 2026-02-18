<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::whereIn('status', [Order::STATUS_NEW, Order::STATUS_IN_PROGRESS])
            ->orderByDesc('created_at')
            ->get();
        return view('dashboard.orders', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'from_address' => 'required|string|max:255',
            'to_address' => 'required|string|max:255',
            'weight' => 'nullable|numeric|min:0',
            'volume' => 'nullable|numeric|min:0',
        ]);
        Order::create([
            'user_id' => auth()->id(),
            'from_address' => $request->from_address,
            'to_address' => $request->to_address,
            'weight' => $request->weight,
            'volume' => $request->volume,
            'status' => Order::STATUS_NEW,
        ]);
        return redirect()->route('orders.index')->with('success', 'Заказ создан.');
    }

    public function execute(int $id)
    {
        $order = Order::findOrFail($id);
        $drivers = User::where('role', 'driver')->orderBy('name')->get();
        $loaders = User::where('role', 'loader')->orderBy('name')->get();
        return view('dashboard.order-execute', compact('order', 'drivers', 'loaders'));
    }

    public function assign(Request $request, int $id)
    {
        $order = Order::findOrFail($id);
        $order->driver_id = $request->input('driver_id') ?: null;
        $order->loader_id = $request->input('loader_id') ?: null;
        $order->status = Order::STATUS_IN_PROGRESS;
        $order->assigned_at = $order->assigned_at ?? now();
        $order->save();
        return redirect()->route('orders.execute', $order->id)->with('success', 'Назначено.');
    }

    public function completeForm(int $id)
    {
        $order = Order::findOrFail($id);
        return view('dashboard.order-complete', compact('order'));
    }

    public function complete(Request $request, int $id)
    {
        $order = Order::findOrFail($id);
        $order->comment = $request->input('comment');
        $order->status = Order::STATUS_COMPLETED;
        $order->completed_at = now();
        $order->save();
        return redirect()->route('orders.index')->with('success', 'Заказ завершён.');
    }
}
