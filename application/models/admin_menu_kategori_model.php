<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin_menu_kategori_model extends CI_Model
{
    var $column_order = array('id_kategori', null, null);

    function get_all_data_datatable()
    {
        $this->db->select('*');
        $this->db->from('kategori');

        if (isset($_POST["search"]["value"])) {
            $this->db->like('id_kategori', $_POST["search"]["value"]);
            $this->db->or_like('nama_kategori', $_POST["search"]["value"]);
        }

        if (isset($_POST["order"])) {
            $this->db->order_by($this->column_order[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
        } else {
            $this->db->order_by('id_kategori', 'desc');
        }
    }

    function get_all_data_kategori()
    {
        $this->get_all_data_datatable();

        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }

        return $this->db->get()->result_array();
    }

    function filtered_data_kategori()
    {
        $this->get_all_data_datatable();
        return $this->db->get()->num_rows();
    }

    function count_all_data_kategori()
    {
        $this->get_all_data_datatable();
        return $this->db->count_all_results();
    }

    function cek_kategori($kode_barang)
    {
        return $this->db->get_where('kategori', ['kode_barang' => $kode_barang])->num_rows();
    }

    function insert_kategori($data)
    {
        $this->db->insert('kategori', $data);
    }

    function get_data_kategori($id)
    {
        return $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
    }

    function update_kategori($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
    }

    function delete_kategori($id)
    {
        $this->db->delete('kategori', ['id_kategori' => $id]);
        $this->db->delete('inventori_masuk', ['id_kategori' => $id]);
        $this->db->delete('inventori_keluar', ['id_kategori' => $id]);
    }
}
