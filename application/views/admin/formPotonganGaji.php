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
				<div class="col-md-7">
					<div class="card">
						<div class="card-body">

							<form action="<?= base_url('admin/potonganGaji/tambahDataAksi') ?>" method="POST">

								<div class="form-group">
									<label for="potongan">Jenis Potongan</label>
									<input type="text" name="potongan" class="form-control">
									<?= form_error('potongan', '<div class="text-small text-danger"></div>') ?>
								</div>
								<div class="form-group">
									<label for="jml_potongan">Jumlah Potongan</label>
									<input type="text" name="jml_potongan" class="form-control">
									<?= form_error('jml_potongan', '<div class="text-small text-danger"></div>') ?>
								</div>

								<button type="submit" class="btn btn-success">Submit</button>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>