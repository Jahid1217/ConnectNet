-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 03:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connectnetup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'admin',
  `DOB` varchar(100) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `adminRole` varchar(100) NOT NULL,
  `location` text NOT NULL,
  `picture` text NOT NULL,
  `referenceName` text NOT NULL,
  `referenceEmail` varchar(100) NOT NULL,
  `referencePhone` varchar(100) NOT NULL,
  `referenceNameTwo` text NOT NULL,
  `referenceEmailTwo` varchar(200) NOT NULL,
  `referencePhoneTwo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `username`, `password`, `role`, `DOB`, `phoneNumber`, `adminRole`, `location`, `picture`, `referenceName`, `referenceEmail`, `referencePhone`, `referenceNameTwo`, `referenceEmailTwo`, `referencePhoneTwo`) VALUES
(1, 'Jahid Hasan', 'jahid.hasan1217@gmail.com', 'Jahid@1217', 'Jahid@1217', 'admin', '2025-01-10', '01708769578', '<br />\r\n<b>Warning</b>:  Undefined variable $role in <b>C:\\xampp\\htdocs\\ConnectNet\\view\\edituser.php', '', '', 'jahid@1217', 'Jahid@1217', '123456789', 'Jahid@1712', 'Jahid@1217', '987654321'),
(3, 'Jahid Hasan Sohan', 'Admin@gmail.com', 'Admin@1217', 'Admin1234', 'admin', '2025-01-25', '01708769578', 'Network_Admin', 'mirpur,dhaka', 'Screenshot 2025-01-17 181549.png', 'refNameOne', 'ref@gmail.com', '9876543212', 'refNameTwo', 'refNameTwo@gmail.com', '987654321');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_Id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL DEFAULT 'customer',
  `service_plan` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `inst_address` varchar(200) NOT NULL,
  `inst_Data` varchar(100) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_Id`, `name`, `email`, `phone`, `username`, `password`, `role`, `service_plan`, `payment_method`, `inst_address`, `inst_Data`, `picture`) VALUES
(1, 'customer1', 'customer@gmail.com', '12345678989', 'customer', 'customer@123', 'customer', 'go', 'cash', 'dhaka', '12/02/2025', 'pic');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_Id` int(100) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'employee',
  `DOB` varchar(100) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `employee_role` varchar(200) NOT NULL,
  `department` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL,
  `employeeType` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_Id`, `name`, `email`, `username`, `password`, `role`, `DOB`, `phoneNumber`, `employee_role`, `department`, `location`, `employeeType`, `status`) VALUES
(2, 'Sumaiya Afrin', 'ts@gmail.com', 'sumaiya', '@123asdfG', 'employee', '2025-01-02', '01923548250', 'Technician', 'Technical Support', 'Dhaka', 'Full-Time', 'waiting'),
(3, 'Amira binte', 'amira@gmail.com', 'amira', 'Passw@rd123', 'employee', '2022-02-01', '01234567892', 'Sales Manager', 'Sales', 'Sylhet', 'Full-Time', 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `employeetoken`
--

CREATE TABLE `employeetoken` (
  `token_id` int(100) NOT NULL,
  `issues` varchar(200) NOT NULL,
  `issue_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_Id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `f_name` text NOT NULL,
  `f_email` varchar(100) NOT NULL,
  `issue_type` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `feedback_date` date NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_Id`, `user_name`, `f_name`, `f_email`, `issue_type`, `message`, `feedback_date`, `Status`) VALUES
(5, ' afrin', 'Afrin', 'ts@gmail.com', 'billing', 'asdfghjk', '2025-01-29', 'Pending'),
(6, ' zisan', 'Zisan', 'zz@gmail.com', 'billing', 'qwetyu', '2025-01-29', 'Resolved'),
(7, ' qqqqqqqqq', 'qq', 'ts@gmail.com', 'feedback', 'qwertyu', '2025-01-29', 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_Id` int(100) NOT NULL,
  `orderAmount` varchar(200) NOT NULL,
  `orderDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdet`
--

CREATE TABLE `orderdet` (
  `orderDet_Id` int(100) NOT NULL,
  `ord_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_Id` int(100) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'seller',
  `gender` varchar(100) NOT NULL,
  `phoneNumber` varchar(200) NOT NULL,
  `businessName` varchar(100) NOT NULL,
  `businessType` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_Id`, `name`, `email`, `username`, `password`, `role`, `gender`, `phoneNumber`, `businessName`, `businessType`, `location`, `status`) VALUES
(1, 'seller1', 'sell@123', 'seller', 'seller@123', 'seller', 'male', '12345678989', 'net', 'net', 'dhaka', 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(100) NOT NULL,
  `serviceType` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trc_id` int(11) NOT NULL,
  `trc_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD PRIMARY KEY (`customer_Id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_Id`);

--
-- Indexes for table `employeetoken`
--
ALTER TABLE `employeetoken`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_Id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_Id`);

--
-- Indexes for table `orderdet`
--
ALTER TABLE `orderdet`
  ADD PRIMARY KEY (`orderDet_Id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_Id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employeetoken`
--
ALTER TABLE `employeetoken`
  MODIFY `token_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_Id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdet`
--
ALTER TABLE `orderdet`
  MODIFY `orderDet_Id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trc_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
