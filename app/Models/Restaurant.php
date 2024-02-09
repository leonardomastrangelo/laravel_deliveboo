<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Cuisine;
use App\Models\Product;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'address', 'phone_number', 'email', 'image', 'pick_up', 'description', 'vat', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cuisines()
    {
        return $this->belongsToMany(Cuisine::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
