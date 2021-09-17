<?php

class Product_Model extends CI_Model {

    public function select_all_published_company()
    {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('company_publication_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_published_category()
    {
        $sql = "SELECT * FROM tbl_company AS c, tbl_category AS s WHERE c.company_id = s.company_id ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function select_all_listing_product($category_id)
    {
        $sql = "SELECT * FROM tbl_category  AS s, tbl_product AS p WHERE s.category_id = p.category_id  AND s.category_id = '$category_id' ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function select_all_supplier()
    {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_product_by_category_id($category_id)
    {
        $sql = "SELECT * FROM tbl_category AS s, tbl_product AS p WHERE s.category_id = p.category_id AND s.category_id = '$category_id' ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function select_category_by_id($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $category_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
   
    public function select_all_published_product()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_publication_status', 1);
        $this->db->order_by('product_id','desc');
        $this->db->limit(8);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_product_by_id($product_id)
    {
        $sql = "SELECT * FROM tbl_product AS p WHERE p.product_id = $product_id";
        $result = $this->db->query($sql)->row();
        return $result;
    }

    public function select_category_by_name($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $category_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_customer_info($customer_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id', $customer_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function select_all_published_slider() 
    {
        $this->db->select('*');
        $this->db->from('tbl_slider');
        $this->db->where('slider_publication_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function search_product($text, $category_id)
    {	

        $sql = "SELECT * FROM tbl_product WHERE product_name LIKE  '%$text%' AND category_id LIKE '%$category_id%'   ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function select_company_by_id($company_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('company_id', $company_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function select_company_category_by_id($company_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('company_id', $company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
}