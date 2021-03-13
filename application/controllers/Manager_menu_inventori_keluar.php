<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager_menu_inventori_keluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('Cek_login_helper');
        $this->load->model('manager_menu_inventori_keluar_model');
        $this->load->model('manager_menu_stok_barang_model');
    }

    public function index()
    {
        $data['title'] = "data inventori keluar";
        $data['user'] = cek_user();
        $data['karyawan_cabang'] = $this->session->userdata('lokasi_cabang');
        $data['get_all_kategori'] = $this->manager_menu_inventori_keluar_model->get_all_data_kategori();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar', $data);
        $this->load->view('manager/manager-inventori-keluar/inventori_keluar', $data);
        $this->load->view('templeates/footer');
    }

    // client side
    function get_all_data_inventori()
    {
        $fatch_data = $this->manager_menu_inventori_keluar_model->get_all_data_inventori();
        $data = array();
        $no = 1;
        foreach ($fatch_data as $row) {
            $inventori = array();
            $inventori[] = $no . '.';
            $inventori[] = $row['nama_kategori'];
            $inventori[] = $row['kode_barang'];
            $inventori[] = $row['jumlah_keluar'];
            $inventori[] = $row['tanggal_keluar'];
            $inventori[] = $row['keterangan'];
            $inventori[] = '<a href="' . site_url('manager_menu_inventori_keluar/detail_inventori_keluar' . '?id=' . $row['id_inventori_keluar']) . '" class="badge badge-primary">detail</a>
            <button class="badge badge-warning" data-target="#modal-update" data-toggle="modal" data-id="' . $row['id_inventori_keluar'] . '" id="update">
                                        update
                                    </button>';
            $data[] = $inventori;
            $no++;
        }

        $output = array(
            'data' => $data
        );
        echo json_encode($output);
    }

    function insert_inventori()
    {
        $this->_validation();
        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'jumlah_keluar_err' => form_error('jumlah_keluar'),
                'tanggal_keluar_err' => form_error('tanggal_keluar'),
                'keterangan_err' => form_error('keterangan')
            );
        } else {
            $id_cabang = $this->session->userdata('cabang');
            $id_kategori = $this->input->post('id_kategori');
            $jumlah_keluar = htmlspecialchars($this->input->post('jumlah_keluar'), true);
            $tanggal_keluar = htmlspecialchars($this->input->post('tanggal_keluar'), true);
            $keterangan = htmlspecialchars($this->input->post('keterangan'), true);

            $data = array(
                'id_cabang' => $id_cabang,
                'id_kategori' => $id_kategori,
                'jumlah_keluar' => $jumlah_keluar,
                'tanggal_keluar' => $tanggal_keluar,
                'keterangan' => $keterangan
            );

            // get data kategori
            $kategori = $this->manager_menu_inventori_keluar_model->get_data_kategori($id_kategori);

            // get data stok
            $stok = $this->manager_menu_stok_barang_model->get_stok_awal($id_cabang, $kategori['kode_barang']);
            // set stok masuk 
            $stok_masuk = $stok['stok_awal'];
            // set stok keluar
            $stok_keluar = $stok['stok_keluar'] + $jumlah_keluar;
            // stok_total (stok awal - stok keluar)
            $stok_akhir = $stok_masuk - $stok_keluar;

            $stok_barang = array(
                'stok_awal' => $stok_masuk,
                'stok_keluar' => $stok_keluar,
                'stok_akhir' => $stok_akhir
            );

            // insert inventori keluar
            $this->manager_menu_inventori_keluar_model->insert_inventori($data);

            // update stok barang
            $data = $this->manager_menu_stok_barang_model->update_stok_barang($id_cabang, $kategori['kode_barang'], $stok_barang);

            $output = array(
                'success' => true,
                'pesan' => 'insert data berhasil'
            );
        }
        echo json_encode($output);
    }

    function get_data_inventori()
    {
        $id_inventori = $this->input->get('id_inventori');
        $output = $this->manager_menu_inventori_keluar_model->get_data_inventori($id_inventori);
        echo json_encode($output);
    }

    function set_update_stok_barang($id_inventori)
    {
        // get data inventori masuk
        $inventori_keluar = $this->manager_menu_inventori_keluar_model->get_data_inventori($id_inventori);

        // get data stok awal
        $stok = $this->manager_menu_stok_barang_model->get_stok_awal($inventori_keluar['id_cabang'], $inventori_keluar['kode_barang']);

        $data = [
            'stok_awal' => $stok['stok_awal'],
            'stok_keluar' => $stok['stok_keluar'],
            'stok_akhir' => $stok['stok_akhir']
        ];

        return $data;
    }

    function update_inventori()
    {
        $this->_validation();
        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'jumlah_keluar_err' => form_error('jumlah_keluar'),
                'tanggal_keluar_err' => form_error('tanggal_keluar'),
                'keterangan_err' => form_error('keterangan')
            );
        } else {
            $id_inventori = $this->input->post('id_inventori');
            $id_cabang = $this->session->userdata('cabang');
            $id_kategori = $this->input->post('id_kategori');
            $jumlah_keluar = htmlspecialchars($this->input->post('jumlah_keluar'), true);
            $tanggal_keluar = htmlspecialchars($this->input->post('tanggal_keluar'), true);
            $keterangan = htmlspecialchars($this->input->post('keterangan'), true);

            $data = array(
                'id_cabang' => $id_cabang,
                'id_kategori' => $id_kategori,
                'jumlah_keluar' => $jumlah_keluar,
                'tanggal_keluar' => $tanggal_keluar,
                'keterangan' => $keterangan
            );

            // get data inventori masuk
            $inventori_keluar = $this->manager_menu_inventori_keluar_model->get_data_inventori($id_inventori);

            // get data stok barang
            $stok = $this->manager_menu_stok_barang_model->get_stok_awal($inventori_keluar['id_cabang'], $inventori_keluar['kode_barang']);

            // set stok awal
            $stok_awal = $stok['stok_awal'];
            // set stok keluar
            $set_stok_keluar = $stok['stok_keluar'] - $inventori_keluar['jumlah_keluar'];
            $stok_keluar = $jumlah_keluar + $set_stok_keluar;
            // set stok akhir
            $stok_akhir = $stok_awal - $stok_keluar;

            $stok_barang = array(
                'stok_awal' => $stok_awal,
                'stok_keluar' => "$stok_keluar",
                'stok_akhir' => "$stok_akhir"
            );

            // update inventori keluar
            $this->manager_menu_inventori_keluar_model->update_inventori($id_inventori, $data);
            // update stok barang
            $this->manager_menu_stok_barang_model->update_stok_barang($id_cabang, $inventori_keluar['kode_barang'], $stok_barang);

            $output = array(
                'success' => true,
                'pesan' => 'update data berhasil'
            );
        }
        echo json_encode($output);
    }

    private function _validation()
    {
        $this->form_validation->set_rules('jumlah_keluar', 'jumlah keluar', 'required|trim|numeric');
        $this->form_validation->set_rules('tanggal_keluar', 'tanggal keluar', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
    }

    public function detail_inventori_keluar()
    {
        $data['title'] = "detail inventori keluar";
        $data['user'] = cek_user();
        $data['karyawan_cabang'] = $this->session->userdata('lokasi_cabang');
        $id_inventori  = $this->input->get('id');
        $data['detail']  = $this->manager_menu_inventori_keluar_model->get_data_inventori($id_inventori);
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar', $data);
        $this->load->view('manager/manager-inventori-keluar/detail_inventori_keluar', $data);
        $this->load->view('templeates/footer');
    }
}
