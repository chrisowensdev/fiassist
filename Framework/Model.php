<?php

namespace Framework;

class Model
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Standard Response
     *
     * @param array $data
     * @param integer $statusCode
     * @param array $errors
     * @return void
     */
    public function response(int $statusCode, string $message, array $data = [], array $errors = [])
    {
        $response = [
            'data' => $data,
            'status' => $statusCode,
            'message' => $message,
            'errors' => $errors
        ];

        return $response;
    }
}