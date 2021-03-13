<?php

defined('BASEPATH') or exit('No direct script access allowed');

class manager_menu_karyawan_model extends CI_Model
{
    function get_all_data_karyawan()
    {
        $this->db->select('karyawan.id_karyawan, karyawan.nama_karyawan, karyawan.jenis_kelamin, karyawan.no_hp, cabang.lokasi_cabang, jabatan.jabatan');
        $this->db->from('karyawan');
        $this->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $this->db->join('cabang', 'cabang.id_cabang = karyawan.id_cabang');
        $this->db->where('karyawan.id_cabang', $this->session->userdata('cabang'));
        return $this->db->get()->result_array();
    }

    function get_data_karyawan($id_karyawan)
    {
        $this->db->from('karyawan');
        $this->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
        return $this->db->get()->row_array();
    }

    function get_data_absensi($id_karyawan)
    {
        $this->db->select('*');
        $this->db->from('jadwal_absensi');
        $this->db->join('schedule_mingguan', 'schedule_mingguan.kode_schedule = jadwal_absensi.kode_schedule');
        $this->db->where('jadwal_absensi.id_karyawan', $id_karyawan);
        // $this->db->where('jadwal_absensi.tanggal_jadwal', date('Y-m-d'));
        return $this->db->get()->result_array();
    }
}
