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

							<?php foreach ($pegawai as $pegawa) : ?>
							<form action="<?= base_url('admin/dataPegawai/updateDataAksi') ?>" method="POST" enctype="multipart/form-data">

								<div class="form-group">
									<label>NIK</label>
									<input type="hidden" name="id_pegawai" class="form-control" value="<?= $pegawa->id_pegawai ?>">
									<input type="text" name="nik" class="form-control" value="<?= $pegawa->nik ?>">
									<?= form_error('nik', '<div class="text-small text-danger"></div>') ?>
								</div>

								<div class="form-group">
									<label>Nama Pegawai</label>
									<input type="text" name="nama_pegawai" class="form-control" value="<?= $pegawa->nama_pegawai ?>">
									<?= form_error('nama_pegawai', '<div class="text-small text-danger"></div>') ?>
								</div>

								<div class="form-group">
									<label>Jenis Kelamin</label>
									<select name="jenis_kelamin" class="form-control">
										<option value="<?= $pegawa->jenis_kelamin ?>"><?= $pegawa->jenis_kelamin ?></option>
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
									<?= form_error('jenis_kelamin', '<div class="text-small text-danger"></div>') ?>
								</div>

								<div class="form-group">
									<label>Jabatan</label>
									<select name="jabatan" class="form-control">
										<option value="<?= $pegawa->jabatan ?>"><?= $pegawa->jabatan ?></option>
										<?php foreach ($all_jabatan as $jabata) : ?>
										<option value="<?= $jabata->nama_jabatan ?>"><?= $jabata->nama_jabatan ?></option>
										<?php endforeach; ?>
									</select>
									<?= form_error('jabatan', '<div class="text-small text-danger"></div>') ?>
								</div>

								<div class="form-group">
									<label>Tanggal Masuk</label>
									<input type="date" name="tanggal_masuk" class="form-control" value="<?= $pegawa->tanggal_masuk ?>">
									<?= form_error('tanggal_masuk', '<div class="text-small text-danger"></div>') ?>
								</div>

								<div class="form-group">
									<label>Status</label>
									<select name="status" class="form-control">
										<option value="<?= $pegawa->status ?>"><?= $pegawa->status ?></option>
										<option value="Pegawai Tetap">Pegawai Tetap</option>
										<option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
									</select>
									<?= form_error('status', '<div class="text-small text-danger"></div>') ?>
								</div>



								<div class="form-group">
									<label>Photo</label>
									<input type="file" name="photo" class="form-control">
								</div>

								<button type="submit" class="btn btn-success">Update</button>

							</form>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>
