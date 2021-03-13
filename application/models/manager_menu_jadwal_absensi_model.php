<?php

defined('BASEPATH') or exit('No direct script access allowed');

class manager_menu_jadwal_absensi_model extends CI_Model
{

    function get_tanggal()
    {
        return $this->db->get('schedule_mingguan')->result_array();
    }

    function aktivasi($id, $aktivasi)
    {
        $this->db->set('aktivasi', $aktivasi);
        $this->db->where('id_scedhule', $id);
        $this->db->update('schedule_mingguan');
    }

    function get_all_data_absensi()
    {
        $this->db->select('*');
        $this->db->from('schedule_mingguan');
        $this->db->join('jadwal_absensi', 'jadwal_absensi.kode_schedule = schedule_mingguan.kode_schedule');
        $this->db->join('karyawan', 'karyawan.id_karyawan = jadwal_absensi.id_karyawan');
        $this->db->where('jadwal_absensi.id_cabang', $this->session->userdata('cabang'));
        $this->db->where('aktivasi', 'ACTIVE');
        $this->db->where('jadwal_status', 'LIBUR');
        return $this->db->get()->result_array();
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

    function insert_schedule($data)
    {
        $this->db->insert('schedule_mingguan', $data);
    }

    function update_schedule($kode_schedule, $data)
    {
        $this->db->set($data);
        $this->db->where('kode_schedule', $kode_schedule);
        $this->db->update('schedule_mingguan', $data);
    }

    function insert_absensi($kode_schedule)
    {
        $value = [];
        for ($i = 1; $i <= 7; $i++) {
            $jam_masuk = htmlspecialchars($this->input->post('masuk' . $i), true);
            $jam_keluar = htmlspecialchars($this->input->post('keluar' . $i), true);

            if ($jam_masuk != null && $jam_keluar != null) {
                array_push($value, array(
                    'id_cabang' => htmlspecialchars($this->input->post('id_cabang'), true),
                    'id_karyawan' => htmlspecialchars($this->input->post('id_karyawan'), true),
                    'kode_schedule' => $kode_schedule,
                    'tanggal_jadwal' => htmlspecialchars($this->input->post('tanggal' . $i), true),
                    'masuk' => $jam_masuk,
                    'keluar' => $jam_keluar,
                    'jadwal_status' => ''
                ));
            } else {
                array_push($value, array(
                    'id_cabang' => htmlspecialchars($this->input->post('id_cabang'), true),
                    'id_karyawan' => htmlspecialchars($this->input->post('id_karyawan'), true),
                    'kode_schedule' => $kode_schedule,
                    'tanggal_jadwal' => htmlspecialchars($this->input->post('tanggal' . $i), true),
                    'masuk' => $jam_masuk,
                    'keluar' => $jam_keluar,
                    'jadwal_status' => 'LIBUR'
                ));
            }
        }
        $this->db->insert_batch('jadwal_absensi', $value);
    }

    function update_absensi($kode_schedule)
    {

        // ambil data 
        $value = [];
        for ($i = 1; $i <= 7; $i++) {
            $jam_masuk = htmlspecialchars($this->input->post('masuk' . $i), true);
            $jam_keluar = htmlspecialchars($this->input->post('keluar' . $i), true);

            if ($jam_masuk != null && $jam_keluar != null) {
                array_push($value, array(
                    'id_jadwal' => htmlspecialchars($this->input->post('id_jadwal' . $i), true),
                    'id_cabang' => htmlspecialchars($this->input->post('id_cabang'), true),
                    'id_karyawan' => htmlspecialchars($this->input->post('id_karyawan'), true),
                    'kode_schedule' => $kode_schedule,
                    'tanggal_jadwal' => htmlspecialchars($this->input->post('tanggal' . $i), true),
                    'masuk' => $jam_masuk,
                    'keluar' => $jam_keluar,
                    'jadwal_status' => ''
                ));
            } else {
                array_push($value, array(
                    'id_jadwal' => htmlspecialchars($this->input->post('id_jadwal' . $i), true),
                    'id_cabang' => htmlspecialchars($this->input->post('id_cabang'), true),
                    'id_karyawan' => htmlspecialchars($this->input->post('id_karyawan'), true),
                    'kode_schedule' => $kode_schedule,
                    'tanggal_jadwal' => htmlspecialchars($this->input->post('tanggal' . $i), true),
                    'masuk' => $jam_masuk,
                    'keluar' => $jam_keluar,
                    'jadwal_status' => 'LIBUR'
                ));
            }
        }

        $this->db->update_batch('jadwal_absensi', $value, 'id_jadwal');
    }

    function get_data_absensi($kode_schedule)
    {
        $this->db->select('*');
        $this->db->from('jadwal_absensi');
        $this->db->join('schedule_mingguan', 'schedule_mingguan.kode_schedule = jadwal_absensi.kode_schedule');
        $this->db->where('jadwal_absensi.id_cabang', $this->session->userdata('cabang'));
        $this->db->where('jadwal_absensi.kode_schedule', $kode_schedule);
        return $this->db->get()->result_array();
    }

    function get_data_karyawan($id_karyawan)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
        return $this->db->get()->row_array();
    }
}
