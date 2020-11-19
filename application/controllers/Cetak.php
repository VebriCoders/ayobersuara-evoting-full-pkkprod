<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./assets/excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet;

class Cetak extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_Hasi_Pemilihan');
    $this->load->model('M_Jenis_Pemilihan_Suara');
    $this->load->model('M_Pemilih');
    $this->load->model('HasilModel');
    $this->load->model('M_Saksi');
    $this->load->model('M_Kandidat');
  }

  public function cetakSuara($id)
  {
    $this->load->library('mypdf');

    //Get Data
    date_default_timezone_set("Asia/Bangkok");
    $site = $this->Konfigurasi_model->listing();
    $profile = $this->Konfigurasi_model->listinguser();
    $suara = $this->M_Hasi_Pemilihan->getSuara($id)->result_array();
    $tema = $this->M_Hasi_Pemilihan->getTema($id)->row_array();
    $count = $this->M_Hasi_Pemilihan->countPemilih($id);
    $saksi = $this->HasilModel->getSaksiInSuara($id)->result_array();
    //Buat Array
    $data = array(
      'title'                 => 'Data Hasil Pemilihan | ' . $site['nama_website'],
      'favicon'               => $site['favicon'],
      'site'                  => $site,
      'profile'               => $profile,
      'suara'                 => $suara,
      'tema'                  => $tema,
      'count'                 => $count,
      'saksi'                 => $saksi,
      'jumlah_pemilihaktif'   => $this->M_Hasi_Pemilihan->jumlah_pemilihaktif(),
      // 'id_role'               => ['id_role']
    ); //Array end
    $this->mypdf->generate('Laporan/dompdf_totalsuara', $data, 'Laporan Hasil Surat Suara - ' . $tema['nama_surat'] . ' (' . date('d-m-Y') . ')', 'A4', 'landscape');
  }

  public function cetakPemilihInSuara($id)
  {
    $this->load->library('mypdf');

    date_default_timezone_set("Asia/Bangkok");
    $site = $this->Konfigurasi_model->listing();
    $pemilih = $this->HasilModel->getPemilihInSuara($id)->result_array();
    $tema = $this->M_Hasi_Pemilihan->getTema($id)->row_array();
    $saksi = $this->HasilModel->getSaksiInSuara($id)->result_array();

    $data = array(
      'title'                 => 'Data Pemilih | ' . $site['nama_website'],
      'favicon'               => $site['favicon'],
      'site'                  => $site,
      'pemilih'               => $pemilih,
      'tema'                  => $tema,
      'saksi'                 => $saksi,
    );
    $this->mypdf->generate('Laporan/dompdf_suarapemilih', $data, 'Laporan Pemilih Surat Suara - ' . $tema['nama_surat'] . ' (' . date('d-m-Y') . ')', 'A4', 'landscape');
  }

  public function cetakSaksi()
  {
    $this->load->library('mypdf');
    date_default_timezone_set("Asia/Bangkok");
    $site = $this->Konfigurasi_model->listing();
    $saksi = $this->M_Saksi->getSaksiPrint()->result_array();
    $data = array(
      'title'                 => 'Data Pemilih | ' . $site['nama_website'],
      'favicon'               => $site['favicon'],
      'site'                  => $site,
      // 'tampilSaksi'           => $this->M_Saksi->tampilSaksi(),
      'saksi'                 => $saksi,
    );
    $this->mypdf->generate('Laporan/dompdf_saksi', $data, 'Daftar Saksi - ' . $site['nama_website'] . ' (' . date('d-m-Y') . ')', 'A4', 'portrait');
  }

  public function cetakPemilih()
  {
    $this->load->library('mypdf');
    date_default_timezone_set("Asia/Bangkok");
    $site = $this->Konfigurasi_model->listing();
    $pemilih = $this->M_Pemilih->getPemilihPrint()->result_array();
    $data = array(
      'title'                 => 'Data Pemilih | ' . $site['nama_website'],
      'favicon'               => $site['favicon'],
      'site'                  => $site,
      'pemilih'               => $pemilih,
    );
    $this->mypdf->generate('Laporan/dompdf_pemilih', $data, 'Daftar Pemilih - ' . $site['nama_website'] . ' (' . date('d-m-Y') . ')', 'Legal', 'landscape');
  }

  public function cetakSuratSuara($id)
  {
    $this->load->library('mypdf');
    date_default_timezone_set("Asia/Bangkok");
    $site = $this->Konfigurasi_model->listing();
    $tema = $this->M_Jenis_Pemilihan_Suara->cetakSurat($id)->row_array();
    $saksi = $this->HasilModel->getSaksiInSuara($id)->result_array();
    $data = array(
      'title'                 => 'Data Pemilih | ' . $site['nama_website'],
      'favicon'               => $site['favicon'],
      'site'                  => $site,
      'tema'                  => $tema,
      'saksi'                 => $saksi,
    );
    $this->mypdf->generate('Laporan/dompdf_cetaksuratsuara', $data, 'Pemilihan Suara - ' . $tema['nama_surat'] . ' (' . date('d-m-Y') . ')', 'A4', 'portrait');
  }

  public function cetakKandidat($id)
  {
    $this->load->library('mypdf');
    date_default_timezone_set("Asia/Bangkok");
    $site = $this->Konfigurasi_model->listing();
    $kandidat = $this->M_Kandidat->cetakKandidat($id)->result_array();
    $data = array(
      'title'                 => 'Data Pemilih | ' . $site['nama_website'],
      'favicon'               => $site['favicon'],
      'site'                  => $site,
      'kandidat'              => $kandidat,
    );
    $this->mypdf->generate('Laporan/dompdf_cetakposterkandidat', $data, 'Poster Kandidat - ' . $site['nama_website'] . ' (' . date('d-m-Y') . ')', 'Legal', 'portrait');
  }
}
