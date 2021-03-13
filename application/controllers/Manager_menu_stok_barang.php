<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager_menu_stok_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('Cek_login_helper');
        $this->load->model('manager_menu_stok_barang_model');
    }

    public function index()
    {
        $data['title'] = "stok barang";
        $data['user'] = cek_user();
        $data['karyawan_cabang'] = $this->session->userdata('lokasi_cabang');
        $data['stok_barang'] = $this->manager_menu_stok_barang_model->get_all_data_stok_barang();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('manager/manager-stok/stok_barang', $data);
        $this->load->view('templeates/footer');
    }
}
