<div id="page-head">

<div class="pad-all text-center">
    <h3>Profile - Panitia (<?= $profile['username']; ?>).</h3>
    <p1>Lihat Profile Anda, Anda Juga Dapat Mengubah Identitas Dengan Yang Baru.</p>
</div>
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">

                  <div class="row">
                     <div class="col-lg-12" style="padding-top:50px">
                           <?php
                           foreach( $tampilProfil->result() as $user ){ ?>
 					                <!--Profile Widget-->
 					                <!--===================================================-->
 					                <div class="panel">

 					                    <div class="panel-body text-center bg-purple">
                                <div class="text-right">
                                  <button data-target="#demo-default-modal-pswd<?php echo $user->id ?>" data-toggle="modal" class="btn btn-danger">
                                     <span class="ti-pencil"> Ubah Password</span>
                                   </button>
                                   <button data-target="#demo-default-modal-ubah<?php echo $user->id ?>" data-toggle="modal" class="btn btn-success">
                                      <span class="ti-pencil"> Ubah Detail Profil</span>
                                    </button>
                                </div>
 					                        <img alt="Avatar" class="img-lg img-circle img-border mar-btm" src="<?php echo base_url('assets');?>/upload/images/foto_profil/<?php echo $user->photo ?>">

 					                        <h4 class="text-light"><?php echo $user->username ?></h4>
 					                        <p class="text-sm">Panitia Voting Aplikasi <b><?= $site['nama_website']; ?></b></p>
 					                    </div>
 					                    <div class="list-group bg-trans pad-btm">
                                  <?= $this->session->flashdata('flash'); ?>
 					                        <a class="list-group-item" href="#"><i class="ti-user icon-lg icon-fw"></i> Nama : <?php echo $user->first_name ?> <?php echo $user->last_name ?></a>
                                  <!-- <a class="list-group-item" href="#"><i class="ti-user icon-lg icon-fw"></i>ID : <?php echo $user->id ?></a> -->
                                  <a class="list-group-item" href="#"><i class="ti-user icon-lg icon-fw"></i>Username : <?php echo $user->username ?></a>
                                  <a class="list-group-item" href="#"><i class="ti-mobile icon-lg icon-fw"></i>Nomor Telephone : <?php echo $user->phone ?></a>
                                  <a class="list-group-item" href="#"><i class="ti-email icon-lg icon-fw"></i>Email : <?php echo $user->email ?></a>
                                  <a class="list-group-item" href="#"><i class="ti-time icon-lg icon-fw"></i>Create On : <?php echo $user->created_on ?></a>
                                  <a class="list-group-item" href="#"><i class="ti-timer icon-lg icon-fw"></i>Last Login : <?php echo $user->last_login ?></a>
                                  <a class="list-group-item" href="#"><i class="ti-timer icon-lg icon-fw"></i>Last Logout : <?php echo $user->last_logout ?></a>

                              </div>
 					                </div>
 					                <!--===================================================-->
                        <?php } // end foreach ?>
 					            </div>
                     </div>

</div>
<!--===================================================-->
<!--End page content-->

