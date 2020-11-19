<!--Category name-->
<li class="list-header">Main Menu Admin</li>

<!-- Menu home dashboard -->
<?php if($this->uri->segment('2') == 'home'){ ?>
  <li class="active-sub">
      <a href="<?php echo base_url('admin/home'); ?>">
          <i class="demo-pli-home"></i>
          <span class="menu-title">Dashboard Admin</span>
      </a>
  </li>
<?php } else{ ?>
  <li>
      <a href="<?php echo base_url('admin/home'); ?>">
          <i class="demo-pli-home"></i>
          <span class="menu-title">Dashboard Admin</span>
      </a>
  </li>
<?php } ?>

<!-- Menu Profile -->
<?php if($this->uri->segment('2') == 'profile'){ ?>
  <li class="active-sub">
      <a href="<?php echo base_url('admin/profile'); ?>">
          <i class="ti-user"></i>
          <span class="menu-title">User Profile</span>
      </a>
  </li>
<?php } else{ ?>
  <li >
      <a href="<?php echo base_url('admin/profile'); ?>">
          <i class="ti-user"></i>
          <span class="menu-title">User Profile</span>
      </a>
  </li>
<?php } ?>

<li class="list-divider"></li>

<!--Category name-->
<li class="list-header">Master Data</li>
<!-- Data KAndidat -->
<?php if($this->uri->segment('2') == 'kandidat'){ ?>
<li class="active-sub">
    <a href="<?php echo base_url('admin/kandidat'); ?>">
        <i class="ti-user"></i>
        <span class="menu-title">Daftar Kandidat</span>
    </a>
</li>
<?php } else{ ?>
  <li >
      <a href="<?php echo base_url('admin/kandidat'); ?>">
          <i class="ti-user"></i>
          <span class="menu-title">Daftar Kandidat</span>
      </a>
  </li>
<?php } ?>

<!-- Data Pemilih -->
<?php if($this->uri->segment('2') == 'pemilih'){ ?>
<li class="active-sub">
    <a href="<?php echo base_url('admin/pemilih'); ?>">
        <i class="ti-hand-point-up"></i>
        <span class="menu-title">Daftar Pemilih</span>
    </a>
</li>
<?php } else{ ?>
  <li>
      <a href="<?php echo base_url('admin/pemilih'); ?>">
          <i class="ti-hand-point-up"></i>
          <span class="menu-title">Daftar Pemilih</span>
      </a>
  </li>
<?php } ?>

<!-- Daftar Saksi -->
<?php if($this->uri->segment('2') == 'saksi'){ ?>
<li class="active-sub">
    <a href="<?php echo base_url('admin/saksi'); ?>">
        <i class="ti-eye"></i>
        <span class="menu-title">Daftar Saksi</span>
    </a>
</li>
<?php } else{ ?>
<li >
    <a href="<?php echo base_url('admin/saksi'); ?>">
        <i class="ti-eye"></i>
        <span class="menu-title">Daftar Saksi</span>
    </a>
</li>
<?php } ?>

<!-- Setting Jenis Pemilihan / Surat Suara -->
<?php if($this->uri->segment('2') == 'jenispemilihan'){ ?>
  <li class="active-sub">
      <a href="<?php echo base_url('admin/jenispemilihan'); ?>">
          <i class="ti-agenda"></i>
          <span class="menu-title">Surat Pemilihan</span>
      </a>
  </li>
<?php } else{ ?>
  <li>
      <a href="<?php echo base_url('admin/jenispemilihan'); ?>">
          <i class="ti-agenda"></i>
          <span class="menu-title">Surat Pemilihan</span>
      </a>
  </li>
<?php } ?>

<li class="list-divider"></li>

