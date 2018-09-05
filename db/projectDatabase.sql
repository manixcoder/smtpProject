-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 16, 2018 at 06:57 PM
-- Server version: 10.2.16-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DATABASEName`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminRating`
--

CREATE TABLE `adminRating` (
  `rating_id` int(11) NOT NULL,
  `rarting_byId` int(11) NOT NULL,
  `appRating` int(11) NOT NULL,
  `ratingComment` varchar(255) CHARACTER SET utf8 NOT NULL,
  `current_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_adderss`
--

CREATE TABLE `admin_adderss` (
  `adminAddress_id` int(11) NOT NULL,
  `city` varchar(30) CHARACTER SET utf8 NOT NULL,
  `area` varchar(100) CHARACTER SET utf8 NOT NULL,
  `areaArabic` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `times` varchar(25) CHARACTER SET utf8 NOT NULL COMMENT 'Pick up time',
  `pickup_date` time NOT NULL,
  `time_from` datetime NOT NULL,
  `time_to` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_adderss`
--

INSERT INTO `admin_adderss` (`adminAddress_id`, `city`, `area`, `areaArabic`, `times`, `pickup_date`, `time_from`, `time_to`) VALUES
(157, '1', 'SABA BASHA', 'سابا باشا', '', '00:00:00', '2018-04-05 01:00:00', '2018-04-05 02:00:00'),
(159, '1', 'SABA BASHA', 'سابا باشا', '', '00:00:00', '2018-04-11 04:00:00', '2018-04-11 05:10:00'),
(160, '1', 'SABA BASHA', 'سابا باشا', '', '00:00:00', '2018-04-05 13:00:00', '2018-04-05 14:00:00'),
(161, '1', 'SABA BASHA', 'سابا باشا', '', '00:00:00', '2018-04-05 03:00:00', '2018-04-05 04:00:00'),
(162, '1', 'SABA BASHA', 'سابا باشا', '', '00:00:00', '2018-04-05 03:30:00', '2018-04-05 03:45:00'),
(163, '1', 'SABA BASHA', 'سابا باشا', '', '00:00:00', '2018-04-11 17:00:00', '2018-04-11 18:00:00'),
(164, '1', 'smouha', 'سموحه', '', '00:00:00', '2018-04-11 01:00:00', '2018-04-11 02:00:00'),
(165, '1', 'SABA BASHA', 'سابا باشا', '', '00:00:00', '2018-04-11 18:00:00', '2018-04-11 19:00:00'),
(166, '1', 'SABA BASHA', 'سابا باشا', '', '00:00:00', '2018-04-11 21:00:00', '2018-04-11 22:00:00'),
(168, '1', 'SABA BASHA', 'سابا باشا', '', '00:00:00', '2018-04-11 15:00:00', '2018-04-11 16:00:00'),
(169, '1', 'smouha', 'سموحه', '', '00:00:00', '2018-05-01 05:00:00', '2018-05-01 06:00:00'),
(170, '1', 'SABA BASHA', 'سابا باشا', '', '00:00:00', '2018-04-11 20:00:00', '2018-04-11 21:00:00'),
(173, '1', 'SABA BASHA', 'سابا باشا', '', '00:00:00', '2018-04-11 18:30:00', '2018-04-11 18:59:00'),
(174, '1', 'SABA BASHA', 'سابا باشا', '', '00:00:00', '2018-04-11 13:00:00', '2018-04-11 13:59:00'),
(175, '1', 'SABA BASHA', 'سابا باشا', '', '00:00:00', '2018-04-11 14:30:00', '2018-04-11 14:59:00'),
(176, '1', 'SABA BASHA', 'سابا باشا', '', '00:00:00', '2018-04-11 17:30:00', '2018-04-11 17:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 NOT NULL,
  `contact_no` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `email`, `password`, `contact_no`) VALUES
(1, 'adminadmin', 'admin@gmail.com', '12345', '01002113700');

-- --------------------------------------------------------

--
-- Table structure for table `city_location`
--

CREATE TABLE `city_location` (
  `city_location_id` int(11) NOT NULL,
  `location_city_id` int(11) NOT NULL COMMENT 'this is city id',
  `area_location` varchar(100) CHARACTER SET utf8 NOT NULL,
  `areaArabic` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_location`
--

INSERT INTO `city_location` (`city_location_id`, `location_city_id`, `area_location`, `areaArabic`) VALUES
(1, 1, 'SABA BASHA', 'سابا باشا'),
(2, 1, 'smouha', 'سموحه');

-- --------------------------------------------------------

--
-- Table structure for table `contact_to_admin`
--

CREATE TABLE `contact_to_admin` (
  `id` int(10) NOT NULL,
  `c_user_id` int(10) NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `user_cur_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dsshboard`
--

CREATE TABLE `dsshboard` (
  `Id` int(10) NOT NULL,
  `location_Id` int(30) NOT NULL COMMENT 'city id',
  `category_id` int(30) NOT NULL COMMENT 'sub category id',
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_Id` int(10) NOT NULL,
  `noti_user_id` int(11) NOT NULL,
  `noti_promo_code` int(11) NOT NULL,
  `notification_text` text CHARACTER SET utf8 NOT NULL,
  `notification_arbicText` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `notification_type` varchar(10) CHARACTER SET utf8 NOT NULL,
  `notification_title` varchar(255) NOT NULL,
  `notification_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderImage`
--

CREATE TABLE `orderImage` (
  `AI_orderImageId` int(11) NOT NULL,
  `image_orderId` bigint(20) NOT NULL,
  `order_ImageName` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderImage`
--

INSERT INTO `orderImage` (`AI_orderImageId`, `image_orderId`, `order_ImageName`) VALUES
(1, 3, 'uploads/order/1525036657572112'),
(2, 3, 'uploads/order/1525036657332203'),
(3, 3, 'uploads/order/152503665780809'),
(4, 9, 'uploads/order/1525154352509451'),
(5, 9, 'uploads/order/152515435281339'),
(6, 9, 'uploads/order/15251543524269'),
(7, 67, 'uploads/order/1525943404456089'),
(8, 67, 'uploads/order/1525943404245571'),
(9, 72, 'uploads/order/1526038711830688'),
(10, 72, 'uploads/order/1526038711238189'),
(11, 72, 'uploads/order/1526038711345772'),
(12, 77, 'uploads/order/152664622667843'),
(13, 77, 'uploads/order/1526646226686471'),
(14, 77, 'uploads/order/1526646226768918'),
(15, 78, 'uploads/order/1526646425871955');

-- --------------------------------------------------------

--
-- Table structure for table `orderTracking`
--

CREATE TABLE `orderTracking` (
  `tracking_id` int(11) NOT NULL,
  `tracking_orderId` int(11) NOT NULL,
  `orderStatus_text` text CHARACTER SET utf8 NOT NULL,
  `orderStatus_date` varchar(150) CHARACTER SET utf8 NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `place_message`
--

CREATE TABLE `place_message` (
  `message_Id` int(11) NOT NULL,
  `admin_place_message` varchar(100) NOT NULL,
  `adminPlaceMessage` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place_message`
--

INSERT INTO `place_message` (`message_Id`, `admin_place_message`, `adminPlaceMessage`) VALUES
(1, 'we will call you to confirm the time of pickup', 'سيتم التواصل معكم لتأكيد موعد الاستلام');

-- --------------------------------------------------------

--
-- Table structure for table `slider_image`
--

CREATE TABLE `slider_image` (
  `Id` int(11) NOT NULL,
  `slider_image` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_image`
--

INSERT INTO `slider_image` (`Id`, `slider_image`) VALUES
(48, 'uploads/slider_image/9056989729339746_10215626517514545_4148278254282735616_n.jpg'),
(50, 'uploads/slider_image/53571494929257887_10215626517754551_1297727314833965056_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Static_Category`
--

CREATE TABLE `Static_Category` (
  `cat_id` int(11) NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `categoryNameArabic` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Static_Category`
--

INSERT INTO `Static_Category` (`cat_id`, `category_name`, `categoryNameArabic`) VALUES
(65, ' IRON  steam', 'كي  بالبخار'),
(66, 'dry cleaning', 'غسيل بالبخار');

-- --------------------------------------------------------

--
-- Table structure for table `static_city`
--

CREATE TABLE `static_city` (
  `AI_cityId` int(11) NOT NULL,
  `city_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cityNameArabic` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `static_city`
--

INSERT INTO `static_city` (`AI_cityId`, `city_name`, `cityNameArabic`) VALUES
(1, 'Alexandria', 'الإسكندرية'),
(2, 'Asyut', 'أسيوط'),
(3, 'Aswan', 'أسوان'),
(4, 'Beheira', 'البحيرة'),
(5, 'Bani Sweif', 'بني سويف'),
(6, 'Cairo', 'القاهرة'),
(7, 'Dakahlia', 'الدقهلية'),
(8, 'Giza', 'الجيزة'),
(9, 'Damietta', 'دمياط'),
(10, 'Fayoum', 'الفيوم'),
(11, 'Gharbia', 'الغربية'),
(12, 'Ismailia', 'الإسماعيلية'),
(13, 'Kafr El Sheikh', 'كفر الشيخ'),
(14, 'Matrouh', 'مطروح'),
(15, 'Menia', 'المنيا'),
(16, 'North Sinai', 'شمال سيناء'),
(17, 'Monoufia', 'المنوفية'),
(18, 'new Valley', 'الوادي الجديد'),
(19, 'Port Said', 'بورسعيد'),
(20, 'Qalyubia', 'القليوبية'),
(21, 'Qena', 'قنا'),
(22, 'Red Sea', 'البحر الاحمر'),
(23, 'Sharqia', 'الشرقية'),
(24, 'Sohag', 'سوهاج'),
(25, 'South of Sinaa', 'جنوب سيناء'),
(26, 'Suez', 'السويس'),
(27, 'Luxor', 'الأقصر');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `s_Id` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `sub_Category` varchar(50) CHARACTER SET utf8 NOT NULL,
  `subCategoryArabic` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `category_image` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `badge` int(11) NOT NULL,
  `selectedLanguage` enum('0','1') NOT NULL COMMENT '0 is english 1 is arbic',
  `device_type` enum('1','2') NOT NULL,
  `device_token` varchar(256) CHARACTER SET utf8 NOT NULL,
  `profile_image` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user_status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `email`, `mobile`, `password`, `badge`, `selectedLanguage`, `device_type`, `device_token`, `profile_image`, `user_status`) VALUES
(1, 'hsh', 'ios', 'ha@kk.com', '24646494949', 'qwerty', 0, '1', '2', '271c038355ffc2ae37ac75d6b0c6796ccec0e11b12a9618cc42bb15261d4a8e4', 'uploads/userProfile/noprifile.png', '1'),
(2, 'Farida', 'ios', 'farida@gmail.com', '01001679464', '123456', 0, '0', '2', '1254e5367ad7572935110012496a4eef845bc32a593c700a026226744b77c2d8', 'uploads/userProfile/noprifile.png', '1'),
(3, 'Ratha', 'ios', 'amar@a.com', '12345678909', '123456', 0, '1', '2', '1d184459a942828f4ffe8d71af70a80c206c923ba4eeb19b2cf8dfbdf1f75edb', 'uploads/userProfile/noprifile.png', '1'),
(4, 'as', 'Android', 'as@j.com', '52535355565', 'qwerty', 1, '0', '1', 'key', 'uploads/userProfile/noprifile.png', '1'),
(5, 'BHupi', 'Android', 'test@gmail.com', '12948738463', 'qwerty', 3, '0', '1', 'fNyOpxRM-O8:APA91bEobmodwrI2yn6a7vKUXNggPsWQ0aKRxPRt-rJN8jjtNwvaoH5mVxBnoLgQC8nZ-J9mylY0VDZGtwtpPo1n7tesaSmQvhOJiXeBSet0P8tycA_FpKnv0VdxfFp0hnShGvoa6tGB', 'uploads/userProfile/noprifile.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_adderss`
--

CREATE TABLE `user_adderss` (
  `userAddress_id` int(10) NOT NULL,
  `address_userId` int(11) NOT NULL,
  `selected_addressId` int(11) NOT NULL COMMENT 'admin address id',
  `street_address` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bulding_number` varchar(256) CHARACTER SET utf8 NOT NULL,
  `floor_number` varchar(256) CHARACTER SET utf8 NOT NULL,
  `flat_number` varchar(256) CHARACTER SET utf8 NOT NULL,
  `user_adderss_status` enum('0','1') NOT NULL COMMENT '1 is delete by user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(11) NOT NULL,
  `order_userId` int(11) NOT NULL,
  `product_id` text NOT NULL,
  `address_id` int(11) NOT NULL COMMENT 'user address id',
  `product_quantity` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `specialNote` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `order_pickupTime` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `order_promoCode` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `total_amount` float NOT NULL,
  `order_pickupDate` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `is_completed` enum('0','1') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `languageType` varchar(150) NOT NULL,
  `base_price` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product_sub_Category` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `productSubArbicCategory` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product_image` text CHARACTER SET utf8 NOT NULL,
  `area` varchar(255) CHARACTER SET utf8 NOT NULL,
  `categoryId` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `city_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `discount_promoCode` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `current_date_time` datetime NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_adderss` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_bulding_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_floor_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_flat_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_promoCode`
--

CREATE TABLE `user_promoCode` (
  `promoCode_id` int(11) NOT NULL,
  `pc_assignTo` int(11) NOT NULL,
  `promoCode` varchar(150) CHARACTER SET utf8 NOT NULL,
  `promo_discount` int(11) NOT NULL,
  `expireDate` varchar(150) CHARACTER SET utf8 NOT NULL,
  `is_deactive` enum('0','1') NOT NULL,
  `promo_type` enum('private','public') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminRating`
--
ALTER TABLE `adminRating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `rarting_byId` (`rarting_byId`);

--
-- Indexes for table `admin_adderss`
--
ALTER TABLE `admin_adderss`
  ADD PRIMARY KEY (`adminAddress_id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_location`
--
ALTER TABLE `city_location`
  ADD PRIMARY KEY (`city_location_id`),
  ADD KEY `location_city_id` (`location_city_id`);

--
-- Indexes for table `contact_to_admin`
--
ALTER TABLE `contact_to_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_user_id` (`c_user_id`);

--
-- Indexes for table `dsshboard`
--
ALTER TABLE `dsshboard`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `location_Id` (`location_Id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_Id`),
  ADD KEY `notificationDel` (`noti_user_id`),
  ADD KEY `notificationDel1` (`noti_promo_code`);

--
-- Indexes for table `orderImage`
--
ALTER TABLE `orderImage`
  ADD PRIMARY KEY (`AI_orderImageId`);

--
-- Indexes for table `orderTracking`
--
ALTER TABLE `orderTracking`
  ADD PRIMARY KEY (`tracking_id`),
  ADD KEY `tracking_orderId` (`tracking_orderId`);

--
-- Indexes for table `place_message`
--
ALTER TABLE `place_message`
  ADD PRIMARY KEY (`message_Id`);

--
-- Indexes for table `slider_image`
--
ALTER TABLE `slider_image`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Static_Category`
--
ALTER TABLE `Static_Category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `static_city`
--
ALTER TABLE `static_city`
  ADD PRIMARY KEY (`AI_cityId`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`s_Id`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_adderss`
--
ALTER TABLE `user_adderss`
  ADD PRIMARY KEY (`userAddress_id`),
  ADD KEY `address_userId` (`address_userId`),
  ADD KEY `selected_addressId` (`selected_addressId`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_userId` (`order_userId`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `user_promoCode`
--
ALTER TABLE `user_promoCode`
  ADD PRIMARY KEY (`promoCode_id`),
  ADD KEY `pc_assignTo` (`pc_assignTo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminRating`
--
ALTER TABLE `adminRating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_adderss`
--
ALTER TABLE `admin_adderss`
  MODIFY `adminAddress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `city_location`
--
ALTER TABLE `city_location`
  MODIFY `city_location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_to_admin`
--
ALTER TABLE `contact_to_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dsshboard`
--
ALTER TABLE `dsshboard`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderImage`
--
ALTER TABLE `orderImage`
  MODIFY `AI_orderImageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orderTracking`
--
ALTER TABLE `orderTracking`
  MODIFY `tracking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `place_message`
--
ALTER TABLE `place_message`
  MODIFY `message_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider_image`
--
ALTER TABLE `slider_image`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `Static_Category`
--
ALTER TABLE `Static_Category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `static_city`
--
ALTER TABLE `static_city`
  MODIFY `AI_cityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `s_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_adderss`
--
ALTER TABLE `user_adderss`
  MODIFY `userAddress_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_promoCode`
--
ALTER TABLE `user_promoCode`
  MODIFY `promoCode_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminRating`
--
ALTER TABLE `adminRating`
  ADD CONSTRAINT `adminRatingDel` FOREIGN KEY (`rarting_byId`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city_location`
--
ALTER TABLE `city_location`
  ADD CONSTRAINT `city_locationDel` FOREIGN KEY (`city_location_id`) REFERENCES `static_city` (`AI_cityId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact_to_admin`
--
ALTER TABLE `contact_to_admin`
  ADD CONSTRAINT `contact_to_adminDel` FOREIGN KEY (`c_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dsshboard`
--
ALTER TABLE `dsshboard`
  ADD CONSTRAINT `dsshboardDel` FOREIGN KEY (`category_id`) REFERENCES `Static_Category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dsshboard_ibfk_1` FOREIGN KEY (`location_Id`) REFERENCES `static_city` (`AI_cityId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notificationDel` FOREIGN KEY (`noti_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notificationDel1` FOREIGN KEY (`noti_promo_code`) REFERENCES `user_promoCode` (`promoCode_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderTracking`
--
ALTER TABLE `orderTracking`
  ADD CONSTRAINT `orderTrackingDel` FOREIGN KEY (`tracking_orderId`) REFERENCES `user_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_categoryDel` FOREIGN KEY (`categoryId`) REFERENCES `Static_Category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_adderss`
--
ALTER TABLE `user_adderss`
  ADD CONSTRAINT `user_adderssDel` FOREIGN KEY (`address_userId`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_adderssDel1` FOREIGN KEY (`userAddress_id`) REFERENCES `admin_adderss` (`adminAddress_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `user_orderDel` FOREIGN KEY (`order_userId`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_orderDel1` FOREIGN KEY (`address_id`) REFERENCES `user_adderss` (`userAddress_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_promoCode`
--
ALTER TABLE `user_promoCode`
  ADD CONSTRAINT `user_promoCodeDel` FOREIGN KEY (`pc_assignTo`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
