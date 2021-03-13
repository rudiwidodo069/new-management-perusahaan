<?php

defined('BASEPATH') or exit('No direct script access allowed');

class absensi_model extends CI_Model
{
    function get_data_karyawan($nik)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $this->db->where('nik_karyawan', $nik);
        return $this->db->get()->row_array();
    }

    function update_jadwal($id, $tanggal, $jam)
    {
        $this->db->select('*');
        $this->db->from('jadwal_absensi');
        $this->db->where('id_karyawan', $id);
        $this->db->where('tanggal_jadwal', $tanggal);
        $query = $this->db->get()->row_array();

        $jam_masuk = strtotime($query['masuk']);
        $jam_keluar = strtotime($query['keluar']);
        $jam_scann = strtotime($jam);

        if ($query['jadwal_status'] == '') {
            if ($jam_scann <= $jam_masuk) {
                $this->db->set('jadwal_status', 'MASUK');
                $this->db->where('tanggal_jadwal', $tanggal);
                $this->db->update('jadwal_absensi');
                return 'anda datang tepat waktu';
            } else if ($jam_scann >= $jam_masuk) {
                $this->db->set('jadwal_status', 'TELAT');
                $this->db->where('tanggal_jadwal', $tanggal);
                $this->db->update('jadwal_absensi');
                return 'anda datang terlambat';
            } else {
                $this->db->set('jadwal_status', 'ALFA');
                $this->db->where('tanggal_jadwal', $tanggal);
                $this->db->update('jadwal_absensi');
            }
        } else {
            if ($jam_scann < $jam_keluar) {
                $this->db->set('jadwal_status', 'BOLOS');
                $this->db->where('tanggal_jadwal', $tanggal);
                $this->db->update('jadwal_absensi');
                return 'belum waktunya pulang kok udah scann absen aja ?';
            } else if ($jam_scann >= $jam_keluar) {
                $this->db->set('jadwal_status', 'MASUK');
                $this->db->where('tanggal_jadwal', $tanggal);
                $this->db->update('jadwal_absensi');
                return 'selamat beristirahat dan hati - hati di jalan';
            }
        }
    }
}
