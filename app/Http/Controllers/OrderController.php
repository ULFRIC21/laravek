<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $query = Order::query();

        if ($user->isAdmin()) {
            $query->whereIn('status', [Order::STATUS_NEW, Order::STATUS_IN_PROGRESS, Order::STATUS_POSTPONED]);
        } elseif ($user->isDriver()) {
            $query->where('driver_id', $user->id)
                ->whereIn('status', [Order::STATUS_NEW, Order::STATUS_IN_PROGRESS]);
        } elseif ($user->isLoader()) {
            $query->where('loader_id', $user->id)
                ->whereIn('status', [Order::STATUS_NEW, Order::STATUS_IN_PROGRESS]);
        } else {
            $query->where('user_id', $user->id)
                ->whereIn('status', [Order::STATUS_NEW, Order::STATUS_IN_PROGRESS, Order::STATUS_POSTPONED]);
        }

        $orders = $query->orderByDesc('created_at')->get();

        return view('dashboard.orders', [
            'orders' => $orders,
            'userRole' => $user->role,
        ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        if (! $user->isClient()) {
            return redirect()->route('orders.index')->with('error', 'Только заказчики могут создавать новые заказы.');
        }

        $request->validate([
            'from_address' => 'required|string|max:255',
            'to_address' => 'required|string|max:255',
            'weight' => 'nullable|numeric|min:0',
            'volume' => 'nullable|numeric|min:0',
            'contact_phone' => 'nullable|string|max:50',
        ]);

        Order::create([
            'user_id' => $user->id,
            'from_address' => $request->from_address,
            'to_address' => $request->to_address,
            'weight' => $request->weight,
            'volume' => $request->volume,
            'contact_phone' => $request->contact_phone ?? $user->phone,
            'status' => Order::STATUS_NEW,
        ]);

        return redirect()->route('orders.index')->with('success', 'Заказ создан.');
    }

    public function execute(int $id)
    {
        $user = auth()->user();
        if (! $user->isAdmin()) {
            abort(403);
        }

        $order = Order::findOrFail($id);
        $drivers = User::where('role', 'driver')->orderBy('name')->get();
        $loaders = User::where('role', 'loader')->orderBy('name')->get();

        return view('dashboard.order-execute', compact('order', 'drivers', 'loaders'));
    }

    public function assign(Request $request, int $id)
    {
        $user = auth()->user();
        if (! $user->isAdmin()) {
            abort(403);
        }

        $order = Order::findOrFail($id);
        $request->validate([
            'driver_id' => 'nullable|exists:users,id',
            'loader_id' => 'nullable|exists:users,id',
            'price' => 'nullable|numeric|min:0',
            'contact_phone' => 'nullable|string|max:50',
            'scheduled_at' => 'nullable|date',
            'arrival_at' => 'nullable|date|after_or_equal:scheduled_at',
            'action' => 'required|string|in:assign,postpone',
        ]);

        $order->driver_id = $request->input('driver_id') ?: null;
        $order->loader_id = $request->input('loader_id') ?: null;
        $order->price = $request->input('price');
        $order->contact_phone = $request->input('contact_phone');
        $order->scheduled_at = $request->input('scheduled_at');
        $order->arrival_at = $request->input('arrival_at');

        if ($request->input('action') === 'postpone') {
            $order->status = Order::STATUS_POSTPONED;
        } else {
            $order->status = Order::STATUS_IN_PROGRESS;
            $order->assigned_at = $order->assigned_at ?? now();
        }

        $order->save();

        return redirect()->route('orders.execute', $order->id)->with('success', 'Заказ обновлён.');
    }

    public function completeForm(int $id)
    {
        $user = auth()->user();
        $order = Order::findOrFail($id);

        if (! $user->isAdmin() && ! ($user->isDriver() && $order->driver_id === $user->id) && ! ($user->isLoader() && $order->loader_id === $user->id)) {
            abort(403);
        }

        return view('dashboard.order-complete', compact('order'));
    }

    public function cancel(int $id)
    {
        $user = auth()->user();
        if (! $user->isAdmin()) {
            abort(403);
        }

        $order = Order::findOrFail($id);
        $order->status = Order::STATUS_CANCELLED;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Заказ отклонён.');
    }

    public function complete(Request $request, int $id)
    {
        $user = auth()->user();
        $order = Order::findOrFail($id);

        if (! $user->isAdmin() && ! ($user->isDriver() && $order->driver_id === $user->id) && ! ($user->isLoader() && $order->loader_id === $user->id)) {
            abort(403);
        }

        $order->comment = $request->input('comment');
        $order->status = Order::STATUS_COMPLETED;
        $order->completed_at = now();
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Заказ завершён.');
    }
}
