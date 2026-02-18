<?php

$saldo = 10000;
$debit = 3000;
$kredit = 5000;

$total = jumlah($saldo, $debit, $kredit);



function jumlah($saldo, $debit, $kredit) {
    $total = $saldo;
    echo "sebelum dijumlahkan:  $total";
    echo "<br><br>";

    $total = $saldo + $debit - $kredit;

    echo "setelah dijumlahkan:  $total";
    return $total;
}

?>