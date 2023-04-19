<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!----------------------------- CONTENT ----------------------------->
    <!----------------------------- CONTENT ----------------------------->
    <!----------------------------- DATABASE ----------------------------->
    <?php
    $id = $_GET['id'];
    // $data = mysqli_query($conn, "SELECT h.*,c.nm_cust,s.nm_supp from transaksi_h h LEFT JOIN customer c on c.id=h.customer_id LEFT JOIN supplier s ON s.id=h.supplier_id where id_trans='$id");
    $data = mysqli_query($conn, "SELECT h.*,c.nm_cust,s.nm_suplier FROM transaksi_h h 
    LEFT JOIN customer c on c.kd_cust=h.customer_id 
    LEFT JOIN supplier s ON s.kd_suplier=h.supplier_id WHERE h.id_trans='$id'");

    // $data = mysqli_query($conn, "SELECT h.*,c.nm_cust,s.nm_suplier from transaksi_h h LEFT JOIN customer c ON c.kd_cust=h.customer_id LEFT JOIN supplier s ON s.kd_suplier=h.supplier_id where h.id_trans='$id'");
    while ($d = mysqli_fetch_array($data)) {
        if ($d['jns_trans'] == 'in') {
            $show = 1;
        } else {
            $show = 0;
        }
    ?>
        <style>
            .d-none {
                display: none;
            }
        </style>
        <div class="py-3 text-center">
            <img style="margin-top: -70px; margin-bottom: -40px;" class="d-block mx-auto" src="https://i.pinimg.com/736x/ce/56/99/ce5699233cbc0f142250b520d967dff7.jpg" alt="logo" width="300">
            <h2 class="text-uppercase">Form Transaksi</h2>
        </div>

        <div class="row g-5">
            <div class="col">
                <h4 class="mb-3">Form Transaksi</h4>
                <form action="" method="POST" class="needs-validation" novalidate style="font-size: larger;" onsubmit="setTimeout(function(){windows.location.reload();},10);">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <label for="namal" class="form-label col-form-label col-3">Kode Transaksi</label>
                                <input type="text" readonly="readonly" class="form-control" id="id_trans" name="id_trans" placeholder="Kode Transaksi" value="<?php echo $d['id_trans']; ?>" required>
                                <div class="invalid-feedback">
                                    Please enter your Name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-4 col-md-6">
                                <label for="alamat" class="form-label col-form-label col-3">Jenis Transaksi</label>
                                <select name="jns_transaksi" id="jns_transaksi" class="form-control">
                                    <?php
                                    if ($d['jns_trans'] == 'in') {
                                        $jns = 'Transaksi Masuk';
                                    } else {
                                        $jns = 'Transaksi Keluar';
                                    }
                                    ?>
                                    <!-- <option value="0" hidden>--Pilih--</option> -->
                                    <option hidden selected="selected" value="<?= $d['jns_trans']; ?>"><?= $jns; ?></option>
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
                                <input type="date" class="form-control" id="tgl_trans" name="tgl_trans" placeholder="Tanggal Transaksi.." value="<?= $d['tgl_trans']; ?>" required>
                                <div class="invalid-feedback">
                                    Please enter your Work.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <label for="pekerjaan" class="form-label col-form-label col-3">Nomor Referensi</label>
                                <input type="text" class="form-control" id="ref_id" name="ref_id" placeholder="Nomor Referensi.." value="<?= $d['ref_id']; ?>" required>
                                <div class="invalid-feedback">
                                    Please enter your Work.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ======================================================================================== -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="input-group mb-4 <?php if ($show != 1) { ?> d-none <?php } ?> supplier_show">
                                <label for="Nama Supplier" class="form-label col-form-label col-3">Supplier</label>
                                <select class="form-control" name="supp_id" id="supplier_id">
                                    <option value="<?= $d['supplier_id']; ?>">
                                        <?= $d['nm_suplier']; ?>
                                    </option>
                                    <?php
                                    $query_supp = mysqli_query($conn, "SELECT * From supplier");
                                    while ($supp = mysqli_fetch_array($query_supp)) {
                                    ?>
                                        <option value="<?php echo $supp['kd_suplier']; ?>">
                                            <?php echo $supp['nm_suplier'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="input-group col-md-6 mb-4 <?php if ($show != 0) { ?> d-none <?php } ?> cust_show">
                                <label for="Nama Supplier" class="form-label col-form-label col-3">Customer</label>
                                <select class="form-control" name="cust_id" id="cust_id">
                                    <option value="<?= $d['customer_id']; ?>"><?= $d['nm_cust']; ?></option>
                                    <?php
                                    $query_cust = mysqli_query($conn, "SELECT * From customer");
                                    while ($cust = mysqli_fetch_array($query_cust)) {
                                    ?>
                                        <option value="<?= $cust['kd_cust']; ?>">
                                            <?= $cust['nm_cust']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col">
                            <button class="mb-3 w-100 btn btn-primary btn-lg" name="submit" type="submit">Save</button>
                        </div>
                        <div class="col">
                            <a href="?mi=data_transaksi"><button class="w-100 btn btn-lg btn-outline-danger">Cancel</button></a>
                        </div>
                </form>
            </div>
        </div>
    <?php } ?>



    <hr class="my-4" style="border: 2px solid blue;">
    <!-- ======TabelTabelTabelTabelTabelTabelTabelTabelTabelTabelTabelTabelTabelTabelTabel=================== -->
    <!-- ======TabelTabelTabelTabelTabelTabelTabelTabelTabelTabelTabelTabelTabelTabelTabel=================== -->
    <!-- ======TabelTabelTabelTabelTabelTabelTabelTabelTabelTabelTabelTabelTabelTabelTabel=================== -->

    <div class="row g-51">
        <div class="col-md-12 col-lg-6">
            <h4 class="m-3 fw-bold text-dark">Data Detail</h4>
            <div class="table-size table-scroll table-responsive">
                <table class="table table-bordered table-hover table-striped table-sm" style="font-size:larger;">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $row = mysqli_query($conn, "SELECT d.*,b.nm_barang from transaksi_d d 
                        LEFT JOIN barang b on b.kd_barang=d.kdbarang where d.header_id='$id' 
                        order by kdbarang DESC");
                        // $row = mysqli_query($conn, "SELECT d.*,b.nm_barang from transaksi_d LEFT JOIN barang b on b.kd_barang DESC");
                        $no = 1;
                        // $kdb = "#DP";
                        foreach ($row as $row_array) { ?>
                            <tr>
                                <td class="fw-bolder"><?= $no; ?></td>
                                <td><?= "#DP" . $row_array['kdbarang']; ?></td>
                                <td><?= $row_array['nm_barang']; ?></td>
                                <td><?= $row_array['qty']; ?></td>
                                <td><?= $row_array['harga']; ?></td>
                                <td><?= $row_array['total']; ?></td>
                                <td>
                                    <a class="text-white text-decoration-none" href="?mi=edit_trans&id=<?php echo $id; ?>&detail_id=<?= $row_array['id']; ?>"><button class="btn-primary w-100">Edit</button></a>
                                    <!-- <a class="text-white text-decoration-none" href="?mi=hapus_transaksi_d&id=<?php echo $id; ?>&detail_id=<?php echo $row_array['id']; ?>"><button class="btn-danger w-100">Delete</button></a> -->
                                    <a class="text-white text-decoration-none" href="?mi=hapus_trans_d&header_id=<?php echo $id; ?>&id=<?php echo $row_array['id']; ?>"><button class="btn-danger w-100">Delete</button></a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                        <tr>
                            <td>
                                <p>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <h4 class="m-3 fw-bold text-dark">Data Detail</h4>
            <form action="" method="POST" class="needs-validation" novalidate style="font-size: larger;" onsubmit="setTimeout(function(){windows.location.reload();},10);">
                <div class="row g-3">
                    <?php
                    $getdetail_id = $_GET['detail_id'];
                    if ($getdetail_id == 0) {
                        $detail_id = 0;
                        $qty = 0;
                        $harga = 0;
                        $kdbarang = 0;
                    } else {
                        $data_detail = mysqli_query($conn, "SELECT * from transaksi_d where id='$getdetail_id'");
                        while ($get_detail = mysqli_fetch_array($data_detail)) {
                            $detail_id = $get_detail['id'];
                            $qty = $get_detail['qty'];
                            $harga = $get_detail['harga'];
                            $kdbarang = $get_detail['kdbarang'];
                        }
                    }
                    ?>
                    <div class="col-8">
                        <div class="input-group mb-4 col-md-6">
                            <label for="alamat" class="form-label col-form-label col-4">Nama Barang</label>
                            <input type="hidden" class="form_control col-3" value=" <?= $detail_id ?>" id="detail_id" name="detail_id" placeholder="detail_id" required>
                            <select name="kdbarang" id="kdbarang" class="form-control">
                                <option value="0" hidden>---Pilih Barang---</option>
                                <?php
                                $data = mysqli_query($conn, "SELECT * from barang");
                                while ($barang = mysqli_fetch_array($data)) {
                                ?>
                                    <option <?php if ($kdbarang === $barang['kd_barang']) {
                                                echo "selected";
                                            } ?> value="<?php echo $barang['kd_barang']; ?>"><?php echo $barang['nm_barang']; ?></option>

                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Please enter your address.
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-4 col-md-6">
                            <label for="alamat" class="form-label col-form-label col-3">QTY</label>
                            <input type="text" name="qty" id="qty" class="form-control" value="<?= $qty ?>" placeholder="Qty" required>
                            <div class="invalid-feedback">
                                Please enter your address.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="input-group mb-4 col-md-6">
                            <label for="alamat" class="form-label col-form-label col-4">Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control" value="<?= $harga ?>" placeholder="Harga" required>
                            <div class="invalid-feedback">
                                Please enter your address.
                            </div>
                        </div>
                    </div>
                </div>
                <label for=""><?= "kdbarang = " . $kdbarang ?></label>
                <br>
                <label for=""><?= "id ambil dari atas = " . $id ?></label>
                <br>
                <label for=""><?= "detail id kode unik = " . $detail_id ?></label>
                <hr class="my-4">
                <div class="row">
                    <div class="col">
                        <button class="mb-3 w-100 btn btn-primary btn-lg" name="submit_detail" type="submit">Save</button>
                    </div>
                    <div class="col">
                        <a href="?mi=transaksi"><button class="w-100 btn btn-lg btn-outline-danger">Cancel</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- ======================================================================================== -->
    <!-- ======================================================================================== -->
    </div>

</main>

<?php
if (isset($_POST['submit'])) {
    $id_trans = $_POST['id_trans'];
    $jns_transaksi =  $_POST['jns_transaksi'];
    $tgl_trans = $_POST['tgl_trans'];
    $supp_id = $_POST['supp_id'];
    $cust_id = $_POST['cust_id'];
    $ref_id = $_POST['ref_id'];
    mysqli_query($conn, "UPDATE transaksi_h set jns_trans ='$jns_transaksi',tgl_trans='$tgl_trans',supplier_id='$supp_id',customer_id='$cust_id',ref_id='$ref_id' where id_trans='$id_trans'");

    // echo "<script>window.location.reload = '?mi=edit_trans&id=$id'&detail_id=0'</script>";
    // echo "<script>window.location.reload(</scdata_transaksi>";
    echo "<script>history.back(1);</script>";
    // usleep(500000);

    // echo "<script>window.location = '?mi=data_transaksi&id=$id_trans'</script>";
    // echo "<script>windows.location.href = '?mi=data_transaksi&id=$id_trans'</script>";
    // echo "<script>window.location = '?mi=data'</script>";
    // echo "<script>window.location.reload(</script>";
    // echo "<script>history.back(0);</script>";
}
if (isset($_POST['submit_detail'])) {
    // $detail_id = $_POST['detail_id'];
    $detail_id = $_POST['detail_id'];
    $kdbarang = $_POST['kdbarang'];
    $qty = $_POST['qty'];
    $harga = $_POST['harga'];
    $total = $harga * $qty;
    if ($detail_id == 0) {
        mysqli_query($conn, "INSERT INTO transaksi_d (header_id,qty,harga,total,kdbarang) VALUES('$id','$qty','$harga','$total','$kdbarang')");
        echo "<script>window.location = '?mi=edit_trans_reload_d&id=$id&detail_id=0'</script>";
    } else {
        mysqli_query($conn, "UPDATE transaksi_d set qty='$qty',harga='$harga',total='$total',kdbarang='$kdbarang' where id='$detail_id'");
        echo "<script>history.back(1);</script>";
    }
    // echo "<script>window.location.reload = '?mi=edit_trans&id=$id'&detail_id=0'</script>";
    // yang bawah alternatif
    // echo "<script>window.location = '?mi=edit_trans_reload_d&id=$id&detail_id=0'</script>";
}
// alert(selectedPackage); << alert jquery
?>

<script src="assets/js/jquery/jquery.min.js"></script>
<!-- <script src="./jquery/jquery.min.js"></script> -->
<script>
    $('#jns_transaksi').on('change', function() {
        var selectedPackage = $('#jns_transaksi').val();
        if (selectedPackage == 'in') {
            $(".supplier_show").removeClass("d-none");
            $(".cust_show").addClass("d-none");
        } else if (selectedPackage == 'out') {
            $(".supplier_show").addClass("d-none");
            $(".cust_show").removeClass("d-none");
        }
    });

    function detail_id() {
        $(".tabledetil").addClass("active");
        $(".tabledetil").addClass("show");
        $(".tabtabledetil").addClass("active");
        $(".formeditdetil").removeClass("active");
        $(".formeditdetil").removeClass("show");
        $(".tabformeditdetil").removeClass("active");
    }
</script>
<script type="text/javascript">
    document.getElementById("backu").onclick = function() {
        location.href = "http://www.google.com";
    };
</script>