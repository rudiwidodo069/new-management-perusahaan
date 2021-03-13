<?php

defined('BASEPATH') or exit('No direct script access allowed');

class manager_menu_inventori_keluar_model extends CI_Model
{

    function get_all_data_inventori()
    {
        $this->db->select('*');
        $this->db->from('inventori_keluar');
        $this->db->join('cabang', 'cabang.id_cabang = inventori_keluar.id_cabang');
        $this->db->join('kategori', 'kategori.id_kategori = inventori_keluar.id_kategori');
        $this->db->where('inventori_keluar.id_cabang', $this->session->userdata('cabang'));
        $this->db->order_by('id_inventori_keluar', 'desc');
        return $this->db->get()->result_array();
    }

    function get_all_data_kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->join('inventori_masuk', 'inventori_masuk.id_kategori = kategori.id_kategori', 'right');
        $this->db->group_by('inventori_masuk.id_kategori');
        return $this->db->get()->result_array();
    }

    function get_data_kategori($id_kategori)
    {
        return $this->db->get_where('kategori', ['id_kategori' => $id_kategori])->row_array();
    }

    function insert_inventori($data)
    {
        $this->db->insert('inventori_keluar', $data);
    }

    function get_data_inventori($id_inventori)
    {
        $this->db->select('*');
        $this->db->from('inventori_keluar');
        $this->db->join('cabang', 'cabang.id_cabang = inventori_keluar.id_cabang');
        $this->db->join('kategori', 'kategori.id_kategori = inventori_keluar.id_kategori');
        $this->db->where('id_inventori_keluar', $id_inventori);
        return $this->db->get()->row_array();
    }

    function update_inventori($id_inventori, $data)
    {
        $this->db->set($data);
        $this->db->where('id_inventori_keluar', $id_inventori);
        $this->db->update('inventori_keluar', $data);
    }
}
