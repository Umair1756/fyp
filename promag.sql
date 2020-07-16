-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.26 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for promag
CREATE DATABASE IF NOT EXISTS `promag` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `promag`;

-- Dumping structure for table promag.users
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `upassword` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table promag.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`uid`, `uname`, `uemail`, `upassword`) VALUES
	(1, 'Sazer X', 'sazerxumair786@gmail.com', 'e66055e8e308770492a44bf16e875127'),
	(2, 'Umair Zafar', 'umairzafar513@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
	(3, 'Umair Zafar', 'mu964878@gmail.com', 'e66055e8e308770492a44bf16e875127'),
	(4, 'Admin', 'admin@gmail.com', '7488e331b8b64e5794da3fa4eb10ad5d'),
	(5, 'Ali', 'admin@gmail.com', '7488e331b8b64e5794da3fa4eb10ad5d');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
