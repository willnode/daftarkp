-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.7-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5713
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for kp_system
CREATE DATABASE IF NOT EXISTS `kp_system` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `kp_system`;

-- Dumping structure for table kp_system.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` enum('Admin Prodi','Koordinator','Admin Dekanat','Superadmin') NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `id_login` (`id_login`),
  CONSTRAINT `FK_admin_login` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table kp_system.admin: ~4 rows (approximately)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id_admin`, `id_login`, `nama`, `jabatan`) VALUES
	(1, 1, 'Admin', 'Superadmin'),
	(2, 6, 'Dekanat', 'Admin Dekanat'),
	(3, 5, 'Koordinator', 'Koordinator'),
	(4, 4, 'Prodi', 'Admin Prodi');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table kp_system.berkas
CREATE TABLE IF NOT EXISTS `berkas` (
  `id_berkas` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL,
  `file_berkas` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_berkas`),
  UNIQUE KEY `id_mahasiswa` (`id_mahasiswa`),
  CONSTRAINT `FK_berkas_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kp_system.berkas: ~1 rows (approximately)
DELETE FROM `berkas`;
/*!40000 ALTER TABLE `berkas` DISABLE KEYS */;
INSERT INTO `berkas` (`id_berkas`, `id_mahasiswa`, `file_berkas`) VALUES
	(1, 1, NULL);
/*!40000 ALTER TABLE `berkas` ENABLE KEYS */;

-- Dumping structure for table kp_system.bimbingan
CREATE TABLE IF NOT EXISTS `bimbingan` (
  `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL,
  `id_pembimbing` int(11) NOT NULL,
  `topik_bimbingan` varchar(50) NOT NULL,
  `file_bimbingan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_bimbingan`),
  UNIQUE KEY `id_mahasiswa` (`id_mahasiswa`),
  KEY `FK_bimbingan_dosen` (`id_pembimbing`),
  CONSTRAINT `FK_bimbingan_dosen` FOREIGN KEY (`id_pembimbing`) REFERENCES `dosen` (`id_dosen`),
  CONSTRAINT `FK_bimbingan_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kp_system.bimbingan: ~1 rows (approximately)
DELETE FROM `bimbingan`;
/*!40000 ALTER TABLE `bimbingan` DISABLE KEYS */;
INSERT INTO `bimbingan` (`id_bimbingan`, `id_mahasiswa`, `id_pembimbing`, `topik_bimbingan`, `file_bimbingan`) VALUES
	(1, 1, 2, 'Topik', NULL);
/*!40000 ALTER TABLE `bimbingan` ENABLE KEYS */;

-- Dumping structure for table kp_system.daftar
CREATE TABLE IF NOT EXISTS `daftar` (
  `id_daftar` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL,
  `id_penguji` int(11) DEFAULT NULL,
  `verifikasi_admin` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id_daftar`),
  UNIQUE KEY `id_mahasiswa` (`id_mahasiswa`),
  KEY `FK_daftar_dosen` (`id_penguji`),
  CONSTRAINT `FK_daftar_dosen` FOREIGN KEY (`id_penguji`) REFERENCES `dosen` (`id_dosen`),
  CONSTRAINT `FK_daftar_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kp_system.daftar: ~1 rows (approximately)
DELETE FROM `daftar`;
/*!40000 ALTER TABLE `daftar` DISABLE KEYS */;
INSERT INTO `daftar` (`id_daftar`, `id_mahasiswa`, `id_penguji`, `verifikasi_admin`) VALUES
	(1, 1, 3, NULL);
/*!40000 ALTER TABLE `daftar` ENABLE KEYS */;

-- Dumping structure for table kp_system.dosen
CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL,
  `nip_dosen` varchar(50) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dosen`),
  UNIQUE KEY `id_login` (`id_login`),
  CONSTRAINT `FK_dosen_login` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table kp_system.dosen: ~3 rows (approximately)
DELETE FROM `dosen`;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` (`id_dosen`, `id_login`, `nip_dosen`, `nama_dosen`) VALUES
	(1, 2, '012345678', 'Kautsar Sophan, S.Kom, M.Kom'),
	(2, 8, '234564', 'Pembimbing'),
	(3, 7, '390121', 'Penguji');
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;

-- Dumping structure for table kp_system.jadwal
CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `verifikasi_penguji` set('Y','N') DEFAULT NULL,
  `verifikasi_pembimbing` set('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`),
  UNIQUE KEY `id_mahasiswa` (`id_mahasiswa`),
  CONSTRAINT `FK_jadwal_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kp_system.jadwal: ~1 rows (approximately)
DELETE FROM `jadwal`;
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
INSERT INTO `jadwal` (`id_jadwal`, `id_mahasiswa`, `waktu`, `verifikasi_penguji`, `verifikasi_pembimbing`) VALUES
	(1, 1, '2019-12-12 16:05:18', NULL, NULL);
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;

-- Dumping structure for table kp_system.login
CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` enum('mahasiswa','dosen','admin') NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table kp_system.login: ~8 rows (approximately)
DELETE FROM `login`;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id_login`, `username`, `password`, `role`) VALUES
	(1, 'admin', 'admin', 'admin'),
	(2, 'dosen', 'dosen', 'dosen'),
	(3, 'mahasiswa', 'mahasiswa', 'mahasiswa'),
	(4, 'prodi', 'prodi', 'admin'),
	(5, 'koordinator', 'koordinator', 'admin'),
	(6, 'dekanat', 'dekanat', 'admin'),
	(7, 'penguji', 'penguji', 'dosen'),
	(8, 'pembimbing', 'pembimbing', 'dosen');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

-- Dumping structure for table kp_system.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL,
  `nim_mahasiswa` varchar(50) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `prodi_mahasiswa` int(11) NOT NULL,
  PRIMARY KEY (`id_mahasiswa`),
  UNIQUE KEY `id_login` (`id_login`),
  KEY `FK_mahasiswa_prodi` (`prodi_mahasiswa`),
  CONSTRAINT `FK_mahasiswa_login` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`),
  CONSTRAINT `FK_mahasiswa_prodi` FOREIGN KEY (`prodi_mahasiswa`) REFERENCES `prodi` (`id_prodi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kp_system.mahasiswa: ~0 rows (approximately)
DELETE FROM `mahasiswa`;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` (`id_mahasiswa`, `id_login`, `nim_mahasiswa`, `nama_mahasiswa`, `prodi_mahasiswa`) VALUES
	(1, 3, '180411100103', 'Faishol Wahyudi', 1);
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;

-- Dumping structure for table kp_system.nilai
CREATE TABLE IF NOT EXISTS `nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL DEFAULT 0,
  `nilai_pembimbing` float NOT NULL DEFAULT 0,
  `nilai_penguji` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_nilai`),
  UNIQUE KEY `id_mahasiswa` (`id_mahasiswa`),
  CONSTRAINT `FK_nilai_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kp_system.nilai: ~1 rows (approximately)
DELETE FROM `nilai`;
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
INSERT INTO `nilai` (`id_nilai`, `id_mahasiswa`, `nilai_pembimbing`, `nilai_penguji`) VALUES
	(1, 1, 4, 3.5);
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;

-- Dumping structure for table kp_system.prodi
CREATE TABLE IF NOT EXISTS `prodi` (
  `id_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_prodi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table kp_system.prodi: ~2 rows (approximately)
DELETE FROM `prodi`;
/*!40000 ALTER TABLE `prodi` DISABLE KEYS */;
INSERT INTO `prodi` (`id_prodi`, `nama_prodi`) VALUES
	(1, 'Teknik Informatika'),
	(2, 'Teknik Industri'),
	(3, 'Teknik Mekatronika');
/*!40000 ALTER TABLE `prodi` ENABLE KEYS */;

-- Dumping structure for table kp_system.revisi
CREATE TABLE IF NOT EXISTS `revisi` (
  `id_revisi` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL,
  `file_revisi` varchar(50) DEFAULT NULL,
  `verifikasi_penguji` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id_revisi`),
  UNIQUE KEY `id_mahasiswa` (`id_mahasiswa`),
  CONSTRAINT `FK_revisi_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kp_system.revisi: ~1 rows (approximately)
DELETE FROM `revisi`;
/*!40000 ALTER TABLE `revisi` DISABLE KEYS */;
INSERT INTO `revisi` (`id_revisi`, `id_mahasiswa`, `file_revisi`, `verifikasi_penguji`) VALUES
	(1, 1, NULL, NULL);
/*!40000 ALTER TABLE `revisi` ENABLE KEYS */;

-- Dumping structure for table kp_system.surat
CREATE TABLE IF NOT EXISTS `surat` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL,
  `id_pembimbing` int(11) NOT NULL,
  `nama_perusahaan` varchar(20) NOT NULL,
  `alamat_perusahaan` varchar(50) NOT NULL,
  `jangka_waktu` varchar(50) NOT NULL DEFAULT '',
  `verifikasi_koordinator` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id_surat`),
  UNIQUE KEY `id_mahasiswa` (`id_mahasiswa`),
  KEY `FK_surat_dosen` (`id_pembimbing`),
  CONSTRAINT `FK_surat_dosen` FOREIGN KEY (`id_pembimbing`) REFERENCES `dosen` (`id_dosen`),
  CONSTRAINT `FK_surat_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kp_system.surat: ~0 rows (approximately)
DELETE FROM `surat`;
/*!40000 ALTER TABLE `surat` DISABLE KEYS */;
INSERT INTO `surat` (`id_surat`, `id_mahasiswa`, `id_pembimbing`, `nama_perusahaan`, `alamat_perusahaan`, `jangka_waktu`, `verifikasi_koordinator`) VALUES
	(1, 1, 2, 'Coklat', 'Danus', '2 bulan', NULL);
/*!40000 ALTER TABLE `surat` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
