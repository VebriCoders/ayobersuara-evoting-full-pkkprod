<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class S_landing_screenshots extends MY_Controller
{
  public function __construct()
  {
      parent::__construct();
      $this->load->model('landing_pages/M_Screenshot');

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
          'title'                 => 'Setting Landing Pages Screenshots | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
          'profile'               => $profile,
          'tampilData'            => $this->M_Screenshot->tampilData(),
      );
      $this->template->load('layout/template', 'admin/landing_pages/s_landing_screenshots', $data);
  }

  function Tambah()
  {
    $namaarlets 	= $this->input->post('title');

    $this->M_Screenshot->Tambah();
    $this->session->set_flashdata('flash', '<div class="alert alert-success">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Menambahkan Screenshots Baru <strong>'.$namaarlets.'</strong>
    </div>');
    redirect('admin/s_landing_screenshots');
  }

  function Edit()
  {
    $namaarlets 	= $this->input->post('title');

    $this->M_Screenshot->Edit();
    $this->session->set_flashdata('flash', '<div class="alert alert-warning">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Merubah Data Screenshots <strong>'.$namaarlets.'</strong>
    </div>');
    redirect('admin/s_landing_screenshots');
  }

  function Hapus($id)
  {
    $this->M_Screenshot->Hapus($id);
    $this->session->set_flashdata('flash', '<div class="alert alert-danger">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Menghapus Screenshots.
    </div>');
    redirect('admin/s_landing_screenshots');
  }
}
