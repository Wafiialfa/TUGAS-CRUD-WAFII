

CREATE DATABASE IF NOT EXISTS db_rental;
USE db_rental;

CREATE TABLE IF NOT EXISTS paket_rental (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_paket VARCHAR(100) NOT NULL,
    jenis VARCHAR(50) NOT NULL,
    durasi VARCHAR(100) NOT NULL,
    ketentuan TEXT NOT NULL
);


INSERT INTO paket_rental (nama_paket, jenis, durasi, ketentuan) VALUES
('Paket Harian Hemat', 'Lepas Kunci', '1 hari', 'Tanpa driver, BBM ditanggung penyewa'),
('Paket Liburan Keluarga', 'All-in', '3 hari 2 malam', 'Termasuk driver dan BBM'),
('Paket Antar Kota', 'Luar Kota', 'Fleksibel', 'Wajib driver');
