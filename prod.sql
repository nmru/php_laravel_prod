-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for prod
CREATE DATABASE IF NOT EXISTS `prod` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `prod`;

-- Dumping structure for table prod.issue
CREATE TABLE IF NOT EXISTS `issue` (
  `Id_Issue` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id_Issue`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table prod.issue: ~4 rows (approximately)
/*!40000 ALTER TABLE `issue` DISABLE KEYS */;
INSERT INTO `issue` (`Id_Issue`, `Nom`) VALUES
	(1, 'Etiquetado'),
	(2, 'Firmado'),
	(3, 'Prueba'),
	(4, 'Ninguno');
/*!40000 ALTER TABLE `issue` ENABLE KEYS */;

-- Dumping structure for table prod.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prod.migrations: ~0 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table prod.proceso
CREATE TABLE IF NOT EXISTS `proceso` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Serie` varchar(50) NOT NULL,
  `Mac` varchar(50) NOT NULL,
  `Lote` int(11) NOT NULL,
  `Id_Proceso` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Id_Issue` int(11) NOT NULL,
  `P1` enum('on','off') NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table prod.proceso: ~3 rows (approximately)
/*!40000 ALTER TABLE `proceso` DISABLE KEYS */;
INSERT INTO `proceso` (`Id`, `Serie`, `Mac`, `Lote`, `Id_Proceso`, `Fecha`, `Id_Issue`, `P1`) VALUES
	(2, '201604180399', '78:A3:51:12:9E:73', 21, 1, '2017-05-05', 1, ''),
	(3, '201604180405', '78:A3:51:12:93:AB', 21, 2, '2017-05-12', 3, ''),
	(4, '201604180416', '78:A3:51:12:9E:2B', 21, 1, '2017-05-08', 2, '');
/*!40000 ALTER TABLE `proceso` ENABLE KEYS */;

-- Dumping structure for table prod.procesos
CREATE TABLE IF NOT EXISTS `procesos` (
  `Id_Proceso` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Proceso`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table prod.procesos: ~4 rows (approximately)
/*!40000 ALTER TABLE `procesos` DISABLE KEYS */;
INSERT INTO `procesos` (`Id_Proceso`, `Nom`) VALUES
	(1, 'Etiquetado'),
	(2, 'Maquinado'),
	(3, 'Firmado'),
	(4, 'Prueba');
/*!40000 ALTER TABLE `procesos` ENABLE KEYS */;

-- Dumping structure for table prod.rol
CREATE TABLE IF NOT EXISTS `rol` (
  `Id_Rol` int(11) NOT NULL AUTO_INCREMENT,
  `Rol` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table prod.rol: ~2 rows (approximately)
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` (`Id_Rol`, `Rol`) VALUES
	(1, 'Administrador'),
	(2, 'Estandar');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;

-- Dumping structure for table prod.users
CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dpto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Puesto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Id_Rol` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prod.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`Id`, `Nom`, `Ap`, `username`, `password`, `Dpto`, `Puesto`, `Id_Rol`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Felix', 'Estrada', 'festrada', '$2y$10$ssVbHSmUvusjRi.irutu5e9Ru9tbWq68TqH7kqvgLzK1wN7B06dC6', 'Infraestructura', 'Soporte Interno', 2, 'j0jRvdTs8sgbF8ucu7VNDj1zw3E6xjxUv6AwYMyNC9xmwjqEEJkurdXVQzmg', NULL, NULL),
	(2, 'Cesar', 'Contreras', 'ccontreras', '$2y$10$z3mqekH0mp3bV8OckNkRz.ddfwQFuJRUkgMtDYzGp0gljinkCCX82', 'Infraestructura', 'Soporte Externo', 1, 'DbQceSHOtPEeq0FHCLdVbpC0OU5tZK7mhgvr9SN3OgGWVVO9EwzOGZTTU1ai', NULL, NULL),
	(3, 'Jorge', 'Lopez', 'jlopez', '$2y$10$8KxqnQ4BIw9iLOezvor7deEm8D3iPpBmUVhUQeHz2sAFQkxXHE2r.', 'Infraestructura', 'Soporte Interno', 1, 'LOZepMK5vPODRUaJqVwcEG5Fl5NbiNdMO50pz8PlRXaJZ1QjlyJsuuTy6GW1', NULL, NULL),
	(4, 'Carolina', 'Arce', 'carse', '$2y$10$crpu6WqEyxuvCwlWn0UXNue0Ykb9AUYU5FCxje2wt3BSavD5EkrLi', 'R.H', 'R.H', 1, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
