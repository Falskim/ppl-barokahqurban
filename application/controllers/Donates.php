<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Donates extends CI_Controller
{

    private $userID;

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('authenticated'))
            redirect('login');
        $this->load->model('m_user');
        $this->load->model('m_donate');
        $this->load->model('m_livestock');
        $this->userID = $this->session->userdata('id');
    }

    function index()
    {
        $data['user'] = $this->m_user->get_by_id($this->userID);
        $data['livestocks'] = $this->m_livestock->get_all();
        $this->load_page('v_donation', $data);
    }

    function load_page($page, $data = null)
    {
        $this->load->view('public/layouts/v_header');
        // Main page content
        $this->load->view('public/' . $page, $data);
        $this->load->view('public/layouts/v_footer');
    }

    function store()
    {
        $_POST['user_id'] = $this->userID;
        $_POST['handled_by_seller'] = $_POST['by_seller'];
        $this->m_donate->insert();
        redirect('home');
    }
}
