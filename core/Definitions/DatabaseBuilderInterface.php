<?php 

namespace Core\Definitions;

use PDO;

interface DatabaseBuilderInterface 
{
    /**
     * build new class instance
     *
     * @param PDO $pdo
     */
    public function getPdo(): PDO;
    
    /**
     * set query builder table name
     *
     * @param string $table
     * @return void
     */
    public function from($table);
    
    /**
     * query database and filter for given column name
     *
     * @param string $attribute
     * @return void
     */
    public function get($attribute);
}