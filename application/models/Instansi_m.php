<?php
defined('BASEPATH') or exit('No direct script access allowed');

class instansi_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('instansi_terkait');
        if ($id != null) {
            $this->db->where('instansi_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'nama_instansi' => $post['nama_instansi'],
        ];
        $this->db->insert('instansi_terkait', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_instansi' => $post['nama_instansi'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('instansi_id', $post['id']);
        $this->db->update('instansi_terkait', $params);
    }

    public function del($id)
    {
        $this->db->where('instansi_id', $id);
        $this->db->delete('instansi_terkait');
    }
}
