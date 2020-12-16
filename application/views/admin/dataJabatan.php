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
			<!-- /.row -->
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">

							<div class="card-tools">
								<div class="input-group input-group-sm" style="width: 150px;">
									<input type="text" name="table_search" class="form-control float-right"
										placeholder="Search">

									<div class="input-group-append">
										<button type="submit" class="btn btn-default"><i
												class="fas fa-search"></i></button>
									</div>
								</div>
							</div>
							<a class="btn btn-primary mb-2" href="<?= base_url('admin/dataJabatan/tambahData') ?>"><i class="fas fa-plus"></i> Tambah Data</a>

							<?= $this->session->flashdata('pesan') ?>

						</div>



						<!-- /.card-header -->
						<div class="card-body table-responsive p-0">
							<table class="table table-hover text-nowrap">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama Jabatan</th>
										<th class="text-center">Gaji Pokok</th>
										<th class="text-center">Tj. Transport</th>
										<th class="text-center">Uang Makan</th>
										<th class="text-center">Total</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach($jabatan as $jabata) : ?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $jabata->nama_jabatan; ?></td>
										<td>Rp <?= number_format($jabata->gaji_pokok, 0, ',', '.'); ?></td>
										<td>Rp <?= number_format($jabata->tj_transport, 0, ',', '.'); ?></span></td>
										<td>Rp <?= number_format($jabata->uang_makan, 0, ',', '.'); ?></td>
										<td>Rp
											<?= number_format($jabata->gaji_pokok + $jabata->uang_makan + $jabata->tj_transport, 0, ',', '.'); ?>
										</td>
										<td>
											<center>
												<a class="btn btn-sm btn-primary"
													href="<?= base_url('admin/dataJabatan/updateData/'.$jabata->id_jabatan) ?>">
													<i class="fas fa-edit"></i> </a>
												<a onclick="return confirm('Yakin hapus?')"
													class="btn btn-sm btn-danger"
													href="<?= base_url('admin/dataJabatan/deleteData/'.$jabata->id_jabatan) ?>">
													<i class="fas fa-trash"></i> </a>
											</center>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</section>


</div>
