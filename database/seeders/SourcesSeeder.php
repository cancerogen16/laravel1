<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sources = [];

        $faker = Factory::create('ru_RU');
        $fakerEn = Factory::create('en_GB');

        for ($i = 1; $i <= 5; $i++) {
            $createdAt = $faker->dateTimeBetween('-2 months', '-2 days');

            $sources[] = [
                'name' => $faker->realText(rand(10, 20)),
                'url' => $fakerEn->domainName,
                'description' => $faker->realText(rand(50, 200)),
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ];
        }

        DB::table('sources')->insert($sources);
    }
}
