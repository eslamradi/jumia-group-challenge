<?php

use Core\Container;
use Core\Lib\SqliteConnection;

/**
 * Attach app config intsance to container
 */
return function (Container $container) {
    $container->set(ConfigInterface::class, function(){
        return [
            'db' => [
                'driver' => SqliteConnection::class,
                'credentials' => [
                    'path' => BASEDIR .'database/sample.db'
                ]
            ]
        ];
    });
};