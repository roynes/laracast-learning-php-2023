<?php

namespace Core\Middleware;

use Core\Middleware\Auth;
use Core\Middleware\Guest;

class Middleware {
    const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
    ];

    public static function resolve($key = null) {
        if(! $key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if(! $middleware) {
            throw new \Exception("No matching middleware found for key {$key}");
        }

        (new $middleware)->handle();
    }
}