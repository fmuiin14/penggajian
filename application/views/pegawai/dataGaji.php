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

            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <td class="text-center">Bulan/Tahun</td>
                        <td class="text-center">Gaji Pokok</td>
                        <td class="text-center">Tj. Transportasi</td>
                        <td class="text-center">Uang Makan</td>
                        <td class="text-center">Potongan</td>
                        <td class="text-center">Total Gaji</td>
                        <td class="text-center">Cetak Slip</td>
                    </tr>
                </thead>

                <?php foreach ($potongan as $p) { ?>
                    <input type="hidden" value="<?= $potongan = $p->jml_potongan ?>">
                <?php } ?>

                <tbody>
                    <?php foreach ($gaji as $g) { ?>
                        <?php $pot_gaji = $g->alpa * $potongan ?>
                        <tr>
                            <td><?= $g->bulan ?></td>
                            <td><?= $g->gaji_pokok ?></td>
                            <td><?= $g->tj_transport ?></td>
                            <td><?= $g->uang_makan ?></td>
                            <td><?= $pot_gaji ?></td>
                            <td><?= $g->gaji_pokok + $g->tj_transport + $g->uang_makan - $pot_gaji ?></td>
                            <td><a href="<?= base_url('pegawai/dataGaji/cetakSlip/'.$g->id_kehadiran) ?>" class="btn btn-sm btn-primary">Cetak</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </section>

</div>