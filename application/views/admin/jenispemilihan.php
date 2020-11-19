<div id="page-head">

  <div id="page-title" class="pad-all text-center">
    <h3>Data Jenis Pemilihan - Admin</h3>
  </div>
  <!--Breadcrumb-->
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <ol class="breadcrumb text-center">
    <li><a href="<?php echo base_url('admin/home') ?>"><i class="demo-pli-home"></i></a></li>
    <li><a>Setting</a></li>
    <li class="active">Jenis Pemilihan/Surat Suara</li>
  </ol>
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <!--End breadcrumb-->
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">

  <!-- Cari -->
  <div class="row pad-btm">
    <div class="col-sm-6 toolbar-left">
      <button data-target="#demo-default-modal-tambah" data-toggle="modal" class="btn btn-purple">Tambah</button>
      <!-- <button data-target="#demo-default-modal-print" data-toggle="modal" class="btn btn-default"><i class="demo-pli-printer"></i></button> -->
    </div>
    <?php echo form_open_multipart('admin/jenispemilihan/CariData'); ?>
    <div class="col-sm-6 toolbar-right text-right">
      Search by :
      <div class="form-group">
        <?php if ($this->uri->segment(3) != 'CariData') { ?>
          <input type="text" placeholder="Nama Surat Suara" id="demo-inline-inputmail" name="nama_surat" class="form-control">
        <?php } ?>

        <?php if ($this->uri->segment(3) == 'CariData') {
          $nama_surat = $this->input->post('nama_surat'); ?>
          <input type="text" value="<?= $nama_surat ?>" placeholder="Nama Surat Suara" id="demo-inline-inputmail" name="nama_surat" class="form-control">
        <?php } ?>
      </div>
      <div class="select">
        <select id="demo-ease" class="selectpicker" name="active_surat">
          <?php if ($this->uri->segment(3)  == 'CariData') {
            $sts = $this->input->post('active_surat');
            if ($sts == '1') { ?>
              <option value="1" selected="selected">Aktif</option>
            <?php } else { ?>
              <option value="1">Aktif</option>
            <?php }
            if ($sts == '0') { ?>
              <option value="0" selected="selected">Non Aktif</option>
            <?php } else { ?>
              <option value="0">Non Aktif</option>
            <?php }
            if ($sts == '') { ?>
              <option value="" selected="selected">Pilih Status</option>
            <?php } ?>
          <?php } else { ?>
            <option selected="selected" disabled="disabled" value="">Pilih Status</option>
            <option value="1">Aktif</option>
            <option value="0">Non Aktif</option>
          <?php } ?>
        </select>
      </div>
      <button class="btn btn-default" style="margin-bottom:15px"><i class="ti-filter"></i> Filter</button>
      <a class="btn btn-default" style="margin-bottom:15px" href="<?php echo base_url('admin/jenispemilihan'); ?>"><i class="ti-reload"></i></a>
    </div>
  </div>
  <?php echo form_close(); ?>
  <?= $this->session->flashdata('flash'); ?>
  <div class="row">
    <div class="col-sm-12">
      <div class="row">

        <!--Profile Widget-->
        <!--===================================================-->
        <?php
        $bg_panel_warna = array();
        $bg_panel_warna[0] = "purple";
        $bg_panel_warna[1] = "warning";
        $bg_panel_warna[2] = "mint";
        $bg_panel_warna[3] = "dark";
        $urutan = 0;
        foreach ($tampilSuratSuara->result() as $surat) {
          if ($urutan == 4) {
            $urutan = 0;
          } ?>
          <div class="col-lg-3">
            <div class="panel widget">
              <div class="widget-header bg-<?php echo $bg_panel_warna[$urutan] ?> text-center">
                <span class="new-button pull-left">
                  <a href="<?= base_url('Cetak/cetakSuratSuara/' . $surat->id) ?>" class="btn btn-primary" target="__blank"><i class="demo-pli-printer"></i></a>
                </span>
                <!-- Peringaran Berakhir Pemilihan -->
                <?php
                //ambil data
                $tglsekarang = date('Y-m-d');
                $tglakhir    = $surat->akhir_surat;
                //ubah ke datetime
                $tgls = new DateTime($tglsekarang);
                $tgldata = new DateTime($tglakhir);
                //ke diff
                $datatgl = $tgls->diff($tgldata)->format("%d Hari, %m Bulan, %y Tahun");
                ?>

                <?php if ($datatgl == "0 Hari, 0 Bulan, 0 Tahun") { ?>
                  <span class="new-button pull-right">
                    <a data-toggle="modal" data-target="#demo-default-modal-akhir" class="btn btn-danger " href="">
                      <span class="ti-alert"></span>
                    </a>
                  </span>
                <?php } elseif ($tgldata < $tgls) { ?>
                  <span class="new-button pull-right">
                    <a data-toggle="modal" data-target="#demo-default-modal-akhir" class="btn btn-danger " href="">
                      <span class="ti-alert"></span>
                    </a>
                  </span>
                <?php } else { ?>
                  <!-- Kosong  -->
                <?php  } ?>
                <!-- Peringaran Berakhir Pemilihan End -->

                <h4 class="text-light mar-no pad-top"><?php echo $surat->nama_surat ?></h4>
                <p class="mar-btm"><?php if ($surat->active_surat == '1') {
                                      echo "Aktif";
                                    } else {
                                      echo "Non Aktif";
                                    } ?></p>
              </div>
              <div class="widget-body">
                <img alt="Profile Picture" class="widget-img img-circle img-border-light" src="<?php echo base_url() ?>assets/upload/images/foto_surat/<?php echo $surat->logo_surat ?>">
                <div class="list-group bg-trans mar-no">
                  <a class="list-group-item list-item-sm">
                    <span class="label label-success pull-right"><?php echo $surat->dimulai_surat ?></span>
                    Dimulai
                  </a>
                  <a class="list-group-item list-item-sm">
                    <span class="label label-danger pull-right"><?php echo $surat->akhir_surat ?></span>
                    Berakhir
                  </a>
                </div>
                <div class="mar-top text-center">
                  <button data-target="#demo-default-modal-edit<?php echo $surat->id ?>" data-toggle="modal" class="btn btn-mint">Edit</button>
                  <button data-target="#demo-default-modal-hapus<?php echo $surat->id ?>" data-toggle="modal" class="btn btn-danger">Hapus</button>
                </div>
              </div>
            </div>
          </div>
          <!--===================================================-->
          <!-- Start Modal Edit -->
          <?php echo form_open_multipart('admin/Jenispemilihan/Edit'); ?>
          <div class="modal fade animated rotateInDownRight" id="demo-default-modal-edit<?php echo $surat->id ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                  <h4 class="modal-title">Edit Surat Pemilihan</h4>
                </div>
                <input type="text" name="id" value="<?php echo $surat->id; ?>" />
                <!--Modal body-->
                <div class="modal-body">

                  <div class="form-group col-md-6 required ">
                    <label for="" class="control-label">Nama Surat Suara</label><span class="red">*</span>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                      <input class="form-control" placeholder="Nama Surat Suara" value="<?php echo $surat->nama_surat; ?>" required="required" name="nama_surat" type="text" id="nama_surat">
                    </div>
                  </div>
                  <div class="form-group col-md-6 required ">
                    <label for="" class="control-label">Status</label><span class="red">*</span>
                    <div class="input-group">
                      <div class="input-group-addon selectpicker"><i class="ti-check"></i></div>
                      <select class="form-control selectpicker" value="<?php echo $surat->active_surat; ?>" id="active_surat" name="active_surat">
                        <?php
                        if ($surat->active_surat == '1') { ?>
                          <option selected="selected" value="1">Aktif</option>
                          <option value="0">Non Aktif</option>
                        <?php } else { ?>
                          <option selected="selected" value="0">Non Aktif</option>
                          <option value="1">Aktif</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-6 required ">
                    <label for="" class="control-label">Dimulai Pemilihan</label><span class="red">*</span>
                    <div class="input-group" id="demo-dp-awalpemilihan">
                      <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                      <input class="form-control" placeholder="Dimulai Pemilihan" value="<?php echo $surat->dimulai_surat; ?>" required="required" name="dimulai_surat" type="text" id="dimulai_surat">
                    </div>
                  </div>
                  <div class="form-group col-md-6 required ">
                    <label for="" class="control-label">Akhir Pemilihan</label><span class="red">*</span>
                    <div class="input-group" id="demo-dp-akhirpemilihan">
                      <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                      <input class="form-control" placeholder="Akhir Pemilihan" value="<?php echo $surat->akhir_surat; ?>" required="required" name="akhir_surat" type="text" id="akhir_surat">
                    </div>
                  </div>
                  <div class="form-group col-md-6 required ">
                    <label for="" class="control-label">Foto Profile</label><span class="red">*</span>
                    <input type="file" value="<?php echo $surat->logo_surat; ?>" name="logo_surat1" id="userfile" onchange="tampilkanPreviewedit(this,'previewedit')" />
                    <p class="help-block">
                      <?php //cek file apakah kosong?
                      if (empty($surat->logo_surat)) {
                        echo 'Belum Ada File Gambar Pada Item : ' . $surat->nama_surat;
                      } else {
                        echo 'Gambar Saat Ini : ' . substr($surat->logo_surat, 0, 30);
                      } ?>
                    </p>
                  </div>
                  <div class="form-group col-md-6 required ">
                    <label for="" class="control-label"></label>Preview Logo
                    <img src="<?php echo base_url() ?>assets/upload/images/foto_surat/<?php echo $surat->logo_surat ?>" id="previewedit" width="150px" />
                  </div>
                </div>
                <!--Modal footer-->
                <div class="modal-footer" style="margin-top: 270px">
                  <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
                  <button class="btn btn-primary btn-rounded">Save Changes</button>
                </div>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>
          <!-- End Modal Edit -->


          <!-- Start Modal Hapus -->
          <div id="demo-default-modal-hapus<?php echo $surat->id ?>" class="modal fade animated pulse">
            <div class="modal-dialog ">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                  <h4 class="modal-title">Hapus Jenis Pemilhan/Surat Suara <b>(<?php echo $surat->nama_surat ?>)</b></h4>
                </div>
                <div class="modal-body">

                  <p>Apakah anda yakin ingin menghapus Jenis Pemilhan/Surat Suara <b> <?php echo $surat->nama_surat; ?></b> ?</p>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-default btn-rounded" data-dismiss="modal" type="button">Close</button>
                  <a class="btn btn-danger btn-rounded" href="<?php echo base_url('admin/Jenispemilihan/Hapus/' . $surat->id) ?>">Hapus Surat Suara</a>
                </div>
              </div>
            </div>
          </div>
          <!-- End Modal Hapus -->



        <?php $urutan++;
        } // end foreach 
        ?>

      </div>
    </div>
  </div>


</div>
<!--===================================================-->
<!--End page content-->


<!-- Start Modal Tambah -->
<?php echo form_open_multipart('admin/Jenispemilihan/Tambah'); ?>
<div class="modal fade animated rotateInDownRight" id="demo-default-modal-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--Modal header-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title">Tambah Surat Pemilihan</h4>
      </div>

      <!--Modal body-->
      <div class="modal-body">

        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Nama Surat Suara</label><span class="red">*</span>
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
            <input class="form-control" placeholder="Nama Surat Suara" required="required" name="nama_surat" type="text" id="nama_surat">
          </div>
        </div>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Status</label><span class="red">*</span>
          <div class="input-group">
            <div class="input-group-addon selectpicker"><i class="ti-check"></i></div>
            <select class="form-control selectpicker" id="active_surat" name="active_surat">
              <option value="">Pilih Status</option>
              <option value="1">Aktif</option>
              <option value="0">Non Aktif</option>
            </select>
          </div>
        </div>
        <?php $tglkuy = date('Y-m-d'); ?>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Dimulai Pemilihan</label><span class="red">*</span>
          <div class="input-group" id="demo-dp-awalpemilihan">
            <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
            <input class="form-control" placeholder="Dimulai Pemilihan" value="<?php echo $tglkuy ?>" required="required" name="dimulai_surat" type="text" id="dimulai_surat">
          </div>
        </div>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Akhir Pemilihan</label><span class="red">*</span>
          <div class="input-group" id="demo-dp-akhirpemilihan">
            <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
            <input class="form-control" placeholder="Akhir Pemilihan" required="required" name="akhir_surat" type="text" id="akhir_surat">
          </div>
        </div>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Logo Surat Suara</label><span class="red">*</span>
          <input type="file" name="logo_surat" id="userfile" onchange="tampilkanPreview(this,'preview')" />
        </div>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label"></label>Preview Logo
          <img id="preview" width="150px" />
        </div>
      </div>
      <!--Modal footer-->
      <div class="modal-footer" style="margin-top: 270px">
        <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
        <button class="btn btn-primary btn-rounded">Save</button>
      </div>
    </div>
  </div>
</div>
<?php echo form_close(); ?>
<!-- End Modal Tambah -->

<!--jQuery [ REQUIRED ]-->
<script src="<?php echo base_url('assets'); ?>/js/jquery.min.js"></script>
<script>
  $(document).ready(function() {


    $('#demo-dp-awalpemilihan input').datepicker({
      format: "yyyy-mm-dd",
      todayBtn: "linked",
      todayHighlight: true
    });

    $('#demo-dp-akhirpemilihan input').datepicker({
      format: "yyyy-mm-dd",
      todayBtn: "linked",
      todayHighlight: true
    });



  });
</script>
<script type="text/javascript">
  function tampilkanPreviewedit(userfile, idpreviewedit) {
    var gb = userfile.files;
    for (var i = 0; i < gb.length; i++) {
      var gbPreview = gb[i];
      var imageType = /image.*/;
      var preview = document.getElementById(idpreviewedit);
      var reader = new FileReader();
      if (gbPreviewedit.type.match(imageType)) {
        //jika tipe data sesuai
        previewedit.file = gbPreview;
        reader.onload = (function(element) {
          return function(e) {
            element.src = e.target.result;
          };
        })(previewedit);
        //membaca data URL gambar
        reader.readAsDataURL(gbPreview);
      } else {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
    }
  }
</script>