-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 06:26 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loomlux`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins_table`
--

CREATE TABLE `admins_table` (
  `admin_id` int(11) NOT NULL,
  `adminname` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins_table`
--

INSERT INTO `admins_table` (`admin_id`, `adminname`, `admin_email`, `admin_password`, `admin_image`) VALUES
(1, 'Raheem', 'Raheem@gmail.com', '$2y$10$L.whtJM1dNfe7C8RQi6BVO4yYDdVdtCSfBaA/zIH3FrTJKYO5xeWW', '3.jpg'),
(2, 'Nuska', 'Nuska@gmail.com', '$2y$10$NpctxN26A2sBz2ZHtQNRxOGg/7sfoVDqUABBZ7p1MplGzQW2rHZRG', '6.jpg'),
(3, 'Fahath', 'Fahath@gmail.com', '$2y$10$tXqwzfkZPWNtTbbP64Xzy.RrS0PzkGhiCZ229uYwS.84o6KJt0oxe', 'lab.png');

-- --------------------------------------------------------

--
-- Table structure for table `be_pay`
--

CREATE TABLE `be_pay` (
  `be_pay_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(11) NOT NULL,
  `total_products` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `category_id`) VALUES
(5, 'WashingMeachine', 4),
(6, 'Nike', 5),
(7, 'Puma', 7),
(8, '15pro', 6),
(9, '14pro', 6),
(10, 'puma', 8),
(14, 'Iphone', 9);

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`product_id`, `quantity`, `user_id`) VALUES
(18, 1, 16),
(8, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`, `user_id`) VALUES
(1, '14278e47d3ea2ae', 0, 0),
(3, '::1', 3, 0),
(4, '::1', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(2, 'mens'),
(4, 'Electrical'),
(5, 'womens'),
(7, 'Boys'),
(8, 'Sport'),
(9, 'phone'),
(10, 'shoes2');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNo` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `Admin_Reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `Title`, `Name`, `Email`, `PhoneNo`, `Message`, `Admin_Reply`) VALUES
(1, 'DR.', 'raheem', 'abdulraheem@icloud.com', '0755317941', ';hi', 'hi'),
(2, 'DR.', 'raheem', 'abdulraheem@icloud.com', '0755317941', ';hi', 'hi'),
(3, 'DR.', 'Raheem', 'praveen.sv98@gmail.com', '0755317941', 'hi', 'hi'),
(4, 'MISS.', 'Abisha', 'abiweerachandra2004@gmail.com', '0755317941', 'hi', 'hi'),
(5, 'MR.', 'Miruthupan', 'miruthupanmithu@gmail.com', '0755317941', 'hi', 'helloo'),
(6, 'MR.', 'Praveen', 'praveen.sv98@gmail.com', '0755317941', 'hi', 'hi'),
(7, 'MR.', 'Jazzim', 'mohammadjaaz12@gmail.com', '0755317941', 'hi hi hi ', 'hi'),
(8, 'MR.', 'Jazzim', 'mohammadjaaz12@gmail.com', '0755317941', 'hi hi hi ', ''),
(9, 'MR.', 'Miruthupan', 'miruthupanmithu@gmail.com', '0755317941', 'hi miru antha girl nalla irukal thanea \r\n', 'hi \r\n'),
(10, 'DR.', 'Hasanthi', 'hasandisethara@gmail.com', '+94 75 354 8929', 'Hi i need some information about LoomLux ecommerce can you give the explain ', ''),
(11, 'DR.', 'Hasanthi', 'hasandisethara@gmail.com', '+94 75 354 8929', 'Hi i need some information about LoomLux ecommerce can you give the explain ', 'yeah tell what type of information you need '),
(12, 'MR.', 'raheem', 'abdulraheemrn2014@gmail.com', '+94 75 354 8929', 'hi', 'ok '),
(13, 'MISS.', 'Hasanthi', 'hasandisethara@gmail.com', '0755317941', 'hi', 'hello '),
(14, 'select Title', 'nadessha', 'nadeesha9917@gmail.com', '0755317941', 'hi i am nadeesha', 'hi nadeesha'),
(15, 'select Title', 'raheem', 'abdulraheemrn2014@gmail.com', '0755317941', 'hi', 'hello Nuksa '),
(16, 'MR.', 'raheem', 'abdulraheemrn2014@gmail.com', '0755317941', 'hi ', 'hello ');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 2, 1376553436, 3, 1, 'pending'),
(2, 3, 1017555682, 4, 1, 'pending'),
(3, 2, 1510897248, 3, 1, 'pending'),
(4, 4, 573972359, 3, 3, 'pending'),
(5, 4, 280786301, 1, 1, 'pending'),
(6, 5, 867027545, 3, 1, 'pending'),
(7, 1, 1751249192, 9, 1, 'pending'),
(8, 1, 1187015798, 12, 1, 'pending'),
(9, 1, 1762786130, 8, 1, 'pending'),
(10, 7, 255478776, 4, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_pending`
--

CREATE TABLE `order_pending` (
  `order_pending_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `product_ids` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_details_id` int(11) NOT NULL,
  `Product_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_pending`
--

INSERT INTO `order_pending` (`order_pending_id`, `user_id`, `invoice_number`, `product_ids`, `quantity`, `order_status`, `order_details_id`, `Product_status`) VALUES
(1, 2, 'INV108759', '21', '1', 'Complete', 1, 'Pending'),
(2, 2, 'INV239943', '3,4', '1,1', 'Pending', 2, 'Pending'),
(3, 12, 'INV539191', '21', '1', 'Pending', 3, 'Pending'),
(4, 12, 'INV758008', '16', '1', 'Pending', 4, 'Pending'),
(5, 2, 'INV857010', '3', '4', 'Pending', 5, 'Pending'),
(6, 10, 'INV664402', '5', '1', 'Pending', 6, 'Pending'),
(7, 2, 'INV535352', '12', '1', 'Pending', 7, 'Accepted'),
(8, 2, 'INV545388', '12', '1', 'Pending', 8, 'Accepted'),
(9, 2, 'INV700131', '27', '1', 'Pending', 9, 'Accepted'),
(10, 15, 'INV643172', '4,26', '2,2', 'Pending', 9, 'Accepted'),
(11, 10, 'INV898955', '1,10', '3,3', 'Complete', 10, 'Accepted'),
(12, 2, 'INV633977', '22', '3', 'Pending', 11, 'Pending'),
(13, 2, 'INV869817', '3,26', '2,1', 'Pending', 12, 'Pending'),
(14, 2, 'INV379325', '16,10', '2,1', 'Pending', 13, 'Pending'),
(15, 16, 'INV854363', '18', '1', 'Pending', 14, 'Pending'),
(16, 16, 'INV445524', '18', '1', 'Complete', 15, 'Pending'),
(17, 16, 'INV782167', '15', '1', 'Pending', 16, 'Pending'),
(18, 16, 'INV659862', '22', '1', 'Pending', 17, 'Pending'),
(19, 16, 'INV151411', '5,4', '1,1', 'Pending', 18, 'Pending'),
(20, 16, 'INV531809', '1,8', '1,1', 'Pending', 19, 'Pending'),
(21, 16, 'INV561133', '10,11', '3,1', 'Pending', 20, 'Accepted'),
(22, 16, 'INV638491', '17,20', '2,1', 'Pending', 21, 'Accepted'),
(23, 16, 'INV296853', '15,5', '5,2', 'Pending', 22, 'Accepted'),
(24, 19, 'INV152474', '5,22', '3,1', 'Complete', 23, 'Accepted'),
(25, 19, 'INV702387', '18', '1', 'Pending', 24, 'Pending'),
(26, 16, 'INV863786', '10,27,16,26', '2,2,1,1', 'Complete', 25, 'Accepted'),
(27, 1, 'INV665294', '12', '2', 'Complete', 26, 'Accepted'),
(28, 16, 'INV801087', '5,9', '3,1', 'Pending', 26, 'Accepted'),
(29, 16, 'INV173329', '20', '1', 'Pending', 27, 'Accepted'),
(30, 16, 'INV198296', '29', '1', 'Complete', 28, 'Reject'),
(31, 16, 'INV346455', '5', '1', 'Pending', 29, 'Accepted'),
(32, 16, 'INV668954', '12', '1', 'Pending', 30, ''),
(33, 16, 'INV413761', '5,16', '1,2', 'Complete', 31, 'Accepted'),
(34, 16, 'INV532412', '11', '3', 'Complete', 32, 'Accepted'),
(35, 16, 'INV762908', '13', '1', 'Pending', 33, 'Shipping'),
(36, 16, 'INV649452', '17', '1', 'Pending', 34, 'Accepted'),
(37, 16, 'INV306580', '8', '1', 'Complete', 35, 'Accepted'),
(38, 16, 'INV830946', '11', '1', 'Pending', 36, 'Processs'),
(39, 16, 'INV260885', '11', '1', 'Pending', 37, 'Reject'),
(40, 16, 'INV383515', '11', '1', 'Complete', 38, 'Accepted'),
(41, 16, 'INV675316', '11', '1', 'Pending', 39, 'Accepted'),
(42, 16, 'INV669221', '11', '1', 'Pending', 40, 'Accepted'),
(43, 16, 'INV744465', '11', '1', 'Pending', 41, 'Processs'),
(44, 16, 'INV541436', '11', '4', 'Complete', 42, 'Accepted'),
(45, 16, 'INV729514', '11', '1', 'Pending', 43, 'Reject');

-- --------------------------------------------------------

--
-- Table structure for table `placeorderdetails_table`
--

CREATE TABLE `placeorderdetails_table` (
  `order_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `postal_number` varchar(20) NOT NULL,
  `product_images` varchar(255) NOT NULL,
  `product_prices` varchar(255) NOT NULL,
  `product_titles` varchar(255) NOT NULL,
  `quantities` varchar(255) NOT NULL,
  `product_ids` varchar(255) NOT NULL,
  `shop_ids` varchar(255) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_price` int(11) NOT NULL,
  `Product_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placeorderdetails_table`
--

INSERT INTO `placeorderdetails_table` (`order_details_id`, `user_id`, `order_id`, `username`, `address`, `contact_number`, `postal_number`, `product_images`, `product_prices`, `product_titles`, `quantities`, `product_ids`, `shop_ids`, `invoice_number`, `order_status`, `create_at`, `total_price`, `Product_status`) VALUES
(1, 2, 45, 'abdulraheem', 'love lane', '123', '12', '65a64b9c8850f_12.jpg', '1200', 'kite', '1', '21', '4', 'INV108759', 'Complete', '2024-01-21 12:27:11', 1200, '0'),
(2, 2, 46, 'abdulraheem', 'love lane', '12345', '1', '3.jpg,4.jpg', '2500,2200', 'jenas,t-shirt', '1,1', '3,4', '0,0', 'INV239943', 'Pending', '2024-01-21 08:41:58', 4700, '0'),
(5, 2, 49, 'NuskaRaheem', 'colombo', '123', '1', '3.jpg', '2500', 'jenas', '4', '3', '0', 'INV857010', 'Pending', '2024-01-21 09:09:01', 10000, '0'),
(6, 10, 50, 'abdulraheem', 'love lane', '123', '12', '2.jpg', '120000', 'WashingMechine', '1', '5', '0', 'INV664402', 'Pending', '2024-01-21 09:11:34', 120000, '0'),
(7, 2, 51, 'abdulraheem', 'colombo', '12345', '1', 'lab.png', '485000', '14 pro', '1', '12', '3', 'INV535352', 'Pending', '2024-01-22 09:38:32', 485000, '0'),
(8, 2, 52, 'NuskaRaheem', 'love lane', '12345', '1', 'lab.png', '485000', '14 pro', '1', '12', '3', 'INV545388', 'Pending', '2024-01-21 13:59:14', 485000, '0'),
(9, 15, 54, 'abdulraheem', 'love lane', '12345', '12', '4.jpg,29.jpg', '2200,1999', 't-shirt,denim', '2,2', '4,26', '0,3', 'INV643172', 'Pending', '2024-01-22 09:38:37', 8398, '0'),
(10, 10, 56, 'abdulraheem', 'love lane', '12345', '12', '2.jpg,6595a54c1970b_lab.png', '1000,1200', 'wallpaper,wash', '3,3', '1,10', '0,1', 'INV898955', 'Complete', '2024-01-22 05:14:20', 6600, '0'),
(11, 2, 58, 'Raheem', 'love nlane', '0755317941', '3003', '65ad1c33d643f_29.jpg', '12000', 'boot', '3', '22', '3', 'INV633977', 'Pending', '2024-01-22 13:32:15', 36000, '0'),
(12, 2, 60, 'Nuska', 'love', '078565657', '32', '3.jpg,29.jpg', '2500,1999', 'jenas,denim', '2,1', '3,26', '0,3', 'INV869817', 'Pending', '2024-01-22 13:41:14', 6999, '0'),
(14, 16, 62, 'Raheem', 'Lovelane', '0755317941', '30003', 'lab.png', '160000', '15black', '1', '18', '2', 'INV854363', 'Pending', '2024-01-22 15:17:55', 160000, '0'),
(15, 16, 63, 'Raheem', 'love', '1213', '123', 'lab.png', '160000', '15black', '1', '18', '2', 'INV445524', 'Complete', '2024-01-22 16:26:22', 160000, '0'),
(16, 16, 64, 'Raheem', 'love lane', '2431', '212', '65a3ae43f1b3f_lab.png', '1300', 'iorn', '1', '15', '2', 'INV782167', 'Pending', '2024-01-22 16:17:15', 1300, '0'),
(17, 16, 65, 'Nuska', 'love21311', '123', '1', '65ad1c33d643f_29.jpg', '12000', 'boot', '1', '22', '3', 'INV659862', 'Pending', '2024-01-22 16:25:58', 12000, '0'),
(18, 16, 66, 'nuska', 'love lane', '1234', '12', '4.jpg,2.jpg', '120000,2200', 't-shirt,WashingMechine', '1,1', '5,4', '0,0', 'INV151411', 'Pending', '2024-01-22 16:38:11', 122200, '0'),
(19, 16, 68, 'Praveen', 'Ragama', '0754427171', '11010', '2.jpg,659498b592495_lab.png', '1000,100000', 'wallpaper,tv', '1,1', '1,8', '0,0', 'INV531809', 'Pending', '2024-01-23 05:07:51', 101000, '0'),
(20, 16, 70, 'Nuska', 'colombo', '121232', '12', '6595a54c1970b_lab.png,6595a5cc7b15b_lab.png', '1200,1500', 'wash,top', '3,1', '10,11', '1,2', 'INV561133', 'Pending', '2024-01-28 05:32:58', 5100, '0'),
(21, 16, 71, 'raheem', 'colombo', '0755317941', '3003', '65a3af0b31b62_lab.png,lab.png', '10000,12000', 'bet,dress', '2,1', '17,20', '2,2', 'INV638491', 'Pending', '2024-01-28 05:36:28', 32000, '0'),
(22, 16, 73, 'Raheem', 'colombo', '0755317941', '3003', '2.jpg,65a3ae43f1b3f_lab.png', '1300,120000', 'WashingMechine,iorn', '5,2', '15,5', '2,0', 'INV296853', 'Pending', '2024-01-24 16:13:07', 246500, '0'),
(25, 16, 76, 'abi', 'colombo', '075442143', '30003', '6595a54c1970b_lab.png,65a3ae9a0e442_lab.png,29.jpg,65ad224a8e923_12.jpg', '1200,1000,12000,1999', 'wash,7,denim,car', '2,2,1,1', '10,27,16,26', '1,3,2,3', 'INV863786', 'Complete', '2024-01-24 16:12:31', 18399, '0'),
(27, 16, 79, 'Nuska', 'colombo', '0755317941', '60001', 'lab.png', '12000', 'dress', '1', '20', '2', 'INV173329', 'Pending', '2024-01-28 05:06:02', 12000, '0'),
(28, 16, 80, 'Nuska', 'colombo', '0755317941', '6001', '65b263f6302e2_12.jpg', '1259', 'Jeans', '1', '29', '4', 'INV198296', 'Complete', '2024-01-28 04:35:57', 1259, '0'),
(29, 16, 81, 'raheem', 'colombo', '0382498', '477', '2.jpg', '120000', 'WashingMechine', '1', '5', '0', 'INV346455', 'Pending', '2024-01-28 04:22:54', 120000, '0'),
(30, 16, 82, 'Raheem', 'colombo', '1212312', '088', 'lab.png', '485000', '14 pro', '1', '12', '3', 'INV668954', 'Pending', '2024-01-28 04:09:48', 485000, '0'),
(31, 16, 83, 'Raheem', 'Colombo', '0755317941', '6006', 'wasm.jpg,7.jpg', '120000,12000', 'WashingMechine-LG,Iphone-7G/black/256gb', '1,2', '5,16', '0,2', 'INV413761', 'Complete', '2024-01-28 04:55:48', 144000, '0'),
(32, 16, 84, 'Nuska', 'colombo', '0755317941', '2002', 'top.jpg', '1500', 'womens-top-Nike', '3', '11', '2', 'INV532412', 'Complete', '2024-01-28 04:57:54', 4500, '0'),
(33, 16, 85, 'Nuska', 'Colombo', '0755317941', '5001', 'jeans.jpg', '2500', 'Boys-jeans/Puma', '1', '13', '3', 'INV762908', 'Pending', '2024-01-28 06:46:11', 2500, '0'),
(34, 16, 86, 'Praveen', 'colombo', '0755317941', '30002', 'bat.jpg', '10000', 'Cricket-Bat/Puma', '1', '17', '2', 'INV649452', 'Pending', '2024-01-28 07:31:36', 10000, 'Accepted'),
(35, 16, 87, 'Praveen', 'colombo', '0755317942', '23232', 'tv.jpg', '100000', 'Samsung Tv S0009', '1', '8', '0', 'INV306580', 'Complete', '2024-01-28 07:33:49', 100000, 'Accepted'),
(36, 16, 88, 'nuska', 'colombo', '0755317941', '20002', 'top.jpg', '1500', 'womens-top-Nike', '1', '11', '2', 'INV830946', 'Pending', '2024-01-28 08:48:35', 1500, 'Processs'),
(37, 16, 89, 'Yash', 'colombo', '0755317941', '3002', 'top.jpg', '1500', 'womens-top-Nike', '1', '11', '2', 'INV260885', 'Pending', '2024-01-28 07:57:27', 1500, 'Reject'),
(38, 16, 90, 'Miru', 'colomboi', '0755317941', '2000', 'top.jpg', '1500', 'womens-top-Nike', '1', '11', '2', 'INV383515', 'Complete', '2024-01-28 07:51:36', 1500, 'Accepted'),
(39, 16, 91, 'Raheem', 'colombo', '0755312', '20001', 'top.jpg', '1500', 'womens-top-Nike', '1', '11', '2', 'INV675316', 'Pending', '2024-01-28 09:37:51', 1500, 'Accepted'),
(40, 16, 92, 'Raheem', 'Colombo', '062312312', '123123', 'top.jpg', '1500', 'womens-top-Nike', '1', '11', '2', 'INV669221', 'Pending', '2024-01-28 10:47:58', 1500, 'Accepted'),
(41, 16, 93, 'Abi', 'Colombo', '89345734', '499', 'top.jpg', '1500', 'womens-top-Nike', '1', '11', '2', 'INV744465', 'Pending', '2024-01-29 05:17:06', 1500, 'Processs'),
(42, 16, 94, 'hasandhi', 'colombo', '0923752897', '4545', 'top.jpg', '1500', 'womens-top-Nike', '4', '11', '2', 'INV541436', 'Complete', '2024-01-28 14:52:29', 6000, 'Accepted'),
(43, 16, 95, 'Raheem', 'colombo', '097329472', '234', 'top.jpg', '1500', 'womens-top-Nike', '1', '11', '2', 'INV729514', 'Pending', '2024-01-28 16:26:16', 1500, 'Reject');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `product_keywords` varchar(1000) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `product_status` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_priceO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`, `shop_id`, `product_status`, `product_color`, `product_quantity`, `product_priceO`) VALUES
(4, 'Mens T-shirt-Puma', 'good', 't-shirt,women,adiddas', 7, 7, 'shirt.jpg', 'shirt.jpg', 'shirt.jpg', '2200', '2024-01-27 07:52:15', 'true', 0, 'In Stock', 'Black', 10, '2500'),
(5, 'WashingMechine-LG', 'Lg brand its a very amazing product ', 'WashingMechine,Electrical,mechine', 0, 0, 'wasm.jpg', 'wasm.jpg', 'wasm.jpg', '120000', '2024-01-27 07:53:15', 'true', 0, 'In Stock', 'Black', 100, '129999'),
(8, 'Samsung Tv S0009', 'tv', 'tv', 4, 5, 'tv.jpg', 'tv1.jpg', 'tv.jpg', '100000', '2024-01-27 07:55:38', 'true', 0, 'In Stock', '30', 30, '110000'),
(10, 'wash', 'wash', 'wash', 2, 1, '6595a54c1970b_lab.png', '6595a54c1970e_OIP.jpg', '6595a54c1970f_OIP.jpg', '1200', '2024-01-03 18:19:56', 'true', 1, '', '', 0, ''),
(11, 'womens-top-Nike', 'top', 'top', 0, 0, 'top.jpg', 'top.jpg', 'top.jpg', '1500', '2024-01-27 07:56:27', 'true', 2, 'In Stock', 'black', 30, '1999'),
(12, '14 pro-256GB-black', '14pro', '14,pro', 0, 0, '14.jpg', '14.jpg', '14.jpg', '485000', '2024-01-27 07:57:09', 'true', 3, 'In Stock', 'Sliver', 10, '485500'),
(13, 'Boys-jeans/Puma', 'jeans', 'puma,jeans, boys', 0, 0, 'jeans.jpg', 'jeans.jpg', 'jeans.jpg', '2500', '2024-01-27 07:58:12', 'true', 3, 'In Stock', 'Black,Red', 100, '2699'),
(14, 'Mens-Shirt/Puma', 'shirt', 'shirt, men', 0, 0, 'shirt.jpg', 'shirt.jpg', 'shirt.jpg', '2000', '2024-01-27 07:59:04', 'true', 3, 'In Stock', 'Black,red', 50, '2100'),
(15, 'IronBox/LG', 'iron', 'iron', 4, 5, 'iron.jpg', 'iron.jpg', 'iron.jpg', '1300', '2024-01-27 08:00:07', 'true', 2, 'In Stock', 'White,Rose', 20, '1450'),
(16, 'Iphone-7G/black/256gb', '7', '7', 0, 0, '7.jpg', '7.jpg', '7.jpg', '12000', '2024-01-27 08:01:22', 'true', 2, 'In Stock', 'Black,Red', 20, '12999'),
(17, 'Cricket-Bat/Puma', 'bat', 'bat', 0, 0, 'bat.jpg', 'bat.jpg', 'bat.jpg', '10000', '2024-01-27 08:02:36', 'true', 2, 'In Stock', 'common', 100, '10500'),
(18, 'Iphone/15pro max/256GB', '15black', '15black', 0, 0, '15.jpg', '15.jpg', '15.jpg', '160000', '2024-01-27 08:03:28', 'true', 2, 'In Stock', 'Black', 10, '167000'),
(19, 'dress', 'dress', 'dress', 2, 1, '65a3b176e8008_lab.png', '65a3b176e800e_OIP.jpg', '65a3b176e800f_OIP.jpg', '12000', '2024-01-14 10:03:34', 'true', 2, 'In Stock', '', 0, ''),
(20, 'dress', 'dress', 'dress', 0, 0, 'lab.png', 'file.jpg', 'OIP.jpg', '12000', '2024-01-14 10:14:16', 'true', 2, 'In Stock', '', 0, ''),
(22, 'Mens-boot/Puma', 'boot', 'boot', 0, 0, 'boot.jpg', 'boot.jpg', 'boot.jpg', '12000', '2024-01-27 08:04:08', 'true', 3, 'In Stock', 'Black', 100, '12999'),
(26, 'denim', 'denim', 'denim', 4, 5, '12.jpg', '12.jpg', '12.jpg', '1999', '2024-01-25 13:23:33', 'true', 3, 'In Stock', 'black', 150, '2500'),
(27, 'Toy-car/Classic', 'car', 'car', 8, 10, 'car.jpg', 'car.jpg', 'car.jpg', '1000', '2024-01-27 08:05:18', 'true', 3, 'In Stock', 'Black,green', 25, '1200'),
(28, 'Boys-Shoes/nike', 'shoes', 'shoes', 0, 0, 'shoes.jpg', 'shoes.jpg', 'shoes.jpg', '1200', '2024-01-27 08:06:06', 'true', 2, 'In Stock', 'black,white', 25, '1399'),
(29, 'Jeans', 'Jeans', 'Jeans', 8, 10, '65b263f6302e2_12.jpg', '65b263f6302e8_12.jpg', '65b263f6302ea_12.jpg', '1259', '2024-01-25 13:36:54', 'true', 4, 'In Stock', 'blue', 100, '1699');

-- --------------------------------------------------------

--
-- Table structure for table `products_detail`
--

CREATE TABLE `products_detail` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_ids` varchar(255) NOT NULL,
  `product_ids` varchar(255) NOT NULL,
  `quantities` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `product_images` varchar(255) NOT NULL,
  `product_titles` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_prices` varchar(255) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_detail`
--

INSERT INTO `products_detail` (`order_id`, `user_id`, `shop_ids`, `product_ids`, `quantities`, `total_price`, `product_images`, `product_titles`, `order_date`, `product_prices`, `invoice_number`, `sub_total`) VALUES
(1, 2, '3,2', '12,11', '1,1', 386500, '6595a5cc7b15b_lab.png,659925854abc9_lab.png', 'top,14 pro', '2024-01-07 11:14:18', '385000,1500', '', 0),
(2, 2, '3,2', '12,11', '1,1', 386500, '6595a5cc7b15b_lab.png,659925854abc9_lab.png', 'top,14 pro', '2024-01-07 11:21:49', '385000,1500', '', 0),
(3, 2, '3,2', '12,11', '1,1', 386500, '6595a5cc7b15b_lab.png,659925854abc9_lab.png', 'top,14 pro', '2024-01-07 11:22:59', '385000,1500', '', 0),
(4, 2, '3,2', '12,11', '1,1', 386500, '6595a5cc7b15b_lab.png,659925854abc9_lab.png', 'top,14 pro', '2024-01-07 11:37:42', '385000,1500', '', 0),
(5, 1, '0,3', '9,12', '1,1', 386200, '6595a2e3b1ea3_lab.png,659925854abc9_lab.png', 'wash,14 pro', '2024-01-07 11:38:41', '1200,385000', '', 0),
(6, 1, '3,0', '12,8', '1,1', 485000, '659498b592495_lab.png,659925854abc9_lab.png', 'tv,14 pro', '2024-01-07 12:18:54', '385000,100000', '659a96ae845f6', 0),
(7, 1, '3,0', '12,8', '1,1', 485000, '659498b592495_lab.png,659925854abc9_lab.png', 'tv,14 pro', '2024-01-07 12:19:11', '385000,100000', '659a96bfbe3e4', 0),
(8, 1, '3,0', '12,8', '1,1', 485000, '659498b592495_lab.png,659925854abc9_lab.png', 'tv,14 pro', '2024-01-07 12:58:17', '385000,100000', '659a9fe9266bf', 0),
(9, 1, '2', '11', '1', 1500, '6595a5cc7b15b_lab.png', 'top', '2024-01-07 14:05:09', '1500', '659aaf9519d0c', 0),
(10, 2, '3,2', '12,11', '1,1', 386500, '6595a5cc7b15b_lab.png,659925854abc9_lab.png', 'top,14 pro', '2024-01-07 14:10:50', '385000,1500', '659ab0ea08a86', 0),
(11, 7, '3,0', '12,4', '1,1', 387200, '4.jpg,659925854abc9_lab.png', 't-shirt,14 pro', '2024-01-07 14:41:41', '385000,2200', '659ab825a3e3c', 0),
(12, 4, '0,0', '1,4', '1,1', 3200, '2.jpg,4.jpg', 'wallpaper,t-shirt', '2024-01-08 06:19:07', '1000,2200', '659b93dbaebf2', 0),
(13, 2, '3,2', '12,11', '1,1', 386500, '6595a5cc7b15b_lab.png,659925854abc9_lab.png', 'top,14 pro', '2024-01-09 06:06:50', '385000,1500', '659ce27abc774', 0),
(14, 2, '0', '1', '4', 4000, '2.jpg', 'wallpaper', '2024-01-09 07:04:43', '1000', '659cf00b32ec4', 0),
(15, 2, '0,0', '1,3', '3,3', 10500, '2.jpg,3.jpg', 'wallpaper,jenas', '2024-01-09 07:05:15', '1000,2500', '659cf02bb9ec0', 0),
(16, 2, '0', '5', '2', 240000, '2.jpg', 'WashingMechine', '2024-01-09 07:35:20', '120000', '659cf738691b3', 240000),
(17, 2, '0,0', '5,9', '4,1', 481200, '2.jpg,6595a2e3b1ea3_lab.png', 'WashingMechine,wash', '2024-01-09 07:43:51', '120000,1200', '659cf93737f74', 481200),
(18, 2, '3', '12', '5', 1925000, '659925854abc9_lab.png', '14 pro', '2024-01-09 07:49:06', '385000', '659cfa728a4c0', 1925000),
(19, 2, '0', '9', '2', 2400, '6595a2e3b1ea3_lab.png', 'wash', '2024-01-09 09:17:10', '1200', '659d0f167e1fd', 2400),
(20, 1, '2', '11', '4', 6000, '6595a5cc7b15b_lab.png', 'top', '2024-01-09 09:33:16', '1500', '659d12dc5fde2', 6000),
(21, 1, '0,0', '8,3', '4,4', 410000, '3.jpg,659498b592495_lab.png', 'jenas,tv', '2024-01-10 02:31:42', '100000,2500', '659e018e5b837', 410000),
(22, 2, '0', '1', '5', 5000, '2.jpg', 'wallpaper', '2024-01-13 17:23:44', '1000', '65a2c720aef9c', 5000),
(23, 2, '0', '1', '5', 5000, '2.jpg', 'wallpaper', '2024-01-13 17:46:16', '1000', '65a2cc6819a30', 5000),
(24, 2, '2', '11', '1', 1500, '6595a5cc7b15b_lab.png', 'top', '2024-01-14 07:11:57', '1500', '65a3893de08af', 1500),
(25, 2, '0', '5', '1', 120000, '2.jpg', 'WashingMechine', '2024-01-14 07:58:33', '120000', '65a394292246b', 120000),
(26, 2, '0,2', '8,16', '2,2', 224000, '659498b592495_lab.png,65a3ae9a0e442_lab.png', 'tv,7', '2024-01-16 09:14:43', '100000,12000', '65a6490327131', 224000),
(27, 1, '0', '1', '2', 2000, '2.jpg', 'wallpaper', '2024-01-19 03:43:12', '1000', '65a9efd0c1d92', 2000),
(28, 10, '0', '3', '1', 2500, '3.jpg', 'jenas', '2024-01-19 04:24:11', '2500', '65a9f96bd0046', 2500),
(29, 10, '3', '14', '1', 2000, '659e065076384_education.png', 'Shirt', '2024-01-19 04:28:13', '2000', '65a9fa5de9abf', 2000),
(30, 10, '3,2', '14,18', '1,1', 162000, '659e065076384_education.png,lab.png', 'Shirt,15black', '2024-01-19 04:29:50', '2000,160000', '65a9fabe7f74f', 162000),
(31, 2, '0', '3', '1', 2500, '3.jpg', 'jenas', '2024-01-20 06:17:18', '2500', '65ab656eae39d', 2500),
(32, 2, '0', '1', '1', 1000, '2.jpg', 'wallpaper', '2024-01-20 06:28:27', '1000', '65ab680b86304', 1000),
(33, 2, '2', '16', '1', 12000, '65a3ae9a0e442_lab.png', '7', '2024-01-20 07:01:33', '12000', '65ab6fcd28991', 12000),
(34, 11, '3', '12', '1', 485000, 'lab.png', '14 pro', '2024-01-20 07:33:10', '485000', '65ab7736942a8', 485000),
(35, 2, '2', '18', '1', 160000, 'lab.png', '15black', '2024-01-20 13:08:34', '160000', '65abc5d2c4197', 160000),
(36, 2, '2,0', '18,1', '1,1', 161000, '2.jpg,lab.png', 'wallpaper,15black', '2024-01-20 13:08:54', '160000,1000', '65abc5e65d034', 161000),
(37, 2, '0', '1', '1', 1000, '2.jpg', 'wallpaper', '2024-01-20 13:13:23', '1000', '65abc6f31e5d9', 1000),
(38, 2, '3,0,3', '12,4,14', '1,1,1', 489200, '4.jpg,lab.png,659e065076384_education.png', 't-shirt,14 pro,Shirt', '2024-01-20 13:19:53', '485000,2200,2000', '65abc87930b4a', 489200),
(39, 2, '0,3,2', '3,13,17', '1,1,1', 15000, '3.jpg,lab.png,65a3af0b31b62_lab.png', 'jenas,jeans,bet', '2024-01-20 15:13:34', '2500,2500,10000', '65abe31eb2a4d', 15000),
(40, 2, '0,0', '1,4', '1,1', 3200, '2.jpg,4.jpg', 'wallpaper,t-shirt', '2024-01-20 15:18:31', '1000,2200', '65abe447643cf', 3200),
(41, 12, '0,3', '1,12', '1,1', 486000, '2.jpg,lab.png', 'wallpaper,14 pro', '2024-01-20 15:23:15', '1000,485000', '65abe563b1f14', 486000),
(42, 12, '2', '16', '2', 24000, '65a3ae9a0e442_lab.png', '7', '2024-01-20 15:29:51', '12000', '65abe6efae2df', 24000),
(43, 12, '2', '16', '1', 12000, '65a3ae9a0e442_lab.png', '7', '2024-01-20 15:30:51', '12000', '65abe72b9e329', 12000),
(44, 2, '2', '19', '1', 12000, '65a3b176e8008_lab.png', 'dress', '2024-01-21 08:35:17', '12000', '65acd7450f288', 12000),
(45, 2, '4', '21', '1', 1200, '65a64b9c8850f_12.jpg', 'kite', '2024-01-21 08:41:03', '1200', '65acd89f0e8a8', 1200),
(46, 2, '0,0', '3,4', '1,1', 4700, '3.jpg,4.jpg', 'jenas,t-shirt', '2024-01-21 08:41:46', '2500,2200', '65acd8ca90e16', 4700),
(47, 12, '4', '21', '1', 1200, '65a64b9c8850f_12.jpg', 'kite', '2024-01-21 09:02:03', '1200', '65acdd8bd514d', 1200),
(48, 12, '2', '16', '1', 12000, '65a3ae9a0e442_lab.png', '7', '2024-01-21 09:02:39', '12000', '65acddaf26083', 12000),
(49, 2, '0', '3', '4', 10000, '3.jpg', 'jenas', '2024-01-21 09:08:48', '2500', '65acdf206f5ef', 10000),
(50, 10, '0', '5', '1', 120000, '2.jpg', 'WashingMechine', '2024-01-21 09:11:22', '120000', '65acdfba554c3', 120000),
(51, 2, '3', '12', '1', 485000, 'lab.png', '14 pro', '2024-01-21 12:11:03', '485000', '65ad09d73889e', 485000),
(52, 2, '3', '12', '1', 485000, 'lab.png', '14 pro', '2024-01-21 12:13:28', '485000', '65ad0a6885062', 485000),
(53, 2, '3', '27', '1', 1000, '65ad224a8e923_12.jpg', 'car', '2024-01-21 14:00:11', '1000', '65ad236b64a9e', 1000),
(54, 15, '0,3', '4,26', '2,2', 8398, '4.jpg,29.jpg', 't-shirt,denim', '2024-01-22 04:24:39', '2200,1999', '65adee07b2d08', 8398),
(55, 10, '0,3,2', '4,26,16', '0,0,0', 0, '4.jpg,65a3ae9a0e442_lab.png,29.jpg', 't-shirt,7,denim', '2024-01-22 05:10:04', '2200,1999,12000', '65adf8ac9b1fb', 0),
(56, 10, '0,1', '1,10', '3,3', 6600, '2.jpg,6595a54c1970b_lab.png', 'wallpaper,wash', '2024-01-22 05:12:12', '1000,1200', '65adf92c11746', 6600),
(57, 2, '3', '22', '2', 24000, '65ad1c33d643f_29.jpg', 'boot', '2024-01-22 13:21:31', '12000', '65ae6bdbccd72', 24000),
(58, 2, '3', '22', '3', 36000, '65ad1c33d643f_29.jpg', 'boot', '2024-01-22 13:29:07', '12000', '65ae6da3ced54', 36000),
(59, 2, '2,0', '17,3', '1,1', 12500, '3.jpg,65a3af0b31b62_lab.png', 'jenas,bet', '2024-01-22 13:34:26', '10000,2500', '65ae6ee268c8f', 12500),
(60, 2, '0,3', '3,26', '2,1', 6999, '3.jpg,29.jpg', 'jenas,denim', '2024-01-22 13:40:56', '2500,1999', '65ae70682e7be', 6999),
(61, 2, '2,1', '16,10', '2,1', 25200, '6595a54c1970b_lab.png,65a3ae9a0e442_lab.png', 'wash,7', '2024-01-22 13:53:50', '12000,1200', '65ae736e2418d', 25200),
(62, 16, '2', '18', '1', 160000, 'lab.png', '15black', '2024-01-22 15:17:34', '160000', '65ae870ec9706', 160000),
(63, 16, '2', '18', '1', 160000, 'lab.png', '15black', '2024-01-22 15:52:34', '160000', '65ae8f4214fd0', 160000),
(64, 16, '2', '15', '1', 1300, '65a3ae43f1b3f_lab.png', 'iorn', '2024-01-22 16:16:59', '1300', '65ae94fbd55d4', 1300),
(65, 16, '3', '22', '1', 12000, '65ad1c33d643f_29.jpg', 'boot', '2024-01-22 16:25:43', '12000', '65ae97071772f', 12000),
(66, 16, '0,0', '5,4', '1,1', 122200, '4.jpg,2.jpg', 't-shirt,WashingMechine', '2024-01-22 16:37:49', '120000,2200', '65ae99dd0ae26', 122200),
(67, 16, '0', '5', '1', 120000, '2.jpg', 'WashingMechine', '2024-01-23 04:24:15', '120000', '65af3f6f84862', 120000),
(68, 16, '0,0', '1,8', '1,1', 101000, '2.jpg,659498b592495_lab.png', 'wallpaper,tv', '2024-01-23 05:07:06', '1000,100000', '65af497adb2cf', 101000),
(69, 16, '1', '10', '3', 3600, '6595a54c1970b_lab.png', 'wash', '2024-01-23 17:30:37', '1200', '65aff7bdb7eaf', 3600),
(70, 16, '1,2', '10,11', '3,1', 5100, '6595a54c1970b_lab.png,6595a5cc7b15b_lab.png', 'wash,top', '2024-01-23 17:30:56', '1200,1500', '65aff7d073222', 5100),
(71, 16, '2,2', '17,20', '2,1', 32000, '65a3af0b31b62_lab.png,lab.png', 'bet,dress', '2024-01-23 17:49:00', '10000,12000', '65affc0c30248', 32000),
(72, 16, '3,3', '22,14', '4,4', 56000, '659e065076384_education.png,65ad1c33d643f_29.jpg', 'Shirt,boot', '2024-01-23 18:34:07', '12000,2000', '65b0069f75692', 56000),
(73, 16, '2,0', '15,5', '5,2', 246500, '2.jpg,65a3ae43f1b3f_lab.png', 'WashingMechine,iorn', '2024-01-23 19:22:22', '1300,120000', '65b011ee0b5a2', 246500),
(74, 19, '0,3', '5,22', '3,1', 372000, '2.jpg,65ad1c33d643f_29.jpg', 'WashingMechine,boot', '2024-01-24 04:05:33', '120000,12000', '65b08c8df3eac', 372000),
(75, 19, '2', '18', '1', 160000, 'lab.png', '15black', '2024-01-24 04:10:00', '160000', '65b08d98aa83f', 160000),
(76, 16, '1,3,2,3', '10,27,16,26', '2,2,1,1', 18399, '6595a54c1970b_lab.png,65a3ae9a0e442_lab.png,29.jpg,65ad224a8e923_12.jpg', 'wash,7,denim,car', '2024-01-24 06:47:31', '1200,1000,12000,1999', '65b0b28396d8d', 18399),
(77, 1, '3', '12', '2', 970000, 'lab.png', '14 pro', '2024-01-24 16:16:12', '485000', '65b137cc3befc', 970000),
(78, 16, '0,0', '5,9', '3,1', 361200, '2.jpg,6595a2e3b1ea3_lab.png', 'WashingMechine,wash', '2024-01-25 13:15:21', '120000,1200', '65b25ee9b5e78', 361200),
(79, 16, '2', '20', '1', 12000, 'lab.png', 'dress', '2024-01-25 13:34:18', '12000', '65b2635a94012', 12000),
(80, 16, '4', '29', '1', 1259, '65b263f6302e2_12.jpg', 'Jeans', '2024-01-25 13:38:08', '1259', '65b264409f9ce', 1259),
(81, 16, '0', '5', '1', 120000, '2.jpg', 'WashingMechine', '2024-01-25 13:56:55', '120000', '65b268a70b8b0', 120000),
(82, 16, '3', '12', '1', 485000, 'lab.png', '14 pro', '2024-01-25 14:08:03', '485000', '65b26b43ecfcc', 485000),
(83, 16, '0,2', '5,16', '1,2', 144000, 'wasm.jpg,7.jpg', 'WashingMechine-LG,Iphone-7G/black/256gb', '2024-01-28 04:42:36', '120000,12000', '65b5db3c6190e', 144000),
(84, 16, '2', '11', '3', 4500, 'top.jpg', 'womens-top-Nike', '2024-01-28 04:56:23', '1500', '65b5de774eb99', 4500),
(85, 16, '3', '13', '1', 2500, 'jeans.jpg', 'Boys-jeans/Puma', '2024-01-28 06:02:28', '2500', '65b5edf491226', 2500),
(86, 16, '2', '17', '1', 10000, 'bat.jpg', 'Cricket-Bat/Puma', '2024-01-28 07:11:27', '10000', '65b5fe1f31274', 10000),
(87, 16, '0', '8', '1', 100000, 'tv.jpg', 'Samsung Tv S0009', '2024-01-28 07:32:16', '100000', '65b603003b540', 100000),
(88, 16, '2', '11', '1', 1500, 'top.jpg', 'womens-top-Nike', '2024-01-28 07:38:58', '1500', '65b604925cf25', 1500),
(89, 16, '2', '11', '1', 1500, 'top.jpg', 'womens-top-Nike', '2024-01-28 07:44:59', '1500', '65b605fb0cb07', 1500),
(90, 16, '2', '11', '1', 1500, 'top.jpg', 'womens-top-Nike', '2024-01-28 07:49:20', '1500', '65b6070056943', 1500),
(91, 16, '2', '11', '1', 1500, 'top.jpg', 'womens-top-Nike', '2024-01-28 08:53:18', '1500', '65b615fed9508', 1500),
(92, 16, '2', '11', '1', 1500, 'top.jpg', 'womens-top-Nike', '2024-01-28 09:40:57', '1500', '65b62129e4de5', 1500),
(93, 16, '2', '11', '1', 1500, 'top.jpg', 'womens-top-Nike', '2024-01-28 09:57:30', '1500', '65b6250a3a332', 1500),
(94, 16, '2', '11', '4', 6000, 'top.jpg', 'womens-top-Nike', '2024-01-28 14:38:10', '1500', '65b666d23190c', 6000),
(95, 16, '2', '11', '1', 1500, 'top.jpg', 'womens-top-Nike', '2024-01-28 14:40:52', '1500', '65b6677499535', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `products_details`
--

CREATE TABLE `products_details` (
  `pro_de_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review_text` text,
  `review_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`review_id`, `product_id`, `user_id`, `rating`, `review_text`, `review_date`) VALUES
(1, 10, 16, 3, 'good', '2024-01-24 16:13:50'),
(2, 12, 1, 4, 'nice', '2024-01-24 16:17:05'),
(3, 10, 16, 3, 'good ', '2024-01-24 16:28:56'),
(4, 10, 16, 2, 'good product', '2024-01-24 16:29:13'),
(5, 10, 16, 3, 'wonderfull', '2024-01-24 16:29:33'),
(6, 29, 16, 4, 'goood', '2024-01-25 13:40:03'),
(7, 11, 16, 3, 'nice\r\n', '2024-01-28 04:58:16'),
(8, 11, 16, 3, 'good product', '2024-01-28 14:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `shops_table`
--

CREATE TABLE `shops_table` (
  `shop_id` int(11) NOT NULL,
  `shopname` varchar(255) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_email` varchar(255) NOT NULL,
  `shop_password` varchar(255) NOT NULL,
  `shop_image` varchar(255) NOT NULL,
  `shop_address` varchar(255) NOT NULL,
  `shop_mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shops_table`
--

INSERT INTO `shops_table` (`shop_id`, `shopname`, `shop_name`, `shop_email`, `shop_password`, `shop_image`, `shop_address`, `shop_mobile`) VALUES
(2, 'Nuska', 'Nuska', 'Nuska@gmail.com', '$2y$10$z8fOucl9cFTR5pn28GxXk.f8Lpn.9Ebu8dp6BT7xmp1EHZeY8BqJW', 'lab.png', 'love,lane', '077232323'),
(3, 'nj', 'nj', 'nj@gmail.com', '$2y$10$MVm9hoCglh1lWDc/H4debuDsk8IAaaAJlm8JEmkwuT.vOshirCHvC', 'lab.png', 'colombo', '075454545'),
(4, 'Raheem', 'Singer', 'Singer@gmail.com', '$2y$10$ltCi7gvhwSdEa2vxPP2AS.1k5dPQ8.5Sia.9t7zC3vf0tKgtoA1vq', '12.jpg', 'Colombo', '0755317941');

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_address`, `user_mobile`) VALUES
(1, 'Raheem', 'Raheem@gmail.com', '$2y$10$VuvXwSZk/kIVvsS59AJ81e6pqcv5hgz6QYCmurnUcKsq1h.771/tC', '29.jpg', 'love lane', '1234'),
(6, 'praveen', 'praveen@gamil.com', '$2y$10$vJ.44e1edxvLPqoP9vAGmOMA8J4dk5y9zmN98n/AJ4obTJIJWn2Um', 'lab.jpg', 'walishara', '075421431'),
(7, 'hufain', 'hufain@gmail.com', '$2y$10$OC/eMAu./hKPIE9Cx9vgIOKBASqaH9BGpul.EJDDsKsI/ZPqgmRYC', 'lab.jpg', 'puttalam', '0759473775'),
(8, 'Raheem1', 'Raheem1@gmail.com', '$2y$10$YQWkdgZko8Ka3MKuw1.JF.xMyRuCLvQa0eX6Dw7pj80cTajp.rDRW', 'import.jpg', 'love,lane', '0754444'),
(9, 'NuskaR', 'NuskaR@gmail.com', '$2y$10$5s/EqrlGkEa7bYE2Aip7.unMLceYWL9IYI2KvpFK8dObtYytjl3BG', 'lab.jpg', 'love lane', '12345'),
(10, 'NJ', 'Nj@gmail.com', '$2y$10$qfMZVF9zDui7X7EQ93Hjpez8YtD12m8roLs1TSW7pCnp1CCVXdCv2', '29.jpg', 'Love lane', '0755317941'),
(11, 'PraveenDani', 'Praveen.sv98@gmail.com', '$2y$10$xVqMcrXELlXrx5KN6nqjfuF4WVYaTk/L2LqWIvIsotGYFRj9yjPWe', 'co1.jpg', 'Ragama', '0754427171'),
(13, 'Ayaana', 'Ayaana@gmail.com', '$2y$10$u4hURevB0mZsd4rYovBlUeR9Wa9.MU3ZhGj44vStw7diJgaxwlcRm', '12.jpg', 'lovelane', '075'),
(14, 'Nuska1', 'Nuska1@gmail.com', '$2y$10$bKOxCUeQE.C02qXOVQKKlOMvARmMs4fQ8bnReeP8j48zJzbrfKRKW', '29.jpg', 'love', '075'),
(15, 'nadeesha', 'nadeesha@gmail.com', '$2y$10$iA7tZ3yZPWTu25zY.dziNO//1FUKgcv4lgAnb5yqULH3zO3bO7u52', '12.jpg', 'fghj', '12345678'),
(16, 'Nuska', 'abdulraheemrn2014@gmail.com', '$2y$10$4hrjV2lh72fBBUBLtyOLc.oOLj1nVEKQdaMnQ3YQYFRxPREt2xBm2', '', 'love lane', '12345'),
(17, 'Abi', 'abi@gmail.com', '$2y$10$cfeklSdW9DEYNFuoTZp.s.1zeKuOObUSNtzEWYJfbmVvEDCRD7cfm', '12.jpg', '1234', '075'),
(18, 'raheem4', 'r@gmail.com', '$2y$10$n8rz3TG5BPqUhU2/BI.9R.R/x/LoFVaj1plkOA4F5iuTDFkus9ZDS', '4.png', 'love', '0755317941');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(4, 2, 2500, 1376553436, 1, '2024-01-02 09:11:59', 'pending'),
(5, 3, 2200, 1017555682, 1, '2024-01-02 09:18:47', 'pending'),
(6, 2, 2500, 1510897248, 1, '2024-01-02 22:50:00', 'pending'),
(7, 4, 7500, 573972359, 1, '2024-01-02 22:50:50', 'pending'),
(8, 4, 103200, 280786301, 3, '2024-01-03 04:57:06', 'pending'),
(9, 5, 2500, 867027545, 1, '2024-01-03 05:17:52', 'Complete'),
(10, 1, 1200, 1751249192, 1, '2024-01-06 10:07:57', 'Complete'),
(11, 1, 386200, 1187015798, 2, '2024-01-07 12:06:40', 'pending'),
(12, 1, 485000, 1762786130, 2, '2024-01-07 13:57:37', 'pending'),
(13, 1, 0, 62906879, 0, '2024-01-09 09:21:00', 'Complete'),
(14, 7, 387200, 255478776, 2, '2024-01-07 14:42:38', 'pending'),
(16, 1, 0, 1661884408, 0, '2024-01-09 09:33:35', 'pending'),
(17, 1, 0, 670450377, 0, '2024-01-10 02:32:30', 'pending'),
(18, 2, 0, 635109510, 0, '2024-01-13 17:24:02', 'pending'),
(19, 2, 0, 1287002022, 0, '2024-01-13 17:46:34', 'pending'),
(20, 2, 0, 569298484, 0, '2024-01-14 07:12:15', 'pending'),
(21, 2, 0, 789441100, 0, '2024-01-14 07:58:52', 'pending'),
(22, 2, 0, 1345091723, 0, '2024-01-16 09:15:18', 'pending'),
(23, 1, 0, 1228626613, 0, '2024-01-19 03:43:47', 'pending'),
(24, 10, 0, 1695014798, 0, '2024-01-19 04:25:16', 'pending'),
(25, 10, 0, 1082687219, 0, '2024-01-19 04:30:13', 'pending'),
(26, 2, 0, 1981431335, 0, '2024-01-20 06:18:49', 'pending'),
(27, 2, 0, 1628494232, 0, '2024-01-20 06:28:45', 'pending'),
(28, 2, 0, 1190472765, 0, '2024-01-20 07:01:48', 'pending'),
(29, 11, 0, 927278939, 0, '2024-01-20 07:33:41', 'pending'),
(30, 2, 0, 54054552, 0, '2024-01-20 13:09:14', 'pending'),
(31, 2, 0, 17510715, 0, '2024-01-20 13:18:51', 'pending'),
(32, 2, 0, 2121956579, 0, '2024-01-20 13:20:09', 'pending'),
(33, 2, 0, 364696917, 0, '2024-01-20 15:13:50', 'pending'),
(34, 2, 0, 50724511, 0, '2024-01-20 15:18:46', 'pending'),
(35, 12, 0, 845939245, 0, '2024-01-20 15:24:02', 'pending'),
(36, 12, 0, 1781519749, 0, '2024-01-20 15:30:07', 'pending'),
(37, 12, 0, 1409332171, 0, '2024-01-20 15:31:05', 'pending'),
(38, 2, 0, 1909670613, 0, '2024-01-21 08:35:38', 'pending'),
(39, 2, 0, 1047979561, 0, '2024-01-21 08:41:18', 'pending'),
(40, 2, 0, 556417922, 0, '2024-01-21 08:42:02', 'pending'),
(41, 12, 0, 1005557793, 0, '2024-01-21 09:02:20', 'pending'),
(42, 12, 0, 1040013823, 0, '2024-01-21 09:02:54', 'pending'),
(43, 2, 0, 833240895, 0, '2024-01-21 09:09:05', 'pending'),
(44, 10, 0, 1479157076, 0, '2024-01-21 09:11:38', 'pending'),
(45, 2, 0, 1407174167, 0, '2024-01-21 12:11:20', 'pending'),
(46, 2, 0, 1056987756, 0, '2024-01-21 12:13:45', 'pending'),
(47, 2, 0, 33188726, 0, '2024-01-21 14:00:29', 'pending'),
(48, 10, 0, 640065575, 0, '2024-01-22 05:12:29', 'pending'),
(49, 2, 0, 1060839004, 0, '2024-01-22 13:32:20', 'pending'),
(50, 2, 0, 1594930028, 0, '2024-01-22 13:41:17', 'pending'),
(51, 2, 0, 1125959340, 0, '2024-01-22 14:06:54', 'pending'),
(52, 16, 0, 584695522, 0, '2024-01-22 15:17:59', 'pending'),
(53, 16, 0, 610443587, 0, '2024-01-22 15:52:53', 'pending'),
(54, 16, 0, 1262851279, 0, '2024-01-22 16:17:19', 'pending'),
(55, 16, 0, 1325222147, 0, '2024-01-22 16:26:02', 'pending'),
(56, 16, 0, 1367336790, 0, '2024-01-22 16:38:15', 'pending'),
(57, 16, 0, 873916618, 0, '2024-01-23 05:08:09', 'pending'),
(58, 16, 0, 337710762, 0, '2024-01-23 17:31:17', 'pending'),
(59, 16, 0, 2122609377, 0, '2024-01-23 17:49:36', 'pending'),
(60, 16, 0, 861161184, 0, '2024-01-23 19:22:55', 'pending'),
(61, 19, 0, 1538189301, 0, '2024-01-24 04:06:34', 'pending'),
(62, 19, 0, 447628256, 0, '2024-01-24 04:10:22', 'pending'),
(63, 16, 0, 1673976003, 0, '2024-01-24 06:49:41', 'pending'),
(64, 1, 0, 879542857, 0, '2024-01-24 16:16:34', 'pending'),
(65, 16, 0, 1070695320, 0, '2024-01-25 13:16:12', 'pending'),
(66, 16, 0, 1026749475, 0, '2024-01-25 13:34:40', 'pending'),
(67, 16, 0, 173594729, 0, '2024-01-25 13:39:32', 'pending'),
(68, 16, 0, 1950188069, 0, '2024-01-25 13:57:17', 'pending'),
(69, 16, 0, 1002306132, 0, '2024-01-25 14:11:23', 'pending'),
(70, 16, 0, 787615359, 0, '2024-01-25 14:13:13', 'pending'),
(71, 16, 0, 1530615559, 0, '2024-01-28 04:42:59', 'pending'),
(72, 16, 0, 2085275061, 0, '2024-01-28 04:56:48', 'pending'),
(73, 16, 0, 1297196676, 0, '2024-01-28 06:02:55', 'pending'),
(74, 16, 0, 446488646, 0, '2024-01-28 07:11:54', 'pending'),
(75, 16, 0, 689290426, 0, '2024-01-28 07:32:45', 'pending'),
(76, 16, 0, 352750257, 0, '2024-01-28 07:39:21', 'pending'),
(77, 16, 0, 2085072501, 0, '2024-01-28 07:45:37', 'pending'),
(78, 16, 0, 322064860, 0, '2024-01-28 07:49:55', 'pending'),
(79, 16, 0, 97145399, 0, '2024-01-28 08:53:45', 'pending'),
(80, 16, 0, 1566188810, 0, '2024-01-28 09:41:22', 'pending'),
(81, 16, 0, 1054806237, 0, '2024-01-28 09:57:47', 'pending'),
(82, 16, 0, 1561473964, 0, '2024-01-28 14:38:49', 'pending'),
(83, 16, 0, 1610908676, 0, '2024-01-28 14:41:08', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`, `user_email`) VALUES
(1, 6, '110594794', 2200, 'online', '2023-12-28 14:50:10', ''),
(2, 6, '110594794', 2200, 'online', '2023-12-28 14:57:17', ''),
(3, 7, '687823192', 1000, 'online', '2023-12-28 15:01:28', ''),
(4, 9, '867027545', 2500, 'online', '2024-01-03 05:17:52', ''),
(5, 10, '1751249192', 1200, 'online', '2024-01-06 10:07:56', ''),
(6, 13, '62906879', 0, 'online', '2024-01-09 09:21:00', ''),
(7, 13, '62906879', 0, 'online', '2024-01-09 09:21:12', ''),
(8, 19, '0', 2400, 'offline', '2024-01-13 17:42:18', ''),
(9, 18, '0', 1925000, 'cash on delivery', '2024-01-13 17:43:32', ''),
(14, 26, '0', 224000, 'offline', '2024-01-16 09:16:08', ''),
(18, 33, 'INV455084', 12000, 'offline', '2024-01-20 07:28:19', ''),
(19, 34, 'INV389830', 485000, 'offline', '2024-01-20 07:35:18', ''),
(20, 38, 'INV550429', 489200, 'online', '2024-01-20 15:43:54', ''),
(21, 45, 'INV108759', 1200, 'cash on delivery', '2024-01-21 12:27:11', ''),
(22, 56, 'INV898955', 6600, 'offline', '2024-01-22 05:14:20', ''),
(23, 63, 'INV445524', 160000, 'cash on delivery', '2024-01-22 16:26:22', ''),
(24, 74, 'INV152474', 372000, 'online', '2024-01-24 04:07:59', ''),
(25, 76, 'INV863786', 18399, 'offline', '2024-01-24 06:49:53', ''),
(26, 80, 'INV198296', 1259, 'offline', '2024-01-25 13:39:43', ''),
(27, 83, 'INV413761', 144000, 'offline', '2024-01-28 04:55:48', ''),
(28, 84, 'INV532412', 4500, 'online', '2024-01-28 04:57:54', ''),
(29, 87, 'INV306580', 100000, 'online', '2024-01-28 07:33:49', ''),
(30, 90, 'INV383515', 1500, 'offline', '2024-01-28 07:51:36', ''),
(31, 94, 'INV541436', 6000, 'online', '2024-01-28 14:52:29', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_produc`
--

CREATE TABLE `user_produc` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `product_mode` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_produc`
--

INSERT INTO `user_produc` (`id`, `order_id`, `invoice_number`, `amount`, `product_mode`, `user_email`, `user_id`) VALUES
(0, 93, 'INV744465', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(0, 93, 'INV744465', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(0, 93, 'INV744465', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16);

-- --------------------------------------------------------

--
-- Table structure for table `user_product`
--

CREATE TABLE `user_product` (
  `acc_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `product_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_email` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_product`
--

INSERT INTO `user_product` (`acc_id`, `order_id`, `invoice_number`, `amount`, `product_mode`, `date`, `user_email`, `user_id`) VALUES
(0, 0, '', 0, 'Processs', '2024-01-28 09:15:49', 'abdulraheemrn2014@gmail.com', 0),
(0, 91, 'INV675316', 1500, 'Accepted', '2024-01-28 09:37:51', 'abdulraheemrn2014@gmail.com', 16),
(0, 91, 'INV675316', 1500, 'Accepted', '2024-01-28 09:37:51', 'abdulraheemrn2014@gmail.com', 16),
(0, 91, 'INV675316', 1500, 'Accepted', '2024-01-28 09:37:51', 'abdulraheemrn2014@gmail.com', 16),
(0, 91, 'INV675316', 1500, 'Accepted', '2024-01-28 09:37:51', 'abdulraheemrn2014@gmail.com', 16),
(0, 91, 'INV675316', 1500, 'Accepted', '2024-01-28 09:37:51', 'abdulraheemrn2014@gmail.com', 16),
(0, 91, 'INV675316', 1500, 'Accepted', '2024-01-28 09:37:51', 'abdulraheemrn2014@gmail.com', 16),
(0, 92, 'INV669221', 1500, 'Accepted', '2024-01-28 10:47:55', '', 0),
(0, 93, 'INV744465', 1500, 'Processs', '2024-01-29 05:17:02', '', 0),
(0, 92, 'INV669221', 1500, 'Accepted', '2024-01-28 10:47:55', '', 0),
(0, 93, 'INV744465', 1500, 'Processs', '2024-01-29 05:17:02', '', 0),
(0, 94, 'INV541436', 6000, 'Accepted', '2024-01-28 14:50:53', '', 0),
(0, 95, 'INV729514', 1500, 'Reject', '2024-01-28 16:26:08', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_products`
--

CREATE TABLE `user_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `product_mode` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_products`
--

INSERT INTO `user_products` (`id`, `order_id`, `invoice_number`, `amount`, `product_mode`, `user_email`, `user_id`) VALUES
(1, 91, 'INV675316', '1500', 'Processs', 'abdulraheemrn2014@gmail.com', 16),
(2, 91, 'INV675316', '1500', 'Processs', 'abdulraheemrn2014@gmail.com', 16),
(3, 91, 'INV675316', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(4, 91, 'INV675316', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(5, 91, 'INV675316', '1500', 'Processs', 'abdulraheemrn2014@gmail.com', 16),
(6, 91, 'INV675316', '1500', 'Processs', 'abdulraheemrn2014@gmail.com', 16),
(7, 91, 'INV675316', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(8, 91, 'INV675316', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(9, 91, 'INV675316', '1500', 'Accepted', 'abdulraheemrn2014@gmail.com', 16),
(10, 91, 'INV675316', '1500', 'Accepted', 'abdulraheemrn2014@gmail.com', 16),
(11, 92, 'INV669221', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(12, 92, 'INV669221', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(13, 93, 'INV744465', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(14, 93, 'INV744465', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(15, 93, 'INV744465', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(16, 93, 'INV744465', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(17, 93, 'INV744465', '1500', 'Pending', 'abdulraheemrn2014@gmail.com', 16),
(18, 93, 'INV744465', '1500', 'Processs', 'abdulraheemrn2014@gmail.com', 16),
(19, 93, 'INV744465', '1500', 'Processs', 'abdulraheemrn2014@gmail.com', 16),
(20, 93, 'INV744465', '1500', 'Processs', 'abdulraheemrn2014@gmail.com', 16),
(21, 93, 'INV744465', '1500', 'Processs', 'abdulraheemrn2014@gmail.com', 16),
(22, 93, 'INV744465', '1500', 'Processs', 'abdulraheemrn2014@gmail.com', 16),
(23, 93, 'INV744465', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(24, 92, 'INV669221', '1500', 'Pending', 'abdulraheemrn2014@gmail.com', 16),
(25, 92, 'INV669221', '1500', 'Pending', 'abdulraheemrn2014@gmail.com', 16),
(26, 92, 'INV669221', '1500', 'Processs', 'abdulraheemrn2014@gmail.com', 16),
(27, 92, 'INV669221', '1500', 'Processs', 'abdulraheemrn2014@gmail.com', 16),
(28, 92, 'INV669221', '1500', 'Pending', 'abdulraheemrn2014@gmail.com', 16),
(29, 93, 'INV744465', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(30, 92, 'INV669221', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(31, 92, 'INV669221', '1500', 'Accepted', 'abdulraheemrn2014@gmail.com', 16),
(32, 93, 'INV744465', '1500', 'Pending', 'abdulraheemrn2014@gmail.com', 16),
(33, 93, 'INV744465', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(34, 94, 'INV541436', '6000', 'Shipping', 'nadeesha9917@gmail.com', 16),
(35, 94, 'INV541436', '6000', 'Accepted', 'nadeesha9917@gmail.com', 16),
(36, 95, 'INV729514', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(37, 95, 'INV729514', '1500', 'Reject', 'abdulraheemrn2014@gmail.com', 16),
(38, 93, 'INV744465', '1500', 'Shipping', 'abdulraheemrn2014@gmail.com', 16),
(39, 93, 'INV744465', '1500', 'Processs', 'abdulraheemrn2014@gmail.com', 16);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'NuskaRaheem', 'Nuska@gmail.com', '$2y$10$fgwUumu.LsW3av69.hyovedpvybC8KYsxuOx3fSP/AHgsZyYxsM66', '6.jpg', '::1', 'love lane', '12345'),
(8, 'Raheem', 'Rahem@gmail.com', '$2y$10$NqhqYi5l1cQ0Xlg23b32qOXDyWvf1qpIkW2izaJBHQYXwecqhtshC', '3.jpg', '::3', 'love', '12345'),
(9, 'NR', 'NR@gmail.com', '$2y$10$0IIjY4nBCpQYk91RF/3IO.1BzoW.7lQof9q.H6VQicI1N0MV4PL0O', '3.jpg', '::2', 'love', '12345'),
(10, 'Raheem4', 'Raheem4@gmail.com', '$2y$10$hYJD9sPoFaciielIYSvCyeacms9CdaTDEXT5dfliI68tLB..hAaDy', '3.jpg', '::1', 'love lane', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `wish_detail`
--

CREATE TABLE `wish_detail` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wish_detail`
--

INSERT INTO `wish_detail` (`product_id`, `user_id`) VALUES
(3, 10),
(3, 15),
(21, 16),
(8, 16),
(12, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins_table`
--
ALTER TABLE `admins_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `be_pay`
--
ALTER TABLE `be_pay`
  ADD PRIMARY KEY (`be_pay_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_pending`
--
ALTER TABLE `order_pending`
  ADD PRIMARY KEY (`order_pending_id`);

--
-- Indexes for table `placeorderdetails_table`
--
ALTER TABLE `placeorderdetails_table`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_detail`
--
ALTER TABLE `products_detail`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products_details`
--
ALTER TABLE `products_details`
  ADD PRIMARY KEY (`pro_de_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `shops_table`
--
ALTER TABLE `shops_table`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_products`
--
ALTER TABLE `user_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins_table`
--
ALTER TABLE `admins_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `be_pay`
--
ALTER TABLE `be_pay`
  MODIFY `be_pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_pending`
--
ALTER TABLE `order_pending`
  MODIFY `order_pending_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `placeorderdetails_table`
--
ALTER TABLE `placeorderdetails_table`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products_detail`
--
ALTER TABLE `products_detail`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `products_details`
--
ALTER TABLE `products_details`
  MODIFY `pro_de_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shops_table`
--
ALTER TABLE `shops_table`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_products`
--
ALTER TABLE `user_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
