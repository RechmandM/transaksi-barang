<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-5">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <!-- aria-current="page"  -->
                    <a class="nav-link" aria-current="page" href="./">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="?mi=data">
                        <span data-feather="layers"></span>
                        Data Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?mi=data_supp">
                        <span data-feather="bar-chart-2"></span>
                        Data Supplier
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?mi=data_cust">
                        <span data-feather="users"></span>
                        Data Customer
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?mi=data_transaksi">
                        <span data-feather="users"></span>
                        Data Transaksi
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!----------------------------- CONTENT ----------------------------->
    <!----------------------------- CONTENT ----------------------------->
    <!----------------------------- CONTENT ----------------------------->
    <style>
        .d-none {
            display: none;
        }
    </style>
    <div class="py-3 text-center">
        <img style="margin-top: -70px; margin-bottom: -40px;" class="d-block mx-auto" src="https://i.pinimg.com/736x/ce/56/99/ce5699233cbc0f142250b520d967dff7.jpg" alt="logo" width="300">
        <h2 class="text-uppercase">Form Transaksi</h2>
    </div>

    <?php
    $tipe = "#DTR";
    $query = mysqli_query($conn, "SELECT IFNULL(CONCAT('$tipe',LPAD(MAX(RIGHT(id_trans,4))+1,4,'0')),CONCAT('$tipe',LPAD(1,4,'0'))) AS nomor FROM transaksi_h WHERE id_trans= (SELECT MAX(id_trans) FROM transaksi_h ORDER BY id_trans DESC)");

    while ($d = mysqli_fetch_array($query)) {
    ?>
        <div class="row g-5">
            <div class="col">
                <h4 class="mb-3">Form Transaksi</h4>
                <form method="POST" class="needs-validation" novalidate style="font-size: larger;">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <label for="namal" class="form-label col-form-label col-3">Kode Transaksi</label>
                                <input type="text" readonly="readonly" class="form-control" id="id_trans" name="id_trans" placeholder="Kode Transaksi" value="<?php echo $d['nomor']; ?>" required>
                                <div class="invalid-feedback">
                                    Please enter your Name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-4 col-md-6">
                                <label for="alamat" class="form-label col-form-label col-3">Jenis Transaksi</label>
                                <select name="jns_transaksi" id="jns_transaksi" class="form-control">
                                    <option value="0">--Pilih--</option>
                                    <option value="in">Transaksi Masuk</option>
                                    <option value="out">Transaksi Keluar</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please enter your address.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <label for="pekerjaan" class="form-label col-form-label col-3">Tanggal Transaksi</label>
                                <input type="date" class="form-control" id="tgl_trans" name="tgl_trans" placeholder="Tanggal Transaksi.." required>
                                <div class="invalid-feedback">
                                    Please enter your Work.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <label for="pekerjaan" class="form-label col-form-label col-3">Nomor Referensi</label>
                                <input type="number" class="form-control" id="ref_id" name="ref_id" placeholder="Nomor Referensi.." required>
                                <div class="invalid-feedback">
                                    Please enter your Work.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================ -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="input-group mb-4 d-none supplier_show">
                                <label for="Nama Supplier" class="form-label col-form-label col-3">Supplier</label>
                                <select class="form-control" name="supplier_id" id="supplier_id">
                                    <option value="0">--Pilih--</option>
                                    <?php
                                    $query_supp = mysqli_query($conn, "SELECT * From db_suplier");
                                    while ($supp = mysqli_fetch_array($query_supp)) {
                                    ?>
                                        <option value="<? echo $supp['id']; ?>"></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-6 d-none cust_show">
                                <label for="Nama Supplier" class="form-label">Customer</label>
                                <select class="form-control" name="cust_id" id="cust_id">
                                    <option value="0">--Pilih--</option>
                                    <?php
                                    $query_cust = mysqli_query($conn, "SELECT * From db_cust");
                                    while ($cust = mysqli_fetch_array($query_cust)) {
                                    ?>
                                        <option value="<?php echo $cust['kd_cust']; ?>">
                                            <?php echo $cust['nm_cust']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!-- ============================================================= -->
                    </div>
                    <hr class="my-4">
                    <button class="mb-3 w-100 btn btn-primary btn-lg" name="submit" type="submit">Save</button>
                    <a href="?mi=form_data_transaksi"><button class="w-100 btn-lg btn-outline-danger">Cancel</button></a>
                </form>
            </div>
        </div>
    <?php } ?>
</main>

<?php
if (isset($_POST['submit'])) {
    $id_trans = $_POST['id_trans'];
    $jns_transaksi =  $_POST['jns_transaksi'];
    $tgl_trans = $_POST['tgl_trans'];
    $supp_id = $_POST['supp_id'];
    $cust_id = $_POST['cust_id'];
    $ref_id = $_POST['ref_id'];
    mysqli_query($conn, "INSERT into transaksi_h (id_trans,jns_trans,tgl_trans,kd_suplier,kd_cust,ref_id)
    values('$id_trans','$jns_transaksi','$tgl_trans','$supp_id','$cus_id','$ref_id')");
    usleep(500000);

    echo "<script>windows.location.href = '?mi=edit_transaksi&id=$id_trans'</script>";
    // echo "<script>window.location = '?mi=data'</script>";
    // echo "<script>window.location.reload(</script>";
    // echo "<script>history.back(0);</script>";
}
?>

<script src="assets/js/jquery/jquery.min.js"></script>
<script>
    $('#jns_transaksi').on('change', function() {
        var selectedPackage = $('#jns_transaksi').val();
        alert(selectedPackage);
        if (selectedPackage = 'in') {
            $(".supplier_show").removeClass("d_none");
            $(".cust_show").addClass("d-none");
        } else if (selectedPackage = 'out') {
            $(".supplier_show").addClass("d-none");
            $(".cust_show").removeClass("d-none");
        }
    })
</script>