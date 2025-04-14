<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $categoryIds = Category::pluck('id')->toArray();
        $brandIds = Brand::pluck('id')->toArray();

        for ($i = 0; $i < 1000; $i++) {
            $name = $faker->words(10, true); // ejemplo: "camisa bordada otomí"
            Product::create([
                'category_id' => $faker->randomElement($categoryIds),
                'brand_id' => $faker->randomElement($brandIds),
                'name' => ucfirst($name),
                'slug' => Str::slug($name) . '-' . $faker->unique()->numberBetween(1000, 9999),
                'description' => $faker->paragraph(),
                'price' => $faker->randomFloat(2, 20, 500),
                'stock' => $faker->numberBetween(100, 1000),
                'image' => $faker->imageUrl(400,400,'technics',true), // puedes ajustar esto después para usar imágenes reales
                'status' => $faker->randomElement(['active', 'inactive']),
            ]);
        }
    }
}
