<?php

$id = $_GET['id'];
mysqli_query($conn, "DELETE from transaksi_h where id_trans='$id'");

header("location:?mi=data_transaksi"); 