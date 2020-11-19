<div id="page-head">

<div id="page-title" class="pad-all text-center">
    <h3>Setting Tagline - Admin</h3>
</div>
<!--Breadcrumb-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<ol class="breadcrumb text-center">
  <li><a href="<?php echo base_url('admin/home') ?>"><i class="demo-pli-home"></i></a></li>
  <li><a>Extra</a></li>
  <li><a>Setting Landing Pages</a></li>
  <li class="active">Tagline</li>
</ol>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--End breadcrumb-->
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">
  <?= $this->session->flashdata('flash'); ?>
<div class="row">
  <div class="col-sm-6">
  					        <div class="panel">
  					            <div class="panel-heading">
  					                <h3 class="panel-title">Tagline <button  data-target="#demo-default-modal-tambah" data-toggle="modal" class="btn btn-purple pull-right" style="margin-top:10px">Tambah</button> </h3>

  					            </div>

  					            <!--Bordered Table-->
  					            <!--===================================================-->
  					            <div class="panel-body">
  					                <div class="table-responsive">
  					                    <table class="table table-bordered">
  					                        <thead>
  					                            <tr>
  					                                <th class="text-center">No.</th>
  					                                <th>Tagline</th>
  					                                <th>Action</th>
  					                            </tr>
  					                        </thead>
  					                        <tbody>
                                      <?php
                                      $number=1;
                                      foreach( $tampilTagline->result() as $tg ){ ?>
  					                            <tr>
  					                                <td class="text-center"><?php echo $number ?>.</td>
  					                                <td><?php echo $tg->tagline ?></td>
  					                                <td>
                                              <button data-target="#demo-default-modal-edit<?php echo $tg->id ?>" data-toggle="modal" class="btn btn-warning btn-sm">Edit</button>
                                              <button data-target="#demo-default-modal-hapus<?php echo $tg->id ?>" data-toggle="modal" class="btn btn-danger btn-sm">Hapus</button>
                                            </td>
  					                            </tr>
                                        <?php $number++;} // end foreach ?>
  					                        </tbody>
  					                    </table>
  					                </div>
  					            </div>
  					            <!--===================================================-->
  					            <!--End Bordered Table-->

  					        </div>
  					    </div>

                <div class="col-sm-6">
                					        <div class="panel">
                					            <div class="panel-heading">
                					                <h3 class="panel-title">Example </h3>

                					            </div>

                					            <!--Bordered Table-->
                					            <!--===================================================-->
                					            <div class="panel-body">
                                        <img class="img-responsive" src="<?php echo base_url()?>assets/upload/images/landing_pages/SETTINGTABLINE.jpg" width="775px" />
                					            </div>
                					            <!--===================================================-->
                					            <!--End Bordered Table-->

                					        </div>
                					    </div>



      </div>


      <div class="row">


        <div class="col-sm-6">
          <div class="panel">
            <?php echo form_open_multipart('admin/S_landing_tagline/Edit_Img'); ?>
                <div class="panel-heading">
                <h3 class="panel-title">Tagline Img
                  <button class="btn btn-purple pull-right" style="margin-top:10px">Edit</button>
                 </h3>
                </div>
                <div class="panel-body">
                <?php
                foreach( $tampilTaglineImg->result() as $img ){ ?>
                <input type="hidden" name="id" value="<?php echo $img->id; ?>" readonly/>
                <div class="form-group col-md-6 required ">
                     <label for="" class="control-label">Img Desktop</label><span class="red">*</span>
                      <input  type="file" value="<?php echo $img->desktop; ?>" name="desktop" id="userfile" onchange="tampilkanPreview(this,'preview')"/>
                      <p class="help-block">
                         <?php
                           echo 'Gambar Saat Ini : '.substr($img->desktop,0,30);
                         ?>
                       </p>
                 </div>
                 <div class="form-group col-md-6 " style="margin-top:11px">
                   <p><i class="ti-image icon-lg icon-fw"></i> Img Desktop : <?php echo $img->desktop;  ?></p>
                    <img id="preview" src="<?php echo base_url()?>assets/upload/images/landing_pages/tagline_img/<?php echo $img->desktop ?>" width="150px" />
                 </div>


                 <div class="form-group col-md-6 required">
                      <label for="" class="control-label">Img Mobile</label><span class="red">*</span>
                       <input  type="file" value="<?php echo $img->mobile; ?>" name="mobile" id="userfile" onchange="tampilkanPreview1(this,'preview1')"/>
                       <p class="help-block">
                          <?php
                            echo 'Gambar Saat Ini : '.substr($img->mobile,0,30);
                          ?>
                        </p>
                  </div>
                  <div class="form-group col-md-6 ">
                    <p><i class="ti-image icon-lg icon-fw"></i> Img Mobile : <?php echo $img->mobile;  ?></p>
                     <img id="preview1" src="<?php echo base_url()?>assets/upload/images/landing_pages/tagline_img/<?php echo $img->mobile ?>" width="150px" />
                  </div>

                 <?php } // end foreach ?>
                 </div>
                 <?php echo form_close(); ?>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="panel">
            <?php echo form_open_multipart('admin/S_landing_tagline/Edit_Img_logo'); ?>
                <div class="panel-heading">
                <h3 class="panel-title">Logo Img
                  <button class="btn btn-purple pull-right" style="margin-top:10px">Edit</button>
                 </h3>
                </div>
                <div class="panel-body">
                <?php
                foreach( $tampilTaglineImg->result() as $img ){ ?>
                <input type="hidden" name="id" value="<?php echo $img->id; ?>" readonly/>

                  <div class="form-group col-md-6 required ">
                       <label for="" class="control-label">logo 1 (Satu Warna)</label><span class="red">*</span>
                        <input  type="file" value="<?php echo $img->logo; ?>" name="logo" id="userfile" onchange="tampilkanPreview2(this,'preview2')"/>
                        <p class="help-block">
                           <?php
                             echo 'Gambar Saat Ini : '.substr($img->logo,0,30);
                           ?>
                         </p>
                   </div>
                   <div class="form-group col-md-6 " style="margin-bottom:30px">
                     <p><i class="ti-image icon-lg icon-fw"></i> logo 1 (Satu Warna) : <?php echo $img->logo;  ?></p>
                      <img id="preview2" src="<?php echo base_url()?>assets/upload/images/landing_pages/tagline_img/<?php echo $img->logo ?>" width="150px" />
                   </div>

                   <div class="form-group col-md-6 required">
                        <label for="" class="control-label">logo 2 (Warna)</label><span class="red">*</span>
                         <input  type="file" value="<?php echo $img->logo2; ?>" name="logo2" id="userfile" onchange="tampilkanPreview3(this,'preview3')"/>
                         <p class="help-block">
                            <?php
                              echo 'Gambar Saat Ini : '.substr($img->logo2,0,30);
                            ?>
                          </p>
                    </div>
                    <div class="form-group col-md-6 ">
                      <p><i class="ti-image icon-lg icon-fw"></i> logo 2 (Warna) : <?php echo $img->logo2;  ?></p>
                       <img id="preview3" src="<?php echo base_url()?>assets/upload/images/landing_pages/tagline_img/<?php echo $img->logo2 ?>" width="150px" />
                    </div>

                 <?php } // end foreach ?>
                 </div>
                 <?php echo form_close(); ?>
          </div>
        </div>


      </div>
