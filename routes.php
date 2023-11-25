<?php

$router->get('/', 'index.php')
        ->only('guest');
        
$router->get('/about', 'about.php')
        ->only('guest');
        
$router->get('/info', 'info.php')
        ->only('guest');
        
$router->get('/contact', 'contact.php')
        ->only('guest');
        
$router->get('/notes', 'notes/index.php')
        ->only('auth');
        
$router->get('/note', 'notes/show.php')
        ->only('auth');
        
$router->delete('/note', 'notes/destroy.php')
        ->only('auth');
        
$router->patch('/note', 'notes/update.php')
        ->only('auth');
        
$router->post('/notes', 'notes/store.php')
        ->only('auth');
        
$router->get('/note/edit', 'notes/edit.php')
        ->only('auth');
        
$router->get('/note/create', 'notes/create.php')
        ->only('auth');
        
$router->get('/register', 'registration/create.php')
        ->only('guest');
        
$router->post('/register', 'registration/store.php')
        ->only('guest');
        
$router->get('/login', 'session/create.php')
        ->only('guest');
        
$router->post('/session', 'session/store.php')
        ->only('guest');
        
$router->delete('/session', 'session/destroy.php')
        ->only('auth');
        