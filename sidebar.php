<?php
$level = $_SESSION['level'];
if ($level == 1) {
    $desc = "Administrator";
} else {
    $desc = "Staf Gudang";
}
?>

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-info sidebar collapse">
    <div class="position-sticky pt-5">
        <h3><?= $desc; ?></h3>

        <?php if ($level == 1) { ?>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?mi=data">
                        <span data-feather="layers"></span>
                        Data Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?mi=data_supp">
                        <span data-feather="bar-chart-2"></span>
                        Data Supplier
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?mi=data_cust">
                        <span data-feather="users"></span>
                        Data Customer
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?mi=data_transaksi">
                        <span data-feather="users"></span>
                        Data Transaksi
                    </a>
                </li>
            </ul>

        <?php } else { ?>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?mi=data">
                        <span data-feather="layers"></span>
                        Data Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?mi=data_transaksi">
                        <span data-feather="users"></span>
                        Data Transaksi
                    </a>
                </li>
            </ul>
        <?php } ?>


    </div>
</nav>