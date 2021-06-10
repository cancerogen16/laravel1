<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maxCategory = 9;

        $categories = [];

        $faker = Factory::create('ru_RU');

        for ($i = 1; $i <= $maxCategory; $i++) {
            $disabled = ($i > 4) ? rand(0, 1) : 0;

            $title = $faker->sentence(rand(1, 5), true);

            $createdAt = $faker->dateTimeBetween('-3 months', '-2 months');

            $categories[] = [
                'disabled' => $disabled,
                'title' => $title,
                'slug' => Str::of($title)->slug(),
                'description' => $faker->realText(rand(50, 200)),
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ];
        }

        DB::table('categories')->insert($categories);
    }
}
