<div id="page-head">

    <div class="pad-all text-center">
        <h3>Pemilihan Suara - Pemilih.</h3>
        <p1>Ayo Bersuara E-Voting Web Apps - Menggurangi Kebiasaan Golpust.</p>
    </div>
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">
    <div class="row" style="margin-top:4px">
        <div class="col-sm-12">
            <div class="row">

                <!--===================================================-->
                <?php foreach ($tema as $t) { ?>
                    <div class="col-lg-3">
                        <div class="panel">
                            <div class="panel-body text-center">
                                <img alt="Profile Picture" class="img-md img-circle mar-btm" src="<?php echo base_url('assets'); ?>/upload/images/foto_surat/<?= $t['logo_surat'] ?>">
                                <p class="text-lg text-semibold mar-no text-main">Surat Suara</p>
                                <p class="text-muted"><?= $t['nama_surat'] ?></p>

                                <?php
                                $query = $this->db->get_where('tbl_suara', ['id_pemilih' => $datapemilih['id'], 'id_surat_suara' => $t['id']]);
                                $cek = $query->num_rows();
                                if ($cek > 0) {
                                    echo "<br>Sudah Memilih";
                                } else {
                                ?>
                                    <hr>
                                    <?php $dskrg = date('yy-m-d'); ?>
                                    <!-- <?php echo $dskrg ?> -->
                                    <!-- <?php echo $t['akhir_surat'] ?> -->
                                    <?php $asd = "1" ?>

                                    <?php if ($t['akhir_surat'] == $dskrg) { ?>
                                        <a href="<?= base_url('pemilih/memilih/pemilihMemilih/' . $t['id']) ?>" class="btn btn-primary mar-ver"><i class="ti-location-arrow icon-fw"></i>Buka</a>
                                    <?php } elseif ($t['akhir_surat'] <= $dskrg) { ?>
                                        <a class="btn btn-danger mar-ver"><i class="ti-close icon-fw"></i>Batas Pemilihan Sudah Berakhir</a>
                                    <?php } else { ?>
                                        <a href="<?= base_url('pemilih/memilih/pemilihMemilih/' . $t['id']) ?>" class="btn btn-primary mar-ver"><i class="ti-location-arrow icon-fw"></i>Buka</a>
                                    <?php } ?>
                                <?php } ?>

                                <ul class="list-unstyled text-center bord-top pad-top mar-no row">
                                    <li class="col-xs-4">
                                        <span class="text-lg text-semibold text-main"><?= $t['dimulai_surat'] ?></span>
                                        <p class="text-muted mar-no">Mulai</p>
                                    </li>
                                    <li class="col-xs-4">
                                        <span class="text-lg text-semibold text-main"><?php
                                                                                        if ($t['active_surat'] == '1') {
                                                                                            echo "Aktif";
                                                                                        } else {
                                                                                            echo "Non-Aktif";
                                                                                        }
                                                                                        ?></span>
                                        <p class="text-muted mar-no">Status</p>
                                    </li>
                                    <li class="col-xs-4">
                                        <span class="text-lg text-semibold text-main"><?= $t['akhir_surat'] ?></span>
                                        <p class="text-muted mar-no">Akhir</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!--===================================================-->

            </div>
        </div>
    </div>
</div>
<!--===================================================-->
<!--End page content-->