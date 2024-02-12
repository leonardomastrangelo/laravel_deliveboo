<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class GuestRestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('guests.restaurants.index', compact('restaurants'));
    }
    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $products = $restaurant->products;
        return view('guests.restaurants.show', compact('restaurant', 'products'));
    }
}
