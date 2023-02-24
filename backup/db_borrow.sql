-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.1.72-community - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for borrow
CREATE DATABASE IF NOT EXISTS `borrow` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `borrow`;

-- Dumping structure for table borrow.cd
CREATE TABLE IF NOT EXISTS `cd` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'ไอดี',
  `cd` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รหัสครุภัณฑ์',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cd` (`cd`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='รหัสครุภัณฑ์';

-- Dumping data for table borrow.cd: 2 rows
/*!40000 ALTER TABLE `cd` DISABLE KEYS */;
REPLACE INTO `cd` (`id`, `cd`) VALUES
	(1, 'ทก.'),
	(2, 'test');
/*!40000 ALTER TABLE `cd` ENABLE KEYS */;

-- Dumping structure for table borrow.division
CREATE TABLE IF NOT EXISTS `division` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับ',
  `section` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'แผนก',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Unique` (`section`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table borrow.division: 6 rows
/*!40000 ALTER TABLE `division` DISABLE KEYS */;
REPLACE INTO `division` (`id`, `section`) VALUES
	(1, 'กองคลัง'),
	(2, 'กองสำนักปลัด'),
	(3, 'กองช่าง'),
	(4, 'กองสาธารณสุข'),
	(5, 'กองการศึกษา'),
	(6, 'กองยุทธศาสตร์');
/*!40000 ALTER TABLE `division` ENABLE KEYS */;

-- Dumping structure for table borrow.history
CREATE TABLE IF NOT EXISTS `history` (
  `id` bigint(20) DEFAULT NULL COMMENT 'ไอดี',
  `name` text COLLATE utf8_unicode_ci COMMENT 'ชื่อสินค้า',
  `username` text COLLATE utf8_unicode_ci COMMENT 'ชื่อผู้ใช้งาน',
  `total` int(11) DEFAULT NULL COMMENT 'ผลรวมที่ยืม',
  `f_time` date DEFAULT NULL COMMENT 'วันเวลาที่ยืม',
  `l_time` date DEFAULT NULL COMMENT 'วันเวลาที่คืน',
  `status` text COLLATE utf8_unicode_ci COMMENT 'สถาณะ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ประวัติการยืมอุปกรณ์';

-- Dumping data for table borrow.history: 0 rows
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
/*!40000 ALTER TABLE `history` ENABLE KEYS */;

-- Dumping structure for table borrow.shop
CREATE TABLE IF NOT EXISTS `shop` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `total` int(50) NOT NULL DEFAULT '0',
  `cd` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `serial` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cd` (`cd`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='อุปกรณ์';

-- Dumping data for table borrow.shop: 2 rows
/*!40000 ALTER TABLE `shop` DISABLE KEYS */;
REPLACE INTO `shop` (`id`, `name`, `total`, `cd`, `serial`) VALUES
	(1, 'จอภาพแม่ข่าย', 10, 'ทก', '410NDVWGT295'),
	(2, 'test', 10, 'test', 'ABCDEF');
/*!40000 ALTER TABLE `shop` ENABLE KEYS */;

-- Dumping structure for table borrow.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ลำดับ',
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ไอดี',
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รหัสผ่าน',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `lname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'นามสกุล',
  `tel` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เบอร์โทร',
  `section` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'แผนก',
  `level` int(11) DEFAULT '1' COMMENT 'ระดับ',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table borrow.users: 3 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `username`, `password`, `name`, `lname`, `tel`, `section`, `level`) VALUES
	(14, 'test', 'e75c333dfe547d3f9a864493fe7f61b0', 'user', 'test', '0864603371', 'กองช่าง', 1),
	(17, 'admin', '85b62df417434967be6ebfc9d2a85998', 'parisut', 'buakaew', '0864603371', 'ผู้ดูแลระบบ', 0),
	(20, 'fenix', 'e75c333dfe547d3f9a864493fe7f61b0', 'fenix', 'k', '0844604471', 'กองสาธารณสุข', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
