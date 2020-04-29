<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['nik'] = $post['nik'];
        $params['nama'] = $post['nama'];
        $params['alamat'] = $post['alamat'];
        $params['tanggal_lahir'] = $post['tanggal_lahir'];
        $params['no_tlp'] = $post['no_tlp'];
        $params['username'] = $post['username'];
        $params['password'] = $post['password'];
        $params['level'] = $post['level'];
        $this->db->insert('user', $params);
    }

    public function edit($post)
    {
        $params['nik'] = $post['nik'];
        $params['nama'] = $post['nama'];
        $params['alamat'] = $post['alamat'];
        $params['tanggal_lahir'] = $post['tanggal_lahir'];
        $params['no_tlp'] = $post['no_tlp'];
        $params['username'] = $post['username'];
        if (!empty($post['password'])) {
            $params['password'] = $post['password'];
        }
        $params['level'] = $post['level'];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    public function del($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }
}
