<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Contact_app extends CI_Model
{
  function tampilData()
  {
      $this->db->select('tbl_s_landing_social_contact.*,')
             ->from('tbl_s_landing_social_contact')
             ->order_by('tbl_s_landing_social_contact.id', 'ASC'); //DESC
     return $this->db->get();
   }

   function Edit()
   {
        date_default_timezone_set("Asia/Bangkok");
        $id 	= $this->input->post('id');
        $email	= $this->input->post('email');
    		$no_telp 	= $this->input->post('no_telp');
        $alamat 	= $this->input->post('alamat');
        $g_maps 	= $this->input->post('g_maps');
        $web 	= $this->input->post('web');
        $fb 	= $this->input->post('fb');
        $tw 	= $this->input->post('tw');
        $ig 	= $this->input->post('ig');
        $yt 	= $this->input->post('yt');
        $path 	= $this->input->post('path');
        $g_plus 	= $this->input->post('g_plus');

    			$data = array (
            'email'	=>$email,
            'no_telp'	=>$no_telp,
            'alamat' =>$alamat,
            'g_maps' =>$g_maps,
            'web' =>$web,
            'fb' =>$fb,
            'tw' =>$tw,
            'ig' =>$ig,
            'yt' =>$yt,
            'path' =>$path,
            'g_plus' =>$g_plus,
            'created_on' => date('Y-m-d  h:i:s a'),
    			);
          $this->db->where('id', $id)->update('tbl_s_landing_social_contact', $data);
   }

}
