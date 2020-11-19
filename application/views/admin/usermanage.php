<div id="page-head">

  <div id="page-title" class="pad-all text-center">
    <h3>User Management - Admin</h3>
  </div>
  <!--Breadcrumb-->
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <ol class="breadcrumb text-center">
    <li><a href="<?php echo base_url('admin/home') ?>"><i class="demo-pli-home"></i></a></li>
    <li><a>Setting</a></li>
    <li class="active">User Management</li>
  </ol>
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <!--End breadcrumb-->
</div>

<!--Page content-->
<div id="page-content">


  <!-- Cari -->
  <div class="row pad-btm">
    <div class="col-sm-6 toolbar-left">
      <button data-target="#demo-default-modal-tambah" data-toggle="modal" class="btn btn-purple">Tambah</button>
      <!-- <button data-target="#demo-default-modal-print" data-toggle="modal" class="btn btn-default"><i class="demo-pli-printer"></i></button> -->
    </div>
    <?php echo form_open_multipart('admin/usermanage/CariData'); ?>
    <div class="col-sm-6 toolbar-right text-right">
      Search by :
      <div class="form-group">
        <?php if ($this->uri->segment(3) != 'CariData') { ?>
          <input type="email" placeholder="Email" id="demo-inline-inputmail" name="email" class="form-control">
        <?php } ?>

        <?php if ($this->uri->segment(3) == 'CariData') {
          $email = $this->input->post('email'); ?>
          <input type="email" value="<?= $email ?>" placeholder="Email" id="demo-inline-inputmail" name="email" class="form-control">
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
      <a class="btn btn-default" style="margin-bottom:15px" href="<?php echo base_url('admin/usermanage'); ?>"><i class="ti-reload"></i></a>
    </div>
  </div>
  <?php echo form_close(); ?>

  <?= $this->session->flashdata('flash'); ?>
  <!-- Data Out Query  -->
  <div class="row">
    <div class="col-sm-12">
      <div class="row">
        <?php
        foreach ($tampilUserRole->result() as $user) { ?>
          <div class="col-lg-3">
            <div class="panel" style="height:280px;">
              <?php if ($user->id == '1') { ?>
                <span class="new-button pull-right" style="margin-top:10px;margin-right:10px">
                  <button disabled="disabled" class="btn btn-success">
                    <span class="ti-lock"></span>
                  </button>
                </span>
              <?php } else { ?>
                <?php if ($user->active == '1') { ?>
                  <span class="new-button pull-right" style="margin-top:10px;margin-right:10px">
                    <a data-toggle="modal" data-target="#demo-default-modal-vnonaktif<?php echo $user->id ?>" class="btn btn-mint" href="">
                      <span class="ti-check"></span>
                    </a>
                  </span>
                <?php } else { ?>
                  <span class="new-button pull-right" style="margin-top:10px;margin-right:10px">
                    <a data-toggle="modal" data-target="#demo-default-modal-vaktif<?php echo $user->id ?>" class="btn btn-danger " href="">
                      <span class="ti-close"></span>
                    </a>
                  </span>
                <?php } ?>
              <?php } ?>
              <div class="panel-body text-center">
                <img alt="Profile Picture" class="img-lg img-circle mar-btm" src="<?php echo base_url() ?>assets/upload/images/foto_profil/<?php echo $user->photo ?>" style="margin-left:50px">
                <p class="text-lg text-semibold mar-no text-main"><?php echo $user->first_name ?> <?php echo $user->last_name ?> <b>(<?php echo $user->namarole ?>)</b></p>
                <p class="text-muted"> Username : <b><?php echo $user->username ?></b> <br>
                  Email : <?php echo $user->email ?> <br>
                  No.Telepon : <?php echo $user->phone ?> <br>
                </p>
                <?php if ($user->id == '1') { ?>
                  <?php echo 'User Locked' ?>
                <?php } else { ?>
                  <div class="mar-top">
                    <button data-target="#demo-default-modal-edit<?php echo $user->id ?>" data-toggle="modal" class="btn btn-mint">Edit</button>
                    <?php if (empty($user->password)) { ?>
                      <button data-target="#demo-default-modal-pswd<?php echo $user->id ?>" data-toggle="modal" class="btn btn-success">Tambah Password</button>
                    <?php } else { ?>
                      <button data-target="#demo-default-modal-pswd<?php echo $user->id ?>" data-toggle="modal" class="btn btn-success">Ubah Password</button>
                    <?php } ?>
                    <button data-target="#demo-default-modal-hapus<?php echo $user->id ?>" data-toggle="modal" class="btn btn-danger">Hapus</button>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>


          <!-- Start Modal Edit -->
          <?php echo form_open_multipart('admin/Usermanage/Edit'); ?>
          <div class="modal fade animated rotateInDownRight" id="demo-default-modal-edit<?php echo $user->id ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                  <h4 class="modal-title">Tambah User</h4>
                </div>
                <input type="hidden" name="id" value="<?php echo $user->id; ?>" />
                <!--Modal body-->
                <div class="modal-body">

                  <div class="form-group col-md-6 required ">
                    <label for="" class="control-label">Nama Depan</label><span class="red">*</span>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                      <input class="form-control" placeholder="Nama Depan" value="<?php echo $user->first_name; ?>" required="required" name="first_name" type="text" id="first_name">
                    </div>
                  </div>
                  <div class="form-group col-md-6 required ">
                    <label for="" class="control-label">Nama Belakang</label><span class="red">*</span>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                      <input class="form-control" placeholder="Nama Belakang" value="<?php echo $user->last_name; ?>" required="required" name="last_name" type="text" id="last_name">
                    </div>
                  </div>
                  <div class="form-group col-md-6 required ">
                    <label for="" class="control-label">Username</label><span class="red">*</span>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                      <input class="form-control" placeholder="Username" value="<?php echo $user->username; ?>" required="required" name="username" type="text" id="username">
                    </div>
                  </div>
                  <div class="form-group col-md-6 required ">
                    <label for="" class="control-label">Email</label><span class="red">*</span>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="ti-email"></i></div>
                      <input class="form-control" placeholder="Email" value="<?php echo $user->email; ?>" required="required" name="email" type="email" id="email">
                    </div>
                  </div>
                  <div class="form-group col-md-6 required ">
                    <label for="" class="control-label">Nomor Telpon</label><span class="red">*</span>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="ti-mobile"></i></div>
                      <input class="form-control" placeholder="Nomor Telpon" value="<?php echo $user->phone; ?>" required="required" name="phone" type="number" id="phone">
                    </div>
                  </div>
                  <div class="form-group col-md-6 required ">
                    <label for="" class="control-label">Role</label><span class="red">*</span>
                    <div class="input-group">
                      <div class="input-group-addon selectpicker"><i class="ti-crown"></i></div>
                      <select value="" <?php echo $user->id_role; ?> class="form-control selectpicker" id="id_role" name="id_role">
                        <?php foreach ($joinRole->result() as $tbl_role) {
                          if ($tbl_role->id == $user->id_role) {
                            echo "<option selected = 'selected' value='" . $tbl_role->id . "'>" . $tbl_role->name . "</option>";
                          } else {
                            echo "<option value='" . $tbl_role->id . "'>" . $tbl_role->name . "</option>";
                          }
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-6 required ">
                    <label for="" class="control-label">Status</label><span class="red">*</span>
                    <div class="input-group">
                      <div class="input-group-addon selectpicker"><i class="ti-check"></i></div>

                      <select class="form-control selectpicker" value="<?php echo $user->active; ?>" id="active" name="active">
                        <?php
                        if ($user->active == '1') { ?>
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
                    <input type="file" value="<?php echo $user->photo; ?>" name="photo" id="userfile" onchange="tampilkanPreview1(this,'preview1')" />
                    <p class="help-block">
                      <?php //cek file apakah kosong?
                      if (empty($user->photo)) {
                        echo 'Belum Ada File Gambar Pada Item : ' . $user->username;
                      } else {
                        echo 'Gambar Saat Ini : ' . substr($user->photo, 0, 30);
                      } ?>
                    </p>
                  </div>
                  <div class="form-group col-md-6 required ">
                  </div>
                  <div class="form-group col-md-6 required ">
                    <label for="" class="control-label"></label>Preview Foto Profile
                    <img src="<?php echo base_url() ?>assets/upload/images/foto_profil/<?php echo $user->photo ?>" id="preview1" width="150px" />
                  </div>
                </div>
                <!--Modal footer-->
                <div class="modal-footer" style="margin-top: 470px">
                  <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
                  <button class="btn btn-primary btn-rounded">Save Changes</button>
                </div>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>
          <!-- End Modal Edit -->

          <!-- Start Modal Hapus -->
          <div id="demo-default-modal-hapus<?php echo $user->id ?>" class="modal fade animated pulse">
            <div class="modal-dialog ">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                  <h4 class="modal-title">Hapus User <b>(<?php echo $user->namarole ?>)</b></h4>
                </div>
                <div class="modal-body">

                  <p>Apakah anda yakin ingin menghapus User <b> <?php echo $user->username; ?></b> ?</p>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-default btn-rounded" data-dismiss="modal" type="button">Close</button>
                  <a class="btn btn-danger btn-rounded" href="<?php echo base_url('admin/Usermanage/Hapus/' . $user->id) ?>">Hapus User</a>
                </div>
              </div>
            </div>
          </div>
          <!-- End Modal Hapus -->


          <!-- Start Modal Pswd -->
          <?php echo form_open_multipart('admin/Usermanage/Pswd'); ?>
          <div id="demo-default-modal-pswd<?php echo $user->id ?>" class="modal fade animated pulse">
            <div class="modal-dialog ">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                  <h4 class="modal-title">Ubah Password User <b>(<?php echo $user->namarole ?>)</b></h4>
                </div>
                <input type="hidden" name="id" value="<?php echo $user->id; ?>" />
                <div class="modal-body">
                  <!-- Alret -->
                  <div class="alert alert-danger">
                    <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                    <strong>Password Tidak Boleh Terlalu Pendek Kombinasikan Dengan Angka atau Simbol</strong>
                  </div>

                  <!-- end alret -->
                  <div class="form-group col-md-12 required ">
                    <label for="" class="control-label">Pasword Untuk </label><span class="red">*</span><b> <?php echo $user->username ?></b>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="ti-key"></i></div>
                      <input class="form-control frmpswd" placeholder="Pasword Baru" required="required" required minlength="5" name="password" type="password" id="password">
                    </div>
                  </div>
                  <div class="form-group col-md-12 ">
                    <div class="checkbox">
                      <input id="demo-form-checkbox-2" class="magic-checkbox ckpswd" type="checkbox">
                      <label for="demo-form-checkbox-2">Show Password</label>
                    </div>
                  </div>
                </div>
                <input class="form-control" placeholder="Username" value="<?php echo $user->username; ?>" required="required" name="username" type="hidden" id="username">

                <div class="modal-footer" style="margin-top: 100px">
                  <button class="btn btn-default btn-rounded" data-dismiss="modal" type="button">Close</button>
                  <button class="btn btn-success btn-rounded">Ubah Password</button>
                </div>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>
          <!-- End Modal Pswd -->

          <!--Non Aktifkan User-->
          <?php echo form_open_multipart('admin/Usermanage/vnonaktif'); ?>
          <div id="demo-default-modal-vnonaktif<?php echo $user->id ?>" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <input type="hidden" name="id" value="<?php echo $user->id; ?>" />
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                  <h4 class="modal-title" id="mySmallModalLabel">Non Aktifkan User</h4>
                </div>
                <div class="modal-body">
                  <p1> Detail User </p1>
                  <p>Username : <?php echo $user->username ?> <br>
                    Email : <?php echo $user->email ?>
                  </p>
                </div>
                <input class="form-control" placeholder="Username" value="<?php echo $user->username; ?>" required="required" name="username" type="hidden" id="username">

                <div class="modal-footer">
                  <button class="btn btn-danger btn-rounded">Non Aktifkan</button>
                </div>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>
          <!--Non Aktifkan User-->

          <!-- Aktifkan User-->
          <?php echo form_open_multipart('admin/Usermanage/vaktif'); ?>
          <div id="demo-default-modal-vaktif<?php echo $user->id ?>" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <input type="hidden" name="id" value="<?php echo $user->id; ?>" />
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                  <h4 class="modal-title" id="mySmallModalLabel">Aktifkan User</h4>
                </div>
                <div class="modal-body">
                  <p1> Detail User </p1>
                  <p>Username : <?php echo $user->username ?> <br>
                    Email : <?php echo $user->email ?>
                  </p>
                </div>
                <input class="form-control" placeholder="Username" value="<?php echo $user->username; ?>" required="required" name="username" type="hidden" id="username">

                <div class="modal-footer">
                  <button class="btn btn-success btn-rounded">Aktifkan</button>
                </div>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>
          <!-- Aktifkan User-->



        <?php } // end foreach 
        ?>
      </div>
    </div>
  </div>

</div>
<!--===================================================-->
<!--End page content-->

<!-- Start Modal Tambah -->
<?php echo form_open_multipart('admin/Usermanage/Tambah'); ?>
<div class="modal fade animated rotateInDownRight" id="demo-default-modal-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--Modal header-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title">Tambah User</h4>
      </div>

      <!--Modal body-->
      <div class="modal-body">

        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Nama Depan</label><span class="red">*</span>
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
            <input class="form-control" placeholder="Nama Depan" required="required" name="first_name" type="text" id="first_name">
          </div>
        </div>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Nama Belakang</label><span class="red">*</span>
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
            <input class="form-control" placeholder="Nama Belakang" required="required" name="last_name" type="text" id="last_name">
          </div>
        </div>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Username</label><span class="red">*</span>
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
            <input class="form-control" placeholder="Username" required="required" name="username" type="text" id="username">
          </div>
        </div>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Email</label><span class="red">*</span>
          <div class="input-group">
            <div class="input-group-addon"><i class="ti-email"></i></div>
            <input class="form-control" placeholder="Email" required="required" name="email" type="email" id="email">
          </div>
        </div>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Password</label><span class="red">*</span>
          <div class="input-group">
            <div class="input-group-addon"><i class="ti-key"></i></div>
            <input class="form-control" placeholder="Password" required="required" required minlength="5" name="password" type="password" id="password">
          </div>
        </div>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Nomor Telpon</label><span class="red">*</span>
          <div class="input-group">
            <div class="input-group-addon"><i class="ti-mobile"></i></div>
            <input class="form-control" placeholder="Nomor Telpon" required="required" name="phone" type="number" id="phone">
          </div>
        </div>
        <div class="form-group col-md-6 required ">
          <label for="" class="control-label">Role</label><span class="red">*</span>
          <div class="input-group">
            <div class="input-group-addon selectpicker"><i class="ti-crown"></i></div>
            <select class="form-control selectpicker" id="id_role" name="id_role" required="required">
              <option value="">Pilih Role</option>
              <?php foreach ($joinRole->result() as $tbl_role) { ?>
                <option value="<?php echo $tbl_role->id; ?>"><?php echo $tbl_role->name; ?> </option>
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
            <select class="form-control selectpicker" id="active" name="active">
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


<!--jQuery [ REQUIRED ]-->
<script src="<?php echo base_url('assets'); ?>/js/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.ckpswd').click(function() {
      if ($(this).is(':checked')) {
        $('.frmpswd').attr('type', 'text');
      } else {
        $('.frmpswd').attr('type', 'password');
      }
    });
  });
</script>