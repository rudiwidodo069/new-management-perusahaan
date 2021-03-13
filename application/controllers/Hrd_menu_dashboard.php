<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hrd_menu_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('Cek_login_helper');
        $this->load->model('hrd_menu_dashboard_model');
    }

    public function index()
    {
        $data['title'] = "hrd dashboard";
        $data['user'] = cek_user();
        $data['karyawan'] = $this->hrd_menu_dashboard_model->get_all_karyawan();
        $data['outlet'] = $this->hrd_menu_dashboard_model->get_all_outlet();
        $data['cabang'] = $this->hrd_menu_dashboard_model->get_all_cabang();
        $data['area'] = $this->hrd_menu_dashboard_model->get_all_area();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('hrd/hrd-dashboard/dashboard', $data);
        $this->load->view('templeates/footer');
    }
}
