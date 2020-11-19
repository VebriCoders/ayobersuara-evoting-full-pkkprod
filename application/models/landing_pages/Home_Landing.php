<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class Home_Landing extends CI_Model
{
  public function DataTagline_IMG() {
      $this->db->select('*');
      $this->db->from('tbl_s_landing_tagline_img');
      $query = $this->db->get();
      return $query->row_array();
  }

  public function DataTagline_Active() {
      $this->db->select('tbl_s_landing_tagline.*,')
           ->from('tbl_s_landing_tagline')
           ->limit(1)
           ->order_by('tbl_s_landing_tagline.id', 'ASC'); //ASC
   return $this->db->get();
  }

  public function DataTagline() {
      $this->db->select('tbl_s_landing_tagline.*,')
           ->from('tbl_s_landing_tagline')
           ->order_by('tbl_s_landing_tagline.id', 'ASC'); //ASC
   return $this->db->get();
  }

  public function Data_About() {
      $this->db->select('*');
      $this->db->from('tbl_s_landing_deskripsi_about');
      $query = $this->db->get();
      return $query->row_array();
  }

  public function Data_Fitur() {
      $this->db->select('tbl_s_landing_fitur_unggulan.*,')
           ->from('tbl_s_landing_fitur_unggulan')
           ->limit(4)
           ->order_by('tbl_s_landing_fitur_unggulan.id', 'ASC'); //ASC
   return $this->db->get();
  }

  public function Data_Faq() {
      $this->db->select('tbl_s_landing_faq.*,')
           ->from('tbl_s_landing_faq')
           ->order_by('tbl_s_landing_faq.id', 'ASC'); //ASC
   return $this->db->get();
  }

  public function Data_Testimoni() {
      $this->db->select('tbl_s_landing_testimonial.*,')
           ->from('tbl_s_landing_testimonial')
           ->order_by('tbl_s_landing_testimonial.id', 'ASC'); //ASC
   return $this->db->get();
  }

  public function Data_Social_Contact() {
      $this->db->select('*');
      $this->db->from('tbl_s_landing_social_contact');
      $query = $this->db->get();
      return $query->row_array();
  }

  function simpan_contact($nama,$email,$no_hp,$subject,$pesan,$tgl){
        $hasil=$this->db->query("INSERT INTO tbl_s_landing_contact (nama,email,no_hp,subject,pesan,created_on)VALUES('$nama','$email','$no_hp','$subject','$pesan','$tgl')");
        return $hasil;
    }

    public function Data_SS() {
        $this->db->select('tbl_s_landing_screenshots.*,')
             ->from('tbl_s_landing_screenshots')
             ->order_by('tbl_s_landing_screenshots.id', 'ASC'); //ASC
     return $this->db->get();
    }

    public function Data_Team() {
        $this->db->select('tbl_s_landing_tim_developer.*,')
             ->from('tbl_s_landing_tim_developer')
             ->order_by('tbl_s_landing_tim_developer.id', 'ASC'); //ASC
     return $this->db->get();
    }

}
