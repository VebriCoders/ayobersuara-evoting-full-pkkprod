<!DOCTYPE html>
<html lang="en" class="js">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="AppsLand is a powerful App Landing HTML Template with full of customization options and features">
		<!-- Fav Icon  -->
		<link rel="shortcut icon" href="<?php echo base_url('assets');?>/img/logoevoting.png">
		<!-- Site Title  -->
		<title><?= $title ?></title>
		<!-- Vendor Bundle CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/landing_pages');?>/assets/css/vendor.bundlec302.css" >
		<!-- Custom styles for this template -->
		<link href="<?php echo base_url('assets/landing_pages');?>/assets/css/stylec302.css" rel="stylesheet">
		<link href="<?php echo base_url('assets/landing_pages');?>/assets/css/theme-purplec302.css" rel="stylesheet" id="layoutstyle">
	</head>
	<body class="overflow-scroll">

		<!-- Start .header-section -->
		<div id="home" class="header-section flex-box-middle section gradiant-background header-curbed-circle background-circles header-software">
			<div id="particles-js" class="particles-container"></div>
			<div id="navigation" class="navigation is-transparent" data-spy="affix" data-offset-top="5">
				<nav class="navbar navbar-default">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-collapse-nav" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.html">
								<img class="logo logo-light" src="<?php echo base_url()?>assets/upload/images/landing_pages/tagline_img/<?= $img_tagline['logo']; ?>" alt="logo" />
								<img class="logo logo-color" src="<?php echo base_url()?>assets/upload/images/landing_pages/tagline_img/<?= $img_tagline['logo2']; ?>" alt="logo" />
							</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse font-secondary" id="site-collapse-nav">
							<ul class="nav nav-list navbar-nav navbar-right">
								<li><a class="nav-item" href="#home">Home</a></li>
								<li><a class="nav-item" href="#about">About</a></li>
								<li><a class="nav-item" href="#features">Features</a></li>
								<li><a class="nav-item" href="#screenshots">Screenshots</a></li>
								<li><a class="nav-item" href="#faq">FAQ</a></li>
								<li><a class="nav-item" href="#team">Team</a></li>
								<li><a class="nav-item" href="#testimonial">Testimonial</a></li>
								<li><a class="nav-item" href="#contacts">Contacts</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container -->
				</nav>
			</div><!-- .navigation -->

			<div id="home" class="header-content pt-90">
				<div class="container">
					<div class="row text-center">
						<div class="col-md-8 col-md-offset-2">
							<div class="header-texts">
								<h1 class="cd-headline clip is-full-width wow fadeInUp" data-wow-duration=".5s">
									<span><?= $site['nama_website']; ?> </span>
									<span class="cd-words-wrapper">

                    <!-- Tagline Sub  -->
                    <?php
										$number=1;
										foreach( $tagline->result() as $d ){ ?>
										<b <?php if($number=="1"){ ?> class="is-visible" <?php }else{ ?> class="" <?php } ?>><?php echo $d->tagline ?></b>
										<?php $number++;} ?>

									</span>
								</h1>
								<ul class="buttons">
									<li><a href="<?php echo base_url()?>auth_pemilih" target="_blank" class="button wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".6s">Login</a></li>
									<li><a href="<?php echo base_url()?>auth_pemilih/register" class="button button-border button-transparent wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".9s">Register</a></li>
								</ul>
							</div>
						</div><!-- .col -->
					</div><!-- .row -->
					<div class="row text-center">
						<div class="col-md-10 col-md-offset-1">
							<div class="header-mockups">
								<div class="header-laptop-mockup black wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s" >
									<img src="<?php echo base_url()?>assets/upload/images/landing_pages/tagline_img/<?= $img_tagline['desktop']; ?>" alt="software-screen" />
								</div>
								<div class="iphonex-flat-mockup wow fadeInUp" data-wow-duration="1s" data-wow-delay=".9s">
									<img src="<?php echo base_url()?>assets/upload/images/landing_pages/tagline_img/<?= $img_tagline['mobile']; ?>" alt="app screen">
								</div>
							</div>
						</div>
					</div>
				</div><!-- .container -->
			</div><!-- .header-content -->
		</div><!-- .header-section -->


		<!-- Start .about-section  -->
		<div id="about" class="about-section section white-bg">
			<div class="container tab-fix">
				<div class="section-head text-center">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<h2 class="heading">About <span><?= $site['nama_website']; ?></span></h2>
							<p>Sedikit Cerita Tentang Aplikasi <?= $site['nama_website']; ?> E-Voting Web Apps, Sejarah Kemunculan dan Tujuan Pembuatan Aplikasi.</p>
						</div>
					</div>
				</div><!-- .section-head -->
				<div class="row tab-center mobile-center">
					<div class="col-md-6">
						<div class="video wow fadeInLeft" data-wow-duration=".5s">
							<img src="<?php echo base_url()?>assets/upload/images/landing_pages/deskripsi_about/<?= $Data_About['bg_photo']; ?>" alt="about-video" />
							<div class="video-overlay gradiant-background"></div>
							<a href="<?= $Data_About['yt']; ?>" class="video-play" data-effect="mfp-3d-unfold"><i class="fa fa-play"></i></a>
						</div>
					</div><!-- .col -->
					<div class="col-md-6">
						<div class="txt-entry">
							<h3><?= $Data_About['title']; ?></h3>
							<p><?= $Data_About['deskripsi']; ?></p>
							<a href="#" class="button">Demo</a>
						</div>
					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .about-section  -->


		<!-- Start .features-section  -->
		<div id="features" class="features-section section gradiant-background section-overflow-fix">
			<div class="container tab-fix">
				<div class="features-content pt-10">
					<div class="row">
						<div class="col-md-7">
							<div class="section-head heading-light mobile-center tab-center">
								<div class="row">
									<div class="col-md-12">
										<h2 class="heading heading-light">Fitur Unggulan <?= $site['nama_website']; ?></h2>
										<p>Aplikasi <?= $site['nama_website']; ?> Punya Segudang Fitur Voting Terbaik dari Aplikasi Voting Lain, Kita Juga Mempunyai Fitur Unggulan Yang Sangat Memudahkan Kegiatan Pemilihan.</p>
									</div>
								</div>
							</div><!-- .section-head -->
							<div class="row">

                <?php foreach( $Data_Fitur->result() as $d ){ ?>
								<div class="col-sm-6" style="height:170px">
									<div class="single-features">
										<em class="ti <?php echo $d->icon ?>"></em>
										<h4><?php echo $d->title ?></h4>
										<p><?php echo $d->deskripsi ?></p>
									</div>
								</div><!-- .col -->
              <?php } ?>

							</div><!-- .row -->
						</div><!-- .col -->
						<div class="col-md-5 pt-100 text-center">
							<div class="feature-mockups clearfix">
								<div class="fearures-software-mockup black right wow fadeInUp" data-wow-duration=".5s"  data-wow-delay=".7s">
									<img src="<?php echo base_url()?>assets/upload/images/landing_pages/tagline_img/<?= $img_tagline['desktop']; ?>" alt="software-screen" />
								</div>
								<div class="phone-mockup">
									<div class="iphonex-flat-mockup large wow fadeInUp" data-wow-duration=".5s">
										<img src="<?php echo base_url()?>assets/upload/images/landing_pages/tagline_img/<?= $img_tagline['mobile']; ?>" alt="app screen">
									</div>
								</div>
							</div>
						</div><!-- .col -->
					</div><!-- .row -->
				</div><!-- .features-content -->
			</div><!-- .container -->
		</div><!-- .features-section  -->


		<!-- Start .steps-section  -->
		<div id="screenshots" class="section steps-section-alt pb-90 white-bg">
			<div class="container">
				<div class="section-head text-center">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<h2 class="heading">Screenshots <span>of <?= $site['nama_website']; ?></span></h2>
							<p>Screenshots Tampilan <?= $site['nama_website']; ?> E-Voting Web Apps Yang Sangat Menarik dan Memanjakan Mata. Serta Memiliki Segudang Fitur Yang Wajib Ada Pada Kegiatan Pemilihan</p>
						</div>
					</div>
				</div><!-- .section-head  -->
				<div class="row text-center">
					<div class="col-md-12">
						<ul class="nav nav-tabs inline-nav text-center">

							<?php
							$number=1;
							foreach( $Data_SS->result() as $d ){ ?>
							<li
							<?php if($number=="1"){ ?> class="active" <?php }else{ ?> class="" <?php } ?> data-toggle="tab" data-target="#tab<?php echo $d->id ?>">
								<div class="steps"><h4><?php echo $d->title ?></h4></div>
							</li>
					  	<?php $number++; } ?>

						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="tab-content no-pd">

							<?php
							$number=1;
							foreach( $Data_SS->result() as $d ){ ?>
							<div <?php if($number=="1"){ ?> class="tab-pane fade in active" <?php }else{ ?> class="tab-pane fade in" <?php } ?> id="tab<?php echo $d->id ?>">
								<div class="laptop-mockup laptop-black">
									<img src="<?php echo base_url() ?>assets/upload/images/landing_pages/screenshots_app/<?php echo $d->img_desktop ?>" alt="step-screen">
								</div>
								<div class="phone-mockup">
									<div class="iphonex-flat-mockup">
										<img src="<?php echo base_url() ?>assets/upload/images/landing_pages/screenshots_app/<?php echo $d->img_mobile ?>" alt="app screen">
									</div>
								</div>
							</div>
							<?php $number++; } ?>


						</div>
					</div>
				</div><!-- .row  -->
			</div><!-- .container  -->
		</div><!-- Start .statistics-section  -->


		<!-- Start .faq-section  -->
		<div id="faq" class="faq-section section white-bg pt-120 pb-100">
			<div class="container">
				<div class="faq-alt">
					<div class="row tab-fix">
						<div class="col-md-4 tab-center mobile-center col-md-offset-1">
							<div class="side-heading">
								<h2 class="heading"><?= $site['nama_website']; ?> <span>FAQ</span></h2>
								<p>Bebrapa Pertanyaan dari bebrapa user, jika permasalahan anda tidak ada silahkan <a class="nav-item" href="#contacts">contact</a> kami.</p>
							</div>
						</div><!-- .col  -->
						<div class="col-md-6">
							<!-- Accordion -->
							<div class="panel-group accordion" id="another" role="tablist" aria-multiselectable="true">


                <?php foreach( $Data_Faq->result() as $d ){ ?>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="accordion-i<?php echo $d->id ?>">
										<h6 class="panel-title">
											<a class="collapsed" role="button" data-toggle="collapse" data-parent="#another" href="#accordion-pane-i<?php echo $d->id ?>" aria-expanded="false">
												<?php echo $d->pertanyaan ?>
												<span class="plus-minus"><span></span></span>
											</a>
										</h6>
									</div>
									<div id="accordion-pane-i<?php echo $d->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-i<?php echo $d->id ?>">
										<div class="panel-body">
											  <p><?php echo $d->solusi ?></p>
										</div>
									</div>
								</div>
              <?php } ?>

            </div>
						</div><!-- .col  -->
					</div><!-- .row  -->
				</div><!-- .faq  -->
			</div><!-- .container  -->
		</div><!-- .faq-section  -->


		<!-- Start .team-section  -->
		<div class="team-section section grey-background pb-90" id="team">
			<div class="container">
				<div class="section-head text-center">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<h2 class="heading"><?= $site['nama_website']; ?> <span>Team</span></h2>
							<p>Kita Pastinya Mempunyai Team Yang Handal Untuk Membuat dan Mendevelop Aplikasi <?= $site['nama_website']; ?>. Seluruh Team Telah Melewati Uji Kemampuan Sesuai Skill Masing-Masing</p>
						</div>
					</div>
				</div><!-- .section-head  -->
				<div class="row">

					<?php foreach( $Data_Team->result() as $d ){ ?>
          <div class="col-md-3 col-sm-6">
						<div class="team-member">
							<div class="team-photo">
								<img src="<?php echo base_url() ?>assets/upload/images/landing_pages/tim_developer/<?php echo $d->photo ?>" alt="team" />
								<a href="#team-profile-<?php echo $d->id ?>" class="expand-trigger content-popup"><span class="ti ti-plus"></span></a>
							</div>
							<div class="team-info">
								<h4 class="name"><?php echo $d->nama ?></h4>
								<p class="sub-title"><?php echo $d->tagline ?></p>
							</div>
							<!-- Start .team-profile  -->
							<div id="team-profile-<?php echo $d->id ?>" class="team-profile mfp-hide">
								<button title="Close (Esc)" type="button" class="mfp-close">×</button>
								<div class="container-fluid">
									<div class="row no-mg">
										<div class="col-md-6">
											<div class="team-profile-photo">
												<img src="<?php echo base_url() ?>assets/upload/images/landing_pages/tim_developer/<?php echo $d->photo ?>" alt="team" />
											</div>
										</div><!-- .col  -->
										<div class="col-md-6">
											<div class="team-profile-info">
												<h3 class="name"><?php echo $d->nama ?></h3>
												<p class="sub-title"><?php echo $d->tagline ?></p>
												<ul class="social">
													<li><a href="<?php echo $d->fb ?>" target="_blank"><em class="fa fa-facebook"></em></a></li>
													<li><a href="<?php echo $d->tw ?>" target="_blank"><em class="fa fa-twitter"></em></a></li>
													<li><a href="mailto:<?php echo $d->email ?>" target="_blank"><em class="fa fa-google-plus"></em></a></li>
													<li><a href="<?php echo $d->ig ?>" target="_blank"><em class="fa fa-instagram"></em></a></li>
													<li><a href="https://api.whatsapp.com/send?phone=<?php echo $d->hp ?>" target="_blank"><em class="fa fa-whatsapp"></em></a></li>
													<li><a href="<?php echo $d->yt ?>" target="_blank"><em class="fa fa-youtube"></em></a></li>
												</ul>
												<p><?php echo $d->deskripsi ?> </p>
												<div class="skill-bars">

													<div class="single-skill-bar">
														<div class="row no-mg">
															<div class="col-xs-8 no-pd"><span class="skill-title">Codeigniter</span></div>
															<div class="col-xs-4 text-right no-pd"><span class="skill-percent"><?php echo $d->skill_codeigniter ?>%</span></div>
														</div>
														<div class="skill-bar">
															<div class="skill-bar-percent gradiant-background" style="width:<?php echo $d->skill_codeigniter ?>%"></div>
														</div>
													</div>

													<div class="single-skill-bar">
														<div class="row no-mg">
															<div class="col-xs-8 no-pd"><span class="skill-title">Laravel</span></div>
															<div class="col-xs-4 text-right no-pd"><span class="skill-percent"><?php echo $d->skill_laravel ?>%</span></div>
														</div>
														<div class="skill-bar">
															<div class="skill-bar-percent gradiant-background" style="width:<?php echo $d->skill_laravel ?>%"></div>
														</div>
													</div>

													<div class="single-skill-bar">
														<div class="row no-mg">
															<div class="col-xs-8 no-pd"><span class="skill-title">Desain</span></div>
															<div class="col-xs-4 text-right no-pd"><span class="skill-percent"><?php echo $d->skill_desain ?>%</span></div>
														</div>
														<div class="skill-bar">
															<div class="skill-bar-percent gradiant-background" style="width:<?php echo $d->skill_desain ?>%"></div>
														</div>
													</div>

													<div class="single-skill-bar">
														<div class="row no-mg">
															<div class="col-xs-8 no-pd"><span class="skill-title">PHP</span></div>
															<div class="col-xs-4 text-right no-pd"><span class="skill-percent"><?php echo $d->skill_php ?>%</span></div>
														</div>
														<div class="skill-bar">
															<div class="skill-bar-percent gradiant-background" style="width:<?php echo $d->skill_php ?>%"></div>
														</div>
													</div>

													<div class="single-skill-bar">
														<div class="row no-mg">
															<div class="col-xs-8 no-pd"><span class="skill-title">HTML5</span></div>
															<div class="col-xs-4 text-right no-pd"><span class="skill-percent"><?php echo $d->skill_html ?>%</span></div>
														</div>
														<div class="skill-bar">
															<div class="skill-bar-percent gradiant-background" style="width:<?php echo $d->skill_html ?>%"></div>
														</div>
													</div>

													<div class="single-skill-bar">
														<div class="row no-mg">
															<div class="col-xs-8 no-pd"><span class="skill-title">CSS</span></div>
															<div class="col-xs-4 text-right no-pd"><span class="skill-percent"><?php echo $d->skill_css ?>%</span></div>
														</div>
														<div class="skill-bar">
															<div class="skill-bar-percent gradiant-background" style="width:<?php echo $d->skill_css ?>%"></div>
														</div>
													</div>

													<div class="single-skill-bar">
														<div class="row no-mg">
															<div class="col-xs-8 no-pd"><span class="skill-title">JavaScript</span></div>
															<div class="col-xs-4 text-right no-pd"><span class="skill-percent"><?php echo $d->skill_javascript ?>%</span></div>
														</div>
														<div class="skill-bar">
															<div class="skill-bar-percent gradiant-background" style="width:<?php echo $d->skill_javascript ?>%"></div>
														</div>
													</div>

													<div class="single-skill-bar">
														<div class="row no-mg">
															<div class="col-xs-8 no-pd"><span class="skill-title">Java</span></div>
															<div class="col-xs-4 text-right no-pd"><span class="skill-percent"><?php echo $d->skill_java ?>%</span></div>
														</div>
														<div class="skill-bar">
															<div class="skill-bar-percent gradiant-background" style="width:<?php echo $d->skill_java ?>%"></div>
														</div>
													</div>

												</div>
											</div>
										</div><!-- .col  -->
									</div><!-- .row  -->
								</div><!-- .container  -->
							</div><!-- .team-profile  -->
						</div>
					</div><!-- .col  -->
				<?php } ?>

				</div><!-- .row  -->
			</div><!-- .container  -->
		</div><!-- .team-section  -->


		<!-- Start .testimonial-section  -->
		<div id="testimonial" class="testimonial-section section white-bg pb-120">
			<div class="imagebg">
				<img src="<?php echo base_url('assets/landing_pages');?>/images/testimonial-bg.png" alt="testimonial-bg">
			</div>
			<div class="container">
				<div class="section-head text-center">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<h2 class="heading"><?= $site['nama_website']; ?> <span>Testimoni Client !</span></h2>
							<p>Beberapa Clien Kita Senang Dengan Penggalamannya Menggunakan Aplikasi <?= $site['nama_website']; ?>. Sekarang Waktunya Kalian Mencoba!.</p>
						</div>
					</div>
				</div><!-- .section-head  -->
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="testimonial-carousel has-carousel" data-items="1" data-loop="true" data-dots="true" data-auto="true" data-navs="false">

							<?php foreach( $Data_Testimoni->result() as $d ){ ?>
							<div class="item text-center">
								<div class="quotes">
									<img src="<?php echo base_url('assets/landing_pages');?>/images/quote-icon.png" class="quote-icon" alt="quote-icon" />
									<blockquote><?php echo $d->testimoni ?></blockquote>
									<h6><?php echo $d->nama ?></h6>
									<div class="client-image">
										<img src="<?php echo base_url() ?>assets/upload/images/landing_pages/testimoni_client/<?php echo $d->photo ?>" alt="client" />
									</div>
								</div>
							</div>
						<?php } ?>

						</div><!-- .testimonial-carousel  -->
					</div><!-- .col  -->
				</div><!-- .row  -->
			</div><!-- .container  -->
		</div><!-- .testimonial-section  -->


		<!-- Start .contact-section  -->
		<div id="contacts" class="contact-section section gradiant-background pb-90">
			<div class="container">
				<div class="section-head heading-light text-center">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<h2 class="heading heading-light"><?= $site['nama_website']; ?> Contact</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="contact-form white-bg text-center">
							<h3>Contact Us</h3>
							<p>Hubungi Kami Untuk Pertanyaan Lebih Lanjut.</p>

							<form id="contact-form" class="form-message" action="http://demo.themenio.com/appsland/form/contact.php" method="post">
								<div class="form-results"></div>
								<div class="form-group row fix-gutter-10">
									<div class="form-field col-sm-6 gutter-10 form-m-bttm">
										<input name="nama" id="nama" type="text" required="required" placeholder="Nama Lengkap *" class="form-control required"><p class="text-danger" id="kosong_nama"></p>
									</div>
									<div class="form-field col-sm-6 gutter-10">
										<input name="email" id="email" type="email" placeholder="Email *" class="form-control required email"><p class="text-danger" id="kosong_email"></p>
									</div>
								</div>
								<div class="form-group row fix-gutter-10">
									<div class="form-field col-md-6 gutter-10 form-m-bttm">
										<input name="no_hp" id="no_hp" type="number" placeholder="Nomor Telephone *" class="form-control required"><p class="text-danger" id="kosong_hp"></p>
									</div>
									<div class="form-field col-md-6 gutter-10">
										<input name="subject" id="subject" type="text" placeholder="Subject *" class="form-control required"><p class="text-danger" id="kosong_subject"></p>
									</div>
								</div>
								<div class="form-group row">
									<div class="form-field col-md-12">
										<textarea name="pesan" id="pesan" placeholder="Messages *" class="txtarea form-control required"></textarea><p class="text-danger" id="kosong_pesan"></p>
									</div>
								</div>
								<!-- <input type="text" class="hidden" name="form-anti-honeypot" value=""> -->
								<button id="simpan_contact_use" class="button solid-btn sb-h">Submit</button>
								<p id="terimakasih"></p>
							</form>

						</div>
					</div><!-- .col  -->
					<div class="col-md-6">
						<div class="contact-info white-bg">
							<div class="row">
								<div class="col-sm-7">
									<h6><em class="fa fa-envelope"></em> <?= $cns['email']; ?></h6>
								</div>
								<div class="col-sm-5">
									<h6><em class="fa fa-phone"></em> <?= $cns['no_telp']; ?>	</h6>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<h6><em class="fa fa-map-marker"></em> <?= $cns['alamat']; ?></h6>
								</div>
							</div>
						</div>
						<!-- <div id="gMap" class="google-map"></div> -->
						<iframe  class="google-map col-md-12" src="<?= $cns['g_maps']; ?>" ></iframe>
					</div><!-- .col  -->
				</div><!-- .row  -->
			</div><!-- .container  -->
		</div><!-- .contact-section  -->


		<!-- Start .footer-section  -->
		<div class="footer-section section">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-12">
						<ul class="footer-navigation inline-list">
              <li><a class="nav-item" href="#home">Home</a></li>
              <li><a class="nav-item" href="#about">About</a></li>
              <li><a class="nav-item" href="#features">Features</a></li>
              <li><a class="nav-item" href="#screenshots">Screenshots</a></li>
              <li><a class="nav-item" href="#faq">FAQ</a></li>
              <li><a class="nav-item" href="#team">Team</a></li>
              <li><a class="nav-item" href="#testimonial">Testimonial</a></li>
              <li><a class="nav-item" href="#contacts">Contacts</a></li>
						</ul>
						<ul class="social-list inline-list">
							<li><a href="<?= $cns['fb']; ?>"><em class="fa fa-facebook"></em></a></li>
							<li><a href="<?= $cns['tw']; ?>"><em class="fa fa-twitter"></em></a></li>
							<li><a href="<?= $cns['g_plus']; ?>"><em class="fa fa-google-plus"></em></a></li>
							<li><a href="<?= $cns['path']; ?>"><em class="fa fa-pinterest"></em></a></li>
							<li><a href="<?= $cns['ig']; ?>"><em class="fa fa-instagram"></em></a></li>
              <li><a href="<?= $cns['yt']; ?>"><em class="fa fa-youtube"></em></a></li>
              <li><a href="https://api.whatsapp.com/send?phone=<?= $cns['no_telp']; ?>"><em class="fa fa-whatsapp"></em></a></li>
						</ul>
						<ul class="footer-links inline-list">
							<li>Copyright © 2020 <a target="_blank" href="http://instagram.com/pradanaindustries">Pradana Industries</a>. Template Edited by <a target="_blank" href="http://instagram.com/vebritok_blo">vebritok_blo</a></li>
							<!-- <li><a href="#">Privacy Policy</a></li> -->
						</ul>
					</div><!-- .col  -->
				</div><!-- .row  -->
			</div><!-- .container  -->
		</div><!-- .footer-section  -->

		<!-- Preloader !remove please if you do not want -->
		<div id="preloader"><div id="status">&nbsp;</div></div>
		<!-- Preloader End -->

		<!-- Google Map Script -->
				<!-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyD6cxB4idvB67_Mz1ScQn-_nBJmltUaS-g"></script> -->
				<!-- <script src="<?php echo base_url('assets/landing_pages');?>/assets/js/googleMapc302.js?ver=130"></script> -->
		<!-- JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->

		<script src="<?php echo base_url('assets/landing_pages');?>/assets/js/jquery.bundlec302.js"></script>
		<script src="<?php echo base_url('assets/landing_pages');?>/assets/js/scriptc302.js"></script>
		<script type="text/javascript">
	    $(document).ready(function(){
	        //Simpan Data
	        $('#simpan_contact_use').on('click',function(){
	            var nama=$('#nama').val();
	            var email=$('#email').val();
	            var no_hp=$('#no_hp').val();
							var subject=$('#subject').val();
							var pesan=$('#pesan').val();
        			if (nama=="")
							{
								document.getElementById("kosong_nama").innerHTML = "Nama Harus di Isi";
							}else{
								document.getElementById("kosong_nama").innerHTML = "";
							}
							if (email=="")
							{
								document.getElementById("kosong_email").innerHTML = "Email Harus di Isi";
							}else{
								document.getElementById("kosong_email").innerHTML = "";
							}
							if (no_hp=="")
							{
								document.getElementById("kosong_hp").innerHTML = "No.Hp Harus di Isi";
							}else{
								document.getElementById("kosong_hp").innerHTML = "";
							}
							if (subject=="")
							{
								document.getElementById("kosong_subject").innerHTML = "Subject Harus di Isi";
							}else{
								document.getElementById("kosong_subject").innerHTML = "";
							}
							if (pesan=="")
							{
								document.getElementById("kosong_pesan").innerHTML = "Pesan Harus di Isi";
							}else{
								document.getElementById("kosong_pesan").innerHTML = "";
							}
							if(nama!="" && email!="" && no_hp!="" && subject!="" && pesan!=""){
								$.ajax({
									 type : "POST",
									 url  : "<?php echo base_url('home/simpan_contact')?>",
									 dataType : "JSON",
									 data : {nama:nama , email:email, no_hp:no_hp, subject:subject, pesan:pesan},
									 success: function(data){
											 $('[name="nama"]').val("");
											 $('[name="email"]').val("");
											 $('[name="no_hp"]').val("");
											 $('[name="subject"]').val("");
											 $('[name="pesan"]').val("");
											 $("#terimakasih").html("Terima Kasih "+nama+" Atas Masukkannya,Cek Email Kamu "+email+" Nanti Admin Hubungi");
											 // $('#contact-form');
											 // tampil_data_barang();
									 }
							 });
							}
	            return false;
	        });

	    });

	</script>
	</body>
</html>
