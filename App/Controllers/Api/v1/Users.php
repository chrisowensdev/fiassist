<?php

namespace App\Controllers\Api\v1;

use Framework\Controller;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

class Users extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $user = $this->userModel->getUserByEmail('chris@gmail.com');
        http_response_code(200);
        echo json_encode($user);
    }
}
