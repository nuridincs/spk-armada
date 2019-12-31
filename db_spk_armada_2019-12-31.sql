# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.27)
# Database: db_spk_armada
# Generation Time: 2019-12-30 23:55:31 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `last_signin` int(11) DEFAULT NULL,
  `created_date` int(11) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `verification_key` varchar(255) NOT NULL,
  `admin_group` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `last_signin`, `created_date`, `ip`, `verification_key`, `admin_group`, `name`, `address`, `address2`, `city`, `state`, `zip`)
VALUES
	(1,'admin','a1fa99a1724242d0931d4f9c62dd56a6','support@lenapo.com',2147483647,123132121,'127.0.0.1','dfasdfa3a33a',1,'Sarmadan',NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_groups`;

CREATE TABLE `admin_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `admin_groups` WRITE;
/*!40000 ALTER TABLE `admin_groups` DISABLE KEYS */;

INSERT INTO `admin_groups` (`id`, `name`)
VALUES
	(1,'Administrator');

/*!40000 ALTER TABLE `admin_groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table armada
# ------------------------------------------------------------

DROP TABLE IF EXISTS `armada`;

CREATE TABLE `armada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_armada` varchar(30) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `biaya_pajak_tahunan` int(11) DEFAULT NULL,
  `biaya_perawatan` int(11) DEFAULT NULL,
  `banyak_sewa` int(5) DEFAULT NULL,
  `harga_sewa` int(11) DEFAULT NULL,
  `tonase` int(3) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `armada` WRITE;
/*!40000 ALTER TABLE `armada` DISABLE KEYS */;

INSERT INTO `armada` (`id`, `type_armada`, `harga_beli`, `biaya_pajak_tahunan`, `biaya_perawatan`, `banyak_sewa`, `harga_sewa`, `tonase`, `harga_jual`)
VALUES
	(1,'Daihatsu Grand Max Blindvan',70000000,1548100,4320000,114,227500,1,60000000),
	(2,'Daihatsu Grand Max GM',70000000,1249700,7008000,235,227500,1,60000000),
	(3,'Isuzu Box Long CDD',125000000,3297000,24832800,35,450000,5,100000000),
	(4,'Isuzu GIGA',300000000,4376000,7658000,790,483500,10,280000000),
	(5,'Isuzu Box Wing Box',450000000,5494000,13879000,20,1789000,16,430000000),
	(6,'Isuzu Box CDE',80000000,2933000,7014000,50,250000,2,75000000),
	(7,'Mitsubishi Canter CDE',80000000,4121500,3962000,20,280500,3,75000000),
	(8,'Mitsubishi Box FUSO',450000000,5324000,3860000,4,1565000,13,430000000),
	(9,'Mitsubishi Box CDD Long',125000000,2275500,340000,30,443500,5,100000000),
	(10,'Mitsubishi Canter CDD',100000000,4212500,5371000,120,287500,3,80000000),
	(11,'Toyota DYNA CDD',100000000,4212500,26883000,267,445500,5,80000000),
	(12,'Toyota DYNA CDD Long',125000000,1313500,6027000,42,450000,6,115000000),
	(13,'Toyota DYNA CDE',80000000,2269000,1135000,60,275000,3,75000000);

/*!40000 ALTER TABLE `armada` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria`;

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kriteria` varchar(10) DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  `bobot` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kriteria` WRITE;
/*!40000 ALTER TABLE `kriteria` DISABLE KEYS */;

INSERT INTO `kriteria` (`id`, `kriteria`, `keterangan`, `bobot`)
VALUES
	(1,'C1','Harga Beli Armada',5),
	(2,'C2','Biaya Pajak Tahunan',4),
	(3,'C3','Biaya Perawatan',4),
	(4,'C4','Banyak Sewa',5),
	(5,'C5','Harga Sewa',5),
	(6,'C6','Tonase',3),
	(7,'C7','Harga Jual Kembali',5);

/*!40000 ALTER TABLE `kriteria` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria_banyak_sewa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_banyak_sewa`;

CREATE TABLE `kriteria_banyak_sewa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` char(30) DEFAULT NULL,
  `bobot` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `kriteria_banyak_sewa` WRITE;
/*!40000 ALTER TABLE `kriteria_banyak_sewa` DISABLE KEYS */;

INSERT INTO `kriteria_banyak_sewa` (`id`, `keterangan`, `bobot`)
VALUES
	(1,'1-100',1),
	(2,'101-200',2),
	(3,'201-300',3),
	(4,'301-400',4),
	(5,'401-500',5),
	(6,'>501',6);

/*!40000 ALTER TABLE `kriteria_banyak_sewa` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria_biaya_perawatan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_biaya_perawatan`;

CREATE TABLE `kriteria_biaya_perawatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` char(30) DEFAULT NULL,
  `bobot` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `kriteria_biaya_perawatan` WRITE;
/*!40000 ALTER TABLE `kriteria_biaya_perawatan` DISABLE KEYS */;

INSERT INTO `kriteria_biaya_perawatan` (`id`, `keterangan`, `bobot`)
VALUES
	(1,'100,000-1000,000',1),
	(2,'1,100,000-2000,000',2),
	(3,'2,100,000-3000,000',3),
	(4,'3,100,000-4000,000',4),
	(5,'4,100,000-5000,000',5),
	(6,'>5,100,000',6);

/*!40000 ALTER TABLE `kriteria_biaya_perawatan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria_harga_beli
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_harga_beli`;

CREATE TABLE `kriteria_harga_beli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` int(11) DEFAULT NULL,
  `bobot` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `kriteria_harga_beli` WRITE;
/*!40000 ALTER TABLE `kriteria_harga_beli` DISABLE KEYS */;

INSERT INTO `kriteria_harga_beli` (`id`, `keterangan`, `bobot`)
VALUES
	(1,450000000,1),
	(2,300000000,2),
	(3,125000000,3),
	(4,100000000,4),
	(5,80000000,5),
	(6,70000000,6);

/*!40000 ALTER TABLE `kriteria_harga_beli` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria_harga_jual
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_harga_jual`;

CREATE TABLE `kriteria_harga_jual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` char(30) DEFAULT NULL,
  `bobot` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `kriteria_harga_jual` WRITE;
/*!40000 ALTER TABLE `kriteria_harga_jual` DISABLE KEYS */;

INSERT INTO `kriteria_harga_jual` (`id`, `keterangan`, `bobot`)
VALUES
	(1,'50,000,000-150,000,000',1),
	(2,'151,000,000-250,000,000',2),
	(3,'251,000,000-350,000,000',3),
	(4,'351,000,000-450,000,000',4),
	(5,'451,000,000-550,000,000',5),
	(6,'551,000,000-650,000,000',6);

/*!40000 ALTER TABLE `kriteria_harga_jual` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria_harga_sewa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_harga_sewa`;

CREATE TABLE `kriteria_harga_sewa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` char(30) DEFAULT NULL,
  `bobot` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `kriteria_harga_sewa` WRITE;
/*!40000 ALTER TABLE `kriteria_harga_sewa` DISABLE KEYS */;

INSERT INTO `kriteria_harga_sewa` (`id`, `keterangan`, `bobot`)
VALUES
	(1,'200,000-250,000',1),
	(2,'251,000-300,000',2),
	(3,'301,000-350,000',3),
	(4,'351,000-400,000',4),
	(5,'401,000-450,000',5),
	(6,'>451,000',6);

/*!40000 ALTER TABLE `kriteria_harga_sewa` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria_pajak_tahunan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_pajak_tahunan`;

CREATE TABLE `kriteria_pajak_tahunan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` char(30) DEFAULT NULL,
  `bobot` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `kriteria_pajak_tahunan` WRITE;
/*!40000 ALTER TABLE `kriteria_pajak_tahunan` DISABLE KEYS */;

INSERT INTO `kriteria_pajak_tahunan` (`id`, `keterangan`, `bobot`)
VALUES
	(1,'1,000,000-2,000,000',1),
	(2,'2,001,000-3,000,000',2),
	(3,'3,001,000-4,000,000',3),
	(4,'4,001,000-5,000,000',4),
	(5,'5,001,000-6,000,000',5),
	(6,'6,001,000-7,000,000',6);

/*!40000 ALTER TABLE `kriteria_pajak_tahunan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria_tonase
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_tonase`;

CREATE TABLE `kriteria_tonase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` char(11) DEFAULT NULL,
  `bobot` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `kriteria_tonase` WRITE;
/*!40000 ALTER TABLE `kriteria_tonase` DISABLE KEYS */;

INSERT INTO `kriteria_tonase` (`id`, `keterangan`, `bobot`)
VALUES
	(1,'1-3',1),
	(2,'4-6',2),
	(3,'7-9',3),
	(4,'10-13',4),
	(5,'14-16',5),
	(6,'17-19',6);

/*!40000 ALTER TABLE `kriteria_tonase` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nilai_kriteria
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nilai_kriteria`;

CREATE TABLE `nilai_kriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_armada` int(11) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `c5` int(11) NOT NULL,
  `c6` int(11) NOT NULL,
  `c7` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nilai_kriteria_fk0` (`id_armada`),
  KEY `nilai_kriteria_fk1` (`c1`),
  KEY `nilai_kriteria_fk2` (`c2`),
  KEY `nilai_kriteria_fk3` (`c3`),
  KEY `nilai_kriteria_fk4` (`c4`),
  KEY `nilai_kriteria_fk5` (`c5`),
  KEY `nilai_kriteria_fk6` (`c6`),
  KEY `nilai_kriteria_fk7` (`c7`),
  CONSTRAINT `nilai_kriteria_fk0` FOREIGN KEY (`id_armada`) REFERENCES `armada` (`id`),
  CONSTRAINT `nilai_kriteria_fk1` FOREIGN KEY (`c1`) REFERENCES `kriteria_harga_beli` (`id`),
  CONSTRAINT `nilai_kriteria_fk2` FOREIGN KEY (`c2`) REFERENCES `kriteria_pajak_tahunan` (`id`),
  CONSTRAINT `nilai_kriteria_fk3` FOREIGN KEY (`c3`) REFERENCES `kriteria_biaya_perawatan` (`id`),
  CONSTRAINT `nilai_kriteria_fk4` FOREIGN KEY (`c4`) REFERENCES `kriteria_banyak_sewa` (`id`),
  CONSTRAINT `nilai_kriteria_fk5` FOREIGN KEY (`c5`) REFERENCES `kriteria_harga_sewa` (`id`),
  CONSTRAINT `nilai_kriteria_fk6` FOREIGN KEY (`c6`) REFERENCES `kriteria_tonase` (`id`),
  CONSTRAINT `nilai_kriteria_fk7` FOREIGN KEY (`c7`) REFERENCES `kriteria_harga_jual` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `nilai_kriteria` WRITE;
/*!40000 ALTER TABLE `nilai_kriteria` DISABLE KEYS */;

INSERT INTO `nilai_kriteria` (`id`, `id_armada`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`)
VALUES
	(1,1,6,1,5,2,1,1,1),
	(3,2,6,1,6,3,1,1,1),
	(4,3,3,3,6,1,5,2,1),
	(5,4,2,4,6,6,5,4,3),
	(6,5,1,5,6,1,6,5,4),
	(7,6,5,2,6,1,1,1,1),
	(8,7,5,4,4,1,2,1,1),
	(9,8,1,5,4,1,6,4,4),
	(10,9,3,2,1,1,5,2,1),
	(11,10,4,4,6,2,2,1,1),
	(12,11,4,4,6,3,5,2,1),
	(13,12,3,1,6,1,5,2,1),
	(14,13,5,2,2,1,2,1,1);

/*!40000 ALTER TABLE `nilai_kriteria` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
