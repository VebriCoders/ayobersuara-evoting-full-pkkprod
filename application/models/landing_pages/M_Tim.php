<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Tim extends CI_Model
{
  function tampilData()
  {
      $this->db->select('tbl_s_landing_tim_developer.*,')
             ->from('tbl_s_landing_tim_developer')
             ->order_by('tbl_s_landing_tim_developer.id', 'ASC'); //DESC
     return $this->db->get();
   }

   function CariData()
   {
       $nama 	= $this->input->post('nama');
       $this->db->select('tbl_s_landing_tim_developer.*,')
              ->from('tbl_s_landing_tim_developer')
              ->like('tbl_s_landing_tim_developer.nama', $nama)
              ->order_by('tbl_s_landing_tim_developer.id', 'ASC'); //DESC
      return $this->db->get();
    }

   function Tambah()
   {
     date_default_timezone_set("Asia/Bangkok");

        $nama 	= $this->input->post('nama');
    		$tagline 	= $this->input->post('tagline');
    		$deskripsi 	= $this->input->post('deskripsi');
        $email 	= $this->input->post('email');
        $hp 	= $this->input->post('hp');
        $fb 	= $this->input->post('fb');
        $ig 	= $this->input->post('ig');
        $yt 	= $this->input->post('yt');
        $tw 	= $this->input->post('tw');
        $skill_codeigniter 	= $this->input->post('skill_codeigniter');
        $skill_laravel 	= $this->input->post('skill_laravel');
        $skill_desain 	= $this->input->post('skill_desain');
        $skill_php 	= $this->input->post('skill_php');
        $skill_html 	= $this->input->post('skill_html');
        $skill_css 	= $this->input->post('skill_css');
        $skill_javascript 	= $this->input->post('skill_javascript');
        $skill_java 	= $this->input->post('skill_java');

        $this->load->library('upload');
    		$nmfile ="$nama_saksi"."_".time();
    		$config['upload_path'] = 'assets/upload/images/landing_pages/tim_developer/';
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
    						'tagline'	=>$tagline,
    						'deskripsi' =>$deskripsi,
    						'email' =>$email,
                'hp' =>$hp,
    						'fb' =>$fb,
                'ig' =>$ig,
                'yt' =>$yt,
                'tw' =>$tw,
                'skill_codeigniter' =>$skill_codeigniter,
                'skill_laravel' =>$skill_laravel,
                'skill_desain' =>$skill_desain,
                'skill_php' =>$skill_php,
                'skill_html' =>$skill_html,
                'skill_css' =>$skill_css,
                'skill_javascript' =>$skill_javascript,
                'skill_java' =>$skill_java,
    						'photo' =>$gbr['file_name'],
                'created_on' => date('Y-m-d  h:i:s a'),
    					);
    					$this->db->insert('tbl_s_landing_tim_developer', $data);
    			}
    		}
    		else{
    			$gbr = $this->upload->data();
    			$data = array (
            'nama'	=>$nama,
            'tagline'	=>$tagline,
            'deskripsi' =>$deskripsi,
            'email' =>$email,
            'hp' =>$hp,
            'fb' =>$fb,
            'ig' =>$ig,
            'yt' =>$yt,
            'tw' =>$tw,
            'skill_codeigniter' =>$skill_codeigniter,
            'skill_laravel' =>$skill_laravel,
            'skill_desain' =>$skill_desain,
            'skill_php' =>$skill_php,
            'skill_html' =>$skill_html,
            'skill_css' =>$skill_css,
            'skill_javascript' =>$skill_javascript,
            'skill_java' =>$skill_java,
            'photo' =>'default.jpg',
            'created_on' => date('Y-m-d  h:i:s a'),
    			);
    			$this->db->insert('tbl_s_landing_tim_developer', $data);
    		}
   }

   function Edit()
   {
     date_default_timezone_set("Asia/Bangkok");

        $id 	= $this->input->post('id');
        $nama 	= $this->input->post('nama');
    		$tagline 	= $this->input->post('tagline');
    		$deskripsi 	= $this->input->post('deskripsi');
        $email 	= $this->input->post('email');
        $hp 	= $this->input->post('hp');
        $fb 	= $this->input->post('fb');
        $ig 	= $this->input->post('ig');
        $yt 	= $this->input->post('yt');
        $tw 	= $this->input->post('tw');
        $skill_codeigniter 	= $this->input->post('skill_codeigniter');
        $skill_laravel 	= $this->input->post('skill_laravel');
        $skill_desain 	= $this->input->post('skill_desain');
        $skill_php 	= $this->input->post('skill_php');
        $skill_html 	= $this->input->post('skill_html');
        $skill_css 	= $this->input->post('skill_css');
        $skill_javascript 	= $this->input->post('skill_javascript');
        $skill_java 	= $this->input->post('skill_java');

        $this->load->library('upload');
    		$nmfile ="$nama_saksi"."_".time();
    		$config['upload_path'] = 'assets/upload/images/landing_pages/tim_developer/';
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
    						'tagline'	=>$tagline,
    						'deskripsi' =>$deskripsi,
    						'email' =>$email,
                'hp' =>$hp,
    						'fb' =>$fb,
                'ig' =>$ig,
                'yt' =>$yt,
                'tw' =>$tw,
                'skill_codeigniter' =>$skill_codeigniter,
                'skill_laravel' =>$skill_laravel,
                'skill_desain' =>$skill_desain,
                'skill_php' =>$skill_php,
                'skill_html' =>$skill_html,
                'skill_css' =>$skill_css,
                'skill_javascript' =>$skill_javascript,
                'skill_java' =>$skill_java,
    						'photo' =>$gbr['file_name'],
    					);
              $this->db->where('id', $id)->update('tbl_s_landing_tim_developer', $data);
    			}
    		}
    		else{
    			$gbr = $this->upload->data();
    			$data = array (
            'nama'	=>$nama,
            'tagline'	=>$tagline,
            'deskripsi' =>$deskripsi,
            'email' =>$email,
            'hp' =>$hp,
            'fb' =>$fb,
            'ig' =>$ig,
            'yt' =>$yt,
            'tw' =>$tw,
            'skill_codeigniter' =>$skill_codeigniter,
            'skill_laravel' =>$skill_laravel,
            'skill_desain' =>$skill_desain,
            'skill_php' =>$skill_php,
            'skill_html' =>$skill_html,
            'skill_css' =>$skill_css,
            'skill_javascript' =>$skill_javascript,
            'skill_java' =>$skill_java,
    			);
    			$this->db->where('id', $id)->update('tbl_s_landing_tim_developer', $data);
    		}
   }

   function Hapus($id)
   {
     $this->db->where('id', $id)->delete('tbl_s_landing_tim_developer');
   }

}
