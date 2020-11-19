<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class Memilih extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TemaModel');
        $this->load->model('HasilModel');
        $this->load->model('Pemilih_Model');
        $this->load->model('M_kandidat');

        $this->user['user'] = $this->db->get_where('tbl_pemilih', ['nomor_pemilih'  => $this->session->userdata('nomor_pemilih')])->row_array();
        if($this->user['user'] == "") {
            redirect('Auth_pemilih', 'refresh');
        }
    }

    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $datapemilih = $this->Pemilih_Model->datapemilih();
        $tema = $this->TemaModel->getTemaActive()->result_array();
        $countTema = $this->TemaModel->countTema();
        // echo "string".$datapemilih['id'];
        $hasilCount = $this->HasilModel->countPemilih($datapemilih['id']);
        $data = array(
            'title'     => 'Dashboard | '.$site['nama_website'],
            'favicon'   => $site['favicon'],
            'site'      => $site,
            'datapemilih' => $datapemilih,
            'tema' => $tema,
            'countTema' => $countTema,
            'hasilCount' => $hasilCount,

        );
        $this->template->load('layout/template_pemilih', 'pemilih/memilih', $data);
    }

    public function pemilihMemilih($id) {
          $site = $this->Konfigurasi_model->listing();
          $datapemilih = $this->Pemilih_Model->datapemilih();
          $tema = $this->TemaModel->getTema($id)->row_array();
          $calon = $this->HasilModel->getCalon($id)->result_array();
          // echo "string".$datapemilih['id'];
          $hasilCount = $this->HasilModel->countPemilih($datapemilih['id']);
          $data = array(
              'title'     => 'Dashboard | '.$site['nama_website'],
              'favicon'   => $site['favicon'],
              'site'      => $site,
              'datapemilih' => $datapemilih,
              'tema' => $tema,
              'calon' => $calon,
          );
          $this->template->load('layout/template_pemilih', 'pemilih/memilihkandidat', $data);
    }

    public function memilih($id) {
      date_default_timezone_set("Asia/Bangkok");
        $ketua = $this->M_kandidat->getKetua($id)->row_array();
        $suara = $ketua['jumlah_suara'] + 1;

        $this->db->where('id', $id);
        $this->db->update('tbl_kandidat', ['jumlah_suara' => $suara]);

        $datapemilih = $this->Pemilih_Model->datapemilih();
        $hasil = $this->HasilModel->getTemaInCalon($id)->row_array();
        $pemilih_id = $datapemilih['id'];
        $ketua_id = $id;
        $tema_id = $hasil['jenis_pemilihan'];

        $obj = [
            'id_pemilih' => $pemilih_id,
            'id_surat_suara' => $tema_id,
            'id_kandidat' => $id,
            'created_on' =>date('Y-m-d  H:i:s'),
        ];

        $this->HasilModel->insertSuara($obj);



        $this->db->where('nomor_pemilih', $this->user['user']['nomor_pemilih']);
        $this->db->update('tbl_pemilih', ['status_memilih' => "1"]);

        redirect('pemilih/memilih', 'referesh');
        // $this->session->set_flashdata('berhasil', 'Anda Sudah Berhasil Memilih');
        // $this->_logout();
    }

}
