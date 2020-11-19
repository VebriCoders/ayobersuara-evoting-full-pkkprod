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
            'title'                 => 'Data Kandidat | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            'tampilKandidat' => $this->M_Kandidat->tampilKandidat(),
            'joinKat_Kandidat' => $this->M_Kandidat->joinKat_Kandidat(),
            'joinKat_Surat' => $this->M_Kandidat->joinKat_Surat(),
            // 'id_role'               => ['id_role']
        );
        $this->template->load('layout/template', 'admin/kandidat', $data);
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
        $this->template->load('layout/template', 'admin/kandidat', $data);
    }

    function Tambah()
		{
      $namaarlets 	= $this->input->post('nama_kandidat');

			$this->M_Kandidat->Tambah();
      $this->session->set_flashdata('flash', '<div class="alert alert-success">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Menambahkan Data Kandidat Baru <strong>'.$namaarlets.'</strong>
      </div>');
			redirect('admin/kandidat');
		}

    function Edit()
		{
      $namaarlets 	= $this->input->post('nama_kandidat');

			$this->M_Kandidat->Edit();
      $this->session->set_flashdata('flash', '<div class="alert alert-warning">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Memperbarui Data Kandidat <strong>'.$namaarlets.'</strong>
      </div>');
			redirect('admin/kandidat');
		}

    function Hapus($id)
		{
			$this->M_Kandidat->Hapus($id);
      $this->session->set_flashdata('flash', '<div class="alert alert-danger">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Menghapus Data Kandidat.
      </div>');
			redirect('admin/kandidat');
		}
}
