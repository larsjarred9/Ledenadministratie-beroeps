-- --------------------------------------------------------
-- Host:                         46.4.89.19
-- Server versie:                10.3.17-MariaDB-1:10.3.17+maria~bionic - mariadb.org binary distribution
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Versie:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Databasestructuur van s22_ledenadministration wordt geschreven
CREATE DATABASE IF NOT EXISTS `s22_ledenadministration` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `s22_ledenadministration`;

-- Structuur van  tabel s22_ledenadministration.contributies wordt geschreven
CREATE TABLE IF NOT EXISTS `contributies` (
  `jaar` year(4) NOT NULL,
  `totaalinkomsten` double DEFAULT NULL,
  PRIMARY KEY (`jaar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumpen data van tabel s22_ledenadministration.contributies: ~4 rows (ongeveer)
DELETE FROM `contributies`;
/*!40000 ALTER TABLE `contributies` DISABLE KEYS */;
INSERT INTO `contributies` (`jaar`, `totaalinkomsten`) VALUES
	('2016', 850),
	('2017', 1140),
	('2018', 910);
/*!40000 ALTER TABLE `contributies` ENABLE KEYS */;

-- Structuur van  tabel s22_ledenadministration.leden wordt geschreven
CREATE TABLE IF NOT EXISTS `leden` (
  `ledennummer` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` text NOT NULL,
  `achternaam` text NOT NULL,
  `geboortejaar` year(4) DEFAULT NULL,
  `adress` text NOT NULL,
  `huisnummer` int(11) NOT NULL,
  `postcode` text NOT NULL,
  `woonplaats` text NOT NULL,
  `wapenstoegestaan` text NOT NULL,
  `betalingtermijn` date NOT NULL,
  `contributie` int(11) NOT NULL,
  `geslacht` text NOT NULL,
  `email` text NOT NULL,
  `disable` text DEFAULT NULL,
  PRIMARY KEY (`ledennummer`)
) ENGINE=InnoDB AUTO_INCREMENT=493248326 DEFAULT CHARSET=utf8;

-- Dumpen data van tabel s22_ledenadministration.leden: ~21 rows (ongeveer)
DELETE FROM `leden`;
/*!40000 ALTER TABLE `leden` DISABLE KEYS */;
INSERT INTO `leden` (`ledennummer`, `voornaam`, `achternaam`, `geboortejaar`, `adress`, `huisnummer`, `postcode`, `woonplaats`, `wapenstoegestaan`, `betalingtermijn`, `contributie`, `geslacht`, `email`, `disable`) VALUES
	(123456, 'Gert', 'Gert', '2000', 'gertlaan', 69, '6942 GE', 'GERT', 'LP,LG', '2020-01-01', 190, 'Man', 'Gert@gmail.com', 'N'),
	(186626, 'Thomas', 'van Otterloo', '2002', 'Libanonstraat', 12, '2622 HS', 'Delft', 'LG,LP', '2019-12-13', 110, 'Man', 'movecraft.pirates@gmail.com', 'N'),
	(192852, 'Lars Jarred', 'Speetjens', '2003', 'Trumanlaan', 13, '4463 WR', 'Goes', 'LG,LP,KKP,KKG,HW', '2021-01-01', 110, 'Man', 'lars@cubes.host', 'N'),
	(193273, 'Calvin', 'Tangeman', '2003', 'Kristalweg', 120, '2614 SG', 'Delft', 'LG,LP', '2020-02-01', 110, 'Man', 'calvin.tangeman@gmail.com', 'N'),
	(235636, 'Henk', 'de Steen', '1901', 'De Aarde', 100, '4200 DA', 'Rotterdam', 'LP', '2020-12-02', 190, 'Man', 'henkdesteen@deaarde.com', 'N'),
	(236323, 'Ward', 'Klomp', '1972', 'klopmolenstraat', 1, '4488 RX', 'Rijswijk', 'LG,LP,KKP,KKG,KKK,MP', '2020-04-28', 199, 'Man', 'klop@glr.nl', 'N'),
	(248324, 'Linda', 'Speetjens', '1966', 'obamalaan', 13, '4463 WR', 'Goes', 'KP,', '2019-12-10', 190, 'Man', 'ellesse.goes@gmail.com', 'N'),
	(298987, 'k-pop stan', 'ksksksksks', '2000', 'zolder', 9, '2354PO', 'mijparentshouse', 'LP,LG', '2019-12-19', 190, 'Ongeidentificeerd', 'stanloona@imcreep.nl', 'Y'),
	(385565, 'Adwin', 'Minderhoud', '1973', 'testraat', 33, '4443 AM', 'Rotterdam', 'LG,LP,KKP,KKG,GKG,KKK,KS,MP', '2020-01-01', 198, 'Man', 'minderhoud@glr.nl', 'N'),
	(385764, 'Jeffrey', 'Eestermans', '1978', '?', 0, '?', 'Rotterdam', 'LG,LP,KKP,KKG,GKG,KKK,KS,MP', '2020-01-01', 198, 'Man', 'eestermans@glr.nl', 'N'),
	(420690, 'Matthijs', 'The Twat', '1901', 'die ene grot', 6969, '6969 EA', 'hoth', 'LP,LG', '1901-12-19', 190, 'Ongeidentificeerd', 'MattTheAT-ST@hoth.hoth', 'Y'),
	(422694, 'harold', 'de meeuw', '1969', 'zeestraat ', 10, '3333 ZE', 'scheveningen', 'LP,LG', '2019-12-19', 190, 'Ongeidentificeerd', 'harolddemeeuw@gmail.com', 'Y'),
	(437978, 'china', 'number1', '2001', 'GOVERMENTSTREET', 12, '4327 XY', 'CHINA', 'LP,LG', '2019-12-19', 110, 'Ongeidentificeerd', 'one@china.gov', 'Y'),
	(525159, 'giovani', 'eradus', '2002', 'dewdew ', 3, '2238tr', 'leiden', 'LP,LG', '2019-12-19', 110, 'Man', '85214@glr.nl', 'N'),
	(548184, 'Bart', 'de vis', '2017', 'De Zee', 420, '6942 DZ', 'Noordzee', 'LG', '2019-11-08', 110, 'Vrouw', 'bartdevis@dezee.com', 'N'),
	(552113, 'jelle', 'wijma', '2001', 'wad', 5, 'adwa', 'adw', 'LP,LG', '2019-12-19', 110, 'Man', 'jelle@gmail.com', 'N'),
	(556856, 'tessa', 'taartpunt', '2019', 'taartstraat', 12, '9341 XX', 'taartenstad', 'LP,LG', '2019-12-19', 110, 'Vrouw', 'tessa@taart.lekker', 'N'),
	(666666, 'Dennis', 'Jochems', '2002', 'Zijlstroom', 124, '2353 NR', 'Leidorp', 'KP', '2020-01-12', 199, 'Vrouw', '84825@glr.nl', 'N'),
	(783555, 'nee', 'ja', '0000', 'janee', 0, 'hehe', 'haha', 'LP,LG', '2019-12-19', 190, 'Ongeidentificeerd', 'nee@ja.com', 'Y'),
	(994190, 'gerrit', 'Ree', '1969', 'carterhof', 69, '6942 FR', 'New York', 'LP,LG', '2019-12-20', 190, 'Vrouw', 'ree@nymail.com', 'Y'),
	(493248325, 'Flip', 'Fluitketel', '0000', 'asdf', 33, '2222aa', 'asdfasdf', 'bazooka', '2019-11-11', 0, 'Man', 'flip@fluitketel.nl', NULL);
/*!40000 ALTER TABLE `leden` ENABLE KEYS */;

-- Structuur van  tabel s22_ledenadministration.users wordt geschreven
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumpen data van tabel s22_ledenadministration.users: ~2 rows (ongeveer)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `email`, `level`) VALUES
	(1, '_admin', '#1Geheim', 'admin@doeltreffend.nl', 1),
	(2, 'Lars', '#1Geheim', 'Lars@gmail.com', 2),
	(3, 'Matthijs', 'hewwo', 'matthijsnauta@gmail.com', 3);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
