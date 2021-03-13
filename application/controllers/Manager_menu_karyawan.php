<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager_menu_karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('Cek_login_helper');
        $this->load->model('manager_menu_karyawan_model');
    }

    public function index()
    {
        $data['title'] = "data karyawan";
        $data['user'] = cek_user();
        $data['karyawan_cabang'] = $this->session->userdata('lokasi_cabang');
        $data['get_all_karyawan'] = $this->manager_menu_karyawan_model->get_all_data_karyawan();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('manager/manager-karyawan/data_karyawan', $data);
        $this->load->view('templeates/footer');
    }

    public function detail_absensi_karyawan()
    {
        $data['title'] = "detail absensi karyawan";
        $data['user'] = cek_user();
        $data['karyawan_cabang'] = $this->session->userdata('lokasi_cabang');
        $data['karyawan'] = $this->manager_menu_karyawan_model->get_data_karyawan($_GET['karyawan']);
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('manager/manager-karyawan/detail_absensi_karyawan', $data);
        $this->load->view('templeates/footer');
    }

    function get_data_karyawan()
    {
        $id_karyawan = $this->input->get('id_karyawan');
        $output = $this->manager_menu_karyawan_model->get_data_absensi($id_karyawan);
        echo json_encode($output);
    }
}
