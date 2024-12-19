<?php
$servername = "localhost";
$database = "dbsiswa";
$username = "root";
$password = "";
 
$conn = mysqli_connect($servername, $username, $password,$database);

if (!$conn) {
    die("koneksi gagal : " .mysqli_connect_error());
} else {
    echo "koneksi berhasil";
    mysqli_set_charset($conn, "utf8");
}
?>