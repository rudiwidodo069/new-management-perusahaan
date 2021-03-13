<?php

defined('BASEPATH') or exit('No direct script access allowed');

class hrd_menu_outlet_model extends CI_Model
{
    var $column_order = array('id_outlet', 'area_outlet');

    function get_all_dataTable()
    {
        $this->db->select('*');
        $this->db->from('outlet_area');

        if (isset($_POST["search"]["value"])) {
            $this->db->like('id_outlet', $_POST["search"]["value"]);
            $this->db->or_like('area_outlet', $_POST["search"]["value"]);
        }

        if (isset($_POST["order"])) {
            $this->db->order_by($this->column_order[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
        } else {
            $this->db->order_by('id_outlet', 'desc');
        }
    }

    function get_all_data_outlet()
    {
        $this->get_all_dataTable();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        return $this->db->get()->result_array();
    }

    function filtered_data_outlet()
    {
        $this->get_all_dataTable();
        return $this->db->get()->num_rows();
    }

    function count_all_outlet()
    {
        $this->get_all_dataTable();
        return $this->db->count_all_results();
    }

    function cek_outlet($outlet)
    {
        return $this->db->get_where('outlet_area', ['area_outlet' => $outlet])->num_rows();
    }

    function insert_outlet($data)
    {
        $this->db->insert('outlet_area', $data);
    }

    function get_data_outlet($id)
    {
        return $this->db->get_where('outlet_area', ['id_outlet' => $id])->row_array();
    }

    function update_outlet($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id_outlet', $id);
        $this->db->update('outlet_area', $data);
    }

    function delete_outlet($id)
    {
        $this->db->delete('outlet_area', ['id_outlet' => $id]);
    }
}
