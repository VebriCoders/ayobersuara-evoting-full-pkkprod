<div id="page-head">

<div id="page-title" class="pad-all text-center">
    <h3>Setting Tim Developer - Admin</h3>
</div>
<!--Breadcrumb-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<ol class="breadcrumb text-center">
  <li><a href="<?php echo base_url('admin/home') ?>"><i class="demo-pli-home"></i></a></li>
  <li><a>Extra</a></li>
  <li><a>Setting Landing Pages</a></li>
  <li class="active">Tim Developer</li>
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
          <button  data-target="#demo-default-modal-example" data-toggle="modal" class="btn btn-info"><i class="btn-label fa fa-warning"></i>Example</button>
      </div>

      <?php echo form_open_multipart('admin/s_landing_tim_developer/CariData'); ?>
      <div class="col-sm-6 toolbar-right text-right">
        Search by :
        <div class="form-group">
          <?php if($this->uri->segment(3) != 'CariData'){ ?>
             <input type="text" placeholder="Nama" id="demo-inline-inputmail" name="nama" class="form-control">
         <?php } ?>

         <?php if($this->uri->segment(3) == 'CariData'){
            $nama = $this->input->post('nama'); ?>
            <input type="text" value="<?= $nama ?>" placeholder="Nama" id="demo-inline-inputmail" name="nama" class="form-control">
         <?php } ?>
       </div>
       <button class="btn btn-default" style="margin-bottom:15px"><i class="ti-filter"></i> Filter</button>
       <a class="btn btn-default" style="margin-bottom:15px" href="<?php echo base_url('admin/s_landing_tim_developer'); ?>"><i class="ti-reload"></i></a>
      </div>
  </div>
    <?php echo form_close(); ?>


  <?= $this->session->flashdata('flash'); ?>

  <div class="row">
                      <?php
                      foreach( $tampilData->result() as $d ){ ?>
                      <div class="col-lg-3">
                        <!--===================================================-->
                        <div class="panel">
                            <div class="panel-body text-center bg-purple">
                                <img alt="Avatar" class="img-lg img-circle img-border mar-btm" src="<?php echo base_url() ?>assets/upload/images/landing_pages/tim_developer/<?php echo $d->photo ?>">

                                <h4 class="text-light"><?php echo $d->nama ?></h4>
                                <p class="text-sm"><?php echo $d->tagline ?></p>
                                  <div class="pad-ver btn-groups">
                                    <a href="https://api.whatsapp.com/send?phone=<?php echo $d->hp ?>" target="_blank" class="btn btn-icon ion-social-whatsapp-outline icon-lg add-tooltip" data-original-title="Whatsapp" data-container="body"></a>
                                    <a href="mailto:<?php echo $d->email ?>" target="_blank" class="btn btn-icon ti-email icon-lg add-tooltip" data-original-title="Email" data-container="body"></a>
                                    <a href="<?php echo $d->fb ?>" target="_blank" class="btn btn-icon demo-pli-facebook icon-lg add-tooltip" data-original-title="Facebook" data-container="body"></a>
                                    <a href="<?php echo $d->tw ?>" target="_blank" class="btn btn-icon demo-pli-twitter icon-lg add-tooltip" data-original-title="Twitter" data-container="body"></a>
                                    <a href="<?php echo $d->yt ?>" target="_blank" class="btn btn-icon ion-social-youtube-outline icon-lg add-tooltip" data-original-title="Youtube" data-container="body"></a>
                                    <a href="<?php echo $d->ig ?>" target="_blank" class="btn btn-icon demo-pli-instagram icon-lg add-tooltip" data-original-title="Instagram" data-container="body"></a>
                                </div>
                            </div>
                            <div class="list-group bg-trans pad-btm">
                                <a data-target="#demo-default-modal-detail<?php echo $d->id ?>" data-toggle="modal" class="list-group-item" href="#"><i class="demo-pli-information icon-lg icon-fw"></i> User Details</a>
                                <div class="mar-top text-center">
                                      <button data-toggle="modal" data-target="#demo-default-modal-edit<?php echo $d->id ?>" class=" btn btn-warning btn-rounded">
                                          <span class="fa fa-pencil"> Edit</span>
                                      </button>
                                      &nbsp
                                      <button data-toggle="modal" data-target="#demo-default-modal-hapus<?php echo $d->id ?>" class=" btn btn-danger btn-rounded">
                                          <span class="ion-trash-b"> Hapus</span>
                                      </button>
                                </div>
                            </div>

                        </div>
                        <!--===================================================-->
                    </div>
                  <?php } ?>
  </div>
