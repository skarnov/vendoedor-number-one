<?php

class Administrator_Model extends CI_Model {

    public function admin_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_email', $data['admin_email']);
        $this->db->where('admin_password', md5($data['admin_password']));
        $this->db->where('admin_activation_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
}