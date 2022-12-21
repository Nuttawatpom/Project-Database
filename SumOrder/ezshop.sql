-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2022 at 11:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(255) NOT NULL,
  `admin_uname` varchar(12) NOT NULL,
  `admin_password` varchar(16) NOT NULL,
  `admin_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_uname`, `admin_password`, `admin_name`) VALUES
('AD1', 'cherry112', 'cherry112', 'cherrybomb');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` varchar(255) NOT NULL,
  `uname` varchar(12) NOT NULL,
  `p_id` int(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `color_s` varchar(255) NOT NULL,
  `p_quantity` int(255) NOT NULL,
  `p_price` int(255) NOT NULL,
  `p_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `uname`, `p_id`, `p_name`, `color_s`, `p_quantity`, `p_price`, `p_img`) VALUES
('CT1', 'jj1234', 23, 'asd', 'asd', 22, 333, 'IMG-634e142b55dd33.02623623.png');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `contract_id` varchar(255) NOT NULL,
  `uname` varchar(12) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(30) NOT NULL,
  `c_phone` varchar(10) NOT NULL,
  `topic` varchar(30) NOT NULL,
  `detail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`contract_id`, `uname`, `c_name`, `c_email`, `c_phone`, `topic`, `detail`) VALUES
('CA1', 'pommy22', 'guy thanakrit', 'thanakritguy@gmail.com', '0852222222', 'ต้องการคืนสินค้า', 'ไม่บอกเขิน ไม่บอกเขิน ไม่บอกเขิน ไม่บอกเขิน ไม่บอกเขิน ไม่บอกเขิน ไม่บอกเขิน '),
('CA2', 'jj1234', 'thanasit suksermsal', 'thanasit_s@cmu.ac.th', '0999517452', 'ไม่ได้รับสินค้า', 'สั่งตั้งแต่วันที่ 20 ยังไม่ได้รับสินค้า');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` varchar(255) NOT NULL,
  `username` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone_num` varchar(11) NOT NULL,
  `bday` int(2) NOT NULL,
  `bmonth` varchar(10) NOT NULL,
  `byear` int(4) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `img_acc` varchar(255) NOT NULL,
  `ship_name` varchar(255) NOT NULL,
  `ship_phone` varchar(10) NOT NULL,
  `province` varchar(255) NOT NULL,
  `zip` int(5) NOT NULL,
  `detail_add` varchar(100) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `acc_name` varchar(255) NOT NULL,
  `bank_acc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `username`, `email`, `password`, `fname`, `lname`, `phone_num`, `bday`, `bmonth`, `byear`, `sex`, `img_acc`, `ship_name`, `ship_phone`, `province`, `zip`, `detail_add`, `bank_name`, `acc_name`, `bank_acc`) VALUES
('CR1', 'jj1234', 'sukseamsal@gmail.com', '11111111', 'Thanasit', 'Sukseamsal', '', 1, 'มกราคม', 2022, '', 'IMG-6354476c2e2844.83739502.jpg', '', '', '', 0, '', '', '', ''),
('CR2', 'cherry112', 'awdq@asda.com', 'asdasd2', 'asdadsa', '12wasdasd', '', 0, '', 0, '', '', '', '', '', 0, '', '', '', ''),
('CR3', '406111', 'asdsa@asd.com', 'adasdaqwdq', 'sdasdasd', 'awdawdwa', '', 0, '', 0, '', '', '', '', '', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `order_id` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `color_s` varchar(255) NOT NULL,
  `p_quantity` int(255) NOT NULL,
  `p_price` int(255) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `b_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`order_id`, `uname`, `p_id`, `p_name`, `color_s`, `p_quantity`, `p_price`, `p_img`, `b_status`) VALUES
('CT1', 'jj1234', '115', 'dasdw', 'asdwa', 6, 2323, 'IMG-634e142b55dd33.02623623.png', 'สำเร็จ'),
('CT22', 'jj1234', '23', 'asd', 'asd', 22, 333, 'IMG-634e142b55dd33.02623623.png', 'ยกเลิก');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `uname` varchar(12) NOT NULL,
  `total_price` int(255) NOT NULL,
  `slip_img` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(255) NOT NULL,
  `uname` varchar(12) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `color_size` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `product_price` int(20) NOT NULL,
  `img_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `uname`, `product_name`, `color_size`, `quantity`, `product_price`, `img_url`) VALUES
('115', 'jj1234', 'iphone 12', 'สีดำ/ไซส์ S', 90, 12312, 'IMG-635447d44ec330.55707330.png'),
('PD2', 'jj1234', 'ข้าวมันไก่ pro max', 'asdas', 96, 12312, 'IMG-6354ef99b92bc8.14955295.png');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `tracking_id` varchar(255) NOT NULL,
  `uname` varchar(12) NOT NULL,
  `p_id` int(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `pay_status` varchar(255) NOT NULL,
  `ship_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`tracking_id`, `uname`, `p_id`, `p_name`, `pay_status`, `ship_status`) VALUES
('TR1', 'jj1234', 3, 'T-Shirt AC/DC', 'ยังไม่ได้ชำระเงิน', 'รอชำระเงินค่าสินค้า'),
('TR2', 'jj1234', 2131, 'glass', 'จ่ายเงินแล้ว', 'จัดส่งแล้ว'),
('TR3', 'jj1234', 99, 'Shopee', 'ชำระเงินแล้ว', 'รอการจัดส่ง');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`contract_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`tracking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
