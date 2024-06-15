<?php

use Framework\Database;
use Framework\Validation;

class Task
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function getTasks($owner_id)
    {
        $params = [
            'owner_id' => $owner_id
        ];

        $query = '
        SELECT * FROM task 
        WHERE owner_id = :owner_id';

        $user = $this->db->query($query, $params);
        $user = $user->fetch();
    }

    public function createTask($owner_id, array $input, $user_group_id = NULL)
    {
        $title = $input['title'];
        $description = $input['description'];

        // Create task
        $params = [
            'title' => $title,
            'description' => $description,
            'owner_id' => $owner_id,
            'user_group_id' => $user_group_id
        ];

        $query = '
        INSERT INTO task (
              title
            , description
            , owner_id
            , user_group_id)
        VALUES (
              :title
            , :description
            , :owner_id
            , :user_group_id)
        ';

        $this->db->query($query, $params);
    }
}
