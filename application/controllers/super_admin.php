<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Super_Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL)
        {
            redirect('administrator', 'refresh');
        }
    }

    public function index()
    {
        $data = array();
        $data['all_order'] = $this->super_admin_model->select_new_order();
        $data['all_customer'] = $this->super_admin_model->select_new_customer();
        $data['dashboard'] = $this->load->view('admin/dashboard', $data, true);
        $data['title'] = 'Dashboard';
        $this->load->view('admin/admin_master', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $sdata['message'] = 'You are successfully Logout ';
        $this->session->set_userdata($sdata);
        redirect('administrator');
    }

    public function add_company()
    {
        $data = array();
        $data['dashboard'] = $this->load->view('admin/add_company', '', true);
        $data['title'] = 'Add Company';
        $this->load->view('admin/admin_master', $data);
    }

    public function save_company()
    {
        $this->form_validation->set_rules('company_publication_status', 'Publication Status', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Company Publication Status');
        $this->form_validation->set_rules('company_email', 'Email', 'trim|required|valid_email|is_unique[tbl_company.company_email]|xss_clean');
        $this->form_validation->set_message('is_unique', 'Your Email is already existing in our database');
        if ($this->form_validation->run() == False) {
            $data = array();
            $data['title'] = 'Form Validation Error';
            $data['dashboard'] = $this->load->view('admin/add_company', '', true);
            $data['title'] = 'Add Company';
            $this->load->view('admin/admin_master', $data);
        } else {
            $data = array();
            $data['company_name'] = $this->input->post('company_name', true);
            $data['company_email'] = $this->input->post('company_email', true);
            $data['company_description'] = $this->input->post('company_description', true);
            $cnt = 0;
            foreach ($_FILES as $eachFile) {
                if ($eachFile['size'] > 0) {
                    $config['upload_path'] = 'images/company_image/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '10240';
                    $config['max_width'] = '1920';
                    $config['max_height'] = '1080';
                    $error = '';
                    $fdata = array();
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('company_image')) {
                        $error = $this->upload->display_errors();
                        echo $error;
                        exit();
                    } else {
                        $fdata = $this->upload->data();
                        $index = 'company_image';
                        $data[$index] = $config['upload_path'] . $fdata['file_name'];
                    }
                }
            }
            $data['company_publication_status'] = $this->input->post('company_publication_status', true);
            if ($data['company_publication_status'] == '1') {
                $sdata = array();
                $sdata['message'] = 'Company published';
                $this->session->set_userdata($sdata);
            }
            if ($data['company_publication_status'] == '0') {
                $sdata = array();
                $sdata['message'] = 'Company saved but not published';
                $this->session->set_userdata($sdata);
            }
            $this->super_admin_model->save_company_info($data);
            redirect('super_admin/add_company');
        }
    }

    public function manage_company()
    {
        $data = array();
        $config['base_url'] = base_url() . 'super_admin/manage_company/';
        $config['total_rows'] = $this->db->count_all('tbl_company');
        $config['per_page'] = '5';
        $config['num_links'] = 10;
        /**STYLE PAGINATION**/
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        /**END STYLE PAGINATION**/
        $this->pagination->initialize($config);
        $data['all_company'] = $this->super_admin_model->select_all_company($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_company', $data, true);
        $data['title'] = 'Manage Company';
        $this->load->view('admin/admin_master', $data);
    }

    public function unpublished_company($company_id)
    {
        $this->super_admin_model->unpublished_company_by_id($company_id);
        redirect('super_admin/manage_company');
    }

    public function published_company($company_id)
    {
        $this->super_admin_model->published_company_by_id($company_id);
        redirect('super_admin/manage_company');
    }

    public function edit_company($company_id)
    {
        $data = array();
        $data['company_info'] = $this->super_admin_model->select_company_by_id($company_id);
        $data['dashboard'] = $this->load->view('admin/edit_company', $data, true);
        $data['title'] = 'Edit Company';
        $sdata = array();
        $sdata['message'] = 'Update company information successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_company()
    {
        $this->super_admin_model->update_company_info();
        redirect('super_admin/manage_company');
    }

    public function delete_company($company_id) 
    {
        $this->super_admin_model->delete_company_by_id($company_id);
        redirect('super_admin/manage_company');
    }

    public function add_category()
    {
        $data = array();
        $data['title'] = 'Add Category';
        $data['all_company'] = $this->super_admin_model->select_all_edit_company();        
        $data['dashboard'] = $this->load->view('admin/add_category', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function save_category() {
        $this->form_validation->set_rules('company_id', 'Comapny Status', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select The Company');
        $this->form_validation->set_rules('category_publication_status', 'Publication Status', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Publication Status');
        if ($this->form_validation->run() == False) {
            $data = array();
            $data['title'] = 'Form Validation Error';
            $data['all_company'] = $this->super_admin_model->select_all_edit_company(); 
            $data['dashboard'] = $this->load->view('admin/add_sub_category', $data, true);
            $this->load->view('admin/admin_master', $data);
        } else {
            $data = array();
            $data['company_id'] = $this->input->post('company_id', true);
            $data['category_name'] = $this->input->post('category_name', true);
            $data['category_publication_status'] = $this->input->post('category_publication_status', true);
            if ($data['category_publication_status'] == '1') {
                $sdata = array();
                $sdata['message'] = 'Category published';
                $this->session->set_userdata($sdata);
            }
            if ($data['category_publication_status'] == '0') {
                $sdata = array();
                $sdata['message'] = 'Category saved but not published';
                $this->session->set_userdata($sdata);
            }
            $this->super_admin_model->save_category_info($data);
            redirect('super_admin/add_category');
        }
    }
    
    public function manage_category()
    {
        $data = array();
        $data['all_category'] = $this->super_admin_model->select_all_category();
        $data['dashboard'] = $this->load->view('admin/manage_category', $data, true);
        $data['title'] = 'Manage Category';
        $this->load->view('admin/admin_master', $data);
    }

    public function unpublished_category($category_id)
    {
        $this->super_admin_model->unpublished_category_by_id($category_id);
        redirect('super_admin/manage_category');
    }

    public function published_category($category_id) 
    {
        $this->super_admin_model->published_category_by_id($category_id);
        redirect('super_admin/manage_category');
    }

    public function edit_category($category_id)
    {
        $data = array();
        $data['all_company'] = $this->super_admin_model->select_all_edit_company();  
        $data['category_info'] = $this->super_admin_model->select_category_by_company_id_id($category_id);
        $data['dashboard'] = $this->load->view('admin/edit_category', $data, true);
        $data['title'] = 'Edit Category';
        $sdata = array();
        $sdata['message'] = 'Update category information successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_category()
    {
        $this->super_admin_model->update_category_info();
        redirect('super_admin/manage_category');
    }

    public function delete_category($category_id)
    {
        $this->super_admin_model->delete_category_by_id($category_id);
        redirect('super_admin/manage_category');
    }
    
    public function add_slider()
    {
        $data = array();
        $data['dashboard'] = $this->load->view('admin/add_slider', $data, true);
        $data['title'] = 'Add Slider';
        $this->load->view('admin/admin_master', $data);
    }

    public function save_slider()
    {
        $this->form_validation->set_rules('slider_publication_status', 'Publication Status', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Slider Publication Status');
        if ($this->form_validation->run() == False) {
            $data = array();
            $data['dashboard'] = $this->load->view('admin/add_slider', $data, true);
            $data['title'] = 'Form Validation Error';
            $this->load->view('admin/admin_master', $data);
        } else {
            $data = array();
            $cnt = 0;
            foreach ($_FILES as $eachFile) {
                if ($eachFile['size'] > 0) {
                    $config['upload_path'] = 'images/slider_image/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '10240';
                    $config['max_width'] = '1920';
                    $config['max_height'] = '1080';
                    $error = '';
                    $fdata = array();
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('slider_image')) {
                        $error = $this->upload->display_errors();
                        echo $error;
                        exit();
                    } else {
                        $fdata = $this->upload->data();
                        $index = 'slider_image';
                        $data[$index] = $config['upload_path'] . $fdata['file_name'];
                    }
                }
            }
            $data['slider_heading'] = $this->input->post('slider_heading', true);
            $data['slider_subheading'] = $this->input->post('slider_subheading', true);
            $data['slider_link'] = $this->input->post('slider_link', true);
            $data['slider_publication_status'] = $this->input->post('slider_publication_status', true);
            $this->super_admin_model->save_slider_info($data);
            $data['slider_publication_status'] = $this->input->post('slider_publication_status', true);
            if ($data['slider_publication_status'] == '1') {
                $sdata = array();
                $sdata['message'] = 'Slider published';
                $this->session->set_userdata($sdata);
            }
            if ($data['slider_publication_status'] == '0') {
                $sdata = array();
                $sdata['message'] = 'Slider not published';
                $this->session->set_userdata($sdata);
            }
            redirect('super_admin/add_slider');
        }
    }

    public function manage_slider() 
    {
        $data = array();
        $data['slider'] = $this->super_admin_model->select_all_slider();
        $data['dashboard'] = $this->load->view('admin/manage_slider', $data, true);
        $data['title'] = 'Manage Slider';
        $this->load->view('admin/admin_master', $data);
    }

    public function nonslider($slider_id)
    {
        $this->super_admin_model->nonslider_by_id($slider_id);
        redirect('super_admin/manage_slider');
    }

    public function slider($slider_id)
    {
        $this->super_admin_model->slider_by_id($slider_id);
        redirect('super_admin/manage_slider');
    }

    public function edit_slider($slider_id)
    {
        $data = array();
        $data['slider_info'] = $this->super_admin_model->select_slider_by_id($slider_id);
        $data['dashboard'] = $this->load->view('admin/edit_slider', $data, true);
        $data['title'] = 'Edit Slider';
        $sdata = array();
        $sdata['message'] = 'Update slider information successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_slider() 
    {
        $this->super_admin_model->update_slider_info();
        redirect('super_admin/manage_slider');
    }

    public function delete_slider($slider_id)
    {
        $this->super_admin_model->delete_slider_by_id($slider_id);
        redirect('super_admin/manage_slider');
    }
    
    public function add_product() {
        $data = array();
        $data['all_company'] = $this->super_admin_model->select_all_edit_company();        
        $data['dashboard'] = $this->load->view('admin/add_product', $data, true);
        $data['title'] = 'Manage Category';
        $this->load->view('admin/admin_master', $data);
    }

    public function show_company_category($company_id)
    {
        $data = array();
        $data['select_category'] = $this->super_admin_model->select_category_by_company_id($company_id);
        echo $this->load->view('admin/company_category_option', $data);
    }
    
    public function select_category_by_id($company_id)
    {
        $data = array();
        $data['select_category'] = $this->super_admin_model->select_category_by_company_id($company_id);
        $data['dashboard'] = $this->load->view('admin/add_product', $data, true);
        $data['title'] = 'Manage Category';
        $this->load->view('admin/admin_master', $data);
    }

    public function save_product()
    {
        $this->form_validation->set_rules('category_id', 'Category', 'required|callback_select_validate');
        $this->form_validation->set_rules('product_publication_status', 'Publication Status', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Product Publication Status');
        if ($this->form_validation->run() == False) {
            $data = array();
            $data['all_category'] = $this->super_admin_model->select_all_category();
            $data['dashboard'] = $this->load->view('admin/add_product', $data, true);
            $data['title'] = 'Form Validation Error';
            $this->load->view('admin/admin_master', $data);
        } else {
            $data = array();
            $data['product_name'] = $this->input->post('product_name', true);
            $data['company_id'] = $this->input->post('company_id', true);
            $data['category_id'] = $this->input->post('category_id', true);
            $data['product_summary'] = $this->input->post('product_summary', true);
            $data['product_description'] = $this->input->post('product_description', true);
            $data['product_manufacture'] = $this->input->post('product_manufacture', true);
            $data['product_weight'] = $this->input->post('product_weight', true);
            $cnt = 0;
            foreach ($_FILES as $eachFile) {
                if ($eachFile['size'] > 0) {
                    $config['upload_path'] = 'images/product_photo_' . $cnt . '/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '10240';
                    $config['max_width'] = '5000';
                    $config['max_height'] = '5000';
                    $error = '';
                    $fdata = array();
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('product_photo_' . $cnt)) {
                        $error = $this->upload->display_errors();
                        echo $error;
                        exit();
                    } else {
                        $fdata = $this->upload->data();
                        $up['main'] = $config['upload_path'] . $fdata['file_name'];
                    }
                    /**Start Create Thumbnail**/
                    $config['image_library'] = 'gd2';
                    $config['new_image'] = 'images/product_photo_' . $cnt . '/';
                    $config['source_image'] = $up['main'];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['maintain_ratio'] = true;
                    $config['width'] = '640';
                    $config['height'] = '480';
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    if (!$this->image_lib->resize()) {
                        $error = $this->image_lib->display_errors();
                        echo $error;
                        exit();
                    } else {
                        $index = 'product_photo_' . $cnt;
                        $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    }
                    unlink($up['main']);
                }
                $cnt++;
            }
            $data['product_quantity'] = $this->input->post('product_quantity', true);
            $data['product_unit_price'] = $this->input->post('product_unit_price', true);
            $data['product_price'] = $this->input->post('product_price', true);
            $data['product_discount_price'] = $this->input->post('product_discount_price', true);
            $data['product_discount_price_status'] = $this->input->post('product_discount_price_status', true);
            $data['product_discount_percent'] = $this->input->post('product_discount_percent', true);
            $data['product_discount_percent_status'] = $this->input->post('product_discount_percent_status', true);
            $data['product_publication_status'] = $this->input->post('product_publication_status', true);
            $this->super_admin_model->save_product_info($data);
            $sdata = array();
            $sdata['message'] = 'Product has been saved';
            $this->session->set_userdata($sdata);
            redirect('super_admin/add_product');
        }
    }

    public function manage_product()
    {
        $data = array();
        $config['base_url'] = base_url() . 'super_admin/manage_product/';
        $config['total_rows'] = $this->db->count_all('tbl_product');
        $config['per_page'] = '5';
        $config['num_links'] = 10;
        /**STYLE PAGINATION**/
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        /**END STYLE PAGINATION**/
        $this->pagination->initialize($config);
        $data['all_product'] = $this->super_admin_model->select_all_product($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_product', $data, true);
        $data['title'] = 'Manage Product';
        $this->load->view('admin/admin_master', $data);
    }
    
    public function search()
    {
        $text = $this->input->post('text', true);
        $data = array();
        $data['title'] = 'Product Search';
        $data['search_product'] = $this->super_admin_model->search_product($text);
        $data['dashboard'] = $this->load->view('admin/search', $data, true);
        $this->load->view('admin/admin_master', $data); 
    }

    public function unpublished_product($product_id)
    {
        $this->super_admin_model->unpublished_product_by_id($product_id);
        redirect('super_admin/manage_product');
    }

    public function published_product($product_id) {
        $this->super_admin_model->published_product_by_id($product_id);
        redirect('super_admin/manage_product');
    }

    public function edit_product($product_id)
    {
        $data = array();
        $data['all_company'] = $this->super_admin_model->select_all_edit_company();
        $data['product_info'] = $this->super_admin_model->select_product_by_id($product_id);
        $data['dashboard'] = $this->load->view('admin/edit_product', $data, true);
        $data['title'] = 'Edit Product';
        $sdata = array();
        $sdata['message'] = 'Update product information successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_product() 
    {
        $this->super_admin_model->update_product_info();
        redirect('super_admin/manage_product');
    }

    public function delete_product($product_id) 
    {
        $this->super_admin_model->delete_product_by_id($product_id);
        redirect('super_admin/manage_product');
    }

    public function manage_customer() {
        $data = array();
        $config['base_url'] = base_url() . 'super_admin/manage_customer/';
        $config['total_rows'] = $this->db->count_all('tbl_customer');
        $config['per_page'] = '5';
        $config['num_links'] = 10;
        /**STYLE PAGINATION**/
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        /**END STYLE PAGINATION**/
        $this->pagination->initialize($config);
        $data['all_customer'] = $this->super_admin_model->select_all_customer($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_customer', $data, true);
        $data['title'] = 'Manage Customer';
        $this->load->view('admin/admin_master', $data);
    }

    public function disable_customer($customer_id) 
    {
        $this->super_admin_model->unpublished_customer_by_id($customer_id);
        redirect('super_admin/manage_customer');
    }

    public function enable_customer($customer_id)
    {
        $this->super_admin_model->published_customer_by_id($customer_id);
        $email = $this->user_administrator_model->customer_email($customer_id);
        $customer_email = $email->customer_email;
        $mdata = array();
        $mdata['from_address'] = 'info@vdn1.com';
        $mdata['admin_full_name'] = 'Vendedor Number One';
        $mdata['to_address'] = $customer_email;
        $mdata['subject'] = 'VDN1! - Account Created Successfully';
        $this->mailer_model->account_activation_email($mdata, 'account_activation_email');
        redirect('super_admin/manage_customer');
    }

    public function delete_customer($customer_id)
    {
        $this->super_admin_model->delete_customer_by_id($customer_id);
        redirect('super_admin/manage_customer');
    }

    public function manage_order()
    {
        $data = array();
        $config['base_url'] = base_url() . 'super_admin/manage_order/';
        $config['total_rows'] = $this->db->count_all('tbl_order');
        $config['per_page'] = '5';
        $config['num_links'] = 10;
        /**STYLE PAGINATION**/
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        /**END STYLE PAGINATION**/
        $this->pagination->initialize($config);
        $data['all_order'] = $this->super_admin_model->select_all_order($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_order', $data, true);
        $data['title'] = 'Manage Order';
        $this->load->view('admin/admin_master', $data);
    }

    public function pending_order($order_id) 
    {
        $this->super_admin_model->pending_order_by_id($order_id);
        redirect('super_admin/manage_order');
    }

    public function paid_order($order_id) 
    {
        $this->super_admin_model->paid_order_by_id($order_id);
        redirect('super_admin/manage_order');
    }

    public function delete_order($order_id)
    {
        $this->super_admin_model->delete_order_by_id($order_id);
        redirect('super_admin/manage_order');
    }

    public function invoice($order_id)
    {
        $data = array();
        $data['order_info'] = $this->super_admin_model->select_order_by_id($order_id);
        $data['dashboard'] = $this->load->view('admin/invoice', $data, true);
        $data['title'] = 'Invoice';
        $this->load->view('admin/admin_master', $data);
    }

    public function invoice_details($order_id)
    {
        $data = array();
        $data['order_details'] = $this->super_admin_model->select_order_details_by_id($order_id);
        $data['dashboard'] = $this->load->view('admin/invoice_details', $data, true);
        $data['title'] = 'Invoice Details';
        $this->load->view('admin/admin_master', $data);
    }

    public function about_cms()
    {
        $data = array();
        $data['title'] = 'About Sk Arnov';
        $data['dashboard'] = $this->load->view('admin/about_cms', $data, true);
        $this->load->view('admin/admin_master', $data);
    }
}