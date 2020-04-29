<?php
defined('BASEPATH') or exit('No direct script access allowed');

class instansi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('instansi_m');
    }

    public function index()
    {
        $data['row'] = $this->instansi_m->get();
        $this->template->load('template', 'instansi/instansi_data', $data);
    }

    public function add()
    {
        $instansi = new stdClass();
        $instansi->instansi_id = null;
        $instansi->nama_instansi = null;
        $data = array(
            'page' => 'tambah',
            'row' => $instansi
        );
        $this->template->load('template', 'instansi/instansi_form', $data);
    }

    public function edit($id)
    {
        $query = $this->instansi_m->get($id);
        if ($query->num_rows() > 0) {
            $instansi = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $instansi
            );
            $this->template->load('template', 'instansi/instansi_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('instansi') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            $this->instansi_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->instansi_m->edit($post);
            //echo "<script>alert('testing');</script>";
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('instansi');
    }

    public function del($id)
    {
        $this->instansi_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('instansi');
    }
}
