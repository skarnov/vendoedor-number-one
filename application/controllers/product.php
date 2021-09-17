<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Product extends CI_Controller {

    public function index()
    {
        $data = array();
        $data['title'] = 'Vendedor Number One';
        $data['all_company'] = $this->product_model->select_all_published_company();
        $data['all_category'] = $this->product_model->select_all_published_category();        
        $data['all_slider'] = $this->product_model->select_all_published_slider();
        $data['all_supplier'] = $this->product_model->select_all_supplier();
        $data['maincontent'] = $this->load->view('home_content', $data, true);
        $this->load->view('master', $data);
    }

    public function login()
    {
        $data = array();
        $data['title'] = 'Vendedor Number One Login';
        $data['all_company'] = $this->product_model->select_all_published_company();
        $data['all_category'] = $this->product_model->select_all_published_category();
        $data['all_slider'] = $this->product_model->select_all_published_slider();
        $data['maincontent'] = $this->load->view('login', $data, true);
        $this->load->view('master', $data);
    }
    
    public function signup()
    {
        $data = array();
        $data['title'] = 'Vendedor Number One Signup';
        $data['all_company'] = $this->product_model->select_all_published_company();
        $data['all_category'] = $this->product_model->select_all_published_category();
        $data['all_slider'] = $this->product_model->select_all_published_slider();
        $data['maincontent'] = $this->load->view('signup', $data, true);
        $this->load->view('master', $data);
    }

    public function about()
    {
        $data = array();
        $data['title'] = 'Vendedor Number One About Us';
        $data['all_company'] = $this->product_model->select_all_published_company();
        $data['all_category'] = $this->product_model->select_all_published_category();
        $data['all_slider'] = $this->product_model->select_all_published_slider();
        $data['maincontent'] = $this->load->view('about', $data, true);
        $this->load->view('master', $data);
    }

    public function checkout()
    {
        $data = array();
        $data['title'] = 'Vendedor Number One Contact Us';
        $data['all_company'] = $this->product_model->select_all_published_company();
        $data['all_category'] = $this->product_model->select_all_published_category();
        $data['all_slider'] = $this->product_model->select_all_published_slider();
        $data['maincontent'] = $this->load->view('checkout', $data, true);
        $this->load->view('master', $data);
    }
    
    public function supplier()
    {
        $data = array();
        $data['title'] = 'Our Supplier';
        $data['all_supplier'] = $this->product_model->select_all_supplier();
        $data['all_company'] = $this->product_model->select_all_published_company();
        $data['all_category'] = $this->product_model->select_all_published_category();
        $data['all_slider'] = $this->product_model->select_all_published_slider();
        $data['maincontent'] = $this->load->view('supplier', $data, true);
        $this->load->view('master', $data);
    }
    
    public function supplier_details($company_id)
    {
        $data = array();
        $data['title'] = 'Vendedor Number One Product Listing';
        $data['all_slider'] = $this->product_model->select_all_published_slider();
        $data['all_company'] = $this->product_model->select_all_published_company();
        $data['all_category'] = $this->product_model->select_all_published_category();
        $data['supplier_detail'] = $this->product_model->select_company_by_id($company_id);
        $data['supplier_category'] = $this->product_model->select_company_category_by_id($company_id);
        $data['maincontent'] = $this->load->view('supplier_details', $data, true);
        $this->load->view('master', $data);
    }
    
    public function product_listing($company_name, $category_id)
    {
        $data = array();
        $data['title'] = 'Vendedor Number One Products';
        $data['all_slider'] = $this->product_model->select_all_published_slider();
        $data['all_company'] = $this->product_model->select_all_published_company();
        $data['all_category'] = $this->product_model->select_all_published_category();
        $data['product_listing'] = $this->product_model->select_product_by_category_id($category_id);
        $data['maincontent'] = $this->load->view('product_listing', $data, true);
        $this->load->view('master', $data);
    }

    public function product_details($product_id)
    {
        $data = array();
        $data['title'] = 'Vendedor Number One Product Listing';
        $data['all_company'] = $this->product_model->select_all_published_company();
        $data['all_category'] = $this->product_model->select_all_published_category();
        $data['product_detail'] = $this->product_model->select_product_by_id($product_id);
        $data['all_slider'] = $this->product_model->select_all_published_slider();
        $data['maincontent'] = $this->load->view('product_details', $data, true);
        $this->load->view('master', $data);
    }
   
    public function search()
    {
        $text = $this->input->post('text', true);
        $category_id = $this->input->post('category_id', true);
        $data = array();
        $data['title'] = 'Product Search';
        $data['all_company'] = $this->product_model->select_all_published_company();
        $data['all_category'] = $this->product_model->select_all_published_category();        
        $data['all_slider'] = $this->product_model->select_all_published_slider();
        $data['search_product'] = $this->product_model->search_product($text, $category_id);
        $data['maincontent'] = $this->load->view('search', $data, true);
        $this->load->view('master', $data); 
    }
}