<?php
include "koneksi.php";

$nama= $_POST["nama"];
$jns_klmn= $_POST["jns"];
$no_tlp= $_POST["telp"];
$alamat= $_POST["alamat"];

$result = mysqli_query($conn, "INSERT INTO `pelanggan` (`nama`, `jenis_kelamin`, `telpon`, `alamat`) VALUES ('$nama', '$jns_klmn', '$no_tlp', '$alamat');");

header("Location:index.php");
?>