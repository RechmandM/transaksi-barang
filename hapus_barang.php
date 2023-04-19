<?php
// Kondisi Database
// include "./config/koneksi.php"; >>> tidak hrus

// Menangkap data id yang di kirim dari url
$id = $_GET['id'];

// menghapus data dari database

mysqli_query($conn, "DELETE from barang where kd_barang='$id'");
header("location:?mi=data"); 
// Mengalihhkan halaman kembali ke index.php
// echo "<script>location.reload()</script>";
