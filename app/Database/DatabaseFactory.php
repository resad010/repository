<?php

namespace App\Database;

use App\Database\Providers\DatabaseManager;
use App\Database\Providers\SqlManager;
use Exception;

class DatabaseFactory
{
    /**
     * @var DatabaseManager
     */
    private DatabaseManager $databaseProvider;

    /**
     * @param string $databaseProvider
     * @throws Exception
     */
    public function __construct(string $databaseProvider)
    {
        $this->databaseProvider = match ($databaseProvider) {
            'mysql' => new SqlManager(),
            default => throw new Exception('Database type is not supported')
        };
    }

    /**
     * @return DatabaseManager
     */
    public function getDatabaseProvider(): DatabaseManager
    {
        return $this->databaseProvider;
    }
}