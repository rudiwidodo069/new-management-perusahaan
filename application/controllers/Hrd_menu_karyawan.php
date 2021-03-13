<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hrd_menu_karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hrd_menu_karyawan_model');
        $this->load->helper('Cek_login_helper');
        $this->load->helper('Karyawan_helper');
    }

    public function index()
    {
        $data['user'] = cek_user();
        $data['title'] = "data karyawan";
        $data['data_jabatan'] = $this->hrd_menu_karyawan_model->get_all_data_jabatan();
        $data['data_cabang'] = $this->hrd_menu_karyawan_model->get_all_data_cabang();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('hrd/hrd-karyawan/data_karyawan', $data);
        $this->load->view('templeates/footer');
    }

    // get all data karyawan
    function get_all_data_karyawan()
    {
        $fatch_data = $this->hrd_menu_karyawan_model->get_all_data_karyawan();
        $data = array();
        $no = 1;
        foreach ($fatch_data as $row) {
            $karyawan = array();
            $karyawan[] = $no . '.';
            $karyawan[] = $row['nama_karyawan'];
            $karyawan[] = $row['id_karyawan'];
            $karyawan[] = $row['nik_karyawan'];
            $karyawan[] = $row['email'];
            $karyawan[] = $row['jabatan'];
            $karyawan[] = $row['status_kerja'];
            $karyawan[] = '<a href=" ' . base_url('hrd_menu_karyawan/detail') . '?idKaryawan=' . $row['id_karyawan'] . '" class="badge badge-primary">
                                        <i class="fas fa-fw fa-info"></i>
                                    </a>
                                    <button class="badge badge-warning" data-target="#modal-update" data-toggle="modal" data-id="' . $row['id_karyawan'] . '" id="update">
                                        <i class="fas fa-fw fa-edit"></I>
                                    </button>
                                    <button class="badge badge-danger" data-id="' . $row['id_karyawan'] . '" id="delete">
                                        <i class="fas fa-fw fa-trash-alt"></I>
                                    </button>';
            $data[] = $karyawan;
            $no++;
        }
        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->hrd_menu_karyawan_model->count_all_data_karyawan(),
            'recordsFilter' => $this->hrd_menu_karyawan_model->filtered_data_karyawan(),
            'data' => $data
        );

        echo json_encode($output);
    }

    public function form_insert_karyawan()
    {
        $data['user'] = cek_user();
        $data['title'] = "form insert karyawan";
        $data['data_jabatan'] = $this->hrd_menu_karyawan_model->get_all_data_jabatan();
        $data['data_cabang'] = $this->hrd_menu_karyawan_model->get_all_data_cabang();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('hrd/hrd-karyawan/form_insert_karyawan', $data);
        $this->load->view('templeates/footer');
    }

    // insert karyawan
    function insert_karyawan()
    {
        $this->form_validation->set_rules('nama', 'nama karyawan', 'required|trim');
        $this->form_validation->set_rules('nik', 'nik karyawan', 'required|trim|numeric|min_length[16]');
        $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'tanggal lahir', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat karyawan', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'no hp karyawan', 'required|trim|numeric|min_length[11]');
        $this->form_validation->set_rules('join_date', 'tanggal masuk', 'required|trim');
        $this->form_validation->set_rules('end_date', 'tanggal selesai', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[karyawan.email]');
        $this->form_validation->set_rules('rekening', 'rekening', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'nama_err' => form_error('nama'),
                'nik_err' => form_error('nik'),
                'email_err' => form_error('email'),
                'tempat_lahir_err' => form_error('tempat_lahir'),
                'tgl_lahir_err' => form_error('tgl_lahir'),
                'alamat_err' => form_error('alamat'),
                'no_hp_err' => form_error('no_hp'),
                'join_date_err' => form_error('join_date'),
                'end_date_err' => form_error('end_date'),
                'rekening_err' => form_error('rekening')
            );
        } else {
            $nik = htmlspecialchars($this->input->post('nik'), true);
            $cek_nik = $this->hrd_menu_karyawan_model->cek_data_karyawan($nik);

            if ($cek_nik > 0) {
                $output = array(
                    'invalid' => true,
                    'pesan' => 'data karyawan sudah terdaftar'
                );
            } else {
                $upload_image = $_FILES['foto']['name'];

                if ($upload_image == null) {
                    $output = array(
                        'invalid' => true,
                        'pesan' => 'foto karyawan harus diisi'
                    );
                } else {
                    $config['upload_path']          = './assets/img/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['max_size']             = 2048;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto')) {

                        $id_jabatan = htmlspecialchars($this->input->post('jabatan'), true);

                        if ($id_jabatan == '5' || $id_jabatan == '8'){
                            $data = array(
                                'nama_karyawan' => htmlspecialchars($this->input->post('nama'), true),
                                'nik_karyawan' => htmlspecialchars($this->input->post('nik'), true),
                                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir'), true),
                                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir'), true),
                                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin'), true),
                                'email' => htmlspecialchars($this->input->post('email'), true),
                                'status_karyawan' => htmlspecialchars($this->input->post('status_karyawan'), true),
                                'jml_anak' => htmlspecialchars($this->input->post('anak'), true),
                                'alamat' => htmlspecialchars($this->input->post('alamat'), true),
                                'id_jabatan' => htmlspecialchars($this->input->post('jabatan'), true),
                                'no_hp' => htmlspecialchars($this->input->post('no_hp'), true),
                                'join_date' => htmlspecialchars($this->input->post('join_date'), true),
                                'end_date' => htmlspecialchars($this->input->post('end_date'), true),
                                'status_kerja' => htmlspecialchars($this->input->post('status_kerja'), true),
                                'id_cabang' => htmlspecialchars($this->input->post('cabang'), true),
                                'rekening' => htmlspecialchars($this->input->post('rekening'), true),
                                'foto' => $this->upload->data('file_name')
                            );
    
                            $this->hrd_menu_karyawan_model->insert_karyawan($data);
    
                            $output = array(
                                'success' => true,
                                'pesan' => 'insert data berhasil'
                            );
                        } else {
                            $data = array(
                                'nama_karyawan' => htmlspecialchars($this->input->post('nama'), true),
                                'nik_karyawan' => htmlspecialchars($this->input->post('nik'), true),
                                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir'), true),
                                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir'), true),
                                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin'), true),
                                'email' => htmlspecialchars($this->input->post('email'), true),
                                'status_karyawan' => htmlspecialchars($this->input->post('status_karyawan'), true),
                                'jml_anak' => htmlspecialchars($this->input->post('anak'), true),
                                'alamat' => htmlspecialchars($this->input->post('alamat'), true),
                                'id_jabatan' => htmlspecialchars($this->input->post('jabatan'), true),
                                'no_hp' => htmlspecialchars($this->input->post('no_hp'), true),
                                'join_date' => htmlspecialchars($this->input->post('join_date'), true),
                                'end_date' => htmlspecialchars($this->input->post('end_date'), true),
                                'status_kerja' => htmlspecialchars($this->input->post('status_kerja'), true),
                                'id_cabang' => 0,
                                'rekening' => htmlspecialchars($this->input->post('rekening'), true),
                                'foto' => $this->upload->data('file_name')
                            );
    
                            $this->hrd_menu_karyawan_model->insert_karyawan($data);
    
                            $output = array(
                                'success' => true,
                                'pesan' => 'insert data berhasil'
                            );
                        }
                    } else {
                        $output = array(
                            'invalid' => true,
                            'pesan' => 'ekstensi file salah'
                        );
                    }
                }
            }
        }
        echo json_encode($output);
    }

    function get_data_karyawan()
    {
        $id = $this->input->post('id');
        $output = $this->hrd_menu_karyawan_model->get_data_karyawan($id);
        echo json_encode($output);
    }

    function update_karyawan()
    {
        $this->form_validation->set_rules('nama', 'nama karyawan', 'required|trim');
        $this->form_validation->set_rules('nik', 'nik karyawan', 'required|trim|numeric|min_length[16]');
        $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'tanggal lahir', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat karyawan', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'no hp karyawan', 'required|trim|numeric|min_length[11]');
        $this->form_validation->set_rules('join_date', 'tanggal masuk', 'required|trim');
        $this->form_validation->set_rules('end_date', 'tanggal selesai', 'required|trim');
        $this->form_validation->set_rules('email_update', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('rekening', 'rekening', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'nama_err' => form_error('nama'),
                'nik_err' => form_error('nik'),
                'email_err' => form_error('email_update'),
                'tempat_lahir_err' => form_error('tempat_lahir'),
                'tgl_lahir_err' => form_error('tgl_lahir'),
                'alamat_err' => form_error('alamat'),
                'no_hp_err' => form_error('no_hp'),
                'join_date_err' => form_error('join_date'),
                'end_date_err' => form_error('end_date'),
                'rekening_err' => form_error('rekening')
            );
        } else {
            $id = $this->input->post('id');

            $new_img = $_FILES['foto']['name'];
            $old_img = $this->input->post('profile');

            if ($new_img == null) {

                $data = array(
                    'nama_karyawan' => htmlspecialchars($this->input->post('nama'), true),
                    'nik_karyawan' => htmlspecialchars($this->input->post('nik'), true),
                    'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir'), true),
                    'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir'), true),
                    'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin'), true),
                    'email' => htmlspecialchars($this->input->post('email_update'), true),
                    'status_karyawan' => htmlspecialchars($this->input->post('status_karyawan'), true),
                    'jml_anak' => htmlspecialchars($this->input->post('anak'), true),
                    'alamat' => htmlspecialchars($this->input->post('alamat'), true),
                    'id_jabatan' => htmlspecialchars($this->input->post('jabatan'), true),
                    'no_hp' => htmlspecialchars($this->input->post('no_hp'), true),
                    'join_date' => htmlspecialchars($this->input->post('join_date'), true),
                    'end_date' => htmlspecialchars($this->input->post('end_date'), true),
                    'status_kerja' => htmlspecialchars($this->input->post('status_kerja'), true),
                    'id_cabang' => htmlspecialchars($this->input->post('cabang'), true),
                    'rekening' => htmlspecialchars($this->input->post('rekening'), true),
                    'foto' => $old_img
                );

                $this->hrd_menu_karyawan_model->update_karyawan($id, $data);

                $output = array(
                    'success' => true,
                    'pesan' => 'update berhasil'
                );
            } else {
                $config['upload_path']          = './assets/img/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

                    unlink(FCPATH . '/assets/img/' . $old_img);

                    $id_jabatan = htmlspecialchars($this->input->post('jabatan'), true);

                    if ($id_jabatan == '5' || $id_jabatan == '8'){
                        $data = array(
                            'nama_karyawan' => htmlspecialchars($this->input->post('nama'), true),
                            'nik_karyawan' => htmlspecialchars($this->input->post('nik'), true),
                            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir'), true),
                            'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir'), true),
                            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin'), true),
                            'email' => htmlspecialchars($this->input->post('email'), true),
                            'status_karyawan' => htmlspecialchars($this->input->post('status_karyawan'), true),
                            'jml_anak' => htmlspecialchars($this->input->post('anak'), true),
                            'alamat' => htmlspecialchars($this->input->post('alamat'), true),
                            'id_jabatan' => htmlspecialchars($this->input->post('jabatan'), true),
                            'no_hp' => htmlspecialchars($this->input->post('no_hp'), true),
                            'join_date' => htmlspecialchars($this->input->post('join_date'), true),
                            'end_date' => htmlspecialchars($this->input->post('end_date'), true),
                            'status_kerja' => htmlspecialchars($this->input->post('status_kerja'), true),
                            'id_cabang' => htmlspecialchars($this->input->post('cabang'), true),
                            'rekening' => htmlspecialchars($this->input->post('rekening'), true),
                            'foto' => $this->upload->data('file_name')
                        );

                        $this->hrd_menu_karyawan_model->insert_karyawan($data);

                        $output = array(
                            'success' => true,
                            'pesan' => 'insert data berhasil'
                        );
                    } else {
                        $data = array(
                            'nama_karyawan' => htmlspecialchars($this->input->post('nama'), true),
                            'nik_karyawan' => htmlspecialchars($this->input->post('nik'), true),
                            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir'), true),
                            'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir'), true),
                            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin'), true),
                            'email' => htmlspecialchars($this->input->post('email'), true),
                            'status_karyawan' => htmlspecialchars($this->input->post('status_karyawan'), true),
                            'jml_anak' => htmlspecialchars($this->input->post('anak'), true),
                            'alamat' => htmlspecialchars($this->input->post('alamat'), true),
                            'id_jabatan' => htmlspecialchars($this->input->post('jabatan'), true),
                            'no_hp' => htmlspecialchars($this->input->post('no_hp'), true),
                            'join_date' => htmlspecialchars($this->input->post('join_date'), true),
                            'end_date' => htmlspecialchars($this->input->post('end_date'), true),
                            'status_kerja' => htmlspecialchars($this->input->post('status_kerja'), true),
                            'id_cabang' => 0,
                            'rekening' => htmlspecialchars($this->input->post('rekening'), true),
                            'foto' => $this->upload->data('file_name')
                        );

                        $this->hrd_menu_karyawan_model->insert_karyawan($data);

                        $output = array(
                            'success' => true,
                            'pesan' => 'insert data berhasil'
                        );
                    }
                } else {
                    $output = array(
                        'invalid' => true,
                        'pesan' => 'ekstensi file salah'
                    );
                }
            }
        }
        echo json_encode($output);
    }

    function delete_karyawan()
    {
        $id = $this->input->post('id');
        $karyawan = $this->hrd_menu_karyawan_model->get_data_karyawan($id);
        $this->hrd_menu_karyawan_model->delete_karyawan($id);
        $this->hrd_menu_karyawan_model->update_cabang($id);

        unlink(FCPATH . 'assets/img/' . $karyawan['foto']);

        $output = array(
            'success' => true,
            'pesan' => 'delete data berhasil'
        );

        echo json_encode($output);
    }

    // detail karyawan
    public function detail()
    {
        $id_karyawan = $this->input->get('idKaryawan');
        $data['user'] = cek_user();
        $data['title'] = "detail karyawan";
        $data['gaji']  = cek_gaji_karyawan($id_karyawan);
        $data['karyawan'] = $this->hrd_menu_karyawan_model->get_data_karyawan($id_karyawan);
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('hrd/hrd-karyawan/detail_karyawan', $data);
        $this->load->view('templeates/footer');
    }
}
