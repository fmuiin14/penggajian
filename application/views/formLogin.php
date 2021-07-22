<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?= base_url() ?>"><b>Login - Penggajian App</a>
		</div>
		<!-- /.login-logo -->
		<?php if (isset($_SESSION['invalid_login'])) { ?>
			<div class="alert alert-warning text-center" role="alert">
				<?= $_SESSION['invalid_login'] ?>
			</div>
		<?php } ?>

		<?= $this->session->flashdata('pesan') ?>

		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Silakan login untuk mengakses akun Anda.</p>
				<form action="<?= site_url('welcome') ?>" method="post">
					<div class="input-group mb-3">
						<input type="text" name="username" class="form-control" placeholder="username" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<?= form_error('username', '<p class="text-small text-danger"></p>') ?>
					<div class="input-group mb-3">
						<input type="password" name="password" class="form-control" placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<?= form_error('password', '<p class="text-small text-danger"></p>') ?>
					<div class="row">
						<div class="col-4 mx-auto">
							<button type="submit" class="btn btn-primary btn-block">Login</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->