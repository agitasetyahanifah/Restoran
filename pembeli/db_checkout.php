<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","cepatsaji");
if (isset($_GET["checkout"])) {
  $id_co = $_GET["id_co"];
  $sql = "select * from detail_co where id_co='$id_co'";
  $result = mysqli_query($koneksi,$sql);
  $hasil = mysqli_fetch_array($result);
  if (!in_array($hasil, $_SESSION["session_checkout"])) {
    array_push($_SESSION["session_checkout"],$hasil);
  }
  header("location:template_pembeli.php?page=menu_pembeli");
}

if (isset($_GET["checkout"])) {
  $koneksi = mysqli_connect("localhost","root","","cepatsaji");
  //kita siapkan data untuk tabel checkout
  $id_co = $_POST["id_co"];
  $kode_menu = $_POST["kode_menu"];
  $jml = $_POST["jml"];
  $sql = "insert into detail_co values ('','$kode_menu', '$jml')";
  mysqli_query($koneksi,$sql);

  //menampilkan data checkout
  $tampil = "select menu.nama_menu, detail_co.jml, menu.keterangan, menu.image where menu.kode_menu = detail_co.kode_menu";
  mysqli_query($koneksi,$tampil);

}

if (isset($_GET["hapus"])) {
  $id = $_GET["kode_buku"];
  $index = array_search($kode_buku, array_column($_SESSION["session_pinjam"], "kode_buku"));
  array_splice($_SESSION["session_pinjam"],$index,1);
  header("location:template_siswa.php?page=list_pinjam");
}

?>
