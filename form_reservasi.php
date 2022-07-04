<?php 
require 'functions.php';

//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])) {

    //ambil data 
    $nama_pembeli = $_POST["nama_pembeli"];
    $kontak = $_POST["kontak"];
    $nama_menu = $_POST["nama_menu"];
    $tambahan = implode(",", $_POST['tambahan']);
    $paket_reservasi = $_POST["paket_reservasi"];
    date_default_timezone_set("Asia/Jakarta");
    $tgl_reservasi = $_POST["tgl_reservasi"];
    $keterangan_tambahan = $_POST["keterangan_tambahan"];

    //upload gambar
    $image = upload();
    if(!$image) {
        return false;
    }

    //query insert data
    $query = "INSERT INTO reservasi
            VALUES
            (' ','$nama_pembeli','$kontak','$nama_menu','$image','".$tambahan."','$paket_reservasi', '$tgl_reservasi', '$keterangan_tambahan')
            ";
    mysqli_query($conn, $query);

    //cek data apakah berhasil ditambahkan atau tidak 
    if(mysqli_affected_rows($conn) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href='daftar_reservasi.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href='data_reservasi.php';
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
                        <h5 class="title">Form Reservasi</h5>
                    </div>
                    <div class="body">
                    <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama_pembeli" class="col-form-label">Nama Pelanggan</label>
                                <input type="text" name="nama_pembeli" class="form-control" id="nama_pembeli" placeholder="Nama Pelanggan">
                            </div>
                            <div class="form-group">
                                <label for="kontak" class="col-form-label">Kontak</label>
                                <input type="number" name="kontak" class="form-control" id="kontak" placeholder="Kontak Pelanggan">
                            </div>
                            <div class="form-group">
                                <label for="nama_menu" class="col-form-label">Menu</label>
                                <select name="nama_menu" id="nama_menu" class="form-control">
                                <option disabled selected>Pilih Menu Pesanan</option>
                                <?php
                                $a = "select * from menu order by nama_menu asc";
                                $sql = mysqli_query($conn, $a);
                                while ($data=mysqli_fetch_array($sql)) {
                                ?>
                                <option value="<?=$data['nama_menu']?>"><?=$data['nama_menu']?></option>
                                <?php
                                } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label">Upload Gambar</label>
                                <input type="file" name="image" class="form-control" id="image" placeholder="Image Menu">
                            </div>
                            <div class="form-group">
                                <label for="tambahan" class="col-form-label">Menu Tambahan</label><br>
                                <label>Camilan</label><input type="checkbox" name="tambahan[]" class="form-control" id="tambahan1" value="Camilan">
                                <label>Buah</label><input type="checkbox" name="tambahan[]" class="form-control" id="tambahan2" value="Buah">
                                <label>Ice Cream</label><input type="checkbox" name="tambahan[]" class="form-control" id="tambahan3" value="Ice Cream">
                                <label>Pudding</label><input type="checkbox" name="tambahan[]" class="form-control" id="tambahan4" value="Pudding">
                                <label>Buah</label><input type="checkbox" name="tambahan[]" class="form-control" id="tambahan5" value="Es Buah">
                            </div>
                            <div class="form-group">
                                <label for="paket_reservasi">Paket Reservasi</label>
                                <input type="radio" name="paket_reservasi" class="form-control" id="paket_reservasi1" value="Paket 25 Orang">
                                    <label for="paket_reservasi1">Paket 25 Orang</label><br>
                                <input type="radio" name="paket_reservasi" class="form-control" id="paket_reservasi2" value="Paket 50 Orang">
                                    <label for="paket_reservasi2">Paket 50 Orang</label><br>
                                <input type="radio" name="paket_reservasi" class="form-control" id="paket_reservasi3" value="Paket 100 Orang">
                                    <label for="paket_reservasi3">Paket 100 Orang</label><br>
                                <input type="radio" name="paket_reservasi" class="form-control" id="paket_reservasi4" value="Paket 200 Orang">
                                    <label for="paket_reservasi4">Paket 200 Orang</label><br>
                                <input type="radio" name="paket_reservasi" class="form-control" id="paket_reservasi5" value="Paket 500 Orang">
                                    <label for="paket_reservasi5">Paket 500 Orang</label><br>
                            </div>
                            <div class="form-group">
                                <label for="tgl_reservasi" class="col-form-label">Tanggal Reservasi</label>
                                <input type="date" name="tgl_reservasi" class="form-control" id="tgl_reservasi">
                            </div>
                            <div class="form-group">
                                <label for="keterangan_tambahan" class="col-form-label">Keterangan Tambahan</label>
                                <textarea rows="5" name="keterangan_tambahan" class="form-control" id="keterangan_tambahan" placeholder="Masukkan Keterangan Tambahan"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-md btn-success">Simpan</button>
                                <a href="daftar_reservasi.php">
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