-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2020 at 12:48 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siprakela`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal_absen` date DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `status_masuk` varchar(100) DEFAULT NULL,
  `tanggal_acc` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_user`, `tanggal_absen`, `jam_masuk`, `status_masuk`, `tanggal_acc`) VALUES
(19, 11, '2020-01-25', '10:14:29', 'telah absen', '2020-01-25 04:14:53'),
(20, 12, '2020-01-24', '10:19:54', 'telah absen', '2020-01-25 10:20:14'),
(21, 12, '2020-01-25', '10:48:44', 'telah absen', '2020-01-25 10:49:16'),
(22, 11, '2020-01-26', '06:31:22', 'telah absen', '2020-01-26 06:35:50'),
(23, 12, '2020-01-26', '06:31:46', 'telah absen', '2020-01-26 06:35:47'),
(24, 12, '2020-01-27', '09:36:39', 'menunggu konfirmasi', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `username_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username_admin`, `password_admin`) VALUES
(2, 'Administrator', 'admin', '$2y$10$sl7wcyMdeiFerBZ3OwRn1OJoWvTLx.cJN8j21h8jkaB.6zOX0XKve');

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `judul_agenda` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `ringkasan` varchar(200) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `judul_agenda`, `tanggal`, `waktu`, `tempat`, `ringkasan`, `status`) VALUES
(3, 'pasang cctv', '2019-11-30', '08:05:00', 'Kantor DPRD', 'jangan telat, siapkan senjata masing-masing', 'Penting Sekali'),
(4, 'Pemasangan kabel jaringan ', '2020-01-20', '09:30:00', 'Gedung merdeka', 'seperti biasa bawa peralatan, jangan lupa kabel', 'Penting Sekali');

-- --------------------------------------------------------

--
-- Table structure for table `bimbing`
--

CREATE TABLE `bimbing` (
  `id_bimbing` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pembimbing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bimbing`
--

INSERT INTO `bimbing` (`id_bimbing`, `id_user`, `id_pembimbing`) VALUES
(8, 11, 9),
(9, 12, 8),
(10, 11, 8),
(11, 12, 9);

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `nama_instansi` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nama_pimpinan` varchar(100) DEFAULT NULL,
  `nrp_pimpinan` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`, `alamat`, `nama_pimpinan`, `nrp_pimpinan`, `website`, `logo`) VALUES
(1, 'Polrestabes Bandung', 'Jl. Merdeka No.18, Bandung, Jawa Barat 40117', 'Budi Yundarna', '457183940', 'http://polrestabes-bandung.or.id/', '1901202003122013102019133334logo-polisi.png');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_penelitian`
--

CREATE TABLE `jenis_penelitian` (
  `id_penelitian` int(11) NOT NULL,
  `nama_penelitian` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `durasi_penelitian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_penelitian`
--

INSERT INTO `jenis_penelitian` (`id_penelitian`, `nama_penelitian`, `deskripsi`, `durasi_penelitian`) VALUES
(1, 'Magang', 'Hanya untuk mahasiswa semester 6-8', 3),
(2, 'PKL', 'Hanya untuk siswa SMA', 6),
(3, 'Skripsi', 'Hanya untuk yang ingin penelitian', 2),
(5, 'KP', 'hanya untuk yang ingin kerja praktek', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_upload` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_user`, `gambar`, `tanggal_upload`) VALUES
(1, 11, '31.jpg', '2020-01-23 00:00:00'),
(2, 11, '9.jpg', '2020-01-23 00:00:00'),
(3, 11, '10.jpg', '2020-01-23 00:00:00'),
(4, 11, '11.jpg', '2020-01-23 00:00:00'),
(5, 11, '12.jpg', '2020-01-23 00:00:00'),
(6, 11, '13.jpg', '2020-01-23 00:00:00'),
(7, 11, '20.jpg', '2020-01-23 00:00:00'),
(8, 11, '21.jpg', '2020-01-23 00:00:00'),
(9, 11, '22.jpg', '2020-01-23 00:00:00'),
(10, 11, '23.jpg', '2020-01-23 00:00:00'),
(21, 11, '34.jpg', '2020-01-25 12:39:46'),
(22, 11, '35.jpg', '2020-01-25 12:39:46'),
(23, 11, '36.jpg', '2020-01-25 12:39:46'),
(24, 12, '3.jpg', '2020-01-27 09:39:01'),
(25, 12, '4.jpg', '2020-01-27 09:39:01'),
(26, 12, '5.jpg', '2020-01-27 09:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id_pembimbing` int(11) NOT NULL,
  `nama_pembimbing` varchar(100) DEFAULT NULL,
  `nrp_pembimbing` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`id_pembimbing`, `nama_pembimbing`, `nrp_pembimbing`, `no_telepon`, `jabatan`, `username`, `password`) VALUES
