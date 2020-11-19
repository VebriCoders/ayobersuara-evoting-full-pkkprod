<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TemaModel extends CI_Model {

    public function showTema() {
        return $this->db->get('tbl_surat_suara');
    }

    public function insertTema($data) {
        return $this->db->insert('tbl_surat_suara', $data);
    }

    public function getTema($id) {
        return $this->db->get_where('tbl_surat_suara', array('id' => $id));
    }

    public function updateTema($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tbl_surat_suara', $data);
    }

    public function deleteTema($id) {
        return $this->db->delete('tbl_surat_suara', ['id' => $id]);
    }

    public function getTemaActive() {
        return $this->db->get_where('tbl_surat_suara', ['active_surat' => "1"]);
    }

    public function countTema() {
        $this->db->where('active_surat', "1");
        return $this->db->count_all_results('tbl_surat_suara');
    }
}
