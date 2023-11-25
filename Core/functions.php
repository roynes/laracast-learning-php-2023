<?php

use Core\Middleware\Middleware;
use Core\Database;
use Core\Response;
use Core\App;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404) {
    http_response_code($code);

    require view("{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if(! $condition) {
        abort($status);
    }
}

function base_path($path) {
    return BASE_PATH.$path;
}

function view($path, $attributes = []) {
    extract($attributes);

    require base_path("views/{$path}.view.php");
}

function db() {
    return App::resolve(Database::class);
}

function middleware($key = 'guest') {
    Middleware::resolve($key);
}
