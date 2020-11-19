<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Faq extends CI_Model
{
  function tampildata()
  {
      $this->db->select('tbl_s_landing_faq.*,')
             ->from('tbl_s_landing_faq')
             ->order_by('tbl_s_landing_faq.id', 'ASC'); //DESC
     return $this->db->get();
   }

   function Tambah()
   {
        date_default_timezone_set("Asia/Bangkok");
        $pertanyaan	= $this->input->post('pertanyaan');
    		$solusi 	= $this->input->post('solusi');

    			$data = array (
            'pertanyaan'	=>$pertanyaan,
            'solusi'	=>$solusi,
            'created_on' => date('Y-m-d  h:i:s a'),
    			);
    			$this->db->insert('tbl_s_landing_faq', $data);
   }

   function Edit()
   {
        date_default_timezone_set("Asia/Bangkok");
        $id	= $this->input->post('id');
        $pertanyaan	= $this->input->post('pertanyaan');
    		$solusi 	= $this->input->post('solusi');

    			$data = array (
            'pertanyaan'	=>$pertanyaan,
            'solusi'	=>$solusi,
    			);
    			$this->db->where('id', $id)->update('tbl_s_landing_faq', $data);
   }

   function Hapus($id)
   {
     $this->db->where('id', $id)->delete('tbl_s_landing_faq');
   }
}
