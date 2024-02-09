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
        $restaurants = Restaurant::all();

        foreach ($products as $product) {
            $newProduct = new Product();
            $newProduct->name = $product['name'];
            $newProduct->price = $product['price'];
            $newProduct->image = ProductSeeder::storeImage($product['name']);
            $newProduct->ingredients = $product['description'];
            $newProduct->availability = $product['availability'];
            $newProduct->save();
            $newProduct->restaurant()->sync($restaurants->random(1));
        }
    }
    public static function storeImage($img)
    {
        $low_case = strtolower(str_replace('', '', $img));
        $contents = file_get_contents(resource_path('img/products/' . $low_case));
        $path = 'products/' . $low_case;
        Storage::put($path, $contents);
        return $path;
    }
}
