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
DROP DATABASE IF EXISTS `kp_system`;
CREATE DATABASE IF NOT EXISTS `kp_system` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `kp_system`;

-- Dumping structure for table kp_system.dosen
DROP TABLE IF EXISTS `dosen`;
CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL,
  `nip_dosen` varchar(50) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dosen`),
  KEY `FK_dosen_login` (`id_login`),
  CONSTRAINT `FK_dosen_login` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kp_system.dosen: ~1 rows (approximately)
DELETE FROM `dosen`;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` (`id_dosen`, `id_login`, `nip_dosen`, `nama_dosen`) VALUES
	(1, 2, '012345678', 'Kautsar Sophan, S.Kom, M.Kom');
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;

-- Dumping structure for table kp_system.login
DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` enum('mahasiswa','dosen','admin','') NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table kp_system.login: ~3 rows (approximately)
DELETE FROM `login`;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id_login`, `username`, `password`, `role`) VALUES
	(1, 'admin', 'admin', 'admin'),
	(2, 'dosen', 'dosen', 'dosen'),
	(3, 'mahasiswa', 'mahasiswa', 'mahasiswa');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

-- Dumping structure for table kp_system.mahasiswa
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama_mhs` varchar(20) NOT NULL,
  `prodi` int(11) NOT NULL,
  PRIMARY KEY (`id_mahasiswa`),
  KEY `FK_mahasiswa_prodi` (`prodi`),
  KEY `FK_mahasiswa_login` (`id_login`),
  CONSTRAINT `FK_mahasiswa_login` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`),
  CONSTRAINT `FK_mahasiswa_prodi` FOREIGN KEY (`prodi`) REFERENCES `prodi` (`id_prodi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kp_system.mahasiswa: ~1 rows (approximately)
DELETE FROM `mahasiswa`;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` (`id_mahasiswa`, `id_login`, `nim`, `nama_mhs`, `prodi`) VALUES
	(1, 3, '180411100103', 'Faishol Wahyudi', 1);
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;

-- Dumping structure for table kp_system.prodi
DROP TABLE IF EXISTS `prodi`;
CREATE TABLE IF NOT EXISTS `prodi` (
  `id_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_prodi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table kp_system.prodi: ~3 rows (approximately)
DELETE FROM `prodi`;
/*!40000 ALTER TABLE `prodi` DISABLE KEYS */;
INSERT INTO `prodi` (`id_prodi`, `nama_prodi`) VALUES
	(1, 'Teknik Informatika'),
	(2, 'Teknik Industri'),
	(3, 'Teknik Mekatronika');
/*!40000 ALTER TABLE `prodi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
