<?php

class checkout_model extends CI_Model{
    
    public function save_customer_info($data)
    {
        $this->db->insert('tbl_customer',$data);
        $customer_id=$this->db->insert_id();
        return $customer_id;
    }
     
    public function select_company_info($company)
    {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('company_id',$company);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function save_order_info()
    {
        $data=array();
        $data['customer_id']=$this->session->userdata('customer_id');
        $data['order_total']=$this->session->userdata('grand_total');
        $data['invoice_date']= date('d/m/y');
        $this->db->insert('tbl_order',$data);
        $order_id=$this->db->insert_id();
        $contents=$this->cart->contents();
        $oddata=array();
        foreach($contents as $values)
        {
           $oddata['order_id']=$order_id;
           $oddata['product_id']=$values['id'];
           $oddata['product_price']=$values['price'];
           $oddata['product_name']=$values['name'];
           $oddata['product_sales_quantity']=$values['qty'];
           $this->db->insert('tbl_order_details',$oddata);
        }
    }
}