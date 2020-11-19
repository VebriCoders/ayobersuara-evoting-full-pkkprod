<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Hasil Pemilihan (<?= $tema['nama_surat'] ?>)</title>
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
        LAPORAN HASIL PEMILIHAN SUARA (<?= $tema['nama_surat'] ?>) <br>
        <b><?php echo date('l, d-m-Y H:i:s'); ?></b>
    </p>
    <table class="table table-bordered">
        <tr>
          <th style="width:2px">No.</th>
          <th style="width:210px">Foto Calon Kandidat</th>
          <th>Nama Kandidat</th>
          <th>Nama Ketua</th>
          <th>Nama Wakil</th>
          <th style="width:5px">Jumlah Suara</th>
        </tr>
        <?php
        $no = 1;
        foreach($suara as $s) { ?>
            <tr>
                <td style="width:2px"><?= $no ?></td>
                <td style="width:210px">
                  <img src="assets/upload/images/foto_kandidat/<?= $s['photo_ketua'] ?>" alt="" style="width:100px; margin-top:5px">
                  <img src="assets/upload/images/foto_kandidat/<?= $s['photo_wakil'] ?>" alt="" style="width:100px; margin-top:5px">
                </td>
                <td><?= $s['nama_kandidat'] ?> (<?= $s['nomor_calon_kandidat'] ?>)</td>
                <td><?= $s['nama_ketua'] ?></td>
                <td><?= $s['nama_wakil'] ?></td>
                <td style="width:5px"><h1><?= $s['jumlah_suara'] ?></h1></td>
            </tr>
        <?php $no++;
        } ?>
    </table>

      <?php
      foreach($saksi as $sak) { ?>
      <div align="right" class="text-center">
          <div style="width:400px;float:right">
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

  </body>
</html>
