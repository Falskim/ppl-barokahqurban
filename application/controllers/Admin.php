<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'admin')
            redirect('login');
        $this->load->model('m_user');
        $this->load->model('m_order');
        $this->load->model('m_donate');
    }

    function index()
    {
        $this->load_page('v_home');
    }

    function load_page($page, $data = null)
    {
        $this->load->view('admin/layouts/v_header');
        $this->load->view('admin/layouts/v_sidebar');
        $this->load->view('admin/layouts/v_content_wrapper');
        // Main page content
        $this->load->view('admin/' . $page, $data);
        $this->load->view('admin/layouts/v_footer');
    }

    function tables()
    {
        $this->load_page('v_tables');
    }
}
