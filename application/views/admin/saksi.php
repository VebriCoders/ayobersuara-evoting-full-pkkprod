<div id="page-head">

  <div id="page-title" class="pad-all text-center">
    <h3>Data Saksi - Admin</h3>
  </div>
  <!--Breadcrumb-->
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <ol class="breadcrumb text-center">
    <li><a href="<?php echo base_url('admin/home') ?>"><i class="demo-pli-home"></i></a></li>
    <li><a>Master Data</a></li>
    <li class="active">Daftar Saksi</li>
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
      <a href="<?= base_url('Cetak/cetakSaksi/') ?>" class="btn btn-default" target="__blank"><i class="demo-pli-printer"></i></a>
    </div>
    <?php echo form_open_multipart('admin/saksi/CariData'); ?>
    <div class="col-sm-6 toolbar-right text-right">
      Search by :
      <div class="form-group">
        <?php if ($this->uri->segment(3) != 'CariData') { ?>
          <input type="text" placeholder="Nama Saksi" id="demo-inline-inputmail" name="nama_saksi" class="form-control">
        <?php } ?>

        <?php if ($this->uri->segment(3) == 'CariData') {
          $nama_saksi = $this->input->post('nama_saksi'); ?>
          <input type="text" value="<?= $nama_saksi ?>" placeholder="Nama Saksi" id="demo-inline-inputmail" name="nama_saksi" class="form-control">
        <?php } ?>
      </div>
      <div class="select">
        <select id="demo-ease" class="selectpicker" name="active">
          <?php if ($this->uri->segment(3)  == 'CariData') {
            $sts = $this->input->post('active');
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
      <a class="btn btn-default" style="margin-bottom:15px" href="<?php echo base_url('admin/saksi'); ?>"><i class="ti-reload"></i></a>
    </div>
  </div>
  <?php echo form_close(); ?>

  <?= $this->session->flashdata('flash'); ?>
  <!-- Data Out Query  -->
  <div class="row" style="margin-top:4px">
    <div class="col-sm-12">
      <div class="row">
        <!--Profile Widget-->
        <!--========================demo-psi-=======================-->
        <?php
        foreach ($tampilSaksi->result() as $saksi) { ?>
          <div class="col-lg-3">
            <div class="panel" style="height:420px;">
              <span class="new-button pull-left" style="margin-top:10px;margin-left:10px">
                <a href="https://api.whatsapp.com/send?phone=<?php echo $saksi->telp_saksi ?>" target="_blank" class="btn btn-success btn-icon" data-original-title="Whatsapp" data-container="body"><i class="ion-social-whatsapp-outline"></i></a>
              </span>
              <?php if ($saksi->active == '1') { ?>
                <span class="new-button pull-right" style="margin-top:10px;margin-right:10px">
                  <a data-toggle="modal" data-target="#demo-default-modal-vnonaktif<?php echo $saksi->id ?>" class="btn btn-mint" href="">
                    <span class="ti-check"></span>
                  </a>
                </span>
              <?php } else { ?>
                <span class="new-button pull-right" style="margin-top:10px;margin-right:10px">
                  <a data-toggle="modal" data-target="#demo-default-modal-vaktif<?php echo $saksi->id ?>" class="btn btn-danger " href="">
                    <span class="ti-close"></span>
                  </a>
                </span>
              <?php } ?>
              <div class="panel-body text-center bg-purple">
                <img alt="Avatar" class="img-lg img-circle img-border mar-btm" src="<?php echo base_url() ?>assets/upload/images/foto_saksi/<?php echo $saksi->photo ?>">

                <h4 class="text-light"><?php echo $saksi->nama_saksi ?></h4>
                <p class="text-sm">Kategori , <b><?php echo $saksi->manakat ?></b></p>
              </div>
              <div class="list-group bg-trans pad-btm">
                <a class="list-group-item"><i class="ti-eye icon-lg icon-fw"></i> Saksi Pemilihan : <?php echo $saksi->namasurat ?></a>
                <a class="list-group-item"><i class="ti-mobile icon-lg icon-fw"></i> Nomor Telpon/Wa : <?php echo $saksi->telp_saksi ?></a>
                <?php if ($saksi->active == '1') { ?>
                  <a class="list-group-item"><span class="label label-success pull-right">Akif</span><i class="ti-check-box icon-lg icon-fw"></i> Status</a>
                <?php } else { ?>
                  <a class="list-group-item"><span class="label label-danger pull-right">Non Akif</span><i class="ti-check-box icon-lg icon-fw"></i> Status</a>
                <?php } ?>
              </div>

              <div class="mar-top text-center">
                <button data-toggle="modal" data-target="#demo-default-modal-edit<?php echo $saksi->id ?>" class=" btn btn-success btn-rounded">
                  <span class="fa fa-pencil"> Edit</span>
                </button>
                &nbsp
                <button data-toggle="modal" data-target="#demo-default-modal-hapus<?php echo $saksi->id ?>" class=" btn btn-danger btn-rounded">
                  <span class="ion-trash-b"> Hapus</span>
                </button>
              </div>
            </div>
          </div>
        <?php } ?>
        <!--===================================================-->
      </div>
    </div>
  </div>
</div>
<!--===================================================-->
<!--End page content-->

<!-- foreach edit, hapus, active, non active -->
<?php
foreach ($tampilSaksi->result() as $saksi) { ?>


  <!-- Start Modal Edit -->
  <?php echo form_open_multipart('admin/Saksi/Edit'); ?>
  <div class="modal fade animated rotateInDownRight" id="demo-default-modal-edit<?php echo $saksi->id ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <!--Modal header-->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
          <h4 class="modal-title">Edit Saksi</h4>
        </div>
        <input type="text" name="id" value="<?php echo $saksi->id; ?>" />
        <!--Modal body-->
        <div class="modal-body">

          <div class="form-group col-md-6 required ">
            <label for="" class="control-label">Nama</label><span class="red">*</span>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
              <input class="form-control" placeholder="Nama Depan" value="<?php echo $saksi->nama_saksi; ?>" required="required" name="nama_saksi" type="text" id="nama_saksi">
            </div>
          </div>
          <div class="form-group col-md-6 required ">
            <label for="" class="control-label">Nomor Telpon</label><span class="red">*</span>
            <div class="input-group">
              <div class="input-group-addon"><i class="ti-mobile"></i></div>
              <input class="form-control" placeholder="Nomor Telpon" value="<?php echo $saksi->telp_saksi; ?>" required="required" name="telp_saksi" type="number" id="telp_saksi">
            </div>
          </div>
          <div class="form-group col-md-6 required ">
            <label for="" class="control-label">Alamat</label><span class="red">*</span>
            <textarea id="demo-textarea-input" rows="8" class="form-control" required="required" name="alamat_saksi" placeholder="Keterangan Kategori.."><?php echo $saksi->alamat_saksi; ?></textarea>
          </div>
          <div class="form-group col-md-6 required ">
            <label for="" class="control-label">Kategori Saksi</label><span class="red">*</span>
            <div class="input-group">
              <div class="input-group-addon selectpicker"><i class="ti-save-alt"></i></div>
              <select value="" <?php echo $saksi->kategori_saksi; ?> class="form-control selectpicker" id="kategori_saksi" name="kategori_saksi">
                <?php foreach ($joinKat_Saksi->result() as $tbl_kat_saksi) {
                  if ($tbl_kat_saksi->id == $saksi->kategori_saksi) {
                    echo "<option selected = 'selected' value='" . $tbl_kat_saksi->id . "'>" . $tbl_kat_saksi->nama_kategori . "</option>";
                  } else {
                    echo "<option value='" . $tbl_kat_saksi->id . "'>" . $tbl_kat_saksi->nama_kategori . "</option>";
                  }
                } ?>
              </select>
            </div>
          </div>
          <div class="form-group col-md-6 required ">
            <label for="" class="control-label">Saksi Jenis Pemilihan</label><span class="red">*</span>
            <div class="input-group">
              <div class="input-group-addon selectpicker"><i class="ti-book"></i></div>
              <select value="" <?php echo $saksi->saksi_pemilihan; ?> class="form-control selectpicker" id="saksi_pemilihan" name="saksi_pemilihan">
                <?php foreach ($joinKat_Surat->result() as $tbl_surat_suara) {
                  if ($tbl_surat_suara->id == $saksi->saksi_pemilihan) {
                    echo "<option selected = 'selected' value='" . $tbl_surat_suara->id . "'>" . $tbl_surat_suara->nama_surat . "</option>";
                  } else {
                    echo "<option value='" . $tbl_surat_suara->id . "'>" . $tbl_surat_suara->nama_surat . "</option>";
                  }
                } ?>
              </select>
            </div>
          </div>
          <div class="form-group col-md-6 required ">
            <label for="" class="control-label">Status</label><span class="red">*</span>
            <div class="input-group">
              <div class="input-group-addon selectpicker"><i class="ti-check"></i></div>

              <select class="form-control selectpicker" value="<?php echo $saksi->active; ?>" id="active" name="active">
                <?php
                if ($saksi->active == '1') { ?>
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
            <label for="" class="control-label">Foto Profile</label><span class="red">*</span>
            <input type="file" value="<?php echo $saksi->photo; ?>" name="photo" id="userfile" onchange="tampilkanPreview1(this,'preview1')" />
            <p class="help-block">
              <?php //cek file apakah kosong?
              if (empty($saksi->photo)) {
                echo 'Belum Ada File Gambar Pada Item : ' . $saksi->nama_saksi;
              } else {
                echo 'Gambar Saat Ini : ' . substr($saksi->photo, 0, 30);
              } ?>
            </p>
          </div>
          <div class="form-group col-md-6 required ">
            <label for="" class="control-label"></label>Preview Foto Profile
            <img id="preview1" src="<?php echo base_url() ?>assets/upload/images/foto_saksi/<?php echo $saksi->photo ?>" width="150px" />
          </div>
        </div>
        <!--Modal footer-->
        <div class="modal-footer" style="margin-top: 430px">
          <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
          <button class="btn btn-primary btn-rounded">Save Changes</button>
        </div>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
  <!-- End Modal Edit -->

  <!-- Start Modal Hapus -->
  <div id="demo-default-modal-hapus<?php echo $saksi->id ?>" class="modal fade animated pulse">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
          <h4 class="modal-title">Hapus Saksi <b>(<?php echo $saksi->namasurat ?>)</b></h4>
        </div>
        <div class="modal-body">

          <p>Apakah anda yakin ingin menghapus User <b> <?php echo $saksi->nama_saksi; ?></b> ?</p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default btn-rounded" data-dismiss="modal" type="button">Close</button>
          <a class="btn btn-danger btn-rounded" href="<?php echo base_url('admin/Saksi/Hapus/' . $saksi->id) ?>">Hapus Saksi</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal Hapus -->

  <!--Non Aktifkan User-->
  <?php echo form_open_multipart('admin/Saksi/vnonaktif'); ?>
  <div id="demo-default-modal-vnonaktif<?php echo $saksi->id ?>" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <input type="hidden" name="id" value="<?php echo $saksi->id; ?>" />
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
          <h4 class="modal-title" id="mySmallModalLabel">Non Aktifkan User</h4>
        </div>
        <div class="modal-body">
          <p1> Detail Saksi </p1>
          <p>Nama : <?php echo $saksi->nama_saksi ?> <br>
            Pemilihan : <?php echo $saksi->namasurat ?> <br>
            Kategori Saksi : <?php echo $saksi->manakat ?>
          </p>
        </div>
        <input class="form-control" placeholder="Nama Depan" value="<?php echo $saksi->nama_saksi; ?>" required="required" name="nama_saksi" type="hidden" id="nama_saksi">
        <div class="modal-footer">
          <button class="btn btn-danger btn-rounded">Non Aktifkan</button>
        </div>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
  <!--Non Aktifkan User-->

  <!-- Aktifkan User-->
  <?php echo form_open_multipart('admin/Saksi/vaktif'); ?>
  <div id="demo-default-modal-vaktif<?php echo $saksi->id ?>" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <input type="hidden" name="id" value="<?php echo $saksi->id; ?>" />
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
          <h4 class="modal-title" id="mySmallModalLabel">Aktifkan User</h4>
        </div>
        <div class="modal-body">
          <p1> Detail Saksi </p1>
          <p>Nama : <?php echo $saksi->nama_saksi ?> <br>
            Pemilihan : <?php echo $saksi->namasurat ?> <br>
            Kategori Saksi : <?php echo $saksi->manakat ?>
          </p>
        </div>
        <input class="form-control" placeholder="Nama Depan" value="<?php echo $saksi->nama_saksi; ?>" required="required" name="nama_saksi" type="hidden" id="nama_saksi">
        <div class="modal-footer">
          <button class="btn btn-success btn-rounded">Aktifkan</button>
        </div>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
  <!-- Aktifkan User-->

<?php } ?>
<!-- end foreach edit, hapus, active, non active -->



<!-- Start Modal Tambah -->
<?php echo form_open_multipart('admin/Saksi/Tambah'); ?>
<div class="modal fade animated rotateInDownRight" id="demo-default-modal-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--Modal header-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title">Tambah Saksi</h4>
      </div>

      <!--Modal body-->
      <div class="modal-body">

        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Nama</label><span class="red">*</span>
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
            <input class="form-control" placeholder="Nama Depan" required="required" name="nama_saksi" type="text" id="nama_saksi">
          </div>
        </div>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Nomor Telpon</label><span class="red">*</span>
          <div class="input-group">
            <div class="input-group-addon"><i class="ti-mobile"></i></div>
            <input class="form-control" placeholder="Nomor Telpon" value="62" required="required" name="telp_saksi" type="number" id="telp_saksi">
          </div>
        </div>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Alamat</label><span class="red">*</span>
          <textarea id="demo-textarea-input" rows="8" class="form-control" required="required" name="alamat_saksi" placeholder="Keterangan Kategori.."></textarea>
        </div>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Kategori Saksi</label><span class="red">*</span>
          <div class="input-group">
            <div class="input-group-addon selectpicker"><i class="ti-save-alt"></i></div>
            <select class="form-control selectpicker" id="kategori_saksi" name="kategori_saksi" required="required">
              <option value="">Pilih Kategori Saksi</option>
              <?php foreach ($joinKat_Saksi->result() as $tbl_kat_saksi) { ?>
                <option value="<?php echo $tbl_kat_saksi->id; ?>"><?php echo $tbl_kat_saksi->nama_kategori; ?> </option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Saksi Jenis Pemilihan</label><span class="red">*</span>
          <div class="input-group">
            <div class="input-group-addon selectpicker"><i class="ti-book"></i></div>
            <select class="form-control selectpicker" id="saksi_pemilihan" name="saksi_pemilihan" required="required">
              <option value="">Pilih Jenis Pemilihan</option>
              <?php foreach ($joinKat_Surat->result() as $tbl_surat_suara) { ?>
                <option value="<?php echo $tbl_surat_suara->id; ?>"><?php echo $tbl_surat_suara->nama_surat; ?> </option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Status</label><span class="red">*</span>
          <div class="input-group">
            <div class="input-group-addon selectpicker"><i class="ti-check"></i></div>
            <select class="form-control selectpicker" id="active" name="active" required="required">
              <option value="">Pilih Status</option>
              <option value="1">Aktif</option>
              <option value="0">Non Aktif</option>
            </select>
          </div>
        </div>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Foto Profile</label><span class="red">*</span>
          <input type="file" name="photo" id="userfile" onchange="tampilkanPreview(this,'preview')" />
        </div>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label"></label>Preview Foto Profile
          <img id="preview" width="150px" />
        </div>
      </div>
      <!--Modal footer-->
      <div class="modal-footer" style="margin-top: 430px">
        <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
        <button class="btn btn-primary btn-rounded">Save</button>
      </div>
    </div>
  </div>
</div>
<?php echo form_close(); ?>
<!-- End Modal Tambah -->