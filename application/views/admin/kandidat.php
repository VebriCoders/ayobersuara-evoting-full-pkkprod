<div id="page-head">

<div id="page-title" class="text-center">
    <h3>Data Kandidat - Admin</h3>
</div>

  <!--Breadcrumb-->
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <ol class="breadcrumb text-center">
    <li><a href="<?php echo base_url('admin/home') ?>"><i class="demo-pli-home"></i></a></li>
    <li><a>Master Data</a></li>
    <li class="active">Daftar Kandidat</li>
  </ol>
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <!--End breadcrumb-->

</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">

  <!-- Contact Toolbar -->
 <!---------------------------------->
 <div class="row pad-btm">
     <div class="col-sm-6 toolbar-left">
         <button  data-target="#demo-default-modal-tambah" data-toggle="modal" class="btn btn-purple">Tambah</button>
         <!-- <button data-target="#demo-default-modal-print" data-toggle="modal" class="btn btn-default"><i class="demo-pli-printer"></i></button> -->
     </div>
  <?php echo form_open_multipart('admin/kandidat/CariData'); ?>
     <div class="col-sm-6 toolbar-right text-right">
         Search by :
         <div class="form-group">
           <?php if($this->uri->segment(3) != 'CariData'){ ?>
              <input type="text" placeholder="Nama Calon" id="demo-inline-inputmail" name="nama_kandidat" class="form-control">
          <?php } ?>

          <?php if($this->uri->segment(3) == 'CariData'){
             $nama_kandidat = $this->input->post('nama_kandidat'); ?>
             <input type="text" value="<?= $nama_kandidat ?>" placeholder="Nama Calon" id="demo-inline-inputmail" name="nama_kandidat" class="form-control">
          <?php } ?>
        </div>
         <div class="select">
             <select id="demo-ease" class="selectpicker" id="jenis_pemilihan" name="jenis_pemilihan">
               <option value="">Pilih Jenis Pemilihan</option>
               <?php foreach ($joinKat_Surat ->result() as $tbl_surat_suara){ ?>
                 <option value="<?php echo $tbl_surat_suara->id;?>"><?php echo $tbl_surat_suara->nama_surat; ?> </option>
                 <?php
               }
               ?>
             </select>
         </div>
         <button class="btn btn-default" style="margin-bottom:15px"><i class="ti-filter"></i> Filter</button>
         <a class="btn btn-default" style="margin-bottom:15px" href="<?php echo base_url('admin/kandidat'); ?>"><i class="ti-reload"></i></a>
     </div>
 </div>
 <?php echo form_close(); ?>
 <!---------------------------------->


