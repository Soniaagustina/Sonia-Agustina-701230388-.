isset()
	•	Fungsi: Memeriksa apakah suatu variabel sudah diatur/didefinisikan dan tidak bernilai null.
	•	Hasil:
	•	true jika variabel ada dan tidak bernilai null.
	•	false jika variabel tidak ada atau bernilai null.
	2.	empty()
	•	Fungsi: Memeriksa apakah suatu variabel bernilai kosong.
Variabel dianggap kosong jika:
	•	Nilainya false, null, 0, '0', string kosong '', atau array kosong.
	•	Hasil:
	•	true jika variabel bernilai kosong.
	•	false jika variabel memiliki nilai yang dianggap “tidak kosong”.
<?php
// Variabel untuk contoh
$var1 = null;
$var2 = "";
$var3 = 0;
$var4 = "Hello, PHP!";

// Pemeriksaan dengan isset()
echo "Hasil isset():<br>";
echo "isset(\$var1): " . (isset($var1) ? 'true' : 'false') . "<br>"; // false
echo "isset(\$var2): " . (isset($var2) ? 'true' : 'false') . "<br>"; // true
echo "isset(\$var3): " . (isset($var3) ? 'true' : 'false') . "<br>"; // true
echo "isset(\$var4): " . (isset($var4) ? 'true' : 'false') . "<br>"; // true

echo "<br>";

// Pemeriksaan dengan empty()
echo "Hasil empty():<br>";
echo "empty(\$var1): " . (empty($var1) ? 'true' : 'false') . "<br>"; // true
echo "empty(\$var2): " . (empty($var2) ? 'true' : 'false') . "<br>"; // true
echo "empty(\$var3): " . (empty($var3) ? 'true' : 'false') . "<br>"; // true
echo "empty(\$var4): " . (empty($var4) ? 'true' : 'false') . "<br>"; // false
?>
