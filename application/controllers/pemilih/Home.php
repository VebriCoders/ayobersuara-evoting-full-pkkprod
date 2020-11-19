<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TemaModel');
        $this->load->model('HasilModel');
        $this->load->model('Pemilih_Model');

        $this->user['user'] = $this->db->get_where('tbl_pemilih', ['nomor_pemilih'  => $this->session->userdata('nomor_pemilih')])->row_array();
        if($this->user['user'] == "") {
            redirect('Auth_pemilih', 'refresh');
        }
    }

    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $datapemilih = $this->Pemilih_Model->datapemilih();
        $data = array(
            'title'     => 'Dashboard | '.$site['nama_website'],
            'favicon'   => $site['favicon'],
            'site'      => $site,
            'datapemilih' => $datapemilih,
            'suaraSaya' => $this->Pemilih_Model->suaraSaya(),
            // 'id_role'   => ['id_role'],

        );
        $this->template->load('layout/template_pemilih', 'pemilih/dashboard', $data);
    }
}
