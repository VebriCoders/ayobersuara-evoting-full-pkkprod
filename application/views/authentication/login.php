<!-- BACKGROUND IMAGE -->
		<!--===================================================-->
		<div id="bg-overlay"></div>


		<!-- LOGIN FORM -->
		<!--===================================================-->
		<div class="cls-content">
		    <div class="cls-content-sm panel">
		        <div class="panel-body">
							<div class="pad-btm">
									<img class="img-circle" style="width:200px" src="<?php echo base_url('assets');?>/img/logoevoting3.png" alt="Profile Picture">
							</div>
		            <div class="mar-ver pad-btm">
		                <h1 class="h3">Login <br><?php echo $site['nama_website']; ?></h1>
		                <p>Sign In to your account</p>
		            </div>
								<form method="post" action="<?php echo base_url('auth/login'); ?>" role="login">
		                <div class="form-group">
											<input type="email" name="email" class="form-control" required minlength="5" placeholder="Email" />
		                </div>
		                <div class="form-group">
											<input type="password" name="password" class="form-control" required minlength="5" placeholder="Password" />
		                </div>
		                <div class="checkbox pad-btm text-left magic-checkbox">
		                    <!-- <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox"> -->
		                    <label for="demo-form-checkbox"><?php echo form_checkbox('remember_code', '1', false, 'id="remember_code"'); ?>Remember me</label>
		                </div>
										<button type="submit" name="submit" value="login" class="btn btn-success btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Masuk</button>
		            </form>
		        </div>
						<div id="myalert">
							<?php echo $this->session->flashdata('alert', true); ?>
							<?= $this->session->flashdata('message'); ?>
						</div>
		        <div class="pad-all">
		            <a href="<?php echo base_url('auth/forgot_password'); ?>" class="btn-link mar-rgt">Forgot password ?</a>
		            <a href="<?php echo base_url('auth/register'); ?>" class="btn-link mar-lft">Create a new account</a>
								<hr>
		        </div>
		    </div>
		</div>
		<!--===================================================-->


		<!-- DEMO PURPOSE ONLY -->
		<!--===================================================-->
		<div class="demo-bg">
		    <div id="demo-bg-list">
		        <img class="demo-chg-bg" src="<?php echo base_url('assets');?>/img/bg-img/thumbs/dd.jpg" alt="Background Image">
						<img class="demo-chg-bg" src="<?php echo base_url('assets');?>/img/bg-img/thumbs/aa.jpg" alt="Background Image">
		        <img class="demo-chg-bg" src="<?php echo base_url('assets');?>/img/bg-img/thumbs/bb.jpg" alt="Background Image">
		        <img class="demo-chg-bg" src="<?php echo base_url('assets');?>/img/bg-img/thumbs/cc.jpg" alt="Background Image">
		    </div>
		</div>
		<!--===================================================-->
