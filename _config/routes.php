<?php

$router->get('/', 'Controller/home/index.php')->only('auth');
$router->post('/', 'Controller/home/store.php');

$router->get('/admin', 'Controller/admin/index.php')->only('auth');
$router->post('/admin', 'Controller/admin/create.php');
$router->delete('/admin', 'Controller/admin/destroy.php');

$router->get('/login', 'Controller/session/index.php');
$router->post('/login', 'Controller/session/create.php');
$router->get('/destroy', 'Controller/session/destroy.php');

$router->get('/registration', 'Controller/registration/index.php');
$router->post('/registration', 'Controller/registration/create.php');