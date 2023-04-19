<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Checkout example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">



    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .d-none {
            display: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container p-5">
        <main class="col-md-12 ms-sm-auto col-lg-10 px-md-4">
            <?php
            $id = $_GET['id'];
            $data = mysqli_query($conn, "SELECT h.*,c.nm_cust,s.nm_suplier FROM transaksi_h h LEFT JOIN customer c on c.kd_cust=h.customer_id LEFT JOIN supplier s ON s.kd_suplier=h.supplier_id WHERE id_trans='$id'");
            while ($d = mysqli_fetch_array($data)) {
                if ($d['jns_trans'] == 'in') {
                    $show = 1;
                } else {
                    $show = 0;
                }
            ?>

                <div class="py-5 text-center">
                    <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                    <h2>Form Transaksi</h2>
                    <!-- <h2>Formulir</h2>
                    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
                </div>

                <div class="row g-5">

                </div>
                <div class="col-md-12 col-lg-12">
                    <h4 class="mb-3">Form Transaksi</h4>
                    <form action="" method="post" onsubmit="setTimeout(function(){window.location.reload();},10);">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Kode Transaksi</label>
                                <input type="text" readonly="readonly" class="form-control" id="id_transaksi" name="id_transaksi" placeholder="Kode Transaksi" value="<?php echo $d['id_trans']; ?>" required>
                                <div class="invalid-feedback">
                                    Valid Kode Transaksi is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Kode Transaksi" class="form-label">Jenis Transaksi</label>
                                <select name="jns_trans" id="jns_trans" class="form-control">
                                    <?php if ($d['jns_trans'] == 'in') {
                                        $jns = 'Transaksi Masuk';
                                    } else {
                                        $jns = 'Transaksi Keluar';
                                    }
                                    ?>
                                    <option hidden selected="selected" value="<?= $d['jns_trans']; ?>"> <?= $jns; ?></option>
                                    <option value="in">Transaksi Masuk</option>
                                    <option value="out">Transaksi Keluar</option>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label for="Telephon" class="form-label">Tgl Transaksi <?= $show; ?></label>
                                <div class="input-group has-validation">
                                    <input type="date" class="form-control" id="tgl_trans" name="tgl_trans" placeholder="Tanggal Transaksi" value="<?php echo $d['tgl_trans']; ?>" required>
                                    <div class="invalid-feedback">
                                        Your Telephon is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="Telephon" class="form-label">No. Referensi</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" value="<?= $d['ref_id']; ?>" id="ref_id" name="ref_id" placeholder="No. Ref" required>
                                    <div class="invalid-feedback">
                                        Your Telephon is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 <?php if ($show != 1) { ?> d-none <?php } ?> supplier_show">
                                <label for="Nama Supplier" class="form-label">Supplier</label>
                                <div class="input-group has-validation">
                                    <select name="supp_id" id="supp_id" class="form-control">
                                        <option value="<?= $d['supplier_id']; ?>"><?= $d['nm_suplier']; ?></option>
                                        <?php
                                        $query_supp = mysqli_query($conn, "SELECT * FROM supplier");

                                        while ($supp = mysqli_fetch_array($query_supp)) { ?>
                                            <option value="<?php echo $supp['kd_suplier']; ?>">
                                                <?php echo $supp['nm_suplier']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Your Telephon is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 <?php if ($show != 0) { ?> d-none <?php } ?> cust_show">
                                <label for="Nama Supplier" class="form-label">Customer</label>
                                <select name="cust_id" id="cust_id" class="form-control">
                                    <option value="<?= $d['customer_id']; ?>"><?= $d['nm_cust']; ?></option>
                                    <?php
                                    $query_cust = mysqli_query($conn, "SELECT * FROM customer");

                                    while ($cust = mysqli_fetch_array($query_cust)) { ?>
                                        <option value="<?php echo $cust['kd_cust']; ?>"><?php echo $cust['nm_cust']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <hr class="my-4">


                            <button class="w-20 btn btn-primary btn-lg" type="submit" name="submit">Simpan</button>
                            <a href="?mi=data4" class="w-20 btn btn-primary btn-lg">Cancel</a>
                        </div>
                    </form>
                </div>
                <hr style="border: 2px solid red">
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">NO.</th>
                                        <th scope="col">Kode Barang</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $row = mysqli_query($conn, "SELECT d.*,b.nm_barang from transaksi_d d 
                                    LEFT JOIN barang b on b.kd_barang=d.kdbarang where d.header_id='$id' order by kdbarang DESC");
                                    $no = 1;
                                    foreach ($row as $row_array) { ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row_array['kdbarang']; ?></td>
                                            <td><?= $row_array['nm_barang']; ?></td>
                                            <td><?= $row_array['qty']; ?></td>
                                            <td><?= $row_array['harga']; ?></td>
                                            <td><?= $row_array['total']; ?></td>
                                            <td>
                                                <a href="?mi=edit_trans&id=<?php echo $id; ?>&detail_id=<?php echo $row_array['id']; ?>">Edit</a>
                                                <a href="?mi=hapus_trans_d&header_id=<?php echo $id; ?>&id=<?php echo $row_array['id']; ?>">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <h4 class="mb-3">Form Detail</h4>
                        <form action="" method="post" onsubmit="setTimeout(function(){window.location.reload();},10);">
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
                                <div class="col-sm-6">
                                    <label for="Nama Barang" class="form_label">Nama Barang</label>
                                    <input type="hidden" name="" class="form_control" value="<?= $detail_id; ?>" id="detail_id" name="detail_id" placeholder="detail_id" required>
                                    <select name="kdbarang" id="kdbarang" class="form_control">
                                        <option value="0">--PILIH--</option>
                                        <?php
                                        $query_barang = mysqli_query($conn, "SELECT * from barang");

                                        while ($barang = mysqli_fetch_array($query_barang)) { ?>
                                            <option <?php if ($kdbarang === $barang['kd_barang']) {
                                                        echo "selected";
                                                    } ?> value="<?php echo $barang['kd_barang']; ?>"><?php echo $barang['nm_barang']; ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Kode Barang" class="form_label">Qty</label>
                                    <input type="text" class="form_control" value="<?= $qty; ?>" id="qty" name="qty" placeholder="Qty" required>
                                    <div class="invalid-feedback">
                                        Valid Qty is required.
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="Kode Barang" class="form_label">Harga</label>
                                    <input type="text" class="form_control" value="<?= $harga; ?>" id="harga" name="harga" placeholder="Harga" required>
                                    <div class="invalid-feedback">
                                        Valid Harga is required.
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">
                            <button class="w-20 btn btn-primary btn-lg" type="submit" name="submit_detail">Simpan Detail</button>
                            <a href="?mi=data4" class="w-20 btn btn-danger btn-lg">Cancel</a>
                        </form>
                    </div>


                </div>
            <?php  } ?>
        </main>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $id_transaksi = $_POST['id_transaksi'];
        $jns_transaksi = $_POST['jns_trans'];
        $tgl_trans = $_POST['tgl_trans'];
        $ref_id = $_POST['ref_id'];
        $supp_id = $_POST['supp_id'];
        $cust_id = $_POST['cust_id'];
        mysqli_query($conn, "UPDATE transaksi_h set jns_trans= (id_trans,jns_trans,tgl_trans,ref_id,supplier_id,customer_id)
        values('$id_transaksi','$jns_transaksi','$tgl_trans','$ref_id','$supp_id','$cust_id')");

        echo "<script>window.location.href = '?mi=edit_trans&id=$id_transaksi&detail_id=0'</script>";
        // echo "<script>window.location = '?mi=data4'</script>";
    }

    if (isset($_POST['submit_detail'])) {
        $detail_id = $_POST['id'];
        $kdbarang = $_POST['kdbarang'];
        $qty = $_POST['qty'];
        $harga = $_POST['harga'];
        $total = $harga * $qty;
        if ($detail_id == 0) {
            mysqli_query($conn, "INSERT INTO transaksi_d (header_id,qty,harga,total,kdbarang)
            values('$id','$qty','$harga','$total','$kdbarang')");
        } else {
            mysqli_query($conn, "UPDATE transaksi_d set qty= '$qty', harga= '$harga', total='$total', kdbarang='$kdbarang' where id='$detail_id'");
        }

        echo "<script>window.location.href = '?mi=edit_trans&id=$id_transaksi&detail_id=0'</script>";
        // echo "<script>window.location = '?mi=data4'</script>";
    }
    ?>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017–2021 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
    </div>


    <script src="./assets/js/jquery/jquery.min.js"></script>
    <script>
        $('#jns_trans').on('change', function() {
            var selectedpackage = $('#jns_trans').val();
            if (selectedpackage == 'in') {
                $(".supplier_show").removeClass("d-none");
                $(".cust_show").addClass("d-none");
            } else if (selectedpackage == 'out') {
                $(".supplier_show").addClass("d-none");
                $(".cust_show").removeClass("d-none");
            }
        });

        function detail_id() {
            $(".tabledetil").addClass("active");
            $(".tabledetil").addClass("show");
            $(".tabtabledetil").addClass("active");
            $(".tabledetil").removeClass("active");
            $(".tabledetil").removeClass("show");
            $(".tabformeditdetil").removeClass("active");
        }
    </script>
    <script src="form-validation.js"></script>
</body>

</html>