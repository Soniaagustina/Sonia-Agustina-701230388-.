<?php
// Start session untuk menyimpan data sementara
session_start();

// Inisialisasi data jika belum ada
if (!isset($_dbsiswa['tbanggotasiswa'])) {
    $_dbsiswa['tbanggotasiswa'] = [
        ['id' => 1, 'nama' => 'Ahmad', 'nik' => '09876', 'tgl_lahir' => '1990-01-01', 'jenis_kelamin' => 'Laki-Laki', 'no_hp' => '081234567890', 'email' => 'ahmad@example.com', 'alamat' => 'Jakarta', 'foto' => 'foto1.jpg'],
        ['id' => 2, 'nama' => 'Siti', 'nik' => '09877', 'tgl_lahir' => '1995-05-15', 'jenis_kelamin' => 'Perempuan', 'no_hp' => '081987654321', 'email' => 'siti@example.com', 'alamat' => 'Bandung', 'foto' => 'foto2.jpg']
    ];
}

// Tambah/Edit Data
if (isset($_POST['simpan'])) {
    $id = $_POST['id'] ? $_POST['id'] : count($_dbsiswa['tbanggotasiswa']) + 1;
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $foto = $_POST['foto'];

    if (isset($_POST['edit_id']) && $_POST['edit_id'] !== '') {
        // Edit data
        $index = $_POST['edit_id'];
        $_dbsiswa['tbanggotasiswa'][$index] = compact('id', 'nama', 'nik', 'tgl_lahir', 'jenis_kelamin', 'no_hp', 'email', 'alamat', 'foto');
    } else {
        // Tambah data baru
        $_dbsiswa['tbanggotasiswa'][] = compact('id', 'nama', 'nik', 'tgl_lahir', 'jenis_kelamin', 'no_hp', 'email', 'alamat', 'foto');
    }
}

// Hapus Data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    unset($_dbsiswa['tbanggotasiswa'][$id]);
    $_dbsiswa['tbanggotasiswa'] = array_values($_dbsiswa['tbanggotasiswa']); // Reindex array
}

// Pencarian Data
$search = isset($_GET['cari']) ? strtolower($_GET['cari']) : '';
$dataperson = $_dbsiswa['tbanggotasiswa'];
if ($search !== '') {
    $dataperson = array_filter($dataperson, function($item) use ($search) {
        return strpos(strtolower($item['nama']), $search) !== false;
    });
}

$dataPerson = $_dbsiswa['tbanggotasiswa'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data siswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid #ddd; text-align: center; }
        th, td { padding: 10px; }
        th { background-color:rgb(0, 255, 76); color: white; }
        .btn { padding: 5px 10px; text-decoration: none; color: white; border-radius: 4px; }
        .btn-edit { background-color:rgb(241, 15, 162); }
        .btn-hapus { background-color:rgb(102, 23, 14); }
        input, button { padding: 5px; }
        form { margin: 10px 0; }
        img { width: 50px; height: 50px; border-radius: 50%; }
    </style>
</head>
<body>
    <h2>Data siswa</h2>

    <!-- Form Pencarian -->
    <form method="GET">
        <input type="text" name="cari" placeholder="Masukkan kata kunci..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit" class="btn btn-cari">Cari</button>
        <a href="?"><button type="button" class="btn btn-hapus">Reset</button></a>
    </form>

    

    <!-- Tabel Data -->
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>nik</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>No Handphone</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php if (count($dataPerson) > 0): ?>
            <?php foreach ($dataPerson as $index => $item): ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo htmlspecialchars($item['nama']); ?></td>
                    <td><?php echo htmlspecialchars($item['nik']); ?></td>
                    <td><?php echo htmlspecialchars($item['tgl_lahir']); ?></td>
                    <td><?php echo htmlspecialchars($item['jenis_kelamin']); ?></td>
                    <td><?php echo htmlspecialchars($item['no_hp']); ?></td>
                    <td><?php echo htmlspecialchars($item['email']); ?></td>
                    <td><?php echo htmlspecialchars($item['alamat']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($item['foto']); ?>" alt="Foto"></td>
                    <td>
                        <a href="inputdata.php" class="btn btn-edit">Edit</a>
                        <a href="?hapus=<?php echo $index; ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-hapus">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="10">Tidak ada data.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>