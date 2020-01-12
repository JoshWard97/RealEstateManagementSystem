-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 03:54 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestatesys`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `PID` int(5) NOT NULL,
  `address` varchar(64) NOT NULL,
  `rentAMonth` float NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `baths` int(11) NOT NULL,
  `occupied` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`PID`, `address`, `rentAMonth`, `bedrooms`, `baths`, `occupied`) VALUES
(1, '327 Salad Dr, Columbia, MO, 65201', 399.99, 3, 2, 0),
(2, '325 Salad Dr, Columbia, MO, 65201', 379.99, 2, 2, 0),
(3, '329 Salad Dr, Columbia, MO, 65201', 419.99, 4, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `siteusers`
--

CREATE TABLE `siteusers` (
  `ID` int(6) NOT NULL,
  `user` varchar(12) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `fName` varchar(12) NOT NULL,
  `lName` varchar(12) NOT NULL,
  `accessLevel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siteusers`
--

INSERT INTO `siteusers` (`ID`, `user`, `pass`, `fName`, `lName`, `accessLevel`) VALUES
(1, 'test', 'pass', 'Grader', 'Person', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `ID` int(6) NOT NULL,
  `fname` varchar(12) NOT NULL,
  `lname` varchar(12) NOT NULL,
  `DOB` date NOT NULL,
  `PID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`ID`, `fname`, `lname`, `DOB`, `PID`) VALUES
