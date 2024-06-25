<?php

$router->get('/', 'HomeController@index');
$router->get('/auth/login', 'UserController@login', ['guest']);
$router->get('/auth/register', 'UserController@create', ['guest']);

$router->post('/auth/register', 'UserController@store');
$router->get('/auth/logout', 'UserController@logout');
$router->post('/auth/login', 'UserController@authenticate');

$router->get('/bills', 'BillController@index');

$router->get('/tasks', 'TaskController@index');
$router->get('/tasks/group', 'TaskController@group');

$router->get('/tasks/create', 'TaskController@create');
$router->get('/tasks/{id}', 'TaskController@view');
$router->get('/tasks/group', 'TaskController@group');
$router->post('/tasks/create', 'TaskController@store', ['auth']);
$router->post('/tasks/maintain/{id}', 'TaskController@maintain', ['auth']);
$router->put('/tasks/complete/{id}', 'TaskController@complete', ['auth']);
$router->delete('/tasks/delete/{id}', 'TaskController@delete', ['auth']);

$router->get('/user', 'UserController@index');
$router->get('/user/profile', 'UserController@profile');
$router->post('/user/profile', 'UserController@updateProfile');

// API
$router->get('/api/v1/users', 'Api\\v1\\Users@index');
