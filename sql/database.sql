CREATE TABLE pasien (
    id_pasien INT AUTO_INCREMENT,
    id_eksternal VARCHAR(255),
    nama_lengkap VARCHAR(255) NOT NULL,
    nama_panggilan VARCHAR(255),
    no_telpon VARCHAR(11) NOT NULL,
    jenis_kelamin VARCHAR(255),
    ras VARCHAR(255),
    alamat TEXT,
    kode_negara VARCHAR(255),
    bahasa_utama VARCHAR(255),
    status_pernikahan VARCHAR(255),
    kewarganegaraan VARCHAR(255),
    tempat_lahir VARCHAR(255),
    tanggal_lahir DATE,
    indikator_meninggal VARCHAR(255),
    id_insuransi INT,
    CONSTRAINT pk_pasien PRIMARY KEY (id_pasien),
    CONSTRAINT fk_insuransi FOREIGN KEY (id_insuransi) REFERENCES insuransi(id_insuransi)
);  


CREATE TABLE insuransi (
	id_insuransi INT AUTO_INCREMENT,
    no_polis INT,
    nama_perusahaan VARCHAR(255),
    alamat_perusahaan VARCHAR(255),
    tanggal_polis DATE,
    no_telepon_perusahaan VARCHAR(11),
    tanggal_polis_awal DATE,
    tanggal_polis_akhir DATE,
    jenis_pertanggungan VARCHAR(255),
    CONSTRAINT pk_insuransi PRIMARY KEY (id_insuransi)
);

CREATE TABLE dokter (
    id_dokter INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    jenis_kelamin VARCHAR(255),
    tanggal_lahir DATE NOT NULL,
    no_telepon VARCHAR(15),
    email VARCHAR(100),
    alamat TEXT,
    spesialis VARCHAR(100)
);

CREATE TABLE layanan (
    id_layanan INT PRIMARY KEY AUTO_INCREMENT,
    nama_layanan VARCHAR(255) NOT NULL,
    harga DECIMAL(10, 2) NOT NULL,
    id_dokter INT,
    FOREIGN KEY (id_dokter) REFERENCES dokter(id_dokter) ON DELETE SET NULL
);

CREATE TABLE transaksi (
    id_transaksi INT PRIMARY KEY AUTO_INCREMENT,
    id_pasien INT NOT NULL,
    nama_layanan VARCHAR(225) NOT NULL,
    jenis_pembayaran VARCHAR(50) NOT NULL,
    total_harga DECIMAL(10, 2) NOT NULL,
    potongan_harga DECIMAL(5, 2),
    tanggal DATE NOT NULL,
    waktu TIME NOT NULL,
    FOREIGN KEY (id_pasien) REFERENCES pasien(id_pasien) ON DELETE CASCADE
);



--ISI TABEL INSURANSI
INSERT INTO insuransi (no_polis, nama_perusahaan, alamat_perusahaan, tanggal_polis, no_telepon_perusahaan, tanggal_polis_awal, tanggal_polis_akhir, jenis_pertanggungan) VALUES
(1001, 'Asuransi Sehat', 'Jl. Sehat No. 1, Jakarta', '2023-01-15', '08123456789', '2023-01-15', '2024-01-15', 'Kesehatan'),
(1002, 'Asuransi Keluarga', 'Jl. Keluarga No. 5, Bandung', '2022-03-20', '08987654321', '2022-03-20', '2023-03-20', 'Keluarga'),
(1003, 'Asuransi Kendaraan', 'Jl. Otomotif No. 7, Surabaya', '2023-05-10', '08223344556', '2023-05-10', '2024-05-10', 'Kendaraan'),
(1004, 'Asuransi Properti', 'Jl. Properti No. 2, Medan', '2022-06-25', '08765432100', '2022-06-25', '2023-06-25', 'Properti'),
(1005, 'Asuransi Perjalanan', 'Jl. Wisata No. 9, Yogyakarta', '2023-07-30', '08556677889', '2023-07-30', '2024-07-30', 'Perjalanan');

