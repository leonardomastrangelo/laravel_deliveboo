<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['address', 'email', 'restaurant_id', 'name', 'phone_number', 'surname', 'amount'];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

