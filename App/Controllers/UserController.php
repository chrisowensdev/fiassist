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

    /**
     * Logout a user and kill session
     * 
     * @return void
     */
    public function logout()
    {
        Session::clearAll();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 86400, $params['path'], $params['domain']);

        redirect('/');
    }

    /** 
     * Authenticate a user with email and password
     * 
     * @return void 
     */
    public function authenticate()
    {
        $response = $this->userModel->loginUser();

        if (isset($response['errors'])) {
            loadView('users/login', [
                'errors' => $response['errors'],
                'data' => $response['data']
            ]);
            exit;
        }

        Session::set('user', [
            'id' => $response['data']['id'],
            'email' => $response['data']['email']
        ]);

        redirect(('/user'));
    }

    public function index()
    {
        loadView('/users/index');
    }

    /**
     * Get user profile
     *
     * @return void
     */
    public function profile()
    {
        $user = Session::get('user');

        $response = $this->userModel->getUserById($user['id']);

        loadView('users/profile', [
            'data' => $response
        ]);
    }

    /**
     * Update user profile
     * 
     * @return void
     */
    public function updateProfile()
    {
        $user = Session::get('user');

        $response = $this->userModel->updateProfile($user['id'], $_POST);

        loadView('users/profile', [
            'data' => $response
        ]);
    }
}
