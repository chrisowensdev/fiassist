<?php

use Framework\Model;
use Framework\Validation;

class UserGroup extends Model
{
    public function getUserGroupByUserId($id)
    {
        $params = [
            'id' => $id
        ];

        $query = '
            SELECT 
                  a.id
                , a.name
            FROM user_group a, user_group_ref b 
            WHERE b.user_id = :id and b.user_group_id = a.id
        ';

        $user_group = $this->db->query($query, $params)->fetch();

        inspectAndDie($user_group);
        return $user_group;
    }
}
