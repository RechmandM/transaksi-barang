<main class="col">
    <div class="text-center">
        <!-- <img style="margin-top: -70px; margin-bottom: -40px;" class="mx-auto" src="https://i.pinimg.com/736x/ce/56/99/ce5699233cbc0f142250b520d967dff7.jpg" alt="logo" width="300"> -->
        <!-- <h2 class="text-uppercase">New Produk</h2> -->
    </div>
    <div class="row">
        <div class="col">
            <form method="post" class="needs-validation" novalidate style="font-size: larger;">
                <div class="row">
                    <div class="col-md-4">
                        <!-- <div class="input-group mb-4"> -->
                        <label for="namal" class="form-label col-form-label fw-bold">Kode Customer</label>
                        <input type="text" readonly class="form-control" id="kd_suplier" name="ed_kd_cust" value="" placeholder="Kode Customer" required>
                        <div class="invalid-feedback">
                            Please enter your Name.
                        </div>
                        <!-- </div> -->
                    </div>
                    <div class="col-md-4">
                        <!-- <div class="input-group mb-4 col-md-6"> -->
                        <label for="alamat" class="form-label col-form-label fw-bold">Nama Customer</label>
                        <input type="text" class="form-control" id="nm_suplier" name="ed_nm_cust" value="" placeholder="Nama Customer" required>
                        <div class="invalid-feedback">
                            Please enter your address.
                        </div>
                        <!-- </div> -->
                    </div>
                    <div class="col-md-4">
                        <!-- <div class="input-group mb-4"> -->
                        <label for="pekerjaan" class="form-label col-form-label fw-bold">Nomer Telepon</label>
                            <input type="number" class="form-control" id="no_tlp" name="ed_no_tlp" value="" placeholder="Nomor Telepon" required>
                            <div class="invalid-feedback">
                                Please enter your Work.
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
                <hr class="my-4">
                <button class="w-100 btn btn-danger btn-md text-uppercase fw-bold" name="submit" type="submit">Tambahkan</button>
            </form>
        </div>
    </div>
</main>

<?php
if (isset($_POST['submit'])) {
    $ed_kd_cust = $_POST['ed_kd_cust'];
    $ed_nm_cust = $_POST['ed_nm_cust'];
    $ed_no_tlp = $_POST['ed_no_tlp'];
    mysqli_query($conn, "INSERT into customer (kd_cust,nm_cust,no_cust)
    values ('$ed_kd_cust','$ed_nm_cust','$ed_no_tlp')");
    usleep(500000);
    echo "<script>window.location = '?mi=data_cust'</script>";
    // echo "<script>window.location.reload(</script>";
    // echo "<script>history.back(1);</script>";
}
?>