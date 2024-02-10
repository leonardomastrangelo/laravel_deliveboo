<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Cuisine;

class CuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cuisines = file_get_contents(__DIR__ . '/data/cuisines.json');
        $cuisines = json_decode($cuisines, true);
        foreach ($cuisines as $cuisine) {
            $newCuisine = new Cuisine();
            $newCuisine->name = $cuisine['name'];
            $newCuisine->image = $cuisine['image'];
            $newCuisine->save();
        }
    }

    public static function storeimage($img)
    {
        $contents = file_get_contents(resource_path('img/cuisines/' . $img));
        $path = 'cuisines/' . $img;
        Storage::put($path, $contents);
    }
}
