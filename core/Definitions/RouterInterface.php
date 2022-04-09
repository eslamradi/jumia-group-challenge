<?php 

namespace Core\Definitions;

interface RouterInterface 
{
    public function addRoute($method, $uri, $callback);
    public function matchRoute(RequestInterface $request);
}