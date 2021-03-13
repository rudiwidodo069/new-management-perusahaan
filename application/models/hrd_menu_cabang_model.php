<?php

defined('BASEPATH') or exit('No direct script access allowed');

class hrd_menu_cabang_model extends CI_Model
{
    var $column_order = array('id_cabang', 'cabang.id_outlet', null, null);
    function get_data_dataTable()
    {
        $this->db->select('*');
        $this->db->from('cabang');
        $this->db->join('outlet_area', 'outlet_area.id_outlet = cabang.id_outlet');

        if (isset($_POST["search"]["value"])) {
            $this->db->like('lokasi_cabang', $_POST["search"]["value"]);
            $this->db->or_like('cabang.id_outlet', $_POST["search"]["value"]);
            $this->db->or_like('area_outlet', $_POST["search"]["value"]);
        }

        if (isset($_POST["order"])) {
            $this->db->order_by($this->column_order[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
        } else {
            $this->db->order_by('cabang.id_outlet', 'desc');
        }
    }

    function get_all_data_cabang()
    {
        $this->get_data_dataTable();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        return $this->db->get()->result_array();
    }

    function filtered_data_cabang()
    {
        $this->get_data_dataTable();
        return $this->db->get()->num_rows();
    }

    function count_all_data_cabang()
    {
        $this->get_data_dataTable();
        return $this->db->count_all_results();
    }

    function get_all_data_outlet()
    {
        return $this->db->get('outlet_area')->result_array();
    }

    function cek_cabang($cabang)
    {
        return $this->db->get_where('cabang', ['lokasi_cabang' => $cabang])->num_rows();
    }

    function insert_cabang($data)
    {
        $this->db->insert('cabang', $data);
    }

    function get_data_cabang($id)
    {
        $this->db->select('*');
        $this->db->from('cabang');
        $this->db->join('outlet_area', 'outlet_area.id_outlet = cabang.id_outlet');
        $this->db->where('id_cabang', $id);
        return $this->db->get()->row_array();
    }

    function update_cabang($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id_cabang', $id);
        $this->db->update('cabang', $data);
    }

    function delete_cabang($id)
    {
        $this->db->delete('cabang', ['id_cabang' => $id]);
    }
}
