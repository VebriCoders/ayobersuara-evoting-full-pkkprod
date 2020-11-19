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
            'title'                 => 'Data Saksi | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            'tampilSaksi' => $this->M_Saksi->tampilSaksi(),
            'joinKat_Saksi' => $this->M_Saksi->joinKat_Saksi(),
            'joinKat_Surat' => $this->M_Saksi->joinKat_Surat(),
            // 'id_role'               => ['id_role']
        );
        $this->template->load('layout/template', 'admin/saksi', $data);
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
        $this->template->load('layout/template', 'admin/saksi', $data);
    }

    function Tambah()
		{
      $namaarlets 	= $this->input->post('nama_saksi');

			$this->M_Saksi->Tambah();
      $this->session->set_flashdata('flash', '<div class="alert alert-success">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Menambahkan Data Saksi Baru <strong>'.$namaarlets.'</strong>
      </div>');
			redirect('admin/saksi');
		}

    function Edit()
		{
      $namaarlets 	= $this->input->post('nama_saksi');

			$this->M_Saksi->Edit();
      $this->session->set_flashdata('flash', '<div class="alert alert-warning">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Memperbarui Data Saksi <strong>'.$namaarlets.'</strong>
      </div>');
			redirect('admin/saksi');
		}

    function Hapus($id)
		{
			$this->M_Saksi->Hapus($id);
      $this->session->set_flashdata('flash', '<div class="alert alert-danger">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Menghapus Data Saksi.
      </div>');
			redirect('admin/saksi');
		}

    function vnonaktif()
    {
      $namaarlets 	= $this->input->post('nama_saksi');

      $this->M_Saksi->vnonaktif();
      $this->session->set_flashdata('flash', '<div class="alert alert-primary">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Menonaktifkan Saksi <strong>'.$namaarlets.'</strong>
      </div>');
			redirect('admin/saksi');
    }

    function vaktif()
    {
      $namaarlets 	= $this->input->post('nama_saksi');

      $this->M_Saksi->vaktif();
      $this->session->set_flashdata('flash', '<div class="alert alert-primary">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Mengaktifkan Saksi <strong>'.$namaarlets.'</strong>
      </div>');
			redirect('admin/saksi');
    }

}
