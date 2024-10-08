CREATE DATABASE hospital_billing;

CREATE TABLE pasien (
	id_pasien  INT AUTO_INCREMENT,
    nama VARCHAR(255) NOT NULL,
    no_telpon VARCHAR(11) NOT NULL,
    jenis_kelamin VARCHAR(255),
    tempat_lahir VARCHAR(255),
    tanggal_lahir DATE,
    CONSTRAINT pk_pasien PRIMARY KEY (id_pasien)
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
    jenis_kelamin ENUM('L', 'P') NOT NULL,
    tanggal_lahir DATE NOT NULL,
    no_telepon VARCHAR(15),
    email VARCHAR(100),
    alamat TEXT,
    spesialis VARCHAR(100)
);


