<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->load_page('v_home');
    }

    function contact() {
        $this->load_page('v_contact');
    }

    function donation() {
        $this->load_page('v_donation');
    }

    function load_page($page, $data = null) {
        $this->load->view('public/layouts/v_header');
        // Main page content
        $this->load->view('public/'.$page, $data);
        $this->load->view('public/layouts/v_footer');
    }
}