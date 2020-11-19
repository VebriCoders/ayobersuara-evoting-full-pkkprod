<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Kandidat extends CI_Model
{

  function tampilKandidat()
  {
    $this->db->select('tbl_kandidat.*, tbl_kat_kandidat.nama_kategori as namakat , tbl_surat_suara.nama_surat as namasurat')
           ->from('tbl_kandidat')
           ->join('tbl_kat_kandidat', 'tbl_kandidat.kategori_kandidat = tbl_kat_kandidat.id')
           ->join('tbl_surat_suara', 'tbl_kandidat.jenis_pemilihan = tbl_surat_suara.id')
           // ->join('tbl_role', 'tbl_user.id_role = tbl_role.id')
           // ->where('tbl_user.id_setidting_outlet', $id_outlet )
           ->order_by('tbl_kandidat.id', 'ASC'); //DESC
   return $this->db->get();
  }

  function cetakKandidat($id)
  {
    $this->db->select('*, tbl_surat_suara.nama_surat as namasurat');
    $this->db->from('tbl_kandidat');
    $this->db->join('tbl_surat_suara', 'tbl_kandidat.jenis_pemilihan = tbl_surat_suara.id');
    $this->db->where('tbl_kandidat.id',$id);
    return $this->db->get();
  }

  function CariData()
  {
    $nama_kandidat 	= $this->input->post('nama_kandidat');
    $jenis_pemilihan 	= $this->input->post('jenis_pemilihan');
    $this->db->select('tbl_kandidat.*, tbl_kat_kandidat.nama_kategori as namakat , tbl_surat_suara.nama_surat as namasurat')
           ->from('tbl_kandidat')
           ->join('tbl_kat_kandidat', 'tbl_kandidat.kategori_kandidat = tbl_kat_kandidat.id')
           ->join('tbl_surat_suara', 'tbl_kandidat.jenis_pemilihan = tbl_surat_suara.id')
           ->like('tbl_kandidat.nama_kandidat', $nama_kandidat)
           ->like('tbl_kandidat.jenis_pemilihan', $jenis_pemilihan)
           // ->join('tbl_role', 'tbl_user.id_role = tbl_role.id')
           // ->where('tbl_user.id_setidting_outlet', $id_outlet )
           ->order_by('tbl_kandidat.id', 'ASC'); //DESC
   return $this->db->get();
  }

  function joinKat_Kandidat()
  {
    $this->db->select('*')
              ->from('tbl_kat_kandidat');
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
    $nama_kandidat 	= $this->input->post('nama_kandidat');
    $nomor_calon_kandidat 	= $this->input->post('nomor_calon_kandidat');
    $jenis_pemilihan 	= $this->input->post('jenis_pemilihan');
    $kategori_kandidat 	= $this->input->post('kategori_kandidat');
    $visi 	= $this->input->post('visi');
    $misi 	= $this->input->post('misi');
    $nama_ketua 	= $this->input->post('nama_ketua');
    $alamat_ketua 	= $this->input->post('alamat_ketua');
    $wa_ketua 	= $this->input->post('wa_ketua');
    $ig_ketua 	= $this->input->post('ig_ketua');
    $fb_ketua 	= $this->input->post('fb_ketua');
    $tw_ketua 	= $this->input->post('tw_ketua');
    $yt_ketua 	= $this->input->post('yt_ketua');
    $nama_wakil 	= $this->input->post('nama_wakil');
    $alamat_wakil 	= $this->input->post('alamat_wakil');
    $wa_wakil 	= $this->input->post('wa_wakil');
    $ig_wakil 	= $this->input->post('ig_wakil');
    $fb_wakil 	= $this->input->post('fb_wakil');
    $tw_wakil 	= $this->input->post('tw_wakil');
    $yt_wakil 	= $this->input->post('yt_wakil');

    $this->load->library('upload');
    $nmfile ="$nama_kandidat"."_".time();
    $config['upload_path'] = 'assets/upload/images/foto_kandidat/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
    $config['max_size'] = '5120';
    $config['max_width'] = '15000';
    $config['max_height'] = '15000';
    $config['file_name'] = $nmfile;

    $this->upload->initialize($config);



    $this->load->library('ciqrcode'); //pemanggilan library QR CODE

    $configg['cacheable']    = true; //boolean, the default is true
    $configg['cachedir']     = './assets/'; //string, the default is application/cache/
    $configg['errorlog']     = './assets/'; //string, the default is application/logs/
    $configg['imagedir']     = './assets/upload/images/foto_kandidat/qr_social_media/'; //direktori penyimpanan qr code
    $configg['quality']      = true; //boolean, the default is true
    $configg['size']         = '1024'; //interger, the default is 1024
    $configg['black']        = array(224,255,255); // array, default is array(255,255,255)
    $configg['white']        = array(70,130,180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($configg);

    $image_name='Instagram - '.$nama_ketua.'.png'; //buat name dari qr code sesuai dengan nama ketua
    $image_name2='Instagram - '.$nama_wakil.'.png'; //buat name dari qr code sesuai dengan nama wakil
    $image_name3='Youtube - '.$nama_ketua.'.png'; //buat name dari qr code sesuai dengan nama ketua
    $image_name4='Youtube - '.$nama_wakil.'.png'; //buat name dari qr code sesuai dengan nama wakil

    $params['data'] = $ig_ketua; //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$configg['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

    $params['data'] = $ig_wakil; //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$configg['imagedir'].$image_name2; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

    $params['data'] = $yt_ketua; //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$configg['imagedir'].$image_name3; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

    $params['data'] = $yt_wakil; //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$configg['imagedir'].$image_name4; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

    if(!empty($_FILES['photo_ketua']['name']) && !empty($_FILES['photo_wakil']['name']))
    {

      if ($this->upload->do_upload('photo_ketua')){
          $photo_ketua = $this->upload->data();
          $ketuaphoto =$photo_ketua['file_name'];
      }
      if ($this->upload->do_upload('photo_wakil')){
          $photo_wakil = $this->upload->data();
          $wakilphoto = $photo_wakil['file_name'];
      }

          $data = array (
            'nama_kandidat'	=>$nama_kandidat,
            'nomor_calon_kandidat'	=>$nomor_calon_kandidat,
            'jenis_pemilihan' =>$jenis_pemilihan,
            'kategori_kandidat' =>$kategori_kandidat,
            'visi' =>$visi,
            'misi' =>$misi,
            'nama_ketua' =>$nama_ketua,
            'alamat_ketua' => $alamat_ketua,
            'wa_ketua' =>$wa_ketua,
            'ig_ketua' =>$ig_ketua,
            'fb_ketua' =>$fb_ketua,
            'tw_ketua' =>$tw_ketua,
            'yt_ketua' =>$yt_ketua,
            'photo_ketua' =>$ketuaphoto,
            'nama_wakil' =>$nama_wakil,
            'alamat_wakil' => $alamat_wakil,
            'wa_wakil' =>$wa_wakil,
            'ig_wakil' =>$ig_wakil,
            'fb_wakil' =>$fb_wakil,
            'tw_wakil' =>$tw_wakil,
            'yt_wakil' =>$yt_wakil,
            'photo_wakil' =>$wakilphoto,
            'jumlah_suara' =>0,
            'created_on' => date('Y-m-d  h:i:s a'),
            'qr_ig_ketua' => $image_name,
            'qr_ig_wakil' => $image_name2,
            'qr_yt_ketua' => $image_name3,
            'qr_yt_wakil' => $image_name4,
          );
        $this->db->insert('tbl_kandidat', $data);
    } elseif(!empty($_FILES['photo_ketua']['name']) && empty($_FILES['photo_wakil']['name'])){
      if ($this->upload->do_upload('photo_ketua')){
          $photo_ketua = $this->upload->data();
          $ketuaphoto =$photo_ketua['file_name'];
      }

      $data = array (
        'nama_kandidat'	=>$nama_kandidat,
        'nomor_calon_kandidat'	=>$nomor_calon_kandidat,
        'jenis_pemilihan' =>$jenis_pemilihan,
        'kategori_kandidat' =>$kategori_kandidat,
        'visi' =>$visi,
        'misi' =>$misi,
        'nama_ketua' =>$nama_ketua,
        'alamat_ketua' => $alamat_ketua,
        'wa_ketua' =>$wa_ketua,
        'ig_ketua' =>$ig_ketua,
        'fb_ketua' =>$fb_ketua,
        'tw_ketua' =>$tw_ketua,
        'yt_ketua' =>$yt_ketua,
        'photo_ketua' =>$ketuaphoto,
        'nama_wakil' =>$nama_wakil,
        'alamat_wakil' => $alamat_wakil,
        'wa_wakil' =>$wa_wakil,
        'ig_wakil' =>$ig_wakil,
        'fb_wakil' =>$fb_wakil,
        'tw_wakil' =>$tw_wakil,
        'yt_wakil' =>$yt_wakil,
        'photo_wakil' =>'default.jpg',
        'jumlah_suara' =>0,
        'created_on' => date('Y-m-d  h:i:s a'),
        'qr_ig_ketua' => $image_name,
        'qr_ig_wakil' => $image_name2,
        'qr_yt_ketua' => $image_name3,
        'qr_yt_wakil' => $image_name4,
      );
    $this->db->insert('tbl_kandidat', $data);
    }elseif(empty($_FILES['photo_ketua']['name']) && !empty($_FILES['photo_wakil']['name'])){
      if ($this->upload->do_upload('photo_wakil')){
          $photo_wakil = $this->upload->data();
          $wakilphoto = $photo_wakil['file_name'];
      }

      $data = array (
        'nama_kandidat'	=>$nama_kandidat,
        'nomor_calon_kandidat'	=>$nomor_calon_kandidat,
        'jenis_pemilihan' =>$jenis_pemilihan,
        'kategori_kandidat' =>$kategori_kandidat,
        'visi' =>$visi,
        'misi' =>$misi,
        'nama_ketua' =>$nama_ketua,
        'alamat_ketua' => $alamat_ketua,
        'wa_ketua' =>$wa_ketua,
        'ig_ketua' =>$ig_ketua,
        'fb_ketua' =>$fb_ketua,
        'tw_ketua' =>$tw_ketua,
        'yt_ketua' =>$yt_ketua,
        'photo_ketua' =>'default.jpg',
        'nama_wakil' =>$nama_wakil,
        'alamat_wakil' => $alamat_wakil,
        'wa_wakil' =>$wa_wakil,
        'ig_wakil' =>$ig_wakil,
        'fb_wakil' =>$fb_wakil,
        'tw_wakil' =>$tw_wakil,
        'yt_wakil' =>$yt_wakil,
        'photo_wakil' =>$wakilphoto,
        'jumlah_suara' =>0,
        'created_on' => date('Y-m-d  h:i:s a'),
        'qr_ig_ketua' => $image_name,
        'qr_ig_wakil' => $image_name2,
        'qr_yt_ketua' => $image_name3,
        'qr_yt_wakil' => $image_name4,
      );
      $this->db->insert('tbl_kandidat', $data);
    }
     else{
      $gbr = $this->upload->data();
      $data = array (
        'nama_kandidat'	=>$nama_kandidat,
        'nomor_calon_kandidat'	=>$nomor_calon_kandidat,
        'jenis_pemilihan' =>$jenis_pemilihan,
        'kategori_kandidat' =>$kategori_kandidat,
        'visi' =>$visi,
        'misi' =>$misi,
        'nama_ketua' =>$nama_ketua,
        'alamat_ketua' => $alamat_ketua,
        'wa_ketua' =>$wa_ketua,
        'ig_ketua' =>$ig_ketua,
        'fb_ketua' =>$fb_ketua,
        'tw_ketua' =>$tw_ketua,
        'yt_ketua' =>$yt_ketua,
        'photo_ketua' =>'default.jpg',
        'nama_wakil' =>$nama_wakil,
        'alamat_wakil' => $alamat_wakil,
        'wa_wakil' =>$wa_wakil,
        'ig_wakil' =>$ig_wakil,
        'fb_wakil' =>$fb_wakil,
        'tw_wakil' =>$tw_wakil,
        'yt_wakil' =>$yt_wakil,
        'photo_wakil' =>'default.jpg',
        'jumlah_suara' =>0,
        'created_on' => date('Y-m-d  h:i:s a'),
        'qr_ig_ketua' => $image_name,
        'qr_ig_wakil' => $image_name2,
        'qr_yt_ketua' => $image_name3,
        'qr_yt_wakil' => $image_name4,
      );
      $this->db->insert('tbl_kandidat', $data);
    }
  }

  function Edit()
  {
    date_default_timezone_set("Asia/Bangkok");
    $id 	= $this->input->post('id');
    $nama_kandidat 	= $this->input->post('nama_kandidat');
    $nomor_calon_kandidat 	= $this->input->post('nomor_calon_kandidat');
    $jenis_pemilihan 	= $this->input->post('jenis_pemilihan');
    $kategori_kandidat 	= $this->input->post('kategori_kandidat');
    $visi 	= $this->input->post('visi');
    $misi 	= $this->input->post('misi');
    $nama_ketua 	= $this->input->post('nama_ketua');
    $alamat_ketua 	= $this->input->post('alamat_ketua');
    $wa_ketua 	= $this->input->post('wa_ketua');
    $ig_ketua 	= $this->input->post('ig_ketua');
    $fb_ketua 	= $this->input->post('fb_ketua');
    $tw_ketua 	= $this->input->post('tw_ketua');
    $yt_ketua 	= $this->input->post('yt_ketua');
    $nama_wakil 	= $this->input->post('nama_wakil');
    $alamat_wakil 	= $this->input->post('alamat_wakil');
    $wa_wakil 	= $this->input->post('wa_wakil');
    $ig_wakil 	= $this->input->post('ig_wakil');
    $fb_wakil 	= $this->input->post('fb_wakil');
    $tw_wakil 	= $this->input->post('tw_wakil');
    $yt_wakil 	= $this->input->post('yt_wakil');

    $this->load->library('upload');
    $nmfile ="$nama_kandidat"."_".time();
    $config['upload_path'] = 'assets/upload/images/foto_kandidat/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
    $config['max_size'] = '5120';
    $config['max_width'] = '15000';
    $config['max_height'] = '15000';
    $config['file_name'] = $nmfile;

    $this->upload->initialize($config);


    $this->load->library('ciqrcode'); //pemanggilan library QR CODE

    $configg['cacheable']    = true; //boolean, the default is true
    $configg['cachedir']     = './assets/'; //string, the default is application/cache/
    $configg['errorlog']     = './assets/'; //string, the default is application/logs/
    $configg['imagedir']     = './assets/upload/images/foto_kandidat/qr_social_media/'; //direktori penyimpanan qr code
    $configg['quality']      = true; //boolean, the default is true
    $configg['size']         = '1024'; //interger, the default is 1024
    $configg['black']        = array(224,255,255); // array, default is array(255,255,255)
    $configg['white']        = array(70,130,180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($configg);

    $image_name='Instagram - '.$nama_ketua.'.png'; //buat name dari qr code sesuai dengan nama ketua
    $image_name2='Instagram - '.$nama_wakil.'.png'; //buat name dari qr code sesuai dengan nama wakil
    $image_name3='Youtube - '.$nama_ketua.'.png'; //buat name dari qr code sesuai dengan nama ketua
    $image_name4='Youtube - '.$nama_wakil.'.png'; //buat name dari qr code sesuai dengan nama wakil

    $params['data'] = $ig_ketua; //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$configg['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

    $params['data'] = $ig_wakil; //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$configg['imagedir'].$image_name2; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

    $params['data'] = $yt_ketua; //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$configg['imagedir'].$image_name3; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

    $params['data'] = $yt_wakil; //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$configg['imagedir'].$image_name4; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

    if(!empty($_FILES['photo_ketua']['name']) && !empty($_FILES['photo_wakil']['name']))
    {

      if ($this->upload->do_upload('photo_ketua')){
          $photo_ketua = $this->upload->data();
          $ketuaphoto =$photo_ketua['file_name'];
      }
      if ($this->upload->do_upload('photo_wakil')){
          $photo_wakil = $this->upload->data();
          $wakilphoto = $photo_wakil['file_name'];
      }

          $data = array (
            'nama_kandidat'	=>$nama_kandidat,
            'nomor_calon_kandidat'	=>$nomor_calon_kandidat,
            'jenis_pemilihan' =>$jenis_pemilihan,
            'kategori_kandidat' =>$kategori_kandidat,
            'visi' =>$visi,
            'misi' =>$misi,
            'nama_ketua' =>$nama_ketua,
            'alamat_ketua' => $alamat_ketua,
            'wa_ketua' =>$wa_ketua,
            'ig_ketua' =>$ig_ketua,
            'fb_ketua' =>$fb_ketua,
            'tw_ketua' =>$tw_ketua,
            'yt_ketua' =>$yt_ketua,
            'photo_ketua' =>$ketuaphoto,
            'nama_wakil' =>$nama_wakil,
            'alamat_wakil' => $alamat_wakil,
            'wa_wakil' =>$wa_wakil,
            'ig_wakil' =>$ig_wakil,
            'fb_wakil' =>$fb_wakil,
            'tw_wakil' =>$tw_wakil,
            'yt_wakil' =>$yt_wakil,
            'photo_wakil' =>$wakilphoto,
            'qr_ig_ketua' => $image_name,
            'qr_ig_wakil' => $image_name2,
            'qr_yt_ketua' => $image_name3,
            'qr_yt_wakil' => $image_name4,
          );
        $this->db->where('id', $id)->update('tbl_kandidat', $data);
    } elseif(!empty($_FILES['photo_ketua']['name']) && empty($_FILES['photo_wakil']['name'])){
      if ($this->upload->do_upload('photo_ketua')){
          $photo_ketua = $this->upload->data();
          $ketuaphoto =$photo_ketua['file_name'];
      }

      $data = array (
        'nama_kandidat'	=>$nama_kandidat,
        'nomor_calon_kandidat'	=>$nomor_calon_kandidat,
        'jenis_pemilihan' =>$jenis_pemilihan,
        'kategori_kandidat' =>$kategori_kandidat,
        'visi' =>$visi,
        'misi' =>$misi,
        'nama_ketua' =>$nama_ketua,
        'alamat_ketua' => $alamat_ketua,
        'wa_ketua' =>$wa_ketua,
        'ig_ketua' =>$ig_ketua,
        'fb_ketua' =>$fb_ketua,
        'tw_ketua' =>$tw_ketua,
        'yt_ketua' =>$yt_ketua,
        'photo_ketua' =>$ketuaphoto,
        'nama_wakil' =>$nama_wakil,
        'alamat_wakil' => $alamat_wakil,
        'wa_wakil' =>$wa_wakil,
        'ig_wakil' =>$ig_wakil,
        'fb_wakil' =>$fb_wakil,
        'tw_wakil' =>$tw_wakil,
        'yt_wakil' =>$yt_wakil,
        'qr_ig_ketua' => $image_name,
        'qr_ig_wakil' => $image_name2,
        'qr_yt_ketua' => $image_name3,
        'qr_yt_wakil' => $image_name4,
      );
    $this->db->where('id', $id)->update('tbl_kandidat', $data);
    }elseif(empty($_FILES['photo_ketua']['name']) && !empty($_FILES['photo_wakil']['name'])){
      if ($this->upload->do_upload('photo_wakil')){
          $photo_wakil = $this->upload->data();
          $wakilphoto = $photo_wakil['file_name'];
      }

      $data = array (
        'nama_kandidat'	=>$nama_kandidat,
        'nomor_calon_kandidat'	=>$nomor_calon_kandidat,
        'jenis_pemilihan' =>$jenis_pemilihan,
        'kategori_kandidat' =>$kategori_kandidat,
        'visi' =>$visi,
        'misi' =>$misi,
        'nama_ketua' =>$nama_ketua,
        'alamat_ketua' => $alamat_ketua,
        'wa_ketua' =>$wa_ketua,
        'ig_ketua' =>$ig_ketua,
        'fb_ketua' =>$fb_ketua,
        'tw_ketua' =>$tw_ketua,
        'yt_ketua' =>$yt_ketua,
        'nama_wakil' =>$nama_wakil,
        'alamat_wakil' => $alamat_wakil,
        'wa_wakil' =>$wa_wakil,
        'ig_wakil' =>$ig_wakil,
        'fb_wakil' =>$fb_wakil,
        'tw_wakil' =>$tw_wakil,
        'yt_wakil' =>$yt_wakil,
        'photo_wakil' =>$wakilphoto,
        'qr_ig_ketua' => $image_name,
        'qr_ig_wakil' => $image_name2,
        'qr_yt_ketua' => $image_name3,
        'qr_yt_wakil' => $image_name4,
      );
      $this->db->where('id', $id)->update('tbl_kandidat', $data);
    }
     else{
      $gbr = $this->upload->data();
      $data = array (
        'nama_kandidat'	=>$nama_kandidat,
        'nomor_calon_kandidat'	=>$nomor_calon_kandidat,
        'jenis_pemilihan' =>$jenis_pemilihan,
        'kategori_kandidat' =>$kategori_kandidat,
        'visi' =>$visi,
        'misi' =>$misi,
        'nama_ketua' =>$nama_ketua,
        'alamat_ketua' => $alamat_ketua,
        'wa_ketua' =>$wa_ketua,
        'ig_ketua' =>$ig_ketua,
        'fb_ketua' =>$fb_ketua,
        'tw_ketua' =>$tw_ketua,
        'yt_ketua' =>$yt_ketua,
        'nama_wakil' =>$nama_wakil,
        'alamat_wakil' => $alamat_wakil,
        'wa_wakil' =>$wa_wakil,
        'ig_wakil' =>$ig_wakil,
        'fb_wakil' =>$fb_wakil,
        'tw_wakil' =>$tw_wakil,
        'yt_wakil' =>$yt_wakil,
        'qr_ig_ketua' => $image_name,
        'qr_ig_wakil' => $image_name2,
        'qr_yt_ketua' => $image_name3,
        'qr_yt_wakil' => $image_name4,
      );
      $this->db->where('id', $id)->update('tbl_kandidat', $data);
    }
  }

  function Hapus($id)
  {
    $this->db->where('id', $id)->delete('tbl_kandidat');
  }

  public function getKetua($id) {
        $this->db->select('*');
        $this->db->from('tbl_kandidat');
        $this->db->join('tbl_surat_suara', 'tbl_surat_suara.id = tbl_kandidat.jenis_pemilihan');
        $this->db->where('tbl_kandidat.id', $id);
        return $this->db->get();
    }

}
