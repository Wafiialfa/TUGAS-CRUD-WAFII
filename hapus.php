<?php
require "koneksi.php";

$id = $_GET['id'] ?? null;

if ($id) {
    $query = "DELETE FROM paket_rental WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}

header("Location: index.php?status=berhasil_hapus");
exit();
?>
