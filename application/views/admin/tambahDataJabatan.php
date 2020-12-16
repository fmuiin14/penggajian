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

							<form action="<?= base_url('admin/dataJabatan/tambahDataAksi') ?>" method="POST">

								<div class="form-group">
									<label for="namaJabatan">Nama Jabatan</label>
									<input type="text" name="nama_jabatan" class="form-control">
									<?= form_error('nama_jabatan', '<div class="text-small text-danger"></div>') ?>
								</div>
								<div class="form-group">
									<label for="gajiPokok">Gaji Pokok</label>
									<input type="text" name="gaji_pokok" class="form-control">
									<?= form_error('gaji_pokok', '<div class="text-small text-danger"></div>') ?>
								</div>
								<div class="form-group">
									<label for="tjTransport">Tunjangan Transport</label>
									<input type="text" name="tj_transport" class="form-control">
									<?= form_error('tj_transport', '<div class="text-small text-danger"></div>') ?>
								</div>
								<div class="form-group">
									<label for="uangMakan">Uang Makan</label>
									<input type="text" name="uang_makan" class="form-control">
									<?= form_error('uang_makan', '<div class="text-small text-danger"></div>') ?>
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
