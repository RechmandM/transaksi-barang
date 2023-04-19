


<?php

$database = "db_penjualan";
// $servername = "localhost";
$hostname = "localhost";
$password = "";
$username = "root";
$port = 3306;
$conn = mysqli_connect($hostname, $username, $password, $database, $port);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
// echo "Koneksi Berhasil";
usleep(500000);
// $conn = null;
// mysqli_close($conn)

?>
