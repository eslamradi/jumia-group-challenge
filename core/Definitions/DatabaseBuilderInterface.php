<?php 

namespace Core\Definitions;

use PDO;

interface DatabaseBuilderInterface 
{
    public function getPdo(): PDO;
    public function from($table);
    public function get($attribute);
}