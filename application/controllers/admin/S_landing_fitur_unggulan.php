<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class S_landing_fitur_unggulan extends MY_Controller
{
  public function __construct()
  {
      parent::__construct();
      $this->load->model('landing_pages/M_Fitur_Unggulan');

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
          'title'                 => 'Setting Landing Pages Fitur Unggulan | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
          'profile'               => $profile,
          'tampilData'            => $this->M_Fitur_Unggulan->tampilData(),
      );
      $this->template->load('layout/template', 'admin/landing_pages/s_landing_fitur_unggulan', $data);
  }

  function Edit()
  {
    $namaarlets 	= $this->input->post('title');

    $this->M_Fitur_Unggulan->Edit();
    $this->session->set_flashdata('flash', '<div class="alert alert-warning">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Memperbarui Data Fitur Unggulan <strong>'.$namaarlets.'</strong>
    </div>');
    redirect('admin/s_landing_fitur_unggulan');
  }
}
