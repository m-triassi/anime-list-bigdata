<?php

namespace App\Configurators;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class UserIndexConfigurator extends IndexConfigurator
{
    use Migratable;

    /**
     * @var array
     */
    protected $settings = [
        //
    ];
}
