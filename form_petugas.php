<?php
require 'functions.php';

//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])) {
    //ambil data
    $username = $_POST["username"];
    $password = $_POST["password"];

    //query insert data
    $query = "INSERT INTO petugas VALUES ('','$username','$password')";
    mysqli_query($conn, $query);


    //cek apakah data berhasil ditambahkan atau tidak
    if(mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'data_petugas.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'data_petugas.php';
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
                        <h5 class="title">Form Petugas</h5>
                    </div>
                    <div class="body">
                    <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username" class="col-form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">Password</label>
                                <input type="number" name="password" class="form-control" id="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-md btn-success">Simpan</button>
                                <a href="data_petugas.php">
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