<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH."controllers/Admin.php");

class Admin_user extends Admin {

    function __construct() {
        parent::__construct();
        $this->load->model('m_user');
    }
    
    function index() {
        // $data['users'] = $this->m_user->get_all();
        $data['admins'] = $this->m_user->get_admins();
        $data['users'] = $this->m_user->get_users();
        $this->load_page('user_crud/v_index', $data);
    }

    function show($id) {
        $data['user'] = $this->m_user->get_by_id($id);
        $this->load_page('user_crud/v_show', $data);
    }

    function create() {
        $this->load_page('user_crud/v_create');
    }
 
    function store() {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect(site_url('admin/create'));
        }else{
            $this->m_user->insert();
            redirect('admin_user');
        }
    }

    function edit($id) {
        $data['user'] = $this->m_user->get_by_id($id);
        $this->load_page('user_crud/v_edit', $data);
    }

    function update($id) {
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect('admin/edit_user/'.$id);
        }else{ 
            $this->m_user->update($id);
            redirect('admin_user');
        }
    }

    function delete($id){
       $this->m_user->delete($id);
       redirect('admin_user');
    }

}