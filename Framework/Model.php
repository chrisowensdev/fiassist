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
    public function responseList(int $statusCode, string $message, $data = [], array $errors = [])
    {
        $response = [
            'data' => $data,
            'status' => $statusCode,
            'message' => $message,
            'errors' => $errors
        ];

        return $response;
    }

    public function response(int $statusCode, string $message, object $data, array $errors = [])
    {
        $response = [
            'data' => $data,
            'status' => $statusCode,
            'message' => $message,
            'errors' => $errors
        ];

        return $response;
    }


    /**
     * Build out update statement dynamically from passed in values
     *
     * @param array $input
     * @param integer $id
     * @param string $table
     * @return array
     */
    public function buildMaintainQuery(array $input, int $id, string $table): array
    {

        $paramString = '';

        $index = 0;

        $queryParams = [
            'id' => $id
        ];

        foreach ($input as $key => $value) {
            if ($key !== 'function') {
                if ($index !== 0) {
                    $paramString .= ', ';
                }
                $param = $key . ' = :' . $key;
                $paramString .= $param;

                $queryParams[$key] = $value;

                $index++;
            }
        }

        $query = "
        UPDATE $table
        SET $paramString
        WHERE id = :id
        ";

        return [
            'query' => $query,
            'params' => $queryParams
        ];
    }
}
