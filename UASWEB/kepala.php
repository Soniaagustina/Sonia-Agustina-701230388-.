<?php
session_start();
// Koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$db = "sekolah";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fungsi untuk filter data
$tahun_ajaran = isset($_GET['tahun_ajaran']) ? $_GET['tahun_ajaran'] : date('Y');
$kelas = isset($_GET['kelas']) ? $_GET['kelas'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';

// Query dasar
$query = "SELECT * FROM siswa_baru WHERE 1=1";

// Tambahkan filter
if($tahun_ajaran) {
    $query .= " AND tahun_ajaran = '$tahun_ajaran'";
}
if($kelas) {
    $query .= " AND kelas = '$kelas'";
}
if($status) {
    $query .= " AND status_pendaftaran = '$status'";
}

$result = mysqli_query($koneksi, $query);

// Hitung total siswa
$total_query = "SELECT COUNT(*) as total FROM siswa_baru WHERE tahun_ajaran = '$tahun_ajaran'";
$total_result = mysqli_query($koneksi, $total_query);
$total_data = mysqli_fetch_assoc($total_result);

// Hitung statistik status pendaftaran
$status_query = "SELECT status_pendaftaran, COUNT(*) as jumlah 
                 FROM siswa_baru 
                 WHERE tahun_ajaran = '$tahun_ajaran' 
                 GROUP BY status_pendaftaran";
$status_result = mysqli_query($koneksi, $status_query);
$status_data = [];
while($row = mysqli_fetch_assoc($status_result)) {
    $status_data[$row['status_pendaftaran']] = $row['jumlah'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa Baru - Panel Kepala Sekolah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        .stat-card {
            background: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .filters {
            margin-bottom: 20px;
            padding: 15px;
            background: #fff;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .status {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
        }
        .status.diterima {
            background: #d4edda;
            color: #155724;
        }
        .status.pending {
            background: #fff3cd;
            color: #856404;
        }
        .status.ditolak {
            background: #f8d7da;
            color: #721c24;
        }
        .export-btn {
            background: #28a745;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Dashboard Data Siswa Baru</h2>
            <button class="export-btn" onclick="exportToExcel()">Export Excel</button>
        </div>

        <!-- Statistik -->
        <div class="stats">
            <div class="stat-card">
                <h3>Total Pendaftar</h3>
                <h2><?php echo $total_data['total']; ?></h2>
            </div>
            <div class="stat-card">
                <h3>Diterima</h3>
                <h2><?php echo isset($status_data['Diterima']) ? $status_data['Diterima'] : 0; ?></h2>
            </div>
            <div class="stat-card">
                <h3>Pending</h3>
                <h2><?php echo isset($status_data['Pending']) ? $status_data['Pending'] : 0; ?></h2>
            </div>
            <div class="stat-card">
                <h3>Ditolak</h3>
                <h2><?php echo isset($status_data['Ditolak']) ? $status_data['Ditolak'] : 0; ?></h2>
            </div>
        </div>

        <!-- Filter -->
        <div class="filters">
            <form method="GET">
                <select name="tahun_ajaran">
                    <?php
                    $tahun_sekarang = date('Y');
                    for($i = $tahun_sekarang; $i >= $tahun_sekarang-5; $i--) {
                        $selected = ($i == $tahun_ajaran) ? 'selected' : '';
                        echo "<option value='$i' $selected>$i</option>";
                    }
                    ?>
                </select>
                <select name="kelas">
                    <option value="">Semua Kelas</option>
                    <option value="7" <?php echo $kelas == '7' ? 'selected' : ''; ?>>Kelas 7</option>
                    <option value="8" <?php echo $kelas == '8' ? 'selected' : ''; ?>>Kelas 8</option>
                    <option value="9" <?php echo $kelas == '9' ? 'selected' : ''; ?>>Kelas 9</option>
                </select>
                <select name="status">
                    <option value="">Semua Status</option>
                    <option value="Diterima" <?php echo $status == 'Diterima' ? 'selected' : ''; ?>>Diterima</option>
                    <option value="Pending" <?php echo $status == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                    <option value="Ditolak" <?php echo $status == 'Ditolak' ? 'selected' : ''; ?>>Ditolak</option>
                </select>
                <button type="submit">Filter</button>
            </form>
        </div>

        <!-- Tabel Data -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>No. Pendaftaran</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Asal Sekolah</th>
                    <th>Nilai Rata-rata</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while($row = mysqli_fetch_assoc($result)) {
                    $status_class = strtolower($row['status_pendaftaran']);
                    echo "<tr>";
                    echo "<td>".$no++."</td>";
                    echo "<td>".$row['no_pendaftaran']."</td>";
                    echo "<td>".$row['nama_siswa']."</td>";
                    echo "<td>".$row['jenis_kelamin']."</td>";
                    echo "<td>".$row['asal_sekolah']."</td>";
                    echo "<td>".$row['nilai_rata_rata']."</td>";
                    echo "<td>Kelas ".$row['kelas']."</td>";
                    echo "<td><span class='status $status_class'>".$row['status_pendaftaran']."</span></td>";
                    echo "<td>".date('d/m/Y', strtotime($row['tanggal_daftar']))."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function exportToExcel() {
            window.location.href = 'export_excel.php?tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas=<?php echo $kelas; ?>&status=<?php echo $status; ?>';
        }
    </script>
</body>
</html>