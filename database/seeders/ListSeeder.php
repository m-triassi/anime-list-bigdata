<?php

namespace Database\Seeders;

use App\Models\AnimeList;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $storage = Storage::disk('local');
        if ($storage->exists('dataset/animelist.bin')) {
            $csv = unserialize($storage->get('dataset/animelist.bin'));
        } else {
            $csv = $this->proccessCSV($storage);
        }
        foreach ($csv as $data) {
            if ($data['anime_id'] == '') {
                continue;
            }
            foreach ($data as $key => &$column) {
                if (empty($column) || $column == "0000-00-00") {
                    $column = null;
                }

                if ($key == "username") {
                    $data['user_id'] = User::where('username', $column)->first()->id ?? 1;
                    unset($data['username']);
                }
            }

            AnimeList::create($data);
        }
    }


    public function proccessCSV($storage)
    {
        $csv = array_map('str_getcsv', file($storage->path('dataset/animelists_sample.csv')));
        array_walk($csv, function (&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        array_shift($csv);
        $storage->put('dataset/animelist.bin', serialize($csv));

        return $csv;
    }
}
