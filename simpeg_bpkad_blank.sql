-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 11, 2015 at 12:05 PM
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
-- Table structure for table `diklat`
--

CREATE TABLE IF NOT EXISTS `diklat` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` int(30) NOT NULL,
  `jenis_diklat` varchar(200) NOT NULL,
  `nama_diklat` varchar(200) NOT NULL,
  `tempat` varchar(200) DEFAULT NULL,
  `tahun` varchar(200) DEFAULT NULL,
  `path_diklat` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE IF NOT EXISTS `dokumen` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` int(30) NOT NULL,
  `jenis_dokumen` varchar(200) DEFAULT NULL,
  `path_dokumen` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` int(30) NOT NULL,
  `no_sk` varchar(200) NOT NULL,
  `tgl_sk` date DEFAULT NULL,
  `nama_jabatan` varchar(200) DEFAULT NULL,
  `unit_kerja` varchar(200) DEFAULT NULL,
  `path_jabatan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `keluarga_pegawai`
--

CREATE TABLE IF NOT EXISTS `keluarga_pegawai` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` int(30) NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tmpt_lahir` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `kepangkatan`
--

CREATE TABLE IF NOT EXISTS `kepangkatan` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` int(30) NOT NULL,
  `jenis_pangkat` varchar(200) NOT NULL,
  `gol_ruang` varchar(200) DEFAULT NULL,
  `tmt` varchar(200) DEFAULT NULL,
  `no_sk` varchar(200) DEFAULT NULL,
  `tgl_sk` date DEFAULT NULL,
  `path_kepangkatan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
  `no_karpeg` varchar(200) NOT NULL,
  `no_npwp` varchar(200) NOT NULL,
  `no_askes` varchar(200) NOT NULL,
  `foto_path` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE IF NOT EXISTS `pendidikan` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` int(30) NOT NULL,
  `jenjang_pendidikan` varchar(200) DEFAULT NULL,
  `nama_sekolah` varchar(200) DEFAULT NULL,
  `no_ijazah` varchar(200) DEFAULT NULL,
  `tahun_lulus` varchar(200) DEFAULT NULL,
  `path_pendidikan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
