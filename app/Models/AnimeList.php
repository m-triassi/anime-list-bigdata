<?php

namespace App\Models;

use App\Configurators\AnimeListIndexConfigurator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;

class AnimeList extends Model
{
    use HasFactory, Searchable;

    protected $indexConfigurator =  AnimeListIndexConfigurator::class;

    protected $mapping = [
        'properties' => [
            'user_id' => [
                'type' => "integer"
            ],
            'anime_id' => [
                'type' => "integer"
            ],
            'my_watched_episodes' => [
                'type' => "integer"
            ],
            'my_start_date' => [
                'type' => "date",
                "format" => "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis"
            ],
            'my_finish_date' => [
                'type' => "date",
                "format" => "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis"
            ],
            'my_score' => [
                'type' => "integer"
            ],
            'my_status' => [
                'type' => "integer"
            ],
            'my_rewatching' => [
                'type' => "integer"
            ],
            'my_rewatching_ep' => [
                'type' => "integer"
            ],
            'my_last_updated' => [
                'type' => "date",
                "format" => "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis"
            ],
            'my_tags' => [
                'type' => "text"
            ],
        ]
    ];
}
