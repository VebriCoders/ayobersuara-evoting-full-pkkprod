<!--Category name-->
<li class="list-header">Main Menu Kandidat</li>
<!--Menu list Dashboard Admin-->
<?php if($this->uri->segment('2') == 'home'){ ?>
  <li class="active-sub">
      <a href="<?php echo base_url('kandidat/home'); ?>">
          <i class="demo-pli-home"></i>
          <span class="menu-title">Dashboard Kandidat</span>
      </a>
  </li>
<?php } else{ ?>
  <li>
      <a href="<?php echo base_url('kandidat/home'); ?>">
          <i class="demo-pli-home"></i>
          <span class="menu-title">Dashboard Kandidat</span>
      </a>
  </li>
<?php } ?>

<!-- Menu Profile -->
<?php if($this->uri->segment('2') == 'profile'){ ?>
  <li class="active-sub">
      <a href="<?php echo base_url('kandidat/profile'); ?>">
          <i class="ti-user"></i>
          <span class="menu-title">Kandidat Profile</span>
      </a>
  </li>
<?php } else{ ?>
  <li >
      <a href="<?php echo base_url('kandidat/profile'); ?>">
          <i class="ti-user"></i>
          <span class="menu-title">Kandidat Profile</span>
      </a>
  </li>
<?php } ?>

<li class="list-divider"></li>

<li class="list-header">Jumlah Suara Kandidat</li>
<?php if($this->uri->segment('2') == 'suarakandidat'){ ?>
<li class="active-sub">
    <a href="<?php echo base_url('kandidat/suarakandidat'); ?>">
        <i class="ti-bar-chart"></i>
        <span class="menu-title">Jumlah Suara Kandidat</span>
    </a>
</li>
<?php } else{ ?>
  <li>
      <a href="<?php echo base_url('kandidat/suarakandidat'); ?>">
          <i class="ti-bar-chart"></i>
          <span class="menu-title">Jumlah Suara Kandidat</span>
      </a>
  </li>
<?php } ?>
