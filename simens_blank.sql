-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2016 at 12:51 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simens`
--

-- --------------------------------------------------------

--
-- Table structure for table `diklat`
--

CREATE TABLE `diklat` (
  `id` int(225) NOT NULL,
  `nip_peg` varchar(30) NOT NULL,
  `jenis_diklat` varchar(200) NOT NULL,
  `nama_diklat` varchar(200) NOT NULL,
  `tempat` varchar(200) DEFAULT NULL,
  `tahun` varchar(200) DEFAULT NULL,
  `path_diklat` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(225) NOT NULL,
  `nip_peg` varchar(30) NOT NULL,
  `jenis_dokumen` varchar(200) DEFAULT NULL,
  `path_dokumen` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(225) NOT NULL,
  `nip_peg` varchar(30) NOT NULL,
  `no_sk` varchar(200) NOT NULL,
  `tgl_sk` date DEFAULT NULL,
  `nama_jabatan` varchar(200) DEFAULT NULL,
  `unit_kerja` varchar(200) DEFAULT NULL,
  `path_jabatan` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keluarga_pegawai`
--

CREATE TABLE `keluarga_pegawai` (
  `id` int(225) NOT NULL,
  `nip_peg` varchar(30) NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tmpt_lahir` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kepangkatan`
--

CREATE TABLE `kepangkatan` (
  `id` int(225) NOT NULL,
  `nip_peg` varchar(30) NOT NULL,
  `jenis_pangkat` varchar(200) NOT NULL,
  `gol_ruang` varchar(200) DEFAULT NULL,
  `tmt` varchar(200) DEFAULT NULL,
  `no_sk` varchar(200) DEFAULT NULL,
  `tgl_sk` date DEFAULT NULL,
  `path_kepangkatan` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nip_peg` varchar(30) NOT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `tmpt_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `status_peg` varchar(200) DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `stts_nikah` varchar(100) DEFAULT NULL,
  `tgl_nikah` date DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `no_karpeg` varchar(200) NOT NULL,
  `no_npwp` varchar(200) NOT NULL,
  `no_askes` varchar(200) NOT NULL,
  `foto_path` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(225) NOT NULL,
  `nip_peg` varchar(30) NOT NULL,
  `jenjang_pendidikan` varchar(200) DEFAULT NULL,
  `nama_sekolah` varchar(200) DEFAULT NULL,
  `no_ijazah` varchar(200) DEFAULT NULL,
  `tahun_lulus` varchar(200) DEFAULT NULL,
  `path_pendidikan` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diklat`
--
ALTER TABLE `diklat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluarga_pegawai`
--
ALTER TABLE `keluarga_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kepangkatan`
--
ALTER TABLE `kepangkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diklat`
--
ALTER TABLE `diklat`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `keluarga_pegawai`
--
ALTER TABLE `keluarga_pegawai`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `kepangkatan`
--
ALTER TABLE `kepangkatan`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
