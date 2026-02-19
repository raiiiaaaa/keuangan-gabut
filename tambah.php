<?php

require_once 'libs.php';

echo date('Y-m-d');
echo "<br><br><br>";

// $result = mysqli_fetch_assoc($nominalSaldo);
$totalData = sumTotal();

var_dump($totalData);
echo "<br><br>";

if(isset($_POST["submit"])) {

    if(tambah($_POST) > 0) {
        echo "
            <script>
                alert('data riwayat telah ditambahkan!');
                document.location.href = 'index.php';
            </script>"
        ;
    } else {
        echo "
            <script>
                alert('data riwayat gagal ditambahkan!');
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
    <title>Tambah Riwayat Keuangan</title>
</head>
<body>
    <h1>Tambah Riwayat Keuangan</h1>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="keterangan">Keterangan: </label>
                <input type="text" name="keterangan" id="keterangan" autocomplete="off">
            </li>

            <li>
                <label for="debit">Debit: Rp.</label>
                <input type="number" name="debit" id="debit">
            </li>

            <li>
                <label for="kredit">Kredit: Rp.</label>
                <input type="number" name="kredit" id="kredit">
            </li>

            <li>
                <label for="saldo">Sisa Saldo: Rp.</label>
                <input type="number" name="saldo" id="saldo" value="<?= $totalData["totalSaldo"] ?>" readonly>
            </li>

            <li>
                <button type="submit" name="submit" id="submit">Kirim</button>
            </li>
        </ul>
    </form>
</body>
</html>