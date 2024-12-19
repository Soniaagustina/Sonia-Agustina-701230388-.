<?php
function hitungDiskon($jumlahBayar) {
    if ($jumlahBayar >= 500000) {
        $diskon = 0.5; // 50%
    } elseif ($jumlahBayar >= 100000) {
        $diskon = 0.1; // 10%
    } elseif ($jumlahBayar >= 50000) {
        $diskon = 0.05; // 5%
    } else {
        $diskon = 0.0; // 0%
    }

    $jumlahDiskon = $jumlahBayar * $diskon;
    $totalBayar = $jumlahBayar - $jumlahDiskon;

    return array($diskon * 100, $jumlahDiskon, $totalBayar);
}

// Input jumlah bayar dari pengguna
echo "Masukkan jumlah bayar: ";
$jumlahBayar = trim(fgets (STDIN));

// Menghitung diskon
list($persentaseDiskon, $jumlahDiskon, $totalBayar) = hitungDiskon($jumlahBayar);

// Menampilkan hasil
echo "Diskon: $persentaseDiskon%\n";
echo "Jumlah diskon: Rp " . number_format($jumlahDiskon, 2, ',', '.') . "\n";
echo "Total yang harus dibayar: Rp " . number_format($totalBayar, 2, ',', '.') . "\n";
?>