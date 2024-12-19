<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penerimaan Siswa </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, textarea, button {
            margin-top: 5px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
    <?php
    include "koneksi.php"
    ?>

</head>
<body>
    
    <h2>Input Data</h2>
    <form>
        <label for="id">id</label>
        <input type="text" id="name" name="name"  placeholder>

        <label for="nama">Nama</label>
        <input type="text" id="school" name="nama"  placeholder= "masukan nama">

        <label for="jenis Kelamin">Jenis Kelamin</label>
        <input type="text" id="jenis_kelamin" name="jenis_kelamin" list="jenis_kelamin-list" placeholder="Masukkan jenis kelamin">
        <datalist id="jenis_kelamin-list">
            <option value="perempuan"></option>
            <option value="lelaki"></option>
        </datalist>

        <label for="tanggal lahir">Tanggal Lahir</label>
        <input type="text" id="tanggal" name="tangal" placeholder="Masukkan Tanggal Lahir">

        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat">

        <label for="alamat">Agama</label>
        <textarea id="agama" name="agama" rows="4" placeholder="Masukkan agama"></textarea>

        <label for="phone">No hanphone</label>
        <input type="text" id="phone" name="phone" placeholder="Masukkan phone">

        <label for="Email">Email</label>
        <input type="text" id="tanggal" name="Email" placeholder="Masukkan Email">

        <label for="Gambar">Gambar</label>
        <input type="file" id="gambar" name="gambar">
        
        <button type="submit"><a href="crud.php">Simpan</a></button>
        </a>
    </form>
    
</body>
</html>