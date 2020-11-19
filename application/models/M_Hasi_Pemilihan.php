<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Hasi_Pemilihan extends CI_Model
{
  public function getSuara($id) {
        $this->db->where('jenis_pemilihan', $id);
        return $this->db->get('tbl_kandidat');
    }

    public function getTemaActive() {
        return $this->db->get_where('tbl_surat_suara', ['active_surat' => "1"]);
    }

    public function getTema($id) {
        return $this->db->get_where('tbl_surat_suara', ['id' => $id]);
    }

    public function countPemilih($id) {
        $this->db->where('id_surat_suara', $id);
        return $this->db->count_all_results('tbl_suara');
    }

    public function countPemilihAll() {
        return $this->db->count_all_results('tbl_pemilih');
    }

    function jumlah_pemilihaktif()
    {
      $this->db->Select('*')
           ->from('tbl_pemilih')
           ->where('tbl_pemilih.active','1');
      $query = $this->db->get();
      return $query->num_rows();
    }

    function tampilBerdasarkanJamchart($waktu)
      {
        $query = "SELECT id_surat_suara, created_on , HOUR(created_on) as jam
                  FROM `tbl_suara` WHERE HOUR(created_on) = '$waktu'";
        return $this->db->query($query);
      }

}
