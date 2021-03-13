<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager_menu_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('Cek_login_helper');
        $this->load->model('manager_menu_dashboard_model');
    }

    public function index()
    {
        $data['title'] = "dashboard";
        $data['user'] = cek_user();
        $data['karyawan_cabang'] = $this->session->userdata('lokasi_cabang');
        $data['karyawan'] = $this->manager_menu_dashboard_model->get_all_data_karyawan();
        $data['stok_barang'] = $this->manager_menu_dashboard_model->get_all_data_stok_barang();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar', $data);
        $this->load->view('manager/manager-dashboard/dashboard', $data);
        $this->load->view('templeates/footer');
    }
}
