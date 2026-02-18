<?php

namespace App\Http\Controllers;

use App\Models\Order;

class LoaderController extends Controller
{
    public function index()
    {
        $tasks = Order::where('loader_id', auth()->id())
            ->whereIn('status', [Order::STATUS_NEW, Order::STATUS_IN_PROGRESS])
            ->orderByDesc('created_at')
            ->get();
        return view('dashboard.loader', compact('tasks'));
    }
}
