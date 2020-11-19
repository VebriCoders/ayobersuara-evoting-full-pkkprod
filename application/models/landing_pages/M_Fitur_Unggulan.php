<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Fitur_Unggulan extends CI_Model
{
  function tampilData()
  {
      $this->db->select('tbl_s_landing_fitur_unggulan.*,')
             ->from('tbl_s_landing_fitur_unggulan')
             ->order_by('tbl_s_landing_fitur_unggulan.id', 'ASC'); //DESC
     return $this->db->get();
   }

   function Edit()
   {
        date_default_timezone_set("Asia/Bangkok");
        $id 	= $this->input->post('id');
        $title	= $this->input->post('title');
    		$deskripsi 	= $this->input->post('deskripsi');
        $icon 	= $this->input->post('icon');

    			$data = array (
            'title'	=>$title,
            'deskripsi'	=>$deskripsi,
            'icon' =>$icon,
            'created_on' => date('Y-m-d  h:i:s a'),
    			);
          $this->db->where('id', $id)->update('tbl_s_landing_fitur_unggulan', $data);
   }

}
