<?php

namespace Core\Lib;

use Core\Definitions\DatabaseConnectionInterface;
use PDO;

/**
 * Sqlite pdo instantaion class
 */
class SqliteConnection implements DatabaseConnectionInterface
{
    /**
     * try and connect to sqlite database using path provided in config
     *
     * @param array $config
     * @return PDO
     */
    public function connect($config): PDO 
    {
        try {
            return new PDO("sqlite:{$config['path']}");
        } catch(\PDOException $e) {
            exit($e->getMessage());
        }
    }
}