<!-- Start Modal Edit -->
<?php echo form_open_multipart('panitia/Profile/ubahProfile'); ?>
<div class="modal fade animated rotateInDownRight" id="demo-default-modal-ubah<?php echo $user->id ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

   <!--Modal header-->
   <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
       <h4 class="modal-title">Edit Profile</h4>
   </div>
   <input type="text" name="id" value="<?php echo $user->id ?>" />
   <!--Modal body-->
   <div class="modal-body" >

                           <div class="form-group col-md-6 required ">
                                  <label for="" class="control-label">Username</label><span class="red">*</span>
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                                    <input class="form-control" value="<?php echo $user->username ?>" placeholder="Username" required="required" name="username" type="text" id="username">
                                  </div>
                            </div>

                            <div class="form-group col-md-6 required ">
                                   <label for="" class="control-label">First Name</label><span class="red">*</span>
                                   <div class="input-group">
                                     <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                                     <input class="form-control" value="<?php echo $user->first_name ?>" placeholder="First Name" required="required" name="first_name" type="text" id="first_name">
                                   </div>
                             </div>

                             <div class="form-group col-md-6 required ">
                                    <label for="" class="control-label">Last Name</label><span class="red">*</span>
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                                      <input class="form-control" value="<?php echo $user->last_name ?>" placeholder="Last Name" required="required" name="last_name" type="text" id="last_name">
                                    </div>
                              </div>

                              <div class="form-group col-md-6 required ">
                                     <label for="" class="control-label">Phone</label><span class="red">*</span>
                                     <div class="input-group">
                                       <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                                       <input class="form-control" value="<?php echo $user->phone ?>" placeholder="Phone" required="required" name="phone" type="number" id="phone">
                                     </div>
                               </div>

                               <div class="form-group col-md-6 required ">
                                      <label for="" class="control-label">Email</label><span class="red">*</span>
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                                        <input class="form-control" value="<?php echo $user->email ?>" placeholder="Email" required="required" name="email" type="text" id="email">
                                      </div>
                                </div>
                                <div class="form-group col-md-6 required ">
                                     <label for="" class="control-label">Foto Profile</label><span class="red">*</span>
                                      <input  type="file" value="<?php echo $user->photo; ?>" name="photo" id="userfile" onchange="tampilkanPreview1(this,'preview1')"/>
                                      <p class="help-block">
                                         <?php //cek file apakah kosong?
                                         if (empty($user->photo)) {
                                           echo 'Belum Ada File Gambar Pada Item : '.$user->username ;
                                         }else{
                                           echo 'Gambar Saat Ini : '.substr($user->photo,0,30);
                                         }?>
                                       </p>
                                 </div>
                                   <div class="form-group col-md-6 required ">
                                     <label for="" class="control-label"></label>Preview Foto Profile
                                      <img src="<?php echo base_url('assets');?>/upload/images/foto_profil/<?php echo $user->photo ?>" id="preview1" width="150px" />
                                   </div>


   </div>
   <!--Modal footer-->
   <div class="modal-footer" style="margin-top: 400px">
       <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
       <button class="btn btn-primary btn-rounded">Save</button>
   </div>
</div>
</div>
</div>
<?php echo form_close(); ?>
<!-- End Modal Edit -->

<!-- Start Modal Pswd -->
<?php echo form_open_multipart('panitia/Profile/Pswd'); ?>
<div id="demo-default-modal-pswd<?php echo $user->id ?>" class="modal fade animated pulse">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                          <h4 class="modal-title">Apakah Anda Inggin Merubah Password <b>Anda (<?php echo $user->username ?>) ?</b></h4>
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
                               <label for="" class="control-label">Pasword Baru </label><span class="red">*</span>
                               <div class="input-group">
                                 <div class="input-group-addon"><i class="ti-key"></i></div>
                                 <input class="form-control frmpswd" placeholder="Pasword Baru"  required="required" name="password" type="password" id="password">
                         </div>
                        </div>

                        <div class="form-group col-md-12 ">
                        <div class="checkbox">
					                            <input id="demo-form-checkbox-2" class="magic-checkbox ckpswd" type="checkbox" >
					                            <label for="demo-form-checkbox-2">Show Password</label>
					                     </div>
                         </div>
                      <div class="modal-footer" style="margin-top: 130px">
                                <button class="btn btn-default btn-rounded" data-dismiss="modal" type="button">Close</button>
                                <button class="btn btn-success btn-rounded">Ubah Password</button>
                            </div>
                            <!-- <input type="checkbox" class="ckpswd"> Show password -->
                    </div>
                  </div>
                </div>
                </div>
<?php echo form_close(); ?>
<!-- End Modal Pswd -->

<!--jQuery [ REQUIRED ]-->
<script src="<?php echo base_url('assets');?>/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.ckpswd').click(function(){
			if($(this).is(':checked')){
				$('.frmpswd').attr('type','text');
			}else{
				$('.frmpswd').attr('type','password');
			}
		});
	});
</script>
