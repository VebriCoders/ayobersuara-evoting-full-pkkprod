<div id="page-head">

<div class="pad-all text-center">
    <h3>Selamat Datang di Dashboard - Admin (<?= $profile['username']; ?>).</h3>
    <p1>Tambah Dan Setting Aplikasi Pemilihan Anda Untuk Menggurangi Kebiasaan Golput.</p>
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
                <p class="text-2x mar-no text-semibold" id="show_jumlah_pemilih"><?php echo $jumlah_pemilih ?></p>
                <p class="mar-no">Jumlah Pemilih Terdaftar</p>
            </div>
        </div>
    </div>
    <!--jQuery [ REQUIRED ]-->
    <script src="<?php echo base_url('assets');?>/js/jquery.min.js"></script>
    <!-- <script type="text/javascript">
     jumlah_pemilih_h();
     function jumlah_pemilih_h(){
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/home/jumlah_pemilih_h')?>' ,
            dataType: 'json',
            success: function(data){
              console.log(data);

                 var namaSiswa = [data.id];
			           var jmlSiswa = namaSiswa.length;
			           console.log(jmlSiswa);


              // var totalBaris=$(‘.nomor_pemilih tr’).length;
              // $('#show_jumlah_pemilih').html(totalBaris);
            }
        });
     }

    </script> -->
    <div class="col-md-4">
        <div class="panel panel-mint panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                    <i class="ti-check-box icon-3x"></i>
                </div>
            </div>
            <div class="media-body">
                <p class="text-2x mar-no text-semibold"><?php echo $jumlah_pemilihaktif ?></p>
                <p class="mar-no">Pemilih Aktif</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-danger panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                    <i class="ti-na icon-3x"></i>
                </div>
            </div>
            <div class="media-body">
                <p class="text-2x mar-no text-semibold"><?php echo $jumlah_pemilihnonaktif ?></p>
                <p class="mar-no">Pemilih Non Aktif</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-info panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                    <i class="ti-check-box icon-3x"></i>
                </div>
            </div>
            <div class="media-body">
                <p class="text-2x mar-no text-semibold"><?php echo $jumlah_pemilihver ?></p>
                <p class="mar-no">Pemilih Terverifikasi</p>
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
    <div class="col-md-4">
        <div class="panel panel-danger panel-colorful media middle pad-all">
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
</div>

<hr class="new-section-sm">

<div class="row">

  <?php
  foreach( $tampilsurat->result() as $surat ){ ?>
  <!-- Query -->
  <div class="col-md-4">
  <div class="panel panel-success panel-colorful">
                <div class="pad-all media">
                    <div class="media-left">
                        <i class="ti-stats-up icon-3x icon-fw"></i>
                    </div>
                    <div class="media-body">
                        <p class="text-2x mar-no media-heading"><?php echo $surat->total_suara ?></p>
                        <span>Total Suara Masuk (<?php echo $surat->nama_surat ?>)</span>
                    </div>
                </div>
                <?php $precent = ($surat->total_suara/$jumlah_pemilihaktif)*100; ?>
                <div class="progress progress-xs progress-success mar-no">
                    <div role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-light" style="width: <?php echo $precent ?>%"></div>
                </div>
                <div class="pad-all text-sm">
                    <span class="text-semibold"><?php echo $precent; ?>%</span> Suara Masuk
                </div>
            </div>
          </div>
    <!-- Query -->
    <?php } // end foreach ?>

        </div>

      </div>
      <!--===================================================-->
      <!--End page content-->
