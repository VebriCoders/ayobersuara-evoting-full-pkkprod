<div id="page-head">

  <div id="page-title" class="pad-all text-center">
    <h3>Setting Aplikasi - Admin (<?php echo $this->session->userdata('username') ?>).</h3>
    <!-- <h6>Setting Aplikasi Untuk Memngunakan Aplikasi Sesuai Dengan Kebutuhan Anda.</h6> -->
  </div>
  <!--Breadcrumb-->
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <ol class="breadcrumb text-center">
    <li><a href="<?php echo base_url('admin/home') ?>"><i class="demo-pli-home"></i></a></li>
    <li><a>Setting</a></li>
    <li class="active">Setting Aplikasi</li>
  </ol>
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <!--End breadcrumb-->
</div>

<!--Page content-->

<!--===================================================-->
<div id="page-content">
  <?php foreach ($tampilData->result() as $setapp) { ?>

    <div class="panel">
      <div class="panel-body">
        <?= $this->session->flashdata('flash'); ?>
        <div class="fixed-fluid">
          <div class="fixed-md-12">
            <div class="text-right">
              <button data-toggle="modal" data-target="#editapp<?php echo $setapp->id_konfigurasi ?>" class=" btn btn-md btn-primary">
                <span class="ti-pencil-alt"> Edit Informasi Aplikasi</span>
              </button>
            </div>
            <!-- Simple profile -->
            <div class="text-center">
              <div class="pad-ver">
                <img style="height:300px;width:300px" src="<?php echo base_url('assets'); ?>/upload/images/<?php echo $setapp->logo;  ?>" class="img-lg img-circle" alt="Profile Picture">
              </div>
              <h4 class="text-lg text-overflow mar-no"><?php echo $setapp->nama_website;  ?></h4>
              <p class="text-sm text-muted">E-Voting Web Apps <strong> Ayo Bersuara !</strong></p>

              <div class="pad-ver btn-groups">
                <a target="_blank" href="<?php echo $setapp->facebook;  ?>" class="btn btn-icon demo-pli-facebook icon-lg add-tooltip" data-original-title="Facebook" data-container="body"></a>
                <a target="_blank" href="<?php echo $setapp->twitter;  ?>" class="btn btn-icon demo-pli-twitter icon-lg add-tooltip" data-original-title="Twitter" data-container="body"></a>
                <a target="_blank" href="<?php echo $setapp->youtube;  ?>" class="btn btn-icon ion-social-youtube-outline icon-lg add-tooltip" data-original-title="Youtube" data-container="body"></a>
                <a target="_blank" href="<?php echo $setapp->instagram;  ?>" class="btn btn-icon demo-pli-instagram icon-lg add-tooltip" data-original-title="Instagram" data-container="body"></a>
              </div>
            </div>
            <hr>

            <!-- Profile Details -->
            <div class="col-md-6">
              <p class="pad-ver text-main text-sm text-uppercase text-bold">About Me</p>
              <p><i class="demo-pli-home icon-lg icon-fw"></i> Nama Website : <?php echo $setapp->nama_website;  ?></p>
              <p><i class="demo-pli-old-telephone icon-lg icon-fw"></i> CS.Admin : <?php echo $setapp->no_telp;  ?></p>
              <p><i class="ti-email icon-lg icon-fw"></i> Email Admin : <?php echo $setapp->email;  ?></p>
              <p><i class="ti-location-arrow icon-lg icon-fw"></i> Alamat CS.ADMIN : <?php echo $setapp->alamat;  ?></p>
              <p><i class="ti-settings icon-lg icon-fw"></i> Setting Metode Nomor Pemilih : <?php echo $setapp->s_nomor_pemilihan;  ?></p>
            </div>
            <div class="col-md-3">
              <p class="pad-ver text-main text-sm text-uppercase text-bold"></p>
              <p><i class="ti-image icon-lg icon-fw"></i> Logo : <?php echo $setapp->logo;  ?></p>
              <p><img style="height:150;width:150" src="<?php echo base_url('assets'); ?>/upload/images/<?php echo $setapp->logo;  ?>" class="img-lg img-circle" alt="Profile Picture"></p>
            </div>
            <div class="col-md-3">
              <p class="pad-ver text-main text-sm text-uppercase text-bold"></p>
              <p><i class="ti-image icon-lg icon-fw"></i> Favicon : <?php echo $setapp->favicon;  ?></p>
              <p><img style="height:150;width:150" src="<?php echo base_url('assets'); ?>/upload/images/<?php echo $setapp->favicon;  ?>" class="img-lg img-circle" alt="Profile Picture"></p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Start Modal Edit -->
    <?php echo form_open_multipart('admin/SettingAPP/ubahData'); ?>
    <div id="editapp<?php echo $setapp->id_konfigurasi ?>" class="modal fade animated pulse">
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
            <h4 class="modal-title">Edit Setting Aplikasi</h4>
          </div>
          <input type="hidden" name="id" value="<?php echo $setapp->id_konfigurasi; ?>" />

          <div class="modal-body">

            <div class="form-group col-md-6 required ">
              <label for="" class="control-label">Nama Aplikasi</label><span class="red">*</span>
              <div class="input-group">
                <div class="input-group-addon"><i class="demo-pli-home"></i></div>
                <input class="form-control" value="<?php echo $setapp->nama_website;  ?>" placeholder="Nama Website" required="required" name="nama_website" type="text" id="nama_website">
              </div>
            </div>
            <div class="form-group col-md-6 required ">
              <label for="" class="control-label">CS Admin</label><span class="red">*</span>
              <div class="input-group">
                <div class="input-group-addon"><i class="demo-pli-old-telephone"></i></div>
                <input class="form-control" value="<?php echo $setapp->no_telp;  ?>" placeholder="CS ADMIN" required="required" name="no_telp" type="number" id="no_telp">
              </div>
            </div>
            <div class="form-group col-md-6 required ">
              <label for="" class="control-label">Email CS Admin</label><span class="red">*</span>
              <div class="input-group">
                <div class="input-group-addon"><i class="ti-email"></i></div>
                <input class="form-control" value="<?php echo $setapp->email;  ?>" placeholder="Email CS ADMIN" required="required" name="email" type="email" id="email">
              </div>
            </div>
            <div class="form-group col-md-6 required ">
              <label for="" class="control-label">Alamat CS Admin</label><span class="red">*</span>
              <div class="input-group">
                <div class="input-group-addon"><i class="ti-location-arrow"></i></div>
                <input class="form-control" value="<?php echo $setapp->alamat;  ?>" placeholder="Alamat CS ADMIN" required="required" name="alamat" type="text" id="alamat">
              </div>
            </div>
            <div class="form-group col-md-12 required ">
              <label for="" class="control-label">Setting Sistem Nomor Pemilihan</label><span class="red">*</span>
              <div class="input-group">
                <div class="input-group-addon"><i class="ti-settings"></i></div>
                <input class="form-control" value="<?php echo $setapp->s_nomor_pemilihan;  ?>" placeholder="Metode Nomor Pemilihan (NIK/NISM/NO.INDUK/NOMOR_TELEPHONE/Dll)" required="required" name="s_nomor_pemilihan" type="text" id="s_nomor_pemilihan">
              </div>
            </div>
            <div class="form-group col-md-6 required ">
              <label for="" class="control-label">Facebook</label><span class="red">*</span>
              <div class="input-group">
                <div class="input-group-addon"><i class="demo-pli-facebook"></i></div>
                <input class="form-control" value="<?php echo $setapp->facebook;  ?>" placeholder="Facebook" required="required" name="facebook" type="text" id="facebook">
              </div>
            </div>
            <div class="form-group col-md-6 required ">
              <label for="" class="control-label">Twitter</label><span class="red">*</span>
              <div class="input-group">
                <div class="input-group-addon"><i class="demo-pli-twitter"></i></div>
                <input class="form-control" value="<?php echo $setapp->twitter;  ?>" placeholder="Facebook" required="required" name="twitter" type="text" id="twitter">
              </div>
            </div>
            <div class="form-group col-md-6 required ">
              <label for="" class="control-label">Instagram</label><span class="red">*</span>
              <div class="input-group">
                <div class="input-group-addon"><i class="demo-pli-instagram"></i></div>
                <input class="form-control" value="<?php echo $setapp->instagram;  ?>" placeholder="Facebook" required="required" name="instagram" type="text" id="instagram">
              </div>
            </div>
            <div class="form-group col-md-6 required ">
              <label for="" class="control-label">Youtube</label><span class="red">*</span>
              <div class="input-group">
                <div class="input-group-addon"><i class="ion-social-youtube-outline"></i></div>
                <input class="form-control" value="<?php echo $setapp->youtube;  ?>" placeholder="Facebook" required="required" name="youtube" type="text" id="youtube">
              </div>
            </div>
            <div class="form-group col-md-6 required ">
              <label for="" class="control-label">Logo</label><span class="red">*</span>
              <input type="file" value="<?php echo $setapp->logo; ?>" name="logo" id="userfile" onchange="tampilkanPreview(this,'preview')" />
              <p class="help-block">
                <?php //cek file apakah kosong?
                if (empty($setapp->logo)) {
                  echo 'Belum Ada File Logo Pada : ' . $setapp->nama_website;
                } else {
                  echo 'Gambar Saat Ini : ' . substr($setapp->logo, 0, 15);
                } ?>
              </p>
            </div>
            <div class="form-group col-md-6 required ">
              <label for="" class="control-label">Favicon</label><span class="red">*</span>
              <input type="file" value="<?php echo $setapp->favicon; ?>" name="favicon" id="userfile" onchange="tampilkanPreview1(this,'preview1')" />
              <p class="help-block">
                <?php //cek file apakah kosong?
                if (empty($setapp->favicon)) {
                  echo 'Belum Ada File Favicon Pada : ' . $setapp->nama_website;
                } else {
                  echo 'Gambar Saat Ini : ' . substr($setapp->favicon, 0, 15);
                } ?>
              </p>
            </div>

            <div class="form-group col-md-6 required ">
              <label for="" class="control-label"></label>Preview Logo
              <img src="<?php echo base_url('assets'); ?>/upload/images/<?php echo $setapp->logo;  ?>" id="preview" width="150px" height="150px" />
            </div>
            <div class="form-group col-md-6 required ">
              <label for="" class="control-label"></label>Preview Favicon
              <img src="<?php echo base_url('assets'); ?>/upload/images/<?php echo $setapp->favicon;  ?>" id="preview1" width="150px" height="150px" />
            </div>

          </div>
          <div class="modal-footer" style="margin-top: 550px">
            <button data-dismiss="modal" class="btn btn-danger btn-rounded" type="button">Close</button>
            <button class="btn btn-primary btn-rounded">Save changes</button> \
          </div>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
    <!-- End Modal Edit -->

  <?php } // end foreach 
  ?>
