<?php
require 'functions.php';

$kode_menu = $_GET["id"];

if(hapus_menu($kode_menu) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'daftar_menu.php';
        </script>
    ";
} else {
    echo "
    <script>
        alert('data gagal dihapus!');
        document.location.href = 'daftar_menu.php';
    </script>
";
}

?>