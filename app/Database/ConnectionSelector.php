<?php

namespace App\Database;

use Exception;

class ConnectionSelector
{
    /**
     * @return void
     * @throws Exception
     */
    public static function setDb(): void
    {
        $config = new DatabaseConfig();
        $dbFactory = new DatabaseFactory($config->getType());
        $dbManager = $dbFactory->getDatabaseProvider();
        $dbManager::applyConfig($config->getCreds());
    }
}