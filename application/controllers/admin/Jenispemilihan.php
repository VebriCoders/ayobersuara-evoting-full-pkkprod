<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class Jenispemilihan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Jenis_Pemilihan_Suara');

        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $profile = $this->Konfigurasi_model->listinguser();
        // $site = $this->Konfigurasi_model->listinguser();
        $data = array(
            'title'                 => 'Data Jenis Pemilihan | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            'tampilSuratSuara' => $this->M_Jenis_Pemilihan_Suara->tampilSuratSuara(),
            // 'id_role'               => ['id_role']
        );
        $this->template->load('layout/template', 'admin/jenispemilihan', $data);
    }

    public function CariData()
    {
        $site = $this->Konfigurasi_model->listing();
        $profile = $this->Konfigurasi_model->listinguser();
        // $site = $this->Konfigurasi_model->listinguser();
        $data = array(
            'title'                 => 'Data Jenis Pemilihan | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            'tampilSuratSuara' => $this->M_Jenis_Pemilihan_Suara->CariData(),
            // 'id_role'               => ['id_role']
        );
        $this->template->load('layout/template', 'admin/jenispemilihan', $data);
    }

    function Tambah()
		{
      $namaarlets 	= $this->input->post('nama_surat');
			$this->M_Jenis_Pemilihan_Suara->Tambah();
      $this->session->set_flashdata('flash', '<div class="alert alert-success">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Menambahkan Data Surat Suara Baru <strong>'.$namaarlets.'</strong>
      </div>');
			redirect('admin/jenispemilihan');
		}

    function Edit()
		{
      $namaarlets 	= $this->input->post('nama_surat');
			$this->M_Jenis_Pemilihan_Suara->Edit();
      $this->session->set_flashdata('flash', '<div class="alert alert-warning">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Memperbarui Data Surat Suara <strong>'.$namaarlets.'</strong>
      </div>');
			redirect('admin/jenispemilihan');
		}

    function Hapus($id)
		{
			$this->M_Jenis_Pemilihan_Suara->Hapus($id);
      $this->session->set_flashdata('flash', '<div class="alert alert-danger">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Menghapus Surat Suara.
      </div>');
			redirect('admin/jenispemilihan');
		}
}
