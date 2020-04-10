-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Apr 2020 pada 15.57
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rentalmobil3`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `tb_reg_mobil` (IN `nama_mobil` VARCHAR(225), IN `merk_mobil` VARCHAR(225), IN `tahun_mobil` VARCHAR(4), IN `kapasitas_mobil` INT(11), IN `harga_mobil` DECIMAL(10,0), IN `warna_mobil` VARCHAR(50), IN `plat_no_mobil` VARCHAR(25))  BEGIN
INSERT INTO tb_mobil VALUES (null, NAMA_MOBIL, MERK_MOBIL, TAHUN_MOBIL, KAPASITAS_MOBIL, HARGA_MOBIL, WARNA_MOBIL, PLAT_NO_MOBIL);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gallery_mobil`
--

CREATE TABLE `tb_gallery_mobil` (
  `id_gallery` int(11) NOT NULL,
  `id_mobil` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gallery_mobil`
--

INSERT INTO `tb_gallery_mobil` (`id_gallery`, `id_mobil`, `image`) VALUES
(10, 7, '20180103162810.jpg'),
(11, 6, '20180103162819.jpg'),
(13, 8, '20180115063621.jpg'),
(14, 9, '20180115082005.jpg'),
(15, 10, '20180115082234.jpg'),
(16, 11, '20180115082546.jpg'),
(18, 12, '20180202163710.jpg'),
(19, 5, '20180202163910.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `id_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(225) DEFAULT NULL,
  `merk_mobil` varchar(225) DEFAULT NULL,
  `tahun_mobil` varchar(4) DEFAULT NULL,
  `kapasitas_mobil` int(11) DEFAULT NULL,
  `harga_mobil` decimal(10,0) DEFAULT NULL,
  `warna_mobil` varchar(50) DEFAULT NULL,
  `plat_no_mobil` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mobil`
--

INSERT INTO `tb_mobil` (`id_mobil`, `nama_mobil`, `merk_mobil`, `tahun_mobil`, `kapasitas_mobil`, `harga_mobil`, `warna_mobil`, `plat_no_mobil`) VALUES
(5, 'Avanza Veloz New Editon', 'Toyota', '2017', 5, '250000', 'fff', 'D 4414 TU'),
(6, 'Toyota Rush White', 'TOYOTA', '2017', 10, '200000', 'MERAH', 'D FGH17 D'),
(7, 'Lamborgini Really', 'Lamborgini', '2015', 5, '500000', 'Hitam', 'F 5034 UA'),
(8, 'Honda Jazz', 'Honda', '2016', 5, '500000', 'Putih', 'F 5044 UA'),
(9, 'Kijang Inova Black', 'Mitsubishi', '2018', 8, '600000', 'Hitam', 'F 5444 BU'),
(10, 'Honda Mobilio', 'Honda', '2018', 6, '800000', 'Merah', 'B 3435 JJ'),
(11, 'Nissan Sport F1', 'Nissan', '2017', 6, '1000000', 'Biru', 'G 4544 FF'),
(12, 'Pajero Sport', 'Mitsubishi', '2018', 10, '600000', 'Putih', 'F 5444 BF'),
(21, 'Corolla', 'Toyota', '2020', 4, '200000', 'Putih', 'DK 2012 B'),
(23, 'Jazz', 'Honda', '2001', 4, '200000', 'Kuning', 'N 1245 DK');

--
-- Trigger `tb_mobil`
--
DELIMITER $$
CREATE TRIGGER `delete_mobil_log` AFTER DELETE ON `tb_mobil` FOR EACH ROW BEGIN
INSERT INTO tb_mobil_log VALUES (null,old.NAMA_MOBIL,now());
INSERT INTO tb_mobil_activity VALUES (null,old.NAMA_MOBIL,concat("DLT frm ",old.NAMA_MOBIL),now());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tb_mobil_log` AFTER INSERT ON `tb_mobil` FOR EACH ROW BEGIN
INSERT INTO tb_mobil_log VALUES (null, new.NAMA_MOBIL,now());
INSERT INTO tb_mobil_activity VALUES (null, new.NAMA_MOBIL, "INS ", now());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_mobil_log` AFTER UPDATE ON `tb_mobil` FOR EACH ROW BEGIN
INSERT INTO tb_mobil_log VALUES (null,new.NAMA_MOBIL,now());
INSERT INTO tb_mobil_activity VALUES (null,new.NAMA_MOBIL,concat("UPD FROM ",old.NAMA_MOBIL),now());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mobil_activity`
--

CREATE TABLE `tb_mobil_activity` (
  `act_id` int(11) NOT NULL,
  `nama_mobil` varchar(30) DEFAULT NULL,
  `action` varchar(30) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mobil_activity`
--

INSERT INTO `tb_mobil_activity` (`act_id`, `nama_mobil`, `action`, `time`) VALUES
(1, 'Corolla', 'INS ', '2020-03-10 17:46:50'),
(2, 'Brio', 'INS ', '2020-03-10 17:49:40'),
(3, 'Jazz', 'INS ', '2020-03-10 17:51:34'),
(4, 'Corolla', 'UPD FROM Corolla', '2020-03-10 17:56:37'),
(5, 'Brio', 'DLT frm Brio', '2020-03-10 18:23:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mobil_log`
--

CREATE TABLE `tb_mobil_log` (
  `log_id` int(11) NOT NULL,
  `nama_mobil` varchar(30) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mobil_log`
--

INSERT INTO `tb_mobil_log` (`log_id`, `nama_mobil`, `added_on`) VALUES
(1, 'Corolla', '2020-03-10 17:46:50'),
(2, 'Brio', '2020-03-10 17:49:40'),
(3, 'Jazz', '2020-03-10 17:51:34'),
(4, 'Corolla', '2020-03-10 17:56:37'),
(5, 'Brio', '2020-03-10 18:23:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `kode_transaksi` varchar(125) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tgl_order` datetime DEFAULT NULL,
  `total_pembayaran` decimal(10,0) DEFAULT NULL,
  `tgl_pembayaran` datetime DEFAULT NULL,
  `bukti_pembayaran` text DEFAULT NULL,
  `status_pembayaran` int(11) DEFAULT NULL,
  `status_transaksi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`kode_transaksi`, `id_user`, `tgl_order`, `total_pembayaran`, `tgl_pembayaran`, `bukti_pembayaran`, `status_pembayaran`, `status_transaksi`) VALUES
('TRN-20180202120205-1', 12, '2018-02-02 12:02:05', '250000', '2018-02-02 18:56:01', NULL, 1, 3),
('TRN-20180202120259-0', 38, '2018-02-02 12:02:59', '800000', '2018-02-02 18:55:56', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(225) DEFAULT NULL,
  `name` varchar(225) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `email` varchar(225) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `activated` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `group_user` int(11) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `username`, `name`, `nik`, `email`, `no_telp`, `jenis_kelamin`, `alamat`, `password`, `photo`, `activated`, `created`, `group_user`, `last_login`, `last_update`) VALUES
(12, 'user', 'User', '636382826326', 'user@gmail.com', '08574737373737', 'L', 'bandung', 'ee11cbb19052e40b07aac0ca060c23ee', '151757238620180202125306.jpg', 1, '2018-01-15 08:14:45', 2, NULL, '2018-02-02 12:53:06'),
(38, 'admin', 'Administrator', '6362552527278', 'admin@gmail.com', '0857272737273', 'L', 'bandung', '21232f297a57a5a743894a0e4a801fc3', '151757223820180202125038.jpg', 1, '2018-02-02 12:31:47', 1, '2018-02-02 12:50:38', '2018-02-02 12:50:38'),
(39, 'iye', 'iye', '183140714111042', NULL, NULL, NULL, NULL, 'iye', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_gallery_mobil`
--
ALTER TABLE `tb_gallery_mobil`
  ADD PRIMARY KEY (`id_gallery`),
  ADD KEY `FK_RELATIONSHIP_6` (`id_mobil`);

--
-- Indeks untuk tabel `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `tb_mobil_activity`
--
ALTER TABLE `tb_mobil_activity`
  ADD PRIMARY KEY (`act_id`);

--
-- Indeks untuk tabel `tb_mobil_log`
--
ALTER TABLE `tb_mobil_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `FK_RELATIONSHIP_1` (`id_user`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_gallery_mobil`
--
ALTER TABLE `tb_gallery_mobil`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_mobil`
--
ALTER TABLE `tb_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_mobil_activity`
--
ALTER TABLE `tb_mobil_activity`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_mobil_log`
--
ALTER TABLE `tb_mobil_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_gallery_mobil`
--
ALTER TABLE `tb_gallery_mobil`
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_MOBIL`) REFERENCES `tb_mobil` (`ID_MOBIL`);

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_USER`) REFERENCES `tb_users` (`ID_USER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
