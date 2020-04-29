<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->user_model->get();
        $this->template->load('template', 'user/user_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required');
        $this->form_validation->set_rules('no_tlp', 'No. Telepon', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules(
            'passconf',
            'Confirm Password',
            'required|matches[password]',
            array('matches' => '%s Tidak sesuai dengan Password')
        );
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '{field} Sudah pernah di tambahkan, silahkan ganti');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'user/user_form_add');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->user_model->add($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil disimpan');</script>";
            }
            echo "<script>window.location='" . site_url('user') . "';</script>";
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required');
        $this->form_validation->set_rules('no_tlp', 'No. Telepon', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
            $this->form_validation->set_rules(
                'passconf',
                'Confirm Password',
                'matches[password]',
                array('matches' => '%s Tidak sesuai dengan Password')
            );
        }
        if ($this->input->post('passconf')) {
            $this->form_validation->set_rules(
                'passconf',
                'Confirm Password',
                'matches[password]',
                array('matches' => '%s Tidak sesuai dengan Password')
            );
        }
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '{field} Sudah pernah di tambahkan, silahkan ganti');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->user_model->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'user/user_form_edit', $data);
            } else {
                echo "<script>alert('Data tidak ditemukan');";
                echo "window.location='" . site_url('user') . "';</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->user_model->edit($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
            }
            redirect('user');
        }
    }

    function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '{field} sudah di pakai silahkan ganti');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function del()
    {
        $id = $this->input->post('user_id');
        $this->user_model->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('user');
    }
}
