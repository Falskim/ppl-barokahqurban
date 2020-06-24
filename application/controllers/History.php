<?php
defined('BASEPATH') or exit('No direct script access allowed');
class History extends CI_Controller
{

    private $userID;

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('authenticated'))
            redirect('login');
        $this->load->model('m_order');
        $this->userID = $this->session->userdata('id');
    }

    function index()
    {
        $data['orders'] = $this->m_order->get_user_orders($this->userID);
        $this->load_page('v_history', $data);
    }

    function detail_order($id)
    {
        $data['order'] = $this->m_order->get_by_id($id);
        $this->load_page('v_invoice', $data);
    }

    function load_page($page, $data = null)
    {
        $this->load->view('public/layouts/v_header');
        // Main page content
        $this->load->view('user/' . $page, $data);
        $this->load->view('public/layouts/v_footer');
    }
}
