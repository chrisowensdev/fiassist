<?php

namespace App\Controllers;

use Framework\Controller;
use Framework\Database;

// Test hostinger deployment
class Users extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $this->userModel->getUserByEmail('chris@chris.com');
        loadView('users/login');
    }
}
