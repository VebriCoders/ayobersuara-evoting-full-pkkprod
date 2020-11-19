<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Dashbpard');
        $this->check_login();
        if ($this->session->userdata('id_role') != "3") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $profile = $this->Konfigurasi_model->listinguser();
        // $site = $this->Konfigurasi_model->listinguser();
        $data = array(
            'title'     => 'Dashboard | '.$site['nama_website'],
            'favicon'   => $site['favicon'],
            'site'      => $site,
            'profile'               => $profile,
            'id_role'   => ['id_role'],
            'jumlah_pemilih' => $this->M_Dashbpard->jumlah_pemilih(),
            'jumlah_pemilihBelumMilih' => $this->M_Dashbpard->jumlah_pemilihBelumMilih(),
            'jumlah_pemilihSudahMilih' => $this->M_Dashbpard->jumlah_pemilihSudahMilih(),

        );
        $this->template->load('layout/template', 'panitia/dashboard', $data);
    }
}
