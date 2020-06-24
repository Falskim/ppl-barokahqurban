<?php
defined('BASEPATH') or exit('No direct script access allowed');
class History2 extends CI_Controller
{

    private $userID;

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('authenticated'))
            redirect('login');
        $this->load->model('m_donate');
        $this->userID = $this->session->userdata('id');
    }

    function index()
    {
        $data['donates'] = $this->m_donate->get_user_donates($this->userID);
        $this->load_page('v_history2', $data);
    }

    function detail_donate($id)
    {
        $data['donate'] = $this->m_donate->get_by_id($id);
        $this->load_page('v_invoice2', $data);
    }

    function load_page($page, $data = null)
    {
        $this->load->view('public/layouts/v_header');
        // Main page content
        $this->load->view('user/' . $page, $data);
        $this->load->view('public/layouts/v_footer');
    }
}
