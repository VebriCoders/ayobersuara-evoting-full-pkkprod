<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daftar Saksi (<?= $site['nama_website'] ?>)</title>
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
            APLIKASI E-VOTING <?= $site['nama_website']; ?>
            <br/>INDONESIA VOTE APPS
            <br/> <small>Email : <?= $site['email']; ?> <br/>
                    Nomor Telepon : <?= $site['no_telp']; ?>
            </small>
          </span>
        </td>
      </tr>
    </table>

    <hr class="line-title">

    <p align="center">
        DAFTAR SAKSI PEMILIHAN -  (<?= $site['nama_website'] ?>) <br>
        <b><?php echo date('l, d-m-Y H:i:s'); ?></b>
    </p>
    <table class="table table-bordered">
        <tr>
          <th style="width:2px">No.</th>
          <th>Foto Saksi</th>
          <th>Nama Saksi</th>
          <th>Telpon Saksi</th>
          <th>Saksi Pemilihan</th>
        </tr>
        <?php
        $no = 1;
        foreach($saksi as $s) { ?>
            <tr>
                <td style="width:2px"><?= $no ?></td>
                <td><img src="assets/upload/images/foto_saksi/<?= $s['photo'] ?>" alt="" style="width:100px; margin-top:5px"></td>
                <td><?= $s['nama_saksi'] ?></td>
                <td><?= $s['telp_saksi'] ?></td>
                <td><?= $s['nama_surat'] ?></td>
            </tr>
        <?php $no++;
        } ?>
    </table>

  </body>
</html>