</div>

<?php
foreach( $tampilData->result() as $d ){ ?>
  <!-- Start Modal Edit -->
  <?php echo form_open_multipart('admin/s_landing_tim_developer/Edit'); ?>
  <div class="modal fade animated rotateInDownRight" id="demo-default-modal-edit<?php echo $d->id; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">

     <!--Modal header-->
     <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
         <h4 class="modal-title">Edit Tim Developer</h4>
     </div>
     <input type="text" name="id" value="<?php echo $d->id; ?>" />
     <!--Modal body-->
     <div class="modal-body" >

                             <div class="form-group col-md-6 required ">
                                    <label for="" class="control-label">Nama</label><span class="red">*</span>
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="ti-user"></i></div>
                                      <input class="form-control" value="<?php echo $d->nama; ?>" placeholder="Nama" required="required" name="nama" type="text" id="nama">
                                    </div>
                              </div>
                              <div class="form-group col-md-6 required ">
                                     <label for="" class="control-label">Tagline</label><span class="red">*</span>
                                     <div class="input-group">
                                       <div class="input-group-addon"><i class="ti-book"></i></div>
                                       <input class="form-control" value="<?php echo $d->tagline; ?>" placeholder="Tagline" required="required" name="tagline" type="text" id="tagline">
                                     </div>
                               </div>
                               <div class="form-group col-md-6 required ">
                                      <label for="" class="control-label">Email</label><span class="red">*</span>
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-email"></i></div>
                                        <input class="form-control" value="<?php echo $d->email; ?>" placeholder="Email" required="required" name="email" type="email" id="email">
                                      </div>
                                </div>
                                <div class="form-group col-md-6 required ">
                                       <label for="" class="control-label">No Telpon</label><span class="red">*</span>
                                       <div class="input-group">
                                         <div class="input-group-addon"><i class="ti-mobile"></i></div>
                                         <input class="form-control"  value="<?php echo $d->hp; ?>" placeholder="No Telpon" required="required" name="hp" type="number" id="hp">
                                       </div>
                                 </div>
                              <div class="form-group col-md-12 required ">
                                  <label for="" class="control-label">Deskripsi</label><span class="red">*</span>
    					                        <textarea id="demo-textarea-input" rows="4" class="form-control" required="required"  name="deskripsi" placeholder="Deskripsi.."><?php echo $d->deskripsi; ?></textarea>
                              </div>
                              <div class="form-group col-md-6 required ">
                                     <label for="" class="control-label">Facebook</label><span class="red">*</span>
                                     <div class="input-group">
                                       <div class="input-group-addon"><i class="ion-social-facebook-outline"></i></div>
                                       <input class="form-control" value="<?php echo $d->fb; ?>" placeholder="Link Facebook" required="required" name="fb" type="text" id="fb">
                                     </div>
                               </div>
                               <div class="form-group col-md-6 required ">
                                      <label for="" class="control-label">Instagram</label><span class="red">*</span>
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="ion-social-instagram-outline"></i></div>
                                        <input class="form-control" value="<?php echo $d->ig; ?>" placeholder="Link Instagram" required="required" name="ig" type="text" id="ig">
                                      </div>
                                </div>
                                <div class="form-group col-md-6 required ">
                                       <label for="" class="control-label">Twitter</label><span class="red">*</span>
                                       <div class="input-group">
                                         <div class="input-group-addon"><i class="ion-social-twitter-outline"></i></div>
                                         <input class="form-control" value="<?php echo $d->tw; ?>" placeholder="Link Twitter" required="required" name="tw" type="text" id="tw">
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
                                         <label for="" class="control-label">Skill Codeigniter</label><span class="red">*</span>
                                         <div class="input-group">
                                           <div class="input-group-addon"><i class="ti-medall"></i></div>
                                           <input class="form-control" value="<?php echo $d->skill_codeigniter; ?>" placeholder="Masukkan Angka 1-100" required="required" name="skill_codeigniter" type="text" id="skill_codeigniter">
                                         </div>
                                   </div>
                                   <div class="form-group col-md-6 required ">
                                          <label for="" class="control-label">Skill Laravel</label><span class="red">*</span>
                                          <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-medall"></i></div>
                                            <input class="form-control" value="<?php echo $d->skill_laravel; ?>" placeholder="Masukkan Angka 1-100" required="required" name="skill_laravel" type="text" id="skill_laravel">
                                          </div>
                                    </div>
                                    <div class="form-group col-md-6 required ">
                                           <label for="" class="control-label">Skill Desain</label><span class="red">*</span>
                                           <div class="input-group">
                                             <div class="input-group-addon"><i class="ti-medall"></i></div>
                                             <input class="form-control" value="<?php echo $d->skill_desain; ?>" placeholder="Masukkan Angka 1-100" required="required" name="skill_desain" type="text" id="skill_desain">
                                           </div>
                                     </div>
                                     <div class="form-group col-md-6 required ">
                                            <label for="" class="control-label">Skill PHP</label><span class="red">*</span>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="ti-medall"></i></div>
                                              <input class="form-control" value="<?php echo $d->skill_php; ?>" placeholder="Masukkan Angka 1-100" required="required" name="skill_php" type="text" id="skill_php">
                                            </div>
                                      </div>
                                      <div class="form-group col-md-6 required ">
                                             <label for="" class="control-label">Skill HTML</label><span class="red">*</span>
                                             <div class="input-group">
                                               <div class="input-group-addon"><i class="ti-medall"></i></div>
                                               <input class="form-control" value="<?php echo $d->skill_html; ?>" placeholder="Masukkan Angka 1-100" required="required" name="skill_html" type="text" id="skill_html">
                                             </div>
                                       </div>
                                       <div class="form-group col-md-6 required ">
                                              <label for="" class="control-label">Skill CSS</label><span class="red">*</span>
                                              <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-medall"></i></div>
                                                <input class="form-control" value="<?php echo $d->skill_css; ?>" placeholder="Masukkan Angka 1-100" required="required" name="skill_css" type="text" id="skill_css">
                                              </div>
                                        </div>
                                        <div class="form-group col-md-6 required ">
                                               <label for="" class="control-label">Skill Javascript</label><span class="red">*</span>
                                               <div class="input-group">
                                                 <div class="input-group-addon"><i class="ti-medall"></i></div>
                                                 <input class="form-control" value="<?php echo $d->skill_javascript; ?>" placeholder="Masukkan Angka 1-100" required="required" name="skill_javascript" type="text" id="skill_javascript">
                                               </div>
                                         </div>
                                         <div class="form-group col-md-6 required ">
                                                <label for="" class="control-label">Skill Java</label><span class="red">*</span>
                                                <div class="input-group">
                                                  <div class="input-group-addon"><i class="ti-medall"></i></div>
                                                  <input class="form-control" value="<?php echo $d->skill_java; ?>" placeholder="Masukkan Angka 1-100" required="required" name="skill_java" type="text" id="skill_java">
                                                </div>
                                          </div>
                                          <div class="form-group col-md-6 required ">
                                               <label for="" class="control-label">Foto</label><span class="red">*</span>
                                                <input  type="file" name="photo" id="userfile" onchange="tampilkanPreview1(this,'preview1')"/>
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
                                               <label for="" class="control-label"></label>Preview Foto
                                                <img id="preview1" src="<?php echo base_url() ?>assets/upload/images/landing_pages/tim_developer/<?php echo $d->photo ?>" width="150px" />
                                             </div>

     </div>
     <!--Modal footer-->
     <div class="modal-footer" style="margin-top: 830px">
         <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
         <button class="btn btn-primary btn-rounded">Save Changes</button>
     </div>
  </div>
  </div>
  </div>
  <?php echo form_close(); ?>
  <!-- End Modal Edit -->

  <!-- Start Modal Hapus -->
  <div id="demo-default-modal-hapus<?php echo $d->id ?>" class="modal fade animated pulse">
                <div class="modal-dialog ">
                  <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                        <h4 class="modal-title">Hapus Tim Developer <b>(<?php echo $d->nama ?>)</b></h4>
                    </div>
                    <div class="modal-body">

                              <p>Apakah anda yakin ingin menghapus Tim Developer <b> <?php echo $d->nama; ?></b> ?</p>
                    </div>
                    <div class="modal-footer">
                              <button class="btn btn-default btn-rounded" data-dismiss="modal" type="button">Close</button>
                              <a class="btn btn-danger btn-rounded" href="<?php echo base_url('admin/s_landing_tim_developer/Hapus/'. $d->id) ?>">Hapus Tim Developer</a>
                          </div>
                  </div>
                </div>
              </div>
  <!-- End Modal Hapus -->
<?php } ?>

