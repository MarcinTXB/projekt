-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Lip 2015, 13:23
-- Wersja serwera: 5.6.24
-- Wersja PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `wypozyczalnia_samochodow`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID_Admin` smallint(5) unsigned NOT NULL,
  `LoginAdmin` tinytext COLLATE utf8_polish_ci NOT NULL,
  `Imie` tinytext COLLATE utf8_polish_ci,
  `Nazwisko` tinytext COLLATE utf8_polish_ci,
  `AdminPass` tinytext COLLATE utf8_polish_ci,
  `SesID` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adres`
--

CREATE TABLE IF NOT EXISTS `adres` (
  `ID_Adres` bigint(20) unsigned NOT NULL,
  `Miasto` tinytext COLLATE utf8_polish_ci,
  `Rodzaj_ulicy` tinytext COLLATE utf8_polish_ci,
  `Ulica` tinytext COLLATE utf8_polish_ci,
  `Nr_budynku` smallint(5) unsigned DEFAULT NULL,
  `Nr_mieszkania` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `adres`
--

INSERT INTO `adres` (`ID_Adres`, `Miasto`, `Rodzaj_ulicy`, `Ulica`, `Nr_budynku`, `Nr_mieszkania`) VALUES
(1, 'MiastoI', 'ul', 'UlicaI', 1, 11),
(2, 'MiastoIII', 'ul.', 'UlicaIII', 3, 33),
(3, 'MiastoVI', 'ul.', 'UlicaVI', 6, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `faktura`
--

CREATE TABLE IF NOT EXISTS `faktura` (
  `ID_Faktura` bigint(20) unsigned NOT NULL,
  `ID_Oddzial` tinyint(3) unsigned DEFAULT NULL,
  `ID_Pracownik` mediumint(8) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE IF NOT EXISTS `klient` (
  `ID_Klient` bigint(20) unsigned NOT NULL,
  `ID_Adres` bigint(20) unsigned DEFAULT NULL,
  `Imie` tinytext COLLATE utf8_polish_ci,
  `Nazwisko` tinytext COLLATE utf8_polish_ci,
  `Pesel` char(11) COLLATE utf8_polish_ci DEFAULT NULL,
  `Telefon` tinytext COLLATE utf8_polish_ci,
  `Email` tinytext COLLATE utf8_polish_ci,
  `UsrPass` tinytext COLLATE utf8_polish_ci,
  `SesID` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klient`
--

INSERT INTO `klient` (`ID_Klient`, `ID_Adres`, `Imie`, `Nazwisko`, `Pesel`, `Telefon`, `Email`, `UsrPass`, `SesID`) VALUES
(1, 1, 'ImieI', 'NazwiskoI', '11111111111', '111-111-111', 'email@email.com', NULL, NULL),
(2, 2, 'ImieIII', 'NazwiskoIII', '33333333333', '333-333-333', 'email3@email.com', '$2y$11$QauA3iLymvw63PDdl37hC.iv5/CXxwrKaUSgWeDv2fEPCNT7gxaNm', 4294967295),
(3, 3, 'ImieVI', 'NazwiskoVI', '16666666666', '166-166-166', 'Imie6@gmail.com', '$2y$11$PqJ8O6S3OznZrcldYa9N7.WAf7L2CNP4hVsxeqYimtcL0kq1/Ppc6', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `numerfaktury`
--

CREATE TABLE IF NOT EXISTS `numerfaktury` (
  `ID_Faktura` bigint(20) unsigned NOT NULL,
  `Rok` year(4) DEFAULT NULL,
  `Miesiac` tinyint(2) DEFAULT NULL,
  `NrFakturywMiesiacu` mediumint(8) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oddzial`
--

CREATE TABLE IF NOT EXISTS `oddzial` (
  `ID_Oddzial` tinyint(3) unsigned NOT NULL,
  `Symbol_oddzialu` tinytext COLLATE utf8_polish_ci,
  `Nazwa_oddzialu` tinytext COLLATE utf8_polish_ci,
  `Miasto` tinytext COLLATE utf8_polish_ci,
  `Ulica` tinytext COLLATE utf8_polish_ci,
  `Telefon` tinytext COLLATE utf8_polish_ci,
  `Email` tinytext COLLATE utf8_polish_ci
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `oddzial`
--

INSERT INTO `oddzial` (`ID_Oddzial`, `Symbol_oddzialu`, `Nazwa_oddzialu`, `Miasto`, `Ulica`, `Telefon`, `Email`) VALUES
(1, 'Oddz1', 'Oddzial1', 'Miasto1', 'Ulica 1/2', '111-111-111', 'Oddzial1@Wypozyczalnia.com'),
(2, 'Oddz2', 'Oddzial2', 'Miasto1', 'Ulica 102/2', '111-111-222', 'Oddzial2@Wypozyczalnia.com');
(3, 'Oddz3', 'Oddzial3', 'Miasto2', 'Ulica 20A', '111-111-333', 'Oddzial3@Wypozyczalnia.com');
(4, 'Oddz4', 'Oddzial4', 'Miasto2', 'Ulica 555', '111-111-444', 'Oddzial4@Wypozyczalnia.com');
(5, 'Oddz5', 'Oddzial5', 'Miasto3', 'Ulica 2/2', '111-111-555', 'Oddzial5@Wypozyczalnia.com');
(6, 'Oddz6', 'Oddzial6', 'Miasto3', 'Ulica 20', '111-111-666', 'Oddzial6@Wypozyczalnia.com');
(7, 'Oddz7', 'Oddzial7', 'Miasto4', 'Ulica 2/2', '111-111-777', 'Oddzial7@Wypozyczalnia.com');
(8, 'Oddz8', 'Oddzial8', 'Miasto5', 'Ulica 55B', '111-111-888', 'Oddzial8@Wypozyczalnia.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownik`
--

CREATE TABLE IF NOT EXISTS `pracownik` (
  `ID_Pracownik` mediumint(8) unsigned NOT NULL,
  `ID_Adres` bigint(20) unsigned DEFAULT NULL,
  `ID_Oddzial` tinyint(3) unsigned DEFAULT NULL,
  `LoginPrac` tinytext COLLATE utf8_polish_ci,
  `Stanowisko` tinytext COLLATE utf8_polish_ci,
  `Imie` tinytext COLLATE utf8_polish_ci,
  `Nazwisko` tinytext COLLATE utf8_polish_ci,
  `Pesel` char(11) COLLATE utf8_polish_ci DEFAULT NULL,
  `Telefon` tinytext COLLATE utf8_polish_ci,
  `Email` tinytext COLLATE utf8_polish_ci,
  `PracPass` tinytext COLLATE utf8_polish_ci,
  `SesID` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacja`
--

CREATE TABLE IF NOT EXISTS `rezerwacja` (
  `ID_Rezerwacja` bigint(20) unsigned NOT NULL,
  `ID_Oddzial` tinyint(3) unsigned DEFAULT NULL,
  `ID_Klient` bigint(20) unsigned DEFAULT NULL,
  `ID_Samochod` mediumint(8) unsigned DEFAULT NULL,
  `Data_rezerwacji` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `rezerwacja`
--

INSERT INTO `rezerwacja` (`ID_Rezerwacja`, `ID_Oddzial`, `ID_Klient`, `ID_Samochod`, `Data_rezerwacji`) VALUES
(109, 1, 2, 1, '2015-07-30'),
(110, 1, 2, 1, '2015-07-31'),
(111, 1, 2, 1, '2015-08-01'),
(112, 1, 2, 1, '2015-08-02'),
(113, 1, 2, 1, '2015-07-20'),
(114, 1, 2, 1, '2015-07-21'),
(115, 1, 2, 1, '2015-07-08'),
(116, 1, 2, 1, '2015-07-09'),
(117, 1, 2, 1, '2015-07-07'),
(118, 1, 2, 1, '2015-08-10'),
(119, 1, 2, 1, '2015-08-11'),
(120, 1, 2, 1, '2015-08-12'),
(121, 1, 2, 1, '2015-08-13'),
(122, 1, 2, 1, '2015-08-14');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochod`
--

CREATE TABLE IF NOT EXISTS `samochod` (
  `ID_Samochod` mediumint(8) unsigned NOT NULL,
  `ID_Oddzial` tinyint(3) unsigned DEFAULT NULL,
  `Marka` tinytext COLLATE utf8_polish_ci,
  `Model` tinytext COLLATE utf8_polish_ci,
  `Rocznik` smallint(4) DEFAULT NULL,
  `Rodzaj_paliwa` tinytext COLLATE utf8_polish_ci NOT NULL,
  `Pojemnosc_Silnika` float DEFAULT NULL,
  `Moc_Silnika` smallint(5) unsigned DEFAULT NULL,
  `Kolor` tinytext COLLATE utf8_polish_ci,
  `Rodzaj_samochodu` tinytext COLLATE utf8_polish_ci,
  `Symbol_samochodu` tinytext COLLATE utf8_polish_ci
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `samochod`
--

INSERT INTO `samochod` (`ID_Samochod`, `ID_Oddzial`, `Marka`, `Model`, `Rocznik`, `Rodzaj_paliwa`, `Pojemnosc_Silnika`, `Moc_Silnika`, `Kolor`, `Rodzaj_samochodu`, `Symbol_samochodu`) VALUES
(1, 1, 'Mitsubishi', 'Lancer', 2015, 'benzyna', 2000, 110, 'Czarny', 'osobowy', 'Mitsubishi1'),
(2, 1, 'Mitsubishi', 'Lancer', 2015, 'benzyna', 2200, 150, 'czarny', 'osobowy', 'Mitsubishi2'),
(3, 1, 'Mitsubishi', 'Lancer', 2015, 'benzyna', 2200, 160, 'czarny', 'osobowy', 'Mitsubishi3'),
(4, 1, 'Mitsubishi', 'Lancer', 2015, 'benzyna', 2000, 110, 'czarny', 'osobowy', 'Mitsubishi4'),
(5, 1, 'Mitsubishi', 'Lancer', 2015, 'benzyna', 2200, 160, 'czarny', 'osobowy', 'Mitsubishi5'),
(6, 2, 'Mitsubishi', 'Lancer', 2015, 'benzyna', 2200, 160, 'czarny', 'osobowy', 'Mitsubishi6'),
(7, 2, 'Mitsubishi', 'Lancer', 2015, 'benzyna', 2200, 160, 'czarny', 'osobowy', 'Mitsubishi7'),
(8, 2, 'Mitsubishi', 'Lancer', 2015, 'diesel', 2200, 160, 'czarny', 'osobowy', 'Mitsubishi8'),
(9, 2, 'Mitsubishi', 'Lancer', 2015, 'benzyna', 2200, 160, 'czarny', 'osobowy', 'Mitsubishi9'),
(10, 2, 'Mitsubishi', 'Lancer', 2015, 'benzyna', 2200, 160, 'czarny', 'osobowy', 'Mitsubishi10'),
(11, 2, 'Mitsubishi', 'Lancer', 2015, 'diesel', 2200, 160, 'czarny', 'osobowy', 'Mitsubishi11'),
(12, 3, 'Mitsubishi', 'Lancer', 2015, 'benzyna', 2200, 160, 'czarny', 'osobowy', 'Mitsubishi12'),
(13, 3, 'Mitsubishi', 'Lancer', 2015, 'benzyna', 2200, 160, 'czarny', 'osobowy', 'Mitsubishi13'),
(14, 3, 'Mitsubishi', 'Lancer', 2015, 'benzyna', 2200, 160, 'czarny', 'osobowy', 'Mitsubishi14'),

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenie`
--

CREATE TABLE IF NOT EXISTS `wypozyczenie` (
  `ID_Wypozyczenie` bigint(20) unsigned NOT NULL,
  `ID_Oddzial` tinyint(3) unsigned DEFAULT NULL,
  `ID_Samochod` mediumint(8) unsigned DEFAULT NULL,
  `ID_Klient` bigint(20) unsigned DEFAULT NULL,
  `ID_Pracownik` mediumint(8) unsigned DEFAULT NULL,
  `ID_Faktura` bigint(20) unsigned DEFAULT NULL,
  `Data_wypozyczenia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Indexes for table `adres`
--
ALTER TABLE `adres`
  ADD PRIMARY KEY (`ID_Adres`);

--
-- Indexes for table `faktura`
--
ALTER TABLE `faktura`
  ADD PRIMARY KEY (`ID_Faktura`), ADD KEY `ID_Oddzial` (`ID_Oddzial`), ADD KEY `ID_Pracownik` (`ID_Pracownik`);

--
-- Indexes for table `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`ID_Klient`), ADD KEY `ID_Adres` (`ID_Adres`);

--
-- Indexes for table `numerfaktury`
--
ALTER TABLE `numerfaktury`
  ADD PRIMARY KEY (`ID_Faktura`);

--
-- Indexes for table `oddzial`
--
ALTER TABLE `oddzial`
  ADD PRIMARY KEY (`ID_Oddzial`);

--
-- Indexes for table `pracownik`
--
ALTER TABLE `pracownik`
  ADD PRIMARY KEY (`ID_Pracownik`), ADD KEY `ID_Adres` (`ID_Adres`), ADD KEY `ID_Oddzial` (`ID_Oddzial`);

--
-- Indexes for table `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD PRIMARY KEY (`ID_Rezerwacja`), ADD KEY `ID_Oddzial` (`ID_Oddzial`), ADD KEY `ID_Klient` (`ID_Klient`), ADD KEY `ID_Samochod` (`ID_Samochod`);

--
-- Indexes for table `samochod`
--
ALTER TABLE `samochod`
  ADD PRIMARY KEY (`ID_Samochod`), ADD KEY `ID_Oddzial` (`ID_Oddzial`);

--
-- Indexes for table `wypozyczenie`
--
ALTER TABLE `wypozyczenie`
  ADD PRIMARY KEY (`ID_Wypozyczenie`), ADD KEY `ID_Oddzial` (`ID_Oddzial`), ADD KEY `ID_Samochod` (`ID_Samochod`), ADD KEY `ID_Klient` (`ID_Klient`), ADD KEY `ID_Pracownik` (`ID_Pracownik`), ADD KEY `ID_Faktura` (`ID_Faktura`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_Admin` smallint(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `adres`
--
ALTER TABLE `adres`
  MODIFY `ID_Adres` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `faktura`
--
ALTER TABLE `faktura`
  MODIFY `ID_Faktura` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `klient`
--
ALTER TABLE `klient`
  MODIFY `ID_Klient` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `oddzial`
--
ALTER TABLE `oddzial`
  MODIFY `ID_Oddzial` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
  MODIFY `ID_Pracownik` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  MODIFY `ID_Rezerwacja` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT dla tabeli `samochod`
--
ALTER TABLE `samochod`
  MODIFY `ID_Samochod` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `wypozyczenie`
--
ALTER TABLE `wypozyczenie`
  MODIFY `ID_Wypozyczenie` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `faktura`
--
ALTER TABLE `faktura`
ADD CONSTRAINT `faktura_ibfk_1` FOREIGN KEY (`ID_Oddzial`) REFERENCES `oddzial` (`ID_Oddzial`),
ADD CONSTRAINT `faktura_ibfk_2` FOREIGN KEY (`ID_Pracownik`) REFERENCES `pracownik` (`ID_Pracownik`);

--
-- Ograniczenia dla tabeli `klient`
--
ALTER TABLE `klient`
ADD CONSTRAINT `klient_ibfk_1` FOREIGN KEY (`ID_Adres`) REFERENCES `adres` (`ID_Adres`);

--
-- Ograniczenia dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
ADD CONSTRAINT `pracownik_ibfk_1` FOREIGN KEY (`ID_Adres`) REFERENCES `adres` (`ID_Adres`),
ADD CONSTRAINT `pracownik_ibfk_2` FOREIGN KEY (`ID_Oddzial`) REFERENCES `oddzial` (`ID_Oddzial`);

--
-- Ograniczenia dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
ADD CONSTRAINT `rezerwacja_ibfk_1` FOREIGN KEY (`ID_Oddzial`) REFERENCES `oddzial` (`ID_Oddzial`),
ADD CONSTRAINT `rezerwacja_ibfk_2` FOREIGN KEY (`ID_Klient`) REFERENCES `klient` (`ID_Klient`),
ADD CONSTRAINT `rezerwacja_ibfk_3` FOREIGN KEY (`ID_Samochod`) REFERENCES `samochod` (`ID_Samochod`);

--
-- Ograniczenia dla tabeli `samochod`
--
ALTER TABLE `samochod`
ADD CONSTRAINT `samochod_ibfk_1` FOREIGN KEY (`ID_Oddzial`) REFERENCES `oddzial` (`ID_Oddzial`);

--
-- Ograniczenia dla tabeli `wypozyczenie`
--
ALTER TABLE `wypozyczenie`
ADD CONSTRAINT `wypozyczenie_ibfk_1` FOREIGN KEY (`ID_Oddzial`) REFERENCES `oddzial` (`ID_Oddzial`),
ADD CONSTRAINT `wypozyczenie_ibfk_2` FOREIGN KEY (`ID_Samochod`) REFERENCES `samochod` (`ID_Samochod`),
ADD CONSTRAINT `wypozyczenie_ibfk_3` FOREIGN KEY (`ID_Klient`) REFERENCES `klient` (`ID_Klient`),
ADD CONSTRAINT `wypozyczenie_ibfk_4` FOREIGN KEY (`ID_Pracownik`) REFERENCES `pracownik` (`ID_Pracownik`),
ADD CONSTRAINT `wypozyczenie_ibfk_5` FOREIGN KEY (`ID_Faktura`) REFERENCES `faktura` (`ID_Faktura`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
