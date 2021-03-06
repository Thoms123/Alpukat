<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('kategori');
        if ($id != null) {
            $this->db->where('kategori_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'nama_kategori' => $post['nama_kategori'],
        ];
        $this->db->insert('kategori', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_kategori' => $post['nama_kategori'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('kategori_id', $post['id']);
        $this->db->update('kategori', $params);
    }

    public function del($id)
    {
        $this->db->where('kategori_id', $id);
        $this->db->delete('kategori');
    }
}
