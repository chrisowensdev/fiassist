<?php

$router->get('/', 'HomeController@index');
$router->get('/auth/login', 'UserController@login');
$router->get('/auth/register', 'UserController@create');

$router->post('/auth/register', 'UserController@store');
$router->post('/auth/logout', 'UserController@logout');
$router->post('/auth/login', 'UserController@authenticate');

$router->get('user/profile', 'UserController@profile');
$router->post('user/profile', 'UserController@updateProfile');

// API
$router->get('/api/v1/users', 'Api\\v1\\Users@index');
