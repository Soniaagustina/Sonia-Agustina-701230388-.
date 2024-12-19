<?php
// Ambil data dari form
$namaToko = $_POST['nama_toko'];
$alamatToko = $_POST['alamat_toko'];
$noTelp = $_POST['no_telp'];
$tanggal = date("Y-m-d H:i:s");

$items = [];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];

foreach ($_POST['item'] as $key => $item) {
    $items[] = [
        "nama" => $item,
        "harga" => $harga[$key],
        "jumlah" => $jumlah[$key],
    ];
}

// Hitung total
$total = 0;
foreach ($items as $item) {
    $subtotal = $item['harga'] * $item['jumlah'];
    $total += $subtotal;
}

// Tampilkan struk
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top:  
        }