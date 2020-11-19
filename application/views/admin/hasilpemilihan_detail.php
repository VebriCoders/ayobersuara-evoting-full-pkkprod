<div id="page-head">

    <div id="page-title" class="pad-all text-center">
        <h3>Detail Hasil <?= $tema['nama_surat'] ?> - Admin.</h3>
        <!-- <p1>Rekap Hasil Pemilihan Suara.</p> -->
    </div>
    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb text-center">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="demo-pli-home"></i></a></li>
        <li><a>Hasil Laporan</a></li>
        <li><a href="<?php echo base_url('admin/hasilpemilihan  ') ?>">Hasil Pemilihan Suara</a></li>
        <li class="active">Detail Hasil Pemilihan Suara</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-mint panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="ti-check icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"><?= $count ?></p>
                    <p class="mar-no">Jumlah Surat Suara Masuk</p>
                    <!-- <?php echo $jumlah_pemilihaktif ?> -->
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-mint panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="ti-check icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">

                    <?php
                    if ($jumlah_pemilihaktif == "0") {
                        $precent = ($count / 1) * 100;
                    } else {
                        $precent = ($count / $jumlah_pemilihaktif) * 100;
                    }
                    ?>
                    <p class="text-2x mar-no text-semibold"><?php echo $precent ?>%</p>
                    <p class="mar-no">Presentase</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-mint panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="ti-check icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"><?php echo $jumlah_pemilihaktif ?></p>
                    <p class="mar-no">Jumlah Pemilih Aktif</p>
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Detail Surat Suara <?= $tema['nama_surat'] ?></h3>
        </div>
        <!-- Foo Table - Filtering -->
        <!--===================================================-->
        <div class="panel-body">
            <table id="demo-foo-filteringkategoriveb" class="table table-bordered table-hover toggle-circle" data-page-size="7">
                <thead>
                    <tr>
                        <th data-toggle="true">No</th>
                        <th data-hide="phone, tablet">Foto Calon</th>
                        <th data-hide="phone, tablet">Nama Calon</th>
                        <th data-hide="phone, tablet">Suara Diperoleh</th>
                    </tr>
                </thead>
                <div class="pad-btm form-inline">
                    <div class="row">
                        <div class="col-sm-6 text-xs-center">
                            <div class="form-group">
                                <select id="demo-foo-filter-status" class="form-control selectpicker">
                                    <option value="">Show all</option>
                                    <!-- <option value="active">Active</option>
                              <option value="non aktif">Non Aktif</option> -->
                                </select>
                            </div>
                            <div class="form-group">
                                <!-- <button data-target="#demo-default-modal-print" data-toggle="modal" class="btn btn-default form-control"><i class="demo-pli-printer"></i>Print Total Pemilihan</button> -->
                                <a href="<?= base_url('Cetak/cetakSuara/' . $tema['id']) ?>" class="btn btn-default form-control" target="__blank"><i class="demo-pli-printer"></i>Cetak Hasil Pemilihan</a>
                                <a href="<?= base_url('Cetak/cetakPemilihInSuara/' . $tema['id']) ?>" class="btn btn-default form-control" target="__blank"><i class="demo-pli-printer"></i>Cetak Daftar Pemilih</a>
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
                    foreach ($suara as $s) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td>
                                <img src="<?php echo base_url() ?>assets/upload/images/foto_kandidat/<?= $s['photo_ketua'] ?>" alt="" class="img-thumbnail" width="150">
                                <img src="<?php echo base_url() ?>assets/upload/images/foto_kandidat/<?= $s['photo_wakil'] ?>" alt="" class="img-thumbnail" width="150">
                            </td>
                            <td><?= $s['nama_kandidat'] ?> (<?= $s['nomor_calon_kandidat'] ?>)</td>
                            <td><?= $s['jumlah_suara'] ?></td>
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


</div>
<!--===================================================-->
<!--End page content-->