<li class="list-header">Hasil Laporan</li>
<!-- Data Laporan Pemilihan -->
<?php if($this->uri->segment('2') == 'hasilpemilihan'){ ?>
<li class="active-sub">
    <a href="<?php echo base_url('admin/hasilpemilihan'); ?>">
        <i class="ti-bar-chart"></i>
        <span class="menu-title">Hasil Pemilihan Suara</span>
    </a>
</li>
<?php } else{ ?>
<li>
    <a href="<?php echo base_url('admin/hasilpemilihan'); ?>">
        <i class="ti-bar-chart"></i>
        <span class="menu-title">Hasil Pemilihan Suara</span>
    </a>
</li>
<?php } ?>


<!-- Menu Kat  -->
<li class="list-divider"></li>

<li class="list-header">Setting</li>
<!-- Menu Setting -->
<!--Menu list item-->

<!-- Kat.KAndidat -->
<?php if($this->uri->segment('2') == 'kategori_kandidat'){ ?>
<li class="active-sub">
    <a href="#">
        <i class="ti-panel"></i>
        <span class="menu-title">Setting Master Data</span>
        <i class="arrow"></i>
    </a>
    <!--Submenu-->
    <ul class="collapse in">
      <!-- Menu Kat.KAndidat -->
        <li class="active-link"><a href="<?php echo base_url('admin/kategori_kandidat'); ?>">Kategori Kandidat</a></li>
        <li><a href="<?php echo base_url('admin/kategori_pemilih'); ?>">Kategori Pemilih</a></li>
        <li><a href="<?php echo base_url('admin/kategori_saksi'); ?>">Kategori Saksi</a></li>
    </ul>
</li>
<!-- kat pemilih -->
<?php } else if($this->uri->segment('2') == 'kategori_pemilih'){ ?>
  <li class="active-sub">
      <a href="#">
          <i class="ti-panel"></i>
          <span class="menu-title">Setting Master Data</span>
          <i class="arrow"></i>
      </a>
      <!--Submenu-->
      <ul class="collapse in">
        <!-- Menu Kat.KAndidat -->
          <li><a href="<?php echo base_url('admin/kategori_kandidat'); ?>">Kategori Kandidat</a></li>
          <li class="active-link"><a href="<?php echo base_url('admin/kategori_pemilih'); ?>">Kategori Pemilih</a></li>
          <li><a href="<?php echo base_url('admin/kategori_saksi'); ?>">Kategori Saksi</a></li>
      </ul>
  </li>
<!-- kat saksi -->
<?php } else if($this->uri->segment('2') == 'kategori_saksi'){ ?>
  <li class="active-sub">
      <a href="#">
          <i class="ti-panel"></i>
          <span class="menu-title">Setting Master Data</span>
          <i class="arrow"></i>
      </a>
      <!--Submenu-->
      <ul class="collapse in">
        <!-- Menu Kat.KAndidat -->
          <li><a href="<?php echo base_url('admin/kategori_kandidat'); ?>">Kategori Kandidat</a></li>
          <li><a href="<?php echo base_url('admin/kategori_pemilih'); ?>">Kategori Pemilih</a></li>
          <li class="active-link"><a href="<?php echo base_url('admin/kategori_saksi'); ?>">Kategori Saksi</a></li>
      </ul>
  </li>
<?php } else{ ?>
  <li>
      <a href="#">
          <i class="ti-panel"></i>
          <span class="menu-title">Setting Master Data</span>
          <i class="arrow"></i>
      </a>
      <!--Submenu-->
      <ul class="collapse">
        <!-- Menu Kat.KAndidat -->
          <li><a href="<?php echo base_url('admin/kategori_kandidat'); ?>">Kategori Kandidat</a></li>
          <li><a href="<?php echo base_url('admin/kategori_pemilih'); ?>">Kategori Pemilih</a></li>
          <li><a href="<?php echo base_url('admin/kategori_saksi'); ?>">Kategori Saksi</a></li>
      </ul>
  </li>
<?php } ?>





<!-- Setting User Management -->
<?php if($this->uri->segment('2') == 'usermanage'){ ?>
  <li class="active-sub">
      <a href="<?php echo base_url('admin/usermanage'); ?>">
          <i class="ti-id-badge"></i>
          <span class="menu-title">User Management</span>
      </a>
  </li>
<?php } else{ ?>
  <li>
      <a href="<?php echo base_url('admin/usermanage'); ?>">
          <i class="ti-id-badge"></i>
          <span class="menu-title">User Management</span>
      </a>
  </li>
<?php } ?>




