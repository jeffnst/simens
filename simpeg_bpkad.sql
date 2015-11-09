-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2015 at 12:41 PM
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

--
-- Dumping data for table `diklat`
--

INSERT INTO `diklat` (`id`, `nip_peg`, `jenis_diklat`, `nama_diklat`, `tempat`, `tahun`, `path_diklat`) VALUES
(1, 110033, 'A', 'B', 'C', '2015', 'upload/110033/diklat/geforce1.JPG');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id`, `nip_peg`, `jenis_dokumen`, `path_dokumen`) VALUES
(2, 110033, 'Berita Acara Sumpah Janji PNS', 'upload/110033/dokumen/error archeage.JPG');

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

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nip_peg`, `no_sk`, `tgl_sk`, `nama_jabatan`, `unit_kerja`, `path_jabatan`) VALUES
(3, 110033, '1234567', '2015-11-05', 'AA', 'BB', 'upload/110033/jabatan/geforce2.JPG');

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

--
-- Dumping data for table `keluarga_pegawai`
--

INSERT INTO `keluarga_pegawai` (`id`, `nip_peg`, `status`, `nama_lengkap`, `tgl_lahir`, `tmpt_lahir`, `jenis_kelamin`, `keterangan`) VALUES
(12, 110033, 'Istri', 'AA', '2015-11-02', 'BB', 'perempuan', 'CC'),
(15, 110033, 'Orang Tua', 'R', '2015-11-02', 'T', 'perempuan', 'Y');

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

--
-- Dumping data for table `kepangkatan`
--

INSERT INTO `kepangkatan` (`id`, `nip_peg`, `jenis_pangkat`, `gol_ruang`, `tmt`, `no_sk`, `tgl_sk`, `path_kepangkatan`) VALUES
(2, 110033, 'AA', 'BB', 'CC', '123456', '2015-11-05', 'upload/110033/kepangkatan/error archeage.JPG');

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

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip_peg`, `nama_lengkap`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `status_peg`, `agama`, `stts_nikah`, `tgl_nikah`, `alamat`, `no_karpeg`, `no_npwp`, `no_askes`, `foto_path`) VALUES
(8, 110033, 'Rully Lukman', 'Banjarmasin', '2015-11-18', 'laki-laki', 'Diragukan', 'Islam', 'Belum ', '0000-00-00', 'Banper', '-', '-', '-', 'upload/110033/DSC_0001_resize1.jpg');

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

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `nip_peg`, `jenjang_pendidikan`, `nama_sekolah`, `no_ijazah`, `tahun_lulus`, `path_pendidikan`) VALUES
(3, 110033, 'AA', 'BB', '1234567', '2015', 'upload/110033/pendidikan/error archeage.JPG');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
