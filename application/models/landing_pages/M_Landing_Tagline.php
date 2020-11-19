<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Landing_Tagline extends CI_Model
{
  function tampilTagline()
  {
      $this->db->select('tbl_s_landing_tagline.*,')
             ->from('tbl_s_landing_tagline')
             ->order_by('tbl_s_landing_tagline.id', 'ASC'); //DESC
     return $this->db->get();
   }

   function tampilTaglineImg()
   {
       $this->db->select('tbl_s_landing_tagline_img.*,')
              ->from('tbl_s_landing_tagline_img')
              ->order_by('tbl_s_landing_tagline_img.id', 'ASC'); //DESC
      return $this->db->get();
    }

  function Tambah()
  {
       date_default_timezone_set("Asia/Bangkok");
       $tagline	= $this->input->post('tagline');
       $data = array (
          'tagline'	=>$tagline,
          'created_on' => date('Y-m-d  H:i:s'),
          );
       $this->db->insert('tbl_s_landing_tagline', $data);
  }

  function Edit()
  {
       date_default_timezone_set("Asia/Bangkok");
       $id	= $this->input->post('id');
       $tagline	= $this->input->post('tagline');
       $data = array (
          'tagline'	=>$tagline,
          'created_on' => date('Y-m-d  H:i:s'),
          );
       $this->db->where('id', $id)->update('tbl_s_landing_tagline', $data);
  }

  function Hapus($id)
  {
    $this->db->where('id', $id)->delete('tbl_s_landing_tagline');
  }

  function Edit_Img()
  {
       date_default_timezone_set("Asia/Bangkok");
       $id	= $this->input->post('id');

       $this->load->library('upload');
       $nmfile ="$id"."_".time();
       $config['upload_path'] = 'assets/upload/images/landing_pages/tagline_img/';
       $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
       $config['max_size'] = '5120';
       $config['max_width'] = '15000';
       $config['max_height'] = '15000';
       $config['file_name'] = $nmfile;

       $this->upload->initialize($config);

       if(!empty($_FILES['desktop']['name']) && !empty($_FILES['mobile']['name']))
       {

         if ($this->upload->do_upload('desktop')){
             $img_desktop = $this->upload->data();
             $desktop =$img_desktop['file_name'];
         }
         if ($this->upload->do_upload('mobile')){
             $img_mobile= $this->upload->data();
             $mobile= $img_mobile['file_name'];
         }

             $data = array (
               'desktop' =>$desktop,
               'mobile' =>$mobile,
               'created_on' => date('Y-m-d  H:i:s'),
             );
           $this->db->where('id', $id)->update('tbl_s_landing_tagline_img', $data);

       } elseif(!empty($_FILES['desktop']['name']) && empty($_FILES['mobile']['name'])){
         if ($this->upload->do_upload('desktop')){
             $img_desktop = $this->upload->data();
             $desktop =$img_desktop['file_name'];
         }

         $data = array (
           'desktop' =>$desktop,
           'created_on' => date('Y-m-d  H:i:s'),
         );
       $this->db->where('id', $id)->update('tbl_s_landing_tagline_img', $data);

     }elseif(empty($_FILES['desktop']['name']) && !empty($_FILES['mobile']['name'])){
         if ($this->upload->do_upload('mobile')){
             $img_mobile= $this->upload->data();
             $mobile= $img_mobile['file_name'];
         }

         $data = array (
           'mobile' =>$mobile,
           'created_on' => date('Y-m-d  H:i:s'),
         );
       $this->db->where('id', $id)->update('tbl_s_landing_tagline_img', $data);
     }
  }

  function Edit_Img_logo()
  {
       date_default_timezone_set("Asia/Bangkok");
       $id	= $this->input->post('id');

       $this->load->library('upload');
       $nmfile ="$id"."_".time();
       $config['upload_path'] = 'assets/upload/images/landing_pages/tagline_img/';
       $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
       $config['max_size'] = '5120';
       $config['max_width'] = '15000';
       $config['max_height'] = '15000';
       $config['file_name'] = $nmfile;

       $this->upload->initialize($config);

       if(!empty($_FILES['logo']['name']) && !empty($_FILES['logo2']['name']))
       {

         if ($this->upload->do_upload('logo')){
             $img_logo = $this->upload->data();
             $logo =$img_logo['file_name'];
         }
         if ($this->upload->do_upload('logo2')){
             $img_logo2= $this->upload->data();
             $logo2= $img_logo2['file_name'];
         }

             $data = array (
               'logo' =>$logo,
               'logo2' =>$logo2,
               'created_on' => date('Y-m-d  H:i:s'),
             );
           $this->db->where('id', $id)->update('tbl_s_landing_tagline_img', $data);

       } elseif(!empty($_FILES['logo']['name']) && empty($_FILES['logo2']['name'])){
         if ($this->upload->do_upload('logo')){
             $img_logo = $this->upload->data();
             $logo =$img_logo['file_name'];
         }

         $data = array (
            'logo' =>$logo,
           'created_on' => date('Y-m-d  H:i:s'),
         );
       $this->db->where('id', $id)->update('tbl_s_landing_tagline_img', $data);

     }elseif(empty($_FILES['logo']['name']) && !empty($_FILES['logo2']['name'])){
       if ($this->upload->do_upload('logo2')){
           $img_logo2= $this->upload->data();
           $logo2= $img_logo2['file_name'];
       }

         $data = array (
           'logo2' =>$logo2,
           'created_on' => date('Y-m-d  H:i:s'),
         );
       $this->db->where('id', $id)->update('tbl_s_landing_tagline_img', $data);
     }

  }

}
