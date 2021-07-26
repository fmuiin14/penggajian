<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: black;
        }
    </style>
</head>

<body>

    <center>
        <h1>PT MUMU CERDAS PERKASA</h1>
        <h2>Slip Gaji Pegawai</h2>
        <hr style="width:50%;">
    </center>

<?php foreach ($potongan as $p) { 
    $potongan = $p->jml_potongan;
     } ?>

    <?php
    foreach ($print_slip as $ps) { ?>
    <?php $potongan_gaji = $ps->alpa*$potongan; ?>
        <table style="width: 100%;">
            <tr>
                <td width="20%">Nama Pegawai</td>
                <td width="2%">:</td>
                <td><?= $ps->nama_pegawai ?></td>
            </tr>

            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?= $ps->nik ?></td>
            </tr>

            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?= $ps->nama_jabatan ?></td>
            </tr>

            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?= substr($ps->bulan, 0,2) ?></td>
            </tr>

            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?= substr($ps->bulan, 2,5) ?></td>
            </tr>
        </table>

        <table class="table table-striped table-bordered mt-3">
            <tr>
                <th>No</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Gaji Pokok</td>
                <td><?= $ps->gaji_pokok ?></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Tunjangan Transportasi</td>
                <td><?= $ps->tj_transport ?></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Uang Makan</td>
                <td><?= $ps->uang_makan ?></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Potongan</td>
                <td><?= $potongan_gaji ?></td>
            </tr>
            <tr>
                <td colspan="2">Total Gaji</td>
                <td><?= $ps->gaji_pokok+$ps->tj_transport+$ps->uang_makan-$potongan_gaji ?></td>
            </tr>
        </table>

        <table width="100%">
            <tr>
                <td></td>
                <td>
                    <p>Pegawai</p>
                    <br>
                    <br>
                    <p class="font-weight-bold"><?= $ps->nama_pegawai ?></p>
                </td>

                <td width="200px">
                    <p>Jakarta, <?= date("d M Y") ?> Finance,</p>
                    <br>
                    <br>
                    <p>_____________</p>
                </td>
            </tr>
        </table>
    <?php } ?>

</body>

</html>

<script>
    window.print();
</script>