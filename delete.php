<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$id_mhs = $_GET['id_mhs'];
// query SQL untuk insert data
$query = "DELETE FROM mahasiswa WHERE id_mhs='$id_mhs'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:index.php");
?>
