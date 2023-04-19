<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!---------------------- PHP edit barang ------------------------------------>
    <!---------------------- PHP edit barang ------------------------------------>
    <!---------------------- PHP edit barang ------------------------------------>
    <?php
    $id = $_GET['id'];
    $data = mysqli_query($conn, "SELECT * from barang where kd_barang='$id'");
    if ($row = mysqli_fetch_array($data)) { // iseng pakai if
    ?>
        <!----------------------------- CONTENT ----------------------------->
        <!----------------------------- CONTENT ----------------------------->
        <!----------------------------- CONTENT ----------------------------->
        <div class="py-3 text-center">
            <img style="margin-top: -70px; margin-bottom: -40px;" class="d-block mx-auto" src="https://i.pinimg.com/736x/ce/56/99/ce5699233cbc0f142250b520d967dff7.jpg" alt="logo" width="300">
            <h2 class="text-uppercase">Ubah data produk</h2>
        </div>
        <div class="row g-5">
            <div class="col">
                <form method="post" class="needs-validation" novalidate style="font-size: larger;">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <label for="namal" class="form-label col-form-label col-3">Kode Barang</label>
                                <input type="text" readonly class="form-control" id="kodebarang" name="ed_kd_barang" value="<?php echo $row['kd_barang'] ?>" placeholder="Kode Barang" required>
                                <div class="invalid-feedback">
                                    Please enter your Name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <label for="alamat" class="form-label col-form-label col-3">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="ed_nm_barang" value="<?php echo $row['nm_barang'] ?>" placeholder="Nama Barang" required>
                                <div class="invalid-feedback">
                                    Please enter your address.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <label for="pekerjaan" class="form-label col-form-label col-3">Jumlah Stok</label>
                                <input type="number" class="form-control" id="stok" name="ed_stok" value="<?php echo $row['stok'] ?>" placeholder="Stok" required>
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
    <?php } else {
        include "./nofound.php";
    } ?>
</main>

<?php
if (isset($_POST['submit'])) {
    $ed_kd_barang = $_POST['ed_kd_barang'];
    $ed_nm_barang = $_POST['ed_nm_barang'];
    $ed_stok = $_POST['ed_stok'];
    mysqli_query($conn, "UPDATE db_barang set nm_barang= '$ed_nm_barang',stok='$ed_stok' where kd_barang= '$ed_kd_barang'");
    usleep(500000);
    echo "<script>window.location = '?mi=data'</script>";
    // echo "<script>window.location.reload(</script>";
    // echo "<script>history.back(1);</script>";
    // header("location:?mi=data");
}
?>