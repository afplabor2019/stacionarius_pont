-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2019. Sze 29. 14:49
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
-- Tábla szerkezet ehhez a táblához `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `FullName` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `Phone` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`Phone`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`FullName`, `Phone`, `Email`, `Password`) VALUES
('Donald Duck', '123456789', 'donald.duck@gmail.com', 'a8f5f167f44f4964e6c998dee827110c'),
('Szondi MÃ¡tÃ©', '06206664422', 'szondiazazel@gmail.com', 'a8f5f167f44f4964e6c998dee827110c'),
('Teszt Teszti', '06123456789', 'asd@asd.com', 'a8f5f167f44f4964e6c998dee827110c'),
('Asd asd', '987654321', 'asdasd@gmail.com', 'a8f5f167f44f4964e6c998dee827110c'),
('Kukor Ica', '06111111111', 'kukorica@freemail.hu', 'a8f5f167f44f4964e6c998dee827110c'),
('Teszt Elek', '06222222222', 'tesztelek@gmail.com', 'a8f5f167f44f4964e6c998dee827110c'),
('Mezei Virag', '06333333333', 'mezeivirag@citromail.hu', 'a8f5f167f44f4964e6c998dee827110c'),
('Vincs Eszter', '06444444444', 'vincseszter@gmail.com', 'a8f5f167f44f4964e6c998dee827110c'),
('asddsa', '123', 'asdds@a', 'a8f5f167f44f4964e6c998dee827110c'),
('dsadf', '3213', 'asdw@a', 'a8f5f167f44f4964e6c998dee827110c'),
('Disz NÃ³ra', '06555555555', 'dinsznora@gmail.com', 'a8f5f167f44f4964e6c998dee827110c'),
('Eszet Lenke', '06666666666', 'eszetlenke@gmail.com', 'a8f5f167f44f4964e6c998dee827110c'),
('dasd', '24', 'dsda@a', 'a8f5f167f44f4964e6c998dee827110c'),
('s', '1234', 'asd@as', 'a8f5f167f44f4964e6c998dee827110c'),
('dsasd', '31241', 'asda@asdf', 'a8f5f167f44f4964e6c998dee827110c');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
