<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'title' => 'Черновик',
                'slug' => 'draft',
            ],
            [
                'title' => 'Опубликовано',
                'slug' => 'published',
            ],
            [
                'title' => 'Заблокировано',
                'slug' => 'blocked',
            ],
        ];

        DB::table('statuses')->insert($statuses);
    }
}
