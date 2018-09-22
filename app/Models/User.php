<?php
namespace App\Models;

use System\BaseModel;

class User extends BaseModel
{
    public function get_users()
    {
        return $this->db->select('* from users order by ID');
    }

    public function get_user($ID)
    {
        $data = $this->db->select('* from users where ID = :ID', [':ID' => $ID]);
        return (isset($data[0]) ? $data[0] : null);
    }

    public function insert($data)
    {
        $this->db->insert('users', $data);
    }

    public function update($data, $where)
    {
        $this->db->update('users', $data, $where);
    }

    public function delete($where)
    {
        $this->db->delete('users', $where);
    }
}