<?php

function luaspersegipanjang($panjang,$lebar)
{
    $hasil = $panjang * $lebar;
    return $hasil;
}

$hasil = luaspersegipanjang(5,10);
echo $hasil;
echo "<br>";

//memanggil fungsi
$panjang = 5;
$lebar = 10;
echo 'hasil perkalian '. $panjang . 'x' . $lebar . 'adalah:' . luaspersegipanjang($panjang,$lebar);
?>