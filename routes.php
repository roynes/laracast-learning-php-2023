<?php

$router->get('/', 'controllers/index.php')
        ->only('guest');
$router->get('/about', 'controllers/about.php')
        ->only('guest');
$router->get('/info', 'controllers/info.php')
        ->only('guest');
$router->get('/contact', 'controllers/contact.php')
        ->only('guest');
$router->get('/notes', 'controllers/notes/index.php')
        ->only('auth');
$router->get('/note', 'controllers/notes/show.php')
        ->only('auth');
$router->delete('/note', 'controllers/notes/destroy.php')
        ->only('auth');
$router->patch('/note', 'controllers/notes/update.php')
        ->only('auth');
$router->post('/notes', 'controllers/notes/store.php')
        ->only('auth');
$router->get('/note/edit', 'controllers/notes/edit.php')
        ->only('auth');
$router->get('/note/create', 'controllers/notes/create.php')
        ->only('auth');
$router->get('/register', 'controllers/registration/create.php')
        ->only('guest');
$router->post('/register', 'controllers/registration/store.php')
        ->only('guest');
$router->get('/login', 'controllers/session/create.php')
        ->only('guest');
$router->post('/session', 'controllers/session/store.php')
        ->only('guest');
$router->delete('/session', 'controllers/session/destroy.php')
        ->only('auth');