<!-- Menu home Setting app -->
<?php if($this->uri->segment('2') == 'settingapp'){ ?>
  <li class="active-sub">
      <a href="<?php echo base_url('admin/settingapp'); ?>">
          <i class="ti-settings"></i>
          <span class="menu-title">Setting Aplikasi</span>
      </a>
  </li>
<?php } else{ ?>
  <li>
      <a href="<?php echo base_url('admin/settingapp'); ?>">
          <i class="ti-settings"></i>
          <span class="menu-title">Setting Aplikasi</span>
      </a>
  </li>
<?php } ?>


<li class="list-divider"></li>
<li class="list-header">Extra</li>
<!-- Extra Landing Pages -->
<?php if($this->uri->segment('2') == 's_landing_tagline'){ ?>
<li class="active-sub">
    <a href="#">
        <i class="ti-settings"></i>
        <span class="menu-title">Setting Landing Pages</span>
        <i class="arrow"></i>
    </a>
    <!--Submenu-->
    <ul class="collapse in">
      <!-- Menu Kat.KAndidat -->
        <li class="active-link"><a href="<?php echo base_url('admin/s_landing_tagline'); ?>">Tagline</a></li>
        <li><a href="<?php echo base_url('admin/s_landing_deskripsi_about'); ?>">Deskripsi About</a></li>
        <li><a href="<?php echo base_url('admin/s_landing_fitur_unggulan'); ?>">Fitur Unggulan</a></li>
        <li><a href="<?php echo base_url('admin/s_landing_screenshots'); ?>">Screenshots</a></li>
        <li><a href="<?php echo base_url('admin/s_landing_faq'); ?>">FAQ</a></li>
        <li><a href="<?php echo base_url('admin/s_landing_tim_developer'); ?>">Tim Devloper</a></li>
        <li><a href="<?php echo base_url('admin/s_landing_testimonial'); ?>">Data Testimonial</a></li>
        <li><a href="<?php echo base_url('admin/s_landing_contact'); ?>">Data Contact Use</a></li>
        <li><a href="<?php echo base_url('admin/s_landing_social_contact'); ?>">Social & Apps Contact</a></li>
    </ul>
</li>
<?php } else if($this->uri->segment('2') == 's_landing_deskripsi_about'){ ?>
  <li class="active-sub">
      <a href="#">
          <i class="ti-settings"></i>
          <span class="menu-title">Setting Landing Pages</span>
          <i class="arrow"></i>
      </a>
      <!--Submenu-->
      <ul class="collapse in">
        <!-- Menu Kat.KAndidat -->
          <li><a href="<?php echo base_url('admin/s_landing_tagline'); ?>">Tagline</a></li>
          <li  class="active-link"><a href="<?php echo base_url('admin/s_landing_deskripsi_about'); ?>">Deskripsi About</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_fitur_unggulan'); ?>">Fitur Unggulan</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_screenshots'); ?>">Screenshots</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_faq'); ?>">FAQ</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_tim_developer'); ?>">Tim Devloper</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_testimonial'); ?>">Data Testimonial</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_contact'); ?>">Data Contact Use</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_social_contact'); ?>">Social & Apps Contact</a></li>
      </ul>
  </li>
<?php } else if($this->uri->segment('2') == 's_landing_fitur_unggulan'){ ?>
  <li class="active-sub">
      <a href="#">
          <i class="ti-settings"></i>
          <span class="menu-title">Setting Landing Pages</span>
          <i class="arrow"></i>
      </a>
      <!--Submenu-->
      <ul class="collapse in">
        <!-- Menu Kat.KAndidat -->
          <li><a href="<?php echo base_url('admin/s_landing_tagline'); ?>">Tagline</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_deskripsi_about'); ?>">Deskripsi About</a></li>
          <li  class="active-link"><a href="<?php echo base_url('admin/s_landing_fitur_unggulan'); ?>">Fitur Unggulan</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_screenshots'); ?>">Screenshots</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_faq'); ?>">FAQ</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_tim_developer'); ?>">Tim Devloper</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_testimonial'); ?>">Data Testimonial</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_contact'); ?>">Data Contact Use</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_social_contact'); ?>">Social & Apps Contact</a></li>
      </ul>
  </li>
