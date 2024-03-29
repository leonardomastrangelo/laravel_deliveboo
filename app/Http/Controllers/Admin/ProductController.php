<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Restaurant;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Restaurant $restaurant)
    {
        $restaurant_found = Restaurant::findOrFail($request->restaurant_id);
        return view('admin.products.create', ['restaurant_id' => $restaurant_found]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, Product $product, Restaurant $restaurant)
    {

        $formData = $request->validated();

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->putFile('products', $formData['image']);
            $formData['image'] = $path;
        }
        $formData['restaurant_id'] = $request->restaurant_id;
        $product = Product::create($formData);
        if ($request->has('restaurant')) {
            $product->restaurant()->attach($request->restaurant);
        }
        return redirect()->route('admin.products.show', $product->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, Restaurant $restaurant)
    {
        $restaurant = $product->restaurant;
        if (auth()->user()->id !== $restaurant->user_id) {
            abort(404);
        }
        return view('admin.products.show', compact('product', 'restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        if (auth()->user()->id !== $product->restaurant->user_id) {
            abort(404);
        }
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $formData = $request->validated();

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $path = Storage::disk('public')->putFile('products', $formData['image']);
            $formData['image'] = $path;
        }
        $product->fill($formData);
        $product->update();
        return redirect()->route('admin.products.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (auth()->user()->id !== $product->restaurant->user_id) {
            abort(404);
        }
        $restaurant_slug = $product->restaurant->slug;
        $restaurant_id = $product->restaurant->id;
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        $trashed_elements = Product::where('restaurant_id', $restaurant_id)->onlyTrashed()->get();
        return redirect()->route('admin.restaurants.show', $restaurant_slug)->with('message', "Il prodotto '$product->name' è stato eliminato con successo")->with('trashed', compact('trashed_elements'));
    }
}
