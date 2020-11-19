<!--Category name-->
<li class="list-header">Main Menu Pemilih</li>
<!--Menu list Dashboard Admin-->
<?php if($this->uri->segment('2') == 'home'){ ?>
  <li class="active-sub">
      <a href="<?php echo base_url('pemilih/home'); ?>">
          <i class="demo-pli-home"></i>
          <span class="menu-title">Dashboard Pemilih</span>
      </a>
  </li>
<?php } else{ ?>
  <li>
      <a href="<?php echo base_url('pemilih/home'); ?>">
          <i class="demo-pli-home"></i>
          <span class="menu-title">Dashboard Pemilih</span>
      </a>
  </li>
<?php } ?>

<?php if($this->uri->segment('2') == 'profile'){ ?>
  <li class="active-sub">
      <a href="<?php echo base_url('pemilih/profile'); ?>">
          <i class="ti-user"></i>
          <span class="menu-title">Profile</span>
      </a>
  </li>
<?php } else{ ?>
  <li>
      <a href="<?php echo base_url('pemilih/profile'); ?>">
          <i class="ti-user"></i>
          <span class="menu-title">Profile</span>
      </a>
  </li>
<?php } ?>

<li class="list-divider"></li>
<!--Category name-->
<li class="list-header">Pemilihan Suara</li>
<?php if($this->uri->segment('2') == 'memilih'){ ?>
  <li class="active-sub">
      <a href="<?php echo base_url('pemilih/memilih'); ?>">
          <i class="ti-agenda"></i>
          <span class="menu-title">Pemilihan Suara</span>
      </a>
  </li>
<?php } else{ ?>
  <li>
      <a href="<?php echo base_url('pemilih/memilih'); ?>">
          <i class="ti-agenda"></i>
          <span class="menu-title">Pemilihan Suara</span>
      </a>
  </li>
<?php } ?>