<?php } else if($this->uri->segment('2') == 's_landing_screenshots'){ ?>
  <li class="active-sub">
      <a href="#">
          <i class="ti-settings"></i>
          <span class="menu-title">Setting Landing Pages</span>
          <i class="arrow"></i>
      </a>
      <!--Submenu-->
      <ul class="collapse in">
        <!-- Menu Kat.KAndidat -->
          <li><a href="<?php echo base_url('admin/s_landing_tagline'); ?>">Tagline</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_deskripsi_about'); ?>">Deskripsi About</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_fitur_unggulan'); ?>">Fitur Unggulan</a></li>
          <li  class="active-link"><a href="<?php echo base_url('admin/s_landing_screenshots'); ?>">Screenshots</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_faq'); ?>">FAQ</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_tim_developer'); ?>">Tim Devloper</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_testimonial'); ?>">Data Testimonial</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_contact'); ?>">Data Contact Use</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_social_contact'); ?>">Social & Apps Contact</a></li>
      </ul>
  </li>
<?php } else if($this->uri->segment('2') == 's_landing_faq'){ ?>
  <li class="active-sub">
      <a href="#">
          <i class="ti-settings"></i>
          <span class="menu-title">Setting Landing Pages</span>
          <i class="arrow"></i>
      </a>
      <!--Submenu-->
      <ul class="collapse in">
        <!-- Menu Kat.KAndidat -->
          <li><a href="<?php echo base_url('admin/s_landing_tagline'); ?>">Tagline</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_deskripsi_about'); ?>">Deskripsi About</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_fitur_unggulan'); ?>">Fitur Unggulan</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_screenshots'); ?>">Screenshots</a></li>
          <li  class="active-link"><a href="<?php echo base_url('admin/s_landing_faq'); ?>">FAQ</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_tim_developer'); ?>">Tim Devloper</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_testimonial'); ?>">Data Testimonial</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_contact'); ?>">Data Contact Use</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_social_contact'); ?>">Social & Apps Contact</a></li>
      </ul>
  </li>
<?php } else if($this->uri->segment('2') == 's_landing_tim_developer'){ ?>
  <li class="active-sub">
      <a href="#">
          <i class="ti-settings"></i>
          <span class="menu-title">Setting Landing Pages</span>
          <i class="arrow"></i>
      </a>
      <!--Submenu-->
      <ul class="collapse in">
        <!-- Menu Kat.KAndidat -->
          <li><a href="<?php echo base_url('admin/s_landing_tagline'); ?>">Tagline</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_deskripsi_about'); ?>">Deskripsi About</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_fitur_unggulan'); ?>">Fitur Unggulan</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_screenshots'); ?>">Screenshots</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_faq'); ?>">FAQ</a></li>
          <li  class="active-link"><a href="<?php echo base_url('admin/s_landing_tim_developer'); ?>">Tim Devloper</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_testimonial'); ?>">Data Testimonial</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_contact'); ?>">Data Contact Use</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_social_contact'); ?>">Social & Apps Contact</a></li>
      </ul>
  </li>
<?php } else if($this->uri->segment('2') == 's_landing_testimonial'){ ?>
  <li class="active-sub">
      <a href="#">
          <i class="ti-settings"></i>
          <span class="menu-title">Setting Landing Pages</span>
          <i class="arrow"></i>
      </a>
      <!--Submenu-->
      <ul class="collapse in">
        <!-- Menu Kat.KAndidat -->
          <li><a href="<?php echo base_url('admin/s_landing_tagline'); ?>">Tagline</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_deskripsi_about'); ?>">Deskripsi About</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_fitur_unggulan'); ?>">Fitur Unggulan</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_screenshots'); ?>">Screenshots</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_faq'); ?>">FAQ</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_tim_developer'); ?>">Tim Devloper</a></li>
          <li  class="active-link"><a href="<?php echo base_url('admin/s_landing_testimonial'); ?>">Data Testimonial</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_contact'); ?>">Data Contact Use</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_social_contact'); ?>">Social & Apps Contact</a></li>
      </ul>
  </li>
<?php } else if($this->uri->segment('2') == 's_landing_contact'){ ?>
  <li class="active-sub">
      <a href="#">
          <i class="ti-settings"></i>
          <span class="menu-title">Setting Landing Pages</span>
          <i class="arrow"></i>
      </a>
      <!--Submenu-->
      <ul class="collapse in">
        <!-- Menu Kat.KAndidat -->
          <li><a href="<?php echo base_url('admin/s_landing_tagline'); ?>">Tagline</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_deskripsi_about'); ?>">Deskripsi About</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_fitur_unggulan'); ?>">Fitur Unggulan</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_screenshots'); ?>">Screenshots</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_faq'); ?>">FAQ</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_tim_developer'); ?>">Tim Devloper</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_testimonial'); ?>">Data Testimonial</a></li>
          <li  class="active-link"><a href="<?php echo base_url('admin/s_landing_contact'); ?>">Data Contact Use</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_social_contact'); ?>">Social & Apps Contact</a></li>
      </ul>
  </li>
<?php } else if($this->uri->segment('2') == 's_landing_social_contact'){ ?>
  <li class="active-sub">
      <a href="#">
          <i class="ti-settings"></i>
          <span class="menu-title">Setting Landing Pages</span>
          <i class="arrow"></i>
      </a>
      <!--Submenu-->
      <ul class="collapse in">
        <!-- Menu Kat.KAndidat -->
          <li><a href="<?php echo base_url('admin/s_landing_tagline'); ?>">Tagline</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_deskripsi_about'); ?>">Deskripsi About</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_fitur_unggulan'); ?>">Fitur Unggulan</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_screenshots'); ?>">Screenshots</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_faq'); ?>">FAQ</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_tim_developer'); ?>">Tim Devloper</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_testimonial'); ?>">Data Testimonial</a></li>
          <li><a href="<?php echo base_url('admin/s_landing_contact'); ?>">Data Contact Use</a></li>
          <li  class="active-link"><a href="<?php echo base_url('admin/s_landing_social_contact'); ?>">Social & Apps Contact</a></li>
      </ul>
  </li>
<?php }else{ ?>
<li>
    <a href="#">
        <i class="ti-settings"></i>
        <span class="menu-title">Setting Landing Pages</span>
        <i class="arrow"></i>
    </a>
    <!--Submenu-->
    <ul class="collapse">
      <!-- Menu Kat.KAndidat -->
        <li><a href="<?php echo base_url('admin/s_landing_tagline'); ?>">Tagline</a></li>
        <li><a href="<?php echo base_url('admin/s_landing_deskripsi_about'); ?>">Deskripsi About</a></li>
        <li><a href="<?php echo base_url('admin/s_landing_fitur_unggulan'); ?>">Fitur Unggulan</a></li>
        <li><a href="<?php echo base_url('admin/s_landing_screenshots'); ?>">Screenshots</a></li>
        <li><a href="<?php echo base_url('admin/s_landing_faq'); ?>">FAQ</a></li>
        <li><a href="<?php echo base_url('admin/s_landing_tim_developer'); ?>">Tim Devloper</a></li>
        <li><a href="<?php echo base_url('admin/s_landing_testimonial'); ?>">Data Testimonial</a></li>
        <li><a href="<?php echo base_url('admin/s_landing_contact'); ?>">Data Contact Use</a></li>
        <li><a href="<?php echo base_url('admin/s_landing_social_contact'); ?>">Social & Apps Contact</a></li>
    </ul>
</li>
<?php } ?>
