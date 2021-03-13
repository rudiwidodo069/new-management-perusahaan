<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hrd_menu_outlet extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('Cek_login_helper');
        $this->load->model('hrd_menu_outlet_model');
    }

    public function index()
    {
        $data['title'] = "data outlet";
        $data['user'] = cek_user();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('hrd/hrd-outlet-cabang/outlet_cabang', $data);
        $this->load->view('templeates/footer');
    }

    function get_all_data_outlet()
    {
        $fatch_data = $this->hrd_menu_outlet_model->get_all_data_outlet();
        $data = array();
        $no = 1;

        foreach ($fatch_data as $row) {
            $outlet = array();
            $outlet[] = $no . '.';
            $outlet[] = $row['id_outlet'];
            $outlet[] = $row['area_outlet'];
            $outlet[] = '<button type="button" class="badge badge-warning mr-3" data-id="' . $row['id_outlet'] . '" data-target="#modal-update-outlet" data-toggle="modal" id="update-outlet">
                                    <i class="fas fa-fw fa-edit"></i>
                                </button>
                                <button type="button" class="badge badge-danger" data-id="' . $row['id_outlet'] . '" id="delete-outlet">
                                    <i class="fas fa-fw fa-trash-alt"></i>
                                </button>';
            $data[] = $outlet;
            $no++;
        }

        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->hrd_menu_outlet_model->count_all_outlet(),
            'recordsFilter' => $this->hrd_menu_outlet_model->filtered_data_outlet(),
            'data' => $data
        );

        echo json_encode($output);
    }

    function insert_outlet()
    {
        $this->form_validation->set_rules('outlet', 'outlet', 'required|trim');
        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'outlet_err' => form_error('outlet')
            );
        } else {
            $outlet = htmlspecialchars($this->input->post('outlet'), true);
            $cek_outlet = $this->hrd_menu_outlet_model->cek_outlet($outlet);
            if ($cek_outlet == 0) {
                $data = array(
                    'area_outlet' => $outlet
                );
                $this->hrd_menu_outlet_model->insert_outlet($data);
                $output = array(
                    'success' => true,
                    'pesan' => 'insert data berhasil'
                );
            } else {
                $output = array(
                    'invalid' => true,
                    'pesan' => 'outlet area sudah terdaftar'
                );
            }
        }
        echo json_encode($output);
    }

    function get_data_outlet()
    {
        $id = $this->input->post('id');
        $output = $this->hrd_menu_outlet_model->get_data_outlet($id);
        echo json_encode($output);
    }

    function update_outlet()
    {
        $this->form_validation->set_rules('outlet', 'outlet', 'required|trim');

        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'outlet_err' => form_error('outlet')
            );
        } else {
            $id = $this->input->post('id');
            $outlet =  htmlspecialchars($this->input->post('outlet'), true);
            $data = array(
                'area_outlet' => $outlet
            );
            $this->hrd_menu_outlet_model->update_outlet($id, $data);
            $output = array(
                'success' => true,
                'pesan' => 'update data berhasil'
            );
        }
        echo json_encode($output);
    }

    function delete_outlet()
    {
        $id = $this->input->post('id');
        $this->hrd_menu_outlet_model->delete_outlet($id);
        $output = array(
            'success' => true,
            'pesan' => 'delete data berhasil'
        );
        echo json_encode($output);
    }
}
