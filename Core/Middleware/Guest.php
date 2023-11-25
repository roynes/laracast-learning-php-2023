<?php

namespace Core\Middleware;

use Core\Middleware\Contract as MiddlewareContract;

class Guest implements MiddlewareContract {
    public function handle() {
        if(isset($_SESSION['user'])) {
            header('location: /');
            exit();
        }
    }
}