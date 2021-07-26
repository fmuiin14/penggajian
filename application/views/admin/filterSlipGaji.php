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
                    <div class="card mx-auto" style="width:80%">
                        <div class="card-header bg-primary text-white text-center">
                            Filter Slip Gaji Pegawai
                        </div>

                        <form method="POST" action="<?= base_url('admin/SlipGaji/cetakSlipGaji') ?>">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="bulan" class="col-sm-4 col-form-label">Bulan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="bulan">
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
                                </div>

                                <div class="form-group row">
                                    <label for="tahun" class="col-sm-4 col-form-label">Tahun</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="tahun">
                                            <option value="" selected disabled>--Pilih Tahun--</option>
                                            <?php $tahun = date('Y');
                                            for ($i = $tahun; $i < $tahun + 5; $i++) {
                                            ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tahun" class="col-sm-4 col-form-label">Nama Karyawan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="nama_pegawai">
                                            <option value="" selected disabled>--Pilih Pegawai--</option>
                                            <?php foreach ($pegawai as $p) { ?>
                                                <option value="<?= $p->nama_pegawai ?>"><?= $p->nama_pegawai ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>

                                <button style="width:100%" type="submit" class="btn btn-primary">Cetak Laporan Gaji</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>