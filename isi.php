<div class="row g-3">
    <div class="col-md-6">
        <div class="input-group mb-4 d-none supplier_show">
            <label for="Nama Supplier" class="form-label col-form-label col-3">Supplier</label>
            <select class="form-control" name="supplier_id" id="supplier_id">
                <option value="0">--Pilih--</option>
                <?php
                $query_supp = mysqli_query($conn, "SELECT * From db_suplier");

                while ($supp = mysqli_fetch_array($query_supp)) {
                ?>
                    <option value="<? echo $supp['id']; ?>"></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-sm-6 d-none cust_show">
            <label for="Nama Supplier" class="form-label">Customer</label>
            <select class="form-control" name="cust_id" id="cust_id">
                <option value="0">--Pilih--</option>
                <?php
                $query_cust = mysqli_query($conn, "SELECT * From db_cust");
                while ($cust = mysqli_fetch_array($query_cust)) {
                ?>
                    <option value="<?php echo $cust['kd_cust']; ?>">
                        <?php echo $cust['nm_cust']; ?></option>
                <?php } ?>

            </select>
        </div>
    </div>