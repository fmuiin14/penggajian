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

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="col-md-8">
				<div class="alert alert-info text-center" role="alert">
					<p>Selamat Datang, Nama!</p>
				</div>

				<div class="card">
					<div class="card-header font-weight-bold bg-primary text-white">
						Data Pegawai
					</div>
					<?php foreach ($pegawai as $p) { ?>
						<div class="card-body">
							<div class="row">
								<div class="col-md-5">
									<img src="<?= base_url('assets/photo/' . $p->photo) ?>" class="img-fluid">
								</div>
								<div class="col-md-7">
									<table class="table">
										<tr>
											<td>Nama Pegawai</td>
											<td>:</td>
											<td><?= $p->nama_pegawai ?></td>
										</tr>
										<tr>
											<td>Jabatan</td>
											<td>:</td>
											<td><?= $p->jabatan ?></td>
										</tr>
										<tr>
											<td>Tanggal Masuk</td>
											<td>:</td>
											<td><?= $p->tanggal_masuk ?></td>
										</tr>
										<tr>
											<td>Status</td>
											<td>:</td>
											<td><?= $p->status ?></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /.row -->
</div><!-- /.container-fluid -->


</section>
<!-- /.content -->
</div>