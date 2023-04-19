<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!----------------------------- CONTENT ----------------------------->
    <!----------------------------- CONTENT ----------------------------->
    <!----------------------------- CONTENT ----------------------------->
    <div class="py-3 text-center">
        <img style="margin-top: -70px; margin-bottom: -40px;" class="d-block mx-auto" src="https://i.pinimg.com/736x/ce/56/99/ce5699233cbc0f142250b520d967dff7.jpg" alt="logo" width="300">
        <h2 class="text-uppercase">New Produk</h2>
    </div>
    <div class="row g-5">
        <div class="col">
            <form method="POST" class="needs-validation" novalidate style="font-size: larger;">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="input-group mb-4">
                            <label for="namal" class="form-label col-form-label col-3">Kode Barang</label>
                            <input type="text" readonly class="form-control" id="kd_barang" name="fr_kd_barang" placeholder="Kode Barang Terisi Otomatis.." value="" required>
                            <div class="invalid-feedback">
                                Please enter your Name.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-4 col-md-6">
                            <label for="alamat" class="form-label col-form-label col-3">Nama Barang</label>
                            <input type="text" class="form-control" id="nm_barang" name="fr_nm_barang" placeholder="Nama Barang" required>
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
                            <input type="number" class="form-control" id="stok" name="fr_stok" placeholder="Jumlah Stok" required>
                            <div class="invalid-feedback">
                                Please enter your Work.
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <button class="w-100 btn btn-primary btn-lg" name="submit" type="submit">Tambahkan</button>
            </form>
        </div>
    </div>
</main>

<?php
if (isset($_POST['submit'])) {
    // $kd_barang = $_POST['kd_barang']; no pakai
    $fr_nm_barang =  $_POST['fr_nm_barang'];
    $fr_stok = $_POST['fr_stok'];
    mysqli_query($conn, "INSERT into barang (nm_barang,stok)
    values('$fr_nm_barang','$fr_stok')");
    usleep(500000);
    echo "<script>window.location = '?mi=data'</script>";
    // echo "<script>window.location.reload(</script>";
    // echo "<script>history.back(0);</script>";
}
?>