<?= $this->session->flashdata('flash'); ?>


  <!-- Data Out Query  -->
  <div class="row" style="margin-top:4px">
      <div class="col-sm-12">
          <div class="row">
  <!-- Contact Widget -->
  <!---------------------------------->
  <?php
  foreach( $tampilKandidat->result() as $kandidat ){ ?>
  <div class="col-lg-3" >
  <div class="panel pos-rel">
      <div class="pad-all text-center">
          <div class="widget-control">
              <!-- <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span></a> -->
              <div class="btn-group dropdown">
                  <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
                  <ul class="dropdown-menu dropdown-menu-right" style="">
                      <li><a data-target="#demo-default-modal-edit<?php echo $kandidat->id; ?>" data-toggle="modal"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
                      <li><a data-target="#demo-default-modal-hapus<?php echo $kandidat->id ?>" data-toggle="modal"><i class="icon-lg icon-fw demo-pli-recycling"></i> Hapus</a></li>
                      <li><a href="<?= base_url('Cetak/cetakKandidat/'.$kandidat->id) ?>" target="__blank"><i class="icon-lg icon-fw demo-pli-printer"></i>Print</a></li>
                      <!-- <li class="divider"></li> -->
                  </ul>
              </div>
          </div>
          <a href="#">
              <img alt="Profile Picture" class="img-lg img-circle mar-ver" src="<?php echo base_url()?>assets/upload/images/foto_kandidat/<?php echo $kandidat->photo_ketua ?>">
              &nbsp
              <img alt="Profile Picture" class="img-lg img-circle mar-ver" src="<?php echo base_url()?>assets/upload/images/foto_kandidat/<?php echo $kandidat->photo_wakil ?>">
              <p class="text-lg text-semibold mar-no text-main"><?php echo $kandidat->nama_kandidat ?> (<?php echo $kandidat->nomor_calon_kandidat ?>)</p>
              <p class="text-sm">Calon Ketua dan Wakil (<?php echo $kandidat->namasurat ?>)</p>
              <p class="text-sm">Nama Ketua : <?php echo $kandidat->nama_ketua ?></p>
              <p class="text-sm">Nama Wakil : <?php echo $kandidat->nama_wakil ?></p>
          </a>
          <div class="pad-top btn-groups">
              <p class="text-sm">Social Media Calon Ketua</p>
              <a href="<?php echo $kandidat->fb_ketua ?>" target="_blank" class="btn btn-icon demo-pli-facebook icon-lg add-tooltip" data-original-title="Facebook" data-container="body"></a>
              <a href="<?php echo $kandidat->ig_ketua ?>" target="_blank" class="btn btn-icon demo-pli-instagram icon-lg add-tooltip" data-original-title="Instagram" data-container="body"></a>
              <a href="<?php echo $kandidat->tw_ketua ?>" target="_blank" class="btn btn-icon demo-pli-twitter icon-lg add-tooltip" data-original-title="Twitter" data-container="body"></a>
              <a href="<?php echo $kandidat->yt_ketua ?>" target="_blank" class="btn btn-icon ion-social-youtube-outline icon-lg add-tooltip" data-original-title="Youtube" data-container="body"></a>
              <a href="https://api.whatsapp.com/send?phone=<?php echo $kandidat->wa_ketua ?>" target="_blank" class="btn btn-icon ion-social-whatsapp-outline icon-lg add-tooltip" data-original-title="Whatsapp" data-container="body"></a>
          </div>
          <div class="pad-top btn-groups">
              <p class="text-sm">Social Media Calon Wakil</p>
              <a href="<?php echo $kandidat->fb_wakil ?>" target="_blank" class="btn btn-icon demo-pli-facebook icon-lg add-tooltip" data-original-title="Facebook" data-container="body"></a>
              <a href="<?php echo $kandidat->ig_wakil ?>" target="_blank" class="btn btn-icon demo-pli-instagram icon-lg add-tooltip" data-original-title="Instagram" data-container="body"></a>
              <a href="<?php echo $kandidat->tw_wakil ?>" target="_blank" class="btn btn-icon demo-pli-twitter icon-lg add-tooltip" data-original-title="Twitter" data-container="body"></a>
              <a href="<?php echo $kandidat->yt_wakil ?>" target="_blank" class="btn btn-icon ion-social-youtube-outline icon-lg add-tooltip" data-original-title="Youtube" data-container="body"></a>
              <a href="https://api.whatsapp.com/send?phone=<?php echo $kandidat->wa_wakil ?>" target="_blank" class="btn btn-icon ion-social-whatsapp-outline icon-lg add-tooltip" data-original-title="Whatsapp" data-container="body"></a>
          </div>
      </div>
  </div>
  </div>
  <?php } ?>
  <!---------------------------------->
</div>
</div>
</div>
</div>
<!--===================================================-->
<!--End page content-->

