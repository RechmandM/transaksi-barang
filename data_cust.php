<?php
$level = $_SESSION['level'];
if ($level != 1) {
    echo "<link href='style.css' rel='stylesheet' type='text/css'>
        <center><h2>Maaf, Anda tidak memiliki akses untuk halaman ini..</h2></center>";
    return;
} else {
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!----------------------------- CONTENT ----------------------------->
    <!----------------------------- CONTENT ----------------------------->
    <!----------------------------- CONTENT ----------------------------->
    <script>
        function check() {
            var switer = document.getElementById("flexS");
            var tombol = document.getElementById("tb");
            var tombol2 = document.getElementById("tb2");
            if (switer.checked == true) {
                tombol.hidden = true;
                tombol.innerHTML="TAMBAH";
                tombol2.hidden = false;
                document.getElementById("colTB").className = "accordion-collapse collapse hide";
            } else {
                // tombol.style.display = "none";
                tombol.hidden = false;
                tombol2.hidden = true;
            }
        }
    </script>
    <script>
        function tambah() {
            var tom = document.getElementById('tb');
            if (tom.innerHTML == "TAMBAH") {
                tom.innerHTML = "CLOSE";
            } else {
                tom.innerHTML = "TAMBAH";
            }

        }
    </script>
    <div class="col">
        <div class="py-3">
            <div class="form-check form-switch float-end">
                <input class="form-check-input flex-column-reverse" type="checkbox" id="flexS" onclick="check()">
                <label id="labelk" class="form-check-label text-capitalize fst-italic h6" for="flexS">Tambahkan produk di halaman normal</label>
            </div>
        </div>
        <section id="data2" class="py-3">
            <div class="list-group-item mb-3">
                <h2 class="list-inline-item text-warning fw-bold" style="-webkit-text-stroke: 2px rgb(0, 0, 0);">DATA CUSTOMER</h2>
                <button onclick="tambah()" id="tb" class="btn-primary rounded-2 float-end w-25 p-2 my-1 fw-bold text-white" data-bs-toggle="collapse" data-bs-target="#colTB">TAMBAH</button>
                <a href="?mi=formcust"><button id="tb2" class="btn-primary rounded-2 float-end w-25 p-2 my-1 fw-bold" hidden>TAMBAH</button></a>
            </div>
            <div class="accordion-item">
                <div id="colTB" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#data2">
                    <div class="accordion-body">
                        <?php include "form_cust2.php"; ?>
                    </div>
                </div>
            </div>
            <!-- <h2 class="text-center text-warning fw-bold" style="-webkit-text-stroke: 2px rgb(0, 0, 0);">DATA CUSTOMER</h2> -->
            <div class="table-size table-scroll table-responsive">
                <table class="table table-hover table-bordered table-striped table-sm" style="font-size:larger;">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama Customer</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $row = mysqli_query($conn, "SELECT * from customer");
                        $no = 1;
                        $kds = "#DC";
                        foreach ($row as $row_array) { ?>
                            <tr>
                                <td class="fw-bolder"><?= $no; ?></td>
                                <td><?= $kds . $row_array['kd_cust']; ?></td>
                                <td class="text-wrap"><?= $row_array['nm_cust']; ?></td>
                                <td><?= $row_array['no_cust']; ?></td>
                                <td>
                                    <a class="text-white text-decoration-none" href="?mi=edit_cust&id=<?php echo $row_array['kd_cust']; ?>"><button style="color: white;" class="btn-primary w-100">Edit</button></a>
                                    <a class="text-white text-decoration-none" href="?mi=del_cust&id=<?php echo $row_array['kd_cust']; ?>"><button class="btn-danger w-100">Delete</button></a>
                                </td>
                            </tr>

                        <?php $no++;
                        } ?><tr>
                            <td>
                                <p>
                            </td>
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
                        </tr>
                        <tr>
                            <td>
                                <p>
                            </td>
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
                        </tr>
                        <tr>
                            <td>
                                <p>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <hr class="garis">
    </div>
</main>

<?php } ?>