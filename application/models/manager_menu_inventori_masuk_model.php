<?php

defined('BASEPATH') or exit('No direct script access allowed');

class manager_menu_inventori_masuk_model extends CI_Model
{
    function get_all_data_inventori()
    {
        $this->db->select('*');
        $this->db->from('inventori_masuk');
        $this->db->join('cabang', 'cabang.id_cabang = inventori_masuk.id_cabang');
        $this->db->join('kategori', 'kategori.id_kategori = inventori_masuk.id_kategori');
        $this->db->join('supplier', 'supplier.id_supplier = inventori_masuk.id_supplier');
        $this->db->join('karyawan', 'karyawan.id_karyawan = inventori_masuk.id_karyawan');
        $this->db->where('inventori_masuk.id_cabang', $this->session->userdata('cabang'));
        $this->db->order_by('id_inventori', 'desc');
        return $this->db->get()->result_array();
    }

    function get_all_data_kategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    function get_all_data_supplier()
    {
        return $this->db->get('supplier')->result_array();
    }

    function get_all_data_karyawan()
    {
        $this->db->select('karyawan.id_karyawan, nama_karyawan, karyawan.id_cabang, cabang.lokasi_cabang, jabatan');
        $this->db->from('karyawan');
        $this->db->join('cabang', 'cabang.id_cabang = karyawan.id_cabang');
        $this->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $this->db->where('karyawan.id_cabang', $this->session->userdata('cabang'));
        return $this->db->get()->result_array();
    }

    function insert_inventori_masuk($data)
    {
        $this->db->insert('inventori_masuk', $data);
    }

    function get_data_inventori($id)
    {
        $this->db->select('*');
        $this->db->from('inventori_masuk');
        $this->db->join('cabang', 'cabang.id_cabang = inventori_masuk.id_cabang');
        $this->db->join('kategori', 'kategori.id_kategori = inventori_masuk.id_kategori');
        $this->db->join('supplier', 'supplier.id_supplier = inventori_masuk.id_supplier');
        $this->db->join('karyawan', 'karyawan.id_karyawan = inventori_masuk.id_karyawan');
        $this->db->where('inventori_masuk.id_inventori', $id);
        return $this->db->get()->row_array();
    }

    function update_inventori_masuk($id_inventori, $data)
    {
        $this->db->set($data);
        $this->db->where('id_inventori', $id_inventori);
        $this->db->update('inventori_masuk', $data);
    }
}
