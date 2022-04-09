<?php

use App\Lib\PhoneParser;
use Core\Container;
use Core\Definitions\DatabaseConnectionInterface;
use Core\Lib\Renderer;
use Core\Definitions\RendererInterface;
use Core\Lib\QueryBuilder;
use Core\Lib\Router;
use Psr\Container\ContainerInterface;

/**
 * define and attach application dependencies to the container
 */
return function (Container $container) {
    
    /**
     * Router Instance
     */
    $container->set('router', new Router);

    /**
     * Database PDO Connection Instance
     */
    $container->set(DatabaseConnectionInterface::class, function(ContainerInterface $c){
        $config = $c->get(ConfigInterface::class);
        $driver = $config['db']['driver'];
        $pdo = new $driver();
        $pdo = $pdo->connect($config['db']['credentials']);
        return $pdo;
    });


    /**
     * Database Query Builder instance
     */
    $container->set(QueryBuilder::class, function(ContainerInterface $c){
        $connection = $c->get(DatabaseConnectionInterface::class);
        $queryBuilder = new QueryBuilder($connection);
        return $queryBuilder;
    });

    /**
     * view renderer instance
     */
    $container->set(RendererInterface::class, new Renderer);

    /**
     * Phone parser instance
     */

     $container->set(PhoneParser::class, function(ContainerInterface $c) {
        $config = $c->get(ConfigInterface::class);
        return new PhoneParser($config['countries'] ?? []);
     });

     /**
     * Phone repository instance
     */
};