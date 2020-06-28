<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH."controllers/Admin.php");

class Admin_order extends Admin {

    function __construct() {
        parent::__construct();
        $this->load->model('m_order');
    }
    
    function index() {
        // $data['users'] = $this->m_user->get_all();
        $data['orders'] = $this->m_order->get_all();
        $this->load_page('order_crud/v_index', $data);
    }

    function test() {
        $data['orders'] = $this->m_order->get_all();
        $this->load->view('admin/order_crud/test', $data);
    }

    function show($id) {
        $data['order'] = $this->m_order->get_by_id($id);
        $this->load_page('order_crud/v_show', $data);
    }

    function delete($id) {
        $this->m_order->delete($id);
        redirect('admin_order');
    }

    function change_state($id) {
        $this->m_order->change_state($id, $_POST["state"]);
        redirect('admin_order');
    }

}