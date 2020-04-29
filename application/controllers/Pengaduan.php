<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['kategori_m', 'pengaduan_m', 'user_model', 'instansi_m']);
    }

    public function index()
    {
        $data['row'] = $this->pengaduan_m->get();
        $this->template->load('template', 'pengaduan/pengaduan_data', $data);
    }

    public function add()
    {
        $pengaduan = new stdClass();
        $pengaduan->id_pengaduan = null;
        $pengaduan->nama = null;
        $pengaduan->isi_pengaduan = null;
        $pengaduan->gambar = null;
        $pengaduan->tanggal = null;
        $pengaduan->status = 1;
        $pengaduan->kategori_id = null;
        $pengaduan->instansi_id = null;
        $query_user = $this->user_model->get();
        $query_kategori = $this->kategori_m->get();
        $query_instansi = $this->instansi_m->get();
        $data = array(
            'page' => 'tambah',
            'row' => $pengaduan,
            'kategori' => $query_kategori,
            'instansi' => $query_instansi,
            'nama' => $query_user,
        );
        $this->template->load('template', 'pengaduan/pengaduan_form', $data);
    }

    public function edit($id)
    {
        $query = $this->pengaduan_m->get($id);
        if ($query->num_rows() > 0) {
            $pengaduan = $query->row();

            $query_kategori = $this->kategori_m->get();
            $query_instansi = $this->instansi_m->get();
            $data = array(
                'page' => 'edit',
                'row' => $pengaduan,
                'kategori' => $query_kategori,
                'instansi' => $query_instansi,
            );
            $this->template->load('template', 'pengaduan/pengaduan_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('pengaduan') . "';</script>";
        }
    }

    public function process()
    {
        $config['upload_path'] = './uploads/product';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048;
        $config['file_name'] = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            if (@$_FILES['gambar']['name'] != null) {
                if ($this->upload->do_upload('gambar')) {
                    $post['gambar'] = $this->upload->data('file_name');
                    $this->pengaduan_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('pengaduan');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('pengaduan/add');
                }
            } else {
                $post['gambar'] = null;
                $this->pengaduan_m->add($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                }
                redirect('pengaduan');
            }
        } else if (isset($_POST['edit'])) {
            if (@$_FILES['gambar']['name'] != null) {
                if ($this->upload->do_upload('gambar')) {
                    $pengaduan = $this->pengaduan_m->get($post['id'])->row();
                    if ($pengaduan->gambar != null) {
                        $target_file = './uploads/product' . $pengaduan->gambar;
                        unlink($target_file);
                    }
                    $post['gambar'] = $this->upload->data('file_name');
                    $this->pengaduan_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('pengaduan');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('pengaduan/add');
                }
            } else {
                $post['gambar'] = null;
                $this->pengaduan_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                }
                redirect('pengaduan');
            }
            //echo "<script>alert('testing');</script>";
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('pengaduan');
    }

    public function del($id)
    {
        $pengaduan = $this->pengaduan_m->get($id)->row();
        if ($pengaduan->gambar != null) {
            $target_file = './uploads/product' . $pengaduan->gambar;
            unlink($target_file);
        }
        $this->pengaduan_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('pengaduan');
    }

    function barcode_qrcode($id)
    {
        $data['row'] = $this->pengaduan_m->get($id)->row();
        $this->template->load('template', 'pengaduan/barcode_qrcode', $data);
    }

    function printpdf()
    {
        $data['row'] = $this->pengaduan_m->get();
        $html = $this->load->view('pengaduan/printpdf', $data, true);
        $this->fungsi->PdfGenerator($html, 'contoh', 'A4', 'landscape');
    }
}
