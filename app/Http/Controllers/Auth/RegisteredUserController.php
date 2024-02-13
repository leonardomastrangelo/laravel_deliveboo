<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cuisine;
use App\Models\Restaurant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $cuisines = Cuisine::all();
        return view('auth.register', compact('cuisines'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'min:3', 'max:255'],
            'phone_number' => ['nullable', 'string', 'min:3', 'max:20'],
            'vat' => ['required', 'string', 'min:11', 'max:11'],
            'image' => ['nullable'],
            'pick_up' => ['nullable', 'boolean'],
            'description' => ['nullable', 'string', 'min:3', 'max:255'],
            'cuisines' => ['required', 'exists:cuisines,id'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Restaurant::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'image' => $request->image->store('restaurants', 'public'),
            'pick_up' => $request->pick_up,
            'description' => $request->description,
            'vat' => $request->vat,
            'user_id' => $user->id,
        ])->cuisines()->attach($request->cuisines);


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

}
