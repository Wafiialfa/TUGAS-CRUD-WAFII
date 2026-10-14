<?php
require "koneksi.php";

$query = "SELECT * FROM paket_rental ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Paket Rental</title>
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
        <h2>Daftar Paket Rental Mobil</h2>

        <?php if (isset($_GET['status']) && $_POST['status'] == 'berhasil_hapus') { ?>
            <div class="alert-sukses">Paket berhasil dihapus.</div>
        <?php } ?>

        <div style="margin-bottom: 16px;">
            <a href="tambah.php" class="btn">+ Tambah Paket</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nama Paket</th>
                        <th>Jenis</th>
                        <th>Durasi Sewa</th>
                        <th>Ketentuan</th>
                        <th width="140">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0) { ?>
                        <?php while ($baris = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $baris['nama_paket']; ?></td>
                                <td><?php echo $baris['jenis']; ?></td>
                                <td><?php echo $baris['durasi']; ?></td>
                                <td><?php echo $baris['ketentuan']; ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $baris['id']; ?>" class="aksi-edit">Edit</a>
                                    <a href="hapus.php?id=<?php echo $baris['id']; ?>" class="aksi-hapus" onclick="return confirm('Yakin hapus paket ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="5" style="text-align:center; color:#8A8FA3;">Belum ada paket rental.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
