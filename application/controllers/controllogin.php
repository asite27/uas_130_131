<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class controllogin extends CI_Controller { 
   
    function construct(){ 
        parent::construct(); 
        $this->load->model('loginmodel'); 
    
    function index() { 
        $this->load->view('login_view'); 
    
    function login_action() { 
        $username = $this->input->post('username'); 
        $password = $this->input->post('password'); $where = array( 
            'username' => $username, 
            'password' => $password 
        ); 

        $cek = $this->loginmodel->cek_login("controladmin", $where)->num_rows(); 
        
        if($cek > 0) { 
        $data_session = array( 
            'nama' => $username, 
            'status' => "login" 
        ); 

    $this->session->set_userdata($data_session);
        redirect(base_url("tbl_admin"));
        }
        else{
            echo "Username dan Password Salah !";
    }
}
    }
}

}