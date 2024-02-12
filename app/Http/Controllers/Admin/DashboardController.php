<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        $restaurants = Restaurant::where('user_id', auth()->user()->id)->get();
        return view('admin.dashboard', compact('restaurants'));
    }
}
