-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2015 at 04:19 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simpeg_bpkad`
--

-- --------------------------------------------------------

--
-- Table structure for table `diklat_fungsional`
--

CREATE TABLE IF NOT EXISTS `diklat_fungsional` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` int(30) NOT NULL,
  `nama_diklat` varchar(200) DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `tempat` varchar(200) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `path_diklat_fungsional` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `diklat_fungsional`
--


-- --------------------------------------------------------

--
-- Table structure for table `diklat_struktural`
--

CREATE TABLE IF NOT EXISTS `diklat_struktural` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` int(30) NOT NULL,
  `nama_diklat` varchar(200) DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `tempat` varchar(200) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `path_diklat_struktural` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `diklat_struktural`
--


-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` int(30) NOT NULL,
  `jabatan` varchar(200) DEFAULT NULL,
  `tmt` varchar(200) DEFAULT NULL,
  `golongan` varchar(200) DEFAULT NULL,
  `eselon` varchar(200) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `path_jabatan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jabatan`
--


-- --------------------------------------------------------

--
-- Table structure for table `keluarga_pegawai`
--

CREATE TABLE IF NOT EXISTS `keluarga_pegawai` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` int(30) NOT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `tmpt_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `status` varchar(200) NOT NULL,
  `pekerjaan` varchar(200) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `keluarga_pegawai`
--


-- --------------------------------------------------------

--
-- Table structure for table `kepangkatan`
--

CREATE TABLE IF NOT EXISTS `kepangkatan` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` int(30) NOT NULL,
  `pangkat_gol` varchar(200) DEFAULT NULL,
  `tmt` varchar(200) DEFAULT NULL,
  `jenis` varchar(200) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `path_kepangkatan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kepangkatan`
--


-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip_peg` int(30) NOT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `tmpt_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `status_peg` varchar(200) DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `stts_nikah` varchar(100) DEFAULT NULL,
  `tgl_nikah` date DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `foto_path` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pegawai`
--


-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE IF NOT EXISTS `pelatihan` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` int(30) NOT NULL,
  `nama_pelatihan` varchar(200) DEFAULT NULL,
  `lama_pelatihan` varchar(200) DEFAULT NULL,
  `ijazah_pelatihan` varchar(200) DEFAULT NULL,
  `tempat_pelatihan` varchar(200) DEFAULT NULL,
  `keterangan_pelatihan` varchar(200) DEFAULT NULL,
  `path_pelatihan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pelatihan`
--


-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE IF NOT EXISTS `pendidikan` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` int(30) NOT NULL,
  `tingkat_pendidikan` varchar(200) DEFAULT NULL,
  `nama_pendidikan` varchar(200) DEFAULT NULL,
  `kualifikasi` varchar(200) DEFAULT NULL,
  `tahun_lulus` varchar(200) DEFAULT NULL,
  `path_pendidikan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pendidikan`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
