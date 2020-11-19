<div id="page-head">

<div id="page-title" class="pad-all text-center">
    <h3>Setting Deskripsi About - Admin</h3>
</div>
<!--Breadcrumb-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<ol class="breadcrumb text-center">
  <li><a href="<?php echo base_url('admin/home') ?>"><i class="demo-pli-home"></i></a></li>
  <li><a>Extra</a></li>
  <li><a>Setting Landing Pages</a></li>
  <li class="active">Deskripsi About</li>
</ol>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--End breadcrumb-->
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">
  <?= $this->session->flashdata('flash'); ?>
  <div class="row blog">
    <?php
    foreach( $tampildata->result() as $kat ){ ?>

					        <div class="col-lg-6">
					            <!--===================================================-->
					            <div class="panel">
					                <div class="blog-header">
					                    <img class="img-responsive" src="<?php echo base_url()?>assets/upload/images/landing_pages/deskripsi_about/<?php echo $kat->bg_photo ?>" alt="Image">
					                </div>
					                <div class="blog-content">
					                    <div class="blog-title media-block">
                                <div class="media-right textright">
					                            <a href="<?php echo $kat->yt; ?>" target="_blank" class="btn btn-icon ion-social-youtube icon-lg add-tooltip" data-original-title="Youtube" data-container="body"></a>
					                        </div>
					                        <div class="media-body">
					                            <a href="#" class="btn-link">
					                                <h2><?php echo $kat->title; ?></h2>
					                            </a>
					                        </div>
					                    </div>
					                    <div class="blog-body">
					                        <p><?php echo $kat->deskripsi; ?> </p>
					                    </div>
					                </div>
					                <div class="blog-footer">
					                    <div class="media-left">
					                        <button data-target="#demo-default-modal-edit<?php echo $kat->id ?>" data-toggle="modal" class="btn btn-warning">Edit</button>
					                    </div>
					                </div>
					            </div>
					            <!--===================================================-->
                    </div>

                    <!-- Start Modal Edit -->
                    <?php echo form_open_multipart('admin/S_landing_deskripsi_about/Edit'); ?>
                    <div class="modal fade animated rotateInDownRight" id="demo-default-modal-edit<?php echo $kat->id ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">

                       <!--Modal header-->
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                           <h4 class="modal-title">Edit Deskripsi About</h4>
                       </div>
                       <input type="text" name="id" value="<?php echo $kat->id; ?>" />
                       <!--Modal body-->
                       <div class="modal-body" >

                                               <div class="form-group col-md-12 required ">
                                                      <label for="" class="control-label">Title</label><span class="red">*</span>
                                                      <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                                                        <input class="form-control" value="<?php echo $kat->title; ?>" placeholder="Title" required="required" name="title" type="text" id="title">
                                                      </div>
                                                </div>
                                                <div class="form-group col-md-6 required ">
                                                       <label for="" class="control-label">Link Youtube</label><span class="red">*</span>
                                                       <div class="input-group">
                                                         <div class="input-group-addon"><i class="ion-social-youtube-outline"></i></div>
                                                         <input class="form-control" value="<?php echo $kat->yt; ?>" placeholder="Link Youtube" required="required" name="yt" type="text" id="yt">
                                                       </div>
                                                 </div>
                                                 <div class="form-group col-md-6 required ">
                                                      <label for="" class="control-label">Background Foto</label><span class="red">*</span>
                                                       <input  type="file" value="<?php echo $kat->bg_photo; ?>" name="bg_photo" id="userfile" onchange="tampilkanPreview1(this,'preview1')"/>
                                                       <p class="help-block">
                                                          <?php //cek file apakah kosong?
                                                          if (empty($kat->bg_photo)) {
                                                            echo 'Belum Ada File Gambar Pada Item : '.$kat->title ;
                                                          }else{
                                                            echo 'Gambar Saat Ini : '.substr($kat->bg_photo,0,30);
                                                          }?>
                                                        </p>
                                                  </div>
                                                <div class="form-group col-md-6 required ">
                                                    <label for="" class="control-label">Deskripsi</label><span class="red">*</span>
                      					                        <textarea id="demo-textarea-input" rows="9" class="form-control" required="required"  name="deskripsi" placeholder="Deskripsi.."><?php echo $kat->deskripsi; ?></textarea>
                                                </div>

                                                 <div class="form-group col-md-6 required ">
                                                   <label for="" class="control-label"></label>Preview Background Foto
                                                    <img id="preview1" src="<?php echo base_url()?>assets/upload/images/landing_pages/deskripsi_about/<?php echo $kat->bg_photo ?>" width="150px" />
                                                 </div>
                       </div>
                       <!--Modal footer-->
                       <div class="modal-footer" style="margin-top: 310px">
                           <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
                           <button class="btn btn-primary btn-rounded">Save</button>
                       </div>
                    </div>
                    </div>
                    </div>
                    <?php echo form_close(); ?>
                    <!-- End Modal Edit -->

                    <?php } // end foreach ?>

                    <div class="col-sm-6">
                    					        <div class="panel">
                    					            <div class="panel-heading">
                    					                <h3 class="panel-title">Example </h3>

                    					            </div>

                    					            <!--Bordered Table-->
                    					            <!--===================================================-->
                    					            <div class="panel-body">
                                            <img class="img-responsive" src="<?php echo base_url()?>assets/upload/images/landing_pages/example_deskripsi about.jpg" width="775px" />
                    					            </div>
                    					            <!--===================================================-->
                    					            <!--End Bordered Table-->

                    					        </div>
                    					    </div>
    </div>
</div>
