<?php
require 'functions.php';

//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])) {
    //ambil data
    $nama_menu = $_POST["nama_menu"];
    $keterangan = $_POST["keterangan"];

    //upload gambar
    $image = upload();
    if(!$image) {
        return false;
    }

    //query insert data
    $query = "INSERT INTO menu VALUES ('','$nama_menu','$keterangan','$image')";
    mysqli_query($conn, $query);


    //cek apakah data berhasil ditambahkan atau tidak
    if(mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'daftar_menu.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'daftar_menu.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>The Galaxy</title>
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            <div class="content-wrapper">
                <div class="content">
                    <div class="header">
                        <h5 class="title">Form Menu</h5>
                    </div>
                    <div class="body">
                    <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama_menu" class="col-form-label">Menu</label>
                                <input type="text" name="nama_menu" class="form-control" id="nama_menu" placeholder="Nama Menu">
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-form-label">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan Menu">
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="image" placeholder="Image Menu">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-md btn-success">Simpan</button>
                                <a href="daftar_menu.php">
                                    <button type="button" class="btn btn-md btn-light">Batal</button>
                                </a>
                            </div>
                        </form>
                    </div>     
                </div>      
            </div>
        </div>
    </div>
</body>
</html>