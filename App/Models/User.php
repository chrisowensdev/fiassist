<?php

use Framework\Model;
use Framework\Validation;

class User extends Model
{
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


    /**
     * Get user by id
     * 
     * @param int $id
     * @return mixed
     */

    public function getUserById($id)
    {
        $params = [
            'id' => $id
        ];

        $query = '
            SELECT 
                  id
                , email
                , first_name
                , last_name 
            FROM user 
            WHERE id = :id
        ';

        $user = $this->db->query($query, $params)->fetch();
        return $user;
    }

    /**
     * Get user by email
     * 
     * @param string $email
     * @return mixed
     */

    public function getUserByEmail($email)
    {
        $params = [
            'email' => $email
        ];

        $query = '
            SELECT 
                  id
                , email
                , first_name
                , last_name 
            FROM user 
            WHERE email = :email
        ';

        $user = $this->db->query($query, $params)->fetch();

        return $user;
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param array $input
     * @return void
     */
    public function updateProfile($id, array $input)
    {
        $email = $input['email'];
        $first_name = $input['first_name'];
        $last_name = $input['last_name'];

        $errors = [];
        $response = [];

        // Validation
        if (!Validation::email($email)) {
            $errors['email'] = 'Please enter a valid email';
        }

        if ($errors) {
            $response = [
                'errors' => $errors,
                'data' => [
                    'email' => $email,
                    'first_name' => $first_name,
                    'last_name' => $last_name
                ]
            ];

            return $response;
        }

        // Update user account
        $params = [
            'id' => $id,
            'email' => $email,
            'first_name' => $first_name,
            'last_name' => $last_name
        ];

        $query = '
        UPDATE user
        SET   email = :email
            , first_name = :first_name
            , last_name = :last_name
            
        WHERE
              id = :id
        ';

        $this->db->query($query, $params);

        $user = $this->getUserById($id);

        $response = [
            'errors' => $errors,
            'data' => $user
        ];

        return $response;
    }


    public function resetPasswordProfile(array $input)
    {
        $email = $input['email'];

        $errors = [];
        $response = [];

        $user = $this->getUserByEmail($email);

        if (!$user) {
            $errors['message'] = 'Email does not exist';
        }

        if (!$errors) {
            $recovery_id = uniqid();

            $params = [
                'user_id' => $user->id,
                'email' => $user->email,
                'recovery_id' => $recovery_id,
                'status' => 'INPROG'
            ];

            $query = '
            INSERT INTO reset_password (
                  user_id
                , email
                , recovery_id
                , status)
            VALUES (
                  :user_id
                , :email
                , :recovery_id
                , :status)
            ';

            $this->db->query($query, $params);

            $resetPasswordId = $this->db->conn->lastInsertId();
        }
    }
}
