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
        $this->load->model('landing_pages/Home_Landing');
    }

    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $profile = $this->Konfigurasi_model->listinguser();
        $img_tagline = $this->Home_Landing->DataTagline_IMG();
        $Data_Social_Contact = $this->Home_Landing->Data_Social_Contact();
        $data = array(
            'title'     => $site['nama_website'].' | E-Voting',
            'favicon'   => $site['favicon'],
            'site'      => $site,
            'profile'   => $profile,
            'id_role'   => ['id_role'],
            'img_tagline' => $img_tagline,
            'tagline_active' => $this->Home_Landing->DataTagline_Active(),
            'tagline' => $this->Home_Landing->DataTagline(),
            'Data_About' => $this->Home_Landing->Data_About(),
            'Data_Fitur' => $this->Home_Landing->Data_Fitur(),
            'Data_Faq' => $this->Home_Landing->Data_Faq(),
            'Data_Testimoni' => $this->Home_Landing->Data_Testimoni(),
            'cns' => $Data_Social_Contact,
            'Data_SS' => $this->Home_Landing->Data_SS(),
            'Data_Team' => $this->Home_Landing->Data_Team(),
        );
        $this->load->view('landing_pages/landing_pages', $data);
    }

    function simpan_contact(){
        date_default_timezone_set("Asia/Bangkok");
        $nama=$this->input->post('nama');
        $email=$this->input->post('email');
        $no_hp=$this->input->post('no_hp');
        $subject=$this->input->post('subject');
        $pesan=$this->input->post('pesan');
        $tgl=date('Y-m-d  h:i:s a');
        $data=$this->Home_Landing->simpan_contact($nama,$email,$no_hp,$subject,$pesan,$tgl);
        echo json_encode($data);
    }
}
