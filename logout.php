<?php
session_start();
session_destroy();
// mysqli_close($conn);
echo "<script>alert ('Anda Berhasil Logout...');</script>";
echo "<script>location='./';</script>";
// echo "<script>location.reload()</script>";
