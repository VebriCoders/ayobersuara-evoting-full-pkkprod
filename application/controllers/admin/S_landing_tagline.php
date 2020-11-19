<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class S_landing_tagline extends MY_Controller
{
  public function __construct()
  {
      parent::__construct();
      $this->load->model('landing_pages/M_Landing_Tagline');

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
          'title'                 => 'Setting Landing Pages Tagline | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
          'profile'               => $profile,
          'tampilTagline'         => $this->M_Landing_Tagline->tampilTagline(),
          'tampilTaglineImg'         => $this->M_Landing_Tagline->tampilTaglineImg(),
      );
      $this->template->load('layout/template', 'admin/landing_pages/s_landing_tagline', $data);
  }

  function Tambah()
  {
    $namaarlets 	= $this->input->post('tagline');

    $this->M_Landing_Tagline->Tambah();
    $this->session->set_flashdata('flash', '<div class="alert alert-success">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Menambah Tagline Baru <strong>'.$namaarlets.'</strong>
    </div>');

    redirect('admin/s_landing_tagline');
  }

  function Edit()
  {
    $namaarlets 	= $this->input->post('tagline');

    $this->M_Landing_Tagline->Edit();
    $this->session->set_flashdata('flash', '<div class="alert alert-warning">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Merubah Tagline <strong>'.$namaarlets.'</strong>
    </div>');

    redirect('admin/s_landing_tagline');
  }

  function Hapus($id)
  {
    $this->M_Landing_Tagline->Hapus($id);
    $this->session->set_flashdata('flash', '<div class="alert alert-danger">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Menghapus Tagline.
    </div>');
    redirect('admin/s_landing_tagline');
  }

  function Edit_Img()
  {
    $this->M_Landing_Tagline->Edit_Img();
    $this->session->set_flashdata('flash', '<div class="alert alert-warning">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Merubah Image Tagline
    </div>');

    redirect('admin/s_landing_tagline');
  }

  function Edit_Img_logo()
  {
    $this->M_Landing_Tagline->Edit_Img_logo();
    $this->session->set_flashdata('flash', '<div class="alert alert-warning">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Merubah Image Tagline
    </div>');

    redirect('admin/s_landing_tagline');
  }

}
