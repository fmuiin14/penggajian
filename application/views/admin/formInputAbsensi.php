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
				<div class="col-md-12">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Input Absensi Pegawai</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">

							<form class="form-inline">
								<div class="form-group mb-2">
									<label class="mr-2">Bulan</label>
									<select class="form-control mr-5" name="bulan">
										<option value="" selected disabled>--Pilih Bulan--</option>
										<option value="01">Januari</option>
										<option value="02">Feruari</option>
										<option value="03">Maret</option>
										<option value="04">April</option>
										<option value="05">Mei</option>
										<option value="06">Juni</option>
										<option value="07">Juli</option>
										<option value="08">Agustus</option>
										<option value="09">September</option>
										<option value="10">Oktober</option>
										<option value="11">November</option>
										<option value="12">Desember</option>
									</select>
								</div>

								<div class="form-group mb-2 mr-2">
									<label class="mr-2">Tahun</label>
									<select class="form-control" name="tahun">
										<option value="" selected disabled>--Pilih Tahun--</option>
										<?php $tahun = date('Y');
										for ($i = $tahun; $i < $tahun + 5; $i++) {
										?>
											<option value="<?= $i ?>"><?= $i ?></option>
										<?php } ?>
									</select>
								</div>

								<button type="submit" class="btn btn-primary mb-2 mr-2 ml-auto"><i class="fas fa-eye"></i> Generate</button>

							</form>

						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>

			<?php
			if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
				$bulan = $_GET['bulan'];
				$tahun = $_GET['tahun'];
				$bulantahun = $bulan . $tahun;
			} else {
				$bulan = date('m');
				$tahun = date('Y');
				$bulantahun = $bulan . $tahun;
			}
			?>
			<div class="alert alert-info">
				Menampilkan Data Kehadiran Pegawai Bulan : <span class="font-weight-bold"><?= $bulan ?></span> Tahun : <span class="font-weight-bold"><?= $tahun ?></span>
			</div>

			<form method="POST">
				<button class="btn btn-success mb-2" name="submit" value="submit" type="submit">Simpan</button>

				<table class="table table-bordered table-stripped">
					<thead>
						<tr>
							<td class="text-center">No</td>
							<td class="text-center">NIK</td>
							<td class="text-center">Nama Pegawai</td>
							<td class="text-center">Jenis Kelamin</td>
							<td class="text-center">Jabatan</td>
							<td class="text-center" width="8%">Hadir</td>
							<td class="text-center" width="8%">Sakit</td>
							<td class="text-center" width="8%">Alpha</td>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($inputabsensi as $absen) { ?>
							<tr>
							<input type="hidden" class="form-control" name="bulan[]" value="<?= $bulantahun ?>">
							<input type="hidden" class="form-control" name="nik[]" value="<?= $absen->nik ?>">
							<input type="hidden" class="form-control" name="nama_pegawai[]" value="<?= $absen->nama_pegawai ?>">
							<input type="hidden" class="form-control" name="jenis_kelamin[]" value="<?= $absen->jenis_kelamin ?>">
							<input type="hidden" class="form-control" name="nama_jabatan[]" value="<?= $absen->nama_jabatan ?>">
								<td><?= $no++ ?></td>
								<td><?= $absen->nik ?></td>
								<td><?= $absen->nama_pegawai ?></td>
								<td><?= $absen->jenis_kelamin ?></td>
								<td><?= $absen->nama_jabatan ?></td>
								<td><input type="number" class="form-control" name="hadir[]" value="0"></td>
								<td><input type="number" class="form-control" name="sakit[]" value="0"></td>
								<td><input type="number" class="form-control" name="alpa[]" value="0"></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</form>


		</div>
	</section>

</div>