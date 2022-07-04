<?php
session_start();
if (isset($_GET["logout"])) {
    // hapus sessionnya
    session_destroy();
    header("location:login.php");
  }
$username = $_POST["username"];  
$password = $_POST["password"]; 

require("koneksi.php");
$data = mysqli_query($koneksi, "select * from petugas where
        username='$username' and password='$password' ");
if(mysqli_num_rows($data)==1){
    $d = mysqli_fetch_array($data);
    //deklarasi session 
    $_SESSION["username"] = $username;
} else {
    echo "username dan password tidak ditemukan <br>";
    echo "<a href=login.php>Login</a>";
    exit;
}
require("data_petugas.php"); 
 ?>