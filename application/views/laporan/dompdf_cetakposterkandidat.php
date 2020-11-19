<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kandidat (Jenis Pemilihan)</title>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets');?>/dompdf/bootstrap.min_2.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <style>
      .line-title{
        border: 0;
        border-style: inset;
        border-top: 1px solid #000;
      }
    </style>
  </head>
  <body>
    <img src="assets/img/1.png" style="position: absolute; width:90px; height:auto;" alt="">
    <table style="width:100%;">
      <tr>
        <td align="center">
          <span style="line-height: 1.6; font-weight: bold;">
            APLIKASI E-VOTING <?= $site['nama_website'] ?>
            <br/>INDONESIA VOTE APPS
            <br/> <small>Email : <?= $site['email'] ?> <br/>
                    Nomor Telepon : <?= $site['no_telp'] ?>
            </small>
          </span>
          </span>
        </td>
      </tr>
    </table>

    <hr class="line-title">

    <p align="center">
        Kandidat Pemilihan Suara - <?= $site['nama_website'] ?> <br>
        <b><?php echo date('l, d-m-Y H:i:s'); ?></b>
    </p>

    <?php
    foreach($kandidat as $kand) { ?>
    <div class="text-center">
    <h1><?= $kand['nama_kandidat'] ?> (<?= $kand['nomor_calon_kandidat'] ?>)</h1> <br>
      <img src="assets/upload/images/foto_kandidat/<?= $kand['photo_ketua'] ?>" style="width:200px; height:auto;" alt="">
      <img src="assets/upload/images/foto_kandidat/<?= $kand['photo_wakil'] ?>" style="width:200px; height:auto;" alt="">
      <table class="table table-bordered">
        <tr>
          <th colspan="2">Kandidat Pemilihan Surat</th>
        </tr>
        <tr>
          <td colspan="2"><?= $kand['namasurat'] ?></td>
        </tr>
        <tr>
          <th>Nama Ketua</th>
          <th>Nama Wakil</th>
        </tr>
        <tr>
          <td><?= $kand['nama_ketua'] ?></td>
          <td><?= $kand['nama_wakil'] ?></td>
        </tr>

        <tr>
          <th>Visi</th>
          <th>Misi</th>
        </tr>
        <tr>
          <td><?= $kand['visi'] ?></td>
          <td><?= $kand['misi'] ?></td>
        </tr>
      </table>

      <table class="table table-bordered">
        <tr>
          <th colspan="4">Social Media</th>
        </tr>
        <tr>
          <th colspan="2">Instagram</th>
          <th colspan="2">Youtube</th>
        </tr>
        <tr>
          <td>
            <img src="assets/upload/images/foto_kandidat/qr_social_media/<?= $kand['qr_ig_ketua'] ?>" style="width:100px; height:auto;" alt="">Instagram Ketua
          </td>
          <td>
            <img src="assets/upload/images/foto_kandidat/qr_social_media/<?= $kand['qr_ig_wakil'] ?>" style="width:100px; height:auto;" alt="">Instagram Wakil
          </td>
          <td>
            <img src="assets/upload/images/foto_kandidat/qr_social_media/<?= $kand['qr_yt_ketua'] ?>" style="width:100px; height:auto;" alt="">Youtube Ketua
          </td>
          <td>
            <img src="assets/upload/images/foto_kandidat/qr_social_media/<?= $kand['qr_yt_wakil'] ?>" style="width:100px; height:auto;" alt="">Youtube Wakil
          </td>
        </tr>
      </table>
    </div>
<?php } ?>
  </body>
</html>
