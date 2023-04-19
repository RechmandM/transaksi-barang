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
                        <label for="namal" class="form-label col-form-label fw-bold">Kode Supplier</label>
                        <input type="text" readonly class="form-control" id="kd_suplier" name="fr_kd_suplier" placeholder="Kode Supplier Terisi Otomatis.." value="" required>
                        <div class="invalid-feedback">
                            Please enter your Name.
                        </div>
                        <!-- </div> -->
                    </div>
                    <div class="col-md-4">
                        <!-- <div class="input-group mb-4 col-md-6"> -->
                        <label for="alamat" class="form-label col-form-label fw-bold">Nama Supplier</label>
                        <input type="text" class="form-control" id="nm_suplier" name="fr_nm_suplier" placeholder="Nama Supplier" required>
                        <div class="invalid-feedback">
                            Please enter your address.
                        </div>
                        <!-- </div> -->
                    </div>
                    <div class="col-md-4">
                        <!-- <div class="input-group mb-4"> -->
                        <label for="pekerjaan" class="form-label col-form-label fw-bold">Nomor Telepon</label>
                        <input type="number" class="form-control" id="no_tlp" name="fr_no_tlp" placeholder="Nomor Telepon" required>
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
    // $kd_barang = $_POST['kd_barang']; no pakai
    usleep(500000);
    $fr_nm_suplier =  $_POST['fr_nm_suplier'];
    $fr_no_tlp = $_POST['fr_no_tlp'];
    mysqli_query($conn, "INSERT into supplier (nm_suplier,no_tlp)
    values('$fr_nm_suplier','$fr_no_tlp')");
    echo "<script>window.location = '?mi=data_supp'</script>";
    // echo "<script>window.location.reload(</script>";
    // echo "<script>history.back(1);</script>";
    // window.location="index.php";
}
?>