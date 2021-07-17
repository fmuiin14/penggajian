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
							<h3 class="card-title">Filter Data Gaji Pegawai</h3>
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

								<button type="submit" class="btn btn-primary mb-2 mr-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>

								<?php if (count($gaji) > 0) { ?>
									<a href="<?= base_url('admin/dataPenggajian/cetakGaji?bulan=' . $bulan), '&tahun=' . $tahun ?>" class="btn btn-success mb-2"><i class="fas fa-print"></i> Cetak Daftar Gaji</a>
								<?php } else { ?>
									<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#modalnone"><i class="fas fa-print"></i> Cetak Daftar Gaji</button>
								<?php } ?>


							</form>

						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>

			<div class="alert alert-info">
				Menampilkan Data Kehadiran Pegawai Bulan : <span class="font-weight-bold"><?= $bulan ?></span> Tahun : <span class="font-weight-bold"><?= $tahun ?></span>
			</div>


			<table class="table table-bordered table-stripped">
				<thead>
					<tr>
						<td class="text-center">No</td>
						<td class="text-center">NIK</td>
						<td class="text-center">Nama Pegawai</td>
						<td class="text-center">Jenis Kelamin</td>
						<td class="text-center">Jabatan</td>
						<td class="text-center">Gaji Pokok</td>
						<td class="text-center">Tj. Transport</td>
						<td class="text-center">Uang Makan</td>
						<td class="text-center">Potongan</td>
						<td class="text-center">Total Gaji</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($potongan as $pot) {
						$pottt = $pot->jml_potongan;
					} ?>
					<?php $no = 1;
					foreach ($gaji as $ga) { ?>
						<?php $potongan = $ga->alpa * $pottt ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $ga->nik ?></td>
							<td><?= $ga->nama_pegawai ?></td>
							<td><?= $ga->jenis_kelamin ?></td>
							<td><?= $ga->jabatan ?></td>
							<td><?= $ga->gaji_pokok ?></td>
							<td><?= $ga->tj_transport ?></td>
							<td><?= $ga->uang_makan ?></td>
							<td><?= $potongan ?></td>
							<td><?= $ga->gaji_pokok + $ga->tj_transport + $ga->uang_makan - $potongan ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

			<!-- <span class="badge badge-danger"><i class="fas fa-info-circle"></i>
				Data masih kosong, silakan input data kehadiran pada bulan dan tahun yang dipilih
			</span> -->

		</div>
	</section>

</div>

<!-- Modal -->
<div class="modal fade" id="modalnone" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Data gaji masih kosong, silakan input absensi terlebih dahulu pada bulan dan tahun yang anda pilih.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>