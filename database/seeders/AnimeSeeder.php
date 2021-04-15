<?php

namespace Database\Seeders;

use App\Models\Anime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = array_map('str_getcsv', file(Storage::disk('local')->path('dataset/anime_cleaned.csv')));
        array_walk($csv, function (&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        array_shift($csv);
        foreach ($csv as $data) {
            foreach ($data as &$column) {
                if (empty($column)) {
                    $column = null;
                }
            }
            Anime::create($data);
        }

    }
}
