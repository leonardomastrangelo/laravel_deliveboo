<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurant = Restaurant::where('user_id', auth()->user()->id)->get();
        $orders = $restaurant[0]->orders;
        if (auth()->user()->id !== $restaurant[0]->user_id) {
            abort(404);
        }
        return view('admin.orders.index', compact('orders'));
    }
}
