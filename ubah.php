<?php

require_once 'libs.php';

// ambil data di URL
$id = $_GET["id"];

$data = query("SELECT * FROM laporan_keuangan WHERE id = $id")[0];

$totalData = sumTotal();
var_dump($totalData);
echo "<br><br>";

if(isset($_POST["submit"])) {
    // var_dump($_POST);
    // echo "<br><br>";
    
    if(ubah($_POST) > 0) {
        echo "
            <script>
                alert('data riwayat telah diubah!');
                document.location.href = 'index.php';
            </script>"
        ;
    } else {
        echo "
            <script>
                alert('data riwayat gagal diubah!');
                document.location.href = 'index.php';
            </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Laporan</title>
</head>
<body>
    <h1>Ubah Data Laporan</h1>

    <form action="" method="POST">
        <input type="hidden" name="id" id="id" value="<?= $data["id"]; ?>">
        <input type="hidden" name="saldo" id="saldo" value="<?= $totalData["totalSaldo"]; ?>">
        <ul>           
            <li>
                <label for="keterangan">Keterangan: </label>
                <input type="text" name="keterangan" id="keterangan" value="<?= $data["keterangan"]; ?>">
            </li>

            <li>
                <label for="debit">Debit: Rp.</label>
                <input type="number" name="debit" id="debit" value="<?= $data["debit"]; ?>">
            </li>

            <li>
                <label for="kredit">Kredit: Rp.</label>
                <input type="number" name="kredit" id="kredit" value="<?= $data["kredit"]; ?>">
            </li>

            <li>
                <label for="saldo">Sisa Saldo: Rp.</label>
                <input type="number" name="saldo" id="saldo" value="<?= $totalData["totalSaldo"]; ?>">
            </li>

            <li>
                <button type="submit" name="submit" id="submit">Update!</button>
            </li>
        </ul>
    </form>
</body>
</html>