<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class Konfigurasi_model extends CI_Model
{
    public $table = 'tbl_konfigurasi';
    public $id = 'id_konfigurasi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // Listing Konfigurasi
    public function listing() {
        $this->db->select('*');
        $this->db->from('tbl_konfigurasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function listinguser() {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('tbl_user.id', $this->session->userdata('id') );
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tampilData(){
        $this->db->select('tbl_konfigurasi.*')
               ->from('tbl_konfigurasi');
       return $this->db->get();
    }

    function ubahDataM()
    {
      $id 	= $this->input->post('id');
      $nama_website 	= $this->input->post('nama_website');
      $s_nomor_pemilihan 	= $this->input->post('s_nomor_pemilihan');
      $email 	= $this->input->post('email');
      $no_telp 	= $this->input->post('no_telp');
      $alamat 	= $this->input->post('alamat');
      $facebook 	= $this->input->post('facebook');
      $instagram 	= $this->input->post('instagram');
      $twitter 	= $this->input->post('twitter');
      $youtube 	= $this->input->post('youtube');


      $this->load->library('upload');
      $nmfile ="$nama_website"."_".time();
      $config['upload_path'] = 'assets/upload/images/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
      $config['max_size'] = '5120';
      $config['max_width'] = '15000';
      $config['max_height'] = '15000';
      $config['file_name'] = $nmfile;

      $this->upload->initialize($config);

      if(!empty($_FILES['logo']['name']) && !empty($_FILES['favicon']['name']))
      {

        if ($this->upload->do_upload('logo')){
            $img_logo = $this->upload->data();
            $logo =$img_logo['file_name'];
        }
        if ($this->upload->do_upload('favicon')){
            $img_favicon= $this->upload->data();
            $favicon= $img_favicon['file_name'];
        }

            $data = array (
              'nama_website'	=>$nama_website,
              's_nomor_pemilihan'	=>$s_nomor_pemilihan,
              'email'	=>$email,
              'no_telp' =>$no_telp,
              'alamat' =>$alamat,
              'logo' =>$logo,
              'favicon' =>$favicon,
              'instagram' =>$instagram,
              'twitter' =>$twitter,
              'youtube' =>$youtube,
              'facebook' =>$facebook,
            );
          $this->db->where('id_konfigurasi', $id)->update('tbl_konfigurasi', $data);
      } elseif(!empty($_FILES['logo']['name']) && empty($_FILES['favicon']['name'])){
        if ($this->upload->do_upload('logo')){
            $img_logo = $this->upload->data();
            $logo =$img_logo['file_name'];
        }

        $data = array (
          'nama_website'	=>$nama_website,
          's_nomor_pemilihan'	=>$s_nomor_pemilihan,
          'email'	=>$email,
          'no_telp' =>$no_telp,
          'alamat' =>$alamat,
          'logo' =>$logo,
          'instagram' =>$instagram,
          'twitter' =>$twitter,
          'youtube' =>$youtube,
          'facebook' =>$facebook,
        );
      $this->db->where('id_konfigurasi', $id)->update('tbl_konfigurasi', $data);

      }elseif(empty($_FILES['logo']['name']) && !empty($_FILES['favicon']['name'])){
        if ($this->upload->do_upload('favicon')){
            $img_favicon= $this->upload->data();
            $favicon= $img_favicon['file_name'];
        }

        $data = array (
          'nama_website'	=>$nama_website,
          's_nomor_pemilihan'	=>$s_nomor_pemilihan,
          'email'	=>$email,
          'no_telp' =>$no_telp,
          'alamat' =>$alamat,
          'favicon' =>$favicon,
          'instagram' =>$instagram,
          'twitter' =>$twitter,
          'youtube' =>$youtube,
          'facebook' =>$facebook,
        );
      $this->db->where('id_konfigurasi', $id)->update('tbl_konfigurasi', $data);

      }
       else{
        $gbr = $this->upload->data();
        $data = array (
          'nama_website'	=>$nama_website,
          's_nomor_pemilihan'	=>$s_nomor_pemilihan,
          'email'	=>$email,
          'no_telp' =>$no_telp,
          'alamat' =>$alamat,
          'instagram' =>$instagram,
          'twitter' =>$twitter,
          'youtube' =>$youtube,
          'facebook' =>$facebook,
        );
        $this->db->where('id_konfigurasi', $id)->update('tbl_konfigurasi', $data);
      }
    }

}
