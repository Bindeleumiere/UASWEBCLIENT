<?php
$koneksi = mysqli_connect("localhost", "root", "", "rt");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