(1, 'Piper', 'Luther', '1974-10-02', 1),
(2, 'Malinde', 'Majors', '1972-11-14', 1),
(3, 'Kanya', 'Gilstrap', '2014-12-01', 1),
(4, 'Klarrisa', 'Dent', '1933-09-16', 1),
(5, 'Estele', 'Cathcart', '1936-10-17', 2),
(6, 'Gerta', 'Fussell', '1948-10-11', 2),
(7, 'Natalie', 'Lefler', '1982-04-11', 2),
(8, 'Debby', 'Worth', '1985-12-12', 2),
(9, 'Bernardina', 'Griffen', '1937-04-10', 3),
(10, 'Blondie', 'Ulibarri', '1966-06-26', 3),
(11, 'Cheri', 'Coen', '2003-07-27', 3),
(12, 'Cristabel', 'Ferrel', '2005-01-26', 3),
(13, 'Orsa', 'Otte', '1994-02-23', 3),
(14, 'Marcelle', 'Nolan', '1937-03-23', 3),
(15, 'Rosalinda', 'Sroka', '1934-06-02', 4),
(16, 'Gabriellia', 'Sherwood', '1999-05-27', 4),
(17, 'Rhodie', 'Milligan', '1985-07-30', 4),
(18, 'Maddi', 'Magruder', '1945-05-30', 4),
(19, 'Elfreda', 'Shively', '1976-02-14', 4),
(20, 'Eryn', 'Fregoso', '1934-02-04', 5),
(21, 'Leontyne', 'Spearman', '1953-06-28', 5),
(22, 'Milena', 'Lowe', '2002-07-03', 5),
(23, 'Ermentrude', 'Hsu', '1962-04-26', 5),
(24, 'Kimmy', 'Jesse', '1958-07-20', 6),
(25, 'Arlana', 'Rapert', '1994-04-22', 6),
(26, 'Betty', 'Kehoe', '1936-02-17', 7),
(27, 'Rhodie', 'Souza', '1970-12-29', 0),
(28, 'Dorthea', 'Stephens', '1975-07-31', 0),
(29, 'Edita', 'Borrero', '1972-02-14', 0),
(30, 'Mersey', 'Otis', '1953-07-25', 0),
(31, 'Candace', 'Vann', '1979-03-26', 0),
(32, 'Minerva', 'Woolfolk', '2009-04-12', 0),
(33, 'Collete', 'Bruggeman', '1961-08-25', 0),
(34, 'Christian', 'Saavedra', '1939-01-21', 0),
(35, 'Gates', 'Ocampo', '1982-02-13', 0),
(36, 'Ira', 'Seidl', '1992-08-26', 0),
(37, 'Alanna', 'Bush', '1984-11-05', 0),
(38, 'Marigold', 'Mcelroy', '2014-09-13', 0),
(39, 'Nomi', 'Lynn', '1932-12-21', 0),
(40, 'Joceline', 'Burnside', '1983-07-27', 0),
(41, 'Clementine', 'Espinosa', '1951-01-04', 0),
(42, 'Millie', 'Heiser', '1942-08-04', 0),
(43, 'Emilia', '', '2012-03-21', 0),
(44, 'Trixie', 'Mccomb', '1934-01-28', 0),
(45, 'Kalinda', 'Bowling', '1976-04-28', 0),
(46, 'Harriet', 'Alberto', '1976-11-10', 0),
(47, 'Myrlene', 'Posner', '2010-07-12', 0),
(48, 'Sarena', 'Criswell', '1995-03-31', 0),
(49, 'Benetta', 'Travis', '1977-12-03', 0),
(50, 'Karon', 'Acevedo', '1956-08-31', 0),
(51, 'Joye', 'Lindner', '2007-04-13', 0),
(52, 'Katinka', 'Peppers', '1950-02-24', 0),
(53, 'Breena', 'Hoy', '1963-11-13', 0),
(54, 'Sonya', 'Peachey', '1936-10-22', 0),
(55, 'Larine', 'Wigfall', '1978-03-22', 0),
(56, 'Ginevra', 'Kull', '2014-07-29', 0),
(57, 'Dayle', 'Belew', '1968-08-01', 0),
(58, 'Ingaberg', 'Ruff', '1960-10-13', 0),
(59, 'Eileen', 'Fleischer', '1937-01-13', 0),
(60, 'Analiese', 'Quinn', '1973-05-10', 0),
(61, 'Merissa', 'Mcculloch', '1975-11-18', 0),
(62, 'Elianora', 'Lyon', '1968-01-01', 0),
(63, 'Lesley', 'Bonham', '1952-12-12', 0),
(64, 'Jaime', 'Gilleland', '1949-01-23', 0),
(65, 'Licha', 'Bushey', '1951-05-04', 0),
(66, 'Christyna', 'Wisdom', '1965-01-08', 0),
(67, 'Gayle', 'Ott', '1932-10-16', 0),
(68, 'Carilyn', 'Cribbs', '2009-04-07', 0),
(69, 'Emelda', 'Blain', '1938-11-16', 0),
(70, 'Belvia', 'Butz', '1947-04-06', 0),
(71, 'Carmelina', 'Schuster', '2012-03-22', 0),
(72, 'Maribel', 'Stocks', '2006-09-14', 0),
(73, 'Elbertine', 'Frausto', '2009-02-12', 0),
(74, 'Cristin', 'Farina', '1993-08-12', 0),
(75, 'Merrill', 'Hurd', '1992-06-28', 0),
(76, 'Neille', 'Grayson', '1989-01-07', 0),
(77, 'Thomasa', 'Grady', '2009-06-24', 0),
(78, 'Fionnula', 'Dever', '1975-12-22', 0),
(79, 'Mureil', 'Duffy', '1944-01-30', 0),
(80, 'Uta', 'Lundy', '1966-12-03', 0),
(81, 'Fanechka', 'Stgeorge', '1984-06-22', 0),
(82, 'Tessi', 'Veliz', '1951-02-22', 0),
(83, 'Drona', 'Maya', '2001-03-24', 0),
(84, 'Timi', 'Haslam', '2010-02-09', 0),
(85, 'Ali', 'Nadeau', '1998-09-16', 0),
(86, 'Afton', 'Arteaga', '1954-10-22', 0),
(87, 'Abby', 'Darden', '1944-03-29', 0),
(88, 'Harriott', 'Renn', '1952-03-20', 0),
(89, 'Janaye', 'Ballesteros', '2004-06-15', 0),
(90, 'Jenn', 'Haden', '1945-07-06', 0),
(91, 'Barbra', 'Boring', '1991-07-18', 0),
(92, 'Trista', 'Cooksey', '1955-09-13', 0),
(93, 'Daryl', 'Elgin', '2005-03-19', 0),
(94, 'Fanny', 'Orth', '1987-01-29', 0),
(95, 'Sibeal', 'Diez', '1940-11-07', 0),
(96, 'Gilberta', 'Wait', '1937-07-02', 0),
(97, 'Lorianna', 'Fehr', '1969-05-03', 0),
(98, 'Vonni', 'Payne', '1933-02-08', 0),
(99, 'Esma', 'Purvis', '1939-08-19', 0),
(100, 'Paola', 'Pires', '1960-07-04', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `siteusers`
--
ALTER TABLE `siteusers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `PID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siteusers`
--
ALTER TABLE `siteusers`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
