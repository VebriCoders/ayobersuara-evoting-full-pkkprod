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
        $this->load->model('M_Hasi_Pemilihan');
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $profile = $this->Konfigurasi_model->listinguser();
        $tema = $this->M_Hasi_Pemilihan->getTemaActive()->result_array();
        // $site = $this->Konfigurasi_model->listinguser();
        $data = array(
            'title'                 => 'Data Pemilih | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            'tampilPemilih' => $this->M_Pemilih->tampilPemilih(),
            'joinKat_Pemilih' => $this->M_Pemilih->joinKat_Pemilih(),
            'jumlah_pemilih' => $this->M_Pemilih->jumlah_pemilih(),
            'tema'                  => $tema,
            // 'id_role'               => ['id_role']
        );
        $this->template->load('layout/template', 'admin/pemilih', $data);
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
        $this->template->load('layout/template', 'admin/pemilih', $data);
    }

    function Tambah()
		{
      $namaarlets 	= $this->input->post('nama_pemilih');

			$this->M_Pemilih->Tambah();
      $this->session->set_flashdata('flash', '<div class="alert alert-success">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Menambahkan Data Pemilih Baru <strong>'.$namaarlets.'</strong>
      </div>');
			redirect('admin/pemilih');
		}

    function Edit()
		{
      $namaarlets 	= $this->input->post('nama_pemilih');

			$this->M_Pemilih->Edit();
      $this->session->set_flashdata('flash', '<div class="alert alert-warning">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Memperbarui Data Pemilih <strong>'.$namaarlets.'</strong>
      </div>');
			redirect('admin/pemilih');
		}

    function Hapus($id)
		{
			$this->M_Pemilih->Hapus($id);
      $this->session->set_flashdata('flash', '<div class="alert alert-danger">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Menghapus Data Pemilih.
      </div>');
			redirect('admin/pemilih');
		}

    function verifikasi()
    {
      $namaarlets 	= $this->input->post('nama_pemilih');

      $this->M_Pemilih->verifikasi();
      $this->session->set_flashdata('flash', '<div class="alert alert-primary">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Menverifikasi Data Pemilih Dengan Nomor Pemilihan <strong>'.$namaarlets.'</strong>
      </div>');
			redirect('admin/pemilih');
    }
}
