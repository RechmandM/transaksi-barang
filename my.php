<?php
// include "./config/koneksi.php";

$data = [
    // "satu" => "satuuuuuuu",
    // "dua" => "duaaaaaaaaaa",
    "tablesatu" => [
        "satu" => "satuuuuuuu",
        "dua" => "duaaaaaaa",
        "tiga" => "tigaaaaa",
    ],
    "tabledua" => [
        "satu" => "aaaaaaaa",
        "dua" => "bbbbbbbbb",
        "tiga" => "ccccccccc",
    ]
];
foreach ($data as $dat) {
    echo $dat['satu'] . PHP_EOL;
    echo $dat['dua'] . PHP_EOL;
    echo $dat['tiga'] . PHP_EOL;
};
// echo $data['satu'];