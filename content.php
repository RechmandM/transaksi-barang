<?php
if (isset($_GET['mi'])) {
    $page = $_GET['mi'];
    $tam = "cek";
    // bisa pakai variable atau langsung $_GET['mi']
    switch ($page) {
            // case 'login':
            //     include "login.php";
            //     break;
        case 'formbarang':
            include "form_barang.php";
            break;
        case 'data':
            include "data.php";
            break;
        case 'data_supp':
            include "data_supp.php";
            break;
        case 'data_cust':
            include "data_cust.php";
            break;
        case 'edit_barang':
            include "edit_barang.php";
            break;
        case 'hapus_barang':
            include "hapus_barang.php";
            break;
        case 'formsuplier':
            include "form_suplier.php";
            break;
        case 'edit_suplier':
            include "edit_suplier.php";
            break;
        case 'hapus_suplier':
            include "hapus_suplier.php";
            break;
        case 'formcust':
            include "form_cust.php";
            break;
        case 'edit_cust':
            include "edit_cust.php";
            break;
        case 'del_cust':
            include "hapus_cust.php";
            break;
        case 'data_transaksi':
            include "data_transaksi.php";
            break;
        case 'form_data_transaksi':
            include "form_data_transaksi.php";
            break;
        case 'edit_trans':
            include "edit_transaksi.php";
            break;
        case 'edit_trans_reload_d':
            include "edit_transaksi_reload_d.php";
            break;
        case 'hapus_trans':
            include "hapus_transaksi.php";
            break;
        case 'hapus_trans_d':
            include "hapus_transaksi_d.php";
            break;
        case 'h-d':
            include "h-d.php";
            break;
        case 'h-h':
            include "h-h.php";
            break;
        case 'hf':
            include "hf.php";
            break;
        case 'he':
            include "h-e.php";
            break;
        case 'ha':
            include "h-data.php";
            break;
        default:
            include "dashboard.php";
            break;
    }
} else {
    include "dashboard.php";
}
?>

<!-- jika pure php script diatas tnpa tutup boleh
jika ada html diatas / comment diatas bawah tpi pakai tutup
saran tanpa tutup biar aman -->