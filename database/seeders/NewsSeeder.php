<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maxCategory = 9;
        $maxNews = 10;

        $news = [];

        $statuses = ['draft', 'published', 'blocked'];

        $faker = Factory::create('ru_RU');

        for ($c = 1; $c <= $maxCategory; $c++) {
            for ($n = 1; $n <= $maxNews; $n++) {
                $categoryId = 1 + rand(1, $maxCategory - 1);

                $title = $faker->sentence(rand(3, 8), true);

                $excerpt = $faker->realText(rand(10, 30));
                $description = $faker->realText(rand(100, 200));

                $status = $statuses[rand(0, 2)];

                $createdAt = $faker->dateTimeBetween('-3 months', '-2 months');

                $news[] = [
                    'category_id' => $categoryId,
                    'title' => $title,
                    'slug' => Str::of($title)->slug(),
                    'excerpt' => $excerpt,
                    'description' => $description,
                    'status' => $status,
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ];
            }
        }

        DB::table('news')->insert($news);
    }
}
