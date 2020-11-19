<div id="page-head">

<div id="page-title" class="pad-all text-center">
    <h3>Setting Screenshots - Admin</h3>
</div>
<!--Breadcrumb-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<ol class="breadcrumb text-center">
  <li><a href="<?php echo base_url('admin/home') ?>"><i class="demo-pli-home"></i></a></li>
  <li><a>Extra</a></li>
  <li><a>Setting Landing Pages</a></li>
  <li class="active">Screenshots</li>
</ol>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--End breadcrumb-->
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">

  <div class="row pad-btm">
      <div class="col-sm-6 toolbar-left" style="margin-bottom:15px">
          <button  data-target="#demo-default-modal-tambah" data-toggle="modal" class="btn btn-purple">Tambah</button>
          <a class="btn btn-default" href="<?php echo base_url('admin/s_landing_screenshots'); ?>"><i class="ti-reload"></i></a>
      </div>
      <button  data-target="#demo-default-modal-example" data-toggle="modal" class="btn btn-info btn-labeled pull-right"><i class="btn-label fa fa-warning"></i>Example</button>
  </div>
<?= $this->session->flashdata('flash'); ?>
  <div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Screenshots Aplikasi</h3>
    </div>

    <!-- Foo Table - Filtering -->
    <!--===================================================-->

    <div class="panel-body">
        <table id="demo-foo-filteringkategoriveb" class="table table-bordered table-hover toggle-circle" data-page-size="7">
            <thead>
                <tr>
                    <th data-toggle="true">Title</th>
                    <th data-hide="phone, tablet">Deskripsi</th>
                    <th data-hide="phone, tablet">Foto Desktop</th>
                    <th data-hide="phone, tablet">Foto Mobile</th>
                    <th data-hide="phone, tablet">Menu</th>
                </tr>
            </thead>
            <div class="pad-btm form-inline">
                <div class="row">
                    <div class="col-sm-6 text-xs-center">
                        <div class="form-group">
                            <!-- <label class="control-label">Status</label> -->
                            <select id="demo-foo-filter-status" class="form-control selectpicker">
                                <option value="">Show all</option>
                                <option value="active">Active</option>
                                <option value="non aktif">Non Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 text-xs-center text-right">
                        <div class="form-group">
                            <input id="demo-foo-search" type="text" placeholder="Search" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <tbody>
              <?php
              foreach( $tampilData->result() as $d ){ ?>
                <tr>
                    <td><?php echo $d->title ?></td>
                    <td><?php echo $d->deskripsi ?></td>
                    <td><img src="<?php echo base_url() ?>assets/upload/images/landing_pages/screenshots_app/<?php echo $d->img_desktop ?>" style="width:150px"></td>
                    <td><img src="<?php echo base_url() ?>assets/upload/images/landing_pages/screenshots_app/<?php echo $d->img_mobile ?>" style="width:150px"></td>
                    <td>
                      <button data-target="#demo-default-modal-edit<?php echo $d->id ?>" data-toggle="modal" class="btn btn-warning">Edit</button>
                      <button data-target="#demo-default-modal-hapus<?php echo $d->id ?>" data-toggle="modal" class="btn btn-danger">Hapus</button>
                    </td>
                </tr>

                <!-- Start Modal Hapus -->
                <div id="demo-default-modal-hapus<?php echo $d->id ?>" class="modal fade animated pulse">
                              <div class="modal-dialog ">
                                <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                      <h4 class="modal-title">Hapus Screenshots <b>(<?php echo $d->title ?>)</b></h4>
                                  </div>
                                  <div class="modal-body">

                                            <p>Apakah anda yakin ingin menghapus Screenshots <b> <?php echo $d->title; ?></b> ?</p>
                                  </div>
                                  <div class="modal-footer">
                                            <button class="btn btn-default btn-rounded" data-dismiss="modal" type="button">Close</button>
                                            <a class="btn btn-danger btn-rounded" href="<?php echo base_url('admin/s_landing_screenshots/Hapus/'. $d->id) ?>">Hapus Screenshots</a>
                                        </div>
                                </div>
                              </div>
                            </div>
                <!-- End Modal Hapus -->


                <!-- Start Modal Edit -->
                <?php echo form_open_multipart('admin/s_landing_screenshots/Edit'); ?>
                <div class="modal fade animated rotateInDownRight" id="demo-default-modal-edit<?php echo $d->id ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">

                   <!--Modal header-->
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                       <h4 class="modal-title">Edit Screenshots</h4>
                   </div>
                   <input type="text" name="id" value="<?php echo $d->id; ?>" />
                   <!--Modal body-->
                   <div class="modal-body" >

                                           <div class="form-group col-md-12 required ">
                                                  <label for="" class="control-label">Title</label><span class="red">*</span>
                                                  <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                                                    <input class="form-control" value="<?php echo $d->title ?>" placeholder="Title" required="required" name="title" type="text" id="title">
                                                  </div>
                                            </div>
                                            <div class="form-group col-md-12 required ">
                                                <label for="" class="control-label">Deskripsi</label><span class="red">*</span>
                  					                        <textarea id="demo-textarea-input" rows="9" class="form-control" required="required"  name="deskripsi" placeholder="Deskripsi.."><?php echo $d->deskripsi ?></textarea>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                 <label for="" class="control-label">Foto Desktop</label><span class="red">*</span>
                                                  <input  type="file" value="<?php echo $d->img_desktop ?>" name="img_desktop" id="userfile" onchange="tampilkanPreview2(this,'preview2')"/>
                                                  <p class="help-block">
                                                     <?php //cek file apakah kosong?
                                                     if (empty($d->img_desktop)) {
                                                       echo 'Belum Ada File Gambar Pada Item : '.$d->title ;
                                                     }else{
                                                       echo 'Gambar Saat Ini : '.substr($d->img_desktop,0,30);
                                                     }?>
                                                   </p>
                                             </div>
                                             <div class="form-group col-md-6 required ">
                                                  <label for="" class="control-label">Foto Mobile</label><span class="red">*</span>
                                                   <input  type="file" value="<?php echo $d->img_mobile ?>" name="img_mobile" id="userfile" onchange="tampilkanPreview3(this,'preview3')"/>
                                                   <p class="help-block">
                                                      <?php //cek file apakah kosong?
                                                      if (empty($d->img_mobile)) {
                                                        echo 'Belum Ada File Gambar Pada Item : '.$d->title ;
                                                      }else{
                                                        echo 'Gambar Saat Ini : '.substr($d->img_mobile,0,30);
                                                      }?>
                                                    </p>
                                              </div>
                                               <div class="form-group col-md-6 required ">
                                                 <label for="" class="control-label"></label>Preview Foto Desktop
                                                  <img id="preview2" src="<?php echo base_url()?>assets/upload/images/landing_pages/screenshots_app/<?php echo $d->img_desktop ?>" width="150px" />
                                               </div>
                                               <div class="form-group col-md-6 required ">
                                                 <label for="" class="control-label"></label>Preview Foto Mobile
                                                  <img id="preview3" src="<?php echo base_url()?>assets/upload/images/landing_pages/screenshots_app/<?php echo $d->img_mobile ?>" width="150px" />
                                               </div>

                   </div>
                   <!--Modal footer-->
                   <div class="modal-footer" style="margin-top: 610px">
                       <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
                       <button class="btn btn-primary btn-rounded">Save Changes</button>
                   </div>
                </div>
                </div>
                </div>
                <?php echo form_close(); ?>
                <!-- End Modal Edit -->


                <?php } // end foreach ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">
                        <div class="text-right">
                            <ul class="pagination"></ul>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <!--===================================================-->
    <!-- End Foo Table - Filtering -->
