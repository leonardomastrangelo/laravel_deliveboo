<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Cuisine;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(__DIR__ . '/data/restaurants.json');
        $restaurants = json_decode($json, true);
        $cuisines = Cuisine::all();

        foreach ($restaurants as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->slug = Str::slug($restaurant['name'], '-');
            $newRestaurant->address = $restaurant['address'];
            $newRestaurant->phone_number = $restaurant['phone_number'];
            $newRestaurant->email = $restaurant['email'];
            $newRestaurant->image = RestaurantSeeder::storeImage($restaurant['name']);
            $newRestaurant->pick_up = $restaurant['pick_up'];
            $newRestaurant->description = $restaurant['description'];
            $newRestaurant->vat = $restaurant['vat'];
            $newRestaurant->user_id = $restaurant['user_id'];
            $newRestaurant->save();
            $newRestaurant->cuisines()->sync($restaurant['cuisine_id']);
        }
    }

    public static function storeImage($img)
    {
        $low_case = strtolower(str_replace(" ", "", $img));

        $contents = file_get_contents(resource_path('img/restaurants/' . $low_case . '.jpg'));
        $path = 'restaurants/' . $low_case . '.jpg';
        Storage::disk('public')->putFile('restaurants', $contents);
        return $path;
    }
}
