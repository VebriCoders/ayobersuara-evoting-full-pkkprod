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
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
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

        );
        $this->template->load('layout/template', 'kandidat/dashboard', $data);
    }
}
