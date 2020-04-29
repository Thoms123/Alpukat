<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function login()
    {
        check_already_login();
        $this->load->view('login');
    }

    public function register()
    {
        $this->form_validation->set_rules('nik', 'Nik', 'required|trim');
        $this->form_validation->set_rules('fullname', 'Fullname', 'required');
        $this->form_validation->set_rules('alamat', 'Address', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Date of Birth', 'required');
        $this->form_validation->set_rules('no_tlp', 'Phone', 'required');
        $this->form_validation->set_rules('username', 'Email', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password dont match.',
            'min_length' => 'Password too short.'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            check_already_login();
            $this->load->view('register');
        } else {
            $data = [
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('fullname'),
                'alamat' => $this->input->post('alamat'),
                'tanggal_lahir' => $this->input->post('tgl_lahir'),
                'no_tlp' => $this->input->post('no_tlp'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password1'),
                'level' => 3,
            ];
            $this->db->insert('user', $data);
            redirect('auth/login');
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model('user_m');
            $query = $this->user_m->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                // echo $row->username;
                $params = array(
                    'userid' => $row->user_id,
                    'level' => $row->level
                );
                $this->session->set_userdata($params);
                echo "<script>
                alert('Selamat, login berhasil!')
                window.location='" . site_url('dashboard') . "'
                </script>";
            } else {
                echo "<script>
                alert('Login gagal!')
                window.location='" . site_url('auth/login') . "'
                </script>";
            }
        }
    }

    public function logout()
    {
        $params = array('userid', 'level');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
}
