<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_saksi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kat_Saksi');

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
            'title'                 => 'Data Kategori Saksi | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            'tampilKatSaksi' => $this->M_Kat_Saksi->tampilKatSaksi(),
            // 'id_role'               => ['id_role']
        );
        $this->template->load('layout/template', 'admin/kategori_saksi', $data);
    }

    function Tambah()
		{
      $namaarlets 	= $this->input->post('nama_kategori');
			$this->M_Kat_Saksi->Tambah();
      $this->session->set_flashdata('flash', '<div class="alert alert-success">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Menambahkan Data Kategori Saksi Baru <strong>'.$namaarlets.'</strong>
      </div>');
			redirect('admin/kategori_saksi');
		}

    function Edit()
		{
      $namaarlets 	= $this->input->post('nama_kategori');
			$this->M_Kat_Saksi->Edit();
      $this->session->set_flashdata('flash', '<div class="alert alert-warning">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Memperbarui Data Kategori Saksi <strong>'.$namaarlets.'</strong>
      </div>');
			redirect('admin/kategori_saksi');
		}

    function Hapus($id)
		{
			$this->M_Kat_Saksi->Hapus($id);
      $this->session->set_flashdata('flash', '<div class="alert alert-danger">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Menghapus Data Kategori Saksi.
      </div>');
			redirect('admin/kategori_saksi');
		}
}
