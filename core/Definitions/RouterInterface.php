<?php 

namespace Core\Definitions;

interface RouterInterface 
{   
    /**
     * add new route to the routes list registry
     *
     * @param string $method
     * @param string $uri
     * @param array $callback
     * @return void
     */
    public function addRoute($method, $uri, $callback);
    
    /**
     * match the incoming request against an existing route or throw an error
     *
     * @param RequestInterface $request
     * @throws MethodNotAllowedException 
     * @throws RouteNotFoundException 
     * @return array
     */
    public function matchRoute(RequestInterface $request);
}