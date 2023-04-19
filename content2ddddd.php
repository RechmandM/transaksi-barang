<?php 
if (isset($_GET['mi'])) {
    $page = $_GET['mi'];

    switch ($page) {
        case 'data':
            include "databarang.php";
            break;
        case 'form':
            include "form.php";
            break;
        case 'data2':
            include "datasupp.php";
            break;
        case 'data3':
            include "datacust.php";
            break;
        case 'data4':
            include "datatrans.php";
            break;
        case 'formbarang':
            include "formbarang.php";
            break;
        case 'formsupp':
            include "formsupp.php";
            break;
        case 'formcust':
            include "formcust.php";
            break;
        case 'formtrans':
            include "formtrans.php";
            break;
        case 'edit_barang':
            include "edit_barang.php";
            break;
        case 'edit_supplier':
            include "edit_supp.php";
            break;
        case 'edit_trans':
            include "edit_trans.php";
            break;
        case 'edit_cust':
            include "edit_cust.php";
            break;
        case 'hapus_barang':
            include "hapus_barang.php";
            break;
        case 'hapus_supplier':
            include "hapus_supp.php";
            break;
        case 'hapus_trans':
            include "hapus_trans.php";
            break;
        case 'hapus_trans_d':
            include "hapus_trans_d.php";
            break;
        case 'hapus_cust':
            include "hapus_cust.php";
            break;
        default:
            include "dashboard.php";
            break;
    }
} else {
    include "dashboard.php";
}
