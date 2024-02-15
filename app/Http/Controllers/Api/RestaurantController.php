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

            foreach ($cuisines as $cuisine) {
                $query->whereHas('cuisines', function ($q) use ($cuisine) {
                    $q->where('name', $cuisine);
                });
            }

            // Controlla che il numero di tipologie di cucina corrisponda a quello specificato
            $query->whereHas('cuisines', function ($q) use ($cuisines) {
                $q->whereIn('name', $cuisines);
            }, '=', count($cuisines));
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
