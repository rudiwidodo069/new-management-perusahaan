<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
    }

    public function index()
    {
        $data['title'] = "login form";
        $this->load->view('login', $data);
    }

    function karyawan_login()
    {
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[7]');

        $email = htmlspecialchars($this->input->post('email'), true);
        $pass = htmlspecialchars($this->input->post('password'), true);

        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'email_err' => form_error('email'),
                'password_err' => form_error('password')
            );
        } else {
            $user = $this->auth_model->get_user($email);
            if ($user) {
                if (password_verify($pass, $user['password'])) {

                    $this->auth_model->update_user_login($email);

                    $id_karyawan = $user['id_karyawan'];
                    $karyawan = $this->auth_model->get_data_karyawan($id_karyawan);
                    $cabang = $this->auth_model->get_data_cabang($id_karyawan);

                    $data = array(
                        'username' => $karyawan['nama_karyawan'],
                        'email' => $user['email'],
                        'id_karyawan' => $karyawan['id_karyawan'],
                        'id_jabatan' => $karyawan['id_jabatan'],
                        'status' => $user['status'],
                        'cabang' => $cabang['id_cabang'],
                        'lokasi_cabang' => $cabang['lokasi_cabang']
                    );

                    $this->session->set_userdata($data);

                    if ($karyawan['id_jabatan'] == 1) {
                        $output = array(
                            'success' => true,
                            'pesan' => 'admin_menu_dashboard'
                        );
                    } else if ($karyawan['id_jabatan'] == 7) {
                        $output = array(
                            'success' => true,
                            'pesan' => 'hrd_menu_dashboard'
                        );
                    } else if ($karyawan['id_jabatan'] == 3) {
                        $output = array(
                            'success' => true,
                            'pesan' => 'admin_menu_dashboard'
                        );
                    } else if ($karyawan['id_jabatan'] == 5) {
                        $output = array(
                            'success' => true,
                            'pesan' => 'manager_menu_dashboard'
                        );
                    } else {
                        $output = array(
                            'invalid' => true,
                            'pesan' => 'halam belum tersedia'
                        );
                    }
                } else {
                    $output = array(
                        'invalid' => true,
                        'pesan' => 'maaf password yang anda masukkan salah'
                    );
                }
            } else {
                $output = array(
                    'invalid' => true,
                    'pesan' => 'maaf email belum terdaftar'
                );
            }
        }
        echo json_encode($output);
    }

    public function regist()
    {
        $data['title'] = "regist form";
        $this->load->view('regist', $data);
    }

    function karyawan_regist()
    {
        $this->form_validation->set_rules('user', 'user', 'required|trim');
        $this->form_validation->set_rules('id_karyawan', 'id karyawan', 'required|trim|numeric');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password1', 'passwod', 'required|trim|min_length[7]|matches[password2]');
        $this->form_validation->set_rules('password2', 'confirm password', 'required|trim|min_length[7]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'username_err' => form_error('user'),
                'id_karyawan_err' => form_error('id_karyawan'),
                'email_err' => form_error('email'),
                'password_err' => form_error('password1')
            );
        } else {

            $cek_karyawan = $this->auth_model->get_data_karyawan($this->input->post('id_karyawan'));
            if ($cek_karyawan) {
                $data = array(
                    'username' => htmlspecialchars($this->input->post('user'), true),
                    'id_karyawan' => htmlspecialchars($this->input->post('id_karyawan'), true),
                    'email' => htmlspecialchars($this->input->post('email'), true),
                    'password' => htmlspecialchars(password_hash($this->input->post('password1'), PASSWORD_DEFAULT), true),
                    'status' => htmlspecialchars($this->input->post('status'), true)
                );
                $this->auth_model->insert_user($data);
                $this->send_email('get_id_card');
                $output = array(
                    'success' => true,
                    'pesan' => 'registrasi berhasil'
                );
            } else {
                $output = array(
                    'invalid' => true,
                    'pesan' => 'karyawan belum terdaftar'
                );
            }
        }
        echo json_encode($output);
    }

    function send_email($type)
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'rudiwid9@gmail.com',
            'smtp_pass' => 'Jancuklah098',
            'wordwrap' => true,
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('rudiwid9@gmail.com', 'Er - We Software Enginner');
        $this->email->to($this->input->post('email'));

        if ($type == 'get_id_card') {
            $this->email->subject('silahkan cetak id kayawan anda');
            $msg = '<html>
                            <head>
                                <title>Konfirmasi email</title>
                            </head>
                            <body>
                                <center><h1><strong>Silahkan Aktivasi Akun Anda</strong></h1></center>
                                <center><p><strong>Nama : </strong> ' . $this->input->post('user') . '</p></center>
                                <center><p><strong>id karyawan : </strong>' . $this->input->post('id_karyawan') . '</p></center>
                                <center><p><strong>Email : </strong>' . $this->input->post('email') . '</p></center>
                                <center><p><strong>Password : </strong>' . $this->input->post('password1') . '</p></center>
                                <center><h3><strong>klik link yang ada dibawah ini !</strong></h3></center>
                                <center><a href="' . base_url() . 'qrcode/get_id_card?id=' . $this->input->post('id_karyawan') . '">dapatkan id-crad karyawan anda</a></center>
                            </body>
                         </html>';
            $this->email->message($msg);
        }
        if ($this->email->send()) {
            return true;
        } else {
            return $this->email->print_debugger();
        }
    }

    public function logout()
    {
        $user = $this->session->userdata('id_karyawan');
        $this->auth_model->update_user_logout($user);
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_karyawan');
        $this->session->unset_userdata('status');
        redirect('auth');
    }
}
