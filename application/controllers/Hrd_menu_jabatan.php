<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hrd_menu_jabatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hrd_menu_jabatan_model');
        $this->load->helper('Cek_login_helper');
    }

    public function index()
    {
        $data['user'] = cek_user();
        $data['title'] = "data jabatan";
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('hrd/hrd-jabatan/data_jabatan', $data);
        $this->load->view('templeates/footer');
    }

    function get_all_data_jabatan()
    {
        $fatch_data = $this->hrd_menu_jabatan_model->get_all_data_jabatan();
        $data = array();
        $no = 1;
        foreach ($fatch_data as $row) {
            $jabatan = array();
            $jabatan[] = $no . '.';
            $jabatan[] = $row['id_jabatan'];
            $jabatan[] = $row['jabatan'];
            $jabatan[] = 'Rp. ' . number_format($row['gaji_pokok']);
            $jabatan[] = '<center>
                                    <button class="badge badge-warning" data-target="#modal-update" data-toggle="modal" data-id="' . $row['id_jabatan'] . '" id="update">
                                        <i class="fas fa-fw fa-edit"></I>
                                    </button>
                                    <button class="badge badge-danger" data-id="' . $row['id_jabatan'] . '" id="delete">
                                        <i class="fas fa-fw fa-trash-alt"></I>
                                    </button>
                                </center>';
            $data[] = $jabatan;
            $no++;
        }

        $output = array(
            'draw' => $_POST["draw"],
            'recordsTotal' => $this->hrd_menu_jabatan_model->count_all_data_jabatan(),
            'recordsFilter' => $this->hrd_menu_jabatan_model->filtered_data_jabatan(),
            'data' => $data
        );
        echo json_encode($output);
    }

    function insert_jabatan()
    {
        $this->_validate();
        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'jabatan_err' => form_error('jabatan'),
                'gaji_err' => form_error('gaji')
            );
        } else {
            $data = array(
                'jabatan' => htmlspecialchars($this->input->post('jabatan'), true),
                'gaji_pokok' => htmlspecialchars($this->input->post('gaji'), true)
            );
            $this->hrd_menu_jabatan_model->insert_data_jabatan($data);
            $output = array(
                'success' => true,
                'pesan' => 'insert success'
            );
        }
        echo json_encode($output);
    }

    function get_data_jabatan()
    {
        $id = $this->input->post('id');
        $output = $this->hrd_menu_jabatan_model->get_data_jabatan($id);
        echo json_encode($output);
    }

    function update_jabatan()
    {
        $this->_validate();
        $id = $this->input->post('id');
        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'jabatan_err' => form_error('jabatan'),
                'gaji_err' => form_error('gaji')
            );
        } else {
            $data = array(
                'jabatan' => htmlspecialchars($this->input->post('jabatan'), true),
                'gaji_pokok' => htmlspecialchars($this->input->post('gaji'), true)
            );
            $this->hrd_menu_jabatan_model->update_data_jabatan($id, $data);
            $output = array(
                'success' => true,
                'pesan' => 'update success'
            );
        }
        echo json_encode($output);
    }

    private function _validate()
    {
        $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
        $this->form_validation->set_rules('gaji', 'gaji', 'numeric|required|trim');
    }

    function delete_jabatan()
    {
        $id = $this->input->post('id');
        $this->hrd_menu_jabatan_model->delete_data_jabatan($id);
        $output = array(
            'pesan' => 'delete success'
        );
        echo json_encode($output);
    }
}
