<?php

namespace App\Controllers;

use Core\Lib\AbstractController;

class HomeController extends AbstractController
{
    /**
     * get customer phones and parse them into the required format and attach necessary data
     * @return mixed
     */
    public function index() {
        $statement = $this->db->getPdo()->prepare("SELECT phone FROM customer");
        $statement->execute();
        return json_encode($statement->fetchAll(\PDO::FETCH_COLUMN));
    }
}