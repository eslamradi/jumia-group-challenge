<?php 

namespace Core\Lib;

use Core\Definitions\RequestInterface;
use Core\Definitions\RouterInterface;
use Core\Exceptions\Router\MethodNotAllowedException;
use Core\Exceptions\Router\RouteNotFoundException;

/**
 * Router class implementation
 */
class Router implements RouterInterface 
{
    /**
     * Routes list registry
     * @var array
     */
    protected $routes;

    /**
     * add new route to the routes list registry
     *
     * @param string $method
     * @param string $uri
     * @param array $callback
     * @return void
     */
    public function addRoute($method, $uri, $callback){
        $this->routes[$method] = array_merge($this->routes[$method] ?? [] , [
            $uri => $callback
        ]);
    }

    /**
     * match the incoming request against an existing route or throw an error
     *
     * @param RequestInterface $request
     * @throws MethodNotAllowedException 
     * @throws RouteNotFoundException 
     * @return array
     */
    public function matchRoute(RequestInterface $request)
    {
        if(!isset($this->routes[$request->method()])) {
            throw new MethodNotAllowedException();
        }

        if(!isset($this->routes[$request->method()][$request->uri()])) {
            throw new RouteNotFoundException();
        }

        return $this->routes[$request->method()][$request->uri()];
    }
}