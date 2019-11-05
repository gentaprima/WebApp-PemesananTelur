-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 04:25 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_address`
--

CREATE TABLE `tb_address` (
  `id_address` int(11) NOT NULL,
  `street` text NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_address`
--

INSERT INTO `tb_address` (`id_address`, `street`, `username`) VALUES
(14, 'Jalan Kesadaran', 'prasetya2423'),
(16, '1600 Amphitheatre Pkwy, Mountain View, CA 94043, USA Mountain View California 94043 United States', 'google123'),
(18, 'Google Building 40, 1600 Amphitheatre Pkwy, Mountain View, CA 94043, USA Mountain View California 94043 United States', 'kokoko');

-- --------------------------------------------------------

--
-- Table structure for table `tb_agent`
--

CREATE TABLE `tb_agent` (
  `id_agent` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `shop` varchar(30) NOT NULL,
  `kordinat` varchar(30) NOT NULL,
  `is_verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_agent`
--

INSERT INTO `tb_agent` (`id_agent`, `username`, `shop`, `kordinat`, `is_verified`) VALUES
('AGN-1568520775125', 'kokoko', 'google123', '37.42204691658292,-122.0839049', 1),
('AGN-1569672565454', 'google123', 'Google', '37.422022419750036,-122.084002', 1),
('AGN-1571747859135', 'prasetya2423', 'Toko Google123', '-6.238599338406286,106.8846921', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_courier`
--

CREATE TABLE `tb_courier` (
  `id_courier` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `courier_name` varchar(50) NOT NULL,
  `vehicle` varchar(30) NOT NULL,
  `plat_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_courier`
--

INSERT INTO `tb_courier` (`id_courier`, `username`, `courier_name`, `vehicle`, `plat_number`) VALUES
('COU-1312', 'kokoko', 'Wahyu Hidayanto', 'Beat', 'B 2342 TYD');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `id_address` int(11) NOT NULL,
  `id_agent` varchar(30) NOT NULL,
  `id_product` varchar(30) NOT NULL,
  `jumlah_order` int(11) NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `status_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `username`, `id_address`, `id_agent`, `id_product`, `jumlah_order`, `total_transaksi`, `tgl`, `status_order`) VALUES
('ORD-1001', 'prasetya2423', 14, 'AGN-1571747859135', 'PRO-133', 1000, 15000000, '2019-09-30', 1),
('ORD-1002', 'prasetya2423', 14, 'AGN-1571747859135', 'PRO-133', 100, 1500000, '2019-09-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` varchar(30) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL,
  `quality` varchar(20) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `product_name`, `description`, `image`, `quality`, `price`) VALUES
('PRO-133', 'Telur Ayam Negeri', 'Telur adalah pangan padat gizi, karenanya telur merupakan sumber protein hewani, sumber asam lemak tidak jenuh, sumber vitamin dan mineral. Telur sangat baik untuk anak-anak dan orang dewasa, penderita diabetes (kencing manis) dan wanita yang ingin sehat ', 'telor.png', 'Retak Ringan', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(30) NOT NULL,
  `id_order` varchar(30) NOT NULL,
  `id_courier` varchar(20) NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `status_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_order`, `id_courier`, `total_transaksi`, `tgl`, `status_order`) VALUES
('TRN-1572895141', 'ORD-1001', 'COU-1312', 1500000, '2019-11-05', 3),
('TRN-1572896300', 'ORD-1002', 'COU-1312', 1500000, '2019-11-04', 2),
('TRN-1572966974', 'ORD-1001', 'COU-1312', 750000, '2019-11-05', 2),
('TRN-1572967221', 'ORD-1001', 'COU-1312', 15000000, '2019-11-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `username` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`username`, `fname`, `lname`, `email`, `password`, `phone`, `type`) VALUES
('admin', 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 'admin'),
('google123', 'prasetya', 'hadi s', 'prasetya22@gmail.com', 'b8f8312b939f00abb38eeafd4fd107f3', '', 'agent'),
('kokoko', 'Wahyu', 'Hidayat', 'google@gmail.com', 'b8f8312b939f00abb38eeafd4fd107f3', '', 'courier'),
('prasetya2423', 'Prasetya', 'adi', 'gentaprima601@gmail.com', '510cc2a3e468e3414c26cbc8f3acadd9', '', 'agent');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id_user_token` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id_user_token`, `email`, `token`) VALUES
(77, 'prasetya2423@gmail.com', 599010),
(78, 'prasetya2423@gmail.com', 780701),
(79, 'prasetya2423@gmail.com', 516685),
(80, 'gentaprima600@gmail.com', 680249),
(81, 'gentaprima600@gmail.com', 107591),
(82, 'gentaprima600@gmail.com', 771576),
(83, 'prasetya2423@gmail.com', 859623),
(84, 'prasetya2423@gmail.com', 351075),
(85, 'prasetya2423@gmail.com', 111272),
(86, 'prasetya2423@gmail.com', 251046),
(87, 'prasetya2423@gmail.com', 567489),
(88, 'prasetya2423@gmail.com', 529429),
(89, 'gentaprima600@gmail.com', 197954),
(90, 'gentaprima600@gmail.com', 754695),
(91, 'gentaprima602@gmail.com', 242969),
(92, 'gentaprima602@gmail.com', 215148),
(93, 'gentaprima601@gmail.com', 688314),
(94, 'gentaprima601@gmail.com', 638379),
(95, 'gentaprima601@gmail.com', 459672),
(96, 'gentaprima601@gmail.com', 988342);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_address`
--
ALTER TABLE `tb_address`
  ADD PRIMARY KEY (`id_address`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `tb_agent`
--
ALTER TABLE `tb_agent`
  ADD PRIMARY KEY (`id_agent`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `tb_courier`
--
ALTER TABLE `tb_courier`
  ADD PRIMARY KEY (`id_courier`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_address` (`id_address`),
  ADD KEY `id_agent` (`id_agent`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_courier` (`id_courier`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_user_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_address`
--
ALTER TABLE `tb_address`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_user_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_address`
--
ALTER TABLE `tb_address`
  ADD CONSTRAINT `tb_address_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tb_users` (`username`);

--
-- Constraints for table `tb_agent`
--
ALTER TABLE `tb_agent`
  ADD CONSTRAINT `tb_agent_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tb_users` (`username`);

--
-- Constraints for table `tb_courier`
--
ALTER TABLE `tb_courier`
  ADD CONSTRAINT `tb_courier_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tb_users` (`username`);

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`id_address`) REFERENCES `tb_address` (`id_address`),
  ADD CONSTRAINT `tb_order_ibfk_2` FOREIGN KEY (`id_agent`) REFERENCES `tb_agent` (`id_agent`),
  ADD CONSTRAINT `tb_order_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `tb_product` (`id_product`),
  ADD CONSTRAINT `tb_order_ibfk_4` FOREIGN KEY (`username`) REFERENCES `tb_users` (`username`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tb_order` (`id_order`),
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_courier`) REFERENCES `tb_courier` (`id_courier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
