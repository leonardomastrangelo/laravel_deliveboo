<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Cuisine;
use App\Models\Restaurant;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->id();
        $restaurants = Restaurant::where('user_id', $user_id)->get();
        $users = User::all();
        return view('admin.users.index', compact('restaurants', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreUserRequest $request)
    // {
    //     $formData = $request->validated();

    //     if ($request->hasFile('image') && $request->file('image')->isValid()) {
    //         $path = Storage::put('images', $formData['image']);
    //         $formData['image'] = $path;
    //     }

    //     $newUser = User::create($formData);

    //     if ($request->has('cuisines') && $request->has('products')) {
    //         $newUser->cuisines()->attach($request->cuisines);
    //         $newUser->products()->attach($request->products);
    //     }

    //     return redirect()->route('admin.users.show', $newUser->id);
    // }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $restaurants = Restaurant::where('user_id', $user->id)->get();
        return view('admin.users.show', compact('user', 'restaurants'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $cuisines = Cuisine::all();
        $products = Product::all();
        $restaurants = Restaurant::all();
        return view('admin.users.edit', compact('user', 'cuisines', 'products', 'restaurants'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateUserRequest $request, User $user)
    // {
    //     $formData = $request->validated();

    //     if ($request->hasFile('image') && $request->file('image')->isValid()) {
    //         $path = Storage::put('images', $formData['image']);
    //         $formData['image'] = $path;
    //     }

    //     $user->fill($formData);
    //     $user->save();

    //     if ($request->has('cuisines') && $request->has('products')) {
    //         $user->cuisines()->sync($request->cuisines);
    //         $user->products()->sync($request->products);
    //     } else {
    //         $user->cuisines()->detach();
    //         $user->products()->detach();
    //     }

    //     return redirect()->route('admin.users.show', $user->id);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->image) {
            Storage::delete($user->image);
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('message', "'$user->name' è stato eliminato con successo!");
    }
}
