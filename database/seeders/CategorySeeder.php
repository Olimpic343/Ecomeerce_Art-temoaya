<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            $name = $faker->unique()->words(2, true); // genera nombres como "Textil Decorativo"
            Category::create([
                'name' => ucfirst($name),
                'slug' => Str::slug($name),
                'description' => $faker->sentence()
            ]);
        }
    }
}
