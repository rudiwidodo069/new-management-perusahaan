<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_management extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Dompdf');
    }

    public function laporan_inventori_masuk_pdf()
    {
        $this->load->model('manager_menu_inventori_masuk_model');
        $id_inventori_masuk = $this->input->get('masuk');
        $data['detail'] = $this->manager_menu_inventori_masuk_model->get_data_inventori($id_inventori_masuk);
        $html = $this->load->view('laporan/manager-laporan/inventori_masuk_pdf', $data, true);
        $this->dompdf->print_pdf($html, 'inventori_masuk');
    }

    public function laporan_inventori_keluar_pdf()
    {
        $this->load->model('manager_menu_inventori_keluar_model');
        $id_inventori_keluar = $this->input->get('keluar');
        $data['detail'] = $this->manager_menu_inventori_keluar_model->get_data_inventori($id_inventori_keluar);
        $html = $this->load->view('laporan/manager-laporan/inventori_keluar_pdf', $data, true);
        $this->dompdf->print_pdf($html, 'inventori_keluar');
    }
}
