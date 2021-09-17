<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Administrator extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id != NULL)
        {
            redirect('super_admin', 'refresh');
        }
    }

    public function index()
    {
        $this->load->view('admin/admin_login');
    }

    public function check_admin_login()
    {
        $data = array();
        $data['admin_email'] = $this->input->post('admin_email', true);
        $data['admin_password'] = $this->input->post('admin_password', true);
        $this->form_validation->set_rules('admin_email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('admin_password', 'Password', 'trim|required|min_length[6]|max_length[250]|xss_clean');
        if($this->form_validation->run() == False)
        {
            $this->load->view('admin/admin_login');
        }
        else
        {
            $result = $this->administrator_model->admin_login_check($data);
            $sdata = array();
            if ($result)
            {
                $sdata['admin_id'] = $result->admin_id;
                $sdata['admin_name'] = $result->admin_name;
                $this->session->set_userdata($sdata);
                redirect('super_admin');
            } 
            else
            {
                $sdata['exception'] = 'Your Email / Password Invalide !';
                $this->session->set_userdata($sdata);
                redirect('administrator');
            }
        }
    }
}