<!-- Start Modal Tambah -->
<?php echo form_open_multipart('admin/s_landing_tim_developer/Tambah'); ?>
<div class="modal fade animated rotateInDownRight" id="demo-default-modal-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

   <!--Modal header-->
   <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
       <h4 class="modal-title">Tambah Tim Developer</h4>
   </div>

   <!--Modal body-->
   <div class="modal-body" >

                           <div class="form-group col-md-6 required ">
                                  <label for="" class="control-label">Nama</label><span class="red">*</span>
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                    <input class="form-control" placeholder="Nama" required="required" name="nama" type="text" id="nama">
                                  </div>
                            </div>
                            <div class="form-group col-md-6 required ">
                                   <label for="" class="control-label">Tagline</label><span class="red">*</span>
                                   <div class="input-group">
                                     <div class="input-group-addon"><i class="ti-book"></i></div>
                                     <input class="form-control" placeholder="Tagline" required="required" name="tagline" type="text" id="tagline">
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
                                     <label for="" class="control-label">No Telpon</label><span class="red">*</span>
                                     <div class="input-group">
                                       <div class="input-group-addon"><i class="ti-mobile"></i></div>
                                       <input class="form-control" placeholder="No Telpon" required="required" name="hp" type="number" id="hp">
                                     </div>
                               </div>
                            <div class="form-group col-md-12 required ">
                                <label for="" class="control-label">Deskripsi</label><span class="red">*</span>
  					                        <textarea id="demo-textarea-input" rows="4" class="form-control" required="required"  name="deskripsi" placeholder="Deskripsi.."></textarea>
                            </div>
                            <div class="form-group col-md-6 required ">
                                   <label for="" class="control-label">Facebook</label><span class="red">*</span>
                                   <div class="input-group">
                                     <div class="input-group-addon"><i class="ion-social-facebook-outline"></i></div>
                                     <input class="form-control" placeholder="Link Facebook" required="required" name="fb" type="text" id="fb">
                                   </div>
                             </div>
                             <div class="form-group col-md-6 required ">
                                    <label for="" class="control-label">Instagram</label><span class="red">*</span>
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="ion-social-instagram-outline"></i></div>
                                      <input class="form-control" placeholder="Link Instagram" required="required" name="ig" type="text" id="ig">
                                    </div>
                              </div>
                              <div class="form-group col-md-6 required ">
                                     <label for="" class="control-label">Twitter</label><span class="red">*</span>
                                     <div class="input-group">
                                       <div class="input-group-addon"><i class="ion-social-twitter-outline"></i></div>
                                       <input class="form-control" placeholder="Link Twitter" required="required" name="tw" type="text" id="tw">
                                     </div>
                               </div>
                               <div class="form-group col-md-6 required ">
                                      <label for="" class="control-label">Youtube</label><span class="red">*</span>
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="ion-social-youtube-outline"></i></div>
                                        <input class="form-control" placeholder="Link Youtube" required="required" name="yt" type="text" id="yt">
                                      </div>
                                </div>
                                <div class="form-group col-md-6 required ">
                                       <label for="" class="control-label">Skill Codeigniter</label><span class="red">*</span>
                                       <div class="input-group">
                                         <div class="input-group-addon"><i class="ti-medall"></i></div>
                                         <input class="form-control" placeholder="Masukkan Angka 1-100" required="required" name="skill_codeigniter" type="text" id="skill_codeigniter">
                                       </div>
                                 </div>
                                 <div class="form-group col-md-6 required ">
                                        <label for="" class="control-label">Skill Laravel</label><span class="red">*</span>
                                        <div class="input-group">
                                          <div class="input-group-addon"><i class="ti-medall"></i></div>
                                          <input class="form-control" placeholder="Masukkan Angka 1-100" required="required" name="skill_laravel" type="text" id="skill_laravel">
                                        </div>
                                  </div>
                                  <div class="form-group col-md-6 required ">
                                         <label for="" class="control-label">Skill Desain</label><span class="red">*</span>
                                         <div class="input-group">
                                           <div class="input-group-addon"><i class="ti-medall"></i></div>
                                           <input class="form-control" placeholder="Masukkan Angka 1-100" required="required" name="skill_desain" type="text" id="skill_desain">
                                         </div>
                                   </div>
                                   <div class="form-group col-md-6 required ">
                                          <label for="" class="control-label">Skill PHP</label><span class="red">*</span>
                                          <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-medall"></i></div>
                                            <input class="form-control" placeholder="Masukkan Angka 1-100" required="required" name="skill_php" type="text" id="skill_php">
                                          </div>
                                    </div>
                                    <div class="form-group col-md-6 required ">
                                           <label for="" class="control-label">Skill HTML</label><span class="red">*</span>
                                           <div class="input-group">
                                             <div class="input-group-addon"><i class="ti-medall"></i></div>
                                             <input class="form-control" placeholder="Masukkan Angka 1-100" required="required" name="skill_html" type="text" id="skill_html">
                                           </div>
                                     </div>
                                     <div class="form-group col-md-6 required ">
                                            <label for="" class="control-label">Skill CSS</label><span class="red">*</span>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="ti-medall"></i></div>
                                              <input class="form-control" placeholder="Masukkan Angka 1-100" required="required" name="skill_css" type="text" id="skill_css">
                                            </div>
                                      </div>
                                      <div class="form-group col-md-6 required ">
                                             <label for="" class="control-label">Skill Javascript</label><span class="red">*</span>
                                             <div class="input-group">
                                               <div class="input-group-addon"><i class="ti-medall"></i></div>
                                               <input class="form-control" placeholder="Masukkan Angka 1-100" required="required" name="skill_javascript" type="text" id="skill_javascript">
                                             </div>
                                       </div>
                                       <div class="form-group col-md-6 required ">
                                              <label for="" class="control-label">Skill Java</label><span class="red">*</span>
                                              <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-medall"></i></div>
                                                <input class="form-control" placeholder="Masukkan Angka 1-100" required="required" name="skill_java" type="text" id="skill_java">
                                              </div>
                                        </div>
                                        <div class="form-group col-md-6 required ">
                                             <label for="" class="control-label">Foto</label><span class="red">*</span>
                                              <input  type="file" name="photo" id="userfile" onchange="tampilkanPreview(this,'preview')"/>
                                         </div>
                                           <div class="form-group col-md-6 required ">
                                             <label for="" class="control-label"></label>Preview Foto
                                              <img id="preview" width="150px" />
                                           </div>

   </div>
   <!--Modal footer-->
   <div class="modal-footer" style="margin-top: 830px">
       <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
       <button class="btn btn-primary btn-rounded">Save</button>
   </div>
