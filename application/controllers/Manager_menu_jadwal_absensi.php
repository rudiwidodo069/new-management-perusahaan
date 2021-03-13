<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager_menu_jadwal_absensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('Cek_login_helper');
        $this->load->model('manager_menu_jadwal_absensi_model');
    }

    public function index()
    {
        $data['title'] = "jadwal absensi";
        $data['user'] = cek_user();
        $data['karyawan_cabang'] = $this->session->userdata('lokasi_cabang');
        $data['jadwal_absensi'] = $this->manager_menu_jadwal_absensi_model->get_all_data_absensi();
        $data['get_tanggal'] = $this->manager_menu_jadwal_absensi_model->get_tanggal();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('manager/manager-jadwal/jadwal_absensi', $data);
        $this->load->view('templeates/footer');
    }

    function  aktivasi()
    {
        $id_schedule = $this->input->post('id_aktif');
        $set_update = $this->input->post('aktivasi');
        $this->manager_menu_jadwal_absensi_model->aktivasi($id_schedule, $set_update);
        $output = [
            'success' => 'true',
            'pesan' => 'aktivasi jadwal berhasil'
        ];
        echo json_encode($output);
    }

    public function form_insert_jadwal()
    {
        $data['title'] = "form insert jadwal";
        $data['user'] = cek_user();
        $data['karyawan_cabang'] = $this->session->userdata('lokasi_cabang');
        $data['get_all_karyawan'] = $this->manager_menu_jadwal_absensi_model->get_all_data_karyawan();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('manager/manager-jadwal/form_insert_jadwal', $data);
        $this->load->view('templeates/footer');
    }

    function insert_jadwal_absensi()
    {
        $this->_validation();
        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'senin_tanggal_err' => form_error('tanggal1'),
                'selasa_tanggal_err' => form_error('tanggal2'),
                'rabu_tanggal_err' => form_error('tanggal3'),
                'kamis_tanggal_err' => form_error('tanggal4'),
                'jumat_tanggal_err' => form_error('tanggal5'),
                'sabtu_tanggal_err' => form_error('tanggal6'),
                'minggu_tanggal_err' => form_error('tanggal7'),
            );
        } else {
            $kode_schedule = random_int(1, 1000000);
            // data schedule
            $data = array(
                'kode_schedule' => $kode_schedule,
                'tgl_senin' => $this->input->post('tanggal1'),
                'tgl_selasa' => $this->input->post('tanggal2'),
                'tgl_rabu' => $this->input->post('tanggal3'),
                'tgl_kamis' => $this->input->post('tanggal4'),
                'tgl_jumat' => $this->input->post('tanggal5'),
                'tgl_sabtu' => $this->input->post('tanggal6'),
                'tgl_minggu' => $this->input->post('tanggal7'),
                'senin_masuk'  => $this->input->post('masuk1'),
                'senin_keluar'  => $this->input->post('keluar1'),
                'selasa_masuk'  => $this->input->post('masuk2'),
                'selasa_keluar'  => $this->input->post('keluar2'),
                'rabu_masuk'  => $this->input->post('masuk3'),
                'rabu_keluar'  => $this->input->post('keluar3'),
                'kamis_masuk'  => $this->input->post('masuk4'),
                'kamis_keluar'  => $this->input->post('keluar4'),
                'jumat_masuk'  => $this->input->post('masuk5'),
                'jumat_keluar'  => $this->input->post('keluar5'),
                'sabtu_masuk'  => $this->input->post('masuk6'),
                'sabtu_keluar'  => $this->input->post('keluar6'),
                'minggu_masuk'  => $this->input->post('masuk7'),
                'minggu_keluar'  => $this->input->post('keluar7'),
                'aktivasi' => 'NON-ACTIVE'
            );

            // insert data scedhule mingguan
            $this->manager_menu_jadwal_absensi_model->insert_schedule($data);
            // insert data absensi
            $this->manager_menu_jadwal_absensi_model->insert_absensi($kode_schedule);

            $output = array(
                'success' => true,
                'pesan' => 'insert data berhasil'
            );
        }
        echo json_encode($output);
    }

    public function form_update_jadwal()
    {
        $id_karyawan = $_GET['karyawan'];
        $kode_schedule = $_GET['schedule'];
        $data['title'] = "form insert jadwal";
        $data['user'] = cek_user();
        $data['karyawan_cabang'] = $this->session->userdata('lokasi_cabang');
        $data['jadwal_absensi'] = $this->manager_menu_jadwal_absensi_model->get_data_absensi($kode_schedule);
        $data['karyawan'] = $this->manager_menu_jadwal_absensi_model->get_data_karyawan($id_karyawan);
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('manager/manager-jadwal/form_update_jadwal', $data);
        $this->load->view('templeates/footer');
    }

    function update_jadwal_absensi()
    {
        $this->_validation();
        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'senin_tanggal_err' => form_error('tanggal1'),
                'selasa_tanggal_err' => form_error('tanggal2'),
                'rabu_tanggal_err' => form_error('tanggal3'),
                'kamis_tanggal_err' => form_error('tanggal4'),
                'jumat_tanggal_err' => form_error('tanggal5'),
                'sabtu_tanggal_err' => form_error('tanggal6'),
                'minggu_tanggal_err' => form_error('tanggal7'),
            );
        } else {
            // data schedule
            $kode_schedule = $this->input->post('kode_schedule');
            $data = array(
                'tgl_senin' => $this->input->post('senin_tanggal'),
                'tgl_selasa' => $this->input->post('selasa_tanggal'),
                'tgl_rabu' => $this->input->post('rabu_tanggal'),
                'tgl_kamis' => $this->input->post('kamis_tanggal'),
                'tgl_jumat' => $this->input->post('jumat_tanggal'),
                'tgl_sabtu' => $this->input->post('sabtu_tanggal'),
                'tgl_minggu' => $this->input->post('minggu_tanggal'),
                'senin_masuk'  => $this->input->post('masuk1'),
                'senin_keluar'  => $this->input->post('keluar1'),
                'selasa_masuk'  => $this->input->post('masuk2'),
                'selasa_keluar'  => $this->input->post('keluar2'),
                'rabu_masuk'  => $this->input->post('masuk3'),
                'rabu_keluar'  => $this->input->post('keluar3'),
                'kamis_masuk'  => $this->input->post('masuk4'),
                'kamis_keluar'  => $this->input->post('keluar4'),
                'jumat_masuk'  => $this->input->post('masuk5'),
                'jumat_keluar'  => $this->input->post('keluar5'),
                'sabtu_masuk'  => $this->input->post('masuk6'),
                'sabtu_keluar'  => $this->input->post('keluar6'),
                'minggu_masuk'  => $this->input->post('masuk7'),
                'minggu_keluar'  => $this->input->post('keluar7'),
            );

            // insert data scedhule mingguan
            $this->manager_menu_jadwal_absensi_model->update_schedule($kode_schedule, $data);
            // insert data absensi
            $this->manager_menu_jadwal_absensi_model->update_absensi($kode_schedule);

            $output = array(
                'success' => true,
                'pesan' => 'update data berhasil'
            );
        }
        echo json_encode($output);
    }

    private function _validation()
    {
        for ($i = 1; $i <= 7; $i++) {
            $this->form_validation->set_rules('tanggal' . $i, 'tanggal', 'required|trim');
        }
    }
}
