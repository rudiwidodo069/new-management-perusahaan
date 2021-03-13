<?php

defined('BASEPATH') or exit('No direct script access allowed');

class hrd_menu_karyawan_model extends CI_Model
{
    var $column_order = array('id_karyawan', null, null, null, null, null, null);

    function get_all_data_datatable()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');

        if (isset($_POST["search"]["value"])) {
            $this->db->like('karyawan.id_karyawan', $_POST["search"]["value"]);
            $this->db->or_like('nama_karyawan', $_POST["search"]["value"]);
            $this->db->or_like('nik_karyawan', $_POST["search"]["value"]);
            $this->db->or_like('jabatan', $_POST["search"]["value"]);
        }

        if (isset($_POST["order"])) {
            $this->db->order_by($this->column_order[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
        } else {
            $this->db->order_by('karyawan.id_karyawan', 'desc');
        }
    }

    function get_all_data_karyawan()
    {
        $this->get_all_data_datatable();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        return $this->db->get()->result_array();
    }

    function filtered_data_karyawan()
    {
        $this->get_all_data_datatable();
        return $this->db->get()->num_rows();
    }

    function count_all_data_karyawan()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        return $this->db->count_all_results();
    }

    function get_all_data_jabatan()
    {
        return $this->db->get('jabatan')->result_array();
    }

    function get_all_data_cabang()
    {
        return $this->db->get('cabang')->result_array();
    }

    function cek_data_karyawan($nik)
    {
        return $this->db->get_where('karyawan', ['nik_karyawan' => $nik])->num_rows();
    }

    function insert_karyawan($data)
    {
        $this->db->insert('karyawan', $data);
    }

    function get_data_karyawan($id)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $this->db->where('karyawan.id_karyawan', $id);
        return $this->db->get()->row_array();
    }

    function update_karyawan($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id_karyawan', $id);
        $this->db->update('karyawan');
    }

    function delete_karyawan($id)
    {
        $this->db->delete('karyawan', ['id_karyawan' => $id]);
    }

    function update_cabang($id_karyawan)
    {
        $this->db->set('id_karyawan', 0);
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->update('cabang');
    }
}
