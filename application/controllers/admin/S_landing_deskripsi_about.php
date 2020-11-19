<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class S_landing_deskripsi_about extends MY_Controller
{
  public function __construct()
  {
      parent::__construct();
      $this->load->model('landing_pages/M_Deskripsi_about');

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
          'title'                 => 'Setting Landing Pages Deskripsi About | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
          'profile'               => $profile,
          'tampildata'            => $this->M_Deskripsi_about->tampildata(),
      );
      $this->template->load('layout/template', 'admin/landing_pages/s_landing_deskripsi_about', $data);
  }

  function Edit()
  {
    $namaarlets 	= $this->input->post('title');

    $this->M_Deskripsi_about->Edit();
    $this->session->set_flashdata('flash', '<div class="alert alert-warning">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Memperbarui Data Deskripsi About <strong>'.$namaarlets.'</strong>
    </div>');
    redirect('admin/s_landing_deskripsi_about');
  }
}
