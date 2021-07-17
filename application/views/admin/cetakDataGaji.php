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
        <h1>
            PT MUMU CERDAS PERKASA
        </h1>
        <h2>
            Daftar Gaji Pegawai
        </h2>

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

        <table>
            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?= $bulan ?></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?= $tahun ?></td>
            </tr>
        </table>

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
                foreach ($cetakGaji as $ga) { ?>
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

        <table width="100%">
            <tr>
                <td></td>
                <td width="200px">
                    <p>Jakarta, <?= date("d M Y") ?><br> Finance</p>
                    <br><br>
                    <p>______________</p>
                </td>
            </tr>
        </table>


    </center>

</body>

</html>

<script>
    window.print();
</script>