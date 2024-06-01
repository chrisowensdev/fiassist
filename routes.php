<?php

$router->get('/', 'HomeController@index');
$router->get('/api/users', 'ApiUsers@index');