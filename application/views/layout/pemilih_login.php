
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
    <title>Ayo Bersuara - Login Pemilih</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/login');?>/assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/login');?>/assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/login');?>/assets/fonts/flaticon/font/flaticon.css">

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
                        <h3>Masukkan Nomor Pemilihan Anda</h3>
                        <?= $this->session->flashdata('message'); ?>

                        <?php
                          $attr = array('class' => 'user mt-5');
                          echo form_open('Auth_pemilih', $attr);
                        ?>
                            <div class="form-group">
                                <input type="number" name="nomor_pemilih" class="input-text" placeholder="<?= $site['s_nomor_pemilihan']; ?>">
                                <?= form_error("nomor_pemilih", '<small class="text-danger">', '</small>')?>
                            </div>
                            <!-- <div class="checkbox clearfix">
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">
                                        Remember me
                                    </label>
                                </div>
                                <a href="forgot-password-3.html">Forgot Password</a>
                            </div> -->
                            <div class="form-group">
                                <!-- <button type="submit" class="btn-md btn-theme btn-block">Login</button> -->
                                <input type="submit" class="btn-md btn-theme btn-block" name="login-pemilih" value="Login">
                            </div>
                            <p class="none-2">Belum Mendaftar,Yuk Mendaftar Secara Mandiri?<a href="<?php echo base_url('auth_pemilih/register');?>"> Daftar</a></p>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-pad-0 bg-img none-992">
                <div class="informeson">
                    <div class="btn-section">
                        <a href="<?php echo base_url('auth_pemilih');?>" class="active link-btn">Login</a>
                        <a href="<?php echo base_url('auth_pemilih/register');?>" class="link-btn">Register</a>
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

</body>
</html>
