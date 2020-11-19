<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Pemilih extends CI_Model
{

  function tampilPemilih()
  {
      $this->db->select('tbl_pemilih.*, tbl_kat_pemilih.nama_kategori as namakat')
             ->from('tbl_pemilih')
             ->join('tbl_kat_pemilih', 'tbl_pemilih.pemilih_kategori = tbl_kat_pemilih.id')
             // ->join('tbl_surat_suara', 'tbl_saksi.saksi_pemilihan = tbl_surat_suara.id')
             // ->join('tbl_role', 'tbl_user.id_role = tbl_role.id')
             // ->where('tbl_user.id_setidting_outlet', $id_outlet )
             ->order_by('tbl_pemilih.id', 'ASC'); //DESC
     return $this->db->get();
   }

   function getPemilihPrint()
   {
     $this->db->select('*');
     $this->db->from('tbl_pemilih');
     return $this->db->get();
   }

   function CariData()
   {
     $nomor_pemilih 	= $this->input->post('nomor_pemilih');
     $verifikasi_pemilih 	= $this->input->post('verifikasi_pemilih');
     $active 	= $this->input->post('active');
       $this->db->select('tbl_pemilih.*, tbl_kat_pemilih.nama_kategori as namakat')
              ->from('tbl_pemilih')
              ->join('tbl_kat_pemilih', 'tbl_pemilih.pemilih_kategori = tbl_kat_pemilih.id')
              ->like('tbl_pemilih.nomor_pemilih',$nomor_pemilih)
              ->like('tbl_pemilih.verifikasi_pemilih',$verifikasi_pemilih)
              ->like('tbl_pemilih.active',$active)
              // ->join('tbl_surat_suara', 'tbl_saksi.saksi_pemilihan = tbl_surat_suara.id')
              // ->join('tbl_role', 'tbl_user.id_role = tbl_role.id')
              // ->where('tbl_user.id_setidting_outlet', $id_outlet )
              ->order_by('tbl_pemilih.id', 'ASC'); //DESC
      return $this->db->get();
    }

   function joinKat_Pemilih()
   {
     $this->db->select('*')
               ->from('tbl_kat_pemilih');
      $query = $this->db->get();
      return $query;
   }

   function jumlah_pemilih()
   {
     $this->db->Select('*')
          ->from('tbl_pemilih');
     $query = $this->db->get();
     return $query->num_rows();
   }

   function Tambah()
   {
     date_default_timezone_set("Asia/Bangkok");
     	  $nama_pemilih 	= $this->input->post('nama_pemilih');
        $email 	= $this->input->post('email');
        $nomor_pemilih 	= $this->input->post('nomor_pemilih');
    		$alamat_pemilih 	= $this->input->post('alamat_pemilih');
        $no_telp 	= $this->input->post('no_telp');
        $jk 	= $this->input->post('jk');
        $pemilih_kategori 	= $this->input->post('pemilih_kategori');
        $verifikasi_pemilih 	= $this->input->post('verifikasi_pemilih');
        $active 	= $this->input->post('active');

        $this->load->library('upload');
    		$nmfile ="$nama_pemilih"."_".time();
    		$config['upload_path'] = 'assets/upload/images/foto_pemilih/';
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
                'nama_pemilih'	=>$nama_pemilih,
                'email' => $email,
    						'nomor_pemilih'	=>$nomor_pemilih,
    						'alamat_pemilih' =>$alamat_pemilih,
    						'no_telp' =>$no_telp,
                'jk' =>$jk,
    						'photo' =>$gbr['file_name'],
                'pemilih_kategori' =>$pemilih_kategori,
                'verifikasi_pemilih' =>$verifikasi_pemilih,
                'status_memilih' =>0,
                'created_on' => date('Y-m-d  h:i:s a'),
                'active' => $active,
                'date_created_email' => time(),
    					);
    					$this->db->insert('tbl_pemilih', $data);
    			}
    		}
    		else{
    			$gbr = $this->upload->data();
    			$data = array (
            'nama_pemilih'	=>$nama_pemilih,
            'email' => $email,
            'nomor_pemilih'	=>$nomor_pemilih,
            'alamat_pemilih' =>$alamat_pemilih,
            'no_telp' =>$no_telp,
            'jk' =>$jk,
            'photo' =>'default.jpg',
            'pemilih_kategori' =>$pemilih_kategori,
            'verifikasi_pemilih' =>$verifikasi_pemilih,
            'status_memilih' =>0,
            'created_on' => date('Y-m-d  h:i:s a'),
            'active' => $active,
            'date_created_email' => time(),
    			);
    			$this->db->insert('tbl_pemilih', $data);
    		}
   }

   function Edit()
   {
     date_default_timezone_set("Asia/Bangkok");
        $id 	= $this->input->post('id');
     	  $nama_pemilih 	= $this->input->post('nama_pemilih');
        $email 	= $this->input->post('email');
        $nomor_pemilih 	= $this->input->post('nomor_pemilih');
    		$alamat_pemilih 	= $this->input->post('alamat_pemilih');
        $no_telp 	= $this->input->post('no_telp');
        $jk 	= $this->input->post('jk');
        $pemilih_kategori 	= $this->input->post('pemilih_kategori');
        $verifikasi_pemilih 	= $this->input->post('verifikasi_pemilih');
        $active 	= $this->input->post('active');

        $this->load->library('upload');
    		$nmfile ="$nama_pemilih"."_".time();
    		$config['upload_path'] = 'assets/upload/images/foto_pemilih/';
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
                'nama_pemilih'	=>$nama_pemilih,
                'email' => $email,
    						'nomor_pemilih'	=>$nomor_pemilih,
    						'alamat_pemilih' =>$alamat_pemilih,
    						'no_telp' =>$no_telp,
                'jk' =>$jk,
    						'photo' =>$gbr['file_name'],
                'pemilih_kategori' =>$pemilih_kategori,
                'verifikasi_pemilih' =>$verifikasi_pemilih,
                // 'status_memilih' =>0,
                'active' => $active,
                // 'created_on' => date('Y-m-d  h:i:s a'),
    					);
              $this->db->where('id', $id)->update('tbl_pemilih', $data);
    			}
    		}
    		else{
    			$gbr = $this->upload->data();
    			$data = array (
            'nama_pemilih'	=>$nama_pemilih,
            'email' => $email,
            'nomor_pemilih'	=>$nomor_pemilih,
            'alamat_pemilih' =>$alamat_pemilih,
            'no_telp' =>$no_telp,
            'jk' =>$jk,
            'pemilih_kategori' =>$pemilih_kategori,
            'verifikasi_pemilih' =>$verifikasi_pemilih,
            // 'status_memilih' =>0,
            'active' => $active,
            // 'created_on' => date('Y-m-d  h:i:s a'),
    			);
          $this->db->where('id', $id)->update('tbl_pemilih', $data);
    		}
   }

   function Hapus($id)
   {
     $this->db->where('id', $id)->delete('tbl_pemilih');
   }

   function verifikasi()
   {
     $id 	= $this->input->post('id');

     $data = array (
      'verifikasi_pemilih' => 1,
     );
     $this->db->where('id', $id)->update('tbl_pemilih', $data);
   }

}
