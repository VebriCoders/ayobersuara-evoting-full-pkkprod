<!--Category name-->
<li class="list-header">Main Menu Panitia</li>
<!--Menu list Dashboard Admin-->
<?php if($this->uri->segment('2') == 'home'){ ?>
  <li class="active-sub">
      <a href="<?php echo base_url('panitia/home'); ?>">
          <i class="demo-pli-home"></i>
          <span class="menu-title">Dashboard Panitia</span>
      </a>
  </li>
<?php } else{ ?>
  <li>
      <a href="<?php echo base_url('panitia/home'); ?>">
          <i class="demo-pli-home"></i>
          <span class="menu-title">Dashboard Panitia</span>
      </a>
  </li>
<?php } ?>

<!-- Menu Profile -->
<?php if($this->uri->segment('2') == 'profile'){ ?>
  <li class="active-sub">
      <a href="<?php echo base_url('panitia/profile'); ?>">
          <i class="ti-user"></i>
          <span class="menu-title">Panitia Profile</span>
      </a>
  </li>
<?php } else{ ?>
  <li >
      <a href="<?php echo base_url('panitia/profile'); ?>">
          <i class="ti-user"></i>
          <span class="menu-title">Panitia Profile</span>
      </a>
  </li>
<?php } ?>

<!--Category name-->
<li class="list-header">Master Data</li>
<!-- Data KAndidat -->
<?php if($this->uri->segment('2') == 'kandidat'){ ?>
<li class="active-sub">
    <a href="<?php echo base_url('panitia/kandidat'); ?>">
        <i class="ti-user"></i>
        <span class="menu-title">Daftar Kandidat</span>
    </a>
</li>
<?php } else{ ?>
  <li >
      <a href="<?php echo base_url('panitia/kandidat'); ?>">
          <i class="ti-user"></i>
          <span class="menu-title">Daftar Kandidat</span>
      </a>
  </li>
<?php } ?>

<!-- Data Pemilih -->
<?php if($this->uri->segment('2') == 'pemilih'){ ?>
<li class="active-sub">
    <a href="<?php echo base_url('panitia/pemilih'); ?>">
        <i class="ti-hand-point-up"></i>
        <span class="menu-title">Daftar Pemilih</span>
    </a>
</li>
<?php } else{ ?>
  <li>
      <a href="<?php echo base_url('panitia/pemilih'); ?>">
          <i class="ti-hand-point-up"></i>
          <span class="menu-title">Daftar Pemilih</span>
      </a>
  </li>
<?php } ?>

<!-- Daftar Saksi -->
<?php if($this->uri->segment('2') == 'saksi'){ ?>
<li class="active-sub">
    <a href="<?php echo base_url('panitia/saksi'); ?>">
        <i class="ti-eye"></i>
        <span class="menu-title">Daftar Saksi</span>
    </a>
</li>
<?php } else{ ?>
<li >
    <a href="<?php echo base_url('panitia/saksi'); ?>">
        <i class="ti-eye"></i>
        <span class="menu-title">Daftar Saksi</span>
    </a>
</li>
<?php } ?>

<!--Category name-->
<li class="list-header">Hasil Laporan</li>
<!-- jumlah suara -->
<?php if($this->uri->segment('2') == 'hasilpemilihan'){ ?>
<li class="active-sub">
    <a href="<?php echo base_url('panitia/hasilpemilihan'); ?>">
        <i class="ti-bar-chart"></i>
        <span class="menu-title">Hasil Pemilihan Suara</span>
    </a>
</li>
<?php } else{ ?>
<li >
    <a href="<?php echo base_url('panitia/hasilpemilihan'); ?>">
        <i class="ti-bar-chart"></i>
        <span class="menu-title">Hasil Pemilihan Suara</span>
    </a>
</li>
<?php } ?>
