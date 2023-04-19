<h2>Data Transaksi</h2>
<a href="?mi=formtrans" class="btn btn-primary">Tambah Transaksi</a>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Transaksi</th>
                <th scope="col">Jenis Transaksi</th>
                <th scope="col">No. Telephon</th>
                <th scope="col">Option</th>
            </tr>
        </thead>
        <tbody>
            <?php $row = mysqli_query($conn, "SELECT * from transaksi_h order by tgl_trans DESC");
            $no = 1;
            foreach ($row as $row_array) { ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row_array['id_transaksi']; ?></td>
                    <td><?php if ($row_array['jns_trans'] == 'in') {
                        echo "<span style='color:blue;'> Transaksi Masuk</span>";
                    } else {
                        echo "<span style='color:red;'> Transaksi Keluar</span>";
                    } ?></td>
                    <td><?= $row_array['tgl_trans']; ?></td>
                    <td>
                        <a href="?mi=edit_trans&id=<?php echo $row_array['id_transaksi']; ?>">Edit</a>
                        <a href="?mi=hapus_trans&id=<?php echo $row_array['id_transaksi']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php $no++;
            }
            ?>
        </tbody>
    </table>
</div>