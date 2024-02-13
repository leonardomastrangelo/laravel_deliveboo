<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Restaurant;

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
            $newProduct->image = ProductSeeder::storeImage($product['name']);
            $newProduct->ingredients = $product['ingredients'];
            $newProduct->availability = $product['availability'];
            $newProduct->restaurant_id = $product['restaurant_id'];
            $newProduct->save();
        }
    }
    public static function storeImage($img)
    {
        $low_case = strtolower(str_replace(' ', '', $img));
        $contents = file_get_contents(resource_path('img/products/' . $low_case . '.jpg'));
        $path = 'products/' . $low_case . '.jpg';
        Storage::disk('public')->putFile('products', $contents);
        return $path;
    }
}
