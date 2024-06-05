<?php

namespace App\Controllers;

use Framework\Controller;
use Framework\Session;

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

    /**
     * Show the register page
     * 
     * @return void
     */
    public function create()
    {
        loadView('users/create');
    }

    /**
     * Register new user
     */
    public function store()
    {
        $response = $this->userModel->registerUser();


        if ($response['errors']) {
            loadView('users/create', [
                'errors' => $response['errors'],
                'data' => $response['data']
            ]);
            exit;
        }

        Session::set('user', [
            'id' => $response['id'],
            'email' => $response['email']
        ]);

        redirect('/');
    }

    /** Authenticate user */
    public function authenticate()
    {
    }
}