</div>
<!--===================================================-->
<!--End page content-->

<script type="text/javascript">
  function tampilkanPreview(userfile, idpreview) {
    var gb = userfile.files;
    for (var i = 0; i < gb.length; i++) {
      var gbPreview = gb[i];
      var imageType = /image.*/;
      var preview = document.getElementById(idpreview);
      var reader = new FileReader();
      if (gbPreview.type.match(imageType)) {
        //jika tipe data sesuai
        preview.file = gbPreview;
        reader.onload = (function(element) {
          return function(e) {
            element.src = e.target.result;
          };
        })(preview);
        //membaca data URL gambar
        reader.readAsDataURL(gbPreview);
      } else {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
    }
  }

  function tampilkanPreview1(userfile, idpreview1) {
    var gb = userfile.files;
    for (var i = 0; i < gb.length; i++) {
      var gbPreview1 = gb[i];
      var imageType = /image.*/;
      var preview1 = document.getElementById(idpreview1);
      var reader = new FileReader();
      if (gbPreview1.type.match(imageType)) {
        //jika tipe data sesuai
        preview1.file = gbPreview1;
        reader.onload = (function(element) {
          return function(e) {
            element.src = e.target.result;
          };
        })(preview1);
        //membaca data URL gambar
        reader.readAsDataURL(gbPreview1);
      } else {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
    }
  }
</script>