<?php

$router->get('/', 'HomeController@index');
$router->get('/auth/login', 'UserController@login');


// API
$router->get('/api/v1/users', 'Api\\v1\\Users@index');
