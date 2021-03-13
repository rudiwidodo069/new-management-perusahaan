<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_menu_supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('Cek_login_helper');
        $this->load->model('admin_menu_supplier_model');
    }

    public function index()
    {
        $data['title'] = "data supplier";
        $data['user'] = cek_user();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar', $data);
        $this->load->view('admin/admin-supplier/supplier', $data);
        $this->load->view('templeates/footer');
    }

    function get_all_data_supplier()
    {
        $fatch_data = $this->admin_menu_supplier_model->get_all_data_supplier();
        $data = array();
        $no = 1;
        foreach ($fatch_data as $row) {
            $supplier = array();
            $supplier[] = $no . '.';
            $supplier[] = $row['id_supplier'];
            $supplier[] = $row['nama_pt'];
            $supplier[] = $row['alamat_pt'];
            $supplier[] = $row['telp'];
            $supplier[] = $row['deskripsi'];
            $supplier[] = '<center>
                                    <button class="badge badge-warning" data-target="#modal-update" data-toggle="modal" data-id="' . $row['id_supplier'] . '" id="update">
                                        <i class="fas fa-fw fa-edit"></I>
                                    </button>
                                    <button class="badge badge-danger" data-id="' . $row['id_supplier'] . '" id="delete">
                                        <i class="fas fa-fw fa-trash-alt"></I>
                                    </button>
                                </center>';
            $data[] = $supplier;
            $no++;
        }

        $output = array(
            'draw' => $_POST["draw"],
            'recordsTotal' => $this->admin_menu_supplier_model->count_all_data_supplier(),
            'recordsFilter' => $this->admin_menu_supplier_model->filtered_data_supplier(),
            'data' => $data
        );
        echo json_encode($output);
    }

    function insert_supplier()
    {
        $this->_validate();

        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'pt_err' => form_error('nama_pt'),
                'alamat_err' => form_error('alamat_pt'),
                'telp_err' => form_error('telp'),
                'deskripsi_err' => form_error('deskripsi')
            );
        } else {
            $nama_pt = htmlspecialchars($this->input->post('nama_pt'), true);
            $alamat_pt = htmlspecialchars($this->input->post('alamat_pt'), true);
            $telp = htmlspecialchars($this->input->post('telp'), true);
            $deskripsi = htmlspecialchars($this->input->post('deskripsi'), true);
            $data = array(
                'nama_pt' => $nama_pt,
                'alamat_pt' => $alamat_pt,
                'telp' => $telp,
                'deskripsi' => $deskripsi
            );
            $this->admin_menu_supplier_model->insert_supplier($data);
            $output = array(
                'success' => true,
                'pesan' => 'insert data berhasil'
            );
        }
        echo json_encode($output);
    }

    function get_data_supplier()
    {
        $id_supplier = $this->input->post('id_supplier');
        $output = $this->admin_menu_supplier_model->get_data_supplier($id_supplier);
        echo json_encode($output);
    }

    function update_supplier()
    {
        $this->_validate();

        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'pt_err' => form_error('nama_pt'),
                'alamat_err' => form_error('alamat_pt'),
                'telp_err' => form_error('telp'),
                'deskripsi_err' => form_error('deskripsi')
            );
        } else {
            $id_supplier = $this->input->post('id_supplier');
            $nama_pt = htmlspecialchars($this->input->post('nama_pt'), true);
            $alamat_pt = htmlspecialchars($this->input->post('alamat_pt'), true);
            $telp = htmlspecialchars($this->input->post('telp'), true);
            $deskripsi = htmlspecialchars($this->input->post('deskripsi'), true);
            $data = array(
                'nama_pt' => $nama_pt,
                'alamat_pt' => $alamat_pt,
                'telp' => $telp,
                'deskripsi' => $deskripsi
            );
            $this->admin_menu_supplier_model->update_supplier($id_supplier, $data);
            $output = array(
                'success' => true,
                'pesan' => 'update data berhasil'
            );
        }
        echo json_encode($output);
    }

    function delete_supplier()
    {
        $id_supplier = $this->input->post('id_supplier');
        $this->admin_menu_supplier_model->delete_supplier($id_supplier);
        $output = array(
            'pesan' => 'delete data berhasil'
        );
        echo json_encode($output);
    }

    private function _validate()
    {
        $this->form_validation->set_rules('nama_pt', 'nama perusahaan', 'required|trim');
        $this->form_validation->set_rules('alamat_pt', 'alamat perusahaan', 'required|trim');
        $this->form_validation->set_rules('telp', 'telp perusahaan', 'required|trim|numeric');
        $this->form_validation->set_rules('deskripsi', 'deskripsi barang', 'required|trim');
    }
}
