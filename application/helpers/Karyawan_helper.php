<?php

function cek_gaji_karyawan($id)
{
    $ci = get_instance();

    $ci->db->select('jabatan.gaji_pokok, status_kerja');
    $ci->db->from('karyawan');
    $ci->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
    $ci->db->where('id_karyawan', $id);
    $query = $ci->db->get()->row_array();

    if ($query['status_kerja'] == 'MAGANG') {
        $query = 2000000;
        return $query;
    } else {
        return $query;
    }
}
