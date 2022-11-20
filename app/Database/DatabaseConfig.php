<?php

namespace App\Database;

use Exception;

class DatabaseConfig
{
    /** @var array */
    private array $config;

    /** @var string */
    private string $type;

    /** @var string */
    private string $host;

    /** @var string */
    private string $database;

    /** @var string */
    private string $userName;

    /** @var string */
    private string $password;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        //used config.php for credentials, .env requires additional time to parse the config
        $this->loadConfigFile();
        $this->dbConfigValidate();
    }

    /**
     * @throws Exception
     */
    private function loadConfigFile(): void
    {
        if (file_exists(__DIR__ . '/../config.php')) {
            $config = include(__DIR__ . '/../config.php');
            if (!is_array($config)) {
                throw new Exception('Invalid config file');
            }
            $this->config = $config;
        };
    }

    /**
     * @return void
     * @throws Exception
     */
    private function dbConfigValidate(): void
    {
        if (!isset($this->config['DB'])) {
            throw new Exception('DB configuration is required');
        }

        if (!isset($this->config['DB']['TYPE']) || !$this->config['DB']['TYPE']) {
            throw new Exception('DB type is not set');
        }

        if (!isset($this->config['DB']['HOST']) || !$this->config['DB']['HOST']) {
            throw new Exception('DB host is not set');
        }

        if (!isset($this->config['DB']['DATABASE']) || !$this->config['DB']['DATABASE']) {
            throw new Exception('DB database is not set');
        }

        if (!isset($this->config['DB']['USER_NAME']) || !$this->config['DB']['USER_NAME']) {
            throw new Exception('DB user name is not set');
        }

        $this->type = $this->config['DB']['TYPE'];
        $this->host = $this->config['DB']['HOST'];
        $this->database = $this->config['DB']['DATABASE'];
        $this->userName = $this->config['DB']['USER_NAME'];
        $this->password = $this->config['DB']['PASSWORD'] ?? '';
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getDatabase(): string
    {
        return $this->database;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return array
     */
    public function getCreds(): array
    {
        return [
            'type' => $this->type,
            'host' => $this->host,
            'database' => $this->database,
            'username' => $this->userName,
            'password' => $this->password,
        ];
    }
}