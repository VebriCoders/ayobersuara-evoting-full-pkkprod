<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
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
            'tampilProfil' => $this->Pemilih_Model->tampilProfil(),
            // 'id_role'               => ['id_role']
        );
        $this->template->load('layout/template_pemilih', 'pemilih/profile', $data);
    }

    function ubahProfile()
		{
			$this->Pemilih_Model->ubahProfile();
      $this->session->set_flashdata('flash', '<div class="alert alert-warning">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Profile Anda Telah di Perbarui !</strong>
      </div>');
			// redirect
			redirect('kandidat/profile');
		}
}
