<?php

use Psr\Container\ContainerInterface;
use Core\Container;
use Core\Definitions\DatabaseConnectionInterface;
use Core\Definitions\RendererInterface;
use Core\Lib\Renderer;
use Core\Lib\Config;
use Core\Lib\QueryBuilder;
use Core\Lib\Router;
use Core\Lib\SqliteConnection;
use App\Lib\PhoneParser;
use Core\Definitions\ConfigInterface;

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
        $connection = $config->get('db');
        // ['driver'];
        $pdo = new $connection['driver']();
        $pdo = $pdo->connect($connection['credentials']);
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

     $container->set(PhoneParser::class,  new PhoneParser());

     /**
     * Phone repository instance
     */

};