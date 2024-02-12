<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Cuisine;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cuisines = Cuisine::all();
        $products = Product::all();
        return view('admin.restaurants.create', compact('cuisines', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $formData = $request->validated();
        if ($request->hasFile('image')) {
            $path = Storage::put('images', $formData['image']);
            $formData['image'] = $path;
        }
        $newRestaurant = Restaurant::create($formData);
        if ($request->has('cuisines') && $request->has('products')) {
            $newRestaurant->cuisines()->attach($request->cuisines);
            $newRestaurant->products()->attach($request->products);
        }
        return to_route('admin.restaurants.show', $newRestaurant->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        $products = Product::where('restaurant_id', $restaurant->id)->get();
        return view('admin.restaurants.show', compact('restaurant', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        $cuisines = Cuisine::all();
        $products = Product::all();
        return view('admin.restaurants.edit', compact('restaurant', 'cuisines', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $formData = $request->validated();
        if ($request->hasFile('image')) {
            $path = Storage::put('images', $formData['image']);
            $formData['image'] = $path;
        }
        $restaurant->fill($formData);
        $restaurant->update($formData);
        if ($request->has('cuisines') && $request->has('products')) {
            $restaurant->cuisines()->sync($request->cuisines);
            $restaurant->products()->sync($request->products);
        } else {
            $restaurant->cuisines()->detach();
            $restaurant->products()->detach();
        }
        return to_route('admin.restaurants.show', $restaurant->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        if ($restaurant->image) {
            Storage::delete($restaurant->image);
        }
        $restaurant->delete();
        return to_route('admin.restaurants.index')->with('message', "'$restaurant->name' è stato eliminato con successo!");
    }
}
