<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilih_Model extends CI_Model
{
  function tampilProfil()
  {
      $this->db->select('tbl_pemilih.*,')
             ->from('tbl_pemilih')
             ->where('tbl_pemilih.nomor_pemilih', $this->session->userdata('nomor_pemilih') )
             ->order_by('tbl_pemilih.nomor_pemilih', 'ASC'); //DESC
     return $this->db->get();
   }

  public function datapemilih() {
      $this->db->select('*');
      $this->db->from('tbl_pemilih');
      $this->db->where('tbl_pemilih.nomor_pemilih', $this->session->userdata('nomor_pemilih') );
      $query = $this->db->get();
      return $query->row_array();
  }


  function suaraSaya()
  {
    $this->db->select('tbl_pemilih.*, COUNT(id_pemilih) as suaraSayaBray')
           ->from('tbl_pemilih')
           ->join('tbl_suara', 'tbl_suara.id_pemilih = tbl_pemilih.id')
           ->where('tbl_pemilih.nomor_pemilih', $this->session->userdata('nomor_pemilih'))
           ->group_by('tbl_suara.id_pemilih')
           ->order_by('tbl_pemilih.id', 'ASC');
   return $this->db->get();
   // return $query->num_rows();
  }

  function BuatAktifSesi($sesiaktif)
  {
    $this->db->where('nomor_pemilih', $this->session->userdata('nomor_pemilih'))->update('tbl_pemilih', $sesiaktif);
  }

}
