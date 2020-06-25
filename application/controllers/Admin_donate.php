<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . "controllers/Admin.php");

class Admin_donate extends Admin
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_donate');
    }

    function index()
    {
        // $data['users'] = $this->m_user->get_all();
        $data['donations'] = $this->m_donate->get_all();
        $this->load_page('donate_crud/v_index', $data);
    }

    function test()
    {
        $data['donations'] = $this->m_donate->get_all();
        $this->load->view('admin/donate_crud/test', $data);
    }

    function show($id)
    {
        $data['donate'] = $this->m_donate->get_by_id($id);
        $this->load_page('donate_crud/v_show', $data);
    }

    function delete($id)
    {
        $this->m_donate->delete($id);
        redirect('admin_donate');
    }

    function mark_finished($id)
    {
        $this->m_donate->mark_finished($id);
        redirect('admin_donate');
    }
}
