<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Register extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    function index()
    {
        $this->load->view('public/layouts/v_header');
        $this->load->view('public/v_register');
        $this->load->view('public/layouts/v_footer');
    }

    function validate()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $confirm_password = md5($this->input->post('confirm_password'));
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');

        if ($password === $confirm_password) {
            $this->m_user->insert();
            $sesdata = array(
                'id' => $this->m_user->get_last_row_id(),
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'role' => 'user',
                'authenticated' => TRUE
            );
            $this->session->set_userdata($sesdata);
            // redirect('user');
            redirect('home');
        } else {
            echo $this->session->set_flashdata('msg', 'Password and Confirm Password are different');
            redirect('register');
        }
    }
}