</div>

</div>




<!-- Start Modal Tambah -->
<?php echo form_open_multipart('admin/s_landing_screenshots/Tambah'); ?>
<div class="modal fade animated rotateInDownRight" id="demo-default-modal-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

   <!--Modal header-->
   <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
       <h4 class="modal-title">Tambah Screenshots</h4>
   </div>

   <!--Modal body-->
   <div class="modal-body" >

                           <div class="form-group col-md-12 required ">
                                  <label for="" class="control-label">Title</label><span class="red">*</span>
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                                    <input class="form-control" placeholder="Title" required="required" name="title" type="text" id="title">
                                  </div>
                            </div>
                            <div class="form-group col-md-12 required ">
                                <label for="" class="control-label">Deskripsi</label><span class="red">*</span>
  					                        <textarea id="demo-textarea-input" rows="9" class="form-control" required="required"  name="deskripsi" placeholder="Deskripsi.."></textarea>
                            </div>
                            <div class="form-group col-md-6 required ">
                                 <label for="" class="control-label">Foto Desktop</label><span class="red">*</span>
                                  <input  type="file" name="img_desktop" id="userfile" onchange="tampilkanPreview(this,'preview')"/>
                             </div>
                             <div class="form-group col-md-6 required ">
                                  <label for="" class="control-label">Foto Mobile</label><span class="red">*</span>
                                   <input  type="file" name="img_mobile" id="userfile" onchange="tampilkanPreview1(this,'preview1')"/>
                              </div>
                               <div class="form-group col-md-6 required ">
                                 <label for="" class="control-label"></label>Preview Foto Desktop
                                  <img id="preview" width="150px" />
                               </div>
                               <div class="form-group col-md-6 required ">
                                 <label for="" class="control-label"></label>Preview Foto Mobile
                                  <img id="preview1" width="150px" />
                               </div>

   </div>
   <!--Modal footer-->
   <div class="modal-footer" style="margin-top: 610px">
       <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
       <button class="btn btn-primary btn-rounded">Save</button>
   </div>
</div>
</div>
</div>
<?php echo form_close(); ?>
<!-- End Modal Tambah -->


<div class="modal fade animated rotateInDownRight" id="demo-default-modal-example" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

   <!--Modal header-->
   <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
       <h4 class="modal-title">Example</h4>
   </div>

   <!--Modal body-->
   <div class="modal-body" >
     <img class="img-responsive" src="<?php echo base_url()?>assets/upload/images/landing_pages/ss_sample.jpg" width="1005px" />
   </div>
   <!--Modal footer-->
   <div class="modal-footer" >
       <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
   </div>
</div>
</div>
</div>
