<div id="page-head">

<div class="pad-all text-center">
    <h3>Hasil Pemilihan Suara - Panitia</h3>
</div>
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">

  <!-- Cari -->
  <div class="row pad-btm">
      <div class="col-sm-6 toolbar-left">
          <!-- <button  data-target="#demo-default-modal-tambah" data-toggle="modal" class="btn btn-purple">Tambah</button> -->
          <button data-target="#demo-default-modal-print" data-toggle="modal" class="btn btn-default"><i class="demo-pli-printer"></i></button>
      </div>
      <?php echo form_open_multipart('panitia/pemilih/CariData'); ?>
      <div class="col-sm-6 toolbar-right text-right">
          Search by :
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
                <option selected="selected" disabled="disabled" value="">Pilih Surat Suara</option>
                <option  value="1">Terverifikasi</option>
                <option  value="0">Tidak Terverifikasi</option>
              <?php } ?>
              </select>
          </div>
          <button class="btn btn-default" style="margin-bottom:15px"><i class="ti-filter"></i> Filter</button>
          <a class="btn btn-default" style="margin-bottom:15px" href="<?php echo base_url('panitia/pemilih'); ?>"><i class="ti-reload"></i></a>
      </div>
  </div>
  <?php echo form_close(); ?>

  <div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Surat Suara</h3>
    </div>
    <!-- Foo Table - Filtering -->
    <!--===================================================-->
    <?= $this->session->flashdata('flash'); ?>
    <div class="panel-body">
        <table id="demo-foo-filteringkategoriveb" class="table table-bordered table-hover toggle-circle" data-page-size="7">
            <thead>
                <tr>
                    <th data-toggle="true">No</th>
                    <th data-hide="phone, tablet">Surat Suara</th>
                    <th data-hide="phone, tablet">Aksi</th>
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
                $no = 1;
                foreach($tema as $t) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $t['nama_surat'] ?></td>
                        <td>
                            <a href="<?= base_url('/panitia/hasilpemilihan/detailSuara/'.$t['id']) ?>" class="btn btn-sm btn-success">Detail</a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
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


  <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Hasil Pemilihan Suara - Voting Voeltura 2020 (Active)</h3>
                </div>
                <div class="pad-all">
                    <div id="demo-morris-area-legend" class="text-center"></div>
                    <div id="transaksipeakhour" style="height:268px"></div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--===================================================-->
<!--End page content-->

<!--jQuery [ REQUIRED ]-->
<script src="<?php echo base_url('assets');?>/js/jquery.min.js"></script>

        <script type="text/javascript">

        $(document).on('nifty.ready', function() {
          // Chart Jam Kerja
          // =================================================================
          var day_data = [

              {'elapsed': '00:00', 'Suara': 0},
              {'elapsed': '01:00', 'Suara': 0},
              {'elapsed': '02:00', 'Suara': 0},
              {'elapsed': '03:00', 'Suara': 0},
              {'elapsed': '04:00', 'Suara': 0},
              {'elapsed': '05:00', 'Suara': 0},
              {'elapsed': '06:00', 'Suara': 0},
              {'elapsed': '07:00', 'Suara': 0},
              {'elapsed': '08:00', 'Suara': 0},
              {'elapsed': '09:00', 'Suara': 3},
              {'elapsed': '10:00', 'Suara': 1},
              {'elapsed': '11:00', 'Suara': 7},
              {'elapsed': '12:00', 'Suara': 1},
              {'elapsed': '13:00', 'Suara': 0},
              {'elapsed': '14:00', 'Suara': 4},
              {'elapsed': '15:00', 'Suara': 0},
              {'elapsed': '16:00', 'Suara': 0},
              {'elapsed': '17:00', 'Suara': 1},
              {'elapsed': '18:00', 'Suara': 0},
              {'elapsed': '19:00', 'Suara': 0},
              {'elapsed': '20:00', 'Suara': 0},
              {'elapsed': '21:00', 'Suara': 0},
              {'elapsed': '22:00', 'Suara': 0},
              {'elapsed': '23:00', 'Suara': 0},
          ];
          Morris.Line({
              element: 'transaksipeakhour',
              data: day_data,
              xkey: 'elapsed',
              ykeys: ['Suara'],
              labels: ['Suara'],
              gridEnabled: true,
              gridLineColor: 'rgba(0,0,0,.1)',
              gridTextColor: '#8f9ea6',
              gridTextSize: '11px',
              lineColors: ['#177bbb'],
              lineWidth: 2,
              parseTime: false,
              resize:true,
              hideHover: 'auto'
          });
          });

          // =================================================================

        </script>


        <!--NiftyJS [ RECOMMENDED ]-->
        <script src="<?php echo base_url('assets');?>/js/nifty.min.js"></script>

        <!--Morris.js [ OPTIONAL ]-->
        <script src="<?php echo base_url('assets');?>/plugins/morris-js/morris.min.js"></script>
        <script src="<?php echo base_url('assets');?>/plugins/morris-js/raphael-js/raphael.min.js"></script>