<!-- awal foreach edit hapus -->
<?php
foreach( $tampilKandidat->result() as $kandidat ){ ?>

  <!-- Start Modal Hapus -->
   <div id="demo-default-modal-hapus<?php echo $kandidat->id ?>" class="modal fade animated pulse">
                     <div class="modal-dialog ">
                       <div class="modal-content">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                             <h4 class="modal-title">Hapus Kandidat <b>(<?php echo $kandidat->nama_kandidat ?>)</b></h4>
                         </div>
                         <div class="modal-body">
                                   <p>Apakah anda yakin ingin menghapus Kandidat <b> (<?php echo $kandidat->nama_kandidat ?>)</b> ?</p>
                                   <br>
                                   <div class="text-center">
                                   <p>Detail Kandidat</p>
                                   <p>Nomor Kandidat : <?php echo $kandidat->nomor_calon_kandidat ?></p>
                                   <p>Jenis Pemilihan : <?php echo $kandidat->namasurat ?></p>
                                   <p>Kategori Kandidat : <?php echo $kandidat->namakat ?> </p>
                                   <p>Nama Kandidat   : <?php echo $kandidat->nama_kandidat ?></p>
                                   <p>Nama Ketua      : <?php echo $kandidat->nama_ketua ?></p>
                                   <p>Nama Wakil      : <?php echo $kandidat->nama_wakil ?></p>
                                 </div>
                         </div>
                         <div class="modal-footer">
                                   <button class="btn btn-default btn-rounded" data-dismiss="modal" type="button">Close</button>
                                   <a class="btn btn-danger btn-rounded" href="<?php echo base_url('admin/Kandidat/Hapus/'. $kandidat->id) ?>">Hapus Kandidat</a>
                               </div>
                       </div>
                     </div>
                   </div>
   <!-- End Modal Hapus -->

<!--Default Bootstrap Modal Tambah Edit-->
<!--===================================================-->
<?php echo form_open_multipart('admin/Kandidat/Edit'); ?>
<div class="modal fade animated bounce" id="demo-default-modal-edit<?php echo $kandidat->id; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg " >
        <div class="modal-content">

            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Edit Kandidat</h4>
            </div>
            <input type="hidden" name="id" value="<?php echo $kandidat->id; ?>" />
            <!--Modal body-->
            <div class="modal-body">
                <p class="text-semibold text-main">*Isi Form Dengan Benar dan Data Real</p>
                <div class="form-group col-md-6 required ">
                       <label for="" class="control-label">Nama Calon Kandidat</label><span class="red">*</span>
                       <div class="input-group">
                         <div class="input-group-addon"><i class="ti-notepad"></i></div>
                         <input class="form-control" value="<?php echo $kandidat->nama_kandidat; ?>" placeholder="ketua & wakil" required="required" name="nama_kandidat" type="text" id="nama_kandidat">
                       </div>
                 </div>
                 <div class="form-group col-md-6 required ">
                        <label for="" class="control-label">No Calon</label><span class="red">*</span>
                        <div class="input-group">
                          <div class="input-group-addon"><i class="ti-stamp"></i></div>
                          <input class="form-control" value="<?php echo $kandidat->nomor_calon_kandidat; ?>" placeholder="Nomor Calon Pada Jenis Pemilihan" required="required" name="nomor_calon_kandidat" type="number" id="nomor_calon_kandidat">
                        </div>
                  </div>
                  <div class="form-group col-md-6 required ">
                         <label for="" class="control-label">Jenis Pemilihan</label><span class="red">*</span>
                         <div class="input-group">
                           <div class="input-group-addon selectpicker"><i class="ti-book"></i></div>
                           <select  value=""<?php echo $kandidat->jenis_pemilihan; ?> class="form-control selectpicker" id="jenis_pemilihan" name="jenis_pemilihan">
                             <?php foreach ($joinKat_Surat ->result() as $tbl_surat_suara){
                              if ($tbl_surat_suara->id== $kandidat->jenis_pemilihan){
                                echo "<option selected = 'selected' value='".$tbl_surat_suara->id."'>".$tbl_surat_suara->nama_surat."</option>";
                              }else{
                                echo "<option value='".$tbl_surat_suara->id."'>".$tbl_surat_suara->nama_surat."</option>";
                              }
                            }?>
                          </select>
                      </div>
                   </div>
                   <div class="form-group col-md-6 required ">
                          <label for="" class="control-label">Kategori Kandidat</label><span class="red">*</span>
                          <div class="input-group">
                            <div class="input-group-addon selectpicker"><i class="ti-save-alt"></i></div>
                            <select value=""<?php echo $kandidat->kategori_kandidat; ?> class="form-control selectpicker" id="kategori_kandidat" name="kategori_kandidat">
                              <?php foreach ($joinKat_Kandidat ->result() as $tbl_kat_kandidat){
                               if ($tbl_kat_kandidat->id== $kandidat->kategori_kandidat){
                                 echo "<option selected = 'selected' value='".$tbl_kat_kandidat->id."'>".$tbl_kat_kandidat->nama_kategori."</option>";
                               }else{
                                 echo "<option value='".$tbl_kat_kandidat->id."'>".$tbl_kat_kandidat->nama_kategori."</option>";
                               }
                             }?>
                           </select>
                       </div>
                    </div>
                    <div class="form-group col-md-6 required ">
                        <label for="" class="control-label">Visi</label><span class="red">*</span>
                           <textarea id="demo-textarea-input" rows="3" class="form-control" required="required"  name="visi" placeholder="Visi.."><?php echo $kandidat->visi; ?></textarea>
                    </div>
                    <div class="form-group col-md-6 required ">
                        <label for="" class="control-label">Misi</label><span class="red">*</span>
                           <textarea id="demo-textarea-input" rows="3" class="form-control" required="required"  name="misi" placeholder="Misi.."><?php echo $kandidat->misi; ?></textarea>
                    </div>
                 <div class="form-group col-md-6 required ">
                        <label for="" class="control-label">Nama Ketua</label><span class="red">*</span>
                        <div class="input-group">
                          <div class="input-group-addon"><i class="ti-user"></i></div>
                          <input class="form-control" value="<?php echo $kandidat->nama_ketua; ?>" placeholder="Nama Ketua" required="required" name="nama_ketua" type="text" id="nama_ketua">
                        </div>
                  </div>
                  <div class="form-group col-md-6 required ">
                         <label for="" class="control-label">Nama Wakil</label><span class="red">*</span>
                         <div class="input-group">
                           <div class="input-group-addon"><i class="ti-user"></i></div>
                           <input class="form-control" value="<?php echo $kandidat->nama_wakil; ?>" placeholder="Nama Wakil" required="required" name="nama_wakil" type="text" id="nama_wakil">
                         </div>
                   </div>
                   <div class="form-group col-md-6 required ">
                       <label for="" class="control-label">Alamat Ketua</label><span class="red">*</span>
                          <textarea id="demo-textarea-input" rows="3" class="form-control" required="required"  name="alamat_ketua" placeholder="Alamat.."><?php echo $kandidat->alamat_ketua; ?></textarea>
                   </div>
                   <div class="form-group col-md-6 required ">
                       <label for="" class="control-label">Alamat Wakil</label><span class="red">*</span>
                          <textarea id="demo-textarea-input" rows="3" class="form-control" required="required"  name="alamat_wakil" placeholder="Alamat.."><?php echo $kandidat->alamat_wakil; ?></textarea>
                   </div>
                     <div class="form-group col-md-6 required ">
                            <label for="" class="control-label">Whatsapp Ketua</label><span class="red">*</span>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="ion-social-whatsapp-outline"></i></div>
                              <input class="form-control" value="<?php echo $kandidat->wa_ketua; ?>" placeholder="No Whatsapp Ketua" value="62" required="required" name="wa_ketua" type="number" id="wa_ketua">
                            </div>
                      </div>
                      <div class="form-group col-md-6 required ">
                             <label for="" class="control-label">Whatsapp Wakil</label><span class="red">*</span>
                             <div class="input-group">
                               <div class="input-group-addon"><i class="ion-social-whatsapp-outline"></i></div>
                               <input class="form-control" value="<?php echo $kandidat->wa_wakil; ?>" placeholder="No Whatsapp Wakil" value="62" required="required" name="wa_wakil" type="number" id="wa_wakil">
                             </div>
                       </div>
                     <div class="form-group col-md-6 required ">
                            <label for="" class="control-label">Instagram Ketua</label><span class="red">*</span>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="ti-instagram"></i></div>
                              <input class="form-control" value="<?php echo $kandidat->ig_ketua; ?>" placeholder="Link Instagram Ketua" required="required" name="ig_ketua" type="text" id="ig_ketua">
                            </div>
                      </div>
                      <div class="form-group col-md-6 required ">
                             <label for="" class="control-label">Instagram Wakil</label><span class="red">*</span>
                             <div class="input-group">
                               <div class="input-group-addon"><i class="ti-instagram"></i></div>
                               <input class="form-control" value="<?php echo $kandidat->ig_wakil; ?>" placeholder="Link Instagram Wakil" required="required" name="ig_wakil" type="text" id="ig_wakil">
                             </div>
                       </div>
                       <div class="form-group col-md-6 required ">
                              <label for="" class="control-label">Facebook Ketua</label><span class="red">*</span>
                              <div class="input-group">
                                <div class="input-group-addon"><i class="ti-facebook"></i></div>
                                <input class="form-control" value="<?php echo $kandidat->fb_ketua; ?>" placeholder="Link Facebook Ketua" required="required" name="fb_ketua" type="text" id="fb_ketua">
                              </div>
                        </div>
                        <div class="form-group col-md-6 required ">
                               <label for="" class="control-label">Facebook Wakil</label><span class="red">*</span>
                               <div class="input-group">
                                 <div class="input-group-addon"><i class="ti-facebook"></i></div>
                                 <input class="form-control" value="<?php echo $kandidat->fb_wakil; ?>" placeholder="Link Facebook Wakil" required="required" name="fb_wakil" type="text" id="fb_wakil">
                               </div>
                         </div>
                         <div class="form-group col-md-6 required ">
                                <label for="" class="control-label">Twitter Ketua</label><span class="red">*</span>
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="ti-twitter"></i></div>
                                  <input class="form-control" value="<?php echo $kandidat->tw_ketua; ?>" placeholder="Link Twitter Ketua" required="required" name="tw_ketua" type="text" id="tw_ketua">
                                </div>
                          </div>
                          <div class="form-group col-md-6 required ">
                                 <label for="" class="control-label">Twitter Wakil</label><span class="red">*</span>
                                 <div class="input-group">
                                   <div class="input-group-addon"><i class="ti-twitter"></i></div>
                                   <input class="form-control" value="<?php echo $kandidat->tw_wakil; ?>" placeholder="Link Twitter Wakil" required="required" name="tw_wakil" type="text" id="tw_wakil">
                                 </div>
                           </div>
                           <div class="form-group col-md-6 required ">
                                  <label for="" class="control-label">Youtube Ketua</label><span class="red">*</span>
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="ion-social-youtube"></i></div>
                                    <input class="form-control" value="<?php echo $kandidat->yt_ketua; ?>" placeholder="Link Youtube Ketua" required="required" name="yt_ketua" type="text" id="yt_ketua">
                                  </div>
                            </div>
                            <div class="form-group col-md-6 required ">
                                   <label for="" class="control-label">Youtube Wakil</label><span class="red">*</span>
                                   <div class="input-group">
                                     <div class="input-group-addon"><i class="ion-social-youtube"></i></div>
                                     <input class="form-control" value="<?php echo $kandidat->yt_wakil; ?>" placeholder="Link Youtube Wakil" required="required" name="yt_wakil" type="text" id="yt_wakil">
                                   </div>
                             </div>
                             <div class="form-group col-md-6 required ">
                               <label for="" class="control-label">Foto Profile ketua</label><span class="red">*</span>
                               <div class="input-group">
                                 <div class="input-group-addon"><i class="ti-file"></i></div>
                                <input  type="file" value="<?php echo $kandidat->photo_ketua; ?>" name="photo_ketua" id="userfile" onchange="tampilkanPreview(this,'preview')"/>
                                <p class="help-block">
                                   <?php //cek file apakah kosong?
                                   if (empty($kandidat->photo_ketua)) {
                                     echo 'Belum Ada File Gambar Pada Item : '.$kandidat->nama_ketua ;
                                   }else{
                                     echo 'Gambar Saat Ini : '.substr($kandidat->photo_ketua,0,30);
                                   }?>
                                 </p>
                              </div>
                           </div>
                           <div class="form-group col-md-6 required ">
                             <label for="" class="control-label">Foto Profile Wakil</label><span class="red">*</span>
                             <div class="input-group">
                               <div class="input-group-addon"><i class="ti-file"></i></div>
                              <input  type="file" value="<?php echo $kandidat->photo_wakil; ?>" name="photo_wakil" id="userfile" onchange="tampilkanPreview1(this,'preview1')"/>
                              <p class="help-block">
                                 <?php //cek file apakah kosong?
                                 if (empty($kandidat->photo_wakil)) {
                                   echo 'Belum Ada File Gambar Pada Item : '.$kandidat->nama_wakil ;
                                 }else{
                                   echo 'Gambar Saat Ini : '.substr($kandidat->photo_wakil,0,30);
                                 }?>
                               </p>
                            </div>
                         </div>
                           <div class="form-group col-md-6 required ">
                              <img id="preview" src="<?php echo base_url()?>assets/upload/images/foto_kandidat/<?php echo $kandidat->photo_ketua ?>" width="150px" />
                           </div>
                           <div class="form-group col-md-6 required ">
                              <img id="preview1" src="<?php echo base_url()?>assets/upload/images/foto_kandidat/<?php echo $kandidat->photo_wakil ?>" width="150px" />
                           </div>
            </div>

            <!--Modal footer-->
            <div class="modal-footer" style="margin-top:1040px">
                <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                <button class="btn btn-success">Save Kandidat</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<!--===================================================-->
<!--End Default Bootstrap Modal Edit-->

<!-- end foreach edit dan hapus data  -->
<?php } ?>


