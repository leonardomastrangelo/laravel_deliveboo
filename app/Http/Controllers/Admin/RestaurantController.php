<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($slug)
    {

        $restaurant = Restaurant::where('slug', $slug)->firstOrFail();
        $products = $restaurant->products;
        if (auth()->user()->id !== $restaurant->user_id) {
            abort(404);
        }
        return view('admin.restaurants.show', compact('restaurant', 'products'));
    }

}