</div>
</div>
</div>
<?php echo form_close(); ?>
<!-- End Modal Tambah -->



<?php
foreach( $tampilData->result() as $d ){ ?>
<div class="modal fade animated rotateInDownRight" id="demo-default-modal-detail<?php echo $d->id ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
     <div class="panel">
         <div class="panel-body text-center bg-purple">
           <img alt="Avatar" class="img-lg img-circle img-border mar-btm" src="<?php echo base_url() ?>assets/upload/images/landing_pages/tim_developer/<?php echo $d->photo ?>">

             <h4 class="text-light"><?php echo $d->nama ?></h4>
             <p class="text-sm"><?php echo $d->tagline ?></p>
               <div class="pad-ver btn-groups">
                 <a href="https://api.whatsapp.com/send?phone=<?php echo $d->hp ?>" target="_blank" class="btn btn-icon ion-social-whatsapp-outline icon-lg add-tooltip" data-original-title="Whatsapp" data-container="body"></a>
                 <a href="mailto:<?php echo $d->email ?>" target="_blank" class="btn btn-icon ti-email icon-lg add-tooltip" data-original-title="Email" data-container="body"></a>
                 <a href="<?php echo $d->fb ?>" target="_blank" class="btn btn-icon demo-pli-facebook icon-lg add-tooltip" data-original-title="Facebook" data-container="body"></a>
                 <a href="<?php echo $d->tw ?>" target="_blank" class="btn btn-icon demo-pli-twitter icon-lg add-tooltip" data-original-title="Twitter" data-container="body"></a>
                 <a href="<?php echo $d->yt ?>" target="_blank" class="btn btn-icon ion-social-youtube-outline icon-lg add-tooltip" data-original-title="Youtube" data-container="body"></a>
                 <a href="<?php echo $d->ig ?>" target="_blank" class="btn btn-icon demo-pli-instagram icon-lg add-tooltip" data-original-title="Instagram" data-container="body"></a>
             </div>
         </div>
         <div class="list-group bg-trans pad-btm">
             <a class="list-group-item"><i class="ti-comment-alt icon-lg icon-fw"></i> Deskripsi : <?php echo $d->deskripsi ?> </a>
             <a class="list-group-item"><i class="ti-email icon-lg icon-fw"></i> Email : <?php echo $d->email ?> </a>
             <a class="list-group-item"><div class="progress progress-striped active"><div style="width: <?php echo $d->skill_codeigniter ?>%;" class="progress-bar progress-bar-danger">Codeigniter <?php echo $d->skill_codeigniter ?>%</div></div></a>
             <a class="list-group-item"><div class="progress progress-striped active"><div style="width: <?php echo $d->skill_laravel ?>%;" class="progress-bar progress-bar-success">Laravel <?php echo $d->skill_laravel ?>%</div></div></a>
             <a class="list-group-item"><div class="progress progress-striped active"><div style="width: <?php echo $d->skill_desain ?>%;" class="progress-bar progress-bar-mint">Desain <?php echo $d->skill_desain ?>%</div></div></a>
             <a class="list-group-item"><div class="progress progress-striped active"><div style="width: <?php echo $d->skill_php ?>%;" class="progress-bar progress-bar-dark">PHP <?php echo $d->skill_php ?>%</div></div></a>
             <a class="list-group-item"><div class="progress progress-striped active"><div style="width: <?php echo $d->skill_html ?>%;" class="progress-bar progress-bar-info">HTML <?php echo $d->skill_html ?>%</div></div></a>
             <a class="list-group-item"><div class="progress progress-striped active"><div style="width: <?php echo $d->skill_css ?>%;" class="progress-bar progress-bar-pink">CSS <?php echo $d->skill_css ?>%</div></div></a>
             <a class="list-group-item"><div class="progress progress-striped active"><div style="width: <?php echo $d->skill_javascript ?>%;" class="progress-bar progress-bar-warning">Javascript <?php echo $d->skill_javascript ?>%</div></div></a>
             <a class="list-group-item"><div class="progress progress-striped active"><div style="width: <?php echo $d->skill_java ?>%;" class="progress-bar progress-bar-primary">Java <?php echo $d->skill_java ?>%</div></div></a>
         </div>
     </div>
   <div class="modal-footer" >
       <button data-dismiss="modal" class="btn btn-primary btn-rounded " type="button">Close</button>
   </div>
</div>
</div>
</div>
<?php } ?>


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
     <img class="img-responsive" src="<?php echo base_url()?>assets/upload/images/landing_pages/ss_tim.png" width="1005px" />
   </div>
   <!--Modal footer-->
   <div class="modal-footer" >
       <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
   </div>
</div>
</div>
</div>
