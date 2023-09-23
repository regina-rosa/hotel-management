-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 07:44 AM
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
-- Database: `ssip`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `pwd` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `pwd`) VALUES
('ratuesther', '12345'),
('reginarosa', '12345'),
('wynnepriscillia', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` varchar(50) NOT NULL,
  `room_id` varchar(50) DEFAULT NULL,
  `tenant_id` varchar(50) DEFAULT NULL,
  `book_start_date` date DEFAULT NULL,
  `book_end_date` date DEFAULT NULL,
  `transaction_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `room_id`, `tenant_id`, `book_start_date`, `book_end_date`, `transaction_date`) VALUES
('01', 'M01', 'A01', '2022-05-04', '2022-12-03', '2022-05-03'),
('02', 'M02', 'B02', '2022-05-05', '2024-12-05', '2022-05-03'),
('03', 'M03', 'C03', '2022-05-13', '2023-06-13', '2022-05-12'),
('04', 'M03', 'D04', '2023-07-12', '2024-07-12', '2023-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `damage`
--

CREATE TABLE `damage` (
  `room_id` varchar(50) DEFAULT NULL,
  `tenant_id` varchar(50) DEFAULT NULL,
  `room_damage` varchar(50) DEFAULT NULL,
  `damage_fine` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `damage`
--

INSERT INTO `damage` (`room_id`, `tenant_id`, `room_damage`, `damage_fine`) VALUES
('M01', 'A01', 'Broken Bed', 1500000),
('M03', 'C03', 'Broken Mattress', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` varchar(50) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `tenant_id` varchar(50) DEFAULT NULL,
  `tenant_name` varchar(50) DEFAULT NULL,
  `tenant_address` varchar(100) DEFAULT NULL,
  `tenant_phone` varchar(50) DEFAULT NULL,
  `room_label` varchar(50) DEFAULT NULL,
  `room_monthly_price` varchar(50) DEFAULT NULL,
  `period` int(50) DEFAULT NULL,
  `totalamount` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `date`, `tenant_id`, `tenant_name`, `tenant_address`, `tenant_phone`, `room_label`, `room_monthly_price`, `period`, `totalamount`) VALUES
('01', '2022-05-03', 'A01', 'Mark Lee', 'Jl. Mawar, Cikarang', '0822-0101', 'Rose-01', 'Rp. 1.000.000', 6, 6000000),
('02', '2022-05-03', 'B02', 'Renjun Huang', 'Jl. Melati, Bekasi', '0822-0102', 'Lilac-01', 'Rp. 1.000.000', 31, 31000000),
('03', '2022-05-12', 'C03', 'Jeno Lee', 'Jl. Merdeka, Jakarata', '0822-0103', 'Jasmine-01', 'Rp. 1.000.000', 13, 13000000),
('04', '2023-07-12', 'D04', 'Haechan Lee', 'Jl. Haruka, Cikarang', '0822-0104', 'Jasmine-01', 'Rp. 1.000.000', 12, 12000000);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` varchar(50) NOT NULL,
  `room_label` varchar(50) DEFAULT NULL,
  `room_location` varchar(50) DEFAULT NULL,
  `room_gender` varchar(50) DEFAULT NULL,
  `room_window` varchar(50) DEFAULT NULL,
  `room_monthly_price` varchar(50) DEFAULT NULL,
  `room_availability` varchar(50) DEFAULT NULL,
  `room_description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_label`, `room_location`, `room_gender`, `room_window`, `room_monthly_price`, `room_availability`, `room_description`) VALUES
('M01', 'Rose-01', '1st Floor', 'Male', 'Swimming Pool', 'Rp. 1.000.000', 'Vacant', 'Black Wall'),
('M02', 'Lilac-01', '1st Floor', 'Male', 'Garden', 'Rp. 1.000.000', 'Occupied', 'White Wall'),
('M03', 'Jasmine-01', '1st Floor', 'Male', 'Hallway', 'Rp. 1.000.000', 'Occupied', 'Blue Wall'),
('M04', 'Rose-02', '1st Floor', 'Male', 'Swimming Pool', 'Rp. 1.000.000', 'Vacant', 'Sage Wall'),
('M05', 'Lilac-02', '1st Floor', 'Male', 'Garden', 'Rp. 1.000.000', 'Vacant', 'Cyan Wall'),
('M06', 'Jasmine-02', '2nd Floor', 'Male', 'Hallway', 'Rp. 2.000.000', 'Vacant', 'Black Wall'),
('M07', 'Rose-03', '2nd Floor', 'Male', 'Swimming Pool', 'Rp. 2.000.000', 'Vacant', 'White Wall'),
('M08', 'Lilac-03', '2nd Floor', 'Male', 'Garden', 'Rp. 2.000.000', 'Vacant', 'Blue Wall'),
('M09', 'Jasmine-03', '2nd Floor', 'Male', 'Hallway', 'Rp. 2.000.000', 'Vacant', 'Sage Wall'),
('M10', 'Rose-04', '2nd Floor', 'Male', 'Swimming Pool', 'Rp. 2.000.000', 'Vacant', 'Cyan Wall'),
('W11', 'Lilac-04', '1st Floor', 'Female', 'Hallway', 'Rp. 1.000.000', 'Vacant', 'Lilac Wall'),
('W12', 'Jasmine-04', '1st Floor', 'Female', 'Swimming Pool', 'Rp. 1.000.000', 'Vacant', 'Pink Wall'),
('W13', 'Rose-05', '1st Floor', 'Female', 'Garden', 'Rp. 1.000.000', 'Vacant', 'White Wall'),
('W14', 'Lilac-05', '1st Floor', 'Female', 'Hallway', 'Rp. 1.000.000', 'Vacant', 'Black Wall'),
('W15', 'Jasmine-05', '1st Floor', 'Female', 'Swimming Pool', 'Rp. 1.000.000', 'Vacant', 'Ivory Wall'),
('W16', 'Rose-06', '2nd Floor', 'Female', 'Garden', 'Rp. 2.000.000', 'Vacant', 'Lilac Wall'),
('W17', 'Lilac-06', '2nd Floor', 'Female', 'Hallway', 'Rp. 2.000.000', 'Vacant', 'Pink Wall'),
('W18', 'Jasmine-06', '2nd Floor', 'Female', 'Swimming Pool', 'Rp. 2.000.000', 'Vacant', 'White Wall'),
('W20', 'Lilac-07', '2nd Floor', 'Female', 'Garden', 'Rp. 2.000.000', 'Vacant', 'blue wall'),
('W21', 'Jasmine-07', '2nd Floor', 'Female', 'Hallway', 'Rp. 2.000.000', 'Vacant', 'Cyan Wall');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tenant_id` varchar(50) NOT NULL,
  `tenant_name` varchar(50) DEFAULT NULL,
  `tenant_address` varchar(100) DEFAULT NULL,
  `tenant_ktp_no` int(50) DEFAULT NULL,
  `tenant_phone` varchar(50) DEFAULT NULL,
  `tenant_email` varchar(50) DEFAULT NULL,
  `tenant_emergcp` varchar(50) DEFAULT NULL,
  `tenant_emergcp_phone` varchar(50) DEFAULT NULL,
  `tenant_emergcp_email` varchar(50) DEFAULT NULL,
  `tenant_bankaccount` varchar(50) DEFAULT NULL,
  `tenant_bankaccount_no` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tenant_id`, `tenant_name`, `tenant_address`, `tenant_ktp_no`, `tenant_phone`, `tenant_email`, `tenant_emergcp`, `tenant_emergcp_phone`, `tenant_emergcp_email`, `tenant_bankaccount`, `tenant_bankaccount_no`) VALUES
('A01', 'Mark Lee', 'Jl. Mawar, Cikarang', 12202101, '0822-0101', 'mark@gmail.com', 'Waini', '0821-1010', 'waini@gmail.com', 'BCA', 1231),
('B02', 'Renjun Huang', 'Jl. Melati, Bekasi', 12202102, '0822-0102', 'renjun@gmail.com', 'Egina', '0821-1011', 'egina@gmail.com', 'BNI', 1232),
('C03', 'Jeno Lee', 'Jl. Merdeka, Jakarata', 12202103, '0822-0103', 'jeno@gmail.com', 'Wine', '0821-1012', 'wine@gmail.com', 'Mandiri', 1233),
('D04', 'Haechan Lee', 'Jl. Haruka, Cikarang', 12202104, '0822-0104', 'haechan@gmail.com', 'Rara', '0821-1013', 'rara@gmail.com', 'BRI', 1234),
('E05', 'Jaemin Na', 'Jl. Maharani, Cikarang', 12202105, '0822-0105', 'jaemin@gmail.com', 'Esther', '0821-1014', 'esther@gmail.com', 'BCA', 1235),
('F06', 'Chenle Zhong', 'Jl. Sejahtera, Cikarang', 12202106, '0822-0106', 'chenle@gmail.com', 'Eldi', '0821-1015', 'eldi@gmail.com', 'BNI', 1236),
('G07', 'Jisung Park', 'Jl. Opera, Bekasi', 12202107, '0822-0107', 'jisung@gmail.com', 'Lia', '0821-1016', 'lia@gmail.com', 'Mandiri', 1237),
('H08', 'Jaehyun Jung', 'Jl. Paku, Jakarta', 12202108, '0822-0108', 'jaehyun@gmail.com', 'Pris', '0821-1017', 'pris@gmail.com', 'BRI', 1238),
('I09', 'Wonwoo Jeon', 'Jl. Gorontalo, Cikarang', 12202109, '0822-0109', 'wonwoo@gmail.com', 'Rere', '0821-1018', 'rere@gmail.com', 'BCA', 1239),
('J10', 'Sunghoon Park', 'Jl. Yaha, Cikarang', 122021010, '0822-0110', 'sunghoon@gmail.com', 'Gina', '0821-1019', 'gina@gmail.com', 'BNI', 12310),
('K11', 'Wonyoung Jang', 'Jl. Restu, Cikarang', 12202111, '0822-0111', 'wonyoung@gmail.com', 'Rosa', '0821-1020', 'rosa@gmail.com', 'Mandiri', 12311),
('L12', 'Yerim Kim', 'Jl. Yuyu, Cikarang', 12202112, '0822-0112', 'yerim@gmail.com', 'Maria', '0821-1021', 'maria@gmail.com', 'BRI', 12312),
('M13', 'Joohyun Bae', 'Jl. Indonesia, Cikarang', 12202113, '0822-0113', 'joohyun@gmail.com', 'Wangja', '0821-1022', 'wangja@gmail.com', 'BCA', 12313),
('N14', 'Sooyoung Park', 'Jl. Diponegoro, Cikarang', 122021014, '0822-0114', 'sooyoung@gmail.com', 'Rege', '0821-1023', 'rege@gmail.com', 'BNI', 12314),
('O15', 'Seulgi Kim', 'Jl. Karangsatria, Cikarang', 122021015, '0822-0115', 'seulgi@gmail.com', 'Regi', '0821-1024', 'regi@gmail.com', 'Mandiri', 12315),
('P16', 'Seungwan Son', 'Jl. Ketentraman, Cikarang', 12202116, '0822-0116', 'seungwan@gmail.com', 'Gigi', '0821-1025', 'gigi@gmail.com', 'BRI', 12316),
('Q17', 'Roseanne Park', 'Jl. Kasih, Cikarang', 12202117, '0822-0117', 'roseanne@gmail.com', 'Tutu', '0821-1026', 'tutu@gmail.com', 'BCA', 12317),
('R18', 'Jennie Kim', 'Jl. Kokoro, Bekasi', 12202118, '0822-0118', 'jennie@gmail.com', 'Didi', '0821-1027', 'didi@gmail.com', 'BNI', 12318),
('S19', 'Lalisa Manoban', 'Jl. Sarasa, Cikarang', 122021019, '0822-0119', 'lalisa@gmail.com', 'Winwin', '0821-1028', 'winwin@gmail.com', 'Mandiri', 12319),
('T20', 'Jisoo KIm', 'Kwangya', 12345, '08123456', 'jenolee@sm.ent.id', 'Sooman Lee', '0898765', 'soomanlee@sm.ent.id', 'BCA', 13082000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `FKRoom_id` (`room_id`),
  ADD KEY `FKTenant_id` (`tenant_id`);

--
-- Indexes for table `damage`
--
ALTER TABLE `damage`
  ADD KEY `FKdamage` (`room_id`),
  ADD KEY `FKdamage1` (`tenant_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `FKInvoice1` (`tenant_id`),
  ADD KEY `FKInvoice2` (`tenant_name`),
  ADD KEY `FKInvoice3` (`tenant_address`),
  ADD KEY `FKInvoice4` (`tenant_phone`),
  ADD KEY `FKInvoice5` (`room_label`),
  ADD KEY `FKInvoice6` (`room_monthly_price`) USING BTREE;

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_label` (`room_label`),
  ADD KEY `room_monthly_price` (`room_monthly_price`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenant_id`),
  ADD KEY `tenant_name` (`tenant_name`),
  ADD KEY `tenant_address` (`tenant_address`),
  ADD KEY `tenant_phone` (`tenant_phone`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `FKRoom_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `FKTenant_id` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`tenant_id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `FKInvoice1` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`tenant_id`),
  ADD CONSTRAINT `FKInvoice2` FOREIGN KEY (`tenant_name`) REFERENCES `tenant` (`tenant_name`),
  ADD CONSTRAINT `FKInvoice3` FOREIGN KEY (`tenant_address`) REFERENCES `tenant` (`tenant_address`),
  ADD CONSTRAINT `FKInvoice4` FOREIGN KEY (`tenant_phone`) REFERENCES `tenant` (`tenant_phone`),
  ADD CONSTRAINT `FKInvoice5` FOREIGN KEY (`room_label`) REFERENCES `room` (`room_label`),
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`room_monthly_price`) REFERENCES `room` (`room_monthly_price`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
