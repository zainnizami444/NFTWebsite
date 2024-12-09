-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 02:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nft`
--

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `Bid_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `Price` bigint(20) NOT NULL,
  `Bid_status` int(11) NOT NULL,
  `Bid_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`Bid_id`, `User_id`, `Pro_id`, `Price`, `Bid_status`, `Bid_date`) VALUES
(9, 30, 8, 80, 1, '2022-03-16'),
(10, 30, 8, 100, 1, '2022-03-16'),
(11, 30, 8, 111, 1, '2022-03-16'),
(12, 31, 8, 123, 1, '2022-03-16'),
(13, 30, 8, 124, 1, '2022-03-16'),
(14, 31, 8, 125, 1, '2022-03-16'),
(15, 30, 8, 140, 1, '2022-03-16'),
(16, 30, 8, 340, 1, '2022-03-16'),
(17, 10, 19, 88, 1, '2022-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Proid` int(11) NOT NULL,
  `Proimg` varchar(250) NOT NULL,
  `Proname` varchar(250) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Userid` int(11) NOT NULL,
  `Bid_Price` int(11) NOT NULL,
  `Fees` int(11) NOT NULL,
  `Status_bid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Proid`, `Proimg`, `Proname`, `Description`, `Start_date`, `End_date`, `Userid`, `Bid_Price`, `Fees`, `Status_bid`) VALUES
(7, 'post-4.jpg', 'abs', 'This is fantastic', '2022-03-13', '2022-03-26', 10, 43, 4, 1),
(8, 'post-1.jpg', 'abc', 'we', '2022-03-14', '2022-03-31', 10, 340, 4, 1),
(9, 'post-4.jpg', 'abc', 'ewe', '2022-03-14', '2022-04-07', 10, 3, 4, 1),
(11, 'subscription-back.jpg', 'teyuue', 'zaghjkl;/mnhgrfrszxcftyuikl,', '2022-03-15', '2022-03-24', 10, 8, 4, 1),
(12, 'team4.jpg', 'shhhhh', 'aiuhfiriaioroiaioroiaoiroiaiorioaioioraoiioaoioa', '2022-03-15', '2022-04-06', 10, 34, 4, 1),
(13, 'products-3.jpg', 'dine', '7347734737hfdnkfhshkfkhshkfhkhksfkhshkfkhsdkhfhkshkfkjsfjkskjjkfsjdkfjkjksdjfkskfksdkjdfjksdjkfskjddfjks', '2022-03-15', '2022-03-18', 10, 343, 4, 1),
(14, 'products-4.jpg', 'dsdsa', '11119kmmm,,,l.lllllllllllll', '2022-03-16', '2022-04-02', 10, 77, 4, 1),
(15, 'products-4.jpg', 'apple', 'oonmmmmmmmmmmmmmmmmmm', '2022-03-17', '2022-04-02', 10, 23, 4, 3),
(16, 'products-4.jpg', 'dsdsa', 'ittyyyyyyyyobbboobtooityio', '2022-03-17', '2022-04-01', 10, 66, 4, 3),
(17, 'products-4.jpg', 'shhhhh', 'ugigiuiuuigoouoigiugui', '2022-03-17', '2022-04-07', 10, 77, 4, 3),
(18, 'products-4.jpg', 'saad', 'stsulislshhhuilhislhilhis', '2022-03-19', '2022-03-30', 10, 33, 4, 3),
(19, 'products-4.jpg', 'hajajj', 'yykbbkykybyibgyigybbyyboboiyboi', '2022-03-17', '2022-03-27', 10, 88, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `status_bid`
--

CREATE TABLE `status_bid` (
  `Status_id` int(11) NOT NULL,
  `Status_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_bid`
--

INSERT INTO `status_bid` (`Status_id`, `Status_name`) VALUES
(1, 'Bid in progress'),
(2, 'Bid Ended'),
(3, 'Bid will start soon\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Userid` int(11) NOT NULL,
  `Fname` varchar(250) NOT NULL,
  `Lname` varchar(250) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `Username` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Gender` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `Pass` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Userid`, `Fname`, `Lname`, `contact`, `Username`, `Email`, `Gender`, `img`, `Pass`, `status`) VALUES
(10, 'Zain', 'Nizami', 347379089, 'Zainnizami', 'zainnizami999@gmail.com', 'Male', 'post-5.jpg', '$2y$10$0EkkRyW.brKE/70WjNiyCeSqqpGehQR3.16kRwhSWnpqKO3i2w3SG', 'Verified'),
(27, 'Bushra', 'Haseen', 334566999, 'bushra', 'zainnizami999@gmail.com', 'Female', 'Screenshot 2021-11-29 180526.png', '$2y$10$qmYuar0zooTRYJkdgKPvL.0W0d..O8E2XCJADagYiZxcz0KvRxq2m', 'Verified'),
(30, 'Rayyan', 'nizami', 335678920, 'rayyan', 'zainnizami999@gmail.com', 'Male', 'Screenshot 2021-11-29 175440.png', '$2y$10$O.13TDSSLOan89Ay/1OJFuttKOaeHuvHvHHP3x6FRNlc542El/KzW', 'Verified'),
(31, 'Saad', 'Haseen', 9940434374, 'saad', 'zainnizami999@gmail.com', 'Male', 'Screenshot 2021-11-29 175440.png', '$2y$10$k/GXD.2WcKM0/o/CwvO3Iu/8zNKaOBTuYgto2Nk78VFwGb6LlI.ES', 'Verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`Bid_id`),
  ADD KEY `Pro_id` (`Pro_id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `Bid_status` (`Bid_status`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Proid`),
  ADD KEY `Userid` (`Userid`),
  ADD KEY `Status_bid` (`Status_bid`);

--
-- Indexes for table `status_bid`
--
ALTER TABLE `status_bid`
  ADD PRIMARY KEY (`Status_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `Bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Proid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `status_bid`
--
ALTER TABLE `status_bid`
  MODIFY `Status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`Pro_id`) REFERENCES `product` (`Proid`),
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `user` (`Userid`),
  ADD CONSTRAINT `bid_ibfk_3` FOREIGN KEY (`Bid_status`) REFERENCES `status_bid` (`Status_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Userid`) REFERENCES `user` (`Userid`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`Status_bid`) REFERENCES `status_bid` (`Status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
