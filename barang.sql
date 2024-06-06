-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `barang` (`id`, `kode`, `nama_barang`, `harga`) VALUES
(2,	'002',	'tas',	900.00),
(3,	'004',	'abaju tidur',	8000.00),
(4,	'005',	'Baju Sekolah',	81000.00),
(5,	'11',	'11',	11.00),
(6,	'11',	'11',	11.00),
(7,	'44',	'44',	44.00),
(9,	'099',	'baju sekolah',	80000.00),
(10,	'076',	'baju kerja',	7000.00);

-- 2024-06-06 13:48:54
