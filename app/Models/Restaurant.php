<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'address', 'phone_number', 'email', 'image', 'pick_up', 'description', 'vat', 'user_id'];

}
