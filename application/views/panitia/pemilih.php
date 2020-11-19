<div id="page-head">

<div class="pad-all text-center">
    <h3>Data Pemilih - Admin</h3>
</div>
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">

  <!-- Cari -->
  <div class="row pad-btm">
      <div class="col-sm-6 toolbar-left">
          <button  data-target="#demo-default-modal-tambah" data-toggle="modal" class="btn btn-purple">Tambah</button>
          <button data-target="#demo-default-modal-print" data-toggle="modal" class="btn btn-default"><i class="demo-pli-printer"></i></button>
      </div>
      <?php echo form_open_multipart('admin/pemilih/CariData'); ?>
      <div class="col-sm-6 toolbar-right text-right">
          Search by :
          <div class="form-group">
            <?php if($this->uri->segment(3) != 'CariData'){ ?>
               <input type="text" placeholder="Nomor Pemilih" id="demo-inline-inputmail" name="nomor_pemilih" class="form-control">
           <?php } ?>

           <?php if($this->uri->segment(3) == 'CariData'){
              $nomor_pemilih = $this->input->post('nomor_pemilih'); ?>
              <input type="text" value="<?= $nomor_pemilih ?>" placeholder="Nomor Pemilih" id="demo-inline-inputmail" name="nomor_pemilih" class="form-control">
           <?php } ?>
         </div>
          <div class="select">
              <select id="demo-ease" class="selectpicker" name="verifikasi_pemilih">
                <?php if($this->uri->segment(3)  == 'CariData'){
                $sts = $this->input->post('verifikasi_pemilih');
                if($sts == '1'){ ?>
                 <option  value="1" selected="selected">Terverifikasi</option>
                <?php }else{ ?>
                 <option  value="1">Terverifikasi</option>
                <?php }
                if ($sts == '0'){ ?>
                 <option  value="0" selected="selected">Tidak Terverifikasi</option>
                <?php } else{ ?>
                 <option  value="0">Tidak Terverifikasi</option>
                <?php }
                if ($sts == ''){ ?>
                 <option value="" selected="selected">Pilih Status</option>
                <?php } ?>
                <?php }
                else{ ?>
                <option selected="selected" disabled="disabled" value="">Pilih Status Verifikasi</option>
                <option  value="1">Terverifikasi</option>
                <option  value="0">Tidak Terverifikasi</option>
              <?php } ?>
              </select>
          </div>
          <div class="select">
              <select id="demo-ease" class="selectpicker" name="active">
                <?php if($this->uri->segment(3)  == 'CariData'){
                $sts = $this->input->post('active');
                if($sts == '1'){ ?>
                 <option  value="1" selected="selected">Aktif</option>
                <?php }else{ ?>
                 <option  value="1">Aktif</option>
                <?php }
                if ($sts == '0'){ ?>
                 <option  value="0" selected="selected">Tidak Aktif</option>
                <?php } else{ ?>
                 <option  value="0">Tidak Aktif</option>
                <?php }
                if ($sts == ''){ ?>
                 <option value="" selected="selected">Pilih Status</option>
                <?php } ?>
                <?php }
                else{ ?>
                <option selected="selected" disabled="disabled" value="">Pilih Status</option>
                <option  value="1">Aktif</option>
                <option  value="0">Tidak Aktif</option>
              <?php } ?>
              </select>
          </div>
          <button class="btn btn-default" style="margin-bottom:15px"><i class="ti-filter"></i> Filter</button>
          <a class="btn btn-default" style="margin-bottom:15px" href="<?php echo base_url('admin/pemilih'); ?>"><i class="ti-reload"></i></a>
      </div>
  </div>
  <?php echo form_close(); ?>


  <div class="panel">
  					    <div class="panel-heading">
  					        <h3 class="panel-title">Data Pemilih</h3>
  					    </div>

  					    <!-- Foo Table - Filtering -->
  					    <!--===================================================-->
  					    <div class="panel-body">
  					        <table id="demo-foo-filteringkategoriveb" class="table table-bordered table-hover toggle-circle" data-page-size="15">
  					            <thead>
  					                <tr>
  					                    <th data-toggle="true">No.</th>
  					                    <th>Nama Pemilih</th>
                                <th>Email Pemilih</th>
  					                    <th>Nomor Pemilihan</th>
  					                    <th data-hide="phone, tablet">Nomor Telepon/Wa</th>
                                <th data-hide="phone, tablet">Jenis Kelamin</th>
                                <th data-hide="phone, tablet">Kategori</th>
  					                    <th data-hide="phone, tablet">Status Memilih</th>
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
  					                                <option value="Sudah">Sudah Memilih</option>
  					                                <option value="Belum">Belum Memilih</option>
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
                          $number=1;
                          foreach( $tampilPemilih->result() as $pemilih ){ ?>
  					                <tr>
                                <td><?php echo $number ?>.</td>
  					                    <td><?php echo $pemilih->nama_pemilih ?></td>
                                <td><?php echo $pemilih->email ?></td>
  					                    <td><?php echo $pemilih->nomor_pemilih ?></td>
  					                    <td><?php echo $pemilih->no_telp ?></td>
  					                    <td><?php if($pemilih->jk=='1'){echo "Laki-Laki";}else{echo "Perempuan";} ?></td>
                                <td><?php echo $pemilih->namakat ?></td>
  					                    <td>
                                  <?php if($pemilih->status_memilih=='1'){ ?>
                                  <span class="label label-table label-success" style="width:100px">Sudah</span>
                                <?php }else{ ?>
                                  <span class="label label-table label-dark">Belum</span>
                                <?php } ?>
                                </td>
                                <td>
                                  <button data-target="#demo-default-modal-detail<?php echo $pemilih->id ?>" data-toggle="modal" class="btn btn-success">Detail</button>
                                  <button data-target="#demo-default-modal-edit<?php echo $pemilih->id ?>" data-toggle="modal" class="btn btn-warning">Edit</button>
                                  <button data-target="#demo-default-modal-hapus<?php echo $pemilih->id ?>" data-toggle="modal" class="btn btn-danger">Hapus</button>
                                  <?php if($pemilih->verifikasi_pemilih=='0'){ ?>
                                  <button data-target="#demo-default-modal-verifikasi<?php echo $pemilih->id ?>" data-toggle="modal" class="btn btn-info">Verifikasi</button>
                                  <?php }else{ ?>
                                  <button data-target="#demo-default-modal-verifikasi<?php echo $pemilih->id ?>" data-toggle="modal" disabled class="btn btn-info">Di Verifikasi</button>
                                  <?php } ?>
                                  <?php if($pemilih->active=='1'){ ?>
                                  <button disabled class="btn btn-mint">Email Aktif</button>
                                  <?php }else{ ?>
                                  <button  disabled class="btn btn-mint">Email Tidak Aktif</button>
                                  <?php } ?>
                                </td>
  					                </tr>
                            <?php $number++; } ?>
  					            </tbody>
  					            <tfoot>
  					                <tr>
  					                    <td colspan="9">
  					                        <div class="text-right">
  					                            <ul class="pagination"></ul>
  					                        </div>
  					                    </td>
  					                </tr>
  					            </tfoot>
  					        </table>
                    Jumlah Pemilih : <?php echo $jumlah_pemilih ?>
  					    </div>
  					    <!--===================================================-->
  					    <!-- End Foo Table - Filtering -->

  					</div>

