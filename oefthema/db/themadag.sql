-- -------------------------------------------------------------
-- TablePlus 5.8.6(535)
--
-- https://tableplus.com/
--
-- Database: themadag
-- Generation Time: 2024-02-19 13:26:01.6560
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `locations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `amount` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `registrations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `tel` varchar(150) DEFAULT NULL,
  `tday_id` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `tdays` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `location_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `locations` (`id`, `name`, `amount`) VALUES
(1, 'genk', 5),
(2, 'hasselt', 5),
(3, 'st-truiden', 100);

INSERT INTO `registrations` (`id`, `name`, `email`, `tel`, `tday_id`, `date`) VALUES
(1, 'test', 'test', 'test', 3, '2024-02-07 11:30:34'),
(2, 'Tante Frieda', 'frieda@gmail.com', '0238092380938', 3, '2024-02-07 10:51:47'),
(3, 'Tante Germain', 'germain@test.com', '029093830293', 3, '2024-02-07 10:52:36'),
(4, 'Tante Germain', 'germain@test.com', '029093830293', 2, '2024-02-07 10:56:28'),
(5, 'fsdfsd', 'dsdsf@test.com', 'welcome', 1, '2024-02-08 14:19:31'),
(6, 'Tante Frieda', 'frieda@hotmail.com', '023809283', 2, '2024-02-09 09:19:55'),
(7, 'Tante Frieda', 'frieda@hotmail.com', '023809283', 2, '2024-02-09 09:20:32'),
(8, 'sdfdsfs', 'dsfdsf@te.com', '082094', 2, '2024-02-09 09:20:51'),
(10, 'sdfsdfsdf', 'sdfsdsdf@teztze.com', 'sdfsdfsdf', 2, '2024-02-09 10:32:14'),
(11, 'sdfdf', 'dsfdsfs@test.com', 'sdfsdf', 3, '2024-02-18 14:19:29'),
(12, 'sdfdf', 'dsfdsfs@test.com', 'sdfsdf', 3, '2024-02-18 14:19:35'),
(13, 'sdfdf', 'dsfdsfs@test.com', 'sdfsdf', 3, '2024-02-18 14:20:31'),
(14, 'sdfdf', 'dsfdsfs@test.com', 'sdfsdf', 3, '2024-02-18 14:20:44'),
(15, 'test', 'test@test.com', '02390238', 1, '2024-02-19 09:18:15'),
(16, 'test', 'test@test.com', '02390238', 1, '2024-02-19 09:18:47'),
(17, 'test', 'test@test.com', '02390238', 1, '2024-02-19 10:23:47'),
(18, 'test', 'test@test.com', '02390238', 1, '2024-02-19 10:23:55'),
(19, 'test', 'test@test.com', '02390238', 1, '2024-02-19 10:24:41'),
(20, 'test', 'test@test.com', '02390238', 1, '2024-02-19 10:24:51'),
(21, 'test', 'test@test.com', '02390238', 1, '2024-02-19 10:25:43'),
(22, 'test', 'test@test.com', '02390238', 1, '2024-02-19 10:25:49'),
(23, 'test', 'test@test.com', '02390238', 1, '2024-02-19 11:58:00'),
(24, 'test', 'test@test.com', '02390238', 1, '2024-02-19 11:59:02'),
(25, 'test', 'test@test.com', '02390238', 1, '2024-02-19 12:01:00'),
(26, 'test', 'test@test.com', '02390238', 1, '2024-02-19 12:01:27'),
(27, 'test', 'test@test.com', '02390238', 1, '2024-02-19 12:03:31');

INSERT INTO `tdays` (`id`, `name`, `location_id`, `status`, `date`) VALUES
(1, 'South Afrika', 1, NULL, '2024-02-20'),
(2, 'Italie', 2, NULL, '2024-02-23'),
(3, 'Mexico', 3, NULL, '2024-03-05'),
(4, 'Greece', 3, NULL, '2024-01-06');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;