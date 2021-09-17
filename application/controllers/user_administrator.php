<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class User_Administrator extends CI_Controller {    
    
    public function customer_login_check()
    {
        $data = array();
        $data['customer_email'] = $this->input->post('customer_email', true);
        $data['customer_password'] = $this->input->post('customer_password', true);
        $result = $this->user_administrator_model->user_login_check($data);
        $sdata = array();
        if ($result != NULL)
        {
            $sdata['customer_id'] = $result->customer_id;
            $sdata['customer_name'] = $result->customer_name;
            $this->session->set_userdata($sdata);
            redirect('product');
        } 
        if ($result ==NULL)
        {
            $sdata['exception'] = 'Your Vendedor Number One login information invalid!';
            $this->session->set_userdata($sdata);
            redirect('product/login');
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('product/login');
    }
}