<?php 

namespace Core;

use Core\Definitions\RequestInterface;
use Core\Definitions\RouterInterface;
use Core\Exceptions\Router\ActionDoesNotExistException;
use Psr\Container\ContainerInterface;

/**
 * Application Instance Class
 */
class App 
{
    /**
     * DIC for handling dependencies
     *
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Application Router
     *
     * @var RouterInterface
     */
    public $router;

    /**
     * build new application instance
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->setRouter($container->get('router'));
    }
    
    /**
     * add routes to application
     *
     * @param RouterInterface $router
     * @return void
     */
    private function setRouter(RouterInterface $router) {
        $this->router = $router;
    }

    /**
     * handle an incoming http request
     *
     * @param RequestInterface $request
     * @throws ActionDoesNotExistException
     * @return mixed
     */
    public function handle(RequestInterface $request) {
        $action = $this->router->matchRoute($request);
        $controllerName = $action[0];
        $methodName = $action[1];
        $controller = $this->container->get($controllerName);
        if(! method_exists($controller, $methodName)) {
            throw new ActionDoesNotExistException;
        }
        return call_user_func_array([$controller, $methodName], [$request]);
    }
}