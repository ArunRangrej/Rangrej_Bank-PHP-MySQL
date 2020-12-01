-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2019 at 07:42 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rangrej_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` char(25) DEFAULT NULL,
  `pwd` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pwd`) VALUES
(1, 'arun', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `aadhar_no` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `branch` varchar(30) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL,
  `pin` int(4) DEFAULT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `pwd` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `first_name`, `last_name`, `gender`, `dob`, `aadhar_no`, `email`, `phone_no`, `address`, `branch`, `account_no`, `pin`, `uname`, `pwd`) VALUES
(1, 'Dinakar', 'Reddy', 'male', '1997-03-19', 123456789, 'dinakar@gmail.com', '+91 6695414258', '17/1, Nodia , Delhi', 'delhi', 1122334455, 1234, 'dinakar', 'reddy123'),
(2, 'Ram', 'Kumar', 'male', '1994-10-11', 987654321, 'ram@gmail.com', '+966 895432167', 'Al Ahsa Street Malaz, King Abdulaziz Rd, Alamal Dist. Chennai', 'chennai', 1133557788, 1234, 'ram', 'ram123'),
(3, 'Padma', 'K', 'female', '1997-12-16', 1234567896, 'aruncoolrangrej@gmail.com', '7795414258', 'Bangalore North\r\nJalahalli', 'bengaluru', 2147483647, 3454, 'padu', 'padu');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `created`) VALUES
(1, 'Hello World !', '2017-09-06 15:45:25'),
(2, 'The First News !', '2017-09-06 15:45:55'),
(3, 'Increasing Interest Rates !', '2017-09-06 15:46:21'),
(4, 'Tomo Bank Holiday', '2019-12-22 19:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `news_body`
--

CREATE TABLE `news_body` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_body`
--

INSERT INTO `news_body` (`id`, `body`) VALUES
(1, 'Hi Hello world.. This project is developed by Arun Rangrej'),
(2, 'Some random news'),
(3, 'This is to inform that as of today interest rates will increase by 4.6% on loans and decrease by 5.8% on deposits.'),
(4, 'Tomo Bank will remain closed due CAB issue');

-- --------------------------------------------------------

--
-- Table structure for table `passbook1`
--

CREATE TABLE `passbook1` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook1`
--

INSERT INTO `passbook1` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2019-12-01 22:18:36', 'Opening Balance', 0, 10000, 10000),
(2, '2019-12-02 18:49:26', 'Cash Deposit', 0, 20000, 30000),
(3, '2019-12-02 21:02:32', 'Cash to Self', 10000, 0, 20000),
(4, '2019-12-05 20:11:33', 'Cash Deposit', 0, 69000, 89000),
(5, '2019-12-19 17:00:35', 'Cash Deposit', 0, 2000000, 2089000),
(6, '2019-12-19 17:01:09', 'Cash to Self', 15000, 0, 2074000),
(7, '2019-12-19 17:02:29', 'Cash to Self', 25000, 0, 2049000),
(8, '2019-12-19 17:03:45', 'Cash to Self', 50000, 0, 1999000),
(9, '2019-12-19 17:26:45', 'Cash Deposit', 0, 6123, 2005123);

-- --------------------------------------------------------

--
-- Table structure for table `passbook2`
--

CREATE TABLE `passbook2` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook2`
--

INSERT INTO `passbook2` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2019-12-01 06:31:22', 'Opening Balance', 0, 20000, 20000),
(2, '2019-12-02 15:35:39', 'Cash to Self', 2000, 0, 18000),
(3, '2019-12-03 17:51:47', 'Cash to Self', 2500, 0, 15500),
(4, '2019-12-04 17:52:31', 'Cash Deposit', 0, 3500, 19000),
(5, '2019-12-05 20:42:20', 'Cash Deposit', 0, 2500, 21500),
(6, '2019-12-06 20:44:17', 'Cash to Self', 1002, 0, 20498),
(7, '2019-12-07 19:38:04', 'Cash Deposit', 0, 20000, 40498),
(8, '2019-12-08 19:38:49', 'Cash to Self', 2000, 0, 38498);

-- --------------------------------------------------------

--
-- Table structure for table `passbook3`
--

CREATE TABLE `passbook3` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook3`
--

INSERT INTO `passbook3` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2019-12-23 23:47:22', 'Opening Balance', 0, 80000, 80000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `aadhar_no` (`aadhar_no`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `account_no` (`account_no`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_body`
--
ALTER TABLE `news_body`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passbook1`
--
ALTER TABLE `passbook1`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `passbook2`
--
ALTER TABLE `passbook2`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `passbook3`
--
ALTER TABLE `passbook3`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news_body`
--
ALTER TABLE `news_body`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `passbook1`
--
ALTER TABLE `passbook1`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `passbook2`
--
ALTER TABLE `passbook2`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `passbook3`
--
ALTER TABLE `passbook3`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
