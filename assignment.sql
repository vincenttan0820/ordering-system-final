-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 31, 2023 at 01:59 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Signature Beng Beng'),
(2, 'Coco'),
(3, 'Milk Tea'),
(4, 'Matcha'),
(5, 'Smoothies');

-- --------------------------------------------------------

--
-- Table structure for table `item_table`
--

DROP TABLE IF EXISTS `item_table`;
CREATE TABLE IF NOT EXISTS `item_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(50) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `category_id` int NOT NULL,
  `item_price` double NOT NULL,
  `availability` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `item_table`
--

INSERT INTO `menu` (`id`, `name`, `description`, `category_id`, `price`, `quantity`) VALUES
(5, 'Signature Coco', 'Superior indeed, thick fresh cream is added to rich cocoa, making this concoction one of the most de', 2, 7.17, 1),
(7, 'Hazelnut Coco', 'Nothing quite as heart-warming as thick cocoa mixed with the flavors of roasted hazelnuts. Definitel', 2, 7.26, 1),
(8, 'Coco Latte', 'find your balance with this Yin & Yang concoction that will get you shaking and stirring. ', 2, 7.64, 1),
(9, 'Malty Coco (Horlicks)', 'Energize the active being in you with the perfect match of Horlicks and delicious cocoa. ', 2, 7.64, 1),
(10, 'Signature Brown Sugar Pearl Milk Tea', 'A locally-upgraded version of the Originla Milk Tes, now with brown sugar! Combined with the irresis', 3, 7.26, 1),
(11, 'Original Pearl Milk Tea', 'The Original Pearl Milk Tea tops the chart as teh most famous type of milk tea in the world. A must-', 3, 7.17, 1),
(12, 'Roasted Milk Tea with Grass Jelly', 'Soft and silky smooth, from the taste of the tea to the toppings themselves. We recommend this mild ', 3, 7.17, 1),
(13, 'Black Diamond Roasted Milk Tea', 'This is the drink that make you feel like you are shining with the black diamond on top of the drink', 3, 8.21, 1),
(14, 'Nishio Matcha with Signature Warm Pearls', 'Nishio Matcha with Signature Warm Pearls', 4, 10.47, 1),
(15, 'Nishio Matcha Milk Tea with Red Bean', 'Nishio Matcha Milk Tea with Red Bean', 4, 9.53, 1),
(16, 'Nishio Matcha Smoothie with Red Bean', 'Nishio Matcha Smoothie with Red Bean', 4, 11.51, 1),
(17, 'Nishio Matcha Latte', 'Nishio Matcha Latte', 4, 9.53, 1),
(18, 'Mango Passion Smoothie', 'This drink has finely-shaved ice mixed with passionfruit pulp and mango to make up one of the fruiti', 5, 9.06, 1),
(19, 'Lychee Sago Tea Smoothie', 'This light and refreshing drink counters the hot weather outside with its lychee and tea combination', 5, 9.06, 1),
(20, 'Malty Smoothie (Horlicks)', 'Cool off with our one-and-only malt based smoothie, packed with milky and nitritious goodness. Great', 5, 9.06, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
