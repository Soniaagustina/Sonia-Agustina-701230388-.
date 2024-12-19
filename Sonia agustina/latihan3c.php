<?php
function pangkat($angka, $pangkat) {
    return pow($angka, $pangkat);
}

// Testing the function
$angka = 5;
$pangkat = 4;
$hasil = pangkat($angka, $pangkat);

echo "$angka pangkat $pangkat = $hasil";
?>