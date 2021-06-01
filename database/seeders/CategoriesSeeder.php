<?php

namespace Database\Seeders;

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

        $startDate = time();

        $categories = [];

        $cName = 'Без категории';

        $createdAt = date('Y-m-d H:i:s', strtotime('-100 day', $startDate));

        $categories[] = [
            'parent_id' => 0,
            'title' => $cName,
            'slug' => Str::of($cName)->slug(),
            'description' => 'Описание категории',
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];

        for ($i = 1; $i <= $maxCategory; $i++) {
            $cName = 'Категория #' . $i;
            $parentId = ($i > 4) ? rand(1, 4) : 1;

            $date = rand(1, 30);

            $createdAt = date('Y-m-d H:i:s', strtotime('-'.($date+1).' day', $startDate));
            $updatedAt = date('Y-m-d H:i:s', strtotime('-'.($date).' day', $startDate));

            $categories[] = [
                'parent_id' => $parentId,
                'title' => $cName,
                'slug' => Str::of($cName)->slug(),
                'description' => 'Описание категории',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ];
        }

        DB::table('categories')->insert($categories);
    }
}
