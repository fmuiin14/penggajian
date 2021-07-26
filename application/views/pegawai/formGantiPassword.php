<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?= $title ?></h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10">
					<div class="card mx-auto" style="width:35%">
						<div class="card-header bg-primary text-white text-center">
							Ubah password
						</div>

						<form method="POST" action="<?= base_url('pegawai/gantiPassword/gantiPasswordAksi') ?>">
							<div class="card-body">
								<div class="form-group row">
									<label for="password" class="col-md-8 col-form-label">Password Baru</label>
									<input type="password" class="form-control" name="password">
									<?= form_error('password', '<p class="text-small text-danger"></p>') ?>
								</div>

								<div class="form-group row">
									<label for="password_match" class="col-md-8 col-form-label">Ulangi Password</label>
									<input type="password" class="form-control" name="password_match">
									<?= form_error('password_match', '<p class="text-small text-danger"></p>') ?>
								</div>

								<button style="width:100%" type="submit" class="btn btn-primary">Simpan</button>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>