--ISI TABEL PASIEN
INSERT INTO pasien (id_eksternal, nama_lengkap, nama_panggilan, no_telpon, jenis_kelamin, ras, alamat, kode_negara, bahasa_utama, status_pernikahan, kewarganegaraan, tempat_lahir, tanggal_lahir, indikator_meninggal, id_insuransi)
VALUES 
('P001', 'John Doe', 'John', '08123456789', 'Laki-laki', 'Asia', 'Jl. Mawar No. 1', 'ID', 'Bahasa Indonesia', 'Belum Menikah', 'Indonesia', 'Jakarta', '1980-01-01', 'Tidak', 1),
('P002', 'Jane Smith', 'Jane', '08123456788', 'Perempuan', 'Kaukasia', 'Jl. Melati No. 2', 'US', 'English', 'Menikah', 'Amerika Serikat', 'New York', '1985-02-02', 'Tidak', 2),
('P003', 'Michael Johnson', 'Mike', '08123456787', 'Laki-laki', 'Afrika', 'Jl. Anggrek No. 3', 'NG', 'Igbo', 'Menikah', 'Nigeria', 'Lagos', '1990-03-03', 'Tidak', 3),
('P004', 'Emily Davis', 'Emily', '08123456786', 'Perempuan', 'Hispanik', 'Jl. Kenanga No. 4', 'ES', 'Spanish', 'Belum Menikah', 'Spanyol', 'Madrid', '1995-04-04', 'Tidak', 4),
('P005', 'William Brown', 'Will', '08123456785', 'Laki-laki', 'Asia', 'Jl. Kamboja No. 5', 'JP', 'Japanese', 'Menikah', 'Jepang', 'Tokyo', '2000-05-05', 'Tidak', 5);


--ISI TABEL DOKTER
INSERT INTO dokter (nama, jenis_kelamin, tanggal_lahir, no_telepon, email, alamat, spesialis) VALUES
('Dr. Andi Pratama', 'L', '1980-06-15', '081234567890', 'andi.pratama@gmail.com', 'Jl. Merpati No. 12, Jakarta', 'Bedah Umum'),
('Dr. Siti Aminah', 'P', '1985-03-22', '089876543210', 'siti.aminah@gmail.com', 'Jl. Melati No. 5, Bandung', 'Pediatri'),
('Dr. Budi Santoso', 'L', '1978-10-10', '082233445566', 'budi.santoso@gmail.com', 'Jl. Kenanga No. 7, Surabaya', 'Kardiologi'),
('Dr. Dewi Lestari', 'P', '1990-12-05', '087654321009', 'dewi.lestari@gmail.com', 'Jl. Kamboja No. 9, Medan', 'Dermatologi'),
('Dr. Rudi Prasetyo', 'L', '1987-08-25', '081122334455', 'rudi.prasetyo@gmail.com', 'Jl. Anggrek No. 3, Semarang', 'Ortopedi');

--ISI TABEL LAYANAN
INSERT INTO layanan (nama_layanan, harga, id_dokter) VALUES
('Konsultasi Umum', 150000.00, 1),
('Operasi Bedah Umum', 5000000.00, 1),
('Pemeriksaan Jantung', 300000.00, 3),
('Perawatan Kulit', 250000.00, 4),
('Pemeriksaan Anak', 200000.00, 2);

--ISI TABEL TRANSAKSI
INSERT INTO transaksi (id_pasien, id_layanan, jenis_pembayaran, biaya_layanan, potongan_harga, tanggal, waktu) 
VALUES
(1, 1, 'Qris', 150000.00, 10, '2024-10-01', '10:30:00'),
(2, 2, 'Tunai', 200000.00, 10, '2024-10-02', '14:45:00'),
(3, 3, 'Tunai', 300000.00, 10, '2024-10-03', '09:15:00'),
(4, 1, 'Tunai', 150000.00, 10, '2024-10-04', '11:00:00'),
(5, 4, 'Qris', 500000.00, 10, '2024-10-05', '16:30:00');

ALTER TABLE transaksi DROP FOREIGN KEY transaksi_ibfk_2;

ALTER TABLE transaksi DROP COLUMN id_layanan;
ALTER TABLE transaksi ADD nama_layanan VARCHAR(255);