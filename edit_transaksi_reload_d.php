<?php
// Kondisi Database
// include "./config/koneksi.php"; >>> tidak hrus

// menangkap data id yang dikirim dari url
$id = $_GET['id'];
//mengalihkan halaman kembali ke index.php
header("location:?mi=edit_trans&id=$id&detail_id=0");

