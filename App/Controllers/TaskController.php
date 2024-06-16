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
        $user = Session::get('user');

        $response = $this->taskModel->getTasksByOwnerId($user['id']);

        loadView('tasks/index', [
            'tasks' => $response['data']
        ]);
    }

    public function create()
    {
        loadView('tasks/create');
    }

    public function store()
    {
        $user = Session::get('user');

        $input = $_POST;

        $this->taskModel->createTask($user['id'], $input);

        redirect('/tasks');
    }
}
