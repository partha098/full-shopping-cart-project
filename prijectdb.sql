-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 11:19 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prijectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'jack', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`) VALUES
(1, 'Electronics', 0),
(3, 'Supplement', 0),
(4, 'Mobile', 1),
(5, 'Whey Protein', 3),
(6, 'Laptop', 1),
(7, 'Camera', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'partha', 'partha@gmail.com', '1234567890', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `morder`
--

CREATE TABLE `morder` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `bn` varchar(500) NOT NULL,
  `be` varchar(500) NOT NULL,
  `bp` varchar(500) NOT NULL,
  `ba` varchar(500) NOT NULL,
  `sn` varchar(500) NOT NULL,
  `se` varchar(500) NOT NULL,
  `sp` varchar(500) NOT NULL,
  `sa` varchar(500) NOT NULL,
  `odate` varchar(500) NOT NULL,
  `payemt_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `morder`
--

INSERT INTO `morder` (`id`, `cid`, `bn`, `be`, `bp`, `ba`, `sn`, `se`, `sp`, `sa`, `odate`, `payemt_status`) VALUES
(1, 1, 'Partha koley', 'p@gmail.com', '1234567890', 'Kolata 55', 'Partha koley', 'p@gmail.com', '1234567890', 'Kolata 55', '1598016180', ''),
(2, 1, 'Partha koley', 'p@gmail.com', '1234567789', 'Demo ', 'Partha koley', 'p@gmail.com', '1234567789', 'Demo ', '1598016317', 'Success'),
(3, 1, 'Jhon', 'j@gmail.com', '0987654345', 'Kolkata 66', 'Jhon', 'j@gmail.com', '0987654345', 'Kolkata 66', '1598080536', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `pname` varchar(500) NOT NULL,
  `pprice` decimal(10,2) NOT NULL,
  `pimg` varchar(500) NOT NULL,
  `cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pname`, `pprice`, `pimg`, `cat`) VALUES
(1, 'Angular', '2.00', 'mvc-in-angular.jpg', 4),
(2, 'React', '1.00', 'react.png', 6);

-- --------------------------------------------------------

--
-- Table structure for table `ratting`
--

CREATE TABLE `ratting` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `ratting` int(11) NOT NULL,
  `review` varchar(4000) NOT NULL,
  `pid` int(11) NOT NULL,
  `isapproved` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratting`
--

INSERT INTO `ratting` (`id`, `name`, `phone`, `ratting`, `review`, `pid`, `isapproved`) VALUES
(1, 'Partha', '1234567890', 4, 'Very good product.', 1, 1),
(2, 'test', '23456789', 5, 'This product is outstanding', 1, 1),
(3, 'demo', '01234567890', 2, 'this product is average', 1, 1),
(4, 'piku', '34567895', 5, 'I am satisfied with this product ', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sorder`
--

CREATE TABLE `sorder` (
  `id` int(11) NOT NULL,
  `moid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sorder`
--

INSERT INTO `sorder` (`id`, `moid`, `pid`, `qty`, `price`) VALUES
(1, 1, 1, 8, 2),
(2, 2, 1, 13, 2),
(3, 3, 1, 2, 2),
(4, 3, 2, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `morder`
--
ALTER TABLE `morder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratting`
--
ALTER TABLE `ratting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sorder`
--
ALTER TABLE `sorder`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `morder`
--
ALTER TABLE `morder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ratting`
--
ALTER TABLE `ratting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sorder`
--
ALTER TABLE `sorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
