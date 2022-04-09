<?php 

namespace Core\Definitions;

interface RequestInterface 
{
    public function uri();
    public function method();
    public function queryString();
    public function args();
}