-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2022 at 04:26 PM
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
('AD1', 'cherry112', 'cherry1122', 'cherry'),
('AD2', 'strawberry20', 'ilovestrawberry2', 'strawberry'),
('AD3', 'orange666', 'orangeyummy555', 'orange');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` varchar(255) NOT NULL,
  `u_id` varchar(255) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `p_quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `u_id`, `p_id`, `p_quantity`) VALUES
('CTCR11', 'CR1', 'PD1', 5),
('CTCR12', 'CR1', 'PD4', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `contract_id` varchar(255) NOT NULL,
  `u_id` varchar(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(30) NOT NULL,
  `c_phone` varchar(10) NOT NULL,
  `topic` varchar(30) NOT NULL,
  `detail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`contract_id`, `u_id`, `c_name`, `c_email`, `c_phone`, `topic`, `detail`) VALUES
('CA1', 'CR1', 'guy thanakrit', 'sukseamsal@gmail.com', '0858509351', 'ต้องการคืนสินค้า', 'สินค้าไม่ตรงปก'),
('CA2', 'CR2', 'peem dj', 'peedinwza@hotmail.com', '1234567890', 'ต้องการเคลมสินค้า', 'สินค้าชำรุด');

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
('CR1', 'jj1234', 'sukseamsal@gmail.com', 'jj111111', 'Thanasit', 'Sukseamsal', '0234567890', 15, 'เมษายน', 2001, 'female', 'IMG-CR1.png', 'Thanasit Sukseamsal', '0012312322', 'ป่าตัน เมือง เชียงใหม่', 50200, 'ตึก A', 'ออมสิน', 'Thanasit Sukseamsal', '2423524123'),
('CR2', 'PoM222', 'pommy@hotmail.com', 'pom1234567890', 'Pom', 'Shabu', '0374895628', 4, 'มกราคม', 1999, 'other', 'IMG-CR2.png', 'Pom', '0374895628', 'กรุงเทพ', 12324, '-', 'กรุงไทย', 'Pom Shabu', '2834756473'),
('CR3', '2223aa', 'idontknow@gmail.com', 'idk2937522345', 'John', 'Smith', '0836476577', 2, 'มกราคม', 2005, 'male', 'IMG-CR3.png', 'Johnny', '0836476577', 'สิงห์บุรี', 53482, 'หน้าปากซอย', 'กรุงไทย', 'John Smith', '9723648569'),
('CR4', 'aa77Ad', 'sadasdsa@asdasd.com', 'aainwza777', 'Jane', 'Doe', '0879756321', 25, 'สิงหาคม', 1986, 'female', 'IMG-CR4.png', 'Janny', '0879756321', 'อุดรธานี', 40520, 'บ้านหลังที่ 5', 'กสิกร', 'Jane Doe', '8561257821');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `order_id` varchar(255) NOT NULL,
  `u_id` varchar(255) NOT NULL,
  `b_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`order_id`, `u_id`, `b_status`) VALUES
('CTCR11', 'CR1', 'สำเร็จ'),
('CTCR12', 'CR1', 'ถูกยกเลิก');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `u_id` varchar(255) NOT NULL,
  `total_price` int(255) NOT NULL,
  `slip_img` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_id`, `u_id`, `total_price`, `slip_img`, `time`) VALUES
('PACR11', 'CTCR11', 'CR1', 243, 'IMG-6355490cec5ad0.31616982.png', '2022-10-22 13:01:44'),
('PACR12', 'CTCR11', 'CR1', 49999, 'IMG-635548c0f05fe9.24845717.jpg', '2022-10-23 14:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(255) NOT NULL,
  `u_id` varchar(255) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `color_size` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `product_price` int(20) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `serial` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `u_id`, `product_name`, `color_size`, `quantity`, `product_price`, `img_url`, `category`, `serial`) VALUES
('PD1', 'CR1', 'เสื้อยืด', 'สีฟ้า/ไซส์ S', 20, 129, 'IMG-PD1.png', 'clothes', ''),
('PD2', 'CR1', 'พวงมาลัย', 'สีดำ', 70, 499, 'IMG-PD2.png', 'cars', ''),
('PD3', 'CR2', 'แตงกวาดอง', '550 กรัม', 100, 45, 'IMG-PD3.png', 'foods', ''),
('PD4', 'CR3', 'iPhone 14', 'สีดำ/256gb', 10, 29900, 'IMG-PD4.png', 'electronics', 'C38LR5L9FRC6');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `u_id` varchar(255) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`u_id`, `shop_name`, `phone_number`, `address`) VALUES
('CR2', 'DDshop22', '0274859242', 'กรุงเทพ'),
('CR1', 'Shoping123', '0756627482', 'เชียงใหม่');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `tracking_id` varchar(255) NOT NULL,
  `u_id` varchar(255) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `pay_status` varchar(255) NOT NULL,
  `ship_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`tracking_id`, `u_id`, `p_id`, `pay_status`, `ship_status`) VALUES
('TR1', 'jj1234', 'PD4', 'ยังไม่ได้ชำระเงิน', 'รอชำระเงินค่าสินค้า'),
('TR2', 'jj1234', 'PD2', 'จ่ายเงินแล้ว', 'จัดส่งแล้ว'),
('TR3', 'PoM222', 'PD1', 'ชำระเงินแล้ว', 'รอการจัดส่ง');

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
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`shop_name`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`tracking_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
