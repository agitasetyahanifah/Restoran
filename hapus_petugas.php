<?php
require 'functions.php';

$id_petugas = $_GET["id"];

if(hapus_petugas($id_petugas) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'data_petugas.php';
        </script>
    ";
} else {
    echo "
    <script>
        alert('data gagal dihapus!');
        document.location.href = 'data_petugas.php';
    </script>
";
}

?>