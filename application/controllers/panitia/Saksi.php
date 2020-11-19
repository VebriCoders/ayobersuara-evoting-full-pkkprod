<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class Saksi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Saksi');

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
            'title'                 => 'Data Saksi | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            'tampilSaksi' => $this->M_Saksi->tampilSaksi(),
            'joinKat_Saksi' => $this->M_Saksi->joinKat_Saksi(),
            'joinKat_Surat' => $this->M_Saksi->joinKat_Surat(),
            // 'id_role'               => ['id_role']
        );
        $this->template->load('layout/template', 'panitia/saksi', $data);
    }

    public function CariData()
    {
        $site = $this->Konfigurasi_model->listing();
        $profile = $this->Konfigurasi_model->listinguser();
        // $site = $this->Konfigurasi_model->listinguser();
        $data = array(
            'title'                 => 'Data Saksi | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            'tampilSaksi' => $this->M_Saksi->CariData(),
            'joinKat_Saksi' => $this->M_Saksi->joinKat_Saksi(),
            'joinKat_Surat' => $this->M_Saksi->joinKat_Surat(),
            // 'id_role'               => ['id_role']
        );
        $this->template->load('layout/template', 'panitia/saksi', $data);
    }

    function Tambah()
		{
			$this->M_Saksi->Tambah();
			redirect('panitia/saksi');
		}

    function Edit()
		{
			$this->M_Saksi->Edit();
			redirect('panitia/saksi');
		}

    function Hapus($id)
		{
			$this->M_Saksi->Hapus($id);
			redirect('panitia/saksi');
		}

    function vnonaktif()
    {
      $this->M_Saksi->vnonaktif();
			redirect('panitia/saksi');
    }

    function vaktif()
    {
      $this->M_Saksi->vaktif();
			redirect('panitia/saksi');
    }

}
