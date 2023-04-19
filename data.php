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
                // tombol.style.display = "block";
                tombol.hidden = true;
                tombol.innerHTML = "TAMBAH";
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
        <section id="data" class="py-3">
            <div class="list-group-item mb-3">
                <h2 class="list-inline-item text-primary fw-bold" style="-webkit-text-stroke: 2px rgb(0, 0, 0);">DATA PRODUK</h2>
                <button onclick="tambah()" id="tb" class="btn-primary rounded-2 float-end w-25 p-2 my-1 fw-bold" data-bs-toggle="collapse" data-bs-target="#colTB">TAMBAH</button>
                <a href="?mi=formbarang"><button id="tb2" class="btn-primary rounded-2 float-end w-25 p-2 my-1 fw-bold" hidden>TAMBAH</button></a>
            </div>
            <div class="accordion-item">
                <div id="colTB" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#data">
                    <div class="accordion-body">
                        <?php include "form_barang2.php"; ?>
                    </div>
                </div>
            </div>
            <div class="table-size table-scroll table-responsive">
                <table class="table table-bordered table-hover table-striped table-sm" style="font-size:larger;">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama produk</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $row = mysqli_query($conn, "SELECT * from barang");
                        $no = 1;
                        $kdb = "#DP";
                        foreach ($row as $row_array) { ?>
                            <tr>
                                <td class="fw-bolder"><?= $no; ?></td>
                                <td><?= $kdb . $row_array['kd_barang']; ?></td>
                                <td><?= $row_array['nm_barang']; ?></td>
                                <td><?= $row_array['stok']; ?></td>
                                <td>
                                    <a class="text-white text-decoration-none" href="?mi=edit_barang&id=<?php echo $row_array['kd_barang']; ?>"><button class="btn-primary w-100">Edit</button></a>
                                    <a class="text-white text-decoration-none" href="?mi=hapus_barang&id=<?php echo $row_array['kd_barang']; ?>"><button class="btn-danger w-100">Delete</button></a>
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