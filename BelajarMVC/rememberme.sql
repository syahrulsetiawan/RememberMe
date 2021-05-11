-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2021 pada 20.14
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rememberme`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `id_account` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `profile_picture` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id_account`, `username`, `fullname`, `email`, `phone`, `profile_picture`, `reg_date`, `password`) VALUES
(1, 'admin1234', 'admin', 'admin@email.com', NULL, 'gambar1.jpg', '0000-00-00 00:00:00', 'admin'),
(25, 'SetiawanSyahrul91', 'Syahrul Setiawan', 'syahrulsetiaw626@gmail.com', '081802046558', '', '0000-00-00 00:00:00', '$2y$10$vpACJQror9nFu/vpJCMr4.mo/jeNyJBF9Ee1v2ERdbNFiJe5ulfre'),
(26, 'prabowoputri23', 'putri prabowo', 'putriPrabowo223@gmail.com', '087644252542', '', '0000-00-00 00:00:00', '$2y$10$6hO0K31kWTd0lyxSrxwyHe2h2g1VIGDCLUoLAydvQyZ37UOFu2UqG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notes`
--

CREATE TABLE `notes` (
  `id_note` int(10) UNSIGNED ZEROFILL NOT NULL,
  `title_note` varchar(50) DEFAULT NULL,
  `main_note` varchar(3000) DEFAULT NULL,
  `kode_color` varchar(30) NOT NULL,
  `date_note` date DEFAULT current_timestamp(),
  `Notification` tinyint(1) DEFAULT 0,
  `archive` tinyint(1) DEFAULT 0,
  `trash` tinyint(1) DEFAULT 0,
  `id_account` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notes`
--

INSERT INTO `notes` (`id_note`, `title_note`, `main_note`, `kode_color`, `date_note`, `Notification`, `archive`, `trash`, `id_account`) VALUES
(0000000072, 'Title Note ke-0', 'Ini adalah isi dari note ke-0', 'green-style', '2013-01-22', 0, 0, 0, 1),
(0000000073, 'Title Note ke-1', 'Ini adalah isi dari note ke-1', 'yellow-style', '2013-01-08', 0, 0, 0, 1),
(0000000078, 'Title Note ke-6', 'Ini adalah isi dari note ke-6', 'green-style', '2013-01-30', 0, 0, 0, 1),
(0000000080, 'Title Note ke-8', 'Ini adalah isi dari note ke-8', 'blue-style', '2013-01-13', 0, 0, 0, 1),
(0000000081, 'Title Note ke-9', 'Ini adalah isi dari note ke-9', 'yellow-style', '2013-01-04', 0, 0, 0, 1),
(0000000082, 'Title Note ke-sekian', 'Ini adalah isi dari note ke-sekian', 'orange-style', '2013-01-06', 1, 1, 0, 1),
(0000000083, 'asdasdasdasda', 'sdasdasdasd', 'red-style', '2021-03-30', 1, 0, 0, 1),
(0000000084, 'heyhsfghw4ywdfgaert5', 'jfryuiretnetyuetyhj', 'red-style', '2021-03-30', 1, 0, 0, 1),
(0000000085, 'dasdasdasd', 'asdasdasdasdasdasd', 'dark-style', '2021-03-31', 1, 0, 0, 1),
(0000000090, 'Queen of south', 'I was going out then\r\nTo the south of the sea\r\nWith the green tee that they told me not to wear\r\nIt didn\'t make sense\r\nHow am I supposed to believe\r\nI lit my cig then\r\nOn the side of the sea with the green tee\r\nThat was supposed to make me cursed\r\nIt was nonsense\r\nThat was what I still believed\r\nThen the wave came\r\nIt took me to your realm\r\nI felt your magic in my vein\r\nThough I doubted you before\r\nI worship you now\r\n308 I know your room\r\nNow I know where to go\r\nTo see your good look\r\nI\'m addicted now\r\nYes I\'m addicted to your magic\r\n\'Cause every time you do it\r\nI feel half dead though I\'m alive\r\nWell those sensations\r\nIt feels better than the drugs\r\nOh my lady, I will do what you want\r\n\'Cause yeah you have me, both my body and my soul\r\nNow I\'m your puppet, yes your wish is my command\r\nOhâ€¦\r\n', 'green-style', '2021-04-01', 0, 0, 0, 1),
(0000000095, 'kjhdgajdasd', 'dasdjbigefkbf', 'yellow-style', '2021-04-06', 0, 0, 0, 1),
(0000000098, 'Ini Judul Note Terbaru', 'Halo Dunia hari ini saya membuat sebuah note baru', 'purple-style', '2021-04-27', 0, 1, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- Indeks untuk tabel `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_note`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `notes`
--
ALTER TABLE `notes`
  MODIFY `id_note` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
