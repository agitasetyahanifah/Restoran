<?php
require 'functions.php';

$id_pembeli = $_GET["id"];

if(hapus_pembeli($id_pembeli) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'data_pembeli.php';
        </script>
    ";
} else {
    echo "
    <script>
        alert('data gagal dihapus!');
        document.location.href = 'data_pembeli.php';
    </script>
";
}

?>