<?php

use Framework\Model;

class Task extends Model
{
    /**
     * Get Tasks By Owner Id
     *
     * @param integer $owner_id
     * @return array
     */
    public function getTasksByOwnerId(int $owner_id)
    {
        $params = [
            'owner_id' => $owner_id
        ];

        $query = '
        SELECT * FROM task 
        WHERE owner_id = :owner_id';

        $tasks = $this->db->query($query, $params);
        $tasks = $tasks->fetchAll();

        $response = $this->responseList(200, '', $tasks);

        return $response;
    }

    public function getTaskById(array $params)
    {
        $params = [
            'id' => $params['id']
        ];

        $query = "
        SELECT * FROM task 
        WHERE id = :id";

        $tasks = $this->db->query($query, $params);
        $tasks = $tasks->fetchAll();

        $response = $this->responseList(200, '', $tasks);

        return $response;
    }

    public function getCompletedTaskByUserId($user_id)
    {
        $assigned_to_id = $user_id;

        $params = [
            'assigned_to_id' => $assigned_to_id,
            'status' => 'COMPLETE'
        ];

        $query = '
        SELECT * FROM task 
        WHERE assigned_to_id = :assigned_to_id
        AND status = :status';

        $tasks = $this->db->query($query, $params);
        $tasks = $tasks->fetchAll();

        $response = $this->responseList(200, '', $tasks);

        return $response;
    }

    public function getAssignedTaskByUserIdCount($user_id)
    {
        $assigned_to_id = $user_id;

        $params = [
            'assigned_to_id' => $assigned_to_id,
            'status' => 'ASSIGNED'
        ];

        $query = '
        SELECT COUNT(*) AS COUNT FROM task 
        WHERE assigned_to_id = :assigned_to_id
        AND status = :status';

        $count = $this->db->query($query, $params);
        $count = $count->fetch();

        $response = $this->response(200, '', $count);

        return $response;
    }

    /**
     * Get Tasks that are Todo by Assigned to ID
     *
     * @param int $user_id
     * @return void
     */
    public function getTodoTaskByAssignedId(int $user_id)
    {
        $assigned_to_id = $user_id;

        $params = [
            'assigned_to_id' => $assigned_to_id,
            'status' => 'ASSIGNED'
        ];

        $query = '
        SELECT * FROM task 
        WHERE assigned_to_id = :assigned_to_id
        AND status = :status';

        $tasks = $this->db->query($query, $params);
        $tasks = $tasks->fetchAll();

        $response = $this->responseList(200, '', $tasks);

        return $response;
    }

    /**
     * Create task
     *
     * @param integer $owner_id
     * @param array $input
     * @return array
     */
    public function createTask(int $owner_id, array $input)
    {
        $title = $input['title'];
        $description = $input['description'];
        $user_group_id = $input['user_group_id'];
        $frequency = $input['frequency'];
        $status = $input['status'];
        $assigned_to_id = NULL;

        if ($status === 'ASSIGNED') {
            $assigned_to_id = $owner_id;
        }

        // Create task
        $params = [
            'title' => $title,
            'description' => $description,
            'owner_id' => $owner_id,
            'user_group_id' => $user_group_id,
            'frequency' => $frequency,
            'status' => $status,
            'assigned_to_id' => $assigned_to_id
        ];

        $query = '
        INSERT INTO task (
              title
            , description
            , owner_id
            , user_group_id
            , frequency
            , status
            , assigned_to_id)
        VALUES (
              :title
            , :description
            , :owner_id
            , :user_group_id
            , :frequency
            , :status
            , :assigned_to_id)
        ';

        $this->db->query($query, $params);

        $message = 'Task created successfully';

        $response = $this->responseList(201, $message);

        return $response;
    }

    public function deleteTask(array $params)
    {
        $id = $params['id'];

        $params = [
            'id' => $id
        ];

        $task = $this->db->query('SELECT * FROM task WHERE id = :id', $params)->fetch();

        //Check if task exists
        if (!$task) {
            $response = $this->responseList(400, 'Task does not exists');
            return $response;
        }

        // // Authorization
        // if (!Authorization::isOwner($listing->user_id)) {
        //     Session::setFlashMessage('error_message', 'You are not authorized to delete this listing');
        //     return redirect('/listings/' . $listing->id);
        // }

        $this->db->query('DELETE FROM task WHERE id = :id', $params);

        $message = 'Task has been deleted';

        $response = $this->responseList(202, $message);

        return $response;
    }

    public function completeTask(array $params, $input)
    {
        $id = $params['id'];

        $status = $input['status'];

        $params = [
            'id' => $id,
            'status' => $status
        ];

        $query = "
        UPDATE task
        SET status = :status
        WHERE id = :id
        ";

        $this->db->query($query, $params);

        $message = 'Task updated successfully';

        $response = $this->responseList(201, $message);

        return $response;
    }
}
