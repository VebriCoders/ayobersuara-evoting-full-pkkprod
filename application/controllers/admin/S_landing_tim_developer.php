<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class S_landing_tim_developer extends MY_Controller
{
  public function __construct()
  {
      parent::__construct();
      $this->load->model('landing_pages/M_Tim');

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
          'title'                 => 'Setting Landing Pages Tim Developer | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
          'profile'               => $profile,
          'tampilData'            => $this->M_Tim->tampilData(),
      );
      $this->template->load('layout/template', 'admin/landing_pages/s_landing_tim_developer', $data);
  }

  public function CariData()
  {
      $site = $this->Konfigurasi_model->listing();
      $profile = $this->Konfigurasi_model->listinguser();
      // $site = $this->Konfigurasi_model->listinguser();
      $data = array(
          'title'                 => 'Setting Landing Pages Tim Developer | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
          'profile'               => $profile,
          'tampilData'            => $this->M_Tim->CariData(),
      );
      $this->template->load('layout/template', 'admin/landing_pages/s_landing_tim_developer', $data);
  }

  function Tambah()
  {
    $namaarlets 	= $this->input->post('nama');
    $this->M_Tim->Tambah();
    $this->session->set_flashdata('flash', '<div class="alert alert-success">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Menambahkan Data Tim Developer Baru <strong>'.$namaarlets.'</strong>
    </div>');

    redirect('admin/s_landing_tim_developer');
  }

  function Edit()
  {
    $namaarlets 	= $this->input->post('nama');
    $this->M_Tim->Edit();
    $this->session->set_flashdata('flash', '<div class="alert alert-warning">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Memperbarui Data Tim Developer <strong>'.$namaarlets.'</strong>
    </div>');

    redirect('admin/s_landing_tim_developer');
  }

  function Hapus($id)
  {
    $this->M_Tim->Hapus($id);
    $this->session->set_flashdata('flash', '<div class="alert alert-danger">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Menghapus Data Tim Developer.
    </div>');
    redirect('admin/s_landing_tim_developer');
  }
}
