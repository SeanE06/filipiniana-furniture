-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 06:34 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filfurnituredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblattributes`
--

CREATE TABLE `tblattributes` (
  `attributeID` int(11) NOT NULL,
  `attributeName` varchar(150) CHARACTER SET latin1 NOT NULL,
  `attributeStatus` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblattributes`
--

INSERT INTO `tblattributes` (`attributeID`, `attributeName`, `attributeStatus`) VALUES
(8, 'Size', 'Archived'),
(9, 'Color', 'Active'),
(10, 'Type', 'Active'),
(11, 'Weight', 'Active'),
(12, 'Dimension', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblattribute_measure`
--

CREATE TABLE `tblattribute_measure` (
  `amID` int(11) NOT NULL,
  `attributeID` int(11) NOT NULL,
  `uncategoryID` int(11) NOT NULL,
  `amStatus` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblattribute_measure`
--

INSERT INTO `tblattribute_measure` (`amID`, `attributeID`, `uncategoryID`, `amStatus`) VALUES
(8, 8, 11, 'Active'),
(9, 9, 0, 'Active'),
(10, 10, 0, 'Active'),
(11, 11, 14, 'Active'),
(12, 12, 11, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblbank_accounts`
--

CREATE TABLE `tblbank_accounts` (
  `accountID` int(11) NOT NULL,
  `accountName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `accountNumber` varchar(50) CHARACTER SET utf8 NOT NULL,
  `accountStatus` varchar(45) CHARACTER SET utf8 NOT NULL,
  `accountRemarks` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `bankLink` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblbank_accounts`
--

INSERT INTO `tblbank_accounts` (`accountID`, `accountName`, `accountNumber`, `accountStatus`, `accountRemarks`, `bankLink`) VALUES
(1, 'Aira Barrameda', '201402207MN0', 'Active', 'Landbank', ''),
(2, 'Sean Lester Efa', '201728127NB0', 'Active', 'BDO', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblbranches`
--

CREATE TABLE `tblbranches` (
  `branchID` int(11) NOT NULL,
  `branchLocation` varchar(45) CHARACTER SET utf8 NOT NULL,
  `branchAddress` varchar(450) CHARACTER SET utf8 NOT NULL,
  `branchRemarks` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `branchStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblbranches`
--

INSERT INTO `tblbranches` (`branchID`, `branchLocation`, `branchAddress`, `branchRemarks`, `branchStatus`) VALUES
(1, 'Bacoor', 'Talaba II, Bacoor Cavite', NULL, 'Listed'),
(2, 'Silang', 'Silangan, Silang Cavite', NULL, 'Listed');

-- --------------------------------------------------------

--
-- Table structure for table `tblcheck_details`
--

CREATE TABLE `tblcheck_details` (
  `check_detailsID` int(11) NOT NULL,
  `p_detailsID` int(11) NOT NULL,
  `checkNumber` int(11) NOT NULL,
  `checkAmount` double NOT NULL,
  `checkRemarks` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblcheck_details`
--

INSERT INTO `tblcheck_details` (`check_detailsID`, `p_detailsID`, `checkNumber`, `checkAmount`, `checkRemarks`) VALUES
(1, 7, 32232, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany_info`
--

CREATE TABLE `tblcompany_info` (
  `comp_recID` int(11) NOT NULL,
  `comp_logo` varchar(450) CHARACTER SET latin1 NOT NULL,
  `comp_name` varchar(150) CHARACTER SET latin1 NOT NULL,
  `comp_num` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `comp_email` varchar(45) CHARACTER SET latin1 NOT NULL,
  `comp_address` varchar(150) CHARACTER SET latin1 NOT NULL,
  `comp_about` varchar(450) CHARACTER SET latin1 DEFAULT NULL,
  `comp_emailPass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblcompany_info`
--

INSERT INTO `tblcompany_info` (`comp_recID`, `comp_logo`, `comp_name`, `comp_num`, `comp_email`, `comp_address`, `comp_about`, `comp_emailPass`) VALUES
(1, '2017-10-161508157715.png', 'Filipiniana Furnitures', '+63 (281) 239-8172', 'filipiniana_furn@gmail.com', 'Aguinaldo Hi-way, Talaba II, Bacoor, Cavite', 'A furniture shop', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `customerID` int(11) NOT NULL,
  `customerFirstName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `customerMiddleName` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `customerLastName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `customerAddress` varchar(100) CHARACTER SET utf8 NOT NULL,
  `customerContactNum` varchar(45) CHARACTER SET utf8 NOT NULL,
  `customerEmail` varchar(80) CHARACTER SET utf8 NOT NULL,
  `customerDP` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `customerNewsletter` int(11) NOT NULL,
  `customerStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`customerID`, `customerFirstName`, `customerMiddleName`, `customerLastName`, `customerAddress`, `customerContactNum`, `customerEmail`, `customerDP`, `customerNewsletter`, `customerStatus`) VALUES
(18, 'Cyreil Neil', '', 'Basilio', '#123 Nakakaloka Street Parang awa', '09876542572', 'cyreilneil@gmail.com', '', 0, ''),
(19, 'Aira', 'Coronado', 'Coronado', '#123 Kagawad Street Batasan Hills Quezon City', '09994145004', 'hongkaira@gmail.com', '', 0, 'active'),
(20, 'Mark Angelo', 'Barrameda', 'Coronado', '#62 Resolution Street Batasan Hills Quezon CIty', '09091543726', 'angelong123@yahoo.com', '', 0, 'Active'),
(21, 'Rhodora', 'Barrameda', 'Coronado', '3E Adult Ward PHC Quezon City', '+63 (921) 698-2449', 'rhodoramabr@yahoo.com', '', 0, 'Active'),
(22, 'Rhodora', 'Barrameda', 'Coronado', '3E Adult Ward PHC Quezon City', '+63 (921) 698-2449', 'rhodoramabr@yahoo.com', '', 0, 'Active'),
(23, 'Donita', 'Rose', 'Aber', '#1234 Anuna Street BHQC', '+63 (930) 678-2267', 'anunadonita@yahoo.com', '', 0, 'Active'),
(24, 'Gillian May', 'Piloton', 'Anyayahan', '#1234 Alton Street BHQC', '+63 (999) 516-9790', 'gilanyapilksoo@gmail.com', '', 0, 'Active'),
(25, 'Zyrnn Joice', 'Lasay', 'Tibre', '#1234 Saret Street BHQC', '+63 (099) 999-9999', 'zytibs@gmail.com', '', 0, 'Active'),
(26, 'Angelu', 'Balicuatro', 'Atienza', '#1234 One Way Street BHQC', '+63 (977) 546-7173', 'angeluat@gmail.com', '', 0, 'Active'),
(27, 'Shaira', 'Joy', 'Flores', '#1234 Bagong Silangan Veteran QC', '+63 (738) 138-7219', 'shairajhoy@gmail.com', '', 0, 'Active'),
(28, 'Sheyne', 'Smth', 'Laristan', '#1234 Somewhere Street Brgy. Litex BHQC', '+63 (967) 136-7192', 'sheynelaristan@gmail.com', '', 0, 'Active'),
(29, 'Roselyn', 'M', 'Melgar', '#1234 Taas na Street BHQC', '+63 (972) 713-8731', 'binastedsikuya@gmail.com', '', 0, 'Active'),
(30, 'Gendy', 'Lopez', 'Ma', '329 San jose st. buenlag east mangaldan, pangasinan', '+63 (935) 366-7068', 'gendylopez08@gmail.com', '', 0, 'Active'),
(31, 'Maria', 'Leonora', 'Theresa', '#62 Resolution Street Batasan Hills Quezon City', '09726827318', 'hongkaira@gmail.com', 'MAC.png', 0, 'active'),
(32, 'Sehun', 'Broken', 'Oh', '#872 Tralala Stree BHQC', '0923987238', 'hongkaira@gmail.com', '', 1, 'active'),
(33, 'Jongin', '', 'Kim', '#111 Gangnamgu Ksoohearteu Seoul', '09827389101', 'hongkaira@gmail.com', '', 1, 'active'),
(34, 'Kyungsoo', '', 'Do', '#9837 Alalalala', '0923972148', 'hongkaira@yahoo.com', '', 1, 'active'),
(35, 'Junmyeon', '', 'Kim', '#762 tralalalal', '09287428', 'hongkaira@gmail.com', '', 1, 'active'),
(36, 'Jongdae', '', 'Kim', '#7236 SOUKOR', '09289048', 'hongkaira@gmail.com', '', 1, 'active'),
(37, 'Kyungsoo', '', 'Do', '#26367 Seoul South Korea', '093827388349', 'hongkaira@gmail.com', '', 1, 'active'),
(38, 'Harpa', '', 'Marcelo', '#1234 Seoul SOUKOR', '092837746982', 'hongkaira@gmail.com', '', 1, 'active'),
(39, 'A', 'A', 'A', '#26735 jahdakjdh', '092382897', 'hongkaira@gmail.com', '', 1, 'active'),
(40, 'Kyungsoo', '', 'DO', '#12234 Seoul SOUKOR', '091291873', 'hongkaira@gmail.com', '', 1, 'active'),
(41, 'Jose', '', 'Rizal', '#1235lalastreet', '+63 (903) 920-3892', 'joserizal@gmail.com', '', 0, ''),
(42, 'Pepe', 'Rizal', 'Jose', '123 Tralala', '+63 (912) 893-8199', 'bessymoto@gmail.com', '', 0, 'Active'),
(43, 'Pero', 'Bakit ', 'Nga', 'Ba mahal kita kahit na', '+63 (129) 879-8379', 'ummm@gmail.com', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomize_request`
--

CREATE TABLE `tblcustomize_request` (
  `customizedID` int(11) NOT NULL,
  `tblcustomerID` int(11) NOT NULL,
  `customizedDescription` varchar(450) CHARACTER SET utf8 NOT NULL,
  `customStatus` varchar(45) CHARACTER SET utf8 NOT NULL,
  `dateRequest` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblcustomize_request`
--

INSERT INTO `tblcustomize_request` (`customizedID`, `tblcustomerID`, `customizedDescription`, `customStatus`, `dateRequest`) VALUES
(1, 31, 'A blue furniture', 'WFP', '2017-10-15'),
(5, 31, 'Ganda lang', 'Cancelled', '2017-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `tblcust_req_images`
--

CREATE TABLE `tblcust_req_images` (
  `cust_req_imagesID` int(11) NOT NULL,
  `cust_req_ID` int(11) NOT NULL,
  `cust_req_images` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblcust_req_images`
--

INSERT INTO `tblcust_req_images` (`cust_req_imagesID`, `cust_req_ID`, `cust_req_images`) VALUES
(1, 1, 'DKH8owjU8AEy4Rm.jpg'),
(2, 1, 'DL-dTV4WsAAcCba.jpg'),
(3, 1, 'DMAKG-IVoAA8Q-e.jpg'),
(4, 5, 'vlcsnap-2017-06-25-00h38m01s048.png'),
(5, 5, 'vlcsnap-2017-06-25-00h39m32s061.png'),
(6, 5, 'vlcsnap-2017-06-25-00h39m37s537.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbldelivery`
--

CREATE TABLE `tbldelivery` (
  `deliveryID` int(11) NOT NULL,
  `deliveryEmpAssigned` int(11) NOT NULL,
  `deliveryReleaseID` int(11) NOT NULL,
  `deliveryDate` datetime NOT NULL,
  `deliveryRate` double NOT NULL,
  `deliveryAddress` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `deliveryRemarks` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `deliveryStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbldelivery_history`
--

CREATE TABLE `tbldelivery_history` (
  `delHistID` int(11) NOT NULL,
  `delHist_recID` int(11) NOT NULL,
  `delHistDate` date NOT NULL,
  `delHistDeliveryMan` int(11) NOT NULL,
  `delHistRemarks` varchar(45) DEFAULT NULL,
  `delHistStatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbldelivery_rates`
--

CREATE TABLE `tbldelivery_rates` (
  `delivery_rateID` int(11) NOT NULL,
  `delBranchID` int(11) NOT NULL,
  `delLocation` varchar(100) CHARACTER SET utf8 NOT NULL,
  `delRateType` varchar(45) CHARACTER SET utf8 NOT NULL,
  `delRate` varchar(45) CHARACTER SET utf8 NOT NULL,
  `delRateStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldelivery_rates`
--

INSERT INTO `tbldelivery_rates` (`delivery_rateID`, `delBranchID`, `delLocation`, `delRateType`, `delRate`, `delRateStatus`) VALUES
(5, 1, 'Metro Manila', 'Amount', '1000', 'Listed'),
(6, 1, 'Provincial', 'Amount', '3000', 'Listed'),
(7, 2, 'Quezon City', 'Amount', '400', 'Listed');

-- --------------------------------------------------------

--
-- Table structure for table `tbldelivery_status`
--

CREATE TABLE `tbldelivery_status` (
  `id` int(11) NOT NULL,
  `statusName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldelivery_status`
--

INSERT INTO `tbldelivery_status` (`id`, `statusName`) VALUES
(1, 'Pending'),
(2, 'On-Hold'),
(3, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `tbldesign_phase`
--

CREATE TABLE `tbldesign_phase` (
  `d_phaseID` int(11) NOT NULL,
  `p_design` int(11) NOT NULL,
  `d_phase` int(11) NOT NULL,
  `d_phaseStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldesign_phase`
--

INSERT INTO `tbldesign_phase` (`d_phaseID`, `p_design`, `d_phase`, `d_phaseStatus`) VALUES
(1, 2, 1, 'Active'),
(2, 2, 2, 'Active'),
(3, 2, 5, 'Active'),
(4, 1, 1, 'Active'),
(5, 1, 2, 'Active'),
(6, 1, 5, 'Active'),
(7, 3, 1, 'Active'),
(8, 3, 2, 'Active'),
(9, 3, 3, 'Active'),
(10, 3, 4, 'Active'),
(11, 3, 5, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbldiscounts`
--

CREATE TABLE `tbldiscounts` (
  `discountID` int(11) NOT NULL,
  `discountName` varchar(45) NOT NULL,
  `discountPercentage` int(11) NOT NULL,
  `discountStatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldiscounts`
--

INSERT INTO `tbldiscounts` (`discountID`, `discountName`, `discountPercentage`, `discountStatus`) VALUES
(1, 'Senior Citizen Discount', 20, 'Active'),
(2, 'Friendly Discount', 5, 'Active'),
(3, 'Haluh', 10, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbldownpayment`
--

CREATE TABLE `tbldownpayment` (
  `downpaymentID` int(11) NOT NULL,
  `downpaymentPercentage` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldownpayment`
--

INSERT INTO `tbldownpayment` (`downpaymentID`, `downpaymentPercentage`) VALUES
(1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `empID` int(11) NOT NULL,
  `empFirstName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `empLastName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `empMidName` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `empRemarks` varchar(100) CHARACTER SET utf8 NOT NULL,
  `empStatus` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`empID`, `empFirstName`, `empLastName`, `empMidName`, `empRemarks`, `empStatus`) VALUES
(1, 'Aira', 'Coronado', 'Barrameda', 'An employee', 'Active'),
(2, 'Mark', 'Coronado', 'B', 'An employee', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblemp_job`
--

CREATE TABLE `tblemp_job` (
  `emp_jobID` int(11) NOT NULL,
  `emp_empID` int(11) NOT NULL,
  `emp_jobDescID` int(11) NOT NULL,
  `emp_jobStatus` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblfabrics`
--

CREATE TABLE `tblfabrics` (
  `fabricID` int(11) NOT NULL,
  `fabricName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `fabricTypeID` int(11) NOT NULL,
  `fabricPatternID` int(11) NOT NULL,
  `fabricColor` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fabricRemarks` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `fabricPic` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `fabricStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblfabrics`
--

INSERT INTO `tblfabrics` (`fabricID`, `fabricName`, `fabricTypeID`, `fabricPatternID`, `fabricColor`, `fabricRemarks`, `fabricPic`, `fabricStatus`) VALUES
(9, 'Gold Rani', 4, 8, 'Yellow and White', 'A soft weaved cotton fabric in yellow and white sunflowers pattern', '2017-08-241503587847.png', 'Listed');

-- --------------------------------------------------------

--
-- Table structure for table `tblfabric_pattern`
--

CREATE TABLE `tblfabric_pattern` (
  `f_patternID` int(11) NOT NULL,
  `f_patternName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `f_patternRemarks` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `f_patternStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblfabric_pattern`
--

INSERT INTO `tblfabric_pattern` (`f_patternID`, `f_patternName`, `f_patternRemarks`, `f_patternStatus`) VALUES
(7, 'Floral', 'Combination of many flowers in one print', 'Listed'),
(8, 'Sunflowers', 'Yellowish designs in the form of sunflowers', 'Listed');

-- --------------------------------------------------------

--
-- Table structure for table `tblfabric_texture`
--

CREATE TABLE `tblfabric_texture` (
  `textureID` int(11) NOT NULL,
  `textureName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `textureDescription` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `textureRating` int(11) DEFAULT NULL,
  `textureStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblfabric_texture`
--

INSERT INTO `tblfabric_texture` (`textureID`, `textureName`, `textureDescription`, `textureRating`, `textureStatus`) VALUES
(13, 'Smooth', 'Smooth', 1, 'Listed'),
(14, 'Very Smooth', 'Very smooth', 4, 'Listed'),
(15, 'Smooth 3', 'Very very smooth', 3, 'Listed');

-- --------------------------------------------------------

--
-- Table structure for table `tblfabric_type`
--

CREATE TABLE `tblfabric_type` (
  `f_typeID` int(11) NOT NULL,
  `f_typeName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `f_typeWeaves` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `f_typeTextureID` int(11) NOT NULL,
  `f_typeStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblfabric_type`
--

INSERT INTO `tblfabric_type` (`f_typeID`, `f_typeName`, `f_typeWeaves`, `f_typeTextureID`, `f_typeStatus`) VALUES
(4, 'Cotton', 'Heavily-Weaved', 14, 'Listed');

-- --------------------------------------------------------

--
-- Table structure for table `tblframeworks`
--

CREATE TABLE `tblframeworks` (
  `frameworkID` int(11) NOT NULL,
  `frameworkFurnType` int(11) NOT NULL,
  `frameworkName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `frameworkPic` varchar(255) CHARACTER SET utf8 NOT NULL,
  `framedesignID` int(11) NOT NULL,
  `materialUsedID` int(11) NOT NULL,
  `frameworkRemarks` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `frameworkStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblframeworks`
--

INSERT INTO `tblframeworks` (`frameworkID`, `frameworkFurnType`, `frameworkName`, `frameworkPic`, `framedesignID`, `materialUsedID`, `frameworkRemarks`, `frameworkStatus`) VALUES
(9, 15, 'Side Victorian Floral', '2017-08-241503588358.png', 5, 1, ' Victorian Floral Design on the sides', 'Listed'),
(10, 17, 'Basic Frame', '2017-08-241503588427.png', 6, 1, ' Checkered basic design ', 'Listed');

-- --------------------------------------------------------

--
-- Table structure for table `tblframe_design`
--

CREATE TABLE `tblframe_design` (
  `designID` int(11) NOT NULL,
  `designName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `designDescription` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `designStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblframe_design`
--

INSERT INTO `tblframe_design` (`designID`, `designName`, `designDescription`, `designStatus`) VALUES
(5, 'Victorian Classic', ' A victorian classic design', 'Listed'),
(6, 'Checkered', ' Checkered carving design', 'Listed');

-- --------------------------------------------------------

--
-- Table structure for table `tblframe_material`
--

CREATE TABLE `tblframe_material` (
  `materialID` int(11) NOT NULL,
  `materialName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `materialRemarks` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `materialStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblframe_material`
--

INSERT INTO `tblframe_material` (`materialID`, `materialName`, `materialRemarks`, `materialStatus`) VALUES
(1, 'Narra Wood', 'Narra wood is a very sturdy kind of wood', 'Listed'),
(2, 'Mahogany Wood', ' Mahogany Woods are amazing type of wood', 'Listed');

-- --------------------------------------------------------

--
-- Table structure for table `tblfurn_category`
--

CREATE TABLE `tblfurn_category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `categoryStatus` varchar(45) CHARACTER SET utf8 NOT NULL,
  `categoryRemarks` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblfurn_category`
--

INSERT INTO `tblfurn_category` (`categoryID`, `categoryName`, `categoryStatus`, `categoryRemarks`) VALUES
(6, 'Living Room', 'Listed', ' Living Area'),
(7, 'Bedroom', 'Listed', 'Bedroom'),
(8, 'Outdoor', 'Listed', 'Outdoor Furnitures'),
(9, 'DIning Room', 'Listed', ' Dining Area'),
(10, 'Others', 'Listed', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `tblfurn_design`
--

CREATE TABLE `tblfurn_design` (
  `designID` int(11) NOT NULL,
  `designName` varchar(45) CHARACTER SET latin1 NOT NULL,
  `designStatus` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblfurn_design`
--

INSERT INTO `tblfurn_design` (`designID`, `designName`, `designStatus`) VALUES
(1, 'Pure', 'Active'),
(2, 'Weaved', 'Active'),
(3, 'Upholstered', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblfurn_type`
--

CREATE TABLE `tblfurn_type` (
  `typeID` int(11) NOT NULL,
  `typeName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `typeDescription` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `typeStatus` varchar(45) CHARACTER SET utf8 NOT NULL,
  `typeCategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblfurn_type`
--

INSERT INTO `tblfurn_type` (`typeID`, `typeName`, `typeDescription`, `typeStatus`, `typeCategoryID`) VALUES
(13, 'Beds', 'A piece of furniture that people sleep on', 'Listed', 7),
(14, 'Bedside Tables', ' A piece of furniture usually found beside the bed. ', 'Listed', 7),
(15, 'Accent Tables', 'Often used as a great decoration. Any piece of accent furniture worthy of being called that goes bey', 'Listed', 6),
(16, 'Display and Utility Cabinets', 'Piece of furniture that usually has doors and shelves', 'Listed', 6),
(17, 'Sectional Sofas', ' A huge L shaped couch that takes up most of the living room', 'Listed', 6),
(18, 'Bar Folding Pantry Table', 'Tables usually found in the kitchen or dining area', 'Listed', 9),
(19, 'Dining Chair', 'Chairs that surrounds the dining table. Found in the dining area.', 'Listed', 9),
(20, 'Dining Table', ' Tables for the dining area', 'Listed', 9),
(21, 'Side Table', ' Table beside the bed', 'Listed', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoicedetails`
--

CREATE TABLE `tblinvoicedetails` (
  `invoiceID` int(11) NOT NULL,
  `invorderID` int(11) NOT NULL,
  `balance` double NOT NULL,
  `dateIssued` date NOT NULL,
  `invoiceStatus` varchar(45) CHARACTER SET utf8 NOT NULL,
  `invoiceRemarks` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `invDelrateID` int(11) DEFAULT NULL,
  `invPenID` int(11) DEFAULT NULL,
  `invDiscount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblinvoicedetails`
--

INSERT INTO `tblinvoicedetails` (`invoiceID`, `invorderID`, `balance`, `dateIssued`, `invoiceStatus`, `invoiceRemarks`, `invDelrateID`, `invPenID`, `invDiscount`) VALUES
(1, 1, 0, '2017-10-17', 'Pending', 'Initial Invoice', 1, 1, NULL),
(2, 2, 0, '2017-10-17', 'Pending', 'Initial Invoice', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbljobs`
--

CREATE TABLE `tbljobs` (
  `jobID` int(11) NOT NULL,
  `jobName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `jobDescription` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `jobStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbljobs`
--

INSERT INTO `tbljobs` (`jobID`, `jobName`, `jobDescription`, `jobStatus`) VALUES
(7, 'Carpenter', 'Build the frame of the furniture. Also carved if the employee can.', 'Listed'),
(8, 'Carver', 'Carved the specified design of the furniture on the frames or carved the furniture to be in shape', 'Listed'),
(9, 'Upholsterer', 'Sew the fabrics on the furniture, also the one who fills the foam on every sofa-like or upholstered ', 'Listed');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

CREATE TABLE `tbllogs` (
  `logID` int(11) NOT NULL,
  `category` varchar(250) CHARACTER SET latin1 NOT NULL,
  `action` varchar(150) CHARACTER SET latin1 NOT NULL,
  `date` date NOT NULL,
  `description` varchar(450) CHARACTER SET latin1 NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbllogs`
--

INSERT INTO `tbllogs` (`logID`, `category`, `action`, `date`, `description`, `userID`) VALUES
(8, 'Supplier', 'New', '2017-08-24', 'Added new supplier SMENT Fabrics and Prints, ID = 16', 1),
(9, 'Supplier', 'Update', '2017-08-24', 'Updated supplier SMENT Fabrics and Prints, ID = 16', 1),
(10, 'Category', 'New', '2017-08-24', 'Added new category Living Room, ID = 6', 1),
(11, 'Category', 'New', '2017-08-24', 'Added new category Bedroom, ID = 7', 1),
(12, 'Category', 'New', '2017-08-24', 'Added new category Outdoor, ID = 8', 1),
(13, 'Category', 'New', '2017-08-24', 'Added new category DIning Room, ID = 9', 1),
(14, 'Furniture Type', 'New', '2017-08-24', 'Added new furniture type Beds, ID = 13', 1),
(15, 'Furniture Type', 'New', '2017-08-24', 'Added new furniture type Bedside Tables, ID = 14', 1),
(16, 'Furniture Type', 'Update', '2017-08-24', 'Updated furniture type Bedside Tables, ID = 14', 1),
(17, 'Furniture Type', 'Update', '2017-08-24', 'Updated furniture type Bedside Tables, ID = 14', 1),
(18, 'Furniture Type', 'New', '2017-08-24', 'Added new furniture type Accent Tables, ID = 15', 1),
(19, 'Furniture Type', 'New', '2017-08-24', 'Added new furniture type Display and Utility Cabinets, ID = 16', 1),
(20, 'Furniture Type', 'New', '2017-08-24', 'Added new furniture type Sectional Sofas, ID = 17', 1),
(21, 'Furniture Type', 'New', '2017-08-24', 'Added new furniture type Bar Folding Pantry Table, ID = 18', 1),
(22, 'Furniture Type', 'New', '2017-08-24', 'Added new furniture type Dining Chair, ID = 19', 1),
(23, 'Furniture Type', 'New', '2017-08-24', 'Added new furniture type Dining Table, ID = 20', 1),
(24, 'Fabric Texture', 'New', '2017-08-24', 'Added new fabric texture Smooth, ID = 13', 1),
(25, 'Fabric Texture', 'New', '2017-08-24', 'Added new fabric texture Very Smooth, ID = 14', 1),
(26, 'Fabric Type', 'New', '2017-08-24', 'Added new fabric type Cotton, ID = 4', 1),
(27, 'Fabric Pattern', 'New', '2017-08-24', 'Added new fabric pattern Floral, ID = 7', 1),
(28, 'Fabric Pattern', 'New', '2017-08-24', 'Added new fabric pattern Sunflowers, ID = 8', 1),
(29, 'Fabric Pattern', 'Update', '2017-08-24', 'Updated fabric pattern Floral, ID = 7', 1),
(30, 'Fabrics Formed', 'New', '2017-08-24', 'Added new fabric Gold Rani, ID = 9', 1),
(31, 'Frame Design', 'New', '2017-08-24', 'Added new frame design Victorian Classic, ID = 5', 1),
(32, 'Frame Design', 'New', '2017-08-24', 'Added new frame design Checkered, ID = 6', 1),
(33, 'Frame Material', 'Update', '2017-08-24', 'Updated frame material Narra Wood, ID = 1', 1),
(34, 'Frameworks', 'New', '2017-08-24', 'Added new framework Side Victorian Floral, ID = 9', 1),
(35, 'Frameworks', 'New', '2017-08-24', 'Added new framework Basic Frame, ID = 10', 1),
(36, 'Products', 'New', '2017-08-24', 'Added new product Queen, ID = 16', 1),
(37, 'Jobs', 'New', '2017-08-24', 'Added new job Carpenter, ID = 7', 1),
(38, 'Jobs', 'New', '2017-08-24', 'Added new job Carver, ID = 8', 1),
(39, 'Jobs', 'New', '2017-08-24', 'Added new job Upholsterer, ID = 9', 1),
(40, 'Jobs', 'Update', '2017-08-24', 'Updated job Upholsterer, ID = 9', 1),
(41, 'Promos', 'New', '2017-08-24', 'Added new promo Grand Opening Promo, ID = 0', 1),
(42, 'Promos', 'New', '2017-08-24', 'Added new promo Grand Opening Promo, ID = 6', 1),
(43, 'Delivery Rates', 'New', '2017-08-24', 'Added new delivery rate 1000, ID = 5', 1),
(44, 'Delivery Rates', 'New', '2017-08-24', 'Added new delivery rate 3000, ID = 6', 1),
(45, 'Category', 'New', '2017-08-24', 'Added new category Others, ID = 10', 1),
(46, 'Category', 'New', '2017-08-25', 'Added new category , ID = 11', 1),
(47, 'Unit of Measurement', 'New', '2017-08-26', 'Added new unit of measurement Feet, ID = 14', 1),
(48, 'Unit of Measurement', 'New', '2017-08-26', 'Added new unit of measurement Meter, ID = 15', 1),
(49, 'Unit of Measurement Category', 'New', '2017-08-26', 'Added new unit of measurement category Length, ID = 11', 1),
(50, 'Material Attribute', 'New', '2017-08-26', 'Added new material attribute Size, ID = 8', 1),
(51, 'Material Type', 'New', '2017-08-26', 'Added new material type Wood, ID = 1', 1),
(52, 'Materials', 'New', '2017-08-26', 'Added new material FNC, ID = 10', 1),
(53, 'Material Type', 'New', '2017-08-26', 'Added new material type Fabric, ID = 2', 1),
(54, 'Material Type', 'New', '2017-08-26', 'Added new material type Paint, ID = 3', 1),
(55, 'Material Type', 'New', '2017-08-26', 'Added new material type Varnish, ID = 4', 1),
(56, 'Material Type', 'New', '2017-08-26', 'Added new material type Rattan, ID = 5', 1),
(57, 'Supplier', 'New', '2017-08-27', 'Added new supplier AA, ID = 17', 4),
(58, 'Order', 'New', '2017-08-28', 'New order #OR83', 1),
(59, 'Order', 'New', '2017-08-28', 'New order #OR84', 1),
(60, 'Order', 'New', '2017-08-28', 'New order #OR000085', 1),
(61, 'Order', 'New', '2017-08-28', 'New order #OR000086', 1),
(62, 'Order', 'New', '2017-08-28', 'New order #OR000087', 1),
(63, 'Order', 'New', '2017-08-28', 'New order #OR000088', 1),
(64, 'Order', 'New', '2017-08-28', 'New order #OR000089', 1),
(65, 'Order', 'New', '2017-08-28', 'New order #OR000090', 1),
(66, 'Order', 'New', '2017-08-28', 'New order #OR000091', 1),
(67, 'Order', 'New', '2017-08-28', 'New order #OR000092', 1),
(68, 'Order', 'New', '2017-08-28', 'New order #OR000093', 1),
(69, 'Order', 'New', '2017-08-28', 'New order #OR000094', 1),
(70, 'Order', 'New', '2017-08-28', 'New order #OR000095', 1),
(71, 'Order', 'New', '2017-08-28', 'New order #OR000096', 1),
(72, 'Products', 'New', '2017-08-28', 'Added new product Elizabeth, ID = 17', 1),
(73, 'Products', 'Update', '2017-08-28', 'Updated product Queen, ID = 16', 1),
(74, 'Order', 'New', '2017-08-28', 'New order #OR000001', 1),
(75, 'Unit of Measurement Category', 'New', '2017-08-29', 'Added new unit of measurement category Area, ID = 13', 1),
(76, 'Unit of Measurement Category', 'New', '2017-08-29', 'Added new unit of measurement category Weight, ID = 14', 1),
(77, 'Unit of Measurement', 'New', '2017-08-29', 'Added new unit of measurement Gram, ID = 16', 1),
(78, 'Unit of Measurement Category', 'Deactivate', '2017-08-29', 'Deactivated unit of measurement category , ID = 13', 1),
(79, 'Unit of Measurement', 'New', '2017-08-29', 'Added new unit of measurement Inch, ID = 17', 1),
(80, 'Material Attribute', 'Deactivate', '2017-08-29', 'Deactivated material attribute , ID = 8', 1),
(81, 'Material Attribute', 'New', '2017-08-29', 'Added new material attribute Color, ID = 9', 1),
(82, 'Material Attribute', 'New', '2017-08-29', 'Added new material attribute Type, ID = 10', 1),
(83, 'Material Attribute', 'New', '2017-08-29', 'Added new material attribute Weight, ID = 11', 1),
(84, 'Materials', 'New', '2017-08-29', 'Added new material Liza Varnish, ID = 11', 1),
(85, 'Materials', 'New', '2017-08-29', 'Added new material Mela Varnish, ID = 12', 1),
(86, 'Supplier', 'Update', '2017-08-29', 'Updated supplier FNCENT Trees and Woods Inc., ID = 15', 1),
(87, 'Supplier', 'Update', '2017-08-29', 'Updated supplier AA, ID = 17', 1),
(88, 'Products', 'New', '2017-08-30', 'Added new product Manilenia, ID = 18', 1),
(89, 'Products', 'Update', '2017-08-30', 'Updated product Manilenia, ID = 18', 1),
(90, 'Order', 'New', '2017-08-30', 'New order #OR000009', 1),
(91, 'Delivery Rates', 'New', '2017-08-30', 'Added new delivery rate 400, ID = 7', 1),
(92, 'Material Type', 'New', '2017-09-23', 'Added new material type Foam, ID = 6', 1),
(93, 'Materials', 'New', '2017-09-23', 'Added new material Uratex Foam, ID = 13', 1),
(94, 'Material Variants', 'New', '2017-09-23', 'Added new material variant 13, ID = ', 1),
(95, 'Material Variants', 'New', '2017-09-23', 'Added new material variant 12, ID = ', 1),
(96, 'Supplier', 'New', '2017-09-25', 'Added new supplier l;efjdor2093729ueij, ID = 18', 1),
(97, 'Furniture Type', 'New', '2017-09-25', 'Added new furniture type Side Table, ID = 21', 1),
(98, 'Fabric Texture', 'New', '2017-09-25', 'Added new fabric texture Smooth 3, ID = 15', 1),
(99, 'Fabric Texture', 'Update', '2017-09-25', 'Updated fabric texture Very Smooth, ID = 14', 1),
(100, 'Fabric Texture', 'Update', '2017-09-25', 'Updated fabric texture Smooth, ID = 13', 1),
(101, 'Frame Material', 'New', '2017-09-25', 'Added new frame material Mahogany Wood, ID = 2', 1),
(102, 'Jobs', 'Update', '2017-09-25', 'Updated job Carpenter, ID = 7', 1),
(103, 'Employees', 'Update', '2017-09-25', 'Updated employee Aira Barrameda Coronado, ID = 1', 1),
(104, 'Material Attribute', 'New', '2017-10-01', 'Added new material attribute Dimension, ID = 12', 1),
(105, 'Unit of Measurement', 'New', '2017-10-01', 'Added new unit of measurement Pieces, ID = 18', 1),
(106, 'Unit of Measurement', 'New', '2017-10-01', 'Added new unit of measurement Centimeters, ID = 25', 1),
(107, 'Material Variants', 'New', '2017-10-01', 'Added new material variant 16, ID = ', 1),
(108, 'Material Variants', 'New', '2017-10-01', 'Added new material variant 15, ID = ', 1),
(109, 'Material Variants', 'New', '2017-10-01', 'Added new material variant 18, ID = ', 1),
(110, 'Material Variants', 'New', '2017-10-01', 'Added new material variant 18, ID = ', 1),
(111, 'Production Information', 'New', '2017-10-01', 'Added new production information 18, ID = 6', 1),
(112, 'Production Information', 'New', '2017-10-02', 'Added new production information 18, ID = 8', 1),
(113, 'Production Information', 'Deactivate', '2017-10-02', 'Deactivated production information , ID = 1', 1),
(114, 'Order', 'New', '2017-10-02', 'New order #OR000000', 1),
(115, 'Order', 'New', '2017-10-02', 'New order #OR000012', 1),
(116, 'Order', 'New', '2017-10-02', 'New order #OR000013', 1),
(117, 'Order', 'New', '2017-10-03', 'New management order #OR000000', 1),
(118, 'Order', 'New', '2017-10-03', 'New management order #OR000000', 1),
(119, 'Order', 'New', '2017-10-03', 'New management order #OR000016', 1),
(120, 'Order', 'New', '2017-10-04', 'New order #OR000017', 1),
(121, 'Order', 'New', '2017-10-04', 'New order #OR000018', 1),
(122, 'Order', 'New', '2017-10-04', 'New order #OR000019', 1),
(123, 'Order', 'New', '2017-10-04', 'New order #OR000020', 1),
(124, 'Order', 'New', '2017-10-04', 'New order #OR000021', 1),
(125, 'Order', 'New', '2017-10-04', 'New order #OR000022', 1),
(126, 'Order', 'New', '2017-10-04', 'New order #OR000023', 1),
(127, 'Order', 'New', '2017-10-04', 'New order #OR000024', 1),
(128, 'Production Information', 'New', '2017-10-08', 'Added new production information 17, ID = 10', 1),
(129, 'Material Deliveries', 'New', '2017-10-10', 'Added new frame material , ID = 2', 1),
(130, 'Material Deliveries', 'New', '2017-10-10', 'Added new frame material , ID = 8', 1),
(131, 'Material Deliveries', 'New', '2017-10-10', 'Added new frame material , ID = 0', 1),
(132, 'Material Deliveries', 'New', '2017-10-10', 'Added new frame material , ID = 9', 1),
(133, 'Material Deliveries', 'New', '2017-10-10', 'Added new frame material , ID = 10', 1),
(134, 'Packages', 'New', '2017-10-10', 'Added new packages Fabulous Package, ID = 0', 1),
(135, 'Order', 'New', '2017-10-10', 'New order #OR000028', 1),
(136, 'Order', 'New', '2017-10-10', 'New order #OR000029', 1),
(137, 'Order', 'New', '2017-10-10', 'New order #OR000030', 1),
(138, 'Order', 'New', '2017-10-10', 'New order #OR000031', 1),
(139, 'Order', 'New', '2017-10-10', 'New order #OR000032', 1),
(140, 'Order', 'New', '2017-10-10', 'New order #OR000033', 1),
(141, 'Order', 'New', '2017-10-10', 'New order #OR000034', 1),
(142, 'Order', 'New', '2017-10-10', 'New order #OR000035', 1),
(143, 'Order', 'New', '2017-10-10', 'New order #OR000036', 1),
(144, 'Order', 'New', '2017-10-10', 'New order #OR000037', 1),
(145, 'Order', 'New', '2017-10-10', 'New order #OR000038', 1),
(146, 'Order', 'New', '2017-10-10', 'New order #OR000039', 1),
(147, 'Order', 'New', '2017-10-10', 'New order #OR000040', 1),
(148, 'Order', 'New', '2017-10-10', 'New order #OR000041', 1),
(149, 'Order', 'New', '2017-10-10', 'New order #OR000042', 1),
(150, 'Order', 'New', '2017-10-10', 'New order #OR000043', 1),
(151, 'Order', 'New', '2017-10-10', 'New order #OR000044', 1),
(152, 'Order', 'New', '2017-10-11', 'New management order #OR000045', 1),
(153, 'Order', 'New', '2017-10-12', 'New order #OR000046', 1),
(154, 'Order', 'New', '2017-10-15', 'New order #OR000047', 1),
(155, 'Order', 'New', '2017-10-16', 'New order #OR000049', 1),
(156, 'Promos', 'New', '2017-10-16', 'Added new promo Pre-Christmas Promo, ID = 1', 1),
(157, 'Order', 'New', '2017-10-16', 'New order #OR000050', 1),
(158, 'Order', 'New', '2017-10-16', 'New order #OR000051', 1),
(159, 'Order', 'New', '2017-10-16', 'New order #OR000052', 1),
(160, 'Order', 'New', '2017-10-16', 'New order #OR000053', 1),
(161, 'Order', 'New', '2017-10-16', 'New order #OR000054', 1),
(162, 'Products', 'New', '2017-10-16', 'Added new customized product Custom, ID = 19', 1),
(163, 'Order', 'New', '2017-10-16', 'New order #OR000066', 1),
(164, 'Order', 'New', '2017-10-16', 'New order #OR000067', 1),
(165, 'Order', 'New', '2017-10-16', 'New order #OR000068', 1),
(166, 'Order', 'New', '2017-10-16', 'New order #OR000070', 1),
(167, 'Order', 'New', '2017-10-16', 'New order #OR000071', 1),
(168, 'Order', 'New', '2017-10-16', 'New order #OR000072', 1),
(169, 'Order', 'New', '2017-10-17', 'New order #OR000078', 1),
(170, 'Order', 'New', '2017-10-17', 'New order #OR000079', 1),
(171, 'Order', 'New', '2017-10-17', 'New order #OR000080', 1),
(172, 'Customer', 'Update', '2017-10-17', '', 5),
(173, 'Customer', 'Update', '2017-10-17', '', 5),
(175, 'Promos', 'New', '2017-10-17', 'Added new promo New, ID = 2', 1),
(176, 'Order', 'New', '2017-10-17', 'New order #OR000001', 1),
(177, 'Order', 'New', '2017-10-17', 'New order #OR000002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmaterials`
--

CREATE TABLE `tblmaterials` (
  `materialID` int(11) NOT NULL,
  `materialType` int(11) NOT NULL,
  `materialName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `materialMeasurement` varchar(450) CHARACTER SET utf8 NOT NULL,
  `materialStatus` varchar(45) CHARACTER SET utf8 NOT NULL,
  `dateCreated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblmaterials`
--

INSERT INTO `tblmaterials` (`materialID`, `materialType`, `materialName`, `materialMeasurement`, `materialStatus`, `dateCreated`) VALUES
(10, 1, 'Narra Wood', '', 'Listed', NULL),
(11, 4, 'Liza Varnish', '', 'Listed', NULL),
(12, 4, 'Mela Varnish', '', 'Listed', NULL),
(13, 6, 'Uratex Foam', '', 'Listed', NULL),
(14, 2, 'Lira Leather', '', 'Listed', NULL),
(15, 2, 'Hyena Cotton', '', 'Listed', NULL),
(16, 3, 'Boysen Paint', '', 'Listed', NULL),
(17, 3, 'Canon Paint', '', 'Listed', NULL),
(18, 5, 'Viola', '', 'Listed', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblmat_actions`
--

CREATE TABLE `tblmat_actions` (
  `mat_actionsID` int(11) NOT NULL,
  `mat_intID` int(11) NOT NULL,
  `mat_quantity` int(11) NOT NULL,
  `mat_actionRemarks` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmat_deductdetails`
--

CREATE TABLE `tblmat_deductdetails` (
  `mat_deductID` int(11) NOT NULL,
  `mat_inventoryID` int(11) NOT NULL,
  `mat_deductQuantity` int(11) NOT NULL,
  `mat_deductRemarks` varchar(45) NOT NULL,
  `mat_deductDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmat_deliveries`
--

CREATE TABLE `tblmat_deliveries` (
  `mat_deliveriesID` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL,
  `totalQuantity` int(11) NOT NULL,
  `dateSupplied` date NOT NULL,
  `mat_deliveryRemarks` varchar(450) NOT NULL,
  `mat_deliveryStatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmat_deliverydetails`
--

CREATE TABLE `tblmat_deliverydetails` (
  `del_detailsID` int(11) NOT NULL,
  `del_matDelID` int(11) NOT NULL,
  `del_matVarID` int(11) NOT NULL,
  `del_quantity` int(11) NOT NULL,
  `del_remarks` varchar(450) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmat_inventory`
--

CREATE TABLE `tblmat_inventory` (
  `mat_inventoryID` int(11) NOT NULL,
  `matVariantID` int(11) NOT NULL,
  `matVarQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmat_type`
--

CREATE TABLE `tblmat_type` (
  `matTypeID` int(11) NOT NULL,
  `matTypeName` varchar(450) CHARACTER SET latin1 NOT NULL,
  `matTypeMeasure` varchar(450) CHARACTER SET latin1 NOT NULL,
  `matTypeRemarks` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `matTypeStatus` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblmat_type`
--

INSERT INTO `tblmat_type` (`matTypeID`, `matTypeName`, `matTypeMeasure`, `matTypeRemarks`, `matTypeStatus`) VALUES
(1, 'Wood', 'measuring is on materials', 'Wood', 'Listed'),
(2, 'Fabric', 'measuring is on materials', 'Fabric', 'Listed'),
(3, 'Paint', 'measuring is on materials', 'Paint', 'Listed'),
(4, 'Varnish', 'measuring is on materials', 'Varnish', 'Listed'),
(5, 'Rattan', 'measuring is on materials', 'Rattan', 'Listed'),
(6, 'Foam', 'measuring is on materials', '', 'Listed');

-- --------------------------------------------------------

--
-- Table structure for table `tblmat_var`
--

CREATE TABLE `tblmat_var` (
  `mat_varID` int(11) NOT NULL,
  `materialID` int(11) NOT NULL,
  `mat_varDescription` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `mat_varStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblmat_var`
--

INSERT INTO `tblmat_var` (`mat_varID`, `materialID`, `mat_varDescription`, `mat_varStatus`) VALUES
(257, 11, 'Odorless  / brown ', 'Active'),
(258, 11, 'Odorless  / red ', 'Active'),
(259, 11, 'Odorless  / transparent ', 'Active'),
(260, 11, 'Original  / brown ', 'Active'),
(261, 11, 'Original  / red ', 'Active'),
(262, 11, 'Original  / transparent ', 'Active'),
(263, 13, 'White  / Feather ', 'Active'),
(264, 13, 'White  / Spring ', 'Active'),
(265, 13, 'Pink  / Feather ', 'Active'),
(266, 13, 'Pink  / Spring ', 'Active'),
(267, 13, 'Blue  / Feather ', 'Active'),
(268, 13, 'Blue  / Spring ', 'Active'),
(269, 12, 'white  / odorless  / 25 g', 'Active'),
(270, 12, 'white  / odorless  / 35 g', 'Active'),
(271, 12, 'white  / odorless  / 45 g', 'Active'),
(272, 12, 'white  / odorless  / 55 g', 'Active'),
(273, 12, 'white  / odorless  / 65 g', 'Active'),
(274, 12, 'white  / original  / 25 g', 'Active'),
(275, 12, 'white  / original  / 35 g', 'Active'),
(276, 12, 'white  / original  / 45 g', 'Active'),
(277, 12, 'white  / original  / 55 g', 'Active'),
(278, 12, 'white  / original  / 65 g', 'Active'),
(279, 12, 'blue  / odorless  / 25 g', 'Active'),
(280, 12, 'blue  / odorless  / 35 g', 'Active'),
(281, 12, 'blue  / odorless  / 45 g', 'Active'),
(282, 12, 'blue  / odorless  / 55 g', 'Active'),
(283, 12, 'blue  / odorless  / 65 g', 'Active'),
(284, 12, 'blue  / original  / 25 g', 'Active'),
(285, 12, 'blue  / original  / 35 g', 'Active'),
(286, 12, 'blue  / original  / 45 g', 'Active'),
(287, 12, 'blue  / original  / 55 g', 'Active'),
(288, 12, 'blue  / original  / 65 g', 'Active'),
(289, 12, 'pink  / odorless  / 25 g', 'Active'),
(290, 12, 'pink  / odorless  / 35 g', 'Active'),
(291, 12, 'pink  / odorless  / 45 g', 'Active'),
(292, 12, 'pink  / odorless  / 55 g', 'Active'),
(293, 12, 'pink  / odorless  / 65 g', 'Active'),
(294, 12, 'pink  / original  / 25 g', 'Active'),
(295, 12, 'pink  / original  / 35 g', 'Active'),
(296, 12, 'pink  / original  / 45 g', 'Active'),
(297, 12, 'pink  / original  / 55 g', 'Active'),
(298, 12, 'pink  / original  / 65 g', 'Active'),
(299, 12, 'green  / odorless  / 25 g', 'Active'),
(300, 12, 'green  / odorless  / 35 g', 'Active'),
(301, 12, 'green  / odorless  / 45 g', 'Active'),
(302, 12, 'green  / odorless  / 55 g', 'Active'),
(303, 12, 'green  / odorless  / 65 g', 'Active'),
(304, 12, 'green  / original  / 25 g', 'Active'),
(305, 12, 'green  / original  / 35 g', 'Active'),
(306, 12, 'green  / original  / 45 g', 'Active'),
(307, 12, 'green  / original  / 55 g', 'Active'),
(308, 12, 'green  / original  / 65 g', 'Active'),
(309, 12, 'purple  / odorless  / 25 g', 'Active'),
(310, 12, 'purple  / odorless  / 35 g', 'Active'),
(311, 12, 'purple  / odorless  / 45 g', 'Active'),
(312, 12, 'purple  / odorless  / 55 g', 'Active'),
(313, 12, 'purple  / odorless  / 65 g', 'Active'),
(314, 12, 'purple  / original  / 25 g', 'Active'),
(315, 12, 'purple  / original  / 35 g', 'Active'),
(316, 12, 'purple  / original  / 45 g', 'Active'),
(317, 12, 'purple  / original  / 55 g', 'Active'),
(318, 12, 'purple  / original  / 65 g', 'Active'),
(319, 16, 'White  / Odorless ', 'Active'),
(320, 16, 'Brown  / Odorless ', 'Active'),
(321, 15, 'Red  / Soft ', 'Active'),
(322, 15, 'Yellow Green  / Soft ', 'Active'),
(323, 18, 'Brown ', 'Active'),
(324, 18, 'Light-Brown ', 'Active'),
(325, 18, '20 ', 'Active'),
(326, 18, '50 ', 'Active'),
(327, 18, '150 ', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblmodeofpayment`
--

CREATE TABLE `tblmodeofpayment` (
  `modeofpaymentID` int(11) NOT NULL,
  `modeofpaymentDesc` varchar(45) CHARACTER SET utf8 NOT NULL,
  `modeofpaymentStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblmodeofpayment`
--

INSERT INTO `tblmodeofpayment` (`modeofpaymentID`, `modeofpaymentDesc`, `modeofpaymentStatus`) VALUES
(1, 'Cash', 'Active'),
(2, 'Check', 'Active'),
(3, 'Deposit Slip', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblnewsletter`
--

CREATE TABLE `tblnewsletter` (
  `newsID` int(11) NOT NULL,
  `newsletterDate` date NOT NULL,
  `newsletterAuthor` int(11) NOT NULL,
  `newsletterContent` varchar(450) NOT NULL,
  `newsletterStatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblnotification`
--

CREATE TABLE `tblnotification` (
  `id` int(11) NOT NULL,
  `tblcustomerID` int(11) NOT NULL,
  `tblorderID` int(11) NOT NULL,
  `amountPaid` double NOT NULL,
  `datePaid` date NOT NULL,
  `bankBranch` varchar(450) NOT NULL,
  `proofPicture` varchar(450) NOT NULL,
  `notifStatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblonhand`
--

CREATE TABLE `tblonhand` (
  `onHandID` int(11) NOT NULL,
  `ohProdID` int(11) NOT NULL,
  `ohQuantity` int(11) NOT NULL,
  `ohRemarks` varchar(450) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `orderID` int(11) NOT NULL,
  `receivedbyUserID` int(11) NOT NULL,
  `dateOfReceived` date NOT NULL,
  `dateOfRelease` date NOT NULL,
  `custOrderID` int(11) DEFAULT NULL,
  `orderPrice` double NOT NULL,
  `orderStatus` varchar(45) CHARACTER SET utf8 NOT NULL,
  `shippingAddress` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `orderType` varchar(45) CHARACTER SET utf8 NOT NULL,
  `orderRemarks` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`orderID`, `receivedbyUserID`, `dateOfReceived`, `dateOfRelease`, `custOrderID`, `orderPrice`, `orderStatus`, `shippingAddress`, `orderType`, `orderRemarks`) VALUES
(1, 1, '2017-10-17', '2017-10-17', 0, 0, 'WFA', 'N/A. This order is for pick-up', 'Pre-Order', ''),
(2, 1, '2017-10-17', '2017-10-17', 0, 0, 'WFA', 'N/A. This order is for pick-up', 'Pre-Order', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder_actions`
--

CREATE TABLE `tblorder_actions` (
  `orActionID` int(11) NOT NULL,
  `orOrderID` int(11) NOT NULL,
  `orAction` varchar(450) CHARACTER SET latin1 NOT NULL,
  `orReason` varchar(450) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblorder_request`
--

CREATE TABLE `tblorder_request` (
  `order_requestID` int(11) NOT NULL,
  `tblOrdersID` int(11) NOT NULL,
  `orderProductID` int(11) DEFAULT NULL,
  `prodUnitPrice` double NOT NULL,
  `orderRemarks` int(11) NOT NULL,
  `orderPackageID` int(11) DEFAULT NULL,
  `orderQuantity` int(11) NOT NULL,
  `orderRequestStatus` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblorder_requestcnt`
--

CREATE TABLE `tblorder_requestcnt` (
  `orreq_cntID` int(11) NOT NULL,
  `orreq_ID` int(11) NOT NULL,
  `orreq_quantity` int(11) NOT NULL,
  `orreq_prodFinish` int(11) DEFAULT NULL,
  `orreq_returned` int(11) DEFAULT NULL,
  `orreq_released` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblorder_return`
--

CREATE TABLE `tblorder_return` (
  `returnID` int(11) NOT NULL,
  `tblorderReqID` int(11) NOT NULL,
  `dateReturned` date NOT NULL,
  `returnReason` varchar(450) NOT NULL,
  `returnAssessment` varchar(45) NOT NULL,
  `returnRemarks` varchar(450) NOT NULL,
  `estDateReleased` date NOT NULL,
  `returnStatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpackages`
--

CREATE TABLE `tblpackages` (
  `packageID` int(11) NOT NULL,
  `packagePrice` double NOT NULL,
  `packageDescription` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `packageStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblpackages`
--

INSERT INTO `tblpackages` (`packageID`, `packagePrice`, `packageDescription`, `packageStatus`) VALUES
(1, 90000, 'Fabulous Package', 'Listed');

-- --------------------------------------------------------

--
-- Table structure for table `tblpackage_inclusions`
--

CREATE TABLE `tblpackage_inclusions` (
  `package_inclusionID` int(11) NOT NULL,
  `product_incID` int(11) NOT NULL,
  `package_incID` int(11) NOT NULL,
  `package_incStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblpackage_inclusions`
--

INSERT INTO `tblpackage_inclusions` (`package_inclusionID`, `product_incID`, `package_incID`, `package_incStatus`) VALUES
(1, 17, 1, 'Listed'),
(2, 16, 1, 'Listed');

-- --------------------------------------------------------

--
-- Table structure for table `tblpackage_orderreq`
--

CREATE TABLE `tblpackage_orderreq` (
  `por_ID` int(11) NOT NULL,
  `por_orReqID` int(11) NOT NULL,
  `por_prID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment_details`
--

CREATE TABLE `tblpayment_details` (
  `payment_detailsID` int(11) NOT NULL,
  `invID` int(11) DEFAULT NULL,
  `dateCreated` datetime NOT NULL,
  `amountPaid` double NOT NULL,
  `mopID` int(11) NOT NULL,
  `paymentStatus` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpenalty`
--

CREATE TABLE `tblpenalty` (
  `penaltyID` int(11) NOT NULL,
  `penaltyName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `penaltyRateType` varchar(45) CHARACTER SET utf8 NOT NULL,
  `penaltyRate` double NOT NULL,
  `penaltyRemarks` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `penStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblpenalty`
--

INSERT INTO `tblpenalty` (`penaltyID`, `penaltyName`, `penaltyRateType`, `penaltyRate`, `penaltyRemarks`, `penStatus`) VALUES
(1, 'Storage Fee', 'Amount', 1000, 'Storage', 'Active'),
(2, 'Cancellation Fee', 'Amount', 500, NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblphases`
--

CREATE TABLE `tblphases` (
  `phaseID` int(11) NOT NULL,
  `phaseName` varchar(250) CHARACTER SET utf8 NOT NULL,
  `phaseIcon` varchar(450) CHARACTER SET utf8 NOT NULL,
  `phaseStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblphases`
--

INSERT INTO `tblphases` (`phaseID`, `phaseName`, `phaseIcon`, `phaseStatus`) VALUES
(1, 'Carpentry', 'carpentry.png', 'Active'),
(2, 'Carving', 'carving.png', 'Active'),
(3, 'Filling', 'filling.png', 'Active'),
(4, 'Upholstery', 'upholstery.png', 'Active'),
(5, 'Finishing', 'finishing.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblprodphase_materials`
--

CREATE TABLE `tblprodphase_materials` (
  `pph_matID` int(11) NOT NULL,
  `pphID` int(11) NOT NULL,
  `pph_matDescID` int(11) NOT NULL,
  `pph_matQuan` int(11) NOT NULL,
  `pph_matStatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprodphase_materials`
--

INSERT INTO `tblprodphase_materials` (`pph_matID`, `pphID`, `pph_matDescID`, `pph_matQuan`, `pph_matStatus`) VALUES
(1, 135, 322, 2, 'Active'),
(2, 135, 263, 2, 'Active'),
(5, 145, 323, 2, 'Active'),
(6, 145, 326, 2, 'Active'),
(7, 147, 313, 2, 'Active'),
(8, 147, 313, 2, 'Active'),
(9, 147, 313, 2, 'Active'),
(10, 147, 313, 2, 'Active'),
(11, 147, 313, 2, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblprodsonpromo`
--

CREATE TABLE `tblprodsonpromo` (
  `onpromoID` int(11) NOT NULL,
  `prodPromoID` int(11) NOT NULL,
  `promoDescID` int(11) NOT NULL,
  `onPromoStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `productID` int(11) NOT NULL,
  `prodCatID` int(11) NOT NULL,
  `prodTypeID` int(11) NOT NULL,
  `prodFrameworkID` int(11) NOT NULL,
  `prodDesign` varchar(50) CHARACTER SET utf8 NOT NULL,
  `prodFabricID` int(11) DEFAULT NULL,
  `productName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `productDescription` varchar(450) CHARACTER SET utf8 DEFAULT NULL,
  `productPrice` double NOT NULL,
  `prodMainPic` varchar(100) CHARACTER SET utf8 NOT NULL,
  `prodSizeSpecs` varchar(100) CHARACTER SET utf8 NOT NULL,
  `prodStat` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`productID`, `prodCatID`, `prodTypeID`, `prodFrameworkID`, `prodDesign`, `prodFabricID`, `productName`, `productDescription`, `productPrice`, `prodMainPic`, `prodSizeSpecs`, `prodStat`) VALUES
(16, 7, 13, 9, '1', NULL, 'Queen', 'A queen sized bed', 50000, '2017-08-241503588669.png', '', 'Pre-Order'),
(17, 6, 17, 9, '3', 9, 'Elizabeth', 'A marvelous sofa', 35000, '2017-08-281503930441.png', ' L16.3â€³ x W16.3â€³ x H36.9â€³', 'Pre-Order'),
(18, 7, 13, 10, '1', NULL, 'Manilenia', 'An amazing furn', 25000, '2017-08-301504075842.png', '', 'Pre-Order'),
(19, 6, 17, 10, '1', NULL, 'Custom', 'A blue furniture', 10000, '', '120"x150"', 'For customization');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduction`
--

CREATE TABLE `tblproduction` (
  `productionID` int(11) NOT NULL,
  `productionOrderReq` int(11) DEFAULT NULL,
  `productionPackReq` int(11) DEFAULT NULL,
  `prodStartDate` date DEFAULT NULL,
  `prodEndDate` date DEFAULT NULL,
  `productionRemarks` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `productionStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblproduction_phase`
--

CREATE TABLE `tblproduction_phase` (
  `prodHistID` int(11) NOT NULL,
  `prodID` int(11) NOT NULL,
  `prodPhase` int(11) NOT NULL,
  `prodEmp` int(11) NOT NULL,
  `prodDateStart` date DEFAULT NULL,
  `prodDateEnd` date DEFAULT NULL,
  `prodEstDate` date DEFAULT NULL,
  `prodRemarks` varchar(450) CHARACTER SET latin1 DEFAULT NULL,
  `prodStatus` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblprod_info`
--

CREATE TABLE `tblprod_info` (
  `prodInfoID` int(11) NOT NULL,
  `prodInfoProduct` int(11) NOT NULL,
  `prodInfoPhase` int(11) NOT NULL,
  `prodInfoStatus` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblprod_info`
--

INSERT INTO `tblprod_info` (`prodInfoID`, `prodInfoProduct`, `prodInfoPhase`, `prodInfoStatus`) VALUES
(1, 18, 1, 'Active'),
(2, 18, 3, 'Active'),
(3, 17, 4, 'Active'),
(4, 18, 5, 'Active'),
(5, 18, 5, 'Active'),
(6, 16, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblprod_materials`
--

CREATE TABLE `tblprod_materials` (
  `p_matID` int(11) NOT NULL,
  `p_prodInfoID` int(11) NOT NULL,
  `p_matDescID` int(11) NOT NULL,
  `p_matQuantity` varchar(250) CHARACTER SET utf8 NOT NULL,
  `p_matStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblprod_materials`
--

INSERT INTO `tblprod_materials` (`p_matID`, `p_prodInfoID`, `p_matDescID`, `p_matQuantity`, `p_matStatus`) VALUES
(1, 1, 321, '2', 'Active'),
(2, 1, 263, '2', 'Active'),
(3, 1, 319, '2', 'Active'),
(4, 1, 323, '2', 'Active'),
(5, 1, 326, '2', 'Active'),
(6, 1, 257, '2', 'Active'),
(7, 2, 263, '3', 'Active'),
(8, 2, 322, '3', 'Active'),
(9, 3, 322, '2', 'Active'),
(10, 3, 263, '2', 'Active'),
(11, 4, 257, '2', 'Archived'),
(12, 5, 313, '2', 'Active'),
(13, 6, 324, '2', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblpromos`
--

CREATE TABLE `tblpromos` (
  `promoID` int(11) NOT NULL,
  `promoName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `tblproductID` int(11) NOT NULL,
  `promoDescription` varchar(450) CHARACTER SET utf8 NOT NULL,
  `promoStartDate` date NOT NULL,
  `promoEnd` date NOT NULL,
  `promoImage` varchar(450) CHARACTER SET utf8 DEFAULT NULL,
  `promoStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblpromos`
--

INSERT INTO `tblpromos` (`promoID`, `promoName`, `tblproductID`, `promoDescription`, `promoStartDate`, `promoEnd`, `promoImage`, `promoStatus`) VALUES
(1, 'Pre-Christmas Promo', 16, 'Free ''Queen'' for every purchase of selected furniture', '2017-10-16', '2017-10-18', '2017-10-171508235834.png', 'Active'),
(2, 'New', 16, 'Free Elizabeth', '2017-10-25', '2017-10-26', '2017-10-171508235834.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblpull_out`
--

CREATE TABLE `tblpull_out` (
  `pulloutID` int(11) NOT NULL,
  `pullout_fID` int(11) NOT NULL,
  `pullout_Date` date NOT NULL,
  `pullout_quantity` int(11) NOT NULL,
  `pullout_reason` varchar(45) NOT NULL,
  `pullout_Remarks` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblrelease`
--

CREATE TABLE `tblrelease` (
  `releaseID` int(11) NOT NULL,
  `releaseDate` datetime NOT NULL,
  `releaseType` varchar(50) NOT NULL,
  `releaseRemarks` varchar(450) DEFAULT NULL,
  `releaseStatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblrelease_details`
--

CREATE TABLE `tblrelease_details` (
  `rel_detailsID` int(11) NOT NULL,
  `tblreleaseID` int(11) NOT NULL,
  `rel_orderReqID` int(11) NOT NULL,
  `rel_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblreview`
--

CREATE TABLE `tblreview` (
  `reviewID` int(11) NOT NULL,
  `tblproductID` int(11) DEFAULT NULL,
  `tblpackageID` int(11) DEFAULT NULL,
  `tblcustomerID` int(11) NOT NULL,
  `reviewDescription` varchar(1000) DEFAULT NULL,
  `reviewStatus` varchar(45) NOT NULL,
  `reviewRating` int(3) NOT NULL,
  `reviewDate` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsupplier`
--

CREATE TABLE `tblsupplier` (
  `supplierID` int(11) NOT NULL,
  `supCompName` varchar(250) CHARACTER SET utf8 NOT NULL,
  `supCompAdd` varchar(100) CHARACTER SET utf8 NOT NULL,
  `supCompNum` varchar(20) CHARACTER SET utf8 NOT NULL,
  `supContactPerson` varchar(100) CHARACTER SET utf8 NOT NULL,
  `supPosition` varchar(45) CHARACTER SET utf8 NOT NULL,
  `supStatus` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblsupplier`
--

INSERT INTO `tblsupplier` (`supplierID`, `supCompName`, `supCompAdd`, `supCompNum`, `supContactPerson`, `supPosition`, `supStatus`) VALUES
(15, 'FNCENT Trees and Woods Inc.', '1234 Bill Street Batasan Hills Quezon City', '+63 (124) 534-3414', 'Mr. Jung', 'Manager', 'Listed'),
(16, 'SMENT Fabrics and Prints', '111 Gangnamgu Seoul South Korea', '+63 (999) 414-5004', 'Lee Soo Man', 'Manager', 'Listed'),
(17, 'AA', '111 Resolution Rd. Batasan Hills Quezon City', '+63 (237) 642-9312', 'Mr. Lee', 'Manager', 'Listed'),
(18, 'l;efjdor2093729ueij', 'skdjksaljdklwjde1913982938209`o!!22jkeljd', '+63 (922) 938-7812', 'idaskhdkjahsoi', 'u398139817872egwajhzgwHJSW', 'Listed');

-- --------------------------------------------------------

--
-- Table structure for table `tblunitofmeasure`
--

CREATE TABLE `tblunitofmeasure` (
  `unID` int(11) NOT NULL,
  `unType` varchar(50) CHARACTER SET utf8 NOT NULL,
  `unUnit` varchar(10) CHARACTER SET utf8 NOT NULL,
  `unStatus` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblunitofmeasure`
--

INSERT INTO `tblunitofmeasure` (`unID`, `unType`, `unUnit`, `unStatus`) VALUES
(14, 'Feet', 'ft', 'Active'),
(15, 'Meter', 'm', 'Active'),
(16, 'Gram', 'g', 'Active'),
(17, 'Inch', 'in', 'Active'),
(18, 'Pieces', 'pcs', 'Active'),
(25, 'Centimeters', 'cm', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblunitofmeasurement_category`
--

CREATE TABLE `tblunitofmeasurement_category` (
  `uncategoryID` int(11) NOT NULL,
  `uncategoryName` varchar(50) CHARACTER SET latin1 NOT NULL,
  `uncategoryStatus` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblunitofmeasurement_category`
--

INSERT INTO `tblunitofmeasurement_category` (`uncategoryID`, `uncategoryName`, `uncategoryStatus`) VALUES
(0, 'Description', 'Hidden'),
(11, 'Length', 'Active'),
(13, 'Area', 'Archived'),
(14, 'Weight', 'Active'),
(19, 'Amount', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblunit_cat`
--

CREATE TABLE `tblunit_cat` (
  `unitcatID` int(11) NOT NULL,
  `unitID` int(11) NOT NULL,
  `uncategoryName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `unitcatStatus` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblunit_cat`
--

INSERT INTO `tblunit_cat` (`unitcatID`, `unitID`, `uncategoryName`, `unitcatStatus`) VALUES
(20, 16, 'Weight', 'Active'),
(21, 17, 'Length', 'Active'),
(29, 25, 'Length', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `userID` int(11) NOT NULL,
  `userName` varchar(80) CHARACTER SET utf8 NOT NULL,
  `userPassword` varchar(45) CHARACTER SET utf8 NOT NULL,
  `userStatus` varchar(45) CHARACTER SET utf8 NOT NULL,
  `userType` varchar(45) CHARACTER SET utf8 NOT NULL,
  `userCustID` int(20) DEFAULT NULL,
  `userEmpID` int(11) DEFAULT NULL,
  `dateCreated` date NOT NULL,
  `confirmedUser` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userID`, `userName`, `userPassword`, `userStatus`, `userType`, `userCustID`, `userEmpID`, `dateCreated`, `confirmedUser`) VALUES
(1, 'eyembisi', 'admin', 'Active', 'admin', NULL, 1, '2017-08-24', NULL),
(4, 'airaem', 'admin', 'active', 'customer', 19, NULL, '2017-08-27', NULL),
(5, 'hongkaisoo', 'admin', 'active', 'customer', 31, NULL, '2017-09-01', 1),
(6, 'kuyasehun', 'kuyasehun', 'active', 'customer', 32, NULL, '2017-10-10', NULL),
(7, 'kuyajongin', 'kuyajongin', 'active', 'customer', 33, NULL, '2017-10-10', NULL),
(8, 'kuyaksoo', 'kuyaksoo', 'active', 'customer', 34, NULL, '2017-10-10', 1),
(9, 'kuyasuho', 'kuyasuho', 'active', 'customer', 35, NULL, '2017-10-11', NULL),
(10, 'kuyajongdae', 'kuyajongdae', 'active', 'customer', 36, NULL, '2017-10-11', NULL),
(11, 'kuyakyung', 'kuyakyung', 'active', 'customer', 37, NULL, '2017-10-11', NULL),
(12, 'harpa', 'harpa', 'active', 'customer', 38, NULL, '2017-10-11', NULL),
(13, 'aa', 'aa', 'active', 'customer', 39, NULL, '2017-10-11', NULL),
(14, 'ksoo', 'ksoo', 'active', 'customer', 40, NULL, '2017-10-11', 1),
(15, 'hanso', 'admin', 'Active', 'admin', NULL, 2, '2017-10-16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblattributes`
--
ALTER TABLE `tblattributes`
  ADD PRIMARY KEY (`attributeID`);

--
-- Indexes for table `tblattribute_measure`
--
ALTER TABLE `tblattribute_measure`
  ADD PRIMARY KEY (`amID`),
  ADD KEY `attribute_idx` (`attributeID`),
  ADD KEY `unit_idx` (`uncategoryID`);

--
-- Indexes for table `tblbank_accounts`
--
ALTER TABLE `tblbank_accounts`
  ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `tblbranches`
--
ALTER TABLE `tblbranches`
  ADD PRIMARY KEY (`branchID`);

--
-- Indexes for table `tblcheck_details`
--
ALTER TABLE `tblcheck_details`
  ADD PRIMARY KEY (`check_detailsID`),
  ADD KEY `payDet_idx` (`p_detailsID`);

--
-- Indexes for table `tblcompany_info`
--
ALTER TABLE `tblcompany_info`
  ADD PRIMARY KEY (`comp_recID`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `tblcustomize_request`
--
ALTER TABLE `tblcustomize_request`
  ADD PRIMARY KEY (`customizedID`),
  ADD KEY `cutsmero_ID_indx_idx` (`tblcustomerID`);

--
-- Indexes for table `tblcust_req_images`
--
ALTER TABLE `tblcust_req_images`
  ADD PRIMARY KEY (`cust_req_imagesID`),
  ADD KEY `cust_req_ID_idx` (`cust_req_ID`);

--
-- Indexes for table `tbldelivery`
--
ALTER TABLE `tbldelivery`
  ADD PRIMARY KEY (`deliveryID`),
  ADD KEY `tblreleaseid_tbldelivery_idx` (`deliveryReleaseID`);

--
-- Indexes for table `tbldelivery_history`
--
ALTER TABLE `tbldelivery_history`
  ADD PRIMARY KEY (`delHistID`),
  ADD KEY `delRecID_indx_idx` (`delHist_recID`),
  ADD KEY `delMan_indx_idx` (`delHistDeliveryMan`);

--
-- Indexes for table `tbldelivery_rates`
--
ALTER TABLE `tbldelivery_rates`
  ADD PRIMARY KEY (`delivery_rateID`),
  ADD KEY `fromBranch_idx` (`delBranchID`);

--
-- Indexes for table `tbldelivery_status`
--
ALTER TABLE `tbldelivery_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldesign_phase`
--
ALTER TABLE `tbldesign_phase`
  ADD PRIMARY KEY (`d_phaseID`),
  ADD KEY `design_idx` (`p_design`),
  ADD KEY `phase_idx` (`d_phase`),
  ADD KEY `d_idx` (`p_design`);

--
-- Indexes for table `tbldiscounts`
--
ALTER TABLE `tbldiscounts`
  ADD PRIMARY KEY (`discountID`);

--
-- Indexes for table `tbldownpayment`
--
ALTER TABLE `tbldownpayment`
  ADD PRIMARY KEY (`downpaymentID`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`empID`);

--
-- Indexes for table `tblemp_job`
--
ALTER TABLE `tblemp_job`
  ADD PRIMARY KEY (`emp_jobID`),
  ADD KEY `empName_idx` (`emp_empID`),
  ADD KEY `jobName_idx` (`emp_jobDescID`);

--
-- Indexes for table `tblfabrics`
--
ALTER TABLE `tblfabrics`
  ADD PRIMARY KEY (`fabricID`),
  ADD KEY `ftype_idx` (`fabricTypeID`),
  ADD KEY `fpattern_idx` (`fabricPatternID`);

--
-- Indexes for table `tblfabric_pattern`
--
ALTER TABLE `tblfabric_pattern`
  ADD PRIMARY KEY (`f_patternID`);

--
-- Indexes for table `tblfabric_texture`
--
ALTER TABLE `tblfabric_texture`
  ADD PRIMARY KEY (`textureID`);

--
-- Indexes for table `tblfabric_type`
--
ALTER TABLE `tblfabric_type`
  ADD PRIMARY KEY (`f_typeID`),
  ADD KEY `texture_idx` (`f_typeTextureID`);

--
-- Indexes for table `tblframeworks`
--
ALTER TABLE `tblframeworks`
  ADD PRIMARY KEY (`frameworkID`),
  ADD KEY `design_idx` (`framedesignID`),
  ADD KEY `material_idx` (`materialUsedID`),
  ADD KEY `furn_type_idx` (`frameworkFurnType`);

--
-- Indexes for table `tblframe_design`
--
ALTER TABLE `tblframe_design`
  ADD PRIMARY KEY (`designID`);

--
-- Indexes for table `tblframe_material`
--
ALTER TABLE `tblframe_material`
  ADD PRIMARY KEY (`materialID`);

--
-- Indexes for table `tblfurn_category`
--
ALTER TABLE `tblfurn_category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `tblfurn_design`
--
ALTER TABLE `tblfurn_design`
  ADD PRIMARY KEY (`designID`);

--
-- Indexes for table `tblfurn_type`
--
ALTER TABLE `tblfurn_type`
  ADD PRIMARY KEY (`typeID`),
  ADD KEY `furn_category_idx` (`typeCategoryID`);

--
-- Indexes for table `tblinvoicedetails`
--
ALTER TABLE `tblinvoicedetails`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `orderinv_idx` (`invorderID`),
  ADD KEY `discounts_ndx_idx` (`invDiscount`);

--
-- Indexes for table `tbljobs`
--
ALTER TABLE `tbljobs`
  ADD PRIMARY KEY (`jobID`);

--
-- Indexes for table `tbllogs`
--
ALTER TABLE `tbllogs`
  ADD PRIMARY KEY (`logID`),
  ADD KEY `user_idx` (`userID`);

--
-- Indexes for table `tblmaterials`
--
ALTER TABLE `tblmaterials`
  ADD PRIMARY KEY (`materialID`),
  ADD KEY `matType_idx` (`materialType`);

--
-- Indexes for table `tblmat_actions`
--
ALTER TABLE `tblmat_actions`
  ADD PRIMARY KEY (`mat_actionsID`),
  ADD KEY `matInventory_idx` (`mat_intID`);

--
-- Indexes for table `tblmat_deductdetails`
--
ALTER TABLE `tblmat_deductdetails`
  ADD PRIMARY KEY (`mat_deductID`),
  ADD KEY `mat_inventoryID` (`mat_inventoryID`);

--
-- Indexes for table `tblmat_deliveries`
--
ALTER TABLE `tblmat_deliveries`
  ADD PRIMARY KEY (`mat_deliveriesID`),
  ADD KEY `supplier_idx` (`supplierID`);

--
-- Indexes for table `tblmat_deliverydetails`
--
ALTER TABLE `tblmat_deliverydetails`
  ADD PRIMARY KEY (`del_detailsID`),
  ADD KEY `matDeliveries_idx` (`del_matDelID`),
  ADD KEY `matVarID_idx` (`del_matVarID`);

--
-- Indexes for table `tblmat_inventory`
--
ALTER TABLE `tblmat_inventory`
  ADD PRIMARY KEY (`mat_inventoryID`),
  ADD KEY `matVariant_idx` (`matVariantID`);

--
-- Indexes for table `tblmat_type`
--
ALTER TABLE `tblmat_type`
  ADD PRIMARY KEY (`matTypeID`);

--
-- Indexes for table `tblmat_var`
--
ALTER TABLE `tblmat_var`
  ADD PRIMARY KEY (`mat_varID`),
  ADD KEY `material_idx` (`materialID`);

--
-- Indexes for table `tblmodeofpayment`
--
ALTER TABLE `tblmodeofpayment`
  ADD PRIMARY KEY (`modeofpaymentID`);

--
-- Indexes for table `tblnewsletter`
--
ALTER TABLE `tblnewsletter`
  ADD PRIMARY KEY (`newsID`),
  ADD KEY `user_author_idx` (`newsletterAuthor`),
  ADD KEY `user_author_` (`newsletterAuthor`);

--
-- Indexes for table `tblnotification`
--
ALTER TABLE `tblnotification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid_ref_idx` (`tblcustomerID`),
  ADD KEY `orderid_ref_idx` (`tblorderID`);

--
-- Indexes for table `tblonhand`
--
ALTER TABLE `tblonhand`
  ADD PRIMARY KEY (`onHandID`),
  ADD KEY `prod_indx_idx` (`ohProdID`);

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `tlbuserID_idx` (`receivedbyUserID`);

--
-- Indexes for table `tblorder_actions`
--
ALTER TABLE `tblorder_actions`
  ADD PRIMARY KEY (`orActionID`),
  ADD KEY `ordertbl_idx_idx` (`orOrderID`);

--
-- Indexes for table `tblorder_request`
--
ALTER TABLE `tblorder_request`
  ADD PRIMARY KEY (`order_requestID`),
  ADD KEY `tblorder_id_indx_idx` (`tblOrdersID`),
  ADD KEY `tblprod_id_indx_idx` (`orderProductID`),
  ADD KEY `tblpack_id_indx_idx` (`orderPackageID`);

--
-- Indexes for table `tblorder_requestcnt`
--
ALTER TABLE `tblorder_requestcnt`
  ADD PRIMARY KEY (`orreq_cntID`),
  ADD KEY `ord_req_id_indx_idx` (`orreq_ID`);

--
-- Indexes for table `tblorder_return`
--
ALTER TABLE `tblorder_return`
  ADD PRIMARY KEY (`returnID`),
  ADD KEY `tblorder_req_indx_idx` (`tblorderReqID`);

--
-- Indexes for table `tblpackages`
--
ALTER TABLE `tblpackages`
  ADD PRIMARY KEY (`packageID`);

--
-- Indexes for table `tblpackage_inclusions`
--
ALTER TABLE `tblpackage_inclusions`
  ADD PRIMARY KEY (`package_inclusionID`),
  ADD KEY `prod_indx_pack_idx` (`product_incID`),
  ADD KEY `pack_indx_prod_idx` (`package_incID`);

--
-- Indexes for table `tblpackage_orderreq`
--
ALTER TABLE `tblpackage_orderreq`
  ADD PRIMARY KEY (`por_ID`),
  ADD KEY `product_indx_idx` (`por_prID`),
  ADD KEY `or_req_id_indx_idx` (`por_orReqID`);

--
-- Indexes for table `tblpayment_details`
--
ALTER TABLE `tblpayment_details`
  ADD PRIMARY KEY (`payment_detailsID`),
  ADD KEY `mop_idx` (`mopID`),
  ADD KEY `invoice_idx` (`invID`);

--
-- Indexes for table `tblpenalty`
--
ALTER TABLE `tblpenalty`
  ADD PRIMARY KEY (`penaltyID`);

--
-- Indexes for table `tblphases`
--
ALTER TABLE `tblphases`
  ADD PRIMARY KEY (`phaseID`);

--
-- Indexes for table `tblprodphase_materials`
--
ALTER TABLE `tblprodphase_materials`
  ADD PRIMARY KEY (`pph_matID`),
  ADD KEY `pphID_idx` (`pphID`),
  ADD KEY `mateID_idx` (`pph_matDescID`);

--
-- Indexes for table `tblprodsonpromo`
--
ALTER TABLE `tblprodsonpromo`
  ADD PRIMARY KEY (`onpromoID`),
  ADD KEY `prodsOnSale_idx` (`prodPromoID`),
  ADD KEY `promodescid_idx` (`promoDescID`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `framworkcodeID_idx` (`prodFrameworkID`),
  ADD KEY `fabricodeID_idx` (`prodFabricID`),
  ADD KEY `type_idx` (`prodTypeID`),
  ADD KEY `categ_idx` (`prodCatID`);

--
-- Indexes for table `tblproduction`
--
ALTER TABLE `tblproduction`
  ADD PRIMARY KEY (`productionID`),
  ADD KEY `orReq_idx` (`productionOrderReq`);

--
-- Indexes for table `tblproduction_phase`
--
ALTER TABLE `tblproduction_phase`
  ADD PRIMARY KEY (`prodHistID`),
  ADD KEY `production_idx` (`prodID`),
  ADD KEY `phase_idx` (`prodPhase`),
  ADD KEY `employee_idx` (`prodEmp`);

--
-- Indexes for table `tblprod_info`
--
ALTER TABLE `tblprod_info`
  ADD PRIMARY KEY (`prodInfoID`),
  ADD KEY `prod_idx` (`prodInfoProduct`),
  ADD KEY `ph_idx` (`prodInfoPhase`);

--
-- Indexes for table `tblprod_materials`
--
ALTER TABLE `tblprod_materials`
  ADD PRIMARY KEY (`p_matID`),
  ADD KEY `prodInfo_idx` (`p_prodInfoID`),
  ADD KEY `p_desc_idx` (`p_matDescID`);

--
-- Indexes for table `tblpromos`
--
ALTER TABLE `tblpromos`
  ADD PRIMARY KEY (`promoID`),
  ADD KEY `prodID_idx` (`tblproductID`),
  ADD KEY `promo_prod_ID_idx` (`tblproductID`);

--
-- Indexes for table `tblpull_out`
--
ALTER TABLE `tblpull_out`
  ADD PRIMARY KEY (`pulloutID`),
  ADD KEY `fID_indx_idx` (`pullout_fID`);

--
-- Indexes for table `tblrelease`
--
ALTER TABLE `tblrelease`
  ADD PRIMARY KEY (`releaseID`);

--
-- Indexes for table `tblrelease_details`
--
ALTER TABLE `tblrelease_details`
  ADD PRIMARY KEY (`rel_detailsID`),
  ADD KEY `tblreleaseid_tblreleasedetails_idx` (`tblreleaseID`),
  ADD KEY `tblor_req_indx_idx` (`rel_orderReqID`);

--
-- Indexes for table `tblreview`
--
ALTER TABLE `tblreview`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `tblcustomerID` (`tblcustomerID`),
  ADD KEY `tblproductID` (`tblproductID`),
  ADD KEY `tblpackageID` (`tblpackageID`);

--
-- Indexes for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  ADD PRIMARY KEY (`supplierID`);

--
-- Indexes for table `tblunitofmeasure`
--
ALTER TABLE `tblunitofmeasure`
  ADD PRIMARY KEY (`unID`);

--
-- Indexes for table `tblunitofmeasurement_category`
--
ALTER TABLE `tblunitofmeasurement_category`
  ADD PRIMARY KEY (`uncategoryID`);

--
-- Indexes for table `tblunit_cat`
--
ALTER TABLE `tblunit_cat`
  ADD PRIMARY KEY (`unitcatID`),
  ADD KEY `unitID_idx` (`uncategoryName`),
  ADD KEY `uniofmeasureID_idx` (`unitID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`userID`,`userName`),
  ADD KEY `cust_idx` (`userCustID`),
  ADD KEY `emp_idx` (`userEmpID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblattributes`
--
ALTER TABLE `tblattributes`
  MODIFY `attributeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tblattribute_measure`
--
ALTER TABLE `tblattribute_measure`
  MODIFY `amID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tblbank_accounts`
--
ALTER TABLE `tblbank_accounts`
  MODIFY `accountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblbranches`
--
ALTER TABLE `tblbranches`
  MODIFY `branchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblcheck_details`
--
ALTER TABLE `tblcheck_details`
  MODIFY `check_detailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblcompany_info`
--
ALTER TABLE `tblcompany_info`
  MODIFY `comp_recID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tblcustomize_request`
--
ALTER TABLE `tblcustomize_request`
  MODIFY `customizedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblcust_req_images`
--
ALTER TABLE `tblcust_req_images`
  MODIFY `cust_req_imagesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbldelivery`
--
ALTER TABLE `tbldelivery`
  MODIFY `deliveryID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbldelivery_history`
--
ALTER TABLE `tbldelivery_history`
  MODIFY `delHistID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbldelivery_rates`
--
ALTER TABLE `tbldelivery_rates`
  MODIFY `delivery_rateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbldelivery_status`
--
ALTER TABLE `tbldelivery_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbldesign_phase`
--
ALTER TABLE `tbldesign_phase`
  MODIFY `d_phaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbldiscounts`
--
ALTER TABLE `tbldiscounts`
  MODIFY `discountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbldownpayment`
--
ALTER TABLE `tbldownpayment`
  MODIFY `downpaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `empID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblemp_job`
--
ALTER TABLE `tblemp_job`
  MODIFY `emp_jobID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblfabrics`
--
ALTER TABLE `tblfabrics`
  MODIFY `fabricID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tblfabric_pattern`
--
ALTER TABLE `tblfabric_pattern`
  MODIFY `f_patternID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tblfabric_texture`
--
ALTER TABLE `tblfabric_texture`
  MODIFY `textureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tblfabric_type`
--
ALTER TABLE `tblfabric_type`
  MODIFY `f_typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblframeworks`
--
ALTER TABLE `tblframeworks`
  MODIFY `frameworkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tblframe_design`
--
ALTER TABLE `tblframe_design`
  MODIFY `designID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblframe_material`
--
ALTER TABLE `tblframe_material`
  MODIFY `materialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblfurn_category`
--
ALTER TABLE `tblfurn_category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tblfurn_design`
--
ALTER TABLE `tblfurn_design`
  MODIFY `designID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblfurn_type`
--
ALTER TABLE `tblfurn_type`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tblinvoicedetails`
--
ALTER TABLE `tblinvoicedetails`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbljobs`
--
ALTER TABLE `tbljobs`
  MODIFY `jobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbllogs`
--
ALTER TABLE `tbllogs`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `tblmaterials`
--
ALTER TABLE `tblmaterials`
  MODIFY `materialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tblmat_actions`
--
ALTER TABLE `tblmat_actions`
  MODIFY `mat_actionsID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmat_deductdetails`
--
ALTER TABLE `tblmat_deductdetails`
  MODIFY `mat_deductID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmat_deliveries`
--
ALTER TABLE `tblmat_deliveries`
  MODIFY `mat_deliveriesID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmat_deliverydetails`
--
ALTER TABLE `tblmat_deliverydetails`
  MODIFY `del_detailsID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmat_inventory`
--
ALTER TABLE `tblmat_inventory`
  MODIFY `mat_inventoryID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmat_type`
--
ALTER TABLE `tblmat_type`
  MODIFY `matTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblmat_var`
--
ALTER TABLE `tblmat_var`
  MODIFY `mat_varID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;
--
-- AUTO_INCREMENT for table `tblmodeofpayment`
--
ALTER TABLE `tblmodeofpayment`
  MODIFY `modeofpaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblnewsletter`
--
ALTER TABLE `tblnewsletter`
  MODIFY `newsID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblnotification`
--
ALTER TABLE `tblnotification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblonhand`
--
ALTER TABLE `tblonhand`
  MODIFY `onHandID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblorder_actions`
--
ALTER TABLE `tblorder_actions`
  MODIFY `orActionID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblorder_request`
--
ALTER TABLE `tblorder_request`
  MODIFY `order_requestID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblorder_requestcnt`
--
ALTER TABLE `tblorder_requestcnt`
  MODIFY `orreq_cntID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblorder_return`
--
ALTER TABLE `tblorder_return`
  MODIFY `returnID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblpackage_inclusions`
--
ALTER TABLE `tblpackage_inclusions`
  MODIFY `package_inclusionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblpackage_orderreq`
--
ALTER TABLE `tblpackage_orderreq`
  MODIFY `por_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblpayment_details`
--
ALTER TABLE `tblpayment_details`
  MODIFY `payment_detailsID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblpenalty`
--
ALTER TABLE `tblpenalty`
  MODIFY `penaltyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblphases`
--
ALTER TABLE `tblphases`
  MODIFY `phaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblprodphase_materials`
--
ALTER TABLE `tblprodphase_materials`
  MODIFY `pph_matID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tblprodsonpromo`
--
ALTER TABLE `tblprodsonpromo`
  MODIFY `onpromoID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tblproduction`
--
ALTER TABLE `tblproduction`
  MODIFY `productionID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblproduction_phase`
--
ALTER TABLE `tblproduction_phase`
  MODIFY `prodHistID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblprod_info`
--
ALTER TABLE `tblprod_info`
  MODIFY `prodInfoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblprod_materials`
--
ALTER TABLE `tblprod_materials`
  MODIFY `p_matID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tblpromos`
--
ALTER TABLE `tblpromos`
  MODIFY `promoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblpull_out`
--
ALTER TABLE `tblpull_out`
  MODIFY `pulloutID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblrelease`
--
ALTER TABLE `tblrelease`
  MODIFY `releaseID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblrelease_details`
--
ALTER TABLE `tblrelease_details`
  MODIFY `rel_detailsID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblreview`
--
ALTER TABLE `tblreview`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  MODIFY `supplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tblunitofmeasure`
--
ALTER TABLE `tblunitofmeasure`
  MODIFY `unID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tblunitofmeasurement_category`
--
ALTER TABLE `tblunitofmeasurement_category`
  MODIFY `uncategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tblunit_cat`
--
ALTER TABLE `tblunit_cat`
  MODIFY `unitcatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblattribute_measure`
--
ALTER TABLE `tblattribute_measure`
  ADD CONSTRAINT `attribute` FOREIGN KEY (`attributeID`) REFERENCES `tblattributes` (`attributeID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `unit` FOREIGN KEY (`uncategoryID`) REFERENCES `tblunitofmeasurement_category` (`uncategoryID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblcheck_details`
--
ALTER TABLE `tblcheck_details`
  ADD CONSTRAINT `payDet` FOREIGN KEY (`p_detailsID`) REFERENCES `tblpayment_details` (`payment_detailsID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblcustomize_request`
--
ALTER TABLE `tblcustomize_request`
  ADD CONSTRAINT `cutsmero_ID_indx` FOREIGN KEY (`tblcustomerID`) REFERENCES `tblcustomer` (`customerID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblcust_req_images`
--
ALTER TABLE `tblcust_req_images`
  ADD CONSTRAINT `cust_req_ID` FOREIGN KEY (`cust_req_ID`) REFERENCES `tblcustomize_request` (`customizedID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbldelivery`
--
ALTER TABLE `tbldelivery`
  ADD CONSTRAINT `tblreleaseid_tbldelivery` FOREIGN KEY (`deliveryReleaseID`) REFERENCES `tblrelease` (`releaseID`) ON UPDATE CASCADE;

--
-- Constraints for table `tbldelivery_history`
--
ALTER TABLE `tbldelivery_history`
  ADD CONSTRAINT `delMan_indx` FOREIGN KEY (`delHistDeliveryMan`) REFERENCES `tblemployee` (`empID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `delRecID_indx` FOREIGN KEY (`delHist_recID`) REFERENCES `tbldelivery` (`deliveryID`) ON UPDATE CASCADE;

--
-- Constraints for table `tbldelivery_rates`
--
ALTER TABLE `tbldelivery_rates`
  ADD CONSTRAINT `fromBranch` FOREIGN KEY (`delBranchID`) REFERENCES `tblbranches` (`branchID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbldesign_phase`
--
ALTER TABLE `tbldesign_phase`
  ADD CONSTRAINT `d` FOREIGN KEY (`p_design`) REFERENCES `tblfurn_design` (`designID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p` FOREIGN KEY (`d_phase`) REFERENCES `tblphases` (`phaseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblemp_job`
--
ALTER TABLE `tblemp_job`
  ADD CONSTRAINT `empName` FOREIGN KEY (`emp_empID`) REFERENCES `tblemployee` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobName` FOREIGN KEY (`emp_jobDescID`) REFERENCES `tbljobs` (`jobID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblfabrics`
--
ALTER TABLE `tblfabrics`
  ADD CONSTRAINT `fabric_type` FOREIGN KEY (`fabricTypeID`) REFERENCES `tblfabric_type` (`f_typeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pattern` FOREIGN KEY (`fabricPatternID`) REFERENCES `tblfabric_pattern` (`f_patternID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblfabric_type`
--
ALTER TABLE `tblfabric_type`
  ADD CONSTRAINT `texture` FOREIGN KEY (`f_typeTextureID`) REFERENCES `tblfabric_texture` (`textureID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblframeworks`
--
ALTER TABLE `tblframeworks`
  ADD CONSTRAINT `design` FOREIGN KEY (`framedesignID`) REFERENCES `tblframe_design` (`designID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `furn_type` FOREIGN KEY (`frameworkFurnType`) REFERENCES `tblfurn_type` (`typeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `material` FOREIGN KEY (`materialUsedID`) REFERENCES `tblframe_material` (`materialID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblfurn_type`
--
ALTER TABLE `tblfurn_type`
  ADD CONSTRAINT `furn_category` FOREIGN KEY (`typeCategoryID`) REFERENCES `tblfurn_category` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblinvoicedetails`
--
ALTER TABLE `tblinvoicedetails`
  ADD CONSTRAINT `discounts_ndx` FOREIGN KEY (`invDiscount`) REFERENCES `tbldiscounts` (`discountID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orderinv` FOREIGN KEY (`invorderID`) REFERENCES `tblorders` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbllogs`
--
ALTER TABLE `tbllogs`
  ADD CONSTRAINT `user` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblmaterials`
--
ALTER TABLE `tblmaterials`
  ADD CONSTRAINT `matType` FOREIGN KEY (`materialType`) REFERENCES `tblmat_type` (`matTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblmat_actions`
--
ALTER TABLE `tblmat_actions`
  ADD CONSTRAINT `matInventory` FOREIGN KEY (`mat_intID`) REFERENCES `tblmat_inventory` (`mat_inventoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblmat_deductdetails`
--
ALTER TABLE `tblmat_deductdetails`
  ADD CONSTRAINT `mat_in_id_indx` FOREIGN KEY (`mat_inventoryID`) REFERENCES `tblmat_inventory` (`mat_inventoryID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblmat_deliveries`
--
ALTER TABLE `tblmat_deliveries`
  ADD CONSTRAINT `supplier` FOREIGN KEY (`supplierID`) REFERENCES `tblsupplier` (`supplierID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblmat_deliverydetails`
--
ALTER TABLE `tblmat_deliverydetails`
  ADD CONSTRAINT `mat_del_rec_indx` FOREIGN KEY (`del_matDelID`) REFERENCES `tblmat_deliveries` (`mat_deliveriesID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mat_var_rec_indx` FOREIGN KEY (`del_matVarID`) REFERENCES `tblmat_var` (`mat_varID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblmat_inventory`
--
ALTER TABLE `tblmat_inventory`
  ADD CONSTRAINT `mat_var_id_rec_indx` FOREIGN KEY (`matVariantID`) REFERENCES `tblmat_var` (`mat_varID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblmat_var`
--
ALTER TABLE `tblmat_var`
  ADD CONSTRAINT `m` FOREIGN KEY (`materialID`) REFERENCES `tblmaterials` (`materialID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblnewsletter`
--
ALTER TABLE `tblnewsletter`
  ADD CONSTRAINT `user_author` FOREIGN KEY (`newsletterAuthor`) REFERENCES `tbluser` (`userID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblnotification`
--
ALTER TABLE `tblnotification`
  ADD CONSTRAINT `customerid_ref` FOREIGN KEY (`tblcustomerID`) REFERENCES `tblcustomer` (`customerID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orderid_ref` FOREIGN KEY (`tblorderID`) REFERENCES `tblorders` (`orderID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblonhand`
--
ALTER TABLE `tblonhand`
  ADD CONSTRAINT `prod_indx` FOREIGN KEY (`ohProdID`) REFERENCES `tblproduct` (`productID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD CONSTRAINT `userID_indx` FOREIGN KEY (`receivedbyUserID`) REFERENCES `tbluser` (`userID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblorder_actions`
--
ALTER TABLE `tblorder_actions`
  ADD CONSTRAINT `ordertbl_idx` FOREIGN KEY (`orOrderID`) REFERENCES `tblorders` (`orderID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblorder_request`
--
ALTER TABLE `tblorder_request`
  ADD CONSTRAINT `tblorder_id_indx` FOREIGN KEY (`tblOrdersID`) REFERENCES `tblorders` (`orderID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tblpack_id_indx` FOREIGN KEY (`orderPackageID`) REFERENCES `tblpackages` (`packageID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tblprod_id_indx` FOREIGN KEY (`orderProductID`) REFERENCES `tblproduct` (`productID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblorder_requestcnt`
--
ALTER TABLE `tblorder_requestcnt`
  ADD CONSTRAINT `ord_req_id_indx` FOREIGN KEY (`orreq_ID`) REFERENCES `tblorder_request` (`order_requestID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblorder_return`
--
ALTER TABLE `tblorder_return`
  ADD CONSTRAINT `tblorder_req_indx` FOREIGN KEY (`tblorderReqID`) REFERENCES `tblorder_request` (`order_requestID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblpackage_inclusions`
--
ALTER TABLE `tblpackage_inclusions`
  ADD CONSTRAINT `pack_indx_prod` FOREIGN KEY (`package_incID`) REFERENCES `tblpackages` (`packageID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prod_indx_pack` FOREIGN KEY (`product_incID`) REFERENCES `tblproduct` (`productID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblpackage_orderreq`
--
ALTER TABLE `tblpackage_orderreq`
  ADD CONSTRAINT `or_req_id_indx` FOREIGN KEY (`por_orReqID`) REFERENCES `tblorder_request` (`order_requestID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblpayment_details`
--
ALTER TABLE `tblpayment_details`
  ADD CONSTRAINT `inv_details_id_indx` FOREIGN KEY (`invID`) REFERENCES `tblinvoicedetails` (`invoiceID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblprodphase_materials`
--
ALTER TABLE `tblprodphase_materials`
  ADD CONSTRAINT `mateID` FOREIGN KEY (`pph_matDescID`) REFERENCES `tblmat_var` (`mat_varID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pphID` FOREIGN KEY (`pphID`) REFERENCES `tblproduction_phase` (`prodHistID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblprodsonpromo`
--
ALTER TABLE `tblprodsonpromo`
  ADD CONSTRAINT `prodsOnSale` FOREIGN KEY (`prodPromoID`) REFERENCES `tblproduct` (`productID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `promodescid` FOREIGN KEY (`promoDescID`) REFERENCES `tblpromos` (`promoID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD CONSTRAINT `cat` FOREIGN KEY (`prodCatID`) REFERENCES `tblfurn_category` (`categoryID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fb` FOREIGN KEY (`prodFabricID`) REFERENCES `tblfabrics` (`fabricID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `framework` FOREIGN KEY (`prodFrameworkID`) REFERENCES `tblframeworks` (`frameworkID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `type` FOREIGN KEY (`prodTypeID`) REFERENCES `tblfurn_type` (`typeID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblproduction`
--
ALTER TABLE `tblproduction`
  ADD CONSTRAINT `ordReq` FOREIGN KEY (`productionOrderReq`) REFERENCES `tblorder_request` (`order_requestID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblproduction_phase`
--
ALTER TABLE `tblproduction_phase`
  ADD CONSTRAINT `empid_indx` FOREIGN KEY (`prodEmp`) REFERENCES `tblemployee` (`empID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productionid_indx` FOREIGN KEY (`prodID`) REFERENCES `tblproduction` (`productionID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblprod_info`
--
ALTER TABLE `tblprod_info`
  ADD CONSTRAINT `info_prod_id` FOREIGN KEY (`prodInfoProduct`) REFERENCES `tblproduct` (`productID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblprod_materials`
--
ALTER TABLE `tblprod_materials`
  ADD CONSTRAINT `prod_info_id_indx` FOREIGN KEY (`p_prodInfoID`) REFERENCES `tblprod_info` (`prodInfoID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblpromos`
--
ALTER TABLE `tblpromos`
  ADD CONSTRAINT `promo_prodID_indx` FOREIGN KEY (`tblproductID`) REFERENCES `tblproduct` (`productID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblpull_out`
--
ALTER TABLE `tblpull_out`
  ADD CONSTRAINT `fID_indx` FOREIGN KEY (`pullout_fID`) REFERENCES `tblproduct` (`productID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblrelease_details`
--
ALTER TABLE `tblrelease_details`
  ADD CONSTRAINT `tblor_req_indx` FOREIGN KEY (`rel_orderReqID`) REFERENCES `tblorder_request` (`order_requestID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tblrel_id_indx` FOREIGN KEY (`tblreleaseID`) REFERENCES `tblrelease` (`releaseID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblreview`
--
ALTER TABLE `tblreview`
  ADD CONSTRAINT `tblreview_ibfk_1` FOREIGN KEY (`tblcustomerID`) REFERENCES `tblcustomer` (`customerID`),
  ADD CONSTRAINT `tblreview_ibfk_2` FOREIGN KEY (`tblproductID`) REFERENCES `tblproduct` (`productID`),
  ADD CONSTRAINT `tblreview_ibfk_3` FOREIGN KEY (`tblpackageID`) REFERENCES `tblpackages` (`packageID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
