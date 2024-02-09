<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = file_get_contents(__DIR__ . '/data/products.json');
        $products = json_decode($products, true);
        foreach ($products as $product) {
            $newProduct = new Product();
            $newProduct->name = $product['name'];
            $newProduct->price = $product['price'];
            $newProduct->image = $product['image'];
            $newProduct->ingredients = $product['description'];
            $newProduct->availability = $product['availability'];
            $newProduct->save();
        }
    }
}
