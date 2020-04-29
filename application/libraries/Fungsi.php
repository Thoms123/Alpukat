<?php

class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }

    function PdfGenerator($html, $filename, $paper, $orientation)
    {
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename, array('Attachment' => 0));
    }

    public function count_pengaduan()
    {
        $this->ci->load->model('pengaduan_m');
        return $this->ci->pengaduan_m->get()->num_rows();
    }

    public function count_instansi()
    {
        $this->ci->load->model('instansi_m');
        return $this->ci->instansi_m->get()->num_rows();
    }

    public function count_kategori()
    {
        $this->ci->load->model('kategori_m');
        return $this->ci->kategori_m->get()->num_rows();
    }

    public function count_user()
    {
        $this->ci->load->model('user_model');
        return $this->ci->user_model->get()->num_rows();
    }
}
