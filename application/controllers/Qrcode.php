<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Qrcode extends CI_Controller
{
    public function index()
    {
        $data['title'] = "login by qrcode";
        $this->load->view('qrscanner/qrscan', $data);
    }

    public function get_id_card()
    {
        $this->load->library('Dompdf');
        $this->load->model('qrcode_model');

        $id_card = $this->input->get('id');
        $data['karyawan'] = $this->qrcode_model->get_data_karyawan($id_card);

        $qrCode = new Endroid\QrCode\QrCode($data['karyawan']['nik_karyawan']);
        $qrCode->writeFile('assets/qr-code/karyawanID' . $id_card . ' .png');

        $html = $this->load->view('send_qrcode', $data, true);
        $this->dompdf->print_pdf($html, 'get_id_card');
    }
}
