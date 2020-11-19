<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class Kandidat extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kandidat');

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
            'title'                 => 'Data Kandidat | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            'tampilKandidat' => $this->M_Kandidat->tampilKandidat(),
            'joinKat_Kandidat' => $this->M_Kandidat->joinKat_Kandidat(),
            'joinKat_Surat' => $this->M_Kandidat->joinKat_Surat(),
            // 'id_role'               => ['id_role']
        );
        $this->template->load('layout/template', 'panitia/kandidat', $data);
    }

    public function CariData()
    {
        $site = $this->Konfigurasi_model->listing();
        $profile = $this->Konfigurasi_model->listinguser();
        // $site = $this->Konfigurasi_model->listinguser();
        $data = array(
            'title'                 => 'Data Kandidat | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            'tampilKandidat' => $this->M_Kandidat->CariData(),
            'joinKat_Kandidat' => $this->M_Kandidat->joinKat_Kandidat(),
            'joinKat_Surat' => $this->M_Kandidat->joinKat_Surat(),
            // 'id_role'               => ['id_role']
        );
        $this->template->load('layout/template', 'panitia/kandidat', $data);
    }

    function Tambah()
		{
			$this->M_Kandidat->Tambah();
			redirect('panitia/kandidat');
		}

    function Edit()
		{
			$this->M_Kandidat->Edit();
			redirect('panitia/kandidat');
		}

    function Hapus($id)
		{
			$this->M_Kandidat->Hapus($id);
			redirect('panitia/kandidat');
		}
}
