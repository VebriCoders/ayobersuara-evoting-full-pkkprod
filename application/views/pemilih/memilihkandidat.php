<div id="page-head">

<div class="pad-all text-center">
    <h3>Surat Suara <?= $tema['nama_surat'] ?>.</h3>
    <p1>Ayo Bersuara E-Voting Web Apps -  Menggurangi Kebiasaan Golput.</p>
</div>
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">
  <div class="row" style="margin-top:4px">
      <div class="col-sm-12">
          <div class="row">

            <?php foreach($calon as $c) { ?>
            <div class="col-lg-3" >
            <div class="panel pos-rel">
                <div class="pad-all text-center">
                    <a href="#">
                        <img alt="Profile Picture" class="img-lg img-circle mar-ver" src="<?php echo base_url()?>assets/upload/images/foto_kandidat/<?= $c['photo_ketua'] ?>">
                        &nbsp
                        <img alt="Profile Picture" class="img-lg img-circle mar-ver" src="<?php echo base_url()?>assets/upload/images/foto_kandidat/<?= $c['photo_wakil'] ?>">
                        <p class="text-lg text-semibold mar-no text-main"><?= $c['nama_kandidat'] ?> (<?= $c['nomor_calon_kandidat'] ?>)</p>
                        <p class="text-sm">Nama Ketua : <?= $c['nama_ketua'] ?></p>
                        <p class="text-sm">Nama Wakil : <?= $c['nama_wakil'] ?></p>
                        <a href="<?= base_url('pemilih/memilih/memilih/'.$c['id']) ?>" class="pilih btn btn-primary" data="<?=$c['nama_kandidat'] ?>"><i class="ti-location-arrow icon-fw"></i>Pilih</a>
                    </a>
                    <div class="pad-top btn-groups">
                        <p class="text-sm">Social Media Calon Ketua</p>
                        <a href="<?= $c['fb_ketua'] ?>" target="_blank" class="btn btn-icon demo-pli-facebook icon-lg add-tooltip" data-original-title="Facebook" data-container="body"></a>
                        <a href="<?= $c['ig_ketua'] ?>" target="_blank" class="btn btn-icon demo-pli-instagram icon-lg add-tooltip" data-original-title="Instagram" data-container="body"></a>
                        <a href="<?= $c['tw_ketua'] ?>" target="_blank" class="btn btn-icon demo-pli-twitter icon-lg add-tooltip" data-original-title="Twitter" data-container="body"></a>
                        <a href="<?= $c['yt_ketua'] ?>" target="_blank" class="btn btn-icon ion-social-youtube-outline icon-lg add-tooltip" data-original-title="Youtube" data-container="body"></a>
                        <a href="https://api.whatsapp.com/send?phone=<?= $c['wa_ketua'] ?>" target="_blank" class="btn btn-icon ion-social-whatsapp-outline icon-lg add-tooltip" data-original-title="Whatsapp" data-container="body"></a>
                    </div>
                    <div class="pad-top btn-groups">
                        <p class="text-sm">Social Media Calon Wakil</p>
                        <a href="<?= $c['fb_wakil'] ?>" target="_blank" class="btn btn-icon demo-pli-facebook icon-lg add-tooltip" data-original-title="Facebook" data-container="body"></a>
                        <a href="<?= $c['ig_wakil'] ?>" target="_blank" class="btn btn-icon demo-pli-instagram icon-lg add-tooltip" data-original-title="Instagram" data-container="body"></a>
                        <a href="<?= $c['tw_wakil'] ?>" target="_blank" class="btn btn-icon demo-pli-twitter icon-lg add-tooltip" data-original-title="Twitter" data-container="body"></a>
                        <a href="<?= $c['yt_wakil'] ?>" target="_blank" class="btn btn-icon ion-social-youtube-outline icon-lg add-tooltip" data-original-title="Youtube" data-container="body"></a>
                        <a href="https://api.whatsapp.com/send?phone=<?= $c['wa_wakil'] ?>" target="_blank" class="btn btn-icon ion-social-whatsapp-outline icon-lg add-tooltip" data-original-title="Whatsapp" data-container="body"></a>
                    </div>
                </div>
            </div>
            </div>
            <?php } ?>


          </div>
     </div>
 </div>
</div>
<!--===================================================-->
<!--End page content-->
