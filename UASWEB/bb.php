<?php
// Start session untuk menyimpan data sementara
session_start();

// Inisialisasi data inventaris jika belum ada


// Tambah/Edit Data
if (isset($_POST['simpan'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    // Edit data jika sudah ada
    if (isset($_POST['id']) && $_POST['kode'] !== '') {
        $_SESSION['dataBarang'][$_POST['kode']] = ['kode' => $kode, 'nama' => $nama, 'asal' => $asal, 'jumlah' => $jumlah, 'tanggal' => $tanggal];
    } else { 
        // Tambah data baru
        $_SESSION['dataBarang'][] = ['kode' => $kode, 'nama' => $nama, 'asal' => $asal, 'jumlah' => $jumlah, 'tanggal' => $tanggal];
    }
}

// Hapus Data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    unset($_SESSION['dataBarang'][$id]);
    $_SESSION['dataBarang'] = array_values($_SESSION['dataBarang']); // Reindex array
}

// Pencarian Data
$search = isset($_GET['cari']) ? strtolower($_GET['cari']) : '';
$dataBarang = $_SESSION['dataBarang'];
if ($search !== '') {
    $dataBarang = array_filter($dataBarang, function($item) use ($search) {
        return strpos(strtolower($item['nama']), $search) !== false;
    });
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data siswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ddd; text-align: center; }
        th, td { padding: 20px; }
        th { background-color: #007bff; color: white; }
        .btn { padding: 5px 10px; text-decoration: none; color: white; border-radius: 4px; }
        .btn-edit {background-color: #f1c40f; }
        .btn-hapus { background-color: #e74c3c; }
        .btn-cari { background-color: #007bff; color: white; }
        input, button { padding: 5px; }
        form { margin: 10px 0; }
    </style>
</head>
<body>


    <h2>Hasil</h2>

    <!-- Form Pencarian -->
    <form method="GET">
        <input type="text" name="cari" placeholder="Masukkan kata kunci..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit" class="btn btn-cari">Cari</button>
        <a href="?"><button type="button" class="btn btn-hapus">Reset</button></a>
    </form>

   

    <!-- Tabel Data -->
    <table>
        <tr>
            <th>id</th>
            <th>nama</th>
            <th>jenis kelamin</th>
            <th>tanggal lahir</th>
            <th>alamat</th>
            <th>Agama</th>
            <th>no hanphone</th>
            <th>email</th>
            <th>gambar</th>
            <th>Aksi</th>
            
        </tr>
        <?php if (count($dataBarang) > 0): ?>
            <?php foreach ($dataBarang as $index => $item): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo htmlspecialchars($item['kode']); ?></td>
                    <td><?php echo htmlspecialchars($item['nama']); ?></td>
                    <td><?php echo htmlspecialchars($item['asal']); ?></td>
                    <td><?php echo htmlspecialchars($item['jumlah']); ?></td>
                    <td><?php echo htmlspecialchars($item['tanggal']); ?></td>
                    <td>
                        <a href="inputdata.php"?edit=<?php echo $index; ?> class="btn btn-edit ">Edit</a>
                        <a href="?hapus=<?php echo $index; ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-hapus">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="10">Tidak ada data ditemukan.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>