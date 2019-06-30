<?php

class Login_Database extends CI_Model
{
    public function save_project($data)
    {
        $this->db->insert('user_login', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
    }
}
