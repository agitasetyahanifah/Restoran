<?php
require 'functions.php';

$id_reservasi = $_GET["id"];

if(hapus_reservasi($id_reservasi) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'daftar_reservasi.php';
        </script>
    ";
} else {
    echo "
    <script>
        alert('data gagal dihapus!');
        document.location.href = 'daftar_reservasi.php';
    </script>
";
}

?>