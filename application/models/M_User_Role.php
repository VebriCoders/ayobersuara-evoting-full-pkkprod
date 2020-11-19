<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_User_Role extends CI_Model
{

  function tampilUserRole()
  {
      $this->db->select('tbl_user.*, tbl_role.name as namarole ')
						 ->from('tbl_user')
						 ->join('tbl_role', 'tbl_user.id_role = tbl_role.id')
             // ->where('tbl_user.id_setidting_outlet', $id_outlet )
						 ->order_by('tbl_user.id', 'ASC'); //DESC
	   return $this->db->get();
   }

   function CariData()
   {
       $email 	= $this->input->post('email');
       $active 	= $this->input->post('active');
       $this->db->select('tbl_user.*, tbl_role.name as namarole ')
 						 ->from('tbl_user')
 						 ->join('tbl_role', 'tbl_user.id_role = tbl_role.id')
             ->like('tbl_user.email', $email)
             ->like('tbl_user.active', $active)
              // ->where('tbl_user.id_setidting_outlet', $id_outlet )
 						 ->order_by('tbl_user.id', 'ASC'); //DESC
 	   return $this->db->get();
     return $query;
    }

   function joinRole()
   {
     $this->db->select('*')
               ->from('tbl_role');
      $query = $this->db->get();
      return $query;
   }



   function Tambah()
   {
     date_default_timezone_set("Asia/Bangkok");

        $first_name 	= $this->input->post('first_name');
    		$last_name 	= $this->input->post('last_name');
    		$username 	= $this->input->post('username');
        $phone 	= $this->input->post('phone');
        $email 	= $this->input->post('email');
        $active 	= $this->input->post('active');
        $id_role 	= $this->input->post('id_role');

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
    						'first_name'	=>$first_name,
    						'last_name'	=>$last_name,
    						'username' =>$username,
    						'phone' =>$phone,
                'email' =>$email,
    						'active' =>$active,
    						'photo' =>$gbr['file_name'],
                'created_on' => date('Y-m-d  h:i:s a'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'id_role' =>$id_role,
    					);
    					$this->db->insert('tbl_user', $data);
    			}
    		}
    		else{
    			$gbr = $this->upload->data();
    			$data = array (
            'first_name'	=>$first_name,
            'last_name'	=>$last_name,
            'username' =>$username,
            'phone' =>$phone,
            'email' =>$email,
            'active' =>$active,
            'photo' =>'default.jpg',
            'created_on' => date('Y-m-d  h:i:s a'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'id_role' =>$id_role,
    			);
    			$this->db->insert('tbl_user', $data);
    		}
   }


   function Edit()
   {
     date_default_timezone_set("Asia/Bangkok");

        $id 	= $this->input->post('id');
        $first_name 	= $this->input->post('first_name');
    		$last_name 	= $this->input->post('last_name');
    		$username 	= $this->input->post('username');
        $phone 	= $this->input->post('phone');
        $email 	= $this->input->post('email');
        $active 	= $this->input->post('active');
        $id_role 	= $this->input->post('id_role');

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
    						'first_name'	=>$first_name,
    						'last_name'	=>$last_name,
    						'username' =>$username,
    						'phone' =>$phone,
                'email' =>$email,
    						'active' =>$active,
    						'photo' =>$gbr['file_name'],
                'id_role' =>$id_role,
    					);
              $this->db->where('id', $id)->update('tbl_user', $data);
    			}
    		}
    		else{
    			$gbr = $this->upload->data();
    			$data = array (
            'first_name'	=>$first_name,
            'last_name'	=>$last_name,
            'username' =>$username,
            'phone' =>$phone,
            'email' =>$email,
            'active' =>$active,
            'id_role' =>$id_role,
    			);
          $this->db->where('id', $id)->update('tbl_user', $data);
    		}
   }

   function Hapus($id)
   {
     $this->db->where('id', $id)->delete('tbl_user');
   }

   function Pswd()
   {
     $id 	= $this->input->post('id');

     $data = array (
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
     );
     $this->db->where('id', $id)->update('tbl_user', $data);
   }

   function vnonaktif()
   {
     $id 	= $this->input->post('id');

     $data = array (
      'active' => 0,
     );
     $this->db->where('id', $id)->update('tbl_user', $data);
   }

   function vaktif()
   {
     $id 	= $this->input->post('id');

     $data = array (
      'active' => 1,
     );
     $this->db->where('id', $id)->update('tbl_user', $data);
   }

}
