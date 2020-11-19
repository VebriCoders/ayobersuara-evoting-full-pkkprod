<?php
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
defined('BASEPATH') or exit('No direct script access allowed');

class NotFound404 extends CI_Controller
{
    public function index()
    {
      $this->output->set_status_header('404');
      $site = $this->Konfigurasi_model->listing();
      $profile = $this->Konfigurasi_model->listinguser();
      // $site = $this->Konfigurasi_model->listinguser();
      $data = array(
          'title'                 => '404 | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
          'profile'               => $profile,
      );

      // $this->template->render('404AyoberSuara',array());
      $this->template->load('404AyoberSuara','404AyoberSuara',$data);
    }
}
