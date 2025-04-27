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

        // Lista exacta de nombres de imagen proporcionados
        $images = [
            'p1.jpeg', 'p2.jpeg', 'p3.jpeg', 'p4.jpeg', 'p5.jpeg',
            'p6.jpeg', 'p7.jpeg', 'p8.jpeg', 'p9.jpeg', 'p10.jpeg',
            'p11.jpeg', 'p12.jpeg', 'p13.jpeg', 'p14.jpeg', 'p15.jpeg',
            'p16.jpeg', 'p17.jpeg', 'p18.jpeg', 'p19.jpeg', 'p20.jpeg',
            'p21.jpeg', 'p22.jpeg', 'p23.jpeg', 'p24.jpeg', 'p25.jpeg',
            'p26.jpeg', 'p27.jpeg', 'p28.jpeg', 'p29.jpeg', 'p30.jpeg',
            'p31.jpeg',
        ];

        for ($i = 0; $i < 1000; $i++) {
            $price = $faker->randomFloat(2, 20, 500);
            $name = $faker->words(3, true);

            Product::create([
                'category_id' => $faker->randomElement($categoryIds),
                'brand_id' => $faker->randomElement($brandIds),
                'name' => ucfirst($name),
                'slug' => Str::slug($name) . '-' . $faker->unique()->numberBetween(1000, 9999),
                'description' => $faker->paragraph(),
                'price' => $price,
                'price2' => max($price - 1, 1),
                'stock' => $faker->numberBetween(100, 1000),
                'image' => 'products/' . fake()->randomElement($images),
                'status' => $faker->randomElement(['active', 'inactive']),
            ]);
        }
    }
}
