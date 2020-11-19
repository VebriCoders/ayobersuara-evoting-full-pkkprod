<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class S_landing_contact extends MY_Controller
{
  public function __construct()
  {
      parent::__construct();
      $this->load->model('landing_pages/M_contact_use');

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
          'title'                 => 'Setting Landing Pages Contact Use | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
          'profile'               => $profile,
          'tampilData'            => $this->M_contact_use->tampilData(),
      );
      $this->template->load('layout/template', 'admin/landing_pages/s_landing_contact', $data);
  }

  function Tambah()
  {
    $namaarlets 	= $this->input->post('nama');
    $this->M_contact_use->Tambah();
    $this->session->set_flashdata('flash', '<div class="alert alert-success">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Menambahkan Contact Use Baru <strong>'.$namaarlets.'</strong>
    </div>');
    redirect('admin/s_landing_contact');
  }

  function Edit()
  {
    $namaarlets 	= $this->input->post('nama');
    $this->M_contact_use->Edit();
    $this->session->set_flashdata('flash', '<div class="alert alert-warning">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Merubah Data Contact Use <strong>'.$namaarlets.'</strong>
    </div>');
    redirect('admin/s_landing_contact');
  }

  function Hapus($id)
  {
    $this->M_contact_use->Hapus($id);
    $this->session->set_flashdata('flash', '<div class="alert alert-danger">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Menghapus Contact Use.
    </div>');
    redirect('admin/s_landing_contact');
  }

}