<!--Default Bootstrap Modal Tambah Kandidat-->
<!--===================================================-->
<?php echo form_open_multipart('admin/Kandidat/Tambah'); ?>
<div class="modal fade animated bounce" id="demo-default-modal-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg " >
        <div class="modal-content">

            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Tambah Kandidat</h4>
            </div>

            <!--Modal body-->
            <div class="modal-body">
                <p class="text-semibold text-main">*Isi Form Dengan Benar dan Data Real</p>
                <div class="form-group col-md-6 required ">
                       <label for="" class="control-label">Nama Calon Kandidat</label><span class="red">*</span>
                       <div class="input-group">
                         <div class="input-group-addon"><i class="ti-notepad"></i></div>
                         <input class="form-control" placeholder="ketua & wakil" required="required" name="nama_kandidat" type="text" id="nama_kandidat">
                       </div>
                 </div>
                 <div class="form-group col-md-6 required ">
                        <label for="" class="control-label">No Calon</label><span class="red">*</span>
                        <div class="input-group">
                          <div class="input-group-addon"><i class="ti-stamp"></i></div>
                          <input class="form-control" placeholder="Nomor Calon Pada Jenis Pemilihan" required="required" name="nomor_calon_kandidat" type="number" id="nomor_calon_kandidat">
                        </div>
                  </div>
                  <div class="form-group col-md-6 required ">
                         <label for="" class="control-label">Jenis Pemilihan</label><span class="red">*</span>
                         <div class="input-group">
                           <div class="input-group-addon selectpicker"><i class="ti-book"></i></div>
                           <select class="form-control selectpicker" id="jenis_pemilihan" name="jenis_pemilihan">
                             <option value="">Pilih Jenis Pemilihan</option>
                             <?php foreach ($joinKat_Surat ->result() as $tbl_surat_suara){ ?>
                               <option value="<?php echo $tbl_surat_suara->id;?>"><?php echo $tbl_surat_suara->nama_surat; ?> </option>
                               <?php
                             }
                             ?>
                          </select>
                      </div>
                   </div>
                   <div class="form-group col-md-6 required ">
                          <label for="" class="control-label">Kategori Kandidat</label><span class="red">*</span>
                          <div class="input-group">
                            <div class="input-group-addon selectpicker"><i class="ti-save-alt"></i></div>
                            <select class="form-control selectpicker" id="kategori_kandidat" name="kategori_kandidat">
                              <option value="">Pilih Kategori Saksi</option>
                              <?php foreach ($joinKat_Kandidat ->result() as $tbl_kat_kandidat){ ?>
                                <option value="<?php echo $tbl_kat_kandidat->id;?>"><?php echo $tbl_kat_kandidat->nama_kategori; ?> </option>
                                <?php
                              }
                              ?>
                           </select>
                       </div>
                    </div>
                    <div class="form-group col-md-6 required ">
                        <label for="" class="control-label">Visi</label><span class="red">*</span>
                           <textarea id="demo-textarea-input" rows="3" class="form-control" required="required"  name="visi" placeholder="Visi.."></textarea>
                    </div>
                    <div class="form-group col-md-6 required ">
                        <label for="" class="control-label">Misi</label><span class="red">*</span>
                           <textarea id="demo-textarea-input" rows="3" class="form-control" required="required"  name="misi" placeholder="Misi.."></textarea>
                    </div>
                 <div class="form-group col-md-6 required ">
                        <label for="" class="control-label">Nama Ketua</label><span class="red">*</span>
                        <div class="input-group">
                          <div class="input-group-addon"><i class="ti-user"></i></div>
                          <input class="form-control" placeholder="Nama Ketua" required="required" name="nama_ketua" type="text" id="nama_ketua">
                        </div>
                  </div>
                  <div class="form-group col-md-6 required ">
                         <label for="" class="control-label">Nama Wakil</label><span class="red">*</span>
                         <div class="input-group">
                           <div class="input-group-addon"><i class="ti-user"></i></div>
                           <input class="form-control" placeholder="Nama Wakil" required="required" name="nama_wakil" type="text" id="nama_wakil">
                         </div>
                   </div>
                   <div class="form-group col-md-6 required ">
                       <label for="" class="control-label">Alamat Ketua</label><span class="red">*</span>
                          <textarea id="demo-textarea-input" rows="3" class="form-control" required="required"  name="alamat_ketua" placeholder="Alamat.."></textarea>
                   </div>
                   <div class="form-group col-md-6 required ">
                       <label for="" class="control-label">Alamat Wakil</label><span class="red">*</span>
                          <textarea id="demo-textarea-input" rows="3" class="form-control" required="required"  name="alamat_wakil" placeholder="Alamat.."></textarea>
                   </div>
                     <div class="form-group col-md-6 required ">
                            <label for="" class="control-label">Whatsapp Ketua</label><span class="red">*</span>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="ion-social-whatsapp-outline"></i></div>
                              <input class="form-control" placeholder="No Whatsapp Ketua" value="62" required="required" name="wa_ketua" type="number" id="wa_ketua">
                            </div>
                      </div>
                      <div class="form-group col-md-6 required ">
                             <label for="" class="control-label">Whatsapp Wakil</label><span class="red">*</span>
                             <div class="input-group">
                               <div class="input-group-addon"><i class="ion-social-whatsapp-outline"></i></div>
                               <input class="form-control" placeholder="No Whatsapp Wakil" value="62" required="required" name="wa_wakil" type="number" id="wa_wakil">
                             </div>
                       </div>
                     <div class="form-group col-md-6 required ">
                            <label for="" class="control-label">Instagram Ketua</label><span class="red">*</span>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="ti-instagram"></i></div>
                              <input class="form-control" placeholder="Link Instagram Ketua" required="required" name="ig_ketua" type="text" id="ig_ketua">
                            </div>
                      </div>
                      <div class="form-group col-md-6 required ">
                             <label for="" class="control-label">Instagram Wakil</label><span class="red">*</span>
                             <div class="input-group">
                               <div class="input-group-addon"><i class="ti-instagram"></i></div>
                               <input class="form-control" placeholder="Link Instagram Wakil" required="required" name="ig_wakil" type="text" id="ig_wakil">
                             </div>
                       </div>
                       <div class="form-group col-md-6 required ">
                              <label for="" class="control-label">Facebook Ketua</label><span class="red">*</span>
                              <div class="input-group">
                                <div class="input-group-addon"><i class="ti-facebook"></i></div>
                                <input class="form-control" placeholder="Link Facebook Ketua" required="required" name="fb_ketua" type="text" id="fb_ketua">
                              </div>
                        </div>
                        <div class="form-group col-md-6 required ">
                               <label for="" class="control-label">Facebook Wakil</label><span class="red">*</span>
                               <div class="input-group">
                                 <div class="input-group-addon"><i class="ti-facebook"></i></div>
                                 <input class="form-control" placeholder="Link Facebook Wakil" required="required" name="fb_wakil" type="text" id="fb_wakil">
                               </div>
                         </div>
                         <div class="form-group col-md-6 required ">
                                <label for="" class="control-label">Twitter Ketua</label><span class="red">*</span>
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="ti-twitter"></i></div>
                                  <input class="form-control" placeholder="Link Twitter Ketua" required="required" name="tw_ketua" type="text" id="tw_ketua">
                                </div>
                          </div>
                          <div class="form-group col-md-6 required ">
                                 <label for="" class="control-label">Twitter Wakil</label><span class="red">*</span>
                                 <div class="input-group">
                                   <div class="input-group-addon"><i class="ti-twitter"></i></div>
                                   <input class="form-control" placeholder="Link Twitter Wakil" required="required" name="tw_wakil" type="text" id="tw_wakil">
                                 </div>
                           </div>
                           <div class="form-group col-md-6 required ">
                                  <label for="" class="control-label">Youtube Ketua</label><span class="red">*</span>
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="ion-social-youtube"></i></div>
                                    <input class="form-control" placeholder="Link Youtube Ketua" required="required" name="yt_ketua" type="text" id="yt_ketua">
                                  </div>
                            </div>
                            <div class="form-group col-md-6 required ">
                                   <label for="" class="control-label">Youtube Wakil</label><span class="red">*</span>
                                   <div class="input-group">
                                     <div class="input-group-addon"><i class="ion-social-youtube"></i></div>
                                     <input class="form-control" placeholder="Link Youtube Wakil" required="required" name="yt_wakil" type="text" id="yt_wakil">
                                   </div>
                             </div>
                             <div class="form-group col-md-6 required ">
                               <label for="" class="control-label">Foto Profile ketua</label><span class="red">*</span>
                               <div class="input-group">
                                 <div class="input-group-addon"><i class="ti-file"></i></div>
                                <input  type="file" name="photo_ketua" id="userfile" onchange="tampilkanPreview2(this,'preview2')"/>
                              </div>
                           </div>
                           <div class="form-group col-md-6 required ">
                             <label for="" class="control-label">Foto Profile Wakil</label><span class="red">*</span>
                             <div class="input-group">
                               <div class="input-group-addon"><i class="ti-file"></i></div>
                              <input  type="file" name="photo_wakil" id="userfile" onchange="tampilkanPreview3(this,'preview3')"/>
                            </div>
                         </div>
                           <div class="form-group col-md-6 required ">
                              <img id="preview2" width="150px" />
                           </div>
                           <div class="form-group col-md-6 required ">
                              <img id="preview3" width="150px" />
                           </div>


            </div>

            <!--Modal footer-->
            <div class="modal-footer" style="margin-top:1010px">
                <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                <button class="btn btn-success">Save Kandidat</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<!--===================================================-->
<!--End Default Bootstrap Modal Tambah-->
