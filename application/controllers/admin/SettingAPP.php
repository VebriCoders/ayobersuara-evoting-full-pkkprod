<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class SettingAPP extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
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
            'title'                 => 'Setting Aplikasi | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            // 'id_role'               => ['id_role']
            'tampilData' => $this->Konfigurasi_model->tampilData(),
        );
        $this->template->load('layout/template', 'admin/settingapp', $data);
    }


    function ubahData()
		{
			$this->Konfigurasi_model->ubahDataM();
      $this->session->set_flashdata('flash', '<div class="alert alert-success">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Memperbarui Setting Aplikasi Anda.
      </div>');
			// redirect
			redirect('admin/settingapp');
		}
}
