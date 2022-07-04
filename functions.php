<?php
//koneksi ke database
$conn = mysqli_connect("localhost","root", "", "cepatsaji");
if(mysqli_connect_errno()){
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function hapus_menu($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM menu WHERE kode_menu = $id");

    return mysqli_affected_rows($conn);
    
}

function hapus_pembeli($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM pembeli WHERE id_pembeli = $id");

    return mysqli_affected_rows($conn);
    
}

function hapus_petugas($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM petugas WHERE id_petugas = $id");

    return mysqli_affected_rows($conn);
    
}

function hapus_reservasi($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM reservasi WHERE id_reservasi = $id");

    return mysqli_affected_rows($conn);
    
}

function ubahReservasi($data) {
    global $conn;

    //ambil data 
    $id_reservasi = $data["id_reservasi"];
    $nama_pembeli = $data["nama_pembeli"];
    $kontak = $data["kontak"];
    $nama_menu = $data["nama_menu"];
    $tambahan = implode(",", $data['tambahan']);
    $paket_reservasi = $_POST["paket_reservasi"];
    date_default_timezone_set("Asia/Jakarta");
    $tgl_reservasi = $data["tgl_reservasi"];
    $keterangan_tambahan = $data["keterangan_tambahan"];
    $nama_menulama = $data["nama_menulama"];

    //cek apakah user update menu
    if(!isset($_POST['nama_menu'])) {
        $nama_menu = $nama_menulama;
    } else {
        $nama_menu = $_POST["nama_menu"];
    }

    $imagelama = $data["imagelama"];

    //cek apakah user upload gambar baru
    if($_FILES['image']['error'] == 4) {
        $image = $imagelama;
    } else {
        $image = upload();
    }

    //query insert data
    $query = "UPDATE reservasi SET
                id_reservasi = '$id_reservasi',
                nama_pembeli = '$nama_pembeli',
                kontak = '$kontak',
                nama_menu = '$nama_menu',
                image = '$image',
                tambahan = '$tambahan',
                paket_reservasi = '$paket_reservasi',
                tgl_reservasi = '$tgl_reservasi',
                keterangan_tambahan = '$keterangan_tambahan'
            WHERE id_reservasi = $id_reservasi
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn); 
}

function upload(){
    $namafile = $_FILES['image']['name'];
    $ukuranfile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpname = $_FILES['image']['tmp_name'];

    //cek apakah gambar tidak ada yang diupload
    if($error == 4) {
        echo "
            <script>
                alert('pilih gambar terlebih dahulu!');
            </script>
        ";
        return false;
    }

    //cek apakah yang diupload gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('yang anda upload bukan gambar!');
            </script>
        ";
        return false;
    }

    //cek jika ukuran terlalu besar
    if($ukuranfile > 1000000) {
        echo "
            <script>
                alert('ukuran gambar terlalu besar!');
            </script>
        ";
        return false;
    }

    //lolos pengecekan, gambar siap upload
    move_uploaded_file($tmpname, 'uploads/' . $namafile);

    return $namafile;

}

?>