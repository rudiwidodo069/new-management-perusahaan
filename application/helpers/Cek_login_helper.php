<?php

function cek_user()
{
    $ci = get_instance();
    $id_karyawan = $ci->session->userdata('id_karyawan');

    $ci->db->select('*');
    $ci->db->from('karyawan');
    $ci->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
    $ci->db->join('users', 'users.id_karyawan = karyawan.id_karyawan');
    $ci->db->where('karyawan.id_karyawan', $id_karyawan);
    $user = $ci->db->get()->row_array();

    return $user;
}
