<?php

class User_Administrator_Model extends CI_Model {
    
    public function save_customer_info($data)
    {
        $this->db->insert('tbl_customer',$data);
        $customer_id=$this->db->insert_id();
        return $customer_id;
    }
    
    public function user_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_email',$data['customer_email']);
        $this->db->where('customer_password', $data['customer_password']);
	$this->db->where('customer_activation_status',1);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function check_password($data)
    {
        $sql="select * from tbl_customer where customer_email='$data'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function customer_email($customer_id)
    {
        $sql="select * from tbl_customer where customer_id='$customer_id'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
}