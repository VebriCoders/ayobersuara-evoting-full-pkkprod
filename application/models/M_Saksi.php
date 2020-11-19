<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Saksi extends CI_Model
{

  function tampilSaksi()
  {
      $this->db->select('tbl_saksi.*, tbl_kat_saksi.nama_kategori as manakat , tbl_surat_suara.nama_surat as namasurat')
             ->from('tbl_saksi')
             ->join('tbl_kat_saksi', 'tbl_saksi.kategori_saksi = tbl_kat_saksi.id')
             ->join('tbl_surat_suara', 'tbl_saksi.saksi_pemilihan = tbl_surat_suara.id')
             // ->join('tbl_role', 'tbl_user.id_role = tbl_role.id')
             // ->where('tbl_user.id_setidting_outlet', $id_outlet )
             ->order_by('tbl_saksi.id', 'ASC'); //DESC
     return $this->db->get();
   }

   function getSaksiPrint()
   {
     $this->db->select('*');
     $this->db->from('tbl_saksi');
     $this->db->join('tbl_surat_suara', 'tbl_saksi.saksi_pemilihan = tbl_surat_suara.id');
     return $this->db->get();
   }

   function CariData()
   {
       $nama_saksi 	= $this->input->post('nama_saksi');
       $active 	= $this->input->post('active');
       $this->db->select('tbl_saksi.*, tbl_kat_saksi.nama_kategori as manakat , tbl_surat_suara.nama_surat as namasurat')
              ->from('tbl_saksi')
              ->join('tbl_kat_saksi', 'tbl_saksi.kategori_saksi = tbl_kat_saksi.id')
              ->join('tbl_surat_suara', 'tbl_saksi.saksi_pemilihan = tbl_surat_suara.id')
              ->like('tbl_saksi.nama_saksi', $nama_saksi)
              ->like('tbl_saksi.active', $active)
              // ->join('tbl_role', 'tbl_user.id_role = tbl_role.id')
              // ->where('tbl_user.id_setidting_outlet', $id_outlet )
              ->order_by('tbl_saksi.id', 'ASC'); //DESC
      return $this->db->get();
      return $query;
    }

   function joinKat_Saksi()
   {
     $this->db->select('*')
               ->from('tbl_kat_saksi');
      $query = $this->db->get();
      return $query;
   }

   function joinKat_Surat()
   {
     $this->db->select('*')
               ->from('tbl_surat_suara');
      $query = $this->db->get();
      return $query;
   }

   function Tambah()
   {
     date_default_timezone_set("Asia/Bangkok");

        $nama_saksi 	= $this->input->post('nama_saksi');
    		$telp_saksi 	= $this->input->post('telp_saksi');
    		$alamat_saksi 	= $this->input->post('alamat_saksi');
        $kategori_saksi 	= $this->input->post('kategori_saksi');
        $saksi_pemilihan 	= $this->input->post('saksi_pemilihan');
        $active 	= $this->input->post('active');

        $this->load->library('upload');
    		$nmfile ="$nama_saksi"."_".time();
    		$config['upload_path'] = 'assets/upload/images/foto_saksi/';
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
    						'nama_saksi'	=>$nama_saksi,
    						'telp_saksi'	=>$telp_saksi,
    						'alamat_saksi' =>$alamat_saksi,
    						'kategori_saksi' =>$kategori_saksi,
                'saksi_pemilihan' =>$saksi_pemilihan,
    						'active' =>$active,
    						'photo' =>$gbr['file_name'],
                'created_on' => date('Y-m-d  h:i:s a'),
    					);
    					$this->db->insert('tbl_saksi', $data);
    			}
    		}
    		else{
    			$gbr = $this->upload->data();
    			$data = array (
            'nama_saksi'	=>$nama_saksi,
            'telp_saksi'	=>$telp_saksi,
            'alamat_saksi' =>$alamat_saksi,
            'kategori_saksi' =>$kategori_saksi,
            'saksi_pemilihan' =>$saksi_pemilihan,
            'active' =>$active,
            'photo' =>'default.jpg',
            'created_on' => date('Y-m-d  h:i:s a'),
    			);
    			$this->db->insert('tbl_saksi', $data);
    		}
   }


   function Edit()
   {
     date_default_timezone_set("Asia/Bangkok");

        $id 	= $this->input->post('id');
        $nama_saksi 	= $this->input->post('nama_saksi');
    		$telp_saksi 	= $this->input->post('telp_saksi');
    		$alamat_saksi 	= $this->input->post('alamat_saksi');
        $kategori_saksi 	= $this->input->post('kategori_saksi');
        $saksi_pemilihan 	= $this->input->post('saksi_pemilihan');
        $active 	= $this->input->post('active');

        $this->load->library('upload');
    		$nmfile ="$nama_saksi"."_".time();
    		$config['upload_path'] = 'assets/upload/images/foto_saksi/';
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
    						'nama_saksi'	=>$nama_saksi,
    						'telp_saksi'	=>$telp_saksi,
    						'alamat_saksi' =>$alamat_saksi,
    						'kategori_saksi' =>$kategori_saksi,
                'saksi_pemilihan' =>$saksi_pemilihan,
    						'active' =>$active,
    						'photo' =>$gbr['file_name'],
                'created_on' => date('Y-m-d  h:i:s a'),
    					);
    					$this->db->where('id', $id)->update('tbl_saksi', $data);
    			}
    		}
    		else{
    			$gbr = $this->upload->data();
    			$data = array (
            'nama_saksi'	=>$nama_saksi,
            'telp_saksi'	=>$telp_saksi,
            'alamat_saksi' =>$alamat_saksi,
            'kategori_saksi' =>$kategori_saksi,
            'saksi_pemilihan' =>$saksi_pemilihan,
            'active' =>$active,
            'created_on' => date('Y-m-d  h:i:s a'),
    			);
    			$this->db->where('id', $id)->update('tbl_saksi', $data);
    		}
   }

   function Hapus($id)
   {
     $this->db->where('id', $id)->delete('tbl_saksi');
   }

   function vnonaktif()
   {
     $id 	= $this->input->post('id');

     $data = array (
      'active' => 0,
     );
     $this->db->where('id', $id)->update('tbl_saksi', $data);
   }

   function vaktif()
   {
     $id 	= $this->input->post('id');

     $data = array (
      'active' => 1,
     );
     $this->db->where('id', $id)->update('tbl_saksi', $data);
   }


}
