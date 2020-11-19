<!-- BACKGROUND IMAGE -->
<!--===================================================-->
<div id="bg-overlay"></div>


<!-- LOGIN FORM -->
<!--===================================================-->
<div class="cls-content">
	<div class="cls-content-sm panel">
		<div class="panel-body">
			<div class="pad-btm">
				<img class="img-circle" style="width:140px" src="<?php echo base_url('assets'); ?>/img/logoevoting3.png" alt="Profile Picture">
			</div>
			<div class="mar-ver pad-btm">
				<h1 class="h3">Resgister <br><?php echo $site['nama_website']; ?></h1>
				<p>Registrasikan Data Anda</p>
			</div>
			<form method="post" action="<?php echo base_url('auth/register'); ?>" role="login">
				<div class="form-group">
					<input type="text" name="username" class="form-control" required minlength="5" value="<?= set_value('username'); ?>" placeholder="Username" />
					<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<input type="text" name="first_name" class="form-control" required minlength="5" value="<?= set_value('first_name'); ?>" placeholder="Nama Depan" />
					<?= form_error('first_name', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<input type="text" name="last_name" class="form-control" required minlength="5" value="<?= set_value('last_name'); ?>" placeholder="Nama Belakang" />
					<?= form_error('last_name', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<input type="number" name="phone" class="form-control" required minlength="5" value="<?= set_value('phone'); ?>" placeholder="No Telp" />
					<?= form_error('pnohe', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<input type="email" name="email" class="form-control" required minlength="5" value="<?= set_value('email'); ?>" placeholder="Email" />
					<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" required minlength="5" placeholder="Password" />
					<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<input type="password" name="passwordkonfirmasi" class="form-control" required minlength="5" placeholder="Konfirmasi Password" />
				</div>

				<button type="submit" name="submit" value="register" class="btn btn-success btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Register</button>
			</form>
		</div>
		<div id="myalert">
			<?php echo $this->session->flashdata('alert', true); ?>
		</div>
		<div class="pad-all">
			<a href="<?php echo base_url('auth/login'); ?>" class="btn-link mar-lft">Sudah Punya Akun (Login)</a>
			<hr>
		</div>
	</div>
</div>
<!--===================================================-->


<!-- DEMO PURPOSE ONLY -->
<!--===================================================-->
<div class="demo-bg">
	<div id="demo-bg-list">
		<img class="demo-chg-bg" src="<?php echo base_url('assets'); ?>/img/bg-img/thumbs/dd.jpg" alt="Background Image">
		<img class="demo-chg-bg" src="<?php echo base_url('assets'); ?>/img/bg-img/thumbs/aa.jpg" alt="Background Image">
		<img class="demo-chg-bg" src="<?php echo base_url('assets'); ?>/img/bg-img/thumbs/bb.jpg" alt="Background Image">
		<img class="demo-chg-bg" src="<?php echo base_url('assets'); ?>/img/bg-img/thumbs/cc.jpg" alt="Background Image">
	</div>
</div>
<!--===================================================-->