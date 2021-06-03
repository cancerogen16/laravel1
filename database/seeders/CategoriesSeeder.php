<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maxCategory = 5;

        $categories = [];

        $faker = Factory::create('ru_RU');

        for ($i = 1; $i <= $maxCategory; $i++) {
            if ($i == 1) {
                $title = 'Без категории';
                $parentId = 0;
            } else {
                $title = $faker->sentence(rand(1, 5), true);
                $parentId = ($i > 4) ? rand(1, 4) : 1;
            }

            $description = $faker->realText(rand(50, 200));

            $createdAt = $faker->dateTimeBetween('-3 months', '-2 months');

            $categories[] = [
                'parent_id' => $parentId,
                'title' => $title,
                'slug' => Str::of($title)->slug(),
                'description' => $description,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ];
        }

        DB::table('categories')->insert($categories);
    }
}
