<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    use HasFactory;

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
    protected $fillable = ['name', 'image'];

}
