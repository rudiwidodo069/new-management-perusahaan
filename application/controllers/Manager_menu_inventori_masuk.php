<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager_menu_inventori_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('Cek_login_helper');
        $this->load->model('manager_menu_inventori_masuk_model');
        $this->load->model('manager_menu_stok_barang_model');
    }

    public function index()
    {
        $data['title'] = "data inventori masuk";
        $data['user'] = cek_user();
        $data['karyawan_cabang'] = $this->session->userdata('lokasi_cabang');
        $data['inventori_masuk'] = $this->manager_menu_inventori_masuk_model->get_all_data_inventori();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar', $data);
        $this->load->view('manager/manager-inventori-masuk/inventori_masuk', $data);
        $this->load->view('templeates/footer');
    }

    public function form_insert_inventori()
    {
        $data['title'] = "insert inventori masuk";
        $data['user'] = cek_user();
        $data['karyawan_cabang'] = $this->session->userdata('lokasi_cabang');
        $data['get_all_kategori'] = $this->manager_menu_inventori_masuk_model->get_all_data_kategori();
        $data['get_all_supplier'] = $this->manager_menu_inventori_masuk_model->get_all_data_supplier();
        $data['get_all_karyawan'] = $this->manager_menu_inventori_masuk_model->get_all_data_karyawan();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar', $data);
        $this->load->view('manager/manager-inventori-masuk/form_insert_inventori', $data);
        $this->load->view('templeates/footer');
    }

    function insert_inventori_masuk()
    {
        $this->_validation();
        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'jumlah_masuk_err' => form_error('jumlah_masuk'),
                'tanggal_masuk_err' => form_error('tanggal_masuk'),
                'tanggal_exp_err' => form_error('tanggal_exp'),
                'keterangan_err' => form_error('keterangan')
            );
        } else {
            $id_kategori = $this->input->post('id_kategori');
            if ($id_kategori == null) {
                $output = array(
                    'invalid' => true,
                    'pesan' => 'data barang harus diisi'
                );
            } else {
                $id_supplier = $this->input->post('id_supplier');
                if ($id_supplier == null) {
                    $output = array(
                        'invalid' => true,
                        'pesan' => 'data supplier harus diisi'
                    );
                } else {
                    $id_karyawan = $this->input->post('id_karyawan');
                    if ($id_karyawan == null) {
                        $output = array(
                            'invalid' => true,
                            'pesan' => 'data karyawan harus diisi'
                        );
                    } else {
                        $kode_barang = $this->input->post('kode_barang');
                        $id_cabang = $this->input->post('id_cabang');
                        $jumlah_masuk = htmlspecialchars($this->input->post('jumlah_masuk'), true);
                        $harga_vendor = $this->input->post('harga_vendor');
                        $total_harga = $this->input->post('total_harga');
                        $tanggal_masuk = $this->input->post('tanggal_masuk');
                        $tanggal_exp = $this->input->post('tanggal_exp');
                        $keterangan = htmlspecialchars($this->input->post('keterangan'), true);

                        $data = array(
                            'id_cabang' => $id_cabang,
                            'id_kategori' => $id_kategori,
                            'id_supplier' => $id_supplier,
                            'id_karyawan' => $id_karyawan,
                            'jumlah_masuk' => $jumlah_masuk,
                            'harga_vendor' => $harga_vendor,
                            'total_harga' => $total_harga,
                            'tanggal_masuk' => $tanggal_masuk,
                            'tanggal_exp' => $tanggal_exp,
                            'keterangan' => $keterangan
                        );

                        // insert inventori masuk
                        $this->manager_menu_inventori_masuk_model->insert_inventori_masuk($data);

                        // get data stok awal
                        $stok = $this->manager_menu_stok_barang_model->get_stok_awal($id_cabang, $kode_barang);
                        // stok_masuk
                        $total = $stok['stok_awal'] + $jumlah_masuk;
                        // stok_total (stok masuk barang - stok keluar barang)
                        $stok_akhir = $total - $stok['stok_keluar'];

                        $stok_barang = array(
                            'stok_awal' => $total,
                            'stok_akhir' => $stok_akhir
                        );

                        // update stok barang
                        $data = $this->manager_menu_stok_barang_model->update_stok_barang($id_cabang, $kode_barang, $stok_barang);

                        $output = array(
                            'success' => true,
                            'pesan' => 'insert data berhasil'
                        );
                    }
                }
            }
        }
        echo json_encode($output);
    }

    public function form_update_inventori()
    {
        $data['title'] = "update inventori masuk";
        $data['user'] = cek_user();
        $data['karyawan_cabang'] = $this->session->userdata('lokasi_cabang');
        $id_inventori  = $this->input->get('id');
        $data['update']  = $this->manager_menu_inventori_masuk_model->get_data_inventori($id_inventori);
        $data['get_all_kategori'] = $this->manager_menu_inventori_masuk_model->get_all_data_kategori();
        $data['get_all_supplier'] = $this->manager_menu_inventori_masuk_model->get_all_data_supplier();
        $data['get_all_karyawan'] = $this->manager_menu_inventori_masuk_model->get_all_data_karyawan();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar', $data);
        $this->load->view('manager/manager-inventori-masuk/form_update_inventori', $data);
        $this->load->view('templeates/footer');
    }


    function set_update_stok_barang($id_inventori)
    {
        // get data inventori masuk
        $inventori_masuk = $this->manager_menu_inventori_masuk_model->get_data_inventori($id_inventori);

        // get data stok awal
        $stok = $this->manager_menu_stok_barang_model->get_stok_awal($inventori_masuk['id_cabang'], $inventori_masuk['kode_barang']);

        // set stok awal
        $set_stok_awal = $stok['stok_awal'] - $inventori_masuk['jumlah_masuk'];
        // set stok akhir
        $set_stok_akhir = $stok['stok_akhir'] -  $inventori_masuk['jumlah_masuk'];

        $data = [
            'stok_awal' => $set_stok_awal,
            'stok_keluar' => $stok['stok_keluar'],
            'stok_akhir' => $set_stok_akhir
        ];

        return $data;
    }

    function update_inventori_masuk()
    {
        $this->_validation();
        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'jumlah_masuk_err' => form_error('jumlah_masuk'),
                'tanggal_masuk_err' => form_error('tanggal_masuk'),
                'tanggal_exp_err' => form_error('tanggal_exp'),
                'keterangan_err' => form_error('keterangan')
            );
        } else {
            $id_kategori = $this->input->post('id_kategori');
            if ($id_kategori == null) {
                $output = array(
                    'invalid' => true,
                    'pesan' => 'data barang harus diisi'
                );
            } else {
                $id_supplier = $this->input->post('id_supplier');
                if ($id_supplier == null) {
                    $output = array(
                        'invalid' => true,
                        'pesan' => 'data supplier harus diisi'
                    );
                } else {
                    $id_karyawan = $this->input->post('id_karyawan');
                    if ($id_karyawan == null) {
                        $output = array(
                            'invalid' => true,
                            'pesan' => 'data karyawan harus diisi'
                        );
                    } else {
                        $kode_barang = $this->input->post('kode_barang');
                        $id_inventori = $this->input->post('id_inventori');
                        $id_cabang = $this->input->post('id_cabang');
                        $jumlah_masuk = htmlspecialchars($this->input->post('jumlah_masuk'), true);
                        $harga_vendor = $this->input->post('harga_vendor');
                        $total_harga = $this->input->post('total_harga');
                        $tanggal_masuk = $this->input->post('tanggal_masuk');
                        $tanggal_exp = $this->input->post('tanggal_exp');
                        $keterangan = htmlspecialchars($this->input->post('keterangan'), true);

                        $data = array(
                            'id_cabang' => $id_cabang,
                            'id_kategori' => $id_kategori,
                            'id_supplier' => $id_supplier,
                            'id_karyawan' => $id_karyawan,
                            'jumlah_masuk' => $jumlah_masuk,
                            'harga_vendor' => $harga_vendor,
                            'total_harga' => $total_harga,
                            'tanggal_masuk' => $tanggal_masuk,
                            'tanggal_exp' => $tanggal_exp,
                            'keterangan' => $keterangan
                        );


                        // get data stok awal
                        $stok = $this->set_update_stok_barang($id_inventori);

                        // stok_total (stok masuk barang - stok keluar barang)
                        $stok_awal = $jumlah_masuk + $stok['stok_awal'];
                        $stok_akhir = $stok_awal - $stok['stok_keluar'];

                        $stok_barang = array(
                            'stok_awal' => "$stok_awal",
                            'stok_akhir' => "$stok_akhir"
                        );

                        // update stok barang
                        $this->manager_menu_stok_barang_model->update_stok_barang($id_cabang, $kode_barang, $stok_barang);

                        // update inventori masuk
                        $this->manager_menu_inventori_masuk_model->update_inventori_masuk($id_inventori, $data);

                        $output = array(
                            'success' => true,
                            'pesan' => 'update data berhasil'
                        );
                    }
                }
            }
        }
        echo json_encode($output);
    }

    private function _validation()
    {
        $this->form_validation->set_rules('jumlah_masuk', 'jumlah masuk', 'required|trim|numeric');
        $this->form_validation->set_rules('tanggal_masuk', 'tanggal masuk', 'required|trim');
        $this->form_validation->set_rules('tanggal_exp', 'tanggal exp', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
    }

    public function detail_inventori_masuk()
    {
        $data['title'] = "detail inventori masuk";
        $data['user'] = cek_user();
        $data['karyawan_cabang'] = $this->session->userdata('lokasi_cabang');
        $id_inventori  = $this->input->get('id');
        $data['detail']  = $this->manager_menu_inventori_masuk_model->get_data_inventori($id_inventori);
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar', $data);
        $this->load->view('manager/manager-inventori-masuk/detail_inventori_masuk', $data);
        $this->load->view('templeates/footer');
    }
}
