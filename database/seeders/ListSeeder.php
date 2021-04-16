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
            $csv = $this->processCSV($storage);
        }
        foreach ($csv as $data) {
            if (empty($data) || $data['anime_id'] == '') {
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

            try {
                AnimeList::create($data);
            } catch (\Exception $e) {
                // insert failed.. ignore and more on...
                continue;
            }
        }
    }


    public function processCSV($storage)
    {
        $csv = array_map('str_getcsv', file($storage->path('dataset/animelists_sample.csv')));
        array_walk($csv, function (&$a) use ($csv) {
            try {
                $a = array_combine($csv[0], $a);
            } catch (\ErrorException $e) {
                $a = [];
            }
        });
        array_shift($csv);
        $storage->put('dataset/animelist.bin', serialize($csv));

        return $csv;
    }

    public function process($storage)
    {
        $stream = fopen($storage->path('dataset/animelists_sample.csv'), "r+");
        $user = User::first();
        while (($data = fgetcsv($stream, 1000, ",")) !== false) {
            if($data[0] == "username") {
                continue;
            }
            dump($data);
            if ($user->username !== $data[0]) {
                dump($data[0]);
                $user = User::where('username', $data[0])->first() ?? $user;
            }
            $data[0] = $user->id;
            fputcsv($stream, $data, ",");
        }
    }
}
