<?php
require_once 'libs.php';

$nominal = query('SELECT * FROM laporan_keuangan');
// var_dump($nominal); 
// echo "<br><br>";
// var_dump(date("d-m-Y"));

$totalData = sumTotal();
var_dump($totalData);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan Sederhana</title>
</head>
<body>
    <a href="">Print CSV</a>

    <h1>Riwayat Penggunaan Keuangan</h1>
    <a href="tambah.php">Tambah Pencatatan</a>

    <!-- table content -->
    <table border="1" cell>
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Debit</th>
            <th>Kredit</th>
            <th>Saldo</th>
        </tr>

        <!-- data load looping -->
        <?php $i = 1; ?>
        <?php foreach($nominal as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> | 
                    <a href="hapus.php?id=<?= $row["id"]; ?> ">hapus</a>
                </td>
                <td><?= $row["tanggal"]; ?></td>
                <td><?= $row["keterangan"]; ?></td>
                <td>Rp. <?= $row["debit"]; ?></td>
                <td>Rp. <?= $row["kredit"]; ?></td>
                <td>Rp. <?= $row["saldo"]; ?></td>
            </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
        <!-- data load looping end -->

        <!-- total data -->
        <tr>
            <td colspan="4">Total</td>
            <td>Rp. <?= $totalData["totalDebit"]; ?></td>
            <td>Rp. <?= $totalData["totalKredit"]; ?></td>
            <td>Rp. <?= $totalData["totalSaldo"]; ?></td>
        </tr>
        <!-- total data end -->
    </table>
    <!-- table content end -->
</body>
</html>