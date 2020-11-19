<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class Hasilpemilihan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Hasi_Pemilihan');

        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $profile = $this->Konfigurasi_model->listinguser();
        $tema = $this->M_Hasi_Pemilihan->getTemaActive()->result_array();
        // $site = $this->Konfigurasi_model->listinguser();
        $data = array(
            'title'                 => 'Data Hasil Pemilihan | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            'tema'                  => $tema,
            'jumlah_pemilihaktif'   =>$this->M_Hasi_Pemilihan->jumlah_pemilihaktif(),
            // 'id_role'               => ['id_role']
        );
        $this->template->load('layout/template', 'admin/hasilpemilihan', $data);
    }

    public function detailSuara($id)
    {
        date_default_timezone_set("Asia/Bangkok");
        $site = $this->Konfigurasi_model->listing();
        $profile = $this->Konfigurasi_model->listinguser();
        $suara = $this->M_Hasi_Pemilihan->getSuara($id)->result_array();
        $tema = $this->M_Hasi_Pemilihan->getTema($id)->row_array();
        $count = $this->M_Hasi_Pemilihan->countPemilih($id);
        // echo "string".$suara['akhir_surat'];
        // print_r($suara);
        $data = array(
            'title'                 => 'Data Hasil Pemilihan | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'profile'               => $profile,
            'suara'                 => $suara,
            'tema'                  => $tema,
            'count'                 => $count,
            'jumlah_pemilihaktif'   =>$this->M_Hasi_Pemilihan->jumlah_pemilihaktif(),
            // 'id_role'               => ['id_role']
        );
        if(time() <= $tema['akhir_surat']) {
            echo "<meta http-equiv='refresh' content='1'>";
        } else {}

        $this->template->load('layout/template', 'admin/hasilpemilihan_detail', $data);
    }
}
