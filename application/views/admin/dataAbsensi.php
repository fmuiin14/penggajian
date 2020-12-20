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
							<h3 class="card-title">Filter Data Absensi Pegawai</h3>
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
                                        for($i=2020;$i<$tahun+5;$i++) {
                                        ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    </select>
								</div>
								
								<button type="submit" class="btn btn-primary mb-2 mr-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
                                
                                <a href="#" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Input Kehadiran</a>
							</form>

						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
            </div>

            <?php
                if((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
                    $bulan = $_GET['bulan'];
                    $tahun = $_GET['tahun'];
                    $bulantahun = $bulan.$tahun;
                } else {
                    $bulan = date('F');
                    $tahun = date('Y');
                    $bulantahun = $bulan.$tahun;
                }
            ?>
            <div class="alert alert-info">
                Menampilkan Data Kehadiran Pegawai Bulan : <span class="font-weight-bold"><?= $bulan ?></span> Tahun : <span class="font-weight-bold"><?= $tahun ?></span>
            </div>
            

		</div>
	</section>

</div>
