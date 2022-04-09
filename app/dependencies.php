<?php

use Core\Container;
use Core\Definitions\DatabaseConnectionInterface;
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
        $settings = $c->get(ConfigInterface::class);
        $pdo = new $settings['db']['driver']();
        $pdo = $pdo->connect($settings['db']['credentials']);
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
};