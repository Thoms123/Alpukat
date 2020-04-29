<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('kategori_m');
    }

    public function index()
    {
        $data['row'] = $this->kategori_m->get();
        $this->template->load('template', 'kategori/kategori_data', $data);
    }

    public function add()
    {
        $kategori = new stdClass();
        $kategori->kategori_id = null;
        $kategori->nama_kategori = null;
        $data = array(
            'page' => 'tambah',
            'row' => $kategori
        );
        $this->template->load('template', 'kategori/kategori_form', $data);
    }

    public function edit($id)
    {
        $query = $this->kategori_m->get($id);
        if ($query->num_rows() > 0) {
            $kategori = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $kategori
            );
            $this->template->load('template', 'kategori/kategori_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('kategori') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            $this->kategori_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->kategori_m->edit($post);
            //echo "<script>alert('testing');</script>";
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('kategori');
    }

    public function del($id)
    {
        $this->kategori_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('kategori');
    }
}
