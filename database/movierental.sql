-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Cze 2020, 13:08
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `movierental`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(10) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`id`, `admin`, `haslo`) VALUES
(7, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `imie` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `message` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `contact`
--

INSERT INTO `contact` (`id`, `imie`, `nazwisko`, `email`, `message`) VALUES
(2, 'ttest', 'test', 'test@test.com', 'test test test test 124');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `tytul` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `rezyser` varchar(60) COLLATE utf8_polish_ci DEFAULT NULL,
  `img` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `opis` text COLLATE utf8_polish_ci DEFAULT NULL,
  `cena` decimal(6,2) NOT NULL,
  `premiera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `movies`
--

INSERT INTO `movies` (`id`, `tytul`, `rezyser`, `img`, `opis`, `cena`, `premiera`) VALUES
(1, 'Gwiezdne Wojny: Skywalker. Odrodzenie.', 'J. J. Abrams', 'starwars.jpeg', 'Członkowie organizacji Ruchu Oporu ponownie stawiają czoła Najwyższemu Porządkowi.', '20.00', 2019),
(2, 'Assassin\'s Creed', 'Justin Kurzel', 'ac.jpg', 'Dzięki przełomowej technologii Callum Lynch doświadcza przygód swojego przodka, asasyna Aguilara, żyjącego w XV-wiecznej Hiszpanii. Wkrótce podejmuje walkę z potężnymi templariuszami.', '15.00', 2016),
(3, 'Proceder', 'Michał Węgrzyn', 'chada.jpg', 'Historia Tomasza Chady - rapera, który ginie niespodziewanie w 2018 roku. Śmierć muzyka szokuje wszystkich wokół.', '10.00', 2019),
(4, 'Szybcy i wściekli', ' Rob Cohen', 'siw.jpg', 'Policjant przenika do grupy organizującej nielegalne wyścigi samochodowe. Sytuacja komplikuje się, gdy poznaje bliżej siostrę lidera przestępców.', '10.00', 2001),
(5, 'Han Solo: Gwiezdne Wojny - historie', 'Ron Howard', 'solo.jpg', 'Młody Han Solo, przemierzając galaktykę, staje się przemytnikiem.', '20.00', 2018),
(8, 'Testowy1', 'Testowy', 'test.jpg', 'Film, służący do testowania panela administatora - dodawania, edycja, usuwanie', '999.00', 3013);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `tytul` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `tworca` varchar(60) COLLATE utf8_polish_ci DEFAULT NULL,
  `img` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `opis` text COLLATE utf8_polish_ci DEFAULT NULL,
  `cena` decimal(6,2) NOT NULL,
  `premiera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `series`
--

INSERT INTO `series` (`id`, `tytul`, `tworca`, `img`, `opis`, `cena`, `premiera`) VALUES
(1, 'Gwiezdne Wojny: Wojny Klonów', 'George Lucas', 'tcw.jpg', 'Wojny Klonów obejmują kolejne planety galaktyki. Wielka Armia Republiki, prowadzona przez rycerzy Jedi, stawia czoło siłom zbrojnym separatystów.', '14.99', 2008),
(2, 'Lucyfer', 'Tom Kapinos', 'lucifer.jpg', 'Nieszczęśliwy i znudzony swoim bytem Lucyfer Morningstar porzuca funkcję Władcy Piekieł, po czym udaje się do Los Angeles, gdzie zostaje właścicielem luksusowego klubu nocnego.', '16.59', 2016),
(3, 'Testowy123', 'Testowy2', 'test.jpg', 'Testowy serial do testowania panelu administratora.', '123.00', 1234);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tvs`
--

CREATE TABLE `tvs` (
  `id` int(11) NOT NULL,
  `tytul` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `studio` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `img` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `opis` text COLLATE utf8_polish_ci DEFAULT NULL,
  `cena` decimal(6,2) NOT NULL,
  `premiera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `tvs`
--

INSERT INTO `tvs` (`id`, `tytul`, `studio`, `img`, `opis`, `cena`, `premiera`) VALUES
(1, 'The Grand Tour', 'Amazon Studios', 'tgt.jpg', 'Jeremy, Richard i James podróżują po wszystkich kontynentach testując nowe pojazdy od producentów z całego świata.', '12.00', 2016),
(2, 'Top Gear', 'British Broadcasting Corporation (BBC)', 'tp.jpg', 'Prowadzący rozmawiają o wszystkim, co jest związane z samochodami, w swoim własnym, często kontrowersyjnym stylu.', '10.00', 2002),
(5, 'Testowy', 'Testowy', 'test.jpg', 'Testowy', '123.00', 2132);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `imie`, `nazwisko`, `email`) VALUES
(26, 'test', '$2y$10$bA5qtBktBxw.wbl44s4thuYD2S.Sz4iInYe33e9dlRRwz48hnB/Ju', 'test', 'test', 'test'),
(27, 'testmail', '$2y$10$xX8oTVlpFjy97fGDetVJO.loYQDwt.Cg1ZeuplJxxPQiMAol.Uzh6', 'Jaroslaw', 'Urbaniak', 'juurbaniak@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `tvs`
--
ALTER TABLE `tvs`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT dla tabeli `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `tvs`
--
ALTER TABLE `tvs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
