<?php
require('koneksi.php');

    $nama_pembeli = $_POST["nama_pembeli"];
    $kontak = $_POST["kontak"];
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 

    
    $sql = mysqli_query($koneksi, "INSERT INTO pembeli (nama_pembeli, kontak, username, password) 
    VALUES ('$nama_pembeli', '$kontak', '$username', '$password');");
    
    if($sql==1) {
        header("location:login-pembeli.php");
    } else {
        echo "Error: " . $hasil . "<br>" . mysqli_error($conn);
    }

?>