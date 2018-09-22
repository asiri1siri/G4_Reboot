<?php namespace App\Models;

use System\BaseModel;

class Item extends BaseModel
{
    public function get_hash($NAME)
    {
        $data = $this->db->select('password FROM items WHERE NAME = :NAME', [':NAME' => $NAME]);
        return (isset($data[0]->password) ? $data[0]->password : null);
    }

    public function get_data($NAME)
    {
        $data = $this->db->select('* FROM items WHERE NAME = :NAME', [':NAME' => $NAME]);
        return (isset($data[0]) ? $data[0] : null);
    }

    public function get_items()
    {
        return $this->db->select('* from items order by NAME');
    }

    public function get_item($ID)
    {
        $data = $this->db->select('* from items where ID = :ID', [':ID' => $ID]);
        return (isset($data[0]) ? $data[0] : null);
    }

    public function get_item_NAME($NAME)
    {
        $data = $this->db->select('NAME from items where NAME = :NAME', [':NAME' => $NAME]);
        return (isset($data[0]->NAME) ? $data[0]->NAME : null);
    }

    public function insert($data)
    {
        $this->db->insert('items', $data);
    }

    public function update($data, $where)
    {
        $this->db->update('items', $data, $where);
    }

    public function delete($where)
    {
        $this->db->delete('items', $where);
    }
}
