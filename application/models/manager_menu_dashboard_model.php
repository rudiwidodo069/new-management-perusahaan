<?php

defined('BASEPATH') or exit('No direct script access allowed');

class manager_menu_dashboard_model extends CI_Model
{
    function get_all_data_karyawan()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->where('id_cabang', $this->session->userdata('cabang'));
        return $this->db->get()->num_rows();
    }

    function get_all_data_stok_barang()
    {
        $this->db->select('nama_kategori, stok_akhir');
        $this->db->from('stok_barang');
        $this->db->join('cabang', 'cabang.id_cabang = stok_barang.id_cabang');
        $this->db->join('kategori', 'kategori.kode_barang = stok_barang.kode_barang');
        $this->db->where('stok_barang.id_cabang', $this->session->userdata('cabang'));
        return $this->db->get()->result_array();
    }
}
