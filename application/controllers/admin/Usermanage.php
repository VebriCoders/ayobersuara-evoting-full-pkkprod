<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class Usermanage extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User_Role');

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
            'title'                 => 'User Management | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            'tampilUserRole' => $this->M_User_Role->tampilUserRole(),
            'joinRole' => $this->M_User_Role->joinRole(),
            // 'id_role'               => ['id_role']
        );
        $this->template->load('layout/template', 'admin/usermanage', $data);
    }

    public function CariData()
    {
        $site = $this->Konfigurasi_model->listing();
        $profile = $this->Konfigurasi_model->listinguser();
        // $site = $this->Konfigurasi_model->listinguser();
        $data = array(
            'title'                 => 'User Management | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            'tampilUserRole' => $this->M_User_Role->CariData(),
            'joinRole' => $this->M_User_Role->joinRole(),
            // 'id_role'               => ['id_role']
        );
        $this->template->load('layout/template', 'admin/usermanage', $data);
    }

    function Tambah()
		{
      $namaarlets 	= $this->input->post('first_name');
      $namaarletss 	= $this->input->post('last_name');
			$this->M_User_Role->Tambah();
      $this->session->set_flashdata('flash', '<div class="alert alert-success">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Menambahkan Data User Baru <strong>'.$namaarlets.'&nbsp'.$namaarletss.'</strong>
      </div>');
			redirect('admin/usermanage');
		}

    function Edit()
		{
      $namaarlets 	= $this->input->post('first_name');
      $namaarletss 	= $this->input->post('last_name');
			$this->M_User_Role->Edit();
      $this->session->set_flashdata('flash', '<div class="alert alert-warning">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Memperbarui Data User <strong>'.$namaarlets.'&nbsp'.$namaarletss.'</strong>
      </div>');
			redirect('admin/usermanage');
		}

    function Hapus($id)
		{
			$this->M_User_Role->Hapus($id);
      $this->session->set_flashdata('flash', '<div class="alert alert-danger">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Menghapus Data User.
      </div>');
			redirect('admin/usermanage');
		}

    function Pswd()
    {
      $namaarlets 	= $this->input->post('username');
      $this->M_User_Role->Pswd();
      $this->session->set_flashdata('flash', '<div class="alert alert-primary">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Mengubah Password User <strong>Username : '.$namaarlets.'</strong>
      </div>');
			redirect('admin/usermanage');
    }

    function vnonaktif()
    {
      $namaarlets 	= $this->input->post('username');
      $this->M_User_Role->vnonaktif();
      $this->session->set_flashdata('flash', '<div class="alert alert-primary">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Menonaktifkan User <strong>Username : '.$namaarlets.'</strong>
      </div>');
			redirect('admin/usermanage');
    }

    function vaktif()
    {
      $namaarlets 	= $this->input->post('username');
      $this->M_User_Role->vaktif();
      $this->session->set_flashdata('flash', '<div class="alert alert-primary">
          <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
          <strong>Berhasil !</strong> Anda Telah Mengaktifkan User <strong>Username : '.$namaarlets.'</strong>
      </div>');
			redirect('admin/usermanage');
    }

}
