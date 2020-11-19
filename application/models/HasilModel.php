<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilModel extends CI_Model {

    public function getPemilihHasil($tema, $pemilih) {
        return $this->db->get_where('tbl_suara', ['id' => $tema ,'id' => $pemilih]);
    }

    public function getCalon($id) {
        $this->db->where('jenis_pemilihan', $id);
        return $this->db->get_where('tbl_kandidat');
    }

    public function countPemilih($id) {
        return $this->db->get_where('tbl_suara', ['id' => $id])->num_rows();
    }

    public function getTemaInCalon($id) {
        $this->db->where('id', $id);
        return $this->db->get_where('tbl_kandidat');
    }

    public function insertSuara($data) {
        return $this->db->insert('tbl_suara', $data);
    }

    public function getPemilihInSuara($tema) {
        $this->db->select('*');
        $this->db->from('tbl_suara');
        $this->db->join('tbl_pemilih', 'tbl_pemilih.id = tbl_suara.id_pemilih');
        $this->db->join('tbl_kandidat', 'tbl_kandidat.id = tbl_suara.id_kandidat');
        // $this->db->join('tbl_kat_kandidat', 'tbl_kat_kandidat.id = tbl_kandidat.id');
        $this->db->join('tbl_surat_suara', 'tbl_surat_suara.id = tbl_suara.id_surat_suara');
        $this->db->where('tbl_suara.id_surat_suara', $tema);
        return $this->db->get();
    }

    public function getSaksiInSuara($saksi)
    {
      $this->db->select('*');
      $this->db->from('tbl_saksi');
      $this->db->join('tbl_surat_suara', 'tbl_saksi.saksi_pemilihan = tbl_surat_suara.id');
      $this->db->where('tbl_saksi.saksi_pemilihan', $saksi);
      return $this->db->get();
    }
}
