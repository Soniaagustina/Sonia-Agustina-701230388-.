<?php
$str = "Belajar PHP ternyata Menyenangkan";
echo strtolower($str); //Ubah huruh ke kecil semua
echo "<br>";
echo strtoupper($str); //Ubah huruf ke besar semua
echo "<br>";
echo str_replace("menyenangkan", "mudah lho",$str); //mengganti string
echo "<br><br>";


$a = pow(2, 10);  //funfsi perpangkatan
$b = sqrt(100);  //fungsi akar
$c = ceil(4.25);  //pembulatan keatas
$d = floor(4.25); //pembulatan ke bawah
echo "2 pangkat 10 = $a <br>";
echo "akar 100 = $b <br>";
echo "ceil(4.25) = $c <br>";
echo "floor(4.25) = $d <br>";
?>