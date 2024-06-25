<?php

namespace App\Controllers;

use Framework\Controller;
use Framework\Session;

class TaskController extends Controller
{
    protected $taskModel;
    protected $userGroupModel;

    public function __construct()
    {
        $this->taskModel = $this->model('Task');
        $this->userGroupModel = $this->model('UserGroup');
    }

    public function index()
    {
        $user = Session::get('user');

        $response = $this->taskModel->getTodoTaskByAssignedId($user['id']);

        $completed_tasks = $this->taskModel->getCompletedTaskByUserId($user['id']);

        loadView('tasks/index', [
            'tasks' => $response['data'],
            'completed_tasks' => $completed_tasks['data']
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

    public function delete($params)
    {
        $this->taskModel->deleteTask($params);

        redirect('/tasks');
    }

    public function view($params)
    {
        $mode = '';

        if (isset($_GET['mode'])) {
            $mode = $_GET['mode'];
        };

        $response = $this->taskModel->getTaskById($params);

        loadView('/tasks/task', [
            'task' => $response['data'][0],
            'mode' => $mode
        ]);
    }

    public function complete($params)
    {
        $input = $_POST;
        $this->taskModel->completeTask($params, $input);

        redirect('/tasks');
    }

    public function group()
    {
        $user = Session::get('user');
        $this->userGroupModel->getUserGroupByUserId($user['id']);
        inspectAndDie('Group TaskController');
    }

    public function maintain($params)
    {
        $id = $params['id'];
        $input = $_POST;

        $function = strtoupper($input['function']);

        // inspectAndDie($function);

        if ($function === 'EDIT') {
            // $response = $this->taskModel->getTaskById($params);
            redirect("/tasks/$id?mode=EDIT");
        }

        if (isset($input['complete'])) {
            // $input['status'] = 'COMPLETE';
            // $this->taskModel->completeTask($params, $input);
            // redirect('/tasks');
            inspectAndDie('COMPLETE');
        }

        if (isset($input['update'])) {
            // $this->taskModel->maintainTask($params, $input);
            inspectAndDie('UPDATE');
        }
    }
}
