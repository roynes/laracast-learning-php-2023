<?php

use Core\Middleware\Middleware;
use Core\Database;
use Core\Response;
use Core\App;
use Core\Session;

function dd($value) {
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

    require view("{$code}");

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

function login($user) {
    $_SESSION['user'] = [
        'email' => $user['email'],
        'id' => $user['id']
    ];

    session_regenerate_id(true);
}

function logout() {
    $_SESSION = null;
    session_destroy();

    $params = session_get_cookie_params();
    setcookie(
        'PHPSESSID', 
        '', 
        time() - 3600, 
        $params['path'], 
        $params['domain'], 
        $params['secure'], 
        $params['httponly']
    );
}

function redirect($path) {
    header("location: {$path}");
    exit();
}

function old($key, $default = '') {
    return Session::get('old')[$key] ?? $default;
}