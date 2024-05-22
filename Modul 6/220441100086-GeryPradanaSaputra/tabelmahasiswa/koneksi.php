<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "mahasiswa";

$kon = mysqli_connect($host,$user,$password,$database);
if (!$kon) {
    die("koneksi gagal: " . mysqli_connect_eror());
} 

?>