</div>
<?php
foreach( $tampilTagline->result() as $tg ){ ?>

<!-- Start Modal Edit -->
<?php echo form_open_multipart('admin/S_landing_tagline/Edit'); ?>
<div class="modal fade animated rotateInDownRight" id="demo-default-modal-edit<?php echo $tg->id; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

   <!--Modal header-->
   <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
       <h4 class="modal-title">Edit Tagline</h4>
   </div>
   <input type="text" name="id" value="<?php echo $tg->id; ?>" />
   <!--Modal body-->
   <div class="modal-body" >
                            <div class="form-group col-md-12 required ">
                                <label for="" class="control-label">Tagline</label><span class="red">*</span>
  					                        <textarea id="demo-textarea-input" rows="3" class="form-control" required="required"  name="tagline" placeholder="Tagline.."><?php echo $tg->tagline; ?></textarea>
                            </div>

   </div>
   <!--Modal footer-->
   <div class="modal-footer" style="margin-top: 25px">
       <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
       <button class="btn btn-primary btn-rounded">Save Changes</button>
   </div>
</div>
</div>
</div>
<?php echo form_close(); ?>
<!-- End Modal Edit -->

<!-- Start Modal Hapus -->
<div id="demo-default-modal-hapus<?php echo $tg->id ?>" class="modal fade animated pulse">
              <div class="modal-dialog ">
                <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                      <h4 class="modal-title">Hapus Tagline <b>(<?php echo $tg->tagline ?>)</b></h4>
                  </div>
                  <div class="modal-body">
                            <p>Apakah anda yakin ingin menghapus Tagline <b> <?php echo $tg->tagline; ?></b> ?</p>
                  </div>
                  <div class="modal-footer">
                            <button class="btn btn-default btn-rounded" data-dismiss="modal" type="button">Close</button>
                            <a class="btn btn-danger btn-rounded" href="<?php echo base_url('admin/S_landing_tagline/Hapus/'. $tg->id) ?>">Hapus Tagline</a>
                        </div>
                </div>
              </div>
            </div>
<!-- End Modal Hapus -->

<?php } // end foreach ?>


<!-- Start Modal Tambah -->
<?php echo form_open_multipart('admin/S_landing_tagline/Tambah'); ?>
<div class="modal fade animated rotateInDownRight" id="demo-default-modal-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

   <!--Modal header-->
   <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
       <h4 class="modal-title">Tambah Tagline</h4>
   </div>

   <!--Modal body-->
   <div class="modal-body" >
                            <div class="form-group col-md-12 required ">
                                <label for="" class="control-label">Tagline</label><span class="red">*</span>
  					                        <textarea id="demo-textarea-input" rows="3" class="form-control" required="required"  name="tagline" placeholder="Tagline.."></textarea>
                            </div>

   </div>
   <!--Modal footer-->
   <div class="modal-footer" style="margin-top: 25px">
       <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
       <button class="btn btn-primary btn-rounded">Save</button>
   </div>
</div>
</div>
</div>
<?php echo form_close(); ?>
<!-- End Modal Tambah -->