(8, 'Abdul Buhori', '42898989', '08321161123', 'Pembina', 'buhori', '$2y$10$hbmckkntTsODiWtMHSq6u.Xjn7FXST.2VGUH8faN8T74zyW2HllQy'),
(9, 'Anwar Jarot', '567567567', '081212121212', 'Pejabat', 'Anwar', '$2y$10$pUCQjR/gFfSuYTZaMHlJp.wDcyE56NumtrkeVuv.sQevJ7OsVq4eO');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kampus` varchar(100) NOT NULL,
  `id_penelitian` int(11) DEFAULT NULL,
  `surat_lamaran` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `nama`, `email`, `kampus`, `id_penelitian`, `surat_lamaran`, `status`, `tanggal`) VALUES
(5, 'mohammad iskandar', 'misimatup1ang@gmail.com', 'unpad', 2, '19012020041023SURAT-PERNYATAAN-PENGHASILAN-ORTU.pdf', 'diterima', '2020-01-19 10:10:23'),
(7, 'tara budiman', 'tara@gmail.com', 'unikom', 2, '19012020051236kusioner.docx', 'diterima', '2020-01-19 11:12:36'),
(8, 'sr', 'sr@gmail.bom', 'Unikom', 1, 'kusioner.docx', 'diterima', '2020-01-19 11:28:21'),
(9, 'buhori', 'misimatu23r32pang@gmail.com', 'sadasd', 3, 'Villamil.docx', 'tidak diterima', '2020-01-19 11:53:45'),
(10, 'Roni susan', 'roni@gmail.com', 'Amikom', 3, 'SURAT PENGHASILAN.pdf', 'diterima', '2020-01-19 22:12:06'),
(12, 'Ahmadi saleh', 'ahmad@gmail.com', 'Tel-u', 1, 'review new.docx', 'belum diterima', '2020-01-26 19:24:46'),
(13, 'Bayu suprianto', 'bayu@gmail.com', 'ITHB', 2, 'coolfreecv_resume_en_01.doc', 'belum diterima', '2020-01-26 19:25:41'),
(14, 'Ridwan dadu', 'ridwan@gmail.com', 'Unikom', 5, 'Laporan KP ( Revisi ).docx', 'belum diterima', '2020-01-26 19:26:25'),
(15, 'tara budiman', 'misimatupang@gmail.com', 'Unikom', 5, 'TRAIN_AWAY_e-ticket (1).pdf', 'tidak diterima', '2020-01-27 09:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_nilai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_instansi` int(11) DEFAULT NULL,
  `a1` int(11) DEFAULT NULL,
  `a2` int(11) DEFAULT NULL,
  `a3` int(11) DEFAULT NULL,
  `a4` int(11) DEFAULT NULL,
  `a5` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_nilai`, `id_user`, `id_instansi`, `a1`, `a2`, `a3`, `a4`, `a5`) VALUES
(3, 11, 1, 90, 90, 90, 90, 90),
(4, 12, 1, 54, 90, 90, 90, 56);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `no_induk` int(11) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_pengajuan`, `no_induk`, `jurusan`, `pendidikan`, `username`, `password`) VALUES
(11, 5, 10116121, 'Teknik Informatika', 's1', 'bgkandar', '$2y$10$zJtjKBMFCZ9dZyEu8Ld1D.4CM/STI5aEFOml0oNNi0ax0UmUKkP6G'),
(12, 7, 123, 'Teknik Informatika', 'smk', 'tr', '$2y$10$5Ptu3EaV6FJoG2zmKAOTOugneV8FZG/E1KVfuittzrxEFWDNcHK2m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `absen_ibfk_1` (`id_user`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `bimbing`
--
ALTER TABLE `bimbing`
  ADD PRIMARY KEY (`id_bimbing`),
  ADD KEY `bimbing_ibfk_1` (`id_pembimbing`),
  ADD KEY `bimbing_ibfk_2` (`id_user`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `jenis_penelitian`
--
ALTER TABLE `jenis_penelitian`
  ADD PRIMARY KEY (`id_penelitian`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id_pembimbing`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_penelitian` (`id_penelitian`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `penilaian_ibfk_2` (`id_instansi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `user_ibfk_1` (`id_pengajuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bimbing`
--
ALTER TABLE `bimbing`
  MODIFY `id_bimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_penelitian`
--
ALTER TABLE `jenis_penelitian`
  MODIFY `id_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `bimbing`
--
ALTER TABLE `bimbing`
  ADD CONSTRAINT `bimbing_ibfk_1` FOREIGN KEY (`id_pembimbing`) REFERENCES `pembimbing` (`id_pembimbing`),
  ADD CONSTRAINT `bimbing_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_penelitian`) REFERENCES `jenis_penelitian` (`id_penelitian`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
