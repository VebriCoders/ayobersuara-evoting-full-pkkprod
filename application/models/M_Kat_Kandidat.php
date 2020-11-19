<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Kat_Kandidat extends CI_Model
{

  function tampilKatKandidat()
  {
      $this->db->select('tbl_kat_kandidat.*,')
             ->from('tbl_kat_kandidat')
             // ->join('tbl_role', 'tbl_user.id_role = tbl_role.id')
             // ->where('tbl_user.id_setidting_outlet', $id_outlet )
             ->order_by('tbl_kat_kandidat.id', 'ASC'); //DESC
     return $this->db->get();
   }

   function Tambah()
   {
        date_default_timezone_set("Asia/Bangkok");
        $nama_kategori	= $this->input->post('nama_kategori');
    		$keterangan_kategori 	= $this->input->post('keterangan_kategori');
        $active 	= $this->input->post('active');

    			$data = array (
            'nama_kategori'	=>$nama_kategori,
            'keterangan_kategori'	=>$keterangan_kategori,
            'active' =>$active,
            'created_on' => date('Y-m-d  h:i:s a'),
    			);
    			$this->db->insert('tbl_kat_kandidat', $data);
   }

   function Edit()
   {
        date_default_timezone_set("Asia/Bangkok");
        $id 	= $this->input->post('id');
        $nama_kategori	= $this->input->post('nama_kategori');
    		$keterangan_kategori 	= $this->input->post('keterangan_kategori');
        $active 	= $this->input->post('active');

    			$data = array (
            'nama_kategori'	=>$nama_kategori,
            'keterangan_kategori'	=>$keterangan_kategori,
            'active' =>$active,
            'created_on' => date('Y-m-d  h:i:s a'),
    			);
          $this->db->where('id', $id)->update('tbl_kat_kandidat', $data);
   }

   function Hapus($id)
   {
     $this->db->where('id', $id)->delete('tbl_kat_kandidat');
   }

}
