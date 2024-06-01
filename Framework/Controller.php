<?php

namespace Framework;

class Controller
{
    public function model($model)
    {
        require basePath('App/Models/' . $model . '.php');

        return new $model();
    }
}
