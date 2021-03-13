<?php

use FontLib\Table\Type\post;

defined('BASEPATH') or exit('No direct script access allowed');

class Hrd_menu_manager_area extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('Cek_login_helper');
        $this->load->model('hrd_menu_manager_area_model');
    }

    public function index()
    {
        $data['title'] = "manager area";
        $data['user'] = cek_user();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('hrd/hrd-manager-area/area', $data);
        $this->load->view('templeates/footer');
    }

    function get_all_data_manager_area()
    {
        $fatch_data = $this->hrd_menu_manager_area_model->get_all_data_manager_area();
        $data = array();
        $no = 1;

        foreach ($fatch_data as $row) {
            $manager_area = array();

            $manager_area[] = $no . '.';
            $manager_area[] = $row['area_outlet'];
            $manager_area[] = $row['nama_karyawan'];
            $manager_area[] = $row['id_karyawan'];
            $manager_area[] = $row['jabatan'];
            $manager_area[] = '<a href="' . site_url('hrd_menu_manager_area/detail') . '" class="badge badge-primary">info detail</a>
                                            <button type="button" class="badge badge-danger ml-2" data-id="' . $row['id_outlet'] . '" id="delete">delete</button>';

            $data[] = $manager_area;
            $no++;
        }

        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->hrd_menu_manager_area_model->count_all_data(),
            'recordsFilter' => $this->hrd_menu_manager_area_model->filtered_data(),
            'data' => $data
        );

        echo json_encode($output);
    }

    public function form_insert_manager_area()
    {
        $data['title'] = "manager area";
        $data['user'] = cek_user();
        $data['get_all_outlet'] = $this->hrd_menu_manager_area_model->get_all_data_outlet();
        $data['get_all_karyawan'] = $this->hrd_menu_manager_area_model->get_all_data_karyawan();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('hrd/hrd-manager-area/form_insert_manager_area', $data);
        $this->load->view('templeates/footer');
    }

    function get_data_area()
    {
        $id_outlet = $this->input->post('id_outlet');
        $output = $this->hrd_menu_manager_area_model->get_data_area($id_outlet);
        echo json_encode($output);
    }

    function get_data_karyawan()
    {
        $nik = $this->input->post('nik');
        $output = $this->hrd_menu_manager_area_model->get_data_karyawan($nik);
        echo json_encode($output);
    }

    function insert_manager_area()
    {
        $id_outlet = $this->input->post('id_outlet');
        if ($id_outlet != null) {
            $id_karyawan = $this->input->post('id_karyawan');
            if ($id_karyawan != null) {
                $data = array(
                    'id_karyawan' => $id_karyawan
                );
                $this->hrd_menu_manager_area_model->insert_manager_area($id_outlet, $data);
                $output = array(
                    'success' => true,
                    'pesan' => 'insert data berhasil'
                );
            } else {
                $output = array(
                    'invalid' => true,
                    'pesan' => 'silahkan isi data manager area'
                );
            }
        } else {
            $output = array(
                'invalid' => true,
                'pesan' => 'silahkan isi data outlet area'
            );
        }
        echo json_encode($output);
    }

    function delete_manager_area()
    {
        $id_outlet = $this->input->post('id_outlet');
        $this->hrd_menu_manager_area_model->delete_manager_area($id_outlet);
        $output = array(
            'success' => true,
            'pesan' => 'delete berhasil'
        );
        echo json_encode($output);
    }
}
