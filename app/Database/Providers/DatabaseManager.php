<?php

namespace App\Database\Providers;

interface DatabaseManager
{
    /**
     * @param array $config
     */
    public static function applyConfig(array $config);
}