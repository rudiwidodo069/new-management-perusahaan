<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin_menu_supplier_model extends CI_Model
{
    var $column_order = array('id_supplier', null, null, null, null, null);

    function get_all_data_datatable()
    {
        $this->db->select('*');
        $this->db->from('supplier');

        if (isset($_POST["search"]["value"])) {
            $this->db->like('id_supplier', $_POST["search"]["value"]);
            $this->db->or_like('nama_pt', $_POST["search"]["value"]);
            $this->db->or_like('alamat_pt', $_POST["search"]["value"]);
        }

        if (isset($_POST["order"])) {
            $this->db->order_by($this->column_order[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
        } else {
            $this->db->order_by('id_supplier', 'desc');
        }
    }

    function get_all_data_supplier()
    {
        $this->get_all_data_datatable();

        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }

        return $this->db->get()->result_array();
    }

    function filtered_data_supplier()
    {
        $this->get_all_data_datatable();
        return $this->db->get()->num_rows();
    }

    function count_all_data_supplier()
    {
        $this->get_all_data_datatable();
        return $this->db->count_all_results();
    }

    function insert_supplier($data)
    {
        $this->db->insert('supplier', $data);
    }

    function get_data_supplier($id)
    {
        return $this->db->get_where('supplier', ['id_supplier' => $id])->row_array();
    }

    function update_supplier($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id_supplier', $id);
        $this->db->update('supplier', $data);
    }

    function delete_supplier($id)
    {
        $this->db->delete('supplier', ['id_supplier' => $id]);
    }
}
