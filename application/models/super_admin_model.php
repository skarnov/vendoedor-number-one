<?php

class Super_Admin_Model extends CI_Model {
    
    public function save_company_info($data) 
    {
        $this->db->insert('tbl_company',$data);
    }
    
    public function select_all_company($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_company LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_edit_company()
    {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function unpublished_company_by_id($company_id)
    {
        $this->db->set('company_publication_status',0);
        $this->db->where('company_id',$company_id);
        $this->db->update('tbl_company');
    }
    
    public function published_company_by_id($company_id)
    {
        $this->db->set('company_publication_status',1);
        $this->db->where('company_id',$company_id);
        $this->db->update('tbl_company');
    }
    
    public function select_company_by_id($company_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('company_id',$company_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_company_info()
    {
        $data=array();
        $data['company_name']=$this->input->post('company_name',true);
        $data['company_email'] = $this->input->post('company_email', true);
        $data['company_description'] = $this->input->post('company_description', true);
        $data['company_publication_status'] = $this->input->post('company_publication_status', true);
        $company_id=$this->input->post('company_id',true);
        $this->db->where('company_id',$company_id);
        $this->db->update('tbl_company',$data);
    }
    
    public function delete_company_by_id($company_id)
    {
        $this->db->where('company_id',$company_id);
        $this->db->delete('tbl_company');
    }
    
    public function save_category_info($data) 
    {
        $this->db->insert('tbl_category',$data);
    }
    
    public function select_all_category()
    {
        $sql = "SELECT * FROM tbl_company AS c, tbl_category AS s WHERE c.company_id = s.company_id;";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function unpublished_category_by_id($category_id)
    {
        $this->db->set('category_publication_status',0);
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_category');
    }
    
    public function published_category_by_id($category_id)
    {
        $this->db->set('category_publication_status',1);
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_category');
    }
    
    public function select_category_by_company_id_id($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id',$category_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_category_info()
    {
        $data=array();
        $data['company_id']=$this->input->post('company_id',true);
        $data['category_name'] = $this->input->post('category_name', true);
        $data['category_publication_status'] = $this->input->post('category_publication_status', true);
        $category_id=$this->input->post('category_id',true);
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_category',$data);
    }
    
    public function delete_category_by_id($category_id)
    {
        $this->db->where('category_id',$category_id);
        $this->db->delete('tbl_category');
    }
    
    public function select_all_slider()
    {
        $this->db->select('*');
        $this->db->from('tbl_slider');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function save_slider_info($data) 
    {
        $this->db->insert('tbl_slider',$data);
    }
        
    public function nonslider_by_id($slider_id)
    {
        $this->db->set('slider_publication_status',0);
        $this->db->where('slider_id',$slider_id);
        $this->db->update('tbl_slider');
    }
    
    public function slider_by_id($slider_id)
    {
        $this->db->set('slider_publication_status',1);
        $this->db->where('slider_id',$slider_id);
        $this->db->update('tbl_slider');
    }
    
    public function select_slider_by_id($slider_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_slider');
        $this->db->where('slider_id',$slider_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_slider_info()
    {
        $data=array();
        $data['slider_heading'] = $this->input->post('slider_heading', true);
        $data['slider_subheading'] = $this->input->post('slider_subheading', true);
        $data['slider_link'] = $this->input->post('slider_link', true);
        $data['slider_publication_status'] = $this->input->post('slider_publication_status', true);
        $slider_id=$this->input->post('slider_id',true);
        $this->db->where('slider_id',$slider_id);
        $this->db->update('tbl_slider',$data);
    }
    
    public function delete_slider_by_id($slider_id)
    {
        $this->db->where('slider_id',$slider_id);
        $this->db->delete('tbl_slider');
    }
    
    public function save_product_info($data) 
    {
        $this->db->insert('tbl_product',$data);
    }
    
    public function search_product($text)
    {	 
        $sql = "SELECT * FROM tbl_company AS c, tbl_category AS s, tbl_product AS p WHERE c.company_id = p.company_id AND s.category_id=p.category_id AND p.product_name LIKE '%$text%'";
        $result = $this->db->query($sql)->result();
        return $result;
    }
      
    public function select_all_product($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_product AS p,tbl_company AS m,tbl_category AS c WHERE p.company_id=m.company_id AND p.category_id=c.category_id LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_product_by_id($product_id)
    {
        $sql = "SELECT * FROM tbl_company AS c, tbl_category AS s, tbl_product AS p WHERE c.company_id = p.company_id AND s.category_id=p.category_id AND p.product_id = '$product_id'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function select_category_by_company_id($company_id)
    {
        $sql = "SELECT * FROM tbl_category WHERE company_id = $company_id";
        $result = $this->db->query($sql)->result();
        return $result ;
    }
    
    public function no_discount_by_id($product_id)
    {        
        $this->db->set('product_discount_price_status',0);
        $this->db->where('product_id',$product_id); 
        $this->db->update('tbl_product');
    }        
    
    public function product_discount_by_id($product_id)
    {        
        $this->db->set('product_discount_price_status',1);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product');    
    }

    public function unpublished_product_by_id($product_id)
    {
        $this->db->set('product_publication_status',0);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product');
    }
    
    public function published_product_by_id($product_id)
    {
        $this->db->set('product_publication_status',1);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product');
    }
    
    public function update_product_info()
    {
        $data = array();
        $data['product_name'] = $this->input->post('product_name', true);
        $data['company_id'] = $this->input->post('company_id', true);
        $data['category_id'] = $this->input->post('category_id', true);
        $data['product_summary'] = $this->input->post('product_summary', true);
        $data['product_description'] = $this->input->post('product_description', true);
        $data['product_manufacture'] = $this->input->post('product_manufacture', true);
        $data['product_weight'] = $this->input->post('product_weight', true);
        $data['product_quantity'] = $this->input->post('product_quantity', true);
	$data['product_unit_price'] = $this->input->post('product_unit_price', true);
        $data['product_price'] = $this->input->post('product_price', true);
        $data['product_discount_price'] = $this->input->post('product_discount_price', true);
        $data['product_discount_price_status'] = $this->input->post('product_discount_price_status', true);
        $data['product_discount_percent'] = $this->input->post('product_discount_percent', true);
        $data['product_discount_percent_status'] = $this->input->post('product_discount_percent_status', true);
        $data['product_publication_status'] = $this->input->post('product_publication_status', true);
        $product_id=$this->input->post('product_id',true);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product',$data);
    }
    
    public function delete_product_by_id($product_id)
    {
        $this->db->where('product_id',$product_id);
        $this->db->delete('tbl_product');
    }

    public function select_all_customer($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_customer LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function unpublished_customer_by_id($customer_id)
    {
        $this->db->set('customer_activation_status',0);
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer');
    }
    
    public function published_customer_by_id($customer_id)
    {
        $this->db->set('customer_activation_status',1);
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer');
    }
    
    public function delete_customer_by_id($customer_id)
    {
        $this->db->where('customer_id', $customer_id);
        $this->db->delete('tbl_customer');
    }
   
    public function select_new_order() 
    {
       $this->db->select('*');
       $this->db->from('tbl_order');
       $this->db->join('tbl_customer', 'tbl_customer.customer_id = tbl_order.customer_id','left');
       $this->db->limit(11);
       $this->db->order_by('order_id','desc');
       $query_result=$this->db->get();
       $result=$query_result->result();
       return $result;
    }
    
    public function select_new_customer() 
    {
	$this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->order_by('customer_id','desc');
        $this->db->limit(9);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_order($offset,$per_page) {
         if ($offset == NULL) {
            $offset = 0;
        }
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->join('tbl_customer', 'tbl_customer.customer_id = tbl_order.customer_id', 'left');
        $this->db->limit($offset,$per_page);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function pending_order_by_id($order_id)
    {
        $this->db->set('order_status','Pending');
        $this->db->where('order_id',$order_id);
        $this->db->update('tbl_order');
    }
    
    public function paid_order_by_id($order_id)
    {
        $this->db->set('order_status','Paid');
        $this->db->where('order_id',$order_id);
        $this->db->update('tbl_order');
    }
    
    public function delete_order_by_id($order_id)
    {
        $this->db->where('order_id',$order_id);
        $this->db->delete('tbl_order');
    }
    
    public function select_order_by_id($order_id)
    {
        $sql = "SELECT * FROM tbl_customer AS c, tbl_billing AS b, tbl_order AS o, tbl_order_details d WHERE c.customer_id = o.customer_id AND b.billing_id=o.billing_id AND d.order_id=o.order_id AND o.order_id= '$order_id'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function select_order_details_by_id($order_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_order_details');
        $this->db->where('order_id',$order_id);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
}