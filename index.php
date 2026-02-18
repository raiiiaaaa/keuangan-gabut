<?php
require_once ('libs.php');

$nominal = query('SELECT * FROM laporan_keuangan');
var_dump($nominal); 
echo "<br><br>";
var_dump(date("d-m-Y"));

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

        <?php foreach($nominal as $row) : ?>
            <tr>
                <td>1</td>
                <td><a href="">ubah</a> | <a href="">hapus</a></td>
                <td><?= $row["tanggal"]; ?></td>
                <td><?= $row["keterangan"]; ?></td>
                <td><?= $row["debit"]; ?></td>
                <td><?= $row["kredit"]; ?></td>
                <td><?= $row["saldo"]; ?></td>
            </tr>
        <?php endforeach; ?>

        <tr>
            <td colspan="4">Total</td>
            <td>total Debit</td>
            <td>total Kredit</td>
            <td>total Saldo</td>
        </tr>
    </table>
</body>
</html>