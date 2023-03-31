-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 08:04 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `nama_lengkap_tamu` varchar(255) NOT NULL,
  `no_telepon_tamu` varchar(14) NOT NULL,
  `email_tamu` varchar(255) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `tanggal_checkin` date NOT NULL,
  `tanggal_checkout` date NOT NULL,
  `harga_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` float NOT NULL,
  `qty` int(11) NOT NULL,
  `bintang` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `img_path` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `nama`, `harga`, `qty`, `bintang`, `alamat`, `lokasi`, `img_path`, `description`) VALUES
(1, 'Atria Hotel', 600000, 10, 4, 'Jl. Gading Serpong Boulevard Gg. Kavling 2, Pakulonan Bar., Kec. Klp. Dua, Tangerang, Banten 15810', 'Tangerang', 'atriaHotel.jpg', 'Wifi gratis, layanan concierge, aula pertemuan, bar, dan kolam renang outdoor, lift'),
(2, 'JW Marriott', 2090000, 10, 5, 'Jl. Lingkar Mega Kuningan 1-2, Jakarta', 'Jakarta Selatan', 'jwMarriott.jpg', 'Kolam renang outdoor, health club, spa, gym, sauna, hot tub,restoran, bar, lift, brankas, wireless internet access'),
(3, 'Hotel Indonesia Kempinski', 1960000, 10, 5, 'Jl. M.H. Thamrin No.1, RT.1/RW.5, Menteng, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10310', 'Jakarta Pusat', 'hotelIndonesiaKempinski.jpg', 'Wedding hall, spa, restoran, bar, meeting and event'),
(4, 'Ghurfati Hotel', 120000, 10, 3, 'Jl. Mangga Besar IV H No.29, RW.2, Taman Sari, Kec. Taman Sari, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11150', 'Jakarta Barat', 'ghurfatiHotel.jpg', 'TV, Hygienic Washroom, free wifi, 24 jam helpdesk'),
(5, 'Starlet Hotel Serpong Tangerang', 250650, 10, 1, 'Jl. Raya Serpong No.37A, RT.004/RW.002, Pakualam, Kec. Serpong Utara, Kota Tangerang Selatan, Banten 15320', 'Tangerang Selatan', 'starletHotel.jpg', 'Free wifi, air conditioner, fasilitas bisnis, laundry, pembersihan kamar'),
(6, 'Whiz Hotel Pemuda Semarang', 230000, 10, 2, 'Jl. Piere Tendean No. 9 Semarang, Semarang Tengah, Semarang, Jawa Tengah, Indonesia, 50132', 'Semarang', 'whizHotel.jpg', 'Business Centre, Free Wifi, Parking Lot,Lift, Restaurant'),
(7, 'Airy Eco Cipondoh', 160000, 10, 2, 'Jl. KH. Ahmad Dahlan No., 2, RT.006/RW.006, Petir, Kec. Cipondoh, Kota Tangerang, Banten 15147', 'Tangerang', 'airyEco.jpg', 'Free wifi, restoran, gym, conference room'),
(8, 'Ibis Hotel', 318000, 10, 3, 'Jl. Gading Serpong Boulevard No.19, Curug Sangereng, Kec. Serpong, Tangerang, Banten 15810', 'Tangerang', 'ibisHotel.jpg', 'Spa, Free Wifi, Parking Lot,Lift, Restaurant, meeting room, Shower'),
(9, 'JHL Solitaire Hotel', 2180000, 10, 5, 'Jl. Gading Serpong Boulevard, Curug Sangereng, Kec. Klp. Dua, Tangerang, Banten 15810', 'Tangerang', 'jhlSolitaire.jpg', 'Outdoor Swimming Pool, Airport Shuttle, Spa, Free Wifi, Bar, Parking Lot,Lift, Restaurant, Fitness Center'),
(10, 'Four Season Hotel Jakarta', 3267000, 10, 5, 'Capital Place, Jl. Gatot Subroto No.Kav. 18, Kuningan, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12710', 'Jakarta Selatan', 'fourSeason.jpg', 'Outdoor Swimming Pool, Airport Shuttle, Spa, Free Wifi, Bar, Parking Lot,Lift, Restaurant, Fitness Center');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telepon` varchar(14) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `nama`, `tanggal_lahir`, `no_telepon`, `foto`, `role_id`) VALUES
(1, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin', '2021-01-03', '0812121212', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
