<?php

use Framework\Database;

class User
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function getUserByEmail($email)
    {
        $params = [
            'email' => $email
        ];

        $user = $this->db->query('SELECT * FROM user WHERE email = :email', $params)->fetch();
        return $user;
    }
}
