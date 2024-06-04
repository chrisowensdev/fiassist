<?php

namespace App\Controllers;

use Framework\Controller;
use Framework\Database;

class UserController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    /**
     * Show the login page
     * 
     * @return void
     */
    public function login()
    {
        loadView('users/login');
    }
}
