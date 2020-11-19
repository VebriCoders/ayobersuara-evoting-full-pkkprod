<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Screenshot extends CI_Model
{
  function tampilData()
  {
      $this->db->select('tbl_s_landing_screenshots.*,')
             ->from('tbl_s_landing_screenshots')
             ->order_by('tbl_s_landing_screenshots.id', 'ASC'); //DESC
     return $this->db->get();
   }

   function Tambah()
   {
        date_default_timezone_set("Asia/Bangkok");

        $title	= $this->input->post('title');
        $deskripsi	= $this->input->post('deskripsi');

        $this->load->library('upload');
        $nmfile ="$id"."_".time();
        $config['upload_path'] = 'assets/upload/images/landing_pages/screenshots_app/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '5120';
        $config['max_width'] = '15000';
        $config['max_height'] = '15000';
        $config['file_name'] = $nmfile;

        $this->upload->initialize($config);

        if(!empty($_FILES['img_desktop']['name']) && !empty($_FILES['img_mobile']['name']))
        {

          if ($this->upload->do_upload('img_desktop')){
              $img_desktop = $this->upload->data();
              $desktop =$img_desktop['file_name'];
          }
          if ($this->upload->do_upload('img_mobile')){
              $img_mobile= $this->upload->data();
              $mobile= $img_mobile['file_name'];
          }

              $data = array (
                'title'  => $title,
                'deskripsi' => $deskripsi,
                'img_desktop' =>$desktop,
                'img_mobile' =>$mobile,
                'created_on' => date('Y-m-d  H:i:s'),
              );
            $this->db->insert('tbl_s_landing_screenshots', $data);

        } elseif(!empty($_FILES['img_desktop']['name']) && empty($_FILES['img_mobile']['name'])){
          if ($this->upload->do_upload('img_desktop')){
              $img_desktop = $this->upload->data();
              $desktop =$img_desktop['file_name'];
          }

          $data = array (
            'title'  => $title,
            'deskripsi' => $deskripsi,
            'img_desktop' =>$desktop,
            'img_mobile' =>'default.jpg',
            'created_on' => date('Y-m-d  H:i:s'),
          );
        $this->db->insert('tbl_s_landing_screenshots', $data);

      }elseif(empty($_FILES['img_desktop']['name']) && !empty($_FILES['img_mobile']['name'])){
        if ($this->upload->do_upload('img_mobile')){
            $img_mobile= $this->upload->data();
            $mobile= $img_mobile['file_name'];
        }

        $data = array (
          'title'  => $title,
          'deskripsi' => $deskripsi,
          'img_desktop' =>'default.jpg',
          'img_mobile' =>$mobile,
          'created_on' => date('Y-m-d  H:i:s'),
        );
      $this->db->insert('tbl_s_landing_screenshots', $data);
      }elseif(empty($_FILES['img_desktop']['name']) && empty($_FILES['img_mobile']['name'])){
        if ($this->upload->do_upload('img_mobile')){
            $img_mobile= $this->upload->data();
            $mobile= $img_mobile['file_name'];
        }

        $data = array (
          'title'  => $title,
          'deskripsi' => $deskripsi,
          'img_desktop' =>'default.jpg',
          'img_mobile' =>'default.jpg',
          'created_on' => date('Y-m-d  H:i:s'),
        );
      $this->db->insert('tbl_s_landing_screenshots', $data);
      }
   }

   function Edit()
   {
        date_default_timezone_set("Asia/Bangkok");

        $id	= $this->input->post('id');
        $title	= $this->input->post('title');
        $deskripsi	= $this->input->post('deskripsi');

        $this->load->library('upload');
        $nmfile ="$id"."_".time();
        $config['upload_path'] = 'assets/upload/images/landing_pages/screenshots_app/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '5120';
        $config['max_width'] = '15000';
        $config['max_height'] = '15000';
        $config['file_name'] = $nmfile;

        $this->upload->initialize($config);

        if(!empty($_FILES['img_desktop']['name']) && !empty($_FILES['img_mobile']['name']))
        {

          if ($this->upload->do_upload('img_desktop')){
              $img_desktop = $this->upload->data();
              $desktop =$img_desktop['file_name'];
          }
          if ($this->upload->do_upload('img_mobile')){
              $img_mobile= $this->upload->data();
              $mobile= $img_mobile['file_name'];
          }

              $data = array (
                'title'  => $title,
                'deskripsi' => $deskripsi,
                'img_desktop' =>$desktop,
                'img_mobile' =>$mobile,
                // 'created_on' => date('Y-m-d  H:i:s'),
              );
            $this->db->where('id', $id)->update('tbl_s_landing_screenshots', $data);

        } elseif(!empty($_FILES['img_desktop']['name']) && empty($_FILES['img_mobile']['name'])){
          if ($this->upload->do_upload('img_desktop')){
              $img_desktop = $this->upload->data();
              $desktop =$img_desktop['file_name'];
          }

          $data = array (
            'title'  => $title,
            'deskripsi' => $deskripsi,
            'img_desktop' =>$desktop,
            'img_mobile' =>'default.jpg',
            // 'created_on' => date('Y-m-d  H:i:s'),
          );
        $this->db->where('id', $id)->update('tbl_s_landing_screenshots', $data);

      }elseif(empty($_FILES['img_desktop']['name']) && !empty($_FILES['img_mobile']['name'])){
        if ($this->upload->do_upload('img_mobile')){
            $img_mobile= $this->upload->data();
            $mobile= $img_mobile['file_name'];
        }

        $data = array (
          'title'  => $title,
          'deskripsi' => $deskripsi,
          'img_desktop' =>'default.jpg',
          'img_mobile' =>$mobile,
          // 'created_on' => date('Y-m-d  H:i:s'),
        );
      $this->db->where('id', $id)->update('tbl_s_landing_screenshots', $data);
      }elseif(empty($_FILES['img_desktop']['name']) && empty($_FILES['img_mobile']['name'])){
        if ($this->upload->do_upload('img_mobile')){
            $img_mobile= $this->upload->data();
            $mobile= $img_mobile['file_name'];
        }

        $data = array (
          'title'  => $title,
          'deskripsi' => $deskripsi,
          // 'img_desktop' =>'default.jpg',
          // 'img_mobile' =>'default.jpg',
          // 'created_on' => date('Y-m-d  H:i:s'),
        );
      $this->db->where('id', $id)->update('tbl_s_landing_screenshots', $data);
      }
   }

   function Hapus($id)
   {
     $this->db->where('id', $id)->delete('tbl_s_landing_screenshots');
   }
}
