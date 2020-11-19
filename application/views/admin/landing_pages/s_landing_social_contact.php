<div id="page-head">

<div id="page-title" class="pad-all text-center">
    <h3>Setting Social & Contact - Admin</h3>
</div>
<!--Breadcrumb-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<ol class="breadcrumb text-center">
  <li><a href="<?php echo base_url('admin/home') ?>"><i class="demo-pli-home"></i></a></li>
  <li><a>Extra</a></li>
  <li><a>Setting Landing Pages</a></li>
  <li class="active">Social & Contact</li>
</ol>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--End breadcrumb-->
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">
  <div class="panel">
  					        <div class="panel-body">
  					            <div class="fixed-fluid">
                          <?php
                          foreach( $tampilData->result() as $d ){ ?>
  					                <div class="fluid">
                              <div class="text-right">
                                  <button data-target="#demo-default-modal-edit<?php echo $d->id ?>" data-toggle="modal" class="btn btn-warning">Edit</button>
                                  <button data-target="#demo-default-modal-example" data-toggle="modal" class="btn btn-info"><i class="btn-label fa fa-warning"></i> Example</button>
                              </div>
  					                    <!-- Simple profile -->
  					                    <div class="text-center">
  					                        <div class="pad-ver">
                                      <img style="height:300px;width:300px"  src="<?php echo base_url('assets');?>/upload/images/<?= $site['logo']; ?>" class="img-lg img-circle" alt="Profile Picture">
  					                        </div>
  					                        <h4 class="text-lg text-overflow mar-no"><?= $site['nama_website']; ?></h4>
  					                        <p class="text-sm text-muted">E-Voting Web Apps <strong> Ayo Bersuara !</strong></p>

  					                        <div class="pad-ver btn-groups">
  					                            <a href="<?php echo $d->fb; ?>" target="_blank" class="btn btn-icon demo-pli-facebook icon-lg add-tooltip" data-original-title="Facebook" data-container="body"></a>
  					                            <a href="<?php echo $d->tw; ?>" target="_blank" class="btn btn-icon demo-pli-twitter icon-lg add-tooltip" data-original-title="Twitter" data-container="body"></a>
                                        <a href="<?php echo $d->ig; ?>" target="_blank" class="btn btn-icon demo-pli-instagram icon-lg add-tooltip" data-original-title="Instagram" data-container="body"></a>
                                        <a href="<?php echo $d->yt; ?>" target="_blank" class="btn btn-icon ion-social-youtube-outline icon-lg add-tooltip" data-original-title="Youtube" data-container="body"></a>
  					                            <a href="<?php echo $d->g_plus; ?>" target="_blank" class="btn btn-icon demo-pli-google-plus icon-lg add-tooltip" data-original-title="Google+" data-container="body"></a>
                                        <a href="<?php echo $d->path; ?>" target="_blank" class="btn btn-icon ion-social-pinterest-outline icon-lg add-tooltip" data-original-title="Pinterest" data-container="body"></a>
                                        <a href="<?php echo $d->web; ?>" target="_blank" class="btn btn-icon ti-world icon-lg add-tooltip" data-original-title="Website" data-container="body"></a>
  					                        </div>
  					                    </div>
                                <hr>
                                <div class="row">
                                <div class="col-md-4">
                                    <p class="pad-ver text-main text-sm text-uppercase text-bold">Social and Contact Apps</p>
                                    <p><i class="ti-email icon-lg icon-fw"></i> <?php echo $d->email; ?> </p>
      					                    <p><i class="ti-map-alt icon-lg icon-fw"></i> <?php echo $d->alamat; ?></p>
      					                    <p><i class="ti-mobile icon-lg icon-fw"></i><?php echo $d->no_telp; ?></p>
                                    <p><a href="<?php echo $d->web; ?>" target="_blank" class="btn-link"><i class="demo-pli-internet icon-lg icon-fw"></i> <?php echo $d->web; ?></a></p>
                                </div>
                                <div class="col-md-8">
                                  <p class="pad-ver text-main text-sm text-uppercase text-bold">Maps</p>
                                  <iframe src="<?php echo $d->g_maps; ?>" width="1200" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                                </div>

                                <p class="text-sm text-center">Ayo Bersuara E-Voting Web Apps</p>

  			  					       </div>
                           <?php } // end foreach ?>
  					            </div>
  					        </div>
  					    </div>
</div>



