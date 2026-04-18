<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function requests()
    {
        $requests = User::whereIn('role', ['driver_request', 'loader_request'])
            ->orderByDesc('created_at')
            ->get();

        return view('dashboard.admin-requests', compact('requests'));
    }

    public function approveRequest(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        if ($user->role === 'driver_request') {
            $user->role = 'driver';
        } elseif ($user->role === 'loader_request') {
            $user->role = 'loader';
        }
        $user->approved = true;
        $user->save();

        return redirect()->route('admin.requests')->with('success', 'Заявка принята.');
    }
}
