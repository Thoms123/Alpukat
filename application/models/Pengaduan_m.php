<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('pengaduan');
        $this->db->join('kategori', 'kategori.kategori_id = pengaduan.kategori_id');
        $this->db->join('instansi_terkait', 'instansi_terkait.instansi_id = pengaduan.instansi_id');
        $this->db->join('user', 'user.user_id = pengaduan.user_id');
        if ($id != null) {
            $this->db->where('id_pengaduan', $id);
        }
        $this->db->order_by('nama', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'user_id' => $post['nama'],
            'kategori_id' => $post['kategori'],
            'instansi_id' => $post['instansi'],
            'isi_pengaduan' => $post['isi_pengaduan'],
            'tanggal' => $post['tanggal'],
            'gambar' => $post['gambar'],
            'status' => 1
        ];
        $this->db->insert('pengaduan', $params);
    }

    public function edit($post)
    {
        $params = [
            'user_id' => $post['nama'],
            'kategori_id' => $post['kategori'],
            'instansi_id' => $post['instansi'],
            'isi_pengaduan' => $post['isi_pengaduan'],
            'tanggal' => $post['tanggal'],
            'status' => $post['status'],
        ];
        if ($post['gambar'] != null) {
            $params['gambar'] = $post['gambar'];
        }
        $this->db->where('id_pengaduan', $post['id']);
        $this->db->update('pengaduan', $params);
    }

    public function del($id)
    {
        $this->db->where('id_pengaduan', $id);
        $this->db->delete('pengaduan');
    }
}
