<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Profile extends CI_Model
{
  function tampilProfil()
  {
      $this->db->select('tbl_user.*,')
             ->from('tbl_user')
             // ->join('tbl_role', 'tbl_user.id_role = tbl_role.id')
             ->where('tbl_user.id', $this->session->userdata('id') )
             ->order_by('tbl_user.id', 'ASC'); //DESC
     return $this->db->get();
   }

  function ubahProfile()
  {
       date_default_timezone_set("Asia/Bangkok");
       $id 	= $this->input->post('id');
       $username	= $this->input->post('username');
       $first_name 	= $this->input->post('first_name');
       $last_name 	= $this->input->post('last_name');
       $phone 	= $this->input->post('phone');
       $email 	= $this->input->post('email');

       // echo "phone".$phone;
       $this->load->library('upload');
       $nmfile ="$username"."_".time();
       $config['upload_path'] = 'assets/upload/images/foto_profil/';
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
               'username'	=>$username,
               'first_name'	=>$first_name,
               'last_name' =>$last_name,
               'phone' =>$phone,
               'email' =>$email,
               'photo' =>$gbr['file_name'],
             );
             // print_r($data);
             $this->db->set($data)->where('id', $id)->update('tbl_user', $data);
         }
       }
       else{
         $gbr = $this->upload->data();
         $data = array (
           'username'	=>$username,
           'first_name'	=>$first_name,
           'last_name' =>$last_name,
           'phone' =>$phone,
           'email' =>$email,
         );
         // print_r($data);
         $this->db->set($data)->where('id', $id)->update('tbl_user', $data);
       }
  }

  function Pswd()
  {
    $id 	= $this->input->post('id');

    $data = array (
     'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
    );
    $this->db->where('id', $id)->update('tbl_user', $data);
  }

}
