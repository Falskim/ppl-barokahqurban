<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('m_user');
    }
    
    function index(){
        $this->load->view('public/layouts/v_header');
        $this->load->view('public/v_login');
        $this->load->view('public/layouts/v_footer');
    }

    function matrix(){
        $this->load->view('public/v_login_matrix');
    }

    function test(){
        $this->load->view('public/v_login_test');
    }

    function check(){
        $email = $this->input->post('email', TRUE);
        $password = md5($this->input->post('password', TRUE));
        $validate = $this->m_user->validate($email, $password);
        if($validate->num_rows() > 0){
            $data = $validate->row_array();
            $sesdata = array(
                'id' => $data['id'],
                'email' => $data['email'],
                'name' => $data['name'],
                'role' => $data['role'],
                'authenticated' => TRUE
            );
            $this->session->set_userdata($sesdata);
            if($data['role'] === 'admin'){
                redirect('admin');
            }else{
                // redirect('user');
                redirect('home');
            }
        }else{
            echo $this->session->set_flashdata('msg','Username or Password is Wrong');
            redirect('login');
        }
    }
    
}