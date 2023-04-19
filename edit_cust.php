<?php
$level = $_SESSION['level'];
if ($level != 1) {
    echo "<link href='style.css' rel='stylesheet' type='text/css'>
        <center><h2>Maaf, Anda tidak memiliki akses untuk halaman ini..</h2></center>";
    return;
} else {
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!---------------------- PHP edit barang ------------------------------------>
    <!---------------------- PHP edit barang ------------------------------------>
    <!---------------------- PHP edit barang ------------------------------------>
    <?php
    $id = $_GET['id'];
    $data = mysqli_query($conn, "SELECT * from customer where kd_cust='$id'");
    while ($row = mysqli_fetch_array($data)) {
    ?>
        <!----------------------------- CONTENT ----------------------------->
        <!----------------------------- CONTENT ----------------------------->
        <!----------------------------- CONTENT ----------------------------->
        <div class="py-3 text-center">
            <img style="margin-top: -70px; margin-bottom: -40px;" class="d-block mx-auto" src="https://i.pinimg.com/736x/ce/56/99/ce5699233cbc0f142250b520d967dff7.jpg" alt="logo" width="300">
            <h2 class="text-uppercase">Ubah data customer</h2>
        </div>
        <div class="row g-5">
            <div class="col">
                <form method="post" class="needs-validation" novalidate style="font-size: larger;">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <label for="namal" class="form-label col-form-label col-3">Kode BarCustomerang</label>
                                <input type="text" readonly class="form-control" id="kodebarang" name="ed_kd_cust" value="<?php echo $row['kd_cust'] ?>" placeholder="Kode Customer" required>
                                <div class="invalid-feedback">
                                    Please enter your Name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <label for="alamat" class="form-label col-form-label col-3">Nama Customer</label>
                                <input type="text" class="form-control" id="nama_barang" name="ed_nm_cust" value="<?php echo $row['nm_cust'] ?>" placeholder="Nama Customer" required>
                                <div class="invalid-feedback">
                                    Please enter your address.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <label for="pekerjaan" class="form-label col-form-label col-3">Nomor Telepon</label>
                                <input type="number" class="form-control" id="stok" name="ed_stok" value="<?php echo $row['no_cust'] ?>" placeholder="Nomor Telepon" required>
                                <div class="invalid-feedback">
                                    Please enter your Work.
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" name="submit" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    <?php } ?>
</main>

<?php } ?>
<?php
if (isset($_POST['submit'])) {
    $ed_kd_barang = $_POST['ed_kd_cust'];
    $ed_nm_barang = $_POST['ed_nm_cust'];
    $ed_stok = $_POST['ed_stok'];
    mysqli_query($conn, "UPDATE customer set nm_cust= '$ed_nm_barang',no_cust='$ed_stok' where kd_cust= '$ed_kd_barang'");
    usleep(500000);
    echo "<script>window.location = '?mi=data_cust'</script>";
    // echo "<script>window.location.reload(</script>";
    // echo "<script>history.back(1);</script>";
    // header("location:?mi=data");
}
?>