
<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '../../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TAGCODE');</script>
    <!-- End Google Tag Manager -->
    <title>Ayo Bersuara - Register Pemilih</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/login');?>/assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/login');?>/assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/login');?>/assets/fonts/flaticon/font/flaticon.css">
    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets');?>/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/login');?>/logoevoting3.png" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/login');?>/assets/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="<?php echo base_url('assets/login');?>/assets/css/skins/default.css">

</head>
<body id="top">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TAGCODE"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page_loader"></div>

<!-- Login 3 start -->
<div class="login-3 tab-box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-pad-0 form-section">
                <div class="login-inner-form">
                    <div class="details">
                      <a href="<?php echo base_url('assets/login');?>/loginpemilihayobersuara.html">
                          <img src="<?php echo base_url('assets/login');?>/logoevoting3.png" alt="logo" style="width:200px;height:200px">
                      </a>
                        <h3>Create an account</h3>
                        <form method="post" action="<?php echo base_url('Auth_pemilih/register'); ?>" role="register">
                            <div class="form-group">
                                <input type="number" name="nomor_pemilih" class="input-text" value="<?= set_value('nomor_pemilih'); ?>" placeholder="<?= $site['s_nomor_pemilihan']; ?>">
                                <?= form_error('nomor_pemilih', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nama_pemilih" class="input-text" value="<?= set_value('nama_pemilih'); ?>" placeholder="Nama Lengkap">
                                <?= form_error('nama_pemilih', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="number" name="no_telp" class="input-text" value="<?= set_value('no_telp'); ?>" placeholder="Nomor HP/WA">
                                <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" name="alamat_pemilih" class="input-text" value="<?= set_value('alamat_pemilih'); ?>" placeholder="Alamat Lengkap">
                                <?= form_error('alamat_pemilih', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="input-text" value="<?= set_value('email'); ?>" placeholder="Email Address">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <div class="checkbox clearfix">
                                  <div class="form-check checkbox-theme">
                                      <input class="form-check-input" value="1" type="checkbox" name="jk" value="" id="termsOfService1">
                                      <label class="form-check-label" for="termsOfService1">
                                          Laki-Laki
                                      </label>
                                  </div>
                                  <div class="form-check checkbox-theme">
                                      <input class="form-check-input" value="0" type="checkbox" name="jk" value="" id="termsOfService2">
                                      <label class="form-check-label" for="termsOfService2">
                                          Perempuan
                                      </label>
                                  </div>
                                </div>
                            </div>
                            <!-- <div class="checkbox clearfix">
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" value="" id="termsOfService">
                                    <label class="form-check-label" for="termsOfService">
                                        I agree to the<a href="#" class="terms">terms of service</a>
                                    </label>
                                </div>
                            </div> -->
                            <button type="submit" name="submit" value="register" class="btn-md btn-theme btn-block"><i class="fa fa-sign-in" aria-hidden="true"></i> Register</button>
                            <p class="none-2">Already a member?<a href="<?php echo base_url('auth_pemilih');?>"> Login here</a></p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-pad-0 bg-img none-992">
                <div class="informeson">
                    <div class="btn-section">
                        <a href="<?php echo base_url('auth_pemilih');?>" class=" link-btn">Login</a>
                        <a href="<?php echo base_url('auth_pemilih/register');?>" class="active link-btn">Register</a>
                    </div>
                    <h3>E-Voting Ayo Bersuara</h3>
                    <p>Simple Vote and Simple Manage Apps.</p>
                    <div class="social-box">
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook-color"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter-color"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google-color"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin-color"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login 3 end -->

<!-- External JS libraries -->
<script src="<?php echo base_url('assets/login');?>/assets/js/jquery-2.2.0.min.js"></script>
<script src="<?php echo base_url('assets/login');?>/assets/js/popper.min.js"></script>
<script src="<?php echo base_url('assets/login');?>/assets/js/bootstrap.min.js"></script>
<!-- Custom JS Script -->
<!--Bootstrap Select [ OPTIONAL ]-->
    <script src="<?php echo base_url('assets');?>/plugins/bootstrap-select/bootstrap-select.min.js"></script>

</body>
</html>
