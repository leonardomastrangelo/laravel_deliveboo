<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurant = Restaurant::where('user_id', auth()->user()->id)->firstOrFail();

        // Ottieni gli ordini raggruppati per mese
        $orders = Order::where('restaurant_id', $restaurant->id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('m');
            });
        // dd($orders);
        return view('admin.orders.index', compact('orders'));
    }
}
