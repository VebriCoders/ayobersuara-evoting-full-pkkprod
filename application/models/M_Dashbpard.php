<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Dashbpard extends CI_Model
{

  function jumlah_pemilih()
  {
    $this->db->Select('*')
         ->from('tbl_pemilih');
    $query = $this->db->get();
    return $query->num_rows();
  }

  function jumlah_pemilih_json($tbl){
        return $this->db->get($tbl);
    }


  function jumlah_pemilihBelumMilih()
  {
    $this->db->Select('*')
         ->from('tbl_pemilih')
         ->where('tbl_pemilih.status_memilih','0');
    $query = $this->db->get();
    return $query->num_rows();
  }
  function jumlah_pemilihSudahMilih()
  {
    $this->db->Select('*')
         ->from('tbl_pemilih')
         ->where('tbl_pemilih.status_memilih','1');
    $query = $this->db->get();
    return $query->num_rows();
  }
  function jumlah_pemilihaktif()
  {
    $this->db->Select('*')
         ->from('tbl_pemilih')
         ->where('tbl_pemilih.active','1');
    $query = $this->db->get();
    return $query->num_rows();
  }
  function jumlah_pemilihnonaktif()
  {
    $this->db->Select('*')
         ->from('tbl_pemilih')
         ->where('tbl_pemilih.active','0');
    $query = $this->db->get();
    return $query->num_rows();
  }
  function jumlah_pemilihver()
  {
    $this->db->Select('*')
         ->from('tbl_pemilih')
         ->where('tbl_pemilih.verifikasi_pemilih','1');
    $query = $this->db->get();
    return $query->num_rows();
  }

  function tampilsurat()
  {
    // $this->db->select('tbl_suara.*,tbl_surat_suara.nama_surat as namasurat')
    //          ->from('tbl_suara')
    //          ->join('tbl_surat_suara', 'tbl_suara.id_surat_suara = tbl_surat_suara.id')
    //          ->group_by('tbl_suara.id_surat_suara', 'ASC');
    $this->db->select('tbl_surat_suara.*, COUNT(id_surat_suara) as total_suara')
           ->from('tbl_surat_suara')
           ->join('tbl_suara', 'tbl_suara.id_surat_suara = tbl_surat_suara.id')
           ->where('tbl_surat_suara.active_surat', 1)
           ->group_by('tbl_suara.id_surat_suara')
           ->order_by('tbl_surat_suara.id', 'ASC');
   return $this->db->get();
   // return $query->num_rows();
  }

}
