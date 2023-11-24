<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/info', 'controllers/info.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');

$router->delete('/note', 'controllers/notes/destroy.php');
$router->patch('/note', 'controllers/notes/update.php');
$router->post('/notes', 'controllers/notes/store.php');

$router->get('/note/edit', 'controllers/notes/edit.php');
$router->get('/note/create', 'controllers/notes/create.php');