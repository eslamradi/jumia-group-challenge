<?php

use Core\App;

/**
 * Define and attach application routes
 */
return function (App $app) {
    $app->router->addRoute('GET', '', [\App\Controllers\HomeController::class, 'index']);
};