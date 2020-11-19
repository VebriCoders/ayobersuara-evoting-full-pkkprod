<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Deskripsi_about extends CI_Model
{
  function tampildata()
  {
      $this->db->select('tbl_s_landing_deskripsi_about.*,')
             ->from('tbl_s_landing_deskripsi_about')
             ->order_by('tbl_s_landing_deskripsi_about.id', 'ASC'); //DESC
     return $this->db->get();
   }

   function Edit()
   {
     date_default_timezone_set("Asia/Bangkok");

        $id 	= $this->input->post('id');
        $title	= $this->input->post('title');
    		$yt 	= $this->input->post('yt');
    		$deskripsi	= $this->input->post('deskripsi');

        $this->load->library('upload');
    		$nmfile ="$nama_saksi"."_".time();
    		$config['upload_path'] = 'assets/upload/images/landing_pages/deskripsi_about/';
    		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
    		$config['max_size'] = '5120';
    		$config['max_width'] = '4300';
    		$config['max_height'] = '4300';
    		$config['file_name'] = $nmfile;
    		$this->upload->initialize($config);

        if($_FILES['bg_photo']['name'])
    		{
    			if ($this->upload->do_upload('bg_photo'))
    			{
    					$gbr = $this->upload->data();
    					$data = array (
    						'title'	=>$title,
    						'yt'	=>$yt,
    						'deskripsi' =>$deskripsi,
    						'bg_photo' =>$gbr['file_name'],
                'created_on' => date('Y-m-d  h:i:s a'),
    					);
    					$this->db->where('id', $id)->update('tbl_s_landing_deskripsi_about', $data);
    			}
    		}
    		else{
    			$data = array (
            'title'	=>$title,
            'yt'	=>$yt,
            'deskripsi' =>$deskripsi,
            'created_on' => date('Y-m-d  h:i:s a'),
    			);
    			$this->db->where('id', $id)->update('tbl_s_landing_deskripsi_about', $data);
    		}
   }

}
