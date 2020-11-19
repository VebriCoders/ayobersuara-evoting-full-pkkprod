<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilih extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pemilih');

        $this->check_login();
        if ($this->session->userdata('id_role') != "3") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $profile = $this->Konfigurasi_model->listinguser();
        // $site = $this->Konfigurasi_model->listinguser();
        $data = array(
            'title'                 => 'Data Pemilih | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            'tampilPemilih' => $this->M_Pemilih->tampilPemilih(),
            'joinKat_Pemilih' => $this->M_Pemilih->joinKat_Pemilih(),
            'jumlah_pemilih' => $this->M_Pemilih->jumlah_pemilih(),
            // 'id_role'               => ['id_role']
        );
        $this->template->load('layout/template', 'panitia/pemilih', $data);
    }

    public function CariData()
    {
        $site = $this->Konfigurasi_model->listing();
        $profile = $this->Konfigurasi_model->listinguser();
        // $site = $this->Konfigurasi_model->listinguser();
        $data = array(
            'title'                 => 'Data Pemilih | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            'tampilPemilih' => $this->M_Pemilih->CariData(),
            'joinKat_Pemilih' => $this->M_Pemilih->joinKat_Pemilih(),
            'jumlah_pemilih' => $this->M_Pemilih->jumlah_pemilih(),
            // 'id_role'               => ['id_role']
        );
        $this->template->load('layout/template', 'panitia/pemilih', $data);
    }

    function Tambah()
		{
			$this->M_Pemilih->Tambah();
			redirect('panitia/pemilih');
		}

    function Edit()
		{
			$this->M_Pemilih->Edit();
			redirect('panitia/pemilih');
		}

    function Hapus($id)
		{
			$this->M_Pemilih->Hapus($id);
			redirect('panitia/pemilih');
		}

    function verifikasi()
    {
      $this->M_Pemilih->verifikasi();
			redirect('panitia/pemilih');
    }
}
