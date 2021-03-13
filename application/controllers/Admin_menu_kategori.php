<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_menu_kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('Cek_login_helper');
        $this->load->model('admin_menu_kategori_model');
        $this->load->model('manager_menu_stok_barang_model');
    }

    public function index()
    {
        $data['title'] = "data produk kategori";
        $data['user'] = cek_user();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar', $data);
        $this->load->view('admin/admin-kategori/kategori', $data);
        $this->load->view('templeates/footer');
    }

    function get_all_data_kategori()
    {
        $fatch_data = $this->admin_menu_kategori_model->get_all_data_kategori();
        $data = array();
        $no = 1;
        foreach ($fatch_data as $row) {
            $kategori = array();
            $kategori[] = $no . '.';
            $kategori[] = $row['nama_kategori'];
            $kategori[] = $row['kode_barang'];
            $kategori[] = 'Rp. ' . number_format($row['harga_vendor']);
            $kategori[] = 'Rp. ' . number_format($row['harga_jual']);
            $kategori[] = '<center>
                                    <button class="badge badge-warning" data-target="#modal-update" data-toggle="modal" data-id="' . $row['id_kategori'] . '" id="update">
                                        <i class="fas fa-fw fa-edit"></I>
                                    </button>
                                    <button class="badge badge-danger" data-id="' . $row['id_kategori'] . '"  data-kode_barang="' . $row['kode_barang'] . '" id="delete">
                                        <i class="fas fa-fw fa-trash-alt"></I>
                                    </button>
                                </center>';
            $data[] = $kategori;
            $no++;
        }

        $output = array(
            'draw' => $_POST["draw"],
            'recordsTotal' => $this->admin_menu_kategori_model->count_all_data_kategori(),
            'recordsFilter' => $this->admin_menu_kategori_model->filtered_data_kategori(),
            'data' => $data
        );
        echo json_encode($output);
    }

    function insert_kategori()
    {
        $this->form_validation->set_rules('nama_kategori', 'nama kategori', 'required|trim');
        $this->form_validation->set_rules('harga_vendor', 'harga vendor', 'required|trim|numeric');
        $this->form_validation->set_rules('harga_jual', 'harga jual', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'kategori_err' => form_error('nama_kategori'),
                'harga_vendor_err' => form_error('harga_vendor'),
                'harga_jual_err' => form_error('harga_jual')
            );
        } else {

            $kode_barang =  random_int(1000000, 5000000);
            $cek_kode = $this->admin_menu_kategori_model->cek_kategori($kode_barang);

            if ($cek_kode > 0) {
                $output = array(
                    'invalid' => true,
                    'pesan' => 'maaf silahkan coba lagi'
                );
            } else {
                $nama_kategori = htmlspecialchars($this->input->post('nama_kategori'), true);
                $harga_vendor = htmlspecialchars($this->input->post('harga_vendor'), true);
                $harga_jual = htmlspecialchars($this->input->post('harga_jual'), true);

                $data = array(
                    'nama_kategori' => $nama_kategori,
                    'kode_barang' => $kode_barang,
                    'harga_vendor' => $harga_vendor,
                    'harga_jual' => $harga_jual
                );

                $this->admin_menu_kategori_model->insert_kategori($data);
                $this->manager_menu_stok_barang_model->insert_stok_barang($kode_barang);

                $qrCode = new Endroid\QrCode\QrCode($kode_barang);
                $qrCode->writeFile('assets/produk/kode-produk' . $kode_barang . ' .png');

                $output = array(
                    'success' => true,
                    'pesan' => 'insert data berhasil'
                );
            }
        }
        echo json_encode($output);
    }

    function get_data_kategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $output = $this->admin_menu_kategori_model->get_data_kategori($id_kategori);
        echo json_encode($output);
    }

    function update_kategori()
    {
        $this->form_validation->set_rules('nama_kategori', 'nama kategori', 'required|trim');
        $this->form_validation->set_rules('harga_vendor', 'harga vendor', 'required|trim|numeric');
        $this->form_validation->set_rules('harga_jual', 'harga jual', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'kategori_err' => form_error('nama_kategori'),
                'harga_vendor_err' => form_error('harga_vendor'),
                'harga_jual_err' => form_error('harga_jual')
            );
        } else {
            $id_kategori = $this->input->post('id_kategori');
            $nama_kategori = htmlspecialchars($this->input->post('nama_kategori'), true);
            $harga_vendor = htmlspecialchars($this->input->post('harga_vendor'), true);
            $harga_jual = htmlspecialchars($this->input->post('harga_jual'), true);

            $data = array(
                'nama_kategori' => $nama_kategori,
                'harga_vendor' => $harga_vendor,
                'harga_jual' => $harga_jual
            );

            $this->admin_menu_kategori_model->update_kategori($id_kategori, $data);
            $output = array(
                'success' => true,
                'pesan' => 'update data berhasil'
            );
        }
        echo json_encode($output);
    }

    function delete_kategori()
    {
        $id_kategori = $this->input->post('id');
        $kode_barang = $this->input->post('kode_barang');

        unlink(FCPATH . 'assets/produk/kode-produk' . $kode_barang . ' .png');

        // delete kategori && inventori masuk && inventori keluar
        $this->admin_menu_kategori_model->delete_kategori($id_kategori);

        // delete stok barang
        $this->manager_menu_stok_barang_model->delete_stok_barang($kode_barang);


        $output = array(
            'pesan' => 'delete data berhasil'
        );
        echo json_encode($output);
    }
}
