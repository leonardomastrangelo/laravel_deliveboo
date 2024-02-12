<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;

class Cuisine extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image'];

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }

}
