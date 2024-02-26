<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $restaurant = Restaurant::where('user_id', auth()->user()->id)->firstOrFail();

        // Ottieni tutti gli ordini ordinati per data di creazione discendente
        $query = Order::where('restaurant_id', $restaurant->id)
            ->orderBy('created_at', 'desc');

        // Applica il filtro per l'indirizzo se è stato fornito nella richiesta
        if ($request->has('address')) {
            $query->where('address', 'LIKE', "%$request->address%");
        }

        $address = $request->get('address');

        $orders = $query->get();

        // Raggruppa gli ordini per mese
        $ordersByMonth = $orders->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });

        return view('admin.orders.index', compact('ordersByMonth', 'address'));
    }
    public function show($orderId)
    {
        $order = Order::findOrFail($orderId);

        // Verifica se l'utente ha accesso all'ordine tramite il ristorante associato all'ordine
        $restaurant = $order->restaurant;
        if (auth()->user()->id !== $restaurant->user_id) {
            abort(404);
        }

        return view('admin.orders.show', compact('order'));
    }


}