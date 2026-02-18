<?php
require_once 'libs.php';

$nominal = query('SELECT * FROM laporan_keuangan');
var_dump($nominal); 
echo "<br><br>";
var_dump(date("d-m-Y"));

$totalSaldo = sumSaldo();
$totalDebit = sumDebit();
$totalKredit = sumKredit();

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
        <?php foreach($nominal as $row) : ?>
            <tr>
                <td>1</td>
                <td><a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> | 
                <a href="hapus.php?id=<?= $row["id"]; ?> ">hapus</a></td>
                <td><?= $row["tanggal"]; ?></td>
                <td><?= $row["keterangan"]; ?></td>
                <td><?= $row["debit"]; ?></td>
                <td><?= $row["kredit"]; ?></td>
                <td><?= $row["saldo"]; ?></td>
            </tr>
        <?php endforeach; ?>
        <!-- data load looping end -->

        <!-- total data -->
        <tr>
            <td colspan="4">Total</td>
            <td><?= $totalDebit["total"]; ?></td>
            <td><?= $totalKredit["total"]; ?></td>
            <td><?= $totalSaldo["total"]; ?></td>
        </tr>
        <!-- total data end -->
    </table>
    <!-- table content end -->
</body>
</html>