<?php

namespace App\Http\Controllers;

use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'orders_new' => Order::where('status', Order::STATUS_NEW)->count(),
            'orders_in_progress' => Order::where('status', Order::STATUS_IN_PROGRESS)->count(),
            'orders_completed' => Order::where('status', Order::STATUS_COMPLETED)->count(),
        ];
        $orders = Order::with(['user', 'driver', 'loader'])
            ->orderByDesc('created_at')
            ->limit(20)
            ->get();
        return view('dashboard.admin', compact('stats', 'orders'));
    }
}
