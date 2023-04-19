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

  <div class="container">
    <main class=" m-5">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h2>Form Transaksi</h2>
        <!-- <h2>Formulir</h2>
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
      </div>
      <?php
      $tipe = "TR";
      $query = mysqli_query($conn, "SELECT IFNULL(CONCAT('$tipe',LPAD(MAX(RIGHT(id_trans,4))+1,4,'0')), CONCAT('$tipe',LPAD(1,4,'0'))) AS nomor FROM transaksi_h WHERE id_trans= (SELECT MAX(id_trans) FROM transaksi_h ORDER BY id_trans DESC)");
      $query = mysqli_query($conn, "SELECT IFNULL(CONCAT('$tipe',LPAD(MAX(RIGHT(id_trans,4))+1,4,'0')), CONCAT('$tipe',LPAD(1,4,'0'))) AS nomor FROM transaksi_h WHERE id_trans= (SELECT MAX(id_trans) FROM transaksi_h ORDER BY id_trans DESC)");

      while ($d = mysqli_fetch_array($query)) {
      ?>
        <div class="row g-5">

        </div>
        <div class="col-md-12 col-lg-12">
          <h4 class="mb-3">Form Transaksi</h4>
          <form action="" method="post" class="needs-validation" novalidate>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">Kode Transaksi</label>
                <input type="text" readonly="readonly" class="form-control" id="id_transaksi" name="id_transaksi" placeholder="Kode Transaksi" value="<?php echo $d['nomor']; ?>" required>
                <div class="invalid-feedback">
                  Valid Kode Transaksi is required.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="Kode Transaksi" class="form-label">Jenis Transaksi</label>
                <select name="jns_trans" id="jns_trans" class="form-control">
                  <option value="0">---PILIH---</option>
                  <option value="in">Transaksi Masuk</option>
                  <option value="out">Transaksi Keluar</option>
                </select>
              </div>

              <div class="col-sm-6">
                <label for="Telephon" class="form-label">Tgl Transaksi</label>
                <div class="input-group has-validation">
                  <input type="date" class="form-control" id="tgl_trans" name="tgl_trans" placeholder="Tanggal Transaksi" required>
                  <div class="invalid-feedback">
                    Your Telephon is required.
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <label for="Telephon" class="form-label">No. Referensi</label>
                <div class="input-group has-validation">
                  <input type="text" class="form-control" id="ref_id" name="ref_id" placeholder="No. Ref" required>
                  <div class="invalid-feedback">
                    Your Telephon is required.
                  </div>
                </div>
              </div>

              <div class="col-sm-6 d-none supplier_show">
                <label for="Nama Supplier" class="form-label">Supplier</label>
                <div class="input-group has-validation">
                  <select name="supp_id" id="supp_id" class="form-control">
                    <option value="0">--PILIH--</option>
                    <?php
                    $query_supp = mysqli_query($conn, "SELECT * FROM supplier");

                    while ($supp = mysqli_fetch_array($query_supp)) { ?>
                      <option value="<?php echo $supp['kd_suplier']; ?>"><?php echo $supp['nm_suplier']; ?></option>
                    <?php } ?>
                  </select>
                  <div class="invalid-feedback">
                    Your Telephon is required.
                  </div>
                </div>
              </div>

              <div class="col-sm-6 d-none cust_show">
                <label for="Nama Supplier" class="form-label">Customer</label>
                <select name="cust_id" id="cust_id" class="form-control">
                  <option value="0">--PILIH--</option>
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
    mysqli_query($conn, "INSERT into transaksi_h (id_trans,jns_trans,tgl_trans,ref_id,supp_id,cust_id)
        values('$id_transaksi','$jns_transaksi','$tgl_trans','$ref_id','$supp_id','$cust_id')");

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
  </script>
  <script src="form-validation.js"></script>
</body>

</html>