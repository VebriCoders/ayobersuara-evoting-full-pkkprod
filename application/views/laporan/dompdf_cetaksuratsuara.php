<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Surat Suara (<?= $tema['nama_surat'] ?>)</title>
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
        </td>
      </tr>
    </table>

    <hr class="line-title">

    <p align="center">
        Pemilihan Suara - <?= $site['nama_website'] ?> <br>
        <b><?php echo date('l, d-m-Y H:i:s'); ?></b>
    </p>

    <div align="center">
    <h1><?= $tema['nama_surat'] ?></h1> <br>
      <img src="assets/upload/images/foto_surat/<?= $tema['logo_surat'] ?>" style="width:200px; height:auto;" alt="">
      <h5>Waktu Pelaksanaan Pemilihan</h5>
      <h4>Dimulai : <?= $tema['dimulai_surat'] ?></h4>
      <h4>Berakhir : <?= $tema['akhir_surat'] ?></h4>
    </div>
    <br>
    <?php
    foreach($saksi as $sak) { ?>
    <div align="center" style="margin-left:150px">
        <div style="width:400px;">
          Malang, <?php echo date('d-m-Y'); ?>
          <br/>Ttd.Saksi
          <br>
          <br>
          <p>....................................</p>
          <p >Nama : <?= $sak['nama_saksi'] ?><br/>No.Telp : <?= $sak['telp_saksi'] ?></p>
        </div>
        <div style="clear:both"></div>
    </div>
    <?php } ?>
    <hr>
  </body>
</html>
