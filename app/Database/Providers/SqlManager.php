<?php

namespace App\Database\Providers;

use App\Repositories\Repo;
use Illuminate\Database\Capsule\Manager as Capsule;

class SqlManager implements DatabaseManager
{
    /**
     * @param array $config
     * @return void
     */
    public static function applyConfig(array $config): void
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => $config['type'],
            'host' => $config['host'],
            'database' => $config['database'],
            'username' => $config['username'],
            'password' => $config['password']
        ]);

        $capsule->setAsGlobal();

        $capsule->bootEloquent();

        Repo::setRepoDb('SQL');
    }
}