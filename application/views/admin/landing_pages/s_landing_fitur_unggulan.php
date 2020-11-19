<div id="page-head">

<div id="page-title" class="pad-all text-center">
    <h3>Setting Fitur Unggulan - Admin</h3>
</div>
<!--Breadcrumb-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<ol class="breadcrumb text-center">
  <li><a href="<?php echo base_url('admin/home') ?>"><i class="demo-pli-home"></i></a></li>
  <li><a>Extra</a></li>
  <li><a>Setting Landing Pages</a></li>
  <li class="active">Fitur Unggulan</li>
</ol>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--End breadcrumb-->
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">
  <?= $this->session->flashdata('flash'); ?>

  <div class="row blog">
  					    <div class="eq-height">
  					        <div class="col-sm-6 eq-box-sm">
                        <?php
                        foreach( $tampilData->result() as $data ){ ?>

                            <div class="col-sm-6">
                            <!--===================================================-->
                            <div class="panel" style="height:400px">
                                <div class="blog-header bg-info text-center blog-img-sm">
                                    <i class="<?php echo $data->icon; ?> icon-5x"></i>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-title media-block">
                                        <a href="#" class="btn-link">
                                            <h2><?php echo $data->title; ?></h2>
                                        </a>
                                    </div>
                                    <div class="blog-body">
                                        <p><?php echo $data->deskripsi; ?></p>
                                    </div>
                                </div>
                                <div class="blog-footer">
                                     <button data-target="#demo-default-modal-edit<?php echo $data->id; ?>" data-toggle="modal" class="btn btn-warning">Edit</button>
                                </div>
                            </div>
                            <br>
                            <!--===================================================-->
                            </div>


                          <?php } // end foreach ?>

  					            <!--===================================================-->
  					            <!--End Basic Panel-->

  					        </div>
  					        <div class="col-sm-12">

  					            <!--Panel with Header-->
  					            <!--===================================================-->
  					            <div class="panel"  >
  					                <div class="panel-heading">
  					                    <h3 class="panel-title">Example</h3>
  					                </div>
                            <div class="panel-body">
                              <img class="img-responsive" src="<?php echo base_url()?>assets/upload/images/landing_pages/fitur_unggulan.jpg" width="1005px" />
                            </div>
  					            </div>
  					            <!--===================================================-->
  					            <!--End Panel with Header-->

  					        </div>
  					    </div>
  					</div>



    <?php
    foreach( $tampilData->result() as $data ){ ?>
                              <!-- Start Modal Edit -->
                              <?php echo form_open_multipart('admin/S_landing_fitur_unggulan/Edit'); ?>
                              <div class="modal fade animated rotateInDownRight" id="demo-default-modal-edit<?php echo $data->id ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
                              <div class="modal-dialog">
                              <div class="modal-content">

                                 <!--Modal header-->
                                 <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                     <h4 class="modal-title">Edit Fitur Unggulan</h4>
                                 </div>
                                 <input type="text" name="id" value="<?php echo $data->id; ?>" />
                                 <!--Modal body-->
                                 <div class="modal-body" >

                                                         <div class="form-group col-md-6 required ">
                                                                <label for="" class="control-label">Title</label><span class="red">*</span>
                                                                <div class="input-group">
                                                                  <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                                                                  <input class="form-control" value="<?php echo $data->title; ?>" placeholder="Title" required="required" name="title" type="text" id="title">
                                                                </div>
                                                          </div>
                                                          <div class="form-group col-md-6 required ">
                                                                 <label for="" class="control-label">Icon</label><span class="red">*</span>
                                                                 <div class="input-group">
                                                                   <div class="input-group-addon"><i class="ti-layout-grid2-alt"></i></div>
                                                                   <input class="form-control" value="<?php echo $data->icon; ?>" placeholder="Icon" required="required" name="icon" type="text" id="icon">
                                                                 </div>
                                                           </div>
                                                          <div class="form-group col-md-12 required ">
                                                              <label for="" class="control-label">Deskripsi</label><span class="red">*</span>
                                					                        <textarea id="demo-textarea-input" rows="5" class="form-control" required="required"  name="deskripsi" placeholder="Deskripsi.."><?php echo $data->deskripsi; ?></textarea>
                                                          </div>
                                 </div>
                                 <!--Modal footer-->
                                 <div class="modal-footer" style="margin-top: 150px">
                                     <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
                                     <button class="btn btn-primary btn-rounded">Save</button>
                                 </div>
                              </div>
                              </div>
                              </div>
                              <?php echo form_close(); ?>
                              <!-- End Modal Edit -->

      <?php } // end foreach ?>
</div>
