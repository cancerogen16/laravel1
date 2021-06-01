<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

        for ($i = 1; $i <= 10; $i++) {
            $sourceName = 'Источник #' . $i;

            $sources[] = [
                'url' => Str::of($sourceName)->slug() . '.ru',
                'description' => $sourceName,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];
        }

        DB::table('sources')->insert($sources);
    }
}
