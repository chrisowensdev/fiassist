<?php

use Framework\Model;

class Task extends Model
{
    /**
     * Get Tasks By Owner Id
     *
     * @param integer $owner_id
     * @return void
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

        $response = $this->response(200, '', $tasks);

        return $response;
    }

    /**
     * Create task
     *
     * @param integer $owner_id
     * @param array $input
     * @return void
     */
    public function createTask(int $owner_id, array $input)
    {
        $title = $input['title'];
        $description = $input['description'];
        $user_group_id = $input['user_group_id'];

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

        $message = 'Task created successfully';

        $response = $this->response(201, $message);

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
            $response = $this->response(400, 'Task does not exists');
            return $response;
        }

        // // Authorization
        // if (!Authorization::isOwner($listing->user_id)) {
        //     Session::setFlashMessage('error_message', 'You are not authorized to delete this listing');
        //     return redirect('/listings/' . $listing->id);
        // }

        $this->db->query('DELETE FROM task WHERE id = :id', $params);

        $message = 'Task has been deleted';

        $response = $this->response(202, $message);

        return $response;
    }

    public function completeTask(array $params)
    {
    }
}
