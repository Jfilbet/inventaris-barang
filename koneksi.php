<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_crud";

$koneksi = mysqli_connect($host, $user, $pass, $db);

// kalau gagal konek
if (!$koneksi) {
    die("Koneksi gagal : " . mysqli_connect_error());
}
?>
