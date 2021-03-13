<?php

defined('BASEPATH') or exit('No direct script access allowed');

class hrd_menu_jabatan_model extends CI_Model
{

    var $column_order = array('id_jabatan', null, null);

    function get_all_data_datatable()
    {
        $this->db->select('*');
        $this->db->from('jabatan');

        if (isset($_POST["search"]["value"])) {
            $this->db->like('id_jabatan', $_POST["search"]["value"]);
            $this->db->or_like('jabatan', $_POST["search"]["value"]);
        }

        if (isset($_POST["order"])) {
            $this->db->order_by($this->column_order[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
        } else {
            $this->db->order_by('id_jabatan', 'desc');
        }
    }

    function get_all_data_jabatan()
    {
        $this->get_all_data_datatable();

        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }

        return $this->db->get()->result_array();
    }

    function filtered_data_jabatan()
    {
        $this->get_all_data_datatable();
        return $this->db->get()->num_rows();
    }

    function count_all_data_jabatan()
    {
        $this->get_all_data_datatable();
        return $this->db->count_all_results();
    }

    function insert_data_jabatan($data)
    {
        $this->db->insert('jabatan', $data);
    }

    function get_data_jabatan($id)
    {
        return $this->db->get_where('jabatan', ['id_jabatan' => $id])->row_array();
    }

    function update_data_jabatan($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id_jabatan', $id);
        $this->db->update('jabatan', $data);
    }

    function delete_data_jabatan($id)
    {
        $this->db->delete('jabatan', ['id_jabatan' => $id]);
    }
}
