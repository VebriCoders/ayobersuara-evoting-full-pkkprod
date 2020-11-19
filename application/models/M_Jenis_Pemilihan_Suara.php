<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Jenis_Pemilihan_Suara extends CI_Model
{

  function tampilSuratSuara()
  {
    $this->db->select('tbl_surat_suara.*,')
           ->from('tbl_surat_suara')
           // ->join('tbl_role', 'tbl_user.id_role = tbl_role.id')
           // ->where('tbl_user.id_setidting_outlet', $id_outlet )
           ->order_by('tbl_surat_suara.id', 'ASC'); //DESC
   return $this->db->get();
  }

  function cetakSurat($id)
  {
    $this->db->select('*');
    $this->db->from('tbl_surat_suara');
    $this->db->where('tbl_surat_suara.id',$id);
    return $this->db->get();
  }

  function CariData()
  {
    $nama_surat 	= $this->input->post('nama_surat');
    $active_surat 	= $this->input->post('active_surat');

    $this->db->select('tbl_surat_suara.*,')
           ->from('tbl_surat_suara')
           ->like('tbl_surat_suara.nama_surat', $nama_surat)
           ->like('tbl_surat_suara.active_surat', $active_surat)
           // ->join('tbl_role', 'tbl_user.id_role = tbl_role.id')
           // ->where('tbl_user.id_setidting_outlet', $id_outlet )
           ->order_by('tbl_surat_suara.id', 'ASC'); //DESC
   return $this->db->get();
  }

  function Tambah()
  {
    date_default_timezone_set("Asia/Bangkok");

    $nama_surat 	= $this->input->post('nama_surat');
    $dimulai_surat 	= $this->input->post('dimulai_surat');
    $akhir_surat 	= $this->input->post('akhir_surat');
    $active_surat 	= $this->input->post('active_surat');

    $this->load->library('upload');
    $nmfile ="$nama_surat"."_".time();
    $config['upload_path'] = 'assets/upload/images/foto_surat/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
    $config['max_size'] = '5120';
    $config['max_width'] = '5000';
    $config['max_height'] = '5000';
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);

    if($_FILES['logo_surat']['name'])
    {
      if ($this->upload->do_upload('logo_surat'))
      {
          $gbr = $this->upload->data();
          $data = array (
            'nama_surat'	=>$nama_surat,
            // 'dimulai_surat'	=>$dimulai_surat,
            'akhir_surat' =>$akhir_surat,
            'active_surat' =>$active_surat,
            'logo_surat' =>$gbr['file_name'],
            'dimulai_surat' => date('Y-m-d'),
          );
          $this->db->insert('tbl_surat_suara', $data);
      }
    }
    else{
      $gbr = $this->upload->data();
      $data = array (
        'nama_surat'	=>$nama_surat,
        // 'dimulai_surat'	=>$dimulai_surat,
        'akhir_surat' =>$akhir_surat,
        'active_surat' =>$active_surat,
        'logo_surat' =>'default.jpg',
        'dimulai_surat' => date('Y-m-d'),
      );
      $this->db->insert('tbl_surat_suara', $data);
    }
  }

  function Edit()
  {
    date_default_timezone_set("Asia/Bangkok");

    $id 	= $this->input->post('id');
    $nama_surat 	= $this->input->post('nama_surat');
    $dimulai_surat 	= $this->input->post('dimulai_surat');
    $akhir_surat 	= $this->input->post('akhir_surat');
    $active_surat 	= $this->input->post('active_surat');

    $this->load->library('upload');
    $nmfile ="$nama_surat"."_".time();
    $config['upload_path'] = 'assets/upload/images/foto_surat/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
    $config['max_size'] = '5120';
    $config['max_width'] = '5000';
    $config['max_height'] = '5000';
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);

    if($_FILES['logo_surat1']['name'])
    {
      if ($this->upload->do_upload('logo_surat1'))
      {
          $gbr = $this->upload->data();
          $data = array (
            'nama_surat'	=>$nama_surat,
            'dimulai_surat'	=>$dimulai_surat,
            'akhir_surat' =>$akhir_surat,
            'active_surat' =>$active_surat,
            'logo_surat' =>$gbr['file_name'],
            // 'created_on' => date('Y-m-d  h:i:s a'),
          );
          $this->db->where('id', $id)->update('tbl_surat_suara', $data);
      }
    }
    else{
      $gbr = $this->upload->data();
      $data = array (
        'nama_surat'	=>$nama_surat,
        'dimulai_surat'	=>$dimulai_surat,
        'akhir_surat' =>$akhir_surat,
        'active_surat' =>$active_surat,
        // 'created_on' => date('Y-m-d  h:i:s a'),
      );
      $this->db->where('id', $id)->update('tbl_surat_suara', $data);
    }
  }

  function Hapus($id)
  {
    $this->db->where('id', $id)->delete('tbl_surat_suara');
  }


}
