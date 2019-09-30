-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2019. Sze 30. 02:46
-- Kiszolgáló verziója: 5.7.26
-- PHP verzió: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `users`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `incart`
--

DROP TABLE IF EXISTS `incart`;
CREATE TABLE IF NOT EXISTS `incart` (
  `IncartId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(100) NOT NULL,
  `PizzaType` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `Size` varchar(5) COLLATE utf8_hungarian_ci NOT NULL,
  `PizzaAmount` int(5) NOT NULL,
  `Topping` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `Address` varchar(200) COLLATE utf8_hungarian_ci NOT NULL,
  `Message` varchar(1000) COLLATE utf8_hungarian_ci NOT NULL,
  `Price` int(10) NOT NULL,
  PRIMARY KEY (`IncartId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `OrderId` int(100) NOT NULL AUTO_INCREMENT,
  `UserId` int(100) NOT NULL,
  `PizzaType` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `Size` varchar(5) COLLATE utf8_hungarian_ci NOT NULL,
  `PizzaAmount` int(5) NOT NULL,
  `Topping` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `Address` varchar(200) COLLATE utf8_hungarian_ci NOT NULL,
  `Message` varchar(1000) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `Price` int(100) NOT NULL,
  PRIMARY KEY (`OrderId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pizzas`
--

DROP TABLE IF EXISTS `pizzas`;
CREATE TABLE IF NOT EXISTS `pizzas` (
  `PizzaId` int(11) NOT NULL AUTO_INCREMENT,
  `PizzaType` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `Size` varchar(5) COLLATE utf8_hungarian_ci NOT NULL,
  `Price` int(10) NOT NULL,
  PRIMARY KEY (`PizzaId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `pizzas`
--

INSERT INTO `pizzas` (`PizzaId`, `PizzaType`, `Size`, `Price`) VALUES
(1, 'Margarita', '32cm', 1500),
(2, 'Margarita', '48cm', 2500),
(3, 'Margarita', '62cm', 3500),
(4, 'Pepperoni', '32cm', 2000),
(5, 'Pepperoni', '48cm', 3000),
(6, 'Pepperoni', '62cm', 4000),
(7, 'Mushroom', '32cm', 2000),
(8, 'Mushroom', '48cm', 3000),
(9, 'Mushroom', '62cm', 4000);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `toppings`
--

DROP TABLE IF EXISTS `toppings`;
CREATE TABLE IF NOT EXISTS `toppings` (
  `Topping` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `Price` int(10) NOT NULL,
  UNIQUE KEY `Topping` (`Topping`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `toppings`
--

INSERT INTO `toppings` (`Topping`, `Price`) VALUES
('Cheese', 200),
('Ham', 150),
('Tomato', 100),
('Corn', 150);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserId` int(100) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `Phone` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Phone` (`Phone`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`UserId`, `FullName`, `Phone`, `Email`, `Password`) VALUES
(1, 'Szondi Mate', '06706666666', 'szondimate@gmail.com', 'a8f5f167f44f4964e6c998dee827110c'),
(2, 'Teszt Elek', '061', 'tesztelek@gmail.com', 'a8f5f167f44f4964e6c998dee827110c'),
(3, 'Vincs Eszter', '062', 'vincseszter@gmail.com', 'a8f5f167f44f4964e6c998dee827110c');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
