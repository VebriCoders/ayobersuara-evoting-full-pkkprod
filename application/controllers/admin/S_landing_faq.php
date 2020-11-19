<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class S_landing_faq extends MY_Controller
{
  public function __construct()
  {
      parent::__construct();
      $this->load->model('landing_pages/M_Faq');

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
          'title'                 => 'Setting Landing Pages FAQ | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
          'profile'               => $profile,
          'tampildata'            => $this->M_Faq->tampildata(),
      );
      $this->template->load('layout/template', 'admin/landing_pages/s_landing_faq', $data);
  }

  function Tambah()
  {
    $namaarlets 	= $this->input->post('pertanyaan');

    $this->M_Faq->Tambah();
    $this->session->set_flashdata('flash', '<div class="alert alert-success">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Menambahkan FAQ Baru <strong>'.$namaarlets.'</strong>
    </div>');
    redirect('admin/s_landing_faq');
  }

  function Edit()
  {
    $namaarlets 	= $this->input->post('pertanyaan');

    $this->M_Faq->Edit();
    $this->session->set_flashdata('flash', '<div class="alert alert-warning">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Merubah Data FAQ <strong>'.$namaarlets.'</strong>
    </div>');
    redirect('admin/s_landing_faq');
  }

  function Hapus($id)
  {
    $this->M_Faq->Hapus($id);
    $this->session->set_flashdata('flash', '<div class="alert alert-danger">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>Berhasil !</strong> Anda Telah Menghapus FAQ.
    </div>');
    redirect('admin/s_landing_faq');
  }

}
