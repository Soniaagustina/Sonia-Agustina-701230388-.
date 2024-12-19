<?php

function hitungluaspersegipanjang($panjang,$lebar) {
    return $panjang * $lebar;
}

$panjang = 10;
$lebar =5;

$luas = hitungluaspersegipanjang($panjang,$lebar);

echo "luaspersegi panjang dengan panjang $panjang dan $lebar adalah:$luas";
?>