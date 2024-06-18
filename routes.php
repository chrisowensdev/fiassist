<?php

$router->get('/', 'HomeController@index');
$router->get('/auth/login', 'UserController@login');
$router->get('/auth/register', 'UserController@create');

$router->post('/auth/register', 'UserController@store');
$router->get('/auth/logout', 'UserController@logout');
$router->post('/auth/login', 'UserController@authenticate');

$router->get('/tasks', 'TaskController@index');
$router->get('/tasks/create', 'TaskController@create');
$router->post('/tasks/create', 'TaskController@store');

$router->get('/user', 'UserController@index');
$router->get('/user/profile', 'UserController@profile');
$router->post('/user/profile', 'UserController@updateProfile');

// API
$router->get('/api/v1/users', 'Api\\v1\\Users@index');
