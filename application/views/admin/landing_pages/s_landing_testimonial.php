<div id="page-head">

<div id="page-title" class="pad-all text-center">
    <h3>Setting Testimonial User - Admin</h3>
</div>
<!--Breadcrumb-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<ol class="breadcrumb text-center">
  <li><a href="<?php echo base_url('admin/home') ?>"><i class="demo-pli-home"></i></a></li>
  <li><a>Extra</a></li>
  <li><a>Setting Landing Pages</a></li>
  <li class="active">Testimonial User</li>
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
          <a class="btn btn-default" href="<?php echo base_url('admin/s_landing_testimonial'); ?>"><i class="ti-reload"></i></a>
      </div>
      <button  data-target="#demo-default-modal-example" data-toggle="modal" class="btn btn-info btn-labeled pull-right"><i class="btn-label fa fa-warning"></i>Example</button>
  </div>
  <?= $this->session->flashdata('flash'); ?>

  <div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Testimonial Aplikasi</h3>
    </div>

    <!-- Foo Table - Filtering -->
    <!--===================================================-->

    <div class="panel-body">
        <table id="demo-foo-filteringkategoriveb" class="table table-bordered table-hover toggle-circle" data-page-size="7">
            <thead>
                <tr>
                    <th data-toggle="true">Nama</th>
                    <th data-hide="phone, tablet">Testimoni</th>
                    <th data-hide="phone, tablet">Foto</th>
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
                    <td><?php echo $d->nama ?></td>
                    <td><?php echo $d->testimoni ?></td>
                    <td><img src="<?php echo base_url() ?>assets/upload/images/landing_pages/testimoni_client/<?php echo $d->photo ?>" style="width:150px"></td>
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
                                      <h4 class="modal-title">Hapus Testimonial <b>(<?php echo $d->nama ?>)</b></h4>
                                  </div>
                                  <div class="modal-body">

                                            <p>Apakah anda yakin ingin menghapus Testimonial <b> <?php echo $d->nama; ?></b> ?</p>
                                  </div>
                                  <div class="modal-footer">
                                            <button class="btn btn-default btn-rounded" data-dismiss="modal" type="button">Close</button>
                                            <a class="btn btn-danger btn-rounded" href="<?php echo base_url('admin/s_landing_testimonial/Hapus/'. $d->id) ?>">Hapus Testimonial</a>
                                        </div>
                                </div>
                              </div>
                            </div>
                <!-- End Modal Hapus -->


                <!-- Start Modal Edit -->
                <?php echo form_open_multipart('admin/s_landing_testimonial/Edit'); ?>
                <div class="modal fade animated rotateInDownRight" id="demo-default-modal-edit<?php echo $d->id ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">

                   <!--Modal header-->
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                       <h4 class="modal-title">Edit Testimonial</h4>
                   </div>
                   <input type="text" name="id" value="<?php echo $d->id; ?>" />
                   <!--Modal body-->
                   <div class="modal-body" >

                                           <div class="form-group col-md-12 required ">
                                                  <label for="" class="control-label">Nama</label><span class="red">*</span>
                                                  <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                                                    <input class="form-control" value="<?php echo $d->nama ?>" placeholder="Nama" required="required" name="nama" type="text" id="nama">
                                                  </div>
                                            </div>
                                            <div class="form-group col-md-12 required ">
                                                <label for="" class="control-label">Testimoni</label><span class="red">*</span>
                  					                        <textarea id="demo-textarea-input" rows="3" class="form-control" required="required"  name="testimoni" placeholder="Testimoni.."><?php echo $d->testimoni ?></textarea>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                 <label for="" class="control-label">Photo Client</label><span class="red">*</span>
                                                  <input  type="file" value="<?php echo $d->photo ?>" name="photo" id="userfile" onchange="tampilkanPreview2(this,'preview2')"/>
                                                  <p class="help-block">
                                                     <?php //cek file apakah kosong?
                                                     if (empty($d->photo)) {
                                                       echo 'Belum Ada File Gambar Pada Item : '.$d->nama ;
                                                     }else{
                                                       echo 'Gambar Saat Ini : '.substr($d->photo,0,30);
                                                     }?>
                                                   </p>
                                             </div>
                                               <div class="form-group col-md-6 required ">
                                                 <label for="" class="control-label"></label>Preview Foto CLient
                                                  <img id="preview2" src="<?php echo base_url()?>assets/upload/images/landing_pages/testimoni_client/<?php echo $d->photo ?>" width="150px" />
                                               </div>

                   </div>
                   <!--Modal footer-->
                   <div class="modal-footer" style="margin-top: 350px">
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
<?php echo form_open_multipart('admin/s_landing_testimonial/Tambah'); ?>
<div class="modal fade animated rotateInDownRight" id="demo-default-modal-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

   <!--Modal header-->
   <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
       <h4 class="modal-title">Tambah Testimonial</h4>
   </div>

   <!--Modal body-->
   <div class="modal-body" >

                           <div class="form-group col-md-12 required ">
                                  <label for="" class="control-label">Nama</label><span class="red">*</span>
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                                    <input class="form-control" placeholder="Nama" required="required" name="nama" type="text" id="nama">
                                  </div>
                            </div>
                            <div class="form-group col-md-12 required ">
                                <label for="" class="control-label">Testimoni</label><span class="red">*</span>
  					                        <textarea id="demo-textarea-input" rows="3" class="form-control" required="required"  name="testimoni" placeholder="Testimoni.."></textarea>
                            </div>
                            <div class="form-group col-md-6 required ">
                                 <label for="" class="control-label">Foto CLient</label><span class="red">*</span>
                                  <input  type="file" name="photo" id="userfile" onchange="tampilkanPreview(this,'preview')"/>
                             </div>
                               <div class="form-group col-md-6 required ">
                                 <label for="" class="control-label"></label>Preview Foto Client
                                  <img id="preview" width="150px" />
                               </div>

   </div>
   <!--Modal footer-->
   <div class="modal-footer" style="margin-top: 350px">
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
     <img class="img-responsive" src="<?php echo base_url()?>assets/upload/images/landing_pages/ss_testimoni.jpg" width="1005px" />
   </div>
   <!--Modal footer-->
   <div class="modal-footer" >
       <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
   </div>
</div>
</div>
</div>