</div>
<!--===================================================-->
<!--End page content-->

<!-- foreach edit hapus dll -->
<?php
foreach( $tampilPemilih->result() as $pemilih ){ ?>


<!--Default Bootstrap Modal Edit Pemilih-->
<!--===================================================-->
<?php echo form_open_multipart('admin/Pemilih/Edit'); ?>
<div class="modal fade animated bounce" id="demo-default-modal-edit<?php echo $pemilih->id; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Edit Pemilih</h4>
            </div>
            <input type="text" name="id" value="<?php echo $pemilih->id; ?>" />
            <!--Modal body-->
            <div class="modal-body">
                <p class="text-semibold text-main">*Isi Form Dengan Benar dan Data Real</p>
                <div class="form-group col-md-6 required ">
                       <label for="" class="control-label">Nama Pemilih</label><span class="red">*</span>
                       <div class="input-group">
                         <div class="input-group-addon"><i class="ti-user"></i></div>
                         <input class="form-control" value="<?php echo $pemilih->nama_pemilih; ?>" placeholder="Nama Pemilih" required="required" name="nama_pemilih" type="text" id="nama_pemilih">
                       </div>
                 </div>
                 <div class="form-group col-md-6 required ">
                        <label for="" class="control-label">Email Pemilih</label><span class="red">*</span>
                        <div class="input-group">
                          <div class="input-group-addon"><i class="ti-email"></i></div>
                          <input class="form-control"  value="<?php echo $pemilih->email; ?>" placeholder="Email Pemilih" required="required" name="email" type="email" id="email">
                        </div>
                  </div>
                 <div class="form-group col-md-6 required ">
                        <label for="" class="control-label">Nomor Pemilih</label><span class="red">*</span>
                        <div class="input-group">
                          <div class="input-group-addon"><i class="ti-user"></i></div>
                          <input class="form-control" value="<?php echo $pemilih->nomor_pemilih; ?>" placeholder="nomor Pemilih" required="required" name="nomor_pemilih" type="text" id="nomor_pemilih">
                        </div>
                  </div>
                  <div class="form-group col-md-6 required ">
                         <label for="" class="control-label">No Telepon/Whatsapp</label><span class="red">*</span>
                         <div class="input-group">
                           <div class="input-group-addon"><i class="ion-social-whatsapp-outline"></i></div>
                           <input class="form-control" value="<?php echo $pemilih->no_telp; ?>" placeholder="No Telepon/Whatsapp" required="required" name="no_telp" type="text" id="no_telp">
                         </div>
                   </div>
                   <div class="form-group col-md-6 required ">
                          <label for="" class="control-label">Jenis Kelamin</label><span class="red">*</span>
                          <div class="input-group">
                            <div class="input-group-addon selectpicker"><i class="ti-user"></i></div>
                         <select class="form-control selectpicker" value="<?php echo $pemilih->jk; ?>" id="jk" name="jk">
                           <?php
                           if($pemilih->jk=='1'){ ?>
                           <option selected="selected" value="1">Laki-Laki</option>
                           <option value="0">Perempuan</option>
                         <?php }
                         else{?>
                           <option value="1">Laki-Laki</option>
                           <option selected="selected" value="0">Perempuan</option>
                           <?php } ?>
                         </select>
                       </div>
                    </div>
                    <div class="form-group col-md-6 required ">
                           <label for="" class="control-label">Kategori Pemilih</label><span class="red">*</span>
                           <div class="input-group">
                             <div class="input-group-addon selectpicker"><i class="ti-save-alt"></i></div>
                          <select  value=""<?php echo $pemilih->pemilih_kategori; ?> class="form-control selectpicker" id="pemilih_kategori" name="pemilih_kategori">
                            <?php foreach ($joinKat_Pemilih ->result() as $tbl_kat_pemilih){
                             if ($tbl_kat_pemilih->id== $pemilih->pemilih_kategori){
                               echo "<option selected = 'selected' value='".$tbl_kat_pemilih->id."'>".$tbl_kat_pemilih->nama_kategori."</option>";
                             }else{
                               echo "<option value='".$tbl_kat_pemilih->id."'>".$tbl_kat_pemilih->nama_kategori."</option>";
                             }
                           }?>
                         </select>
                        </div>
                     </div>
                     <div class="form-group col-md-6 required ">
                         <label for="" class="control-label">Alamat</label><span class="red">*</span>
                             <textarea id="demo-textarea-input" rows="5" class="form-control" required="required"  name="alamat_pemilih" placeholder="Keterangan Kategori.."><?php echo $pemilih->alamat_pemilih; ?></textarea>
                     </div>
                     <div class="form-group col-md-6 required ">
                            <label for="" class="control-label">Verifikasi Pemilih</label><span class="red">*</span>
                            <div class="input-group">
                              <div class="input-group-addon selectpicker"><i class="ti-check"></i></div>
                           <select class="form-control selectpicker" value="<?php echo $pemilih->verifikasi_pemilih; ?>" id="verifikasi_pemilih" name="verifikasi_pemilih">
                             <?php
                             if($pemilih->verifikasi_pemilih=='1'){ ?>
                             <option selected="selected" value="1">Verifikasi</option>
                             <option value="0">Tidak Terverifikasi</option>
                           <?php }
                           else{?>
                             <option value="1">Verifikasi</option>
                             <option selected="selected" value="0">Tidak Terverifikasi</option>
                             <?php } ?>
                           </select>
                         </div>
                      </div>
                      <div class="form-group col-md-6 required ">
                             <label for="" class="control-label">Status Pemilih</label><span class="red">*</span>
                             <div class="input-group">
                               <div class="input-group-addon selectpicker"><i class="ti-check"></i></div>
                            <select class="form-control selectpicker" value="<?php echo $pemilih->active; ?>" id="active" name="active">
                              <?php
                              if($pemilih->active=='1'){ ?>
                              <option selected="selected" value="1">Aktif</option>
                              <option value="0">Tidak Aktif</option>
                            <?php }
                            else{?>
                              <option value="1">Aktif</option>
                              <option selected="selected" value="0">Tidak Aktif</option>
                              <?php } ?>
                            </select>
                          </div>
                       </div>
                   <div class="form-group col-md-6 required ">
                       <label for="" class="control-label">Foto Pemilih</label><span class="red">*</span>
                      <div class="input-group">
                         <div class="input-group-addon"><i class="ti-file"></i></div>
                       <input  type="file" value="<?php echo $pemilih->photo ?>" name="photo" id="userfile" onchange="tampilkanPreview3(this,'preview3')"/>
                       <p class="help-block">
                          <?php //cek file apakah kosong?
                          if (empty($pemilih->photo)) {
                            echo 'Belum Ada File Gambar Pada Item : '.$pemilih->nama_pemilih ;
                          }else{
                            echo 'Gambar Saat Ini : '.substr($pemilih->photo,0,30);
                          }?>
                        </p>
                     </div>
                  </div>
                  <div class="form-group col-md-6 required ">
                     <img id="preview3" src="<?php echo base_url()?>assets/upload/images/foto_pemilih/<?php echo $pemilih->photo ?>" width="150px" />
                  </div>
            </div>

            <!--Modal footer-->
            <div class="modal-footer" style="margin-top:450px">
                <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                <button class="btn btn-primary btn-default">Save Changes</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<!--===================================================-->
<!--End Default Bootstrap Modal Pemilih-->

<!-- Start Modal Hapus -->
<div id="demo-default-modal-hapus<?php echo $pemilih->id ?>" class="modal fade animated pulse">
              <div class="modal-dialog ">
                <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                      <h4 class="modal-title">Hapus Pemilih <b>(<?php echo $pemilih->nama_pemilih ?>)</b></h4>
                  </div>
                  <div class="modal-body">

                            <p>Apakah anda yakin ingin menghapus Pemilih <b> <?php echo $pemilih->nama_pemilih; ?></b> Dengan Status Memilih <b><?php if($pemilih->status_memilih=='1'){echo "Sudah Memilih";}else{echo "Belum Memilih";} ?> </b> ?</p>
                  </div>
                  <div class="modal-footer">
                            <button class="btn btn-default btn-rounded" data-dismiss="modal" type="button">Close</button>
                            <a class="btn btn-danger btn-rounded" href="<?php echo base_url('admin/Pemilih/Hapus/'. $pemilih->id) ?>">Hapus Pemilih</a>
                        </div>
                </div>
              </div>
            </div>
<!-- End Modal Hapus -->


<!-- Start Modal Detail -->
<div id="demo-default-modal-detail<?php echo $pemilih->id ?>" class="modal fade" tabindex="-1">
                          <div class="modal-dialog modal-md">
                                       <div class="modal-content">
                                         <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                             <h4 class="modal-title">Detail Pemilih <?php echo $pemilih->nama_pemilih ?> <b>(<?php if($pemilih->status_memilih=='1'){echo "Sudah Memilih";}else{echo "Belum Memilih";} ?>)</b></h4>
                                         </div>
                                          <!-- Contact Widget -->
                    					            <!---------------------------------->
                    					            <div class="panel pos-rel">
                    					                <!-- <div class="pad-all"> -->
                    					                    <!-- <div class="media pad-ver"> -->
                                                      <div>
                                                         <img id="preview3" src="<?php echo base_url()?>assets/upload/images/foto_pemilih/<?php echo $pemilih->photo ?>" width="100px" style="margin-left:255px" />
                                                      </div>
                                                      <p class="text-lg-center"><b>DETAIL INFORMATION USER</b></p>
                                                      <p class="text-lg-center"><i class="ti-key"> </i> Nomor Pemilihan : <?php echo $pemilih->nomor_pemilih ?></p>
                                                      <p class="text-lg-center"><i class="ti-user"> </i> Nama Pemilih : <?php echo $pemilih->nama_pemilih ?></p>
                                                      <p class="text-lg-center"><i class="ti-email"> </i> Email Pemilih : <?php echo $pemilih->email ?></p>
                                                      <p class="text-lg-center"><i class="ti-pulse"> </i> Jenis Kelamin Pemilih : <?php if($pemilih->jk=='1'){echo "Laki-Laki";}else{echo "Perempuan";} ?></p>
                                                      <p class="text-lg-center"><i class="ti-signal"> </i> Alamat Pemilih : <?php echo $pemilih->alamat_pemilih ?></p>
                                                      <p class="text-lg-center"><i class="ti-mobile"> </i> Nomor Telepon/Wa Pemilih : <?php echo $pemilih->no_telp ?></p>
                                                      <p class="text-lg-center"><i class="ti-server"> </i> Kategori Pemilih : <?php echo $pemilih->namakat ?></p>
                                                      <p class="text-lg-center"><i class="ti-id-badge"> </i> Status Pemilihan : <?php if($pemilih->status_memilih=='1'){echo "Sudah Memilih";}else{echo "Belum Memilih";} ?></p>
                                                      <p class="text-lg-center"><i class="ti-check"> </i> Status Verifikasi : <?php if($pemilih->verifikasi_pemilih=='1'){echo "Sudah Di Verifikasi";}else{echo "Belum Di Verifikasi";} ?></p>
                                                      <p class="text-lg-center"><i class="ti-check"> </i> Status : <?php if($pemilih->active=='1'){echo "Aktif";}else{echo "Tidak Aktif";} ?></p>
                    					                    <!-- </div> -->
                                                    <div class="text-center">Create On : <?php echo $pemilih->created_on ?></div>
                    					                <!-- </div> -->
                    					            </div>
                                         <div class="modal-footer">
                                                   <button class="btn btn-default btn-rounded" data-dismiss="modal" type="button">Close</button>
                                         </div>
                                       </div>
                                     </div>
                                   </div>
   <!-- End Modal Detail -->


   <!-- verifikasi Pemilih-->
    <?php echo form_open_multipart('admin/Pemilih/verifikasi'); ?>
    <div id="demo-default-modal-verifikasi<?php echo $pemilih->id ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
              <input type="hidden" name="id" value="<?php echo $pemilih->id; ?>" />
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="mySmallModalLabel">Verifikasi Pemilih</h4>
                </div>
                <div class="modal-body">
                  <div>
                     <img id="preview3" src="<?php echo base_url()?>assets/upload/images/foto_pemilih/<?php echo $pemilih->photo ?>" width="100px" style="margin-left:255px" />
                  </div>
                  <p class="text-lg-center"><i class="ti-key"> </i> Nomor Pemilihan : <?php echo $pemilih->nomor_pemilih ?></p>
                  <p class="text-lg-center"><i class="ti-user"> </i> Nama Pemilih : <?php echo $pemilih->nama_pemilih ?></p>
                  <p class="text-lg-center"><i class="ti-email"> </i> Email Pemilih : <?php echo $pemilih->email ?></p>
                  <p class="text-lg-center"><i class="ti-pulse"> </i> Jenis Kelamin Pemilih : <?php if($pemilih->jk=='1'){echo "Laki-Laki";}else{echo "Perempuan";} ?></p>
                  <p class="text-lg-center"><i class="ti-signal"> </i> Alamat Pemilih : <?php echo $pemilih->alamat_pemilih ?></p>
                  <p class="text-lg-center"><i class="ti-mobile"> </i> Nomor Telepon/Wa Pemilih : <?php echo $pemilih->no_telp ?></p>
                  <p class="text-lg-center"><i class="ti-server"> </i> Kategori Pemilih : <?php echo $pemilih->namakat ?></p>
                  <p class="text-lg-center"><i class="ti-id-badge"> </i> Status Pemilihan : <?php if($pemilih->status_memilih=='1'){echo "Sudah Memilih";}else{echo "Belum Memilih";} ?></p>
                  <p class="text-lg-center"><i class="ti-check"> </i> Status Verifikasi : <?php if($pemilih->verifikasi_pemilih=='1'){echo "Sudah Di Verifikasi";}else{echo "Belum Di Verifikasi";} ?></p>
                  <p class="text-lg-center"><i class="ti-check"> </i> Status : <?php if($pemilih->active=='1'){echo "Aktif";}else{echo "Tidak Aktif";} ?></p>
                </div>
                <div class="modal-footer">
                <button class="btn btn-success btn-rounded">Verifikasi</button>
               </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <!-- verifikasi Pemilih-->

<?php } ?>
<!-- end foreach edit hapus dll -->


              <!--Default Bootstrap Modal Tambah Pemilih-->
              <!--===================================================-->
              <?php echo form_open_multipart('admin/Pemilih/Tambah'); ?>
              <div class="modal fade animated bounce" id="demo-default-modal-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">

                          <!--Modal header-->
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                              <h4 class="modal-title">Tambah Pemilih</h4>
                          </div>

                          <!--Modal body-->
                          <div class="modal-body">
                              <p class="text-semibold text-main">*Isi Form Dengan Benar dan Data Real</p>
                              <div class="form-group col-md-6 required ">
                                     <label for="" class="control-label">Nama Pemilih</label><span class="red">*</span>
                                     <div class="input-group">
                                       <div class="input-group-addon"><i class="ti-user"></i></div>
                                       <input class="form-control" placeholder="Nama Pemilih" required="required" name="nama_pemilih" type="text" id="nama_pemilih">
                                     </div>
                               </div>
                               <div class="form-group col-md-6 required ">
                                      <label for="" class="control-label">Email Pemilih</label><span class="red">*</span>
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-email"></i></div>
                                        <input class="form-control" placeholder="Email Pemilih" required="required" name="email" type="email" id="email">
                                      </div>
                                </div>
                               <div class="form-group col-md-6 required ">
                                      <label for="" class="control-label">Nomor Pemilih</label><span class="red">*</span>
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                        <input class="form-control" placeholder="nomor Pemilih" required="required" name="nomor_pemilih" type="number" id="nomor_pemilih">
                                      </div>
                                </div>
                                <div class="form-group col-md-6 required ">
                                       <label for="" class="control-label">No Telepon/Whatsapp</label><span class="red">*</span>
                                       <div class="input-group">
                                         <div class="input-group-addon"><i class="ion-social-whatsapp-outline"></i></div>
                                         <input class="form-control" placeholder="No Telepon/Whatsapp" required="required" name="no_telp" type="text" id="no_telp">
                                       </div>
                                 </div>
                                 <div class="form-group col-md-6 required ">
                                        <label for="" class="control-label">Jenis Kelamin</label><span class="red">*</span>
                                        <div class="input-group">
                                          <div class="input-group-addon selectpicker"><i class="ti-user"></i></div>
                                        <select class="form-control selectpicker" id="jk" name="jk">
                                          <option value="">Pilih Jenis Kelamin</option>
                                         <option value="1">Laki-Laki</option>
                                         <option value="0">Perempuan</option>
                                       </select>
                                     </div>
                                  </div>
                                  <div class="form-group col-md-6 required ">
                                         <label for="" class="control-label">Kategori Pemilih</label><span class="red">*</span>
                                         <div class="input-group">
                                           <div class="input-group-addon selectpicker"><i class="ti-save-alt"></i></div>
                                         <select class="form-control selectpicker" id="pemilih_kategori" name="pemilih_kategori">
                                           <option value="">Pilih Kategori Pemilih</option>
                                           <?php foreach ($joinKat_Pemilih ->result() as $tbl_kat_pemilih){ ?>
                                             <option value="<?php echo $tbl_kat_pemilih->id;?>"><?php echo $tbl_kat_pemilih->nama_kategori; ?> </option>
                                             <?php
                                           }
                                           ?>
                                        </select>
                                      </div>
                                   </div>
                                   <div class="form-group col-md-6 required ">
                                       <label for="" class="control-label">Alamat</label><span class="red">*</span>
                                          <textarea id="demo-textarea-input" rows="5" class="form-control" required="required"  name="alamat_pemilih" placeholder="Keterangan Kategori.."></textarea>
                                   </div>
                                   <div class="form-group col-md-6 required ">
                                          <label for="" class="control-label">Verifikasi Pemilih</label><span class="red">*</span>
                                          <div class="input-group">
                                            <div class="input-group-addon selectpicker"><i class="ti-check"></i></div>
                                          <select class="form-control selectpicker" id="verifikasi_pemilih" name="verifikasi_pemilih">
                                            <option value="">Pilih Verifikasi</option>
                                           <option value="1">Verifikasi</option>
                                           <option value="0">Tidak Terverifikasi</option>
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
                                            <option value="0">Tidak Aktif</option>
                                          </select>
                                        </div>
                                     </div>
                                 <div class="form-group col-md-6 required ">
                                     <label for="" class="control-label">Foto Pemilih</label><span class="red">*</span>
                                    <div class="input-group">
                                       <div class="input-group-addon"><i class="ti-file"></i></div>
                                     <input  type="file" name="photo" id="userfile" onchange="tampilkanPreview1(this,'preview1')"/>
                                   </div>
                                </div>
                                <div class="form-group col-md-6 required ">
                                   <img id="preview1" width="150px" />
                                </div>
                          </div>

                          <!--Modal footer-->
                          <div class="modal-footer" style="margin-top:530px">
                              <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                              <button class="btn btn-primary btn-default">Save</button>
                          </div>
                      </div>
                  </div>
              </div>
              <?php echo form_close(); ?>
              <!--===================================================-->
              <!--End Default Bootstrap Modal Pemilih-->
