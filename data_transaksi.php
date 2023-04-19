<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!----------------------------- CONTENT ----------------------------->
    <!----------------------------- CONTENT ----------------------------->
    <!----------------------------- CONTENT ----------------------------->
    <style>
        .d-none {
            display: none;
        }
    </style>
    <script>
        function check() {
            var switer = document.getElementById("flexS");
            var tombol = document.getElementById("tb");
            var tombol2 = document.getElementById("tb2");
            if (switer.checked == true) {
                // tombol.style.display = "block";
                tombol.hidden = true;
                tombol2.hidden = false;
                if (tombol.innerHTML == "CLOSE") {
                    document.getElementById("colTB").className = "accordion-collapse collapse hide";
                    tombol.innerHTML = "TAMBAH";
                }
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
                <h2 class="list-inline-item text-info fw-bold" style="-webkit-text-stroke: 2px rgb(0, 0, 0);">DATA TRANSAKSI</h2>
                <button onclick="tambah()" id="tb" class="btn-primary rounded-2 float-end w-25 p-2 my-1 fw-bold" data-bs-toggle="collapse" data-bs-target="#colTB">TAMBAH</button>
                <a href="?mi=form_data_transaksi"><button id="tb2" class="btn-primary rounded-2 float-end w-25 p-2 my-1 fw-bold" hidden>TAMBAH</button></a>
            </div>
            <div class="accordion-item">
                <div id="colTB" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#data">
                    <div class="accordion-body">
                        <?php include "form_data_transaksi2.php"; ?>
                    </div>
                </div>
            </div>
            <div class="table-size table-scroll table-responsive">
                <table class="table table-bordered table-hover table-striped table-sm" style="font-size:larger;">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Transaksi</th>
                            <th scope="col">Jenis Transaksi</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $row = mysqli_query($conn, "SELECT * from transaksi_h order by tgl_trans DESC");
                        $no = 1;
                        foreach ($row as $row_array) { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row_array['id_trans']; ?></td>
                                <td><?php if ($row_array['jns_trans'] == 'in') {
                                        echo "<span style='color:blue;'> Transaksi Masuk</span>";
                                    } else {
                                        echo "<span style='color:red;'> Transaksi Keluar</span>";
                                    } ?></td>
                                <td><?= $row_array['tgl_trans']; ?></td>
                                <td>
                                    <a class="text-white text-decoration-none" href="?mi=edit_trans&id=<?php echo $row_array['id_trans']; ?>&detail_id=0"><button class="btn-primary w-100">Edit</button></a>
                                    <a class="text-white text-decoration-none" href="?mi=hapus_trans&id=<?php echo $row_array['id_trans']; ?>"><button class="btn-danger w-100">Delete</button></a>
                                </td>
                            </tr>
                        <?php $no++;
                        }
                        ?><tr>
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