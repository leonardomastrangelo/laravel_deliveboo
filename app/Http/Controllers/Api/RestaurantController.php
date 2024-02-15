<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Cuisine;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $all_cuisines = Cuisine::all();
        $cuisines = $request->input('cuisines');

        $query = Restaurant::with('cuisines')->with('products');

        if ($cuisines) {
            $cuisines = is_array($cuisines) ? $cuisines : [$cuisines];

            $query->whereHas('cuisines', function ($q) use ($cuisines) {
                $q->whereIn('name', $cuisines);
            });
        }

        $restaurants = $query->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants,
            'results2' => $all_cuisines,
        ]);
    }

    public function show($slug)
    {
        $restaurant = Restaurant::with('cuisines')->with('products')->where('slug', $slug)->get();
        return response()->json([
            'success' => true,
            'results' => $restaurant[0]
        ]);
    }
}
