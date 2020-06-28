-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2020 at 06:26 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qurban`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `donate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `livestock_id` int(11) NOT NULL,
  `recipient` varchar(50) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','deliver','cancelled','success') NOT NULL DEFAULT 'pending',
  `handled_by_seller` tinyint(1) NOT NULL,
  `deliver_address` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donate_id`, `user_id`, `livestock_id`, `recipient`, `quantity`, `date`, `status`, `handled_by_seller`, `deliver_address`, `description`) VALUES
(1, 4, 2, 'Hasbi', 1, '2020-06-25 09:12:58', 'pending', 0, 'Jl. Kp. Pulo Geulis No.10 RT.02/RW.04, Babakan Ps. Kecamatan Bogor Tengah Kota Bogor Jawa Barat 16126', 'Kontak saya bila sudah dikirim'),
(2, 6, 6, 'Imas', 3, '2020-06-25 09:17:23', 'deliver', 0, 'Jl. Langenastran Lor No.18 Panembahan Kecamatan Kraton Kota Yogyakarta Daerah Istimewa Yogyakarta 55131', 'Kontak saya bila bingung dengan alamatnya'),
(6, 6, 6, 'Falskim', 3, '2020-06-25 09:17:23', 'cancelled', 0, 'Jl. Langenastran Lor No.18 Panembahan Kecamatan Kraton Kota Yogyakarta Daerah Istimewa Yogyakarta 55131', 'Kontak saya bila bingung dengan alamatnya'),
(7, 4, 1, 'Junior', 1, '2020-06-25 09:12:58', 'success', 0, 'Jl. Kp. Pulo Geulis No.10 RT.02/RW.04, Babakan Ps. Kecamatan Bogor Tengah Kota Bogor Jawa Barat 16126', 'Kontak saya bila sudah dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `livestocks`
--

CREATE TABLE `livestocks` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `livestocks`
--

INSERT INTO `livestocks` (`id`, `category`, `price`, `available`, `image`) VALUES
(1, 'Sapi A', 10000000, 1, 'sapi.jpg'),
(2, 'Sapi B', 5000000, 1, 'sapi.jpg'),
(3, 'Domba A', 200000000, 0, 'domba.jpg'),
(4, 'Domba B', 100000, 1, 'domba.jpg'),
(5, 'Kambing A', 7500000, 1, 'kambing.jpg'),
(6, 'Kambing B', 2000000, 1, 'kambing.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `livestock_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','deliver','cancelled','success') NOT NULL DEFAULT 'pending',
  `deliver_address` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `livestock_id`, `quantity`, `date`, `status`, `deliver_address`, `description`) VALUES
(1, 3, 1, 2, '2020-06-25 09:10:10', 'pending', 'Jl. Baiduri Bulan 37-36 RT.1/RW.11, Kp. Melayu Kecamatan Jatinegara Kota Jakarta Timur Daerah Khusus Ibukota Jakarta 13330', ''),
(2, 5, 4, 3, '2020-06-25 09:14:50', 'deliver', 'Jl. Singotoro II Jomblang Kec. Candisari Kota Semarang Jawa Tengah 50256', 'kontak 2 : 081254338987'),
(3, 6, 5, 2, '2020-06-25 09:15:42', 'cancelled', 'Jl. Seruling 7 No.8 RT.011/RW.07, Jatirasa Kec. Jatiasih Kota Bks Jawa Barat 17424', 'terima kasih'),
(12, 2, 5, 2, '2020-06-25 09:15:42', 'success', 'Jl. Seruling 7 No.8 RT.011/RW.07, Jatirasa Kec. Jatiasih Kota Bks Jawa Barat 17424', 'terima kasih');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text,
  `photo` text,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `photo`, `password`, `role`) VALUES
(1, 'Admin', 'admin', NULL, NULL, NULL, '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Test Dummy', 'user@gmail.com', '085345678965', 'Jl. Somewhere No.One Kota Sebelah', NULL, 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(3, 'Deni', 'deni@gmail.com', '081435221095', 'Jl. Baiduri Bulan 37-36 RT.1/RW.11, Kp. Melayu Kecamatan Jatinegara Kota Jakarta Timur Daerah Khusus Ibukota Jakarta 13330', NULL, '43f41d127a81c54d4c8f5f93daeb7118', 'user'),
(4, 'Aldi', 'aldi@gmail.com', '082137866546', 'Jl. Ibu Inggit Garnasih 66 Ciateul Kec. Regol Kota Bandung Jawa Barat 40252', NULL, '5cf15fc7e77e85f5d525727358c0ffc9', 'user'),
(5, 'Risa', 'risa@gmail.com', '083345634221', 'Jl. Singotoro II Jomblang Kec. Candisari Kota Semarang Jawa Tengah 50256', NULL, '735c9c3675eaba16bfbec5913174067e', 'user'),
(6, 'Ahmad', 'ahmad@gmail.com', '081767212098', 'Jl. Seruling 7 No.8 RT.011/RW.07, Jatirasa Kec. Jatiasih Kota Bks Jawa Barat 17424', NULL, '61243c7b9a4022cb3f8dc3106767ed12', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donate_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `livestock_id` (`livestock_id`);

--
-- Indexes for table `livestocks`
--
ALTER TABLE `livestocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `livestock_id` (`livestock_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `livestocks`
--
ALTER TABLE `livestocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `donations_ibfk_2` FOREIGN KEY (`livestock_id`) REFERENCES `livestocks` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`livestock_id`) REFERENCES `livestocks` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
