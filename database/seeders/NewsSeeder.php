<?php

namespace Database\Seeders;

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
        $maxCategory = 5;
        $maxNews = 10;

        $startDate = time();

        $news = [];

        for ($c = 1; $c <= $maxCategory; $c++) {
            for ($n = 1; $n <= $maxNews; $n++) {
                $categoryId = 1 + rand(1, $maxCategory - 1);

                $title = 'Новость #' . $c . $n;
                $txt = 'Текст новости ' . $c . $n;
                $isPublished = rand(0, 1);

                $date = rand(1, 30);

                $createdAt = date('Y-m-d H:i:s', strtotime('-'.($date+1).' day', $startDate));

                $news[] = [
                    'category_id' => $categoryId,
                    'user_id' => (rand(1, 5) == 5) ? 1 : 2,
                    'title' => $title,
                    'slug' => Str::of($title)->slug(),
                    'excerpt' => 'Отрывок',
                    'description' => $txt,
                    'is_published' => $isPublished,
                    'published_at' => $isPublished ? $createdAt : null,
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ];
            }
        }

        DB::table('news')->insert($news);
    }
}
