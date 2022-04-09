<?php

namespace App\Models;

use Core\Lib\QueryBuilder;

class Cusomer extends QueryBuilder
{
    protected $phone;

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getPhone(){
        return $this->phone;
    }
}