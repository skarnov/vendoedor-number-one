<?php

class Mailer_model extends CI_Model {
    
    public function sendEmail($data, $templateName)
    {
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->bcc('vdnone2015@gmail.com');
        $this->email->cc($data['cc_address']);  
        $this->email->subject($data['subject']);
        $this->email->attach('invoices/invoice.pdf');
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);  
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }
    
    public function account_activation_email($data, $templateName)
    {
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);  
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }
    
    public function signup_email($data, $templateName)
    {
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);  
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }
    
    public function forget_password($data, $templateName)
    {
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);  
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }
    
    public function contact_us($data, $templateName)
    {
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }
}