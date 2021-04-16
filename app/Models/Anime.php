<?php

namespace App\Models;

use App\Configurators\AnimeIndexConfigurator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;

class Anime extends Model
{
    use HasFactory, Searchable;

    protected $indexConfigurator = AnimeIndexConfigurator::class;

    protected $mapping = [
        'properties' => [
            'title' => [
                'type' => 'text'
            ],
            'title_english' => [
                'type' => 'text'
            ],
            'title_japanese' => [
                'type' => 'text'
            ],
            'title_synonyms' => [
                'type' => 'text'
            ],
            'image_url' => [
                'type' => 'text'
            ],
            'type' => [
                'type' => 'text'
            ],
            'source' => [
                'type' => 'text'
            ],
            'episodes' => [
                'type' => 'integer'
            ],
            'status' => [
                'type' => 'text'
            ],
            'airing' => [
                'type' => 'text'
            ],
            'aired_string' => [
                'type' => 'text'
            ],
            'aired' => [
                'type' => 'text'
            ],
            'duration' => [
                'type' => 'text'
            ],
            'rating' => [
                'type' => 'text'
            ],
            'score' => [
                'type' => 'float'
            ],
            'scored_by' => [
                'type' => 'integer'
            ],
            'rank' => [
                'type' => 'integer'
            ],
            'popularity' => [
                'type' => 'integer'
            ],
            'members' => [
                'type' => 'integer'
            ],
            'favorites' => [
                'type' => 'integer'
            ],
            'background' => [
                'type' => 'text'
            ],
            'premiered' => [
                'type' => 'text'
            ],
            'broadcast' => [
                'type' => 'text'
            ],
            'related' => [
                'type' => 'text'
            ],
            'producer' => [
                'type' => 'text'
            ],
            'licensor' => [
                'type' => 'text'
            ],
            'studio' => [
                'type' => 'text'
            ],
            'genre' => [
                'type' => 'text'
            ],
            'opening_theme' => [
                'type' => 'text'
            ],
            'ending_theme' => [
                'type' => 'text'
            ],
            'duration_min' => [
                'type' => 'integer'
            ],
            'aired_from_year' => [
                'type' => 'integer'
            ],
        ]
    ];
}
