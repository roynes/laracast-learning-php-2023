<?php

use Core\App;
use Core\Container;
use Core\Database;
use Core\Middleware\Middleware;

$container = new Container;
$container->bind(
    'Core\Database',
    function() {
        $config = require base_path('config.php');

        return new Database($config['database']);
    }
);

// For future use.
// For now, there's no use for containerisatio of middlewares
// foreach (Middleware::MAP as $key => $value) {
//     $container->bind(
//         $value,
//         function() use ($value){
//             return new $value;
//         }
//     );
// }

App::setContainer($container);