<?php

defined('BASEPATH') or exit('No direct script access allowed');

class hrd_menu_manager_area_model extends CI_Model
{
    var $column_order = array(null, null, null, null);
    var $column_outlet = array('cabang.id_outlet', null);
    function get_all_data_datatable()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $this->db->join('cabang', 'cabang.id_karyawan = karyawan.id_karyawan');
        $this->db->join('outlet_area', 'outlet_area.id_outlet = cabang.id_outlet', 'right');

        if (isset($_POST["search"]["value"])) {
            $this->db->like('outlet_area.id_outlet', $_POST["search"]["value"]);
            $this->db->or_like('area_outlet', $_POST["search"]["value"]);
            $this->db->or_like('nama_karyawan', $_POST["search"]["value"]);
            $this->db->or_like('jabatan', $_POST["search"]["value"]);
        }

        if (isset($_POST["order"])) {
            $this->db->order_by($this->column_order[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
        } else {
            $this->db->order_by('outlet_area.id_outlet', 'desc');
        }
    }

    function get_all_data_manager_area()
    {
        $this->get_all_data_datatable();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        $this->db->group_by('outlet_area.id_outlet');
        return $this->db->get()->result_array();
    }

    function filtered_data()
    {
        $this->get_all_data_datatable();
        return $this->db->get()->num_rows();
    }

    function count_all_data()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        return $this->db->count_all_results();
    }

    function get_all_data_outlet()
    {
        $this->db->select('*');
        $this->db->from('cabang');
        $this->db->join('karyawan', 'karyawan.id_karyawan = cabang.id_karyawan');
        $this->db->join('outlet_area', 'outlet_area.id_outlet = cabang.id_outlet', 'right');
        $this->db->where('cabang.id_karyawan', null);
        $this->db->group_by('outlet_area.id_outlet');
        return $this->db->get()->result_array();
    }

    function get_data_area($id_outlet)
    {
        $this->db->select('*');
        $this->db->from('cabang');
        $this->db->join('outlet_area', 'outlet_area.id_outlet = cabang.id_outlet');
        $this->db->where('cabang.id_outlet', $id_outlet);
        return $this->db->get()->result_array();
    }

    function get_all_data_karyawan()
    {
        $this->db->select('cabang.id_karyawan, nik_karyawan, nama_karyawan, karyawan.id_jabatan, jabatan');
        $this->db->from('karyawan');
        $this->db->join('cabang', 'cabang.id_karyawan = karyawan.id_karyawan', 'left');
        $this->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $this->db->where('jabatan', 'AREA MANAGER');
        $this->db->where('cabang.id_karyawan', null);
        return $this->db->get()->result_array();
    }

    function get_data_karyawan($nik)
    {
        $this->db->select('id_karyawan, nama_karyawan, nik_karyawan, karyawan.id_jabatan, jabatan');
        $this->db->from('karyawan');
        $this->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $this->db->where('nik_karyawan', $nik);
        return $this->db->get()->row_array();
    }

    function insert_manager_area($id_outlet, $data)
    {
        $this->db->set($data);
        $this->db->where('id_outlet', $id_outlet);
        $this->db->update('cabang', $data);
    }

    function delete_manager_area($id_outlet)
    {
        $this->db->set('id_karyawan', 0);
        $this->db->where('cabang.id_outlet', $id_outlet);
        $this->db->update('cabang');
    }
}
