<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $name = $faker->unique()->company;
            Brand::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $faker->sentence()
            ]);
        }
    }
}
