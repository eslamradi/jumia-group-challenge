<?php 

namespace Core\Definitions;

use PDO;

interface DatabaseConnectionInterface 
{
    /**
     * try and connect to sqlite database using path provided in config
     *
     * @param array $config
     * @return PDO
     */
    public function connect(array $config): PDO;
}