<?php 

namespace Core\Lib;

use Core\Definitions\DatabaseBuilderInterface;
use PDO;

/**
 * query builder class for pdo statements wrpping
 */
class QueryBuilder implements DatabaseBuilderInterface
{

    /**
     * PDO instanse
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * database table name to work on
     *
     * @var string
     */
    protected $table;


    /**
     * build new class instance
     *
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * get current pdo
     *
     * @return PDO
     */
    public function getPdo(): PDO {
        return $this->pdo;
    }

    /**
     * set query builder table name
     *
     * @param string $table
     * @return self
     */
    public function from($table)
    {
        $this->table = $table;

        return $this;
    }

    /**
     * query database and filter for given column name
     *
     * @param string $attribute
     * @return void
     */
    public function get($attribute)
    {
        $statement = $this->pdo->prepare("SELECT {$attribute} FROM {$this->table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }
}