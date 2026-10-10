<?php
require "koneksi.php";

$namaPaket = $jenis = $durasi = $ketentuan = "";
$namaPaketErr = $jenisErr = $durasiErr = $ketentuanErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi Nama Paket
    $namaPaket = trim($_POST["nama_paket"]);
    if (empty($namaPaket)) {
        $namaPaketErr = "Nama paket wajib diisi";
    }

    // Validasi Jenis Paket
    $jenis = $_POST["jenis"] ?? "";
    if (empty($jenis)) {
        $jenisErr = "Pilih jenis paket";
    }

    // Validasi Durasi Sewa
    $durasi = trim($_POST["durasi"]);
    if (empty($durasi)) {
        $durasiErr = "Durasi sewa wajib diisi";
    }

    // Validasi Ketentuan
    $ketentuan = trim($_POST["ketentuan"]);
    if (empty($ketentuan)) {
        $ketentuanErr = "Ketentuan wajib diisi";
    }

    // Kalau semua valid, simpan ke database
    if (!$namaPaketErr && !$jenisErr && !$durasiErr && !$ketentuanErr) {
        $query = "INSERT INTO paket_rental (nama_paket, jenis, durasi, ketentuan) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $namaPaket, $jenis, $durasi, $ketentuan);
        mysqli_stmt_execute($stmt);

        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Paket Rental</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <span class="logo">RentalKu</span>
    <a href="index.php">Daftar Paket</a>
    <a href="tambah.php">Tambah Paket</a>
</div>

<div class="container">
    <div class="card">
        <h2>Tambah Paket Rental</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="form-group">
                <label for="nama_paket">Nama Paket:</label>
                <input type="text" id="nama_paket" name="nama_paket" value="<?php echo $namaPaket; ?>" placeholder="Contoh: Paket Liburan Keluarga">
                <span class="error"><?php echo $namaPaketErr ? "* $namaPaketErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="jenis">Jenis Paket:</label>
                <select id="jenis" name="jenis">
                    <option value="">-- Pilih --</option>
                    <option value="Lepas Kunci" <?php echo ($jenis == "Lepas Kunci") ? "selected" : ""; ?>>Lepas Kunci</option>
                    <option value="All-in" <?php echo ($jenis == "All-in") ? "selected" : ""; ?>>All-in</option>
                    <option value="Luar Kota" <?php echo ($jenis == "Luar Kota") ? "selected" : ""; ?>>Luar Kota</option>
                </select>
                <span class="error"><?php echo $jenisErr ? "* $jenisErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="durasi">Durasi Sewa:</label>
                <input type="text" id="durasi" name="durasi" value="<?php echo $durasi; ?>" placeholder="Contoh: 3 hari 2 malam">
                <span class="error"><?php echo $durasiErr ? "* $durasiErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="ketentuan">Ketentuan:</label>
                <textarea id="ketentuan" name="ketentuan" placeholder="Contoh: Termasuk driver dan BBM"><?php echo $ketentuan; ?></textarea>
                <span class="error"><?php echo $ketentuanErr ? "* $ketentuanErr" : ""; ?></span>
            </div>

            <div class="button-container">
                <button type="submit" class="btn">Simpan Paket</button>
                <a href="index.php" class="btn btn-outline">Batal</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
