<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Cart extends CI_Controller {
    
    public function ajax_add_to_cart($product_id, $quantiry)
    {
        if ($quantiry== 0)
        {
            $quantiry= 1;
        }
        $product_info = $this->product_model->select_product_by_id($product_id);
        $company_id=$product_info->company_id;        
        $sdata = array();
        $sdata['company_id'] = $company_id;
        $this->session->set_userdata($sdata);
        $data = array(
            'id' => $product_info->product_id,
            'company_id' => $product_info->company_id,
            'image' => $product_info->product_photo_0,
            'name' => $product_info->product_name,
            'description' =>$product_info->product_summary,
            'qty' => $quantiry,
            'price' =>$product_info->product_price,  
        );
        $this->cart->insert($data);        
	echo $this->load->view('shopping_button');
    }
    
    public function show_cart()
    {
        $data = array();
        $data['title'] = 'Vendedor Number One Shoping Cart';
        $data['all_company'] = $this->product_model->select_all_published_company();
        $data['all_category'] = $this->product_model->select_all_published_category();
        $data['all_slider'] = $this->product_model->select_all_published_slider();
        $data['maincontent'] = $this->load->view('cart_view', $data, true);
        $this->load->view('master', $data);
    }

    public function update_cart()
    {
        $qty = $this->input->post('product_quantity', true);
        $rowid = $this->input->post('rowid', true);
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty
        );
        $this->cart->update($data);
        redirect('cart/show_cart');
    }

    public function remove($rowid)
    {
        $data = array(
            'rowid' => $rowid,
            'qty' => '0'
        );
        $this->cart->update($data);
        redirect('cart/show_cart');
    }
}