-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2015 at 10:47 AM
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
  `nip_peg` varchar(50) NOT NULL,
  `jenis_diklat` varchar(200) NOT NULL,
  `nama_diklat` varchar(200) NOT NULL,
  `tempat` varchar(200) DEFAULT NULL,
  `tahun` varchar(200) DEFAULT NULL,
  `path_diklat` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `diklat`
--


-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE IF NOT EXISTS `dokumen` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` varchar(50) NOT NULL,
  `jenis_dokumen` varchar(200) DEFAULT NULL,
  `path_dokumen` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dokumen`
--


-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` varchar(50) NOT NULL,
  `no_sk` varchar(200) NOT NULL,
  `tgl_sk` date DEFAULT NULL,
  `nama_jabatan` varchar(200) DEFAULT NULL,
  `unit_kerja` varchar(200) DEFAULT NULL,
  `path_jabatan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `jabatan`
--


-- --------------------------------------------------------

--
-- Table structure for table `keluarga_pegawai`
--

CREATE TABLE IF NOT EXISTS `keluarga_pegawai` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` varchar(50) NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tmpt_lahir` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `keluarga_pegawai`
--


-- --------------------------------------------------------

--
-- Table structure for table `kepangkatan`
--

CREATE TABLE IF NOT EXISTS `kepangkatan` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` varchar(50) NOT NULL,
  `jenis_pangkat` varchar(200) NOT NULL,
  `gol_ruang` varchar(200) DEFAULT NULL,
  `tmt` varchar(200) DEFAULT NULL,
  `no_sk` varchar(200) DEFAULT NULL,
  `tgl_sk` date DEFAULT NULL,
  `path_kepangkatan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kepangkatan`
--


-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip_peg` varchar(50) NOT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip_peg`, `nama_lengkap`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `status_peg`, `agama`, `stts_nikah`, `tgl_nikah`, `alamat`, `no_karpeg`, `no_npwp`, `no_askes`, `foto_path`) VALUES
(9, '2147483647', 'Raudhatul Jannah', 'Martapura', '0000-00-00', 'perempuan', 'PNS', 'Islam', 'Kawin', '0000-00-00', 'Jl.P.Adurrahman', '', '', '', 'upload/196704101993032013/'),
(20, '198704192011012014', 'GT. RIZKY MAYA SARI, S.Sos, M.Ec.Dev', 'BANJARMASIN', '1987-04-19', 'perempuan', 'PNS', 'ISLAM', '', '0000-00-00', 'JL. SULTAN ADAM KOMPLEK JUNJUNG BUIH NO. 3 RT.25 BANJARMASIN 70122', '', '', '', 'upload/198704192011012014/');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE IF NOT EXISTS `pendidikan` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `nip_peg` varchar(50) NOT NULL,
  `jenjang_pendidikan` varchar(200) DEFAULT NULL,
  `nama_sekolah` varchar(200) DEFAULT NULL,
  `no_ijazah` varchar(200) DEFAULT NULL,
  `tahun_lulus` varchar(200) DEFAULT NULL,
  `path_pendidikan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pendidikan`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
