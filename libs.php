<?php 

// koneksi ke db
$conn = mysqli_connect("localhost", "root", "", "project_keuangan");

function query($query) {
    global $conn;
    
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;

    $tanggal = date("d-m-Y");
    $keterangan = htmlspecialchars($data["keterangan"]);
    $debit = htmlspecialchars($data["debit"]);
    $kredit = htmlspecialchars($data["kredit"]);
    $saldo = htmlspecialchars($data["saldo"]);

    // query insert data
    $query = "INSERT INTO laporan_keuangan (tanggal, keterangan, debit, kredit, saldo)
                VALUES
                ('$tanggal', '$keterangan', $debit, $kredit, $saldo)";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// function total() {
//     global $conn;

//     $query = "SUM(debit)"
// }
?>