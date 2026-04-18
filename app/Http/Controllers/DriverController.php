<?php

namespace App\Http\Controllers;

use App\Models\Order;

class DriverController extends Controller
{
    public function index()
    {
        $orders = Order::where('driver_id', auth()->id())
            ->whereIn('status', [Order::STATUS_NEW, Order::STATUS_IN_PROGRESS])
            ->orderByDesc('created_at')
            ->get();
        return view('dashboard.driver', compact('orders'));
    }
}
