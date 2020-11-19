<div id="page-head">

<div class="pad-all text-center">
    <h3>Selamat Datang di Dashboard - Panitia (<?php echo $this->session->userdata('username') ?>).</h3>
    <p1>Ayo Bersuara E-Voting Web Apps -  Menggurangi Kebiasaan Golput.</p>
</div>
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">
  <div class="row">
      <div class="col-md-4">
          <div class="panel panel-warning panel-colorful media middle pad-all">
              <div class="media-left">
                  <div class="pad-hor">
                      <i class="ti-user icon-3x"></i>
                  </div>
              </div>
              <div class="media-body">
                  <p class="text-2x mar-no text-semibold"><?php echo $jumlah_pemilih ?></p>
                  <p class="mar-no">Jumlah Pemilih Terdaftar</p>
              </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="panel panel-info panel-colorful media middle pad-all">
              <div class="media-left">
                  <div class="pad-hor">
                      <i class="ti-na icon-3x"></i>
                  </div>
              </div>
              <div class="media-body">
                  <p class="text-2x mar-no text-semibold"><?php echo $jumlah_pemilihBelumMilih ?></p>
                  <p class="mar-no">Pemilih Belum Memilih</p>
              </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="panel panel-mint panel-colorful media middle pad-all">
              <div class="media-left">
                  <div class="pad-hor">
                      <i class="ti-check-box icon-3x"></i>
                  </div>
              </div>
              <div class="media-body">
                  <p class="text-2x mar-no text-semibold"><?php echo $jumlah_pemilihSudahMilih ?></p>
                  <p class="mar-no">Pemilih Sudah Memilih</p>
              </div>
          </div>
      </div>
  </div>
</div>
<!--===================================================-->
<!--End page content-->
