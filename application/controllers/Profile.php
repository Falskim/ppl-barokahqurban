<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller{

    private $userID;

    function __construct(){
        parent::__construct();
        if (!$this->session->userdata('authenticated'))
            redirect('login');
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_user');
        $this->userID = $this->session->userdata('id');
    }
    
    function index(){
        $data['user'] = $this->m_user->get_by_id($this->userID);
        if(!isset($data['user']->photo)) {
           $data['user']->photo = 'default.png'; 
        }
        $this->load_page('v_profile', $data);
    }
    
    function edit(){
        $data['user'] = $this->m_user->get_by_id($this->userID);
        $this->load_page('v_edit', $data);
    }

    function update() {
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->upload_photo();
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect('profile/edit');
        }else{ 
            $this->m_user->update($this->userID);
            redirect('profile');
        }
    }

    public function upload_photo() {
        $file_name = 'photo_'.$this->userID;
        $config['upload_path'] = './uploads/users/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['overwrite'] = true;
        $config['file_name'] = $file_name;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('userfile')) {
            $upload_data = $this->upload->data();
            $file_detail = $file_name.$upload_data['file_ext'];
            $_POST['photo'] = $file_detail; 
            // $this->input->post('photo') = ;
        }
    }

    function load_page($page, $data = null){
        $this->load->view('public/layouts/v_header');
        // Main page content
        $this->load->view('user/'.$page, $data);
        $this->load->view('public/layouts/v_footer');
    }

}