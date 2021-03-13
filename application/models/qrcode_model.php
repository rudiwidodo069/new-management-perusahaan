<?php

defined('BASEPATH') or exit('No direct script access allowed');

class qrcode_model extends CI_Model
{
    function get_data_karyawan($id)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $this->db->where('karyawan.id_karyawan', $id);
        return $this->db->get()->row_array();
    }
}
