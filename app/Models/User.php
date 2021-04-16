<?php

namespace App\Models;

use App\Configurators\UserIndexConfigurator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;

class User extends Model
{
    use HasFactory, Searchable;

    protected $indexConfigurator =  UserIndexConfigurator::class;

    protected $mapping = [
        'properties' => [
            'username' => [
                'type' => 'text'
            ],
            'user_watching' => [
                'type' => 'integer'
            ],
            'user_completed' => [
                'type' => 'integer'
            ],
            'user_onhold' => [
                'type' => 'integer'
            ],
            'user_dropped' => [
                'type' => 'integer'
            ],
            'user_plantowatch' => [
                'type' => 'integer'
            ],
            'user_days_spent_watching' => [
                'type' => 'float'
            ],
            'gender' => [
                'type' => 'keyword'
            ],
            'location' => [
                'type' => 'text'
            ],
            'birth_date' => [
                'type' => 'date',
                "format" => "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis"
            ],
            'access_rank' => [
                'type' => 'text'
            ],
            'join_date' => [
                'type' => 'date',
                "format" => "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis"
            ],
            'last_online' => [
                'type' => 'date',
                "format" => "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis"
            ],
            'stats_mean_score' => [
                'type' => 'float'
            ],
            'stats_rewatched' => [
                'type' => 'integer'
            ],
            'stats_episodes' => [
                'type' => 'integer'
            ],
        ]
    ];
}
