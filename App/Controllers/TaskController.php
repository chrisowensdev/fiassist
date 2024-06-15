<?php

namespace App\Controllers;

use Framework\Controller;
use Framework\Session;

class TaskController extends Controller
{
    protected $taskModel;

    public function __construct()
    {
        $this->taskModel = $this->model('Task');
    }

    public function index()
    {
        inspectAndDie('Get Tasks');
    }

    public function create()
    {
        loadView('tasks/create');
    }

    public function store()
    {
        $user = Session::get('user');

        $input = $_POST;

        $response = $this->taskModel->createTask($user['id'], $input);
    }
}
