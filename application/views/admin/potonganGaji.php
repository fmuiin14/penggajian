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
									<input type="text" name="table_search" class="form-control float-right" placeholder="Search">

									<div class="input-group-append">
										<button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
									</div>
								</div>
							</div>
							<a class="btn btn-primary mb-2" href="<?= base_url('admin/potonganGaji/tambahData') ?>"><i class="fas fa-plus"></i> Tambah Data</a>

							<?= $this->session->flashdata('pesan') ?>

						</div>



						<!-- /.card-header -->
						<div class="card-body table-responsive p-0">
							<table class="table table-hover text-nowrap">
								<thead>
									<tr>
										<th>No</th>
										<th>Jenis Potongan</th>
										<th>Jumlah Potongan</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($potongan_gaji as $pot) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $pot->potongan ?></td>
											<td><?= $pot->jml_potongan ?></td>
											<td>
												<center>
													<a class="btn btn-sm btn-primary" href="<?= base_url('admin/potonganGaji/updateData/' . $pot->id) ?>">
														<i class="fas fa-edit"></i> </a>
													<a onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/potonganGaji/deleteData/' . $pot->id) ?>">
														<i class="fas fa-trash"></i> </a>
												</center>
											</td>
										</tr>
									<?php } ?>
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