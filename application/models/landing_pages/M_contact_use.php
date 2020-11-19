<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_contact_use extends CI_Model
{
  function tampilData()
  {
      $this->db->select('tbl_s_landing_contact.*,')
             ->from('tbl_s_landing_contact')
             ->order_by('tbl_s_landing_contact.id', 'ASC'); //DESC
     return $this->db->get();
   }

   function Tambah()
   {
        date_default_timezone_set("Asia/Bangkok");
        $nama	= $this->input->post('nama');
    		$email 	= $this->input->post('email');
        $no_hp 	= $this->input->post('no_hp');
        $subject 	= $this->input->post('subject');
        $pesan 	= $this->input->post('pesan');

    			$data = array (
            'nama'	=>$nama,
            'email'	=>$email,
            'no_hp' =>$no_hp,
            'subject' =>$subject,
            'pesan' =>$pesan,
            'created_on' => date('Y-m-d  h:i:s a'),
    			);
    			$this->db->insert('tbl_s_landing_contact', $data);
   }

   function Edit()
   {
        date_default_timezone_set("Asia/Bangkok");
        $id	= $this->input->post('id');
        $nama	= $this->input->post('nama');
    		$email 	= $this->input->post('email');
        $no_hp 	= $this->input->post('no_hp');
        $subject 	= $this->input->post('subject');
        $pesan 	= $this->input->post('pesan');

    			$data = array (
            'nama'	=>$nama,
            'email'	=>$email,
            'no_hp' =>$no_hp,
            'subject' =>$subject,
            'pesan' =>$pesan,
    			);
          $this->db->where('id', $id)->update('tbl_s_landing_contact', $data);
   }

   function Hapus($id)
   {
     $this->db->where('id', $id)->delete('tbl_s_landing_contact');
   }
}
