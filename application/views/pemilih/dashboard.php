<div id="page-head">

<div class="pad-all text-center">
    <h3>Selamat Datang di Dashboard - Pemilih.</h3>
    <p1>Ayo Bersuara E-Voting Web Apps -  Menggurangi Kebiasaan Golput.</p>
</div>
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">

  <div class="col-md-6">
      <div class="panel panel-mint panel-colorful media middle pad-all">
          <div class="media-left">
              <div class="pad-hor">
                  <i class="ti-check-box icon-3x"></i>
              </div>
          </div>

          <div class="media-body">
              <p class="text-2x mar-no text-semibold">
                <?php if ($datapemilih['status_memilih']=='1'){ ?>
                    Sudah Memilih
                  <?php }else{ ?>
                  Belum Memilih
                  <?php } ?></p>
              <p class="mar-no">Status Memilih</p>
          </div>
      </div>
  </div>
  <?php
  foreach( $suaraSaya->result() as $suara ){ ?>
  <div class="col-md-6">
      <div class="panel panel-success panel-colorful media middle pad-all">
          <div class="media-left">
              <div class="pad-hor">
                  <i class="ti-check-box icon-3x"></i>
              </div>
          </div>

          <div class="media-body">
              <p class="text-2x mar-no text-semibold"><?php echo $suara->suaraSayaBray ?></p>
              <p class="mar-no">Suara Yang Anda Berikan</p>
          </div>
      </div>
  </div>
<?php } // end foreach ?>
</div>
<!--===================================================-->
<!--End page content-->
