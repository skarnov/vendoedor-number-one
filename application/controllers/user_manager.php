<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_Manager extends CI_Controller {

    public function save_customer() {
        $data = array();
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['contributor_number'] = $this->input->post('contributor_number', true);
        $data['customer_email'] = $this->input->post('customer_email', true);
        $data['customer_phone'] = $this->input->post('customer_phone', true);
        $data['customer_password'] = $this->input->post('customer_password', true);
        $data['customer_address'] = $this->input->post('customer_address', true);
        $data['customer_country'] = $this->input->post('customer_country', true);
        $this->form_validation->set_rules('customer_name', 'Full Name', 'trim|required|min_length[5]|max_length[20]|xss_clean');
        $this->form_validation->set_rules('customer_email', 'Email', 'trim|required|valid_email|is_unique[tbl_customer.customer_email]|xss_clean');
        $this->form_validation->set_message('is_unique', 'Your Email is already existing in our database');
        $this->form_validation->set_rules('customer_phone', 'Phone', 'trim|required|numeric');
        $this->form_validation->set_rules('customer_password', 'Password', 'trim|required|min_length[6]|max_length[250]|matches[conform_password]|xss_clean');
        $this->form_validation->set_rules('conform_password', 'Password Confirmation', 'trim|required');
        $this->form_validation->set_rules('customer_address', 'Customer Address', 'trim|required');
        $this->form_validation->set_rules('customer_country', 'Conform Country', 'trim|required');
        if ($this->form_validation->run() == False) {
            $data['title'] = 'Form Validation Error';
            $data['all_slider'] = $this->product_model->select_all_published_slider();
            $data['all_company'] = $this->product_model->select_all_published_company();
            $data['all_category'] = $this->product_model->select_all_published_category();
            $data['maincontent'] = $this->load->view('signup', $data, true);
            $this->load->view('master', $data);
        } else {
            $this->user_administrator_model->save_customer_info($data);
            $mdata = array();
            $mdata['from_address'] = 'info@vdn1.com';
            $mdata['admin_full_name'] = 'Vendedor Number One';
            $mdata['to_address'] = $data['customer_email'];
            $mdata['subject'] = 'VDN1! - Account Created Successfully';
            $mdata['customer_password'] = $this->input->post('customer_password', true);
            $mdata['customer_name'] = $this->input->post('customer_name', true);
            $this->mailer_model->signup_email($mdata, 'account_activation_email');
            redirect('product/login');
        }
    }

    public function forgot_password() {
        $data = array();
        $data['title'] = 'Forgot Password';
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['maincontent'] = $this->load->view('forgot_password', $data, true);
        $this->load->view('master', $data);
    }

    public function reset_password() {
        $data = $this->input->post('customer_email', true);
        $result = $this->user_administrator_model->check_password($data);
        $password = $result->customer_password;
        if ($password) {
            $mdata = array();
            $mdata['from_address'] = 'info@vdn1.com';
            $mdata['admin_full_name'] = 'Vendedor Number One';
            $mdata['to_address'] = $data;
            $mdata['subject'] = 'VDN1 Forget Password';
            $mdata['customer_password'] = $password;
            $this->mailer_model->forget_password($mdata, 'forget_password_email');
            redirect('user_manager/forgot_password');
        } else {
            echo 'Your password is not exists our Database';
            redirect('user_manager/forgot_password');
        }
    }
    
    public function contact_us() {
        $data = array();
        $data['all_company'] = $this->product_model->select_all_published_company();
        $data['all_category'] = $this->product_model->select_all_published_category();        
        $data['all_slider'] = $this->product_model->select_all_published_slider();
        $data['all_product'] = $this->product_model->select_all_published_product();
        $data['name'] = $this->input->post('name', true);
        $data['email'] = $this->input->post('email', true);
        $data['message'] = $this->input->post('message', true);
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[5]|max_length[20]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        if ($this->form_validation->run() == False) {
            $data['title'] = 'Form Validation Error';
            $data['all_company'] = $this->product_model->select_all_published_company();
            $data['all_category'] = $this->product_model->select_all_published_category();        
            $data['all_slider'] = $this->product_model->select_all_published_slider();
            $data['all_product'] = $this->product_model->select_all_published_product();
            $data['maincontent'] = $this->load->view('home_content', $data, true);
            $this->load->view('master', $data);
        } else {
            $mdata = array();
            $mdata['from_address'] = $data['email'];
            $mdata['admin_full_name'] = 'Vendedor Number One';
            $mdata['to_address'] = 'info@vdn1.com';
            $mdata['subject'] = 'VDN1 - Contact Form';
            $mdata['name'] = $data['name'];
            $mdata['message'] = $data['message'];
            $this->mailer_model->contact_us($mdata, 'contact_us_form');
            redirect('user_manager/success');
        }
    }
    
    public function success()
    {
        $data = array();
        $data['title'] = 'Vendedor Number One About Us';
        $data['all_company'] = $this->product_model->select_all_published_company();
        $data['all_category'] = $this->product_model->select_all_published_category();
        $data['all_slider'] = $this->product_model->select_all_published_slider();
        $data['maincontent'] = $this->load->view('success', $data, true);
        $this->load->view('master', $data);
    }
}