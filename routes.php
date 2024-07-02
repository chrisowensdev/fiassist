<?php

$router->get('/', 'HomeController@index');
$router->get('/auth/login', 'UserController@login', ['guest']);
$router->get('/auth/register', 'UserController@create', ['guest']);

$router->post('/auth/register', 'UserController@store');
$router->get('/auth/logout', 'UserController@logout');
$router->post('/auth/login', 'UserController@authenticate');

$router->get('/bills', 'BillController@index', ['auth']);

$router->get('/tasks', 'TaskController@index', ['auth']);
$router->get('/tasks/group', 'TaskController@group', ['auth']);

$router->get('/tasks/create', 'TaskController@create', ['auth']);
$router->get('/tasks/{id}', 'TaskController@view', ['auth']);
$router->get('/tasks/group', 'TaskController@group', ['auth']);
$router->post('/tasks/create', 'TaskController@store', ['auth']);
$router->post('/tasks/maintain/{id}', 'TaskController@maintain', ['auth']);
$router->put('/tasks/complete/{id}', 'TaskController@complete', ['auth']);
$router->delete('/tasks/delete/{id}', 'TaskController@delete', ['auth']);

$router->get('/user', 'UserController@index', ['auth']);
$router->get('/user/profile', 'UserController@profile', ['auth']);
$router->post('/user/profile/resetPassword', 'UserController@resetPasswordProfile');
$router->post('/user/profile/{id}', 'UserController@updateProfile', ['auth']);
$router->get('/user/forgotPassword', 'UserController@forgotPassword');
$router->post('/user/forgotPassword', 'UserController@resetPassword');

// API
$router->get('/api/v1/users', 'Api\\v1\\Users@index');
