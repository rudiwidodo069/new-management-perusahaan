<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Absensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('absensi_model');
    }

    function get_data_karyawan()
    {
        $nik = $this->input->post('nik');
        $data = $this->absensi_model->get_data_karyawan($nik);
        $tanggal = date('yy-m-d');
        $jam = date('h:i:s');
        if ($data) {
            $update_jadwal = $this->absensi_model->update_jadwal($data['id_karyawan'], $tanggal, $jam);
            $output = array(
                'success' => true,
                'nama' => $data['nama_karyawan'],
                'id' => $data['id_karyawan'],
                'nik' => $data['nik_karyawan'],
                'jabatan' => $data['jabatan'],
                'foto' => $data['foto'],
                'status_kerja' => $update_jadwal
            );
        } else {
            $output = array(
                'invalid' => true,
                'pesan' => 'maaf karyawan belum terdaftar'
            );
        }

        echo json_encode($output);
    }
}
