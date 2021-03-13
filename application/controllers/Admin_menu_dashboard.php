<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_menu_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_menu_dashboard_model');
        $this->load->helper('Cek_login_helper');
    }

    public function index()
    {
        $data['user'] = cek_user();
        $data['cabang'] = $this->session->userdata('cabang');
        $data['title'] = "dashboard mahagement";
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar', $data);
        $this->load->view('admin/admin-dashboard/dashboard', $data);
        $this->load->view('templeates/footer');
    }
}
