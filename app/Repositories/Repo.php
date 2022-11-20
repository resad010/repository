<?php

namespace App\Repositories;

use Exception;

class Repo
{
    static ?string $repositoryDatabase = null;

    /**
     * @param string $repository
     * @return mixed
     * @throws Exception
     */
    public static function get(string $repository): mixed
    {
        $baseFolder = "App\\Repositories\\$repository\\";
        $interface = $baseFolder . $repository . 'Interface';
        $repository = $baseFolder . $repository . static::$repositoryDatabase;

        if (!class_exists($repository)) {
            throw new Exception("$repository doesn't exist");
        }

        $class = new \ReflectionClass($repository);

        if (!$class->implementsInterface($interface)) {
            throw new Exception("$repository doesn't implement $interface");
        };

        return new $repository();
    }

    /**
     * @param $string
     * @return void
     */
    public static function setRepoDb($string): void
    {
        if (!static::$repositoryDatabase) {
            static::$repositoryDatabase = $string;
        }
    }
}