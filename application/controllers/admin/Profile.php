<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Profile');

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
            'title'                 => 'Profile | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            'tampilProfil' => $this->M_Profile->tampilProfil(),
            // 'id_role'               => ['id_role']
        );
        $this->template->load('layout/template', 'admin/profile', $data);
    }

    function ubahProfile()
		{
			$this->M_Profile->ubahProfile();
      $this->session->set_flashdata('flash', '<div class="alert alert-warning">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Profile Anda Telah di Perbarui !</strong>
      </div>');
			// redirect
			redirect('admin/profile');
		}

    function Pswd()
    {
      $this->M_Profile->Pswd();
      $this->session->set_flashdata('flash', '<div class="alert alert-warning">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Password Anda Telah di Perbarui !</strong>
      </div>');
			redirect('admin/profile');
    }
}
