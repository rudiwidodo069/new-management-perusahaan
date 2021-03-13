<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hrd_menu_absensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('Cek_login_helper');
        $this->load->model('hrd_absensi_model');
    }

    public function index()
    {
        $data['user'] = cek_user();
        $data['title'] = "data absensi karyawan";
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('hrd/hrd-absensi/absensi', $data);
        $this->load->view('templeates/footer');
    }
}
