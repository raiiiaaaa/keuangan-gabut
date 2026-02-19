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

    $tanggal = date("Y-m-d");
    $keterangan = htmlspecialchars($data["keterangan"]);
    $debit = $data["debit"];
    $kredit = $data["kredit"];
    $saldo = $data["saldo"] + $debit - $kredit;

    // $saldo = htmlspecialchars($data["saldo"]);

    // query insert data
    $query = "INSERT INTO laporan_keuangan (tanggal, keterangan, debit, kredit, saldo)
                VALUES
                ('$tanggal', '$keterangan', $debit, $kredit, $saldo)";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    $query = "DELETE FROM laporan_keuangan WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// OPERASI TOTAL SUM


function sumSaldo() {
    global $conn;

    $query = "SELECT SUM(saldo) AS total FROM laporan_keuangan";
    $result = mysqli_query($conn, $query);

    return mysqli_fetch_assoc($result);
}

function sumDebit() {
    global $conn;

    $query = "SELECT SUM(debit) as total FROM laporan_keuangan";
    $result = mysqli_query($conn, $query);

    return mysqli_fetch_assoc($result);
}

function sumKredit() {
    global $conn;

    $query = "SELECT SUM(kredit) as total FROM laporan_keuangan";
    $result = mysqli_query($conn, $query);

    return mysqli_fetch_assoc($result);
}

function setTotal() {
    global $conn;
}

function sumTotal() {
    global $conn;

    $query = "SELECT SUM(debit) AS totalDebit,
                SUM(kredit) AS totalKredit,
                SUM(saldo) AS totalSaldo
                FROM laporan_keuangan";

    $result = mysqli_query($conn, $query);

        return mysqli_fetch_assoc($result);
}

function ubah($data) {
    global $conn;

    var_dump($data);
    $id = $data["id"];
    $keterangan = $data["keterangan"];
    $debit = $data["debit"];
    $kredit = $data["kredit"];
    $saldo = $data["saldo"] + $debit - $kredit;

    $query = "UPDATE laporan_keuangan SET
                keterangan = '$keterangan',
                debit = $debit,
                kredit = $kredit,
                saldo = $saldo
                WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>