<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Checkout extends CI_Controller {

    public function index() {
        $customer_id = $this->session->userdata('customer_id');
        $data = array();
        if ($customer_id == NULL) {
            $data = array();
            $data['title'] = 'Vendedor Number One Checkout';
            $data['all_company'] = $this->product_model->select_all_published_company();
            $data['all_category'] = $this->product_model->select_all_published_category();
            $data['all_slider'] = $this->product_model->select_all_published_slider();
            $data['maincontent'] = $this->load->view('login', $data, true);
            $this->load->view('master', $data);
        }
        if ($customer_id != NULL) {
            redirect('checkout/confirm_order');
        }
    }

    public function confirm_order() {
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id == NULL) {
            redirect('product/login');
        }
        if ($customer_id != NULL) {
            $this->checkout_model->save_order_info();
            $mdata = array();
            $customer_id = $this->session->userdata('customer_id');
            $contents = $this->cart->contents();
 	    foreach ($contents as $v_contents) {}   
            $company=$v_contents['company_id'];
            $mdata['company_info'] = $this->checkout_model->select_company_info($company);
            $mdata['customer_info'] = $this->product_model->select_customer_info($customer_id);
            $mdata['from_address'] = 'vdnone2015@gmail.com';
            $mdata['admin_full_name'] = 'Vendedor Number One Invoice';
            $mdata['to_address'] = $mdata['customer_info']->customer_email;
            $mdata['cc_address'] = $mdata['company_info']->company_email;
            $mdata['subject'] = 'Vendedor Number One - Order Invoice';
            $this->load->view('invoice', $mdata);
            $html = $this->output->get_output();
            $this->load->library('dompdf_gen');
            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $CI = & get_instance();
            $CI->load->helper('file');
            file_put_contents('invoices/invoice.pdf', $this->dompdf->output());
            $this->mailer_model->sendEmail($mdata, 'invoice');
            redirect('checkout/order_complete');
        }
    }

    public function order_complete() {
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id == NULL) {
            redirect('welcome/login');
        }
        if ($customer_id != NULL) {
            $data = array();
            $data['all_company'] = $this->product_model->select_all_published_company();
            $data['all_category'] = $this->product_model->select_all_published_category();
            $data['all_slider'] = $this->product_model->select_all_published_slider();
            $data['title'] = 'Vendedor Number One Complete Order';
            $data['maincontent'] = $this->load->view('confirm_order', $data, true);
            $this->load->view('master', $data);
        }
    }
}