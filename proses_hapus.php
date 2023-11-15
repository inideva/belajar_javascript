<?php
include "koneksi.php";

$result = mysqli_query(
    $conn, "DELETE FROM `pelanggan` where `id`='$_GET[id]'");

header("Location:index.php");
?>