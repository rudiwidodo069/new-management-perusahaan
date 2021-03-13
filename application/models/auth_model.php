<?php

defined('BASEPATH') or exit('No direct script access allowed');

class auth_model extends CI_Model
{
    function get_user($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }

    function update_user_login($email)
    {
        $this->db->set('status', 'ACTIVE');
        $this->db->where('email', $email);
        $this->db->update('users');
    }

    function update_user_logout($id_karyawan)
    {
        $this->db->set('status', 'NON-ACTIVE');
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->update('users');
    }

    function get_data_karyawan($id_karyawan)
    {
        return $this->db->get_where('karyawan', ['id_karyawan' => $id_karyawan])->row_array();
    }

    function get_data_cabang($id_karyawan)
    {
        $this->db->select('cabang.id_cabang, cabang.lokasi_cabang');
        $this->db->from('karyawan');
        $this->db->join('cabang', 'cabang.id_cabang = karyawan.id_cabang');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
        return $this->db->get()->row_array();
    }

    function insert_user($data)
    {
        $this->db->insert('users', $data);
    }
}
