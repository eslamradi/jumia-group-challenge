<?php 

namespace Core\Definitions;

use PDO;

interface DatabaseConnectionInterface 
{
    public function connect(array $config): PDO;
}