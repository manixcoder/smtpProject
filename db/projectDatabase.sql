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
(1, '1', 'SABA BASHA', 'سابا باشا', '', '00:00:00', '2018-04-05 01:00:00', '2018-04-05 02:00:00');

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
(1, 3, 'uploads/order/1525036657572112');

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
(48, 'uploads/slider_image/9056989729339746_10215626517514545_4148278254282735616_n.jpg');

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
(65, ' steam', '');

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
(1, 'Alexandria', 'الإسكندرية');

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
(1, 'hsh', 'ios', 'ha@kk.com', '24646494949', 'qwerty', 0, '1', '2', '271c038355ffc2ae37ac75d6b0c6796ccec0e11b12a9618cc42bb15261d4a8e4', 'uploads/userProfile/noprifile.png', '1');

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
