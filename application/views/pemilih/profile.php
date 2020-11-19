<div id="page-head">

<div class="pad-all text-center">
    <h3>Profile - Pemilih.</h3>
    <p1>Ayo Bersuara E-Voting Web Apps -  Menggurangi Kebiasaan Golput.</p>
</div>
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">

  <div class="row">
     <div class="col-lg-12" style="padding-top:50px">
           <?php
           foreach( $tampilProfil->result() as $user ){ ?>
          <!--Profile Widget-->
          <!--===================================================-->
          <div class="panel">

              <div class="panel-body text-center bg-purple">
                  <img alt="Avatar" class="img-lg img-circle img-border mar-btm" src="<?php echo base_url('assets');?>/upload/images/foto_pemilih/<?php echo $user->photo ?>">

                  <h4 class="text-light"><?php echo $user->nama_pemilih ?></h4>
                  <p class="text-sm">Pemilih</b></p>
              </div>
              <div class="list-group bg-trans pad-btm">
                  <?= $this->session->flashdata('flash'); ?>
                  <a class="list-group-item"><i class="ti-user icon-lg icon-fw"></i> Nama : <?php echo $user->nama_pemilih ?></a>
                  <a class="list-group-item"><i class="ti-user icon-lg icon-fw"></i>Jenis Kelamin : <?php
                                                                                                                if($user->jk=='1'){
                                                                                                                  echo "Laki-Laki";
                                                                                                                }
                                                                                                                else{
                                                                                                                  echo "Perempuan";
                                                                                                                }
                                                                                                                 ?></a>
                  <a class="list-group-item"><i class="ti-key icon-lg icon-fw"></i>Nomor Pemilih : <?php echo $user->nomor_pemilih ?></a>
                  <a class="list-group-item"><i class="ti-mobile icon-lg icon-fw"></i>Nomor Telephone : <?php echo $user->no_telp ?></a>
                  <a class="list-group-item"><i class="ti-flag icon-lg icon-fw"></i>Alamat : <?php echo $user->alamat_pemilih ?></a>
                  <?php if($user->status_memilih=='1'){ ?>
                  <a class="list-group-item"><i class="ti-check icon-lg icon-fw"></i>Status Memilih : Sudah Memilih</a>
                  <?php }else{ ?>
                  <a class="list-group-item"><i class="ti-close icon-lg icon-fw"></i>Status Memilih : Belum Memilih</a>
                  <?php } ?>
                  <?php if($user->verifikasi_pemilih=='1'){ ?>
                  <a class="list-group-item"><i class="ti-check icon-lg icon-fw"></i>Status Memilih : Sudah Diverifikasi</a>
                  <?php }else{ ?>
                  <a class="list-group-item"><i class="ti-close icon-lg icon-fw"></i>Status Memilih : Belum Diverifikasi</a>
                  <?php } ?>
                  <a class="list-group-item"><i class="ti-time icon-lg icon-fw"></i>Create On : <?php echo $user->created_on ?></a>

              </div>
          </div>
          <!--===================================================-->
        <?php } // end foreach ?>
      </div>
     </div>

</div>
<!--===================================================-->
<!--End page content-->
