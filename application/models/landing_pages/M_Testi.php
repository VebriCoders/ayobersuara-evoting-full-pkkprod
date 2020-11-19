<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Testi extends CI_Model
{
  function tampilData()
  {
      $this->db->select('tbl_s_landing_testimonial.*,')
             ->from('tbl_s_landing_testimonial')
             ->order_by('tbl_s_landing_testimonial.id', 'ASC'); //DESC
     return $this->db->get();
   }

   function Tambah()
   {
       date_default_timezone_set("Asia/Bangkok");
        $nama 	= $this->input->post('nama');
        $testimoni 	= $this->input->post('testimoni');

        $this->load->library('upload');
    		$nmfile ="$nama"."_".time();
    		$config['upload_path'] = 'assets/upload/images/landing_pages/testimoni_client/';
    		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
    		$config['max_size'] = '5120';
    		$config['max_width'] = '4300';
    		$config['max_height'] = '4300';
    		$config['file_name'] = $nmfile;
    		$this->upload->initialize($config);

        if($_FILES['photo']['name'])
    		{
    			if ($this->upload->do_upload('photo'))
    			{
    					$gbr = $this->upload->data();
    					$data = array (
    						'nama'	=>$nama,
    						'testimoni'	=>$testimoni,
    						'photo' =>$gbr['file_name'],
                'created_on' => date('Y-m-d  h:i:s a'),
    					);
    					$this->db->insert('tbl_s_landing_testimonial', $data);
    			}
    		}
    		else{
    			$gbr = $this->upload->data();
    			$data = array (
            'nama'	=>$nama,
            'testimoni'	=>$testimoni,
            'photo' =>'default.jpg',
            'created_on' => date('Y-m-d  h:i:s a'),
    			);
    			$this->db->insert('tbl_s_landing_testimonial', $data);
    		}
   }

   function Edit()
   {
       date_default_timezone_set("Asia/Bangkok");
        $id 	= $this->input->post('id');
        $nama 	= $this->input->post('nama');
        $testimoni 	= $this->input->post('testimoni');

        $this->load->library('upload');
    		$nmfile ="$nama"."_".time();
    		$config['upload_path'] = 'assets/upload/images/landing_pages/testimoni_client/';
    		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
    		$config['max_size'] = '5120';
    		$config['max_width'] = '4300';
    		$config['max_height'] = '4300';
    		$config['file_name'] = $nmfile;
    		$this->upload->initialize($config);

        if($_FILES['photo']['name'])
    		{
    			if ($this->upload->do_upload('photo'))
    			{
    					$gbr = $this->upload->data();
    					$data = array (
    						'nama'	=>$nama,
    						'testimoni'	=>$testimoni,
    						'photo' =>$gbr['file_name'],
    					);
            $this->db->where('id', $id)->update('tbl_s_landing_testimonial', $data);
    			}
    		}
    		else{
    			$gbr = $this->upload->data();
    			$data = array (
            'nama'	=>$nama,
            'testimoni'	=>$testimoni,
    			);
    			$this->db->where('id', $id)->update('tbl_s_landing_testimonial', $data);
    		}
   }

   function Hapus($id)
   {
     $this->db->where('id', $id)->delete('tbl_s_landing_testimonial');
   }

}
