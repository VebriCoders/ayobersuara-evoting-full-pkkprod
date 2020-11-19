<div id="page-head">

<div id="page-title" class="pad-all text-center">
    <h3>Data Kategori Pemilih - Admin</h3>
</div>
<!--Breadcrumb-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<ol class="breadcrumb text-center">
  <li><a href="<?php echo base_url('admin/home') ?>"><i class="demo-pli-home"></i></a></li>
  <li><a>Setting</a></li>
  <li><a>Setting Master Data</a></li>
  <li class="active">Kategori Pemilih</li>
</ol>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--End breadcrumb-->
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">

  <!-- Cari -->
  <div class="row pad-btm">
      <div class="col-sm-6 toolbar-left" style="margin-bottom:15px">
          <button  data-target="#demo-default-modal-tambah" data-toggle="modal" class="btn btn-purple">Tambah</button>
          <!-- <button data-target="#demo-default-modal-print" data-toggle="modal" class="btn btn-default"><i class="demo-pli-printer"></i></button> -->
          <a class="btn btn-default" href="<?php echo base_url('admin/kategori_pemilih'); ?>"><i class="ti-reload"></i></a>
      </div>
  </div>
<?= $this->session->flashdata('flash'); ?>
              <div class="panel">
  					    <div class="panel-heading">
  					        <h3 class="panel-title">Kategori Pemilih</h3>
  					    </div>

  					    <!-- Foo Table - Filtering -->
  					    <!--===================================================-->

  					    <div class="panel-body">
  					        <table id="demo-foo-filteringkategoriveb" class="table table-bordered table-hover toggle-circle" data-page-size="7">
  					            <thead>
  					                <tr>
  					                    <th data-toggle="true">Kategori</th>
  					                    <th data-hide="phone, tablet">Keterangan</th>
  					                    <th data-hide="phone, tablet">Status</th>
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
                          foreach( $tampilKatPemilih->result() as $kat ){ ?>
  					                <tr>
  					                    <td><?php echo $kat->nama_kategori ?></td>
  					                    <td><?php echo $kat->keterangan_kategori ?></td>
  					                    <td>
                                  <?php if($kat->active=='1') { ?>
                                  <span class="label label-table label-success">Active</span>
                                  <?php } else { ?>
                                  <span class="label label-table label-dark">Non Aktif</span>
                                  <?php } ?>
                                </td>
                                <td>
                                  <button data-target="#demo-default-modal-edit<?php echo $kat->id ?>" data-toggle="modal" class="btn btn-warning">Edit</button>
                                  <button data-target="#demo-default-modal-hapus<?php echo $kat->id ?>" data-toggle="modal" class="btn btn-danger">Hapus</button>
                                </td>
  					                </tr>
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
<!--===================================================-->
<!--End page content-->
<?php
foreach( $tampilKatPemilih->result() as $kat ){ ?>

  <!-- Start Modal Hapus -->
  <div id="demo-default-modal-hapus<?php echo $kat->id ?>" class="modal fade animated pulse">
                <div class="modal-dialog ">
                  <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                        <h4 class="modal-title">Hapus Kategori <b>(<?php echo $kat->nama_kategori ?>)</b></h4>
                    </div>
                    <div class="modal-body">

                              <p>Apakah anda yakin ingin menghapus Kategori <b> <?php echo $kat->nama_kategori; ?></b> ?</p>
                    </div>
                    <div class="modal-footer">
                              <button class="btn btn-default btn-rounded" data-dismiss="modal" type="button">Close</button>
                              <a class="btn btn-danger btn-rounded" href="<?php echo base_url('admin/Kategori_pemilih/Hapus/'. $kat->id) ?>">Hapus Kategori</a>
                          </div>
                  </div>
                </div>
              </div>
  <!-- End Modal Hapus -->


<!-- Start Modal Edit -->
<?php echo form_open_multipart('admin/Kategori_pemilih/Edit'); ?>
<div class="modal fade animated rotateInDownRight" id="demo-default-modal-edit<?php echo $kat->id ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

   <!--Modal header-->
   <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
       <h4 class="modal-title">Edit Kategori Pemilih</h4>
   </div>
   <input type="text" name="id" value="<?php echo $kat->id; ?>" />
   <!--Modal body-->
   <div class="modal-body" >

                           <div class="form-group col-md-6 required ">
                                  <label for="" class="control-label">Nama Kategori</label><span class="red">*</span>
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                                    <input class="form-control" value="<?php echo $kat->nama_kategori; ?>" placeholder="Nama Kategori" required="required" name="nama_kategori" type="text" id="nama_kategori">
                                  </div>
                            </div>
                            <div class="form-group col-md-6 required ">
                                   <label for="" class="control-label">Status</label><span class="red">*</span>
                                   <div class="input-group">
                                     <div class="input-group-addon selectpicker"><i class="ti-check"></i></div>
                                     <select class="form-control selectpicker" value="<?php echo $kat->active; ?>" id="active" name="active">
                                       <?php
                                       if($kat->active=='1'){ ?>
                                       <option selected="selected" value="1">Aktif</option>
                                       <option value="0">Non Aktif</option>
                                     <?php }
                                     else{?>
                                       <option selected="selected" value="0">Non Aktif</option>
                                       <option value="1">Aktif</option>
                                       <?php } ?>
                                     </select>
                                </div>
                             </div>
                            <div class="form-group col-md-12 required ">
                                <label for="" class="control-label">Keterangan Kategori</label><span class="red">*</span>
  					                        <textarea id="demo-textarea-input" rows="9" class="form-control" required="required"  name="keterangan_kategori" placeholder="Keterangan Kategori.."><?php echo $kat->keterangan_kategori; ?></textarea>
                            </div>
   </div>
   <!--Modal footer-->
   <div class="modal-footer" style="margin-top: 210px">
       <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
       <button class="btn btn-primary btn-rounded">Save</button>
   </div>
</div>
</div>
</div>
<?php echo form_close(); ?>
<!-- End Modal Edit -->


<?php } // end foreach ?>


<!-- Start Modal Tambah -->
<?php echo form_open_multipart('admin/Kategori_pemilih/Tambah'); ?>
<div class="modal fade animated rotateInDownRight" id="demo-default-modal-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

   <!--Modal header-->
   <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
       <h4 class="modal-title">Tambah Kategori Pemilih</h4>
   </div>

   <!--Modal body-->
   <div class="modal-body" >

                           <div class="form-group col-md-6 required ">
                                  <label for="" class="control-label">Nama Kategori</label><span class="red">*</span>
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                                    <input class="form-control" placeholder="Nama Kategori" required="required" name="nama_kategori" type="text" id="nama_kategori">
                                  </div>
                            </div>
                            <div class="form-group col-md-6 required ">
                                   <label for="" class="control-label">Status</label><span class="red">*</span>
                                   <div class="input-group">
                                     <div class="input-group-addon selectpicker"><i class="ti-check"></i></div>
                                   <select class="form-control selectpicker" id="active" name="active">
                                     <option value="">Pilih Status</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Non Aktif</option>
                                  </select>
                                </div>
                             </div>
                            <div class="form-group col-md-12 required ">
                                <label for="" class="control-label">Keterangan Kategori</label><span class="red">*</span>
  					                        <textarea id="demo-textarea-input" rows="9" class="form-control" required="required"  name="keterangan_kategori" placeholder="Keterangan Kategori.."></textarea>
                            </div>

   </div>
   <!--Modal footer-->
   <div class="modal-footer" style="margin-top: 210px">
       <button data-dismiss="modal" class="btn btn-danger btn-rounded " type="button">Close</button>
       <button class="btn btn-primary btn-rounded">Save</button>
   </div>
</div>
</div>
</div>
<?php echo form_close(); ?>
<!-- End Modal Tambah -->
