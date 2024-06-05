<?php

use Framework\Database;
use Framework\Validation;

class User
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function registerUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConfirmation = $_POST['password_confirmation'];

        $errors = [];

        // Validation
        if (!Validation::email($email)) {
            $errors['email'] = 'Please enter a valid email address';
        }

        if (!Validation::string($password, 6)) {
            $errors['password'] = 'Password must be at least 6 characters';
        }

        if (!validation::match($password, $passwordConfirmation)) {
            $errors['password_confirmation'] = 'Passwords do not match';
        }

        if ($errors) {
            $response = [
                'errors' => $errors,
                'data' => [
                    'email' => $email
                ]
            ];

            return $response;
        }

        // Check if email exists
        $params = [
            'email' => $email
        ];

        $query = '
        SELECT * FROM user 
        WHERE email = :email';

        $user = $this->db->query($query, $params);
        $user = $user->fetch();

        if ($user) {
            $errors['email'] = 'This email already exists';

            $response = [
                'errors' => $errors,
                'data' => [
                    'email' => $email
                ]
            ];

            return $response;
        }

        // Create user account
        $params = [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $query = '
        INSERT INTO user (
              email
            , password)
        VALUES (
              :email
            , :password)
        ';

        $this->db->query($query, $params);

        // Get new user ID
        $userId = $this->db->conn->lastInsertId();

        $response = [
            'data' => [
                'id' => $userId,
                'email' => $email
            ]
        ];


        return $response;
    }

    public function loginUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $errors = [];

        // Validation
        if (!Validation::email($email)) {
            $errors['email'] = 'Please enter a valid email';
        }

        if (!Validation::string($password, 6)) {
            $errors['password'] = 'Password must be at least 6 characters';
        }

        if ($errors) {
            $response = [
                'errors' => $errors,
                'data' => [
                    'email' => $email
                ]
            ];

            return $response;
        }

        // Check for email
        $params = [
            'email' => $email
        ];

        $query = '
        SELECT * FROM user
        WHERE email = :email
        ';

        $user = $this->db->query($query, $params);
        $user = $user->fetch();

        if (!$user || !password_verify($password, $user->password)) {
            $errors['email'] = 'Incorrect credentials';
            $response = [
                'errors' => $errors,
                'data' => [
                    'email' => $email
                ]
            ];

            return $response;
        }

        $response = [
            'data' => [
                'id' => $user->id,
                'email' => $email
            ]
        ];


        return $response;
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