<?php
foreach( $tampilData->result() as $d ){ ?>
<!-- Start Modal Edit -->
<?php echo form_open_multipart('admin/s_landing_social_contact/Edit'); ?>
<div class="modal fade animated rotateInDownRight" id="demo-default-modal-edit<?php echo $d->id ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

   <!--Modal header-->
   <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
       <h4 class="modal-title">Edit Kategori Saksi</h4>
   </div>
   <input type="text" name="id" value="<?php echo $d->id; ?>" />
   <!--Modal body-->
   <div class="modal-body" >

                           <div class="form-group col-md-6 required ">
                                  <label for="" class="control-label">Email</label><span class="red">*</span>
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="ti-email"></i></div>
                                    <input class="form-control" value="<?php echo $d->email; ?>" placeholder="Email" required="required" name="email" type="email" id="email">
                                  </div>
                            </div>
                            <div class="form-group col-md-6 required ">
                                   <label for="" class="control-label">No.Telepon</label><span class="red">*</span>
                                   <div class="input-group">
                                     <div class="input-group-addon"><i class="ti-mobile"></i></div>
                                     <input class="form-control" value="<?php echo $d->no_telp; ?>" placeholder="No.Telepon" required="required" name="no_telp" type="number" id="no_telp">
                                   </div>
                             </div>
                             <div class="form-group col-md-12 required ">
                                    <label for="" class="control-label">Alamat</label><span class="red">*</span>
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="ti-signal"></i></div>
                                      <input class="form-control" value="<?php echo $d->alamat; ?>" placeholder="Alamat" required="required" name="alamat" type="text" id="alamat">
                                    </div>
                              </div>
                            <div class="form-group col-md-12 required ">
                                <label for="" class="control-label">Iframe Google Maps</label><span class="red">*</span>
  					                        <textarea id="demo-textarea-input" rows="3" class="form-control" required="required"  name="g_maps" placeholder="Iframe Google Maps.."><?php echo $d->g_maps; ?></textarea>
                            </div>
                            <div class="form-group col-md-6 required ">
                                   <label for="" class="control-label">Facebook</label><span class="red">*</span>
                                   <div class="input-group">
                                     <div class="input-group-addon"><i class="demo-pli-facebook"></i></div>
                                     <input class="form-control" value="<?php echo $d->fb; ?>" placeholder="Link Facebook" required="required" name="fb" type="text" id="fb">
                                   </div>
                             </div>
                             <div class="form-group col-md-6 required ">
                                    <label for="" class="control-label">Twitter</label><span class="red">*</span>
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="demo-pli-twitter"></i></div>
                                      <input class="form-control" value="<?php echo $d->tw; ?>" placeholder="Link Twitter" required="required" name="tw" type="text" id="tw">
                                    </div>
                              </div>
                              <div class="form-group col-md-6 required ">
                                     <label for="" class="control-label">Instagram</label><span class="red">*</span>
                                     <div class="input-group">
                                       <div class="input-group-addon"><i class="demo-pli-instagram"></i></div>
                                       <input class="form-control" value="<?php echo $d->ig; ?>" placeholder="Link Instagram" required="required" name="ig" type="text" id="ig">
                                     </div>
                               </div>
                               <div class="form-group col-md-6 required ">
                                      <label for="" class="control-label">Youtube</label><span class="red">*</span>
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="ion-social-youtube-outline"></i></div>
                                        <input class="form-control" value="<?php echo $d->yt; ?>" placeholder="Link Youtube" required="required" name="yt" type="text" id="yt">
                                      </div>
                                </div>
                                <div class="form-group col-md-6 required ">
                                       <label for="" class="control-label">Google+</label><span class="red">*</span>
                                       <div class="input-group">
                                         <div class="input-group-addon"><i class="demo-pli-google-plus"></i></div>
                                         <input class="form-control" value="<?php echo $d->g_plus; ?>" placeholder="Link Google+" required="required" name="g_plus" type="text" id="g_plus">
                                       </div>
                                 </div>
                                 <div class="form-group col-md-6 required ">
                                        <label for="" class="control-label">Pinterest</label><span class="red">*</span>
                                        <div class="input-group">
                                          <div class="input-group-addon"><i class="ion-social-pinterest-outline"></i></div>
                                          <input class="form-control" value="<?php echo $d->path; ?>" placeholder="Link Pinterest" required="required" name="path" type="text" id="path">
                                        </div>
                                  </div>
                                  <div class="form-group col-md-12 required ">
                                         <label for="" class="control-label">Website</label><span class="red">*</span>
                                         <div class="input-group">
                                           <div class="input-group-addon"><i class="ti-world"></i></div>
                                           <input class="form-control" value="<?php echo $d->web; ?>" placeholder="Link Website" required="required" name="web" type="text" id="web">
                                         </div>
                                   </div>
   </div>
   <!--Modal footer-->
   <div class="modal-footer" style="margin-top: 460px">
       <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
       <button class="btn btn-primary btn-rounded">Save</button>
   </div>
</div>
</div>
</div>
<?php echo form_close(); ?>
<!-- End Modal Edit -->
<?php } // end foreach ?>


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
     <img class="img-responsive" src="<?php echo base_url()?>assets/upload/images/landing_pages/ss_footer.jpg" width="1005px" />
   </div>
   <!--Modal footer-->
   <div class="modal-footer" >
       <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
   </div>
</div>
</div>
</div>
