<?php
ob_start();
//koneksi database
include './config/koneksi.php';

// menangkap data id yang dikirim dari url
$id = $_GET['id'];

//menghapus data dari database
mysqli_query($conn, "DELETE from transaksi_h where id_transaksi='$id'");

//mengalihkan halaman kembali ke index.php
echo "<script>window.location = '?mi=data4'</script>";
