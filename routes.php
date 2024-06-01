<?php

$router->get('/', 'HomeController@index');
$router->get('/api/v1/users', 'Api\\v1\\Users@index');
