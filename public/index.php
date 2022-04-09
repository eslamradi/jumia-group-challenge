<?php

require_once __DIR__ .'/../vendor/autoload.php';

use Core\App;
use Core\Container;
use Core\Lib\Request;

// create new service container
$container = new Container();


// attach app config instance to the container
$config = require_once __DIR__ .'/../app/config.php';
$config($container);

// attach other app dependencies to the container
$dependencies = require_once __DIR__ .'/../app/dependencies.php';
$dependencies($container);

// build the app
$app = new App($container);

// attach application routes
$routes = require_once __DIR__ .'/../app/routes.php';
$routes($app);


// handle an incoming Http Rquest 
ob_start();
$response = $app->handle(new Request);
print $response;      // This IS printed, but just not right here.
ob_end_flush();