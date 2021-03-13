<?php

defined('BASEPATH') or exit('No direct script access allowed');

class hrd_menu_dashboard_model extends CI_Model
{
    function get_all_karyawan()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        return $this->db->get()->num_rows();
    }

    function get_all_outlet()
    {
        $this->db->select('*');
        $this->db->from('outlet_area');
        return $this->db->get()->num_rows();
    }

    function get_all_cabang()
    {
        $this->db->select('*');
        $this->db->from('cabang');
        return $this->db->get()->num_rows();
    }

    function get_all_area()
    {
        $this->db->select('*');
        $this->db->from('cabang');
        $this->db->join('karyawan', 'karyawan.id_karyawan = cabang.id_karyawan');
        $this->db->group_by('cabang.id_karyawan');
        return $this->db->get()->num_rows();
    }
}
