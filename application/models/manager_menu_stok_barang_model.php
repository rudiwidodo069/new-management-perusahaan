<?php

defined('BASEPATH') or exit('No direct script access allowed');

class manager_menu_stok_barang_model extends CI_Model
{
    function get_all_data_stok_barang()
    {
        $this->db->select('*');
        $this->db->from('stok_barang');
        $this->db->join('cabang', 'cabang.id_cabang = stok_barang.id_cabang');
        $this->db->join('kategori', 'kategori.kode_barang = stok_barang.kode_barang');
        $this->db->where('stok_barang.id_cabang', $this->session->userdata('cabang'));
        return $this->db->get()->result_array();
    }

    function insert_stok_barang($kode_barang)
    {
        // get data cabang
        $data_cabang = $this->db->get('cabang')->result_array();

        // tamp
        $value = array();
        // loping insert
        foreach ($data_cabang as $cabang) {
            array_push($value, array(
                'id_cabang' => $cabang['id_cabang'],
                'kode_barang' => $kode_barang
            ));
        }
        // insert data
        $this->db->insert_batch('stok_barang', $value);
    }

    function get_stok_awal($id_cabang, $kode_barang)
    {
        $this->db->select('stok_awal, stok_keluar, stok_akhir');
        $this->db->from('stok_barang');
        $this->db->where('id_cabang', $id_cabang);
        $this->db->where('kode_barang', $kode_barang);
        return $this->db->get()->row_array();
    }

    function update_stok_barang($id_cabang, $kode_barang, $data)
    {
        $this->db->set($data);
        $this->db->where('id_cabang', $id_cabang);
        $this->db->where('kode_barang', $kode_barang);
        $this->db->update('stok_barang', $data);
    }

    function delete_stok_barang($kode_barang)
    {
        $this->db->delete('stok_barang', ['kode_barang' => $kode_barang]);
    }
}
