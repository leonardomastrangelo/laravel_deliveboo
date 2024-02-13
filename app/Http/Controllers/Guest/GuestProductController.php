<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class GuestProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('guests.products.show', compact('product'));
    }
}
