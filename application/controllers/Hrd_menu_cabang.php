<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hrd_menu_cabang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hrd_menu_cabang_model');
        $this->load->helper('Cek_login_helper');
    }

    function get_all_data_cabang()
    {
        $fatch_data = $this->hrd_menu_cabang_model->get_all_data_cabang();
        $data = array();
        $no = 1;

        foreach ($fatch_data as $row) {
            $cabang = array();
            $cabang[] = $no . '.';
            $cabang[] = $row['id_outlet'];
            $cabang[] = $row['area_outlet'];
            $cabang[] = $row['lokasi_cabang'];
            $cabang[] = '<button type="button" class="badge badge-warning mr-2" data-id="' . $row['id_cabang'] . '" data-target="#modal-update-cabang" data-toggle="modal" id="update-cabang">
                                    <i class="fas fa-fw fa-edit"></i>
                                </button>
                                <button type="button" class="badge badge-danger" data-id="' . $row['id_cabang'] . '" id="delete-cabang">
                                    <i class="fas fa-fw fa-trash-alt"></i>
                                </button>';
            $data[] = $cabang;
            $no++;
        }

        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->hrd_menu_cabang_model->count_all_data_cabang(),
            'recordsFilter' => $this->hrd_menu_cabang_model->filtered_data_cabang(),
            'data' => $data
        );

        echo json_encode($output);
    }

    function get_all_outlet()
    {
        $output = $this->hrd_menu_cabang_model->get_all_data_outlet();
        echo json_encode($output);
    }

    function insert_cabang()
    {
        $this->form_validation->set_rules('lokasi_cabang', 'cabang', 'required|trim');
        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'cabang_err' => form_error('lokasi_cabang')
            );
        } else {
            $id_outlet = $this->input->post('id_outlet');
            $cabang = htmlspecialchars($this->input->post('lokasi_cabang'), true);
            $cek_cabang = $this->hrd_menu_cabang_model->cek_cabang($cabang);
            if ($cek_cabang == 0) {
                $data = array(
                    'lokasi_cabang' => $cabang,
                    'id_outlet' => $id_outlet,
                    'id_karyawan' => 0
                );
                $this->hrd_menu_cabang_model->insert_cabang($data);
                $output = array(
                    'success' => true,
                    'pesan' => 'insert data berhasil'
                );
            } else {
                $output = array(
                    'invalid' => true,
                    'pesan' => 'cabang sudah terdaftar'
                );
            }
        }
        echo json_encode($output);
    }

    function get_data_cabang()
    {
        $id = $this->input->post('id');
        $output = $this->hrd_menu_cabang_model->get_data_cabang($id);
        echo json_encode($output);
    }

    function update_cabang()
    {
        $this->form_validation->set_rules('lokasi_cabang', 'cabang', 'required|trim');
        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'cabang_err' => form_error('lokasi_cabang')
            );
        } else {
            $id = $this->input->post('id');
            $id_outlet = $this->input->post('id_outlet');
            $cabang = htmlspecialchars($this->input->post('lokasi_cabang'), true);
            $data = array(
                'lokasi_cabang' => $cabang,
                'id_outlet' => $id_outlet
            );
            $this->hrd_menu_cabang_model->update_cabang($id, $data);
            $output = array(
                'success' => true,
                'pesan' => 'update data berhasil'
            );
        }
        echo json_encode($output);
    }

    function delete_cabang()
    {
        $id = $this->input->post('id');
        $this->hrd_menu_cabang_model->delete_cabang($id);
        $output = array(
            'success' => true,
            'pesan' => 'delete data berhasil'
        );
        echo json_encode($output);
    }
}
