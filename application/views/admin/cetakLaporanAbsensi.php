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
            Laporan Kehadiran Pegawai
        </h2>

        <?php
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
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
                    <td class="text-center">Nama Pegawai</td>
                    <td class="text-center">NIK</td>
                    <td class="text-center">Jabatan</td>
                    <td class="text-center">Hadir</td>
                    <td class="text-center">Sakit</td>
                    <td class="text-center">Alpha</td>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($lap_kehadiran as $ga) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $ga->nama_pegawai ?></td>
                        <td><?= $ga->nik ?></td>
                        <td><?= $ga->nama_jabatan ?></td>
                        <td><?= $ga->hadir ?></td>
                        <td><?= $ga->sakit ?></td>
                        <td><?= $ga->alpa ?></td>
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