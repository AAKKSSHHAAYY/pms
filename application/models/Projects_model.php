<?php

class Projects_model extends CI_Model
{
    public function get_user_projects($user_id)
    {
        $this->db->select('*');
        $this->db->from('user_projects');
        $this->db->where($user_id);
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->num_rows();
         }
        return false;
    }
}
