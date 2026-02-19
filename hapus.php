<?php

require_once 'libs.php';

$id = $_GET["id"];

if(hapus($id) > 0) {
    echo "
        <script>
            alert('data riwayat telah dihapus!');
            document.location.href = 'index.php';
        </script>"
        ;
    } else {
    echo "
        <script>
            alert('data riwayat gagal dihapus!');
            document.location.href = 'index.php';
        </script>";
}
?>