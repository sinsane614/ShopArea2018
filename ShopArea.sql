-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2019 at 06:22 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `addressuser`
--

CREATE TABLE `addressuser` (
  `AddressID` int(9) NOT NULL,
  `UserID` int(9) NOT NULL,
  `Address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `CountryID` int(9) NOT NULL,
  `CountAddress` int(1) NOT NULL,
  `AddressDefault` tinyint(1) NOT NULL COMMENT '1 use 0 not use'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addressuser`
--

INSERT INTO `addressuser` (`AddressID`, `UserID`, `Address`, `CountryID`, `CountAddress`, `AddressDefault`) VALUES
(1, 1, 'Bangkok Taling Chan 10170', 24, 1, 0),
(2, 1, '39/49 Phutthamonthon Sai 1 rd. Mahadthai 1 Village', 217, 2, 1),
(3, 1, 'I don\'t know who you are\r\nI don\'t understand you', 20, 3, 0),
(4, 2, '123', 13, 1, 1),
(5, 3, 'Main Address 3', 217, 1, 1),
(6, 3, 'Sub Address 3', 217, 2, 0),
(7, 4, 'Main Address 4', 217, 1, 1),
(8, 4, 'Sub Address 4', 41, 2, 0),
(9, 5, 'Main Address 5', 217, 1, 1),
(10, 5, 'Sub Address 5', 44, 2, 0),
(11, 6, 'Main Address 6', 217, 1, 1),
(12, 6, 'Sub Address 6', 38, 2, 0),
(13, 7, 'Main Address 7', 217, 1, 1),
(14, 8, 'Main Address 8', 217, 1, 1),
(15, 8, 'Sub Address 8', 44, 2, 0),
(16, 9, 'Main Address 9', 217, 1, 0),
(17, 9, 'Sub Address 9', 44, 2, 1),
(18, 10, 'Main Address 10', 217, 1, 0),
(19, 10, 'Sub Address 10', 72, 2, 0),
(20, 10, 'SemiSub Address 10 TEST', 217, 1, 1),
(21, 11, '19/555 ซอยนวมินทร์ 50 ถ.นวมินทร์ แขวงคลองกลุ่ม เขตบึงกุ่ม 10240', 217, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `banned`
--

CREATE TABLE `banned` (
  `UserID` int(9) NOT NULL,
  `BanDetail` text COLLATE utf8_unicode_ci NOT NULL,
  `BanStart` datetime NOT NULL,
  `BanEnd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banned`
--

INSERT INTO `banned` (`UserID`, `BanDetail`, `BanStart`, `BanEnd`) VALUES
(2, 'ขโมยจริงหลักฐานชัด โดนแบน 7 วันจ๊ะนะ', '2019-04-30 00:00:00', '2019-05-06 23:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `UserID` int(9) NOT NULL,
  `ProductDetailID` int(9) NOT NULL,
  `Quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`UserID`, `ProductDetailID`, `Quantity`) VALUES
(1, 7, 1),
(1, 10, 1),
(1, 41, 1),
(2, 33, 1),
(2, 60, 1),
(3, 7, 1),
(3, 16, 1),
(3, 36, 1),
(4, 42, 1),
(4, 48, 1),
(6, 25, 1),
(7, 20, 1),
(8, 9, 1),
(8, 41, 1),
(9, 29, 1),
(10, 12, 1),
(11, 58, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(9) NOT NULL,
  `CategoryType` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryType`) VALUES
(1, 'Beauty & Fitness'),
(2, 'Electronics'),
(3, 'Fashions'),
(4, 'Mom & Babies'),
(5, 'Home & Auto');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `OrderID` int(9) NOT NULL,
  `UserID` int(9) NOT NULL,
  `PromoCode` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SlipPurchase` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OrderDate` date NOT NULL,
  `OrderTime` time NOT NULL,
  `totalprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`OrderID`, `UserID`, `PromoCode`, `SlipPurchase`, `OrderDate`, `OrderTime`, `totalprice`) VALUES
(4, 1, 'P000001D', 'uploads/', '2019-05-21', '20:48:02', 729),
(5, 7, 'P000001F', NULL, '2019-04-29', '12:07:35', 6964),
(6, 9, 'P000001C', NULL, '2019-01-26', '12:17:32', 12250),
(7, 5, NULL, NULL, '2019-05-09', '12:22:26', 30250),
(8, 5, 'P000001A', NULL, '2019-05-29', '12:29:52', 1329),
(9, 5, NULL, 'uploads/', '2019-03-29', '12:42:03', 418),
(10, 5, 'P000001C', NULL, '2019-01-14', '12:42:28', 3560),
(11, 5, NULL, NULL, '2019-05-29', '12:43:24', 2060),
(12, 6, NULL, NULL, '2019-05-29', '12:49:44', 4027),
(13, 11, 'P000001C', NULL, '2019-05-26', '12:58:03', 39909),
(14, 10, NULL, NULL, '2019-04-29', '14:15:54', 13030),
(15, 3, NULL, NULL, '2019-05-21', '14:17:24', 2127),
(16, 3, 'P000001C', NULL, '2019-01-17', '14:18:56', 1210),
(17, 3, NULL, NULL, '2019-02-14', '14:20:25', 2130),
(18, 8, NULL, 'uploads/', '2019-03-30', '14:21:57', 2689),
(19, 8, NULL, NULL, '2019-03-17', '14:23:46', 714),
(20, 1, 'P000001I', NULL, '2019-03-12', '14:26:05', 26150),
(21, 1, 'P000001A', NULL, '2019-04-16', '14:27:09', 714),
(22, 2, NULL, NULL, '2019-02-12', '14:27:57', 2300),
(23, 2, 'P000001C', 'uploads/', '2019-05-28', '14:28:17', 4545),
(24, 11, NULL, NULL, '2019-05-01', '14:29:06', 11090),
(25, 9, 'P000001A', NULL, '2019-01-29', '14:33:01', 2010),
(26, 9, NULL, NULL, '2019-01-23', '14:34:53', 633),
(27, 6, 'P000001A', NULL, '2019-03-29', '14:36:18', 410),
(28, 4, 'P000001C', NULL, '2019-01-12', '14:38:14', 480),
(29, 4, NULL, NULL, '2019-04-29', '14:38:28', 1230),
(30, 7, NULL, NULL, '2019-03-29', '14:42:34', 6530),
(31, 7, NULL, NULL, '2019-02-17', '14:43:57', 1800),
(32, 7, NULL, NULL, '2019-01-12', '14:46:02', 828);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `CountryID` int(9) NOT NULL,
  `CountryCode` varchar(2) NOT NULL COMMENT 'CountryCode',
  `Countryname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryID`, `CountryCode`, `Countryname`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'SS', 'South Sudan'),
(203, 'ES', 'Spain'),
(204, 'LK', 'Sri Lanka'),
(205, 'SH', 'St. Helena'),
(206, 'PM', 'St. Pierre and Miquelon'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard and Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syrian Arab Republic'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania, United Republic of'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad and Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks and Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States minor outlying islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (U.S.)'),
(241, 'WF', 'Wallis and Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `deliverytype`
--

CREATE TABLE `deliverytype` (
  `DeliveryTypeID` int(9) NOT NULL,
  `ProductID` int(9) NOT NULL,
  `DeliveryType` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `DeliveryPrice` int(5) NOT NULL,
  `DeliveryTime` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `deliverytype`
--

INSERT INTO `deliverytype` (`DeliveryTypeID`, `ProductID`, `DeliveryType`, `DeliveryPrice`, `DeliveryTime`) VALUES
(1, 1, 'Kerry', 30, '3-5 วัน'),
(2, 2, 'EMS', 30, '3-4 วัน'),
(3, 2, 'Kerry', 50, '2-3 วัน'),
(4, 3, 'EMS', 30, '3 วัน'),
(5, 4, 'Kerry', 90, '1-2 วัน'),
(6, 4, 'EMS', 60, '3-4 วัน'),
(7, 5, 'Kerry', 150, '3-5 วัน'),
(8, 6, 'Kerry', 30, '3-5 วัน'),
(9, 7, 'Kerry', 30, '2-3 วัน'),
(10, 7, 'EMS', 25, '3 วัน'),
(11, 8, 'EMS', 30, '3 วัน'),
(12, 9, 'ลงทะเบียน', 15, '7 วัน'),
(13, 9, 'EMS', 30, '3-5 วัน'),
(14, 10, 'Kerry', 60, '2-3 วัน'),
(15, 11, 'EMS', 30, '3-5 วัน'),
(16, 12, 'EMS', 35, '3-5 วัน'),
(17, 13, 'ลงทะเบียน', 20, '3-5 วัน'),
(18, 14, 'Kerry', 120, '3-5 วัน'),
(19, 15, 'EMS', 60, '2-3 วัน'),
(20, 16, 'Kerry', 30, '2-3 วัน'),
(21, 17, 'Kerry', 60, '3-5 วัน'),
(22, 18, 'Kerry', 250, '2-3 วัน'),
(23, 19, 'ลงทะเบียน', 15, '5-7 วัน'),
(24, 19, 'EMS', 45, '3-5 วัน'),
(25, 20, 'EMS', 30, '3-5 วัน'),
(26, 21, 'ลงทะเบียน', 30, '5-7 วัน'),
(27, 21, 'EMS', 50, '3-5 วัน'),
(28, 22, 'Kerry', 40, '3-5 วัน'),
(29, 23, 'Kerry', 60, '3-5 วัน'),
(30, 23, 'EMS', 60, '3-5 วัน'),
(31, 24, 'Kerry', 90, '3-5 วัน'),
(32, 25, 'Kerry', 45, '3-5 วัน');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int(9) NOT NULL,
  `SFname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SLname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SGender` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `STel` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `S_DOB` date NOT NULL,
  `SEmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EmployeeIDCard` char(13) COLLATE utf8_unicode_ci NOT NULL,
  `PositionID` int(9) NOT NULL,
  `SUsername` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SPassword` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SAddress` text COLLATE utf8_unicode_ci NOT NULL,
  `SProfilePicture` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SCountry` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `SFname`, `SLname`, `SGender`, `STel`, `S_DOB`, `SEmail`, `EmployeeIDCard`, `PositionID`, `SUsername`, `SPassword`, `SAddress`, `SProfilePicture`, `SCountry`) VALUES
(1, 'Test', 'Test', 'M', '0888888888', '2019-04-01', 'test@gmail.com', '11234567891', 1, 'TestUser', 'password', 'test 10170', NULL, 'Thailand'),
(2, 'เทส', 'เทส', 'F', '0877777777', '2000-04-03', 'testto@email.com', '1101111111111', 2, 'Testto', 'Testto', 'i don\'t know', NULL, 'Thailand');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderDetailID` int(9) NOT NULL,
  `ProductDetailID` int(9) NOT NULL,
  `OrderQuantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`OrderDetailID`, `ProductDetailID`, `OrderQuantity`) VALUES
(5, 7, 1),
(6, 40, 1),
(7, 41, 1),
(8, 40, 2),
(9, 39, 5),
(10, 20, 1),
(10, 51, 2),
(11, 31, 2),
(12, 56, 1),
(13, 23, 4),
(14, 5, 3),
(15, 37, 2),
(16, 34, 1),
(17, 9, 1),
(18, 11, 1),
(19, 58, 1),
(20, 12, 2),
(21, 7, 3),
(22, 16, 2),
(23, 36, 5),
(24, 9, 1),
(25, 41, 1),
(26, 10, 1),
(27, 41, 1),
(28, 33, 2),
(29, 60, 3),
(30, 58, 1),
(31, 30, 10),
(32, 29, 2),
(33, 25, 1),
(34, 48, 1),
(35, 42, 3),
(36, 13, 1),
(37, 16, 3),
(38, 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ordershop`
--

CREATE TABLE `ordershop` (
  `OrderDetailID` int(9) NOT NULL,
  `SellerID` int(9) NOT NULL,
  `OrderID` int(9) NOT NULL,
  `StatusOrder` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `DeliveryTypeID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ordershop`
--

INSERT INTO `ordershop` (`OrderDetailID`, `SellerID`, `OrderID`, `StatusOrder`, `DeliveryTypeID`) VALUES
(5, 3, 4, '2', 4),
(6, 8, 5, '3', 22),
(7, 10, 5, '3', 23),
(8, 8, 6, '1', 22),
(9, 8, 7, '3', 22),
(10, 9, 8, '1', 11),
(11, 3, 9, '2', 17),
(12, 6, 10, '1', 29),
(13, 7, 11, '1', 14),
(14, 3, 12, '1', 2),
(15, 5, 12, '1', 21),
(16, 7, 12, '1', 19),
(17, 3, 13, '3', 5),
(18, 4, 13, '3', 7),
(19, 8, 13, '3', 31),
(20, 5, 14, '1', 8),
(21, 3, 15, '1', 4),
(22, 6, 16, '1', 9),
(23, 4, 17, '1', 20),
(24, 3, 18, '2', 5),
(25, 10, 19, '1', 23),
(26, 4, 20, '1', 7),
(27, 10, 21, '3', 23),
(28, 1, 22, '1', 18),
(29, 4, 23, '2', 32),
(30, 8, 24, '1', 31),
(31, 3, 25, '1', 17),
(32, 6, 26, '1', 16),
(33, 10, 27, '1', 15),
(34, 9, 28, '1', 26),
(35, 5, 29, '1', 25),
(36, 5, 30, '1', 8),
(37, 6, 31, '1', 9),
(38, 9, 32, '1', 11);

-- --------------------------------------------------------

--
-- Table structure for table `ordertracking`
--

CREATE TABLE `ordertracking` (
  `OrderDetailID` int(9) NOT NULL,
  `SlipTracking` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TrackingNumber` char(13) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ordertracking`
--

INSERT INTO `ordertracking` (`OrderDetailID`, `SlipTracking`, `TrackingNumber`) VALUES
(6, 'uploads/', '0000000000000'),
(7, 'uploads/', '0000000000000'),
(9, 'uploads/', '0000000000000'),
(17, 'uploads/', '0000000000000'),
(18, 'uploads/', '0000000000000'),
(19, 'uploads/', '0000000000000'),
(27, 'uploads/', '0000000000000');

-- --------------------------------------------------------

--
-- Table structure for table `positiontype`
--

CREATE TABLE `positiontype` (
  `PositionID` int(9) NOT NULL,
  `Position` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `positiontype`
--

INSERT INTO `positiontype` (`PositionID`, `Position`) VALUES
(1, 'Manger'),
(2, 'StaffBuyer'),
(3, 'StaffSeller'),
(4, 'StaffPomotion'),
(5, 'AdminBuyer'),
(6, 'AdminSeller'),
(7, 'AdminPromotion');

-- --------------------------------------------------------

--
-- Table structure for table `productdetail`
--

CREATE TABLE `productdetail` (
  `ProductDetailID` int(9) NOT NULL,
  `Type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Value` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Quantity` int(5) NOT NULL,
  `ProductID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `productdetail`
--

INSERT INTO `productdetail` (`ProductDetailID`, `Type`, `Value`, `Quantity`, `ProductID`) VALUES
(1, 'Color', 'Red', 10, 1),
(2, 'Color', 'Green', 10, 1),
(3, 'Color', 'Blue', 10, 1),
(4, 'Color', 'Red', 5, 2),
(5, 'Color', 'Green', 2, 2),
(6, 'Color', 'Blue', 5, 2),
(7, 'Size', '250ml', 5, 3),
(8, 'Color', 'Red', 15, 4),
(9, 'Color', 'Black', 13, 4),
(10, 'Color', 'Black', 3, 5),
(11, 'Color', 'Blue', 3, 5),
(12, 'Color', 'Grey', 3, 6),
(13, 'Color', 'Black', 4, 6),
(14, 'สี', 'ดำ', 15, 7),
(15, 'สี', 'ขาว', 15, 7),
(16, 'สี', 'น้ำเงิน', 10, 7),
(17, 'สี', 'ชมพู', 15, 7),
(18, 'สี', 'แดง', 15, 7),
(19, 'สี', 'เทา', 20, 8),
(20, 'สี', 'น้ำตาลอ่อน', 17, 8),
(21, 'สี', 'ส้ม', 1, 9),
(22, 'สี', 'ชมพู', 1, 9),
(23, 'สูตร', 'เด็กแรกเกิด', 11, 10),
(24, 'สูตร', 'เด็กเล็ก', 15, 10),
(25, 'Size', '38', 9, 11),
(26, 'Size', '44', 10, 11),
(27, 'Size', '48', 10, 11),
(28, 'สี', 'ชมพู', 5, 12),
(29, 'สี', 'ฟ้า', 3, 12),
(30, 'สี', 'แดง', 5, 13),
(31, 'สี', 'ฟ้า', 13, 13),
(32, 'Size', '60*140*80', 5, 14),
(33, 'Size', '50*200*80', 3, 14),
(34, 'สี', 'แดง', 4, 15),
(35, 'สี', 'ดำ', 5, 15),
(36, 'ขนาด', '60 ml', 5, 16),
(37, 'ผลิตภัณฑ์', 'English', 18, 17),
(38, 'ผลิตภัณฑ์', 'ไทย', 18, 17),
(39, 'สี', 'ดำ', 0, 18),
(40, 'สี', 'ชมพู', 2, 18),
(41, 'สี', 'ดำ', 17, 19),
(42, 'ขนาด', 'S', 12, 20),
(43, 'ขนาด', 'M', 20, 20),
(44, 'ขนาด', 'L', 10, 20),
(45, 'ขนาด', 'XL', 15, 20),
(46, 'ขนาด', 'XXL', 5, 20),
(47, 'Size EU', '37', 13, 21),
(48, 'Size EU', '38', 11, 21),
(49, 'Size EU', '39', 17, 21),
(50, 'Size EU', '40', 10, 21),
(51, 'Size EU', '41', 10, 21),
(52, 'Size EU', '42', 16, 21),
(53, 'Size EU', '43', 10, 21),
(54, 'Size EU', '44', 11, 21),
(55, 'ขนาด', '400 กรัม', 20, 22),
(56, 'สี', 'ฟ้า', 9, 23),
(57, 'สี', 'ชมพู', 10, 23),
(58, 'สี', 'ขาว', 8, 24),
(59, 'สี', 'ขาว', 13, 25),
(60, 'สี', 'เบจ', 7, 25),
(61, 'สี', 'เทา', 15, 25),
(62, 'สี', 'ฟ้า', 14, 25);

-- --------------------------------------------------------

--
-- Table structure for table `productpicture`
--

CREATE TABLE `productpicture` (
  `ProductID` int(9) NOT NULL,
  `ProductPicture` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `productpicture`
--

INSERT INTO `productpicture` (`ProductID`, `ProductPicture`) VALUES
(1, 'uploads/Lib.jpeg'),
(1, 'uploads/lib2.jpeg'),
(2, 'uploads/2_1.jpg'),
(2, 'uploads/2_2.jpg'),
(3, 'uploads/3_1.jpg'),
(3, 'uploads/3_2.jpg'),
(4, 'uploads/4_1.jpg'),
(4, 'uploads/4_2.jpg'),
(5, 'uploads/5_1.jpg'),
(5, 'uploads/5_2.jpg'),
(6, 'uploads/6_1.jpg'),
(6, 'uploads/6_2.jpg'),
(7, 'uploads/7_1.jpg'),
(7, 'uploads/7_2.jpg'),
(8, 'uploads/8_1.jpg'),
(8, 'uploads/8_2.jpg'),
(9, 'uploads/9_1.jpg'),
(9, 'uploads/9_2.jpg'),
(10, 'uploads/10-1.jpg'),
(10, 'uploads/10-2.jpg'),
(11, 'uploads/11-1.jpg'),
(11, 'uploads/11-2.jpg'),
(12, 'uploads/12-1.jpg'),
(12, 'uploads/12-2.jpg'),
(13, 'uploads/13-1.jpg'),
(13, 'uploads/13-2.jpg'),
(14, 'uploads/14-1.jpg'),
(14, 'uploads/14-2.jpg'),
(15, 'uploads/15-1.jpg'),
(15, 'uploads/15-2.jpg'),
(16, 'uploads/16-1.jpg'),
(16, 'uploads/16-2.jpg'),
(17, 'uploads/17-1.jpg'),
(17, 'uploads/17-2.jpg'),
(18, 'uploads/18-1.jpg'),
(18, 'uploads/18-2.jpg'),
(19, 'uploads/19-1.jpg'),
(19, 'uploads/19-2.jpg'),
(20, 'uploads/20-1.jpg'),
(21, 'uploads/21-1.jpg'),
(21, 'uploads/21-2.jpg'),
(21, 'uploads/21-3.jpg'),
(22, 'uploads/22-1.jpg'),
(23, 'uploads/23-1.jpg'),
(23, 'uploads/23-2.jpg'),
(24, 'uploads/24-1.jpg'),
(24, 'uploads/24-2.jpg'),
(24, 'uploads/24-3.jpg'),
(24, 'uploads/24-4.jpg'),
(25, 'uploads/25-1.jpg'),
(25, 'uploads/25-2.jpg'),
(25, 'uploads/25-3.jpg'),
(25, 'uploads/25-4.jpg'),
(25, 'uploads/25-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `PromoCode` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Discount` int(5) NOT NULL,
  `PromoDetail` text COLLATE utf8_unicode_ci NOT NULL,
  `StartTime` datetime NOT NULL,
  `EndTime` datetime NOT NULL,
  `PromoPicture` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Minimumbalance` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`PromoCode`, `Discount`, `PromoDetail`, `StartTime`, `EndTime`, `PromoPicture`, `Minimumbalance`) VALUES
('P0000000', 90, 'ลดราคาอุปกรณ์อิเล็กทรอนิกส์\r\nเมื่อซื้อยอดขั้นต่ำ 1000 บาท\r\nภายในวันที่ 1/5/2019 - 30/6/2019', '2019-05-01 00:00:00', '2019-06-30 00:00:00', 'uploads/099.jpg', 1000),
('P0000001', 50, 'ลดราคา 50 บาท เมื่อซื้อสินค้าประเภทแฟชั่น\r\nด่วน!!! ลดถึงปลายเดือนมิถุนายน 2562 เท่านั้น', '2019-05-01 00:00:00', '2019-06-30 00:00:00', 'uploads/6000195494285_R.jpg', 1500),
('P0000002', 100, 'ลดราคาสินค้าประเภทแม่และเด็ก 100 บาททันที\r\nเมื่อซื้อสินค้าครบ 2500 บาท\r\n\r\nภายใน 31 มิถุนายน 2562 นี้เท่านั้น!!', '2019-05-01 00:00:00', '2019-06-30 00:00:00', 'uploads/GUEST_f5d0cfc3-9d02-4ee0-a6c6-ed5dc09971d1', 2500),
('P0000003', 60, 'ลดทันที 200 บาท\r\nเมื่อซื้อสินค้าประเภทบ้านและอุปกรณ์\r\nยอดขั้นต่ำ 5000 บาท\r\nด่วน!! ก่อนสิ้นเดือน มิถุนายน', '2019-05-01 00:00:00', '2019-06-30 00:00:00', 'uploads/259450.jpg', 5000),
('P000001A', 30, 'Summer Sale เมื่อซื้อสินค้าประเภท เสื้อ ผ้า ร้องเท้า ลดทันที 30 % และมียอดเงินรวมต่อหนึ่งใบเสร็จมากกว่า 1000 บาทขึ้นไป', '2019-05-03 00:00:00', '2019-05-09 23:59:59', '5486248', 1000),
('P000001B', 30, 'Winter is coming Sale เมื่อซื้อสินค้าประเภท เสื้อ ผ้า ร้องเท้า  ลดทันที 30 % และมียอดเงินรวมต่อหนึ่งใบเสร็จมากกว่า 1000 บาทขึ้นไป', '2019-11-16 00:00:00', '2019-11-22 23:59:59', '5629785', 1000),
('P000001C', 20, 'ShopArea Day !! มียอดเงินรวมต่อหนึ่งใบเสร็จมากกว่า 1000 บาทขึ้นไป เพื่อใช้เป็นส่วนลด 20 %', '2019-05-30 00:00:00', '2019-05-30 23:59:59', '5629785', 1000),
('P000001D', 40, 'Songkran Festival sale!! เมื่อซื้อสินค้าประเภท เสื้อ ผ้า ร้องเท้า ลดทันที 40 % และมียอดเงินรวมต่อหนึ่งใบเสร็จมากกว่า 500 บาทขึ้นไป', '2019-04-11 00:00:00', '2019-04-25 23:59:59', '482148', 500),
('P000001E', 200, 'Back to School เมื่อซื้อสินค้าประเภท เสื้อผ้า ร้องเท้า นักเรียน ลดทันที 200บาท และมียอดเงินรวมต่อหนึ่งใบเสร็จมากกว่า 1500 บาทขึ้นไป', '2019-05-10 00:00:00', '2019-05-16 23:59:59', '789448', 1500),
('P000001F', 15, 'Ghost Festival (Phi Ta Khon) sale!! เมื่อซื้อสินค้าประเภท เสื้อ ผ้า ร้องเท้า ลดทันที 15 % และมียอดเงินรวมต่อหนึ่งใบเสร็จมากกว่า 250 บาทขึ้นไป', '2019-07-05 00:00:00', '2019-07-07 23:59:59', '5486248', 250),
('P000001G', 50, 'Chinese New Year sale!! เมื่อซื้อสินค้าประเภท เสื้อ ผ้า ร้องเท้า ลดทันที 50 % และมียอดเงินรวมต่อหนึ่งใบเสร็จมากกว่า 2000 บาทขึ้นไป', '2019-01-24 00:00:00', '2019-01-26 23:59:59', '5486248', 2000),
('P000001H', 50, 'christmas sale เมื่อซื้อสินค้าประเภท เสื้อ ผ้า ร้องเท้า ลดทันที 50 % และมียอดเงินรวมต่อหนึ่งใบเสร็จมากกว่า 3000 บาทขึ้นไป', '2019-12-23 00:00:00', '2019-12-17 23:59:59', '5486248', 3000),
('P000001I', 45, 'Candle Festival sale เมื่อซื้อสินค้าประเภท เสื้อ ผ้า ร้องเท้า ลดทันที 45 % และมียอดเงินรวมต่อหนึ่งใบเสร็จมากกว่า 1500 บาทขึ้นไป', '2019-07-30 00:00:00', '2019-08-01 23:59:59', '5486248', 1500),
('P000001J', 15, 'summer sale  ลด15 % เมื่อซื้อสินค้า G-Shock ยอดรวม 1500 บาท', '2019-02-11 00:00:00', '2019-02-13 23:59:59', '9524248', 1500),
('P000001V', 50, 'ลดราคาเครื่องสำอางค์', '2019-03-06 00:00:00', '2019-08-22 00:00:00', 'uploads/259450.jpg', 1000),
('P000011A', 100, 'ลดเครื่องสำอางค์', '2019-05-01 00:00:00', '2019-09-18 00:00:00', 'uploads/259450.jpg', 1000),
('P111111A', 200, 'ลดเครืองสำอางค์', '2019-05-01 00:00:00', '2019-05-31 00:00:00', 'uploads/259450.jpg', 300);

-- --------------------------------------------------------

--
-- Table structure for table `promotioncategory`
--

CREATE TABLE `promotioncategory` (
  `CategoryID` int(9) NOT NULL,
  `PromoCode` varchar(8) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promotioncategory`
--

INSERT INTO `promotioncategory` (`CategoryID`, `PromoCode`) VALUES
(1, 'P000001A'),
(1, 'P000001B'),
(1, 'P000001C'),
(1, 'P000001D'),
(1, 'P000001E'),
(1, 'P000001F'),
(1, 'P000001G'),
(1, 'P000001H'),
(1, 'P000001I'),
(1, 'P000001J'),
(1, 'P000011A'),
(1, 'P111111A'),
(2, 'P0000000'),
(3, 'P0000001'),
(3, 'P000001A'),
(3, 'P000001B'),
(3, 'P000001C'),
(3, 'P000001D'),
(3, 'P000001E'),
(3, 'P000001F'),
(3, 'P000001G'),
(3, 'P000001H'),
(3, 'P000001I'),
(3, 'P000001J'),
(4, 'P0000002'),
(4, 'P000001A'),
(4, 'P000001B'),
(4, 'P000001C'),
(4, 'P000001D'),
(4, 'P000001E'),
(4, 'P000001F'),
(4, 'P000001G'),
(4, 'P000001H'),
(4, 'P000001I'),
(4, 'P000001J'),
(5, 'P0000003');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ReportID` int(9) NOT NULL,
  `UserID` int(9) NOT NULL,
  `ReportCategoryID` int(9) NOT NULL,
  `ReportDetail` text COLLATE utf8_unicode_ci NOT NULL,
  `ReportStatus` int(1) NOT NULL DEFAULT '0',
  `ReportDate` date NOT NULL,
  `ReportTime` time NOT NULL,
  `ReportUser` int(9) NOT NULL,
  `EmployeeID` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ReportID`, `UserID`, `ReportCategoryID`, `ReportDetail`, `ReportStatus`, `ReportDate`, `ReportTime`, `ReportUser`, `EmployeeID`) VALUES
(1, 1, 2, 'เขาเอาตังผมไป', 0, '2019-01-03', '11:03:06', 2, NULL),
(2, 2, 1, 'เขาใส่ร้ายผม ผมไม่เคยขโมย', 0, '2019-02-06', '18:12:02', 1, NULL),
(7, 1, 1, 'TheLuckyBoy  โกงผมครับ เอาเงินไปแล้วไม่ส่งของคืน ', 1, '2019-05-29', '22:43:56', 11, NULL),
(8, 1, 3, 'แก้ไขโปรไฟล์ไม่ได้', 1, '2019-05-28', '22:54:20', 11, NULL),
(9, 1, 1, 'ร้าน Johnjojo ยังไม่ได้ส่งสินค้ามาเลยค่ะ สั่งไปตั้ง สองอาทิตแล้วยังไม่ส่งมาเลย', 1, '2019-05-30', '22:56:15', 7, NULL),
(10, 1, 3, 'คนชื่อ Sukij ก่อกวนผมครับ รบกวนช่วยรีพอทให้ทีครับ', 1, '2019-05-28', '22:58:31', 1, NULL),
(11, 1, 1, 'ร้าน John ส่งของไม่ตรงกับภาพที่โชว์ในเว็ปไซต์เลยค่ะ ช่วยตรวจสอบด้วยนะค่ะ', 1, '2019-04-12', '23:00:40', 3, NULL),
(12, 1, 1, 'ร้าน John โกงผมครับ สั่งของไป จ่ายเงินไปแล้ว บอกจะส่งภายใน 3 วัน แต่นี้ผ่านไปแล้ว สองสัปดารห์ ของยังไม่มาเลย ', 1, '2019-02-13', '23:02:17', 4, NULL),
(13, 1, 2, 'ต้องการติดต่อเรื่อง ขอติดโฆษาบนเว็ปไซต์คุณ ค่ะ ติดต่อกลับมาได้ที่ Kenny_lovever@gmail.com', 1, '2019-05-12', '23:04:55', 6, NULL),
(14, 1, 1, 'ร้าน John ซื้อของจากร้าน John ไป จ่ายเงินไปแล้ว ตอนนี้ผ่านไป 7 วันแล้วยังไม่ได้ของมาเลย ช่วยตรวจสอบให้ด้วยนะครับ', 1, '2019-05-01', '23:06:37', 10, NULL),
(15, 1, 1, 'มี ผู้ใช้คนอื่นมา รีวิวสินค้าผมในแง่ลบครับ ใช่ภาษาไม่สุภาพอีก ผมไม่ได้โกงนะคับ ช่วยตรวจสอบให้ด้วยครับ', 1, '2019-03-15', '23:08:22', 5, NULL),
(16, 1, 2, 'ได้สินค้าไม่ตรงกับตัวอย่างเลยครับ อบากขอเงิยคืน ซื้อมาจากร้านชื่อ JohnShop', 1, '2019-05-26', '23:10:06', 8, NULL),
(17, 1, 1, 'เค้าโกงผมครับ รอของมา 7 วันแล้วยังไม่ได้ของมาเลยครับ', 1, '2019-05-28', '23:12:17', 5, NULL),
(18, 1, 2, 'ส่งของไม่ตรงกับภาพเลยครับ  ที่แรกนึกว่าเป็นคนเดียวแต่เห็นรีวิวหลายคนก็เป็นกัน รบกวนช่วยแบนด้วยครับ', 1, '2019-05-29', '23:18:50', 5, NULL),
(19, 1, 1, 'ช่วยแบนทีครับ เค้าโกงผม', 1, '2019-04-16', '23:20:52', 5, NULL),
(20, 1, 1, 'เค้าโกงครับ ช่วยแบนด้วยครับ แล้วค่าเสียหายที่ผมโดนโกงไปใครเป็นคนจ่ายคับ', 1, '2019-03-14', '23:21:46', 5, NULL),
(21, 1, 3, 'ช่วยแบนด้วยครับ', 1, '2019-04-13', '23:23:26', 5, NULL),
(22, 1, 3, 'เค้ามาสแปมหน้าร้านค้าผม ช่วยแบนให้หน่อยคับ', 1, '2019-05-27', '23:24:48', 7, NULL),
(23, 1, 2, 'แก้ไข้หน้าโปรไฟล์ ไม่ได้ค่ะ รบกวนช่วยตรวจสอบด้วยค่ะ', 1, '2019-05-28', '23:26:13', 7, NULL),
(24, 1, 1, 'สั่งขอไป 5 วันแล้วแต่ของยังไม่ส่งมาเลย ช่วยตรวจสอบให้ด้วย', 1, '2019-01-30', '23:27:39', 9, NULL),
(25, 1, 1, 'ซื้อไม่ได้', 1, '2019-05-30', '22:54:19', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reportcategory`
--

CREATE TABLE `reportcategory` (
  `ReportCategoryID` int(9) NOT NULL,
  `ReportCategory` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reportcategory`
--

INSERT INTO `reportcategory` (`ReportCategoryID`, `ReportCategory`) VALUES
(1, 'Buyer'),
(2, 'Seller'),
(3, 'Another');

-- --------------------------------------------------------

--
-- Table structure for table `reportpic`
--

CREATE TABLE `reportpic` (
  `ReportPicture` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ReportID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reportpic`
--

INSERT INTO `reportpic` (`ReportPicture`, `ReportID`) VALUES
('drive.com/banTEST', 1),
('uploads/71.jpg', 7),
('uploads/8.', 8),
('uploads/9.', 9),
('uploads/10.', 10),
('uploads/11.', 11),
('uploads/12.', 12),
('uploads/13.', 13),
('uploads/14.', 14),
('uploads/15.', 15),
('uploads/16.', 16),
('uploads/173.jpg', 17),
('uploads/181.jpg', 18),
('uploads/19.', 19),
('uploads/202.jpg', 20),
('uploads/213.jpg', 21),
('uploads/222.jpg', 22),
('uploads/231.jpg', 23),
('uploads/24.', 24),
('uploads/25259450.jpg', 25);

-- --------------------------------------------------------

--
-- Table structure for table `reportposition`
--

CREATE TABLE `reportposition` (
  `ReportID` int(9) NOT NULL,
  `PositionID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reportposition`
--

INSERT INTO `reportposition` (`ReportID`, `PositionID`) VALUES
(1, 1),
(2, 2),
(7, 1),
(7, 2),
(7, 5),
(8, 1),
(8, 3),
(8, 6),
(9, 1),
(9, 2),
(9, 5),
(10, 1),
(10, 2),
(10, 5),
(11, 1),
(11, 2),
(11, 5),
(12, 1),
(12, 2),
(12, 5),
(13, 1),
(13, 3),
(13, 6),
(14, 1),
(14, 2),
(14, 5),
(15, 1),
(15, 2),
(15, 5),
(16, 1),
(16, 2),
(16, 5),
(17, 1),
(17, 2),
(17, 5),
(18, 1),
(18, 2),
(18, 5),
(19, 1),
(19, 2),
(19, 5),
(20, 1),
(20, 2),
(20, 5),
(21, 1),
(21, 2),
(21, 5),
(22, 1),
(22, 2),
(22, 5),
(23, 1),
(23, 3),
(23, 6),
(24, 1),
(24, 2),
(24, 5),
(25, 1),
(25, 2),
(25, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reviewproduct`
--

CREATE TABLE `reviewproduct` (
  `ReviewID` int(9) NOT NULL,
  `ProductID` int(9) NOT NULL,
  `OrderID` int(9) NOT NULL,
  `Rating` float NOT NULL,
  `Comment` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviewproduct`
--

INSERT INTO `reviewproduct` (`ReviewID`, `ProductID`, `OrderID`, `Rating`, `Comment`) VALUES
(1, 18, 5, 0, 'ส่งไว แช่ของได้เยอะดีค่ะ'),
(2, 18, 5, 2, 'สภาพดี ไม่ผิดหวังค่ะ'),
(3, 18, 6, 1, 'ส่งของเร็วมากครับ ใช้มาแล้ว 5 เดืิอน ยังเย็นปกติ น้ำแข็งไม่เกาะช่องฟิช  '),
(4, 21, 8, 1, 'โอนิของแท้ ครับ ใส่สบาย '),
(5, 8, 8, 2, 'ส่งของเร็วครับ ของใส่แล้วใส่สบายมากครับ พ่อค้าเป็นกันเองมากคับ'),
(6, 10, 11, 4, 'ส่งช้า กล่องบุบ ไม่รู้ว่าจากคนซื้อ หรือ คนส่ง ให้ 2 ดาวพอ'),
(7, 23, 10, 5, 'สินค้าไม่มีความแข็งแรงเลย ใช้ไปแค่4-5 ครั้ง เหล็กตรงล้อก็หักแล้ว  ลูกนน.2-3 โล ก็หักแล้ว แย่'),
(8, 17, 12, 1, 'ของดีค่ะ แห้งเร็วมา หลังใช้ไป 2 อาทิตย์ หน้าดูข้าวขึ้นจริงค่ะ ชอบๆ'),
(9, 2, 12, 4, 'สีไม่เหมือนในรูปเลยยย เอาไป 2ดาวพอ'),
(10, 15, 12, 2, 'ของดีค่ะ ไม่พูดเยอะเจ็บขอ ยี่ห้อนี้ของเค้าดีอยู่แล้ว'),
(11, 6, 14, 3, 'ใช้งานได้ดีปกติค่ะ แต่คู่มือการใช้งานอ่านยาก'),
(12, 3, 15, 2, 'แห้งไว้  ไม่เหนอะหนะหน้า'),
(14, 7, 16, 3, 'ใส่สะบายดีค่ะ'),
(15, 16, 17, 1, 'กันแดดได้ดีจริงค่ะ เห็นผลจริง ใช้ไปแค่ 1 สัปดา หน้าดูขาวขึ้นจริง'),
(16, 4, 18, 3, 'ดีไซน์ สวยงาน แบตอึดดี แต่ เชื่อมต่อยากหน่อย เอาไป 3 ดาวพอ'),
(17, 19, 19, 1, 'ชอบค่ายนี้เลย  ทนกว่าค่ายเขียวอีก '),
(18, 5, 20, 2, 'ส่งของไว้มากครับ  '),
(19, 24, 24, 4, 'สำหรับผม ผมคิดว่า มันเดินมั่วไป บางมุมห้อง มันก็ไม่ไปดูดฝุ่นเลย'),
(20, 13, 25, 3, 'คุณภาพตามราคาครับ '),
(21, 12, 26, 4, 'จุกนมดูแข็งไป ลูกไม่ค่อยดูดเลยครับ'),
(22, 21, 28, 3, 'ใส่สบายดีครับ'),
(23, 6, 30, 2, 'ใช้งานไม่ยากเลยค่ะ'),
(24, 7, 31, 2, 'ใส่สบายตัวมากค่ะ ราคาขอถูก');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `ProductID` int(9) NOT NULL,
  `SellerID` int(9) NOT NULL,
  `ProductName` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `Price` int(10) NOT NULL,
  `CategoryID` int(9) NOT NULL,
  `ProductDetail` text COLLATE utf8_unicode_ci NOT NULL,
  `DiscountPrice` int(5) NOT NULL,
  `DiscountType` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT '1 %   2 baht'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`ProductID`, `SellerID`, `ProductName`, `Price`, `CategoryID`, `ProductDetail`, `DiscountPrice`, `DiscountType`) VALUES
(1, 1, 'ลิปติก', 700, 1, 'สีโทนแดง มาพร้อมพิกเม้นต์แน่น ให้สีคมชัดมากกกกทาแล้วไม่ตกร่อง กลบสีปากได้เนียนสนิทถึงจะแมตแต่ไม่ทำให้ปากแห้งมี moisture ช่วยบำรุงปากให้นุ่มนิ่มน่าสัมผัส', 50, '2'),
(2, 3, 'น้ำยาทาเล็บ', 299, 1, 'ปฎิวัติแฟชั่นบนเรียวเล็บด้วย ยาทาเล็บ 3 เฉดสี สุดเร้าใจส่งตรงจากแคทวอล์ก นิวยอร์ก แฟชั่นวีค ด้วยสีสวยชัด ติดทนนาน คงประกายเงางามโดดเด่นทุกเฉดสี', 20, '1'),
(3, 3, 'ครีมทาหน้า', 699, 1, 'ครีมทาหน้าทำจากหนังจรเข้ที่เก็บในตอนเช้าของวันจันทร์ที่พระจันทร์เต็มดวง ขนาด 250 ml', 99, '2'),
(4, 3, 'หูฟัง JBL', 2599, 2, 'JBLหูฟังสีสดใส พับได้ มีไมค์ รับสาย/คุยมือถือได้ แบบครอบหู สวยงามมีสองสีให้เลือก', 10, '1'),
(5, 4, 'Notebook 15.5 นิ้ว 1060 by ETRUD', 26000, 2, 'Notebook 15.5 นิ้ว การ์ดจอ 1060 \r\nRAM 16 GB\r\nby ETRUD', 5, '1'),
(6, 5, 'Microwave SHARP', 6500, 2, 'Miicrowave SHARP\r\nพร้อมระบบตั้งเวลาแบบดิจิตอล พร้อมปรับไฟได้สูงสุดถึง 5 ระดับ', 10, '1'),
(7, 6, 'กระโปรง', 590, 3, 'กระโปรงใส่สบายยามหน้าร้อน มี 5 สีให้เลือก ตอบโจทยการใช้ชีวิตในกรุง', 40, '2'),
(8, 9, 'กางเกงขายาว', 399, 3, 'กางเกงใส่อยู่บ้านหรือออกกำลังกาย มีสองเฉดสีให้เลือกทั้งเทาและน้ำตาล', 10, '1'),
(9, 8, 'เสื้อคอกลม มือ2', 80, 3, 'เสื้อมือสองสภาพนางฟ้า ลดราคาพิเศษเฉพาะช่วงนี้ ทันที 5 บาท มีสองสีให้เลือก', 5, '2'),
(10, 7, 'นมตราหมี', 500, 4, 'นมตราหมีสูตรเด็กแรกเกิด และเด็กเล็ก อุดมด้วยสารอาหารจำเป็นต่อการเติบโตของลูกที่คุณรัก', 10, '1'),
(11, 10, 'ผ้าอ้อม MamyPoko', 380, 4, 'กางเกงผ้าอ้อมที่มีรูปทรงกระชับสบายตัว รูปทรงครอบคลุมรอบขาพร้อมด้วยขอบปกป้องถึง 2 ชั้นที่ช่วยในเรื่องของการรั่วซึมสู่ภายนอก สามารถเคลื่อนไหวได้ทุกท่าอย่างไร้กังวล\r\nจากการออกแบบให้ขอบเอวมีความกระชับ และยืดหยุ่น สามารถตอบสนองต่อพัฒนาการของเด็กในวัยที่กำลังเรียนรู้จากสิ่งแวดล้อมได้อย่างมีประสิทธิภาพ\r\nพร้อมด้วยแผ่นระบายอากาศรอบทิศทางภายในกางเกงผ้าอ้อม ช่วยระบายอากาศความชื้นจากภายในสู่ภายนอก', 15, '1'),
(12, 6, 'ชวดนมเด็ก pigeon สำหรับเด็ก', 299, 4, 'ขวดนมเด็กอ่อนตรา pigeon ที่ได้รับประกันความสะอาดปลอดภัยต่อเด็ก', 15, '1'),
(13, 3, 'เก้าอี้พลาสติก', 199, 5, 'เก้าอี้พลาสติกนั่งสบาย\r\nมีสองสีให้เลือก พร้อมการรับรองจากอเมริกา', 20, '2'),
(14, 1, 'โต๊ะพับอเนกประสงค์', 1090, 5, 'โต๊ะพับอเนกประสงค์\r\nวัสดุคุณภาพดี ขาอะลูมิเนียมกันสนิม', 10, '1'),
(15, 7, 'กระทะ Korae Kiing', 2060, 5, 'กระทำนำเข้าจากจีนแผ่นดินใหญ่ เคลือบสารกันสนิม ไม่ต้องใช้น้ำมัน', 10, '1'),
(16, 4, 'ครีมกันแดด Anessa', 420, 1, 'ครีมกันแดด Anessa ป้องกันใบหน้าจากรังสี UV ที่ทำร้ายผิว\r\nด้วย SPF 50PA ++++ ทำให้มันใจยิ่งขึ้นกับประสิทธิภาพการป้องกันแสงแดด', 40, '2'),
(17, 5, 'Eucerin pH5 โลชั่นบำรุงผิว', 460, 1, ' ยูเซอริน พีเอช5 โลชั่นบำรุงผิว นวัตกรรมจากผู้เชี่ยวชาญด้านผิวพรรณ พัฒนาเพื่อผิวบอบบางแพ้ง่าย ด้วย pH5EEnzymeProtection ลิขสิทธิ์เฉพาะจากยูเซอรินฟื้นบำรุงลึกถึงเซลล์ผิวอ่อนแอ แห้งกร้านเสียสะสม พร้อมเสริมเกราะปกป้องเซลล์ผิวให้รู้สึกแข็งแรง ผิวชุ่มชื่นล้ำลึก สุขภาพดีจากในผิว ผ่านการทดสอบแล้วว่า ยูเซอริน คือ ผลิตภัณฑ์บำรุงผิวเพียงแบรนด์แรกและแบรนด์เดียวในตลาด ที่สามารถปกป้องผิวจากสารก่อภูมิแพ้ได้อย่างมีประสิทธิภาพ', 30, '2'),
(18, 8, 'Haier ตู้เย็น 1 ประตู Muse series ขนาด 5.2 คิว รุ่น HR-CEQ15', 6000, 2, '“ตู้เย็น” เครื่องใช้ไฟฟ้าที่มีความสำคัญต่อทุกครัวเรือน หากไม่มีตู้เย็น เราคงไม่สามารถเก็บรักษาพืชผักและเนื้อสัตว์ต่างๆ ได้ วันนี้ เราขอนำเสนอ Haier ตู้เย็น 1 ประตู Muse series ขนาด 5.2 คิว รุ่น HR-CEQ15 ตู้เย็นราคาย่อมเยา แต่มากด้วยประสิทธิภาพ ช่วยรักษาความสดและคุณค่าทางอาหารได้เป็นอย่างดี และยังมีดีไซน์ที่สวยทันสมัย พร้อมให้คุณใช้งานได้อย่างเต็มที่', 25, '1'),
(19, 10, 'Logitech เมาส์ไร้สาย รุ่น M330 Silent Plus', 699, 2, 'เมาส์ไร้สายที่เน้นการใช้งานคล่องตัวและปราศจากเสียงรบกวน ออกแบบพิเศษสำหรับผู้ที่ถนัดมือขวา\r\nผลิตจากวัสดุคุณภาพ ที่จับยางเนื้อนุ่มสบายมือ ฐานรองและล้อเลื่อนยางสามารถเลื่อนได้อย่างลื่นไหล\r\nตรวจจับการเคลื่อนไหวอย่างแม่นยำในทุกพื้นผิว ด้วย Logitech® Advance Optical Tracking\r\nลดเสียงรบกวนจากการคลิกกว่า 90% ทำงานเงียบสงบ ปราศจากเสียงรบกวนคุณและคนรอบข้าง\r\nเชื่อมต่อแบบไร้สายในระยะ 10 เมตรด้วยตัวรับสัญญาณขนาดจิ๋ว\r\nมีระบบพักการใช้งานอัตโนมัติเมื่อไม่มีการใช้งาน\r\nสามารถใช้งานร่วมกับอุปกรณ์ที่ติดตั้งระบบปฏิบัติการ Window®, Mac, Chrome OS™ หรือ Linux®', 150, '2'),
(20, 5, 'MLDกางเกงวอร์มAdidas แฟชั่น', 400, 3, 'MLDกางเกงวอร์มAdidas แฟชั่น\r\nมีหลายไซส์ให้เลือก สวมใส่สบายได้ทุกที่', 20, '1'),
(21, 9, 'รองเท้าผ้าใบแฟชั่น', 450, 3, 'รองเท้าผ้าใบแฟชั่น\r\nใส่ได้ทุกเพศทุกวัย\r\nมีหลากหลายขนาดให้เลือก', 10, '1'),
(22, 1, 'BabiMild® ผลิตภัณฑ์แป้งเด็ก เบบี้มายด์ สูตรดับเบิ้ลมิลค์ 400 กรัม (แพ็ค 2)', 99, 4, 'ผลิตภัณฑ์แป้งฝุ่นโรยตัว เหมาะสำหรับเด็กวัยคิดส์ และบุคคลทั่วไป มอบผิวเนียนนุ่ม ผิวหอม น่าสัมผัส ด้วยคุณค่าจากโปรตีนนม 2 ชนิด นมวัว และนมถั่วเหลือง พร้อมสารสกัดจากมิกซ์เบอร์รี่ เหมาะสำหรับเด็ก และสามารถใช้ได้แม้แต่ผู้ใหญ่ผิวที่บอบบาง ธรรมชาติที่ดีที่สุดสำหรับเด็กๆ และทุกคนในครอบครัว\r\n\r\nวิธีใช้ \r\nเทผลิตภัณฑ์แป้งเด็กเบบี้มายด์ สูตรดับเบิ้ลมิลค์ ลงบนฝ่ามือ แล้วทาบริเวณต่างๆ นอกร่างกาย\r\n\r\n', 10, '2'),
(23, 6, 'Natur รถเข็นเด็ก รุ่น แฮปปี้ 3 แถมฟรี Jigsaw เสริมทักษะ', 3500, 4, 'พอดีอย่างลงตัว\r\nNatur รถเข็นเด็ก รุ่น แฮปปี้ 3แถมฟรี Jigsaw เสริมทักษะ มีด้ามจับรถเข็นที่สามารถปรับหน้า-หลังได้ ซึ่งรถเข็นนี้จะเข็นได้ 2 ด้าน และมีพนักพิงที่สามารถปรับเอนนอนได้ 3 ระดับ หลังคารถเข็นสามารถปรับได้ 2 ระดับเพื่อความพอดีที่ลงตัวของลูกน้อย\r\n\r\nปลอดภัยทุกเวลา\r\nNatur รถเข็นเด็ก รุ่น แฮปปี้ 3 แถมฟรี Jigsaw เสริมทักษะ เพื่อความปลอดภัยในยามที่ลูกน้อยนอนอยู่ในรถเข็นนั้น ล้อหน้า ล้อหลัง สามารถล็อกได้อย่างแน่นหนา ส่วนด้านล่างมีตระกร้าขนาดใหญ่ใส่ของได้เพื่อความสะดวกสบาย รถเข็นนี้รับน้ำหนักเด็กได้สูงสุด 15 กิโลกรัม ขนาด(พับ) 34 x 55 x 90 ซม. ขนาด(กาง) 53 x 101.5 x 109 ซม. น้ำหนักรถเข็น(สุทธิ) 9.25 กก.\r\n\r\nทนทานยาวนาน\r\nNatur รถเข็นเด็ก รุ่น แฮปปี้ 3 แถมฟรี Jigsaw เสริมทักษะ ทำจากวัสดุที่เน้นประสิทธิภาพในการใช้งาน มีความทนทานและแข็งแรงเป็นพิเศษ ให้อายุการใช้งานที่ยาวนาน รถเข็นเด็กจาก Natur จะทำให้การเดินทางของลูกตัวน้อยของท่านเป็นไปอย่างราบรื่น ให้พ่อแม่และลูกน้อยไปไหนมาไหนได้อย่างสะดวกสบายและปลอดภัยอย่างแน่นอน', 30, '1'),
(24, 8, 'ECOVACS DEEBOT OZMO SLIM 11 หุ่นยนต์ดูดฝุ่นอัจฉริยะ Robot Vacuum Cleaner', 11000, 5, 'ข้อมูลเฉพาะของ ECOVACS DEEBOT OZMO SLIM 11 \r\nหุ่นยนต์ดูดฝุ่นอัจฉริยะ Robot Vacuum Cleaner\r\nรุ่น DEEBOT OZMO SLIM 11\r\nแบรนด์ Ecovacs SKU 300372473_TH-516804314 \r\nประเภทของการรับประกัน มีการรับประกันจากผู้ให้บริการ\r\nประกัน 1 ปี\r\n', 20, '1'),
(25, 4, 'กระถางต้นไม้ รุ่น 05 หยดน้ำ ขนาด S', 1500, 5, 'กระถางต้นไม้ รุ่น 05 หยดน้ำ ขนาด S สำหรับตกแต่งบ้าน', 10, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(9) NOT NULL,
  `Fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `Tel` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `News` tinyint(1) NOT NULL DEFAULT '0',
  `ProfilePicture` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `IdCard` char(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Banking` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Shopname` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Shopdetail` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Fname`, `Lname`, `Gender`, `Tel`, `DOB`, `Email`, `News`, `ProfilePicture`, `Username`, `Pass`, `IdCard`, `Banking`, `Shopname`, `Shopdetail`) VALUES
(1, 'Napat', 'Saeong', 'U', '0888888888', '1998-08-17', 'napat@email.com', 1, 'D:\naproject	est.jpg', 'TheLuckyBoy', '123456', '1123456788912', '1234567891', 'NAshoping', 'ขายของทุกอย่างสากกะเบือเรือรบ'),
(2, 'Young', 'K', 'M', '0876543210', '1998-08-17', 'Yong@email.com', 1, 'D:\naproject	est1.jpg', 'test', '1234', NULL, NULL, NULL, NULL),
(3, '1', '2', 'M', '0888874681', '2019-05-07', '123', 0, '12312', '123123', '123123123', '1111111111111', '123123', '123123', '123123'),
(4, 'Suthawee', 'Wee', 'M', '0812334567', '2003-03-12', 'Suthawee@mail.com', 1, 'Suthawee.jpg', 'Suthawee', 'testSuthawee', '1101111111111', '7800000000', 'SutheweeShop', 'SellButt'),
(5, 'John', 'Kentt', 'M', '0812355555', '2000-08-13', 'John@mail.com', 0, 'J.jpg', 'John', 'Johnjojo', '1101112341111', '7600000000', 'JohnShop', 'STFU'),
(6, 'Kenny', 'Groob', 'M', '0854658813', '1999-03-12', 'Kenny@mail.com', 1, 'KennyPic.jpg', 'Kenny', 'testKenny', '1102211666611', '7123400000', 'KennyShop', 'TestSellDetail'),
(7, 'Sara', 'Joily', 'F', '0812355486', '1990-11-10', 'Sara@mail.com', 1, 'Sara.jpg', 'SaraJo', 'PassSara05', '1135164588846', '7651238469', 'SaraShop', 'TestDetail'),
(8, 'Somsree', 'Peepaknarm', 'F', '0822234567', '1980-08-15', 'Somsree@mail.com', 1, 'Somsree.jpg', 'Somsree08', 'Somsree', '1101111325681', '7862000000', 'SomsreeShop', 'TestDetail'),
(9, 'Tuksun', 'Shinawatt', 'M', '0845464528', '1956-03-12', 'Tuksun@mail.com', 1, 'Taksun.jpg', 'Tuksun', 'PassTuk556', '1101111115411', '7865800000', 'TukkyShop', 'TestDetail'),
(10, 'Sukij', 'Bunsatit', 'U', '022222222', '2000-12-08', 'Sukij.@gmail.com', 1, 'Sukij.png', 'Sukij', 'SSSSSS', '1156435977782', '7683645795', 'SuKijShop', NULL),
(11, 'nawarit', 'longkhum', 'M', '0992899486', '1998-05-22', 'Nawaritfrong@gmail.com', 0, NULL, 'nawarit', 'nawarit121', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addressuser`
--
ALTER TABLE `addressuser`
  ADD PRIMARY KEY (`AddressID`),
  ADD KEY `UserAddressID` (`UserID`),
  ADD KEY `CountryID` (`CountryID`);

--
-- Indexes for table `banned`
--
ALTER TABLE `banned`
  ADD PRIMARY KEY (`UserID`,`BanStart`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`UserID`,`ProductDetailID`),
  ADD KEY `ProductCartID` (`ProductDetailID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CheckoutID` (`UserID`),
  ADD KEY `CheckOutCode` (`PromoCode`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`CountryID`);

--
-- Indexes for table `deliverytype`
--
ALTER TABLE `deliverytype`
  ADD PRIMARY KEY (`DeliveryTypeID`),
  ADD KEY `DeliveryProductID` (`ProductID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `PositionID` (`PositionID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderDetailID`,`ProductDetailID`),
  ADD KEY `ProductOrderID` (`ProductDetailID`);

--
-- Indexes for table `ordershop`
--
ALTER TABLE `ordershop`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `OrderSellerID` (`SellerID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `DeliveryTypeID` (`DeliveryTypeID`);

--
-- Indexes for table `ordertracking`
--
ALTER TABLE `ordertracking`
  ADD PRIMARY KEY (`OrderDetailID`,`TrackingNumber`);

--
-- Indexes for table `positiontype`
--
ALTER TABLE `positiontype`
  ADD PRIMARY KEY (`PositionID`);

--
-- Indexes for table `productdetail`
--
ALTER TABLE `productdetail`
  ADD PRIMARY KEY (`ProductDetailID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `productpicture`
--
ALTER TABLE `productpicture`
  ADD PRIMARY KEY (`ProductID`,`ProductPicture`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`PromoCode`);

--
-- Indexes for table `promotioncategory`
--
ALTER TABLE `promotioncategory`
  ADD PRIMARY KEY (`CategoryID`,`PromoCode`),
  ADD KEY `PromoCategoryCode` (`PromoCode`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `ReportUserID` (`UserID`),
  ADD KEY `ReportCatID` (`ReportCategoryID`),
  ADD KEY `ReportUser` (`ReportUser`),
  ADD KEY `ReportEmployee` (`EmployeeID`);

--
-- Indexes for table `reportcategory`
--
ALTER TABLE `reportcategory`
  ADD PRIMARY KEY (`ReportCategoryID`);

--
-- Indexes for table `reportpic`
--
ALTER TABLE `reportpic`
  ADD PRIMARY KEY (`ReportPicture`),
  ADD KEY `ReportPicID` (`ReportID`);

--
-- Indexes for table `reportposition`
--
ALTER TABLE `reportposition`
  ADD PRIMARY KEY (`ReportID`,`PositionID`),
  ADD KEY `ReportPoID` (`PositionID`);

--
-- Indexes for table `reviewproduct`
--
ALTER TABLE `reviewproduct`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `ReviewOrderID` (`OrderID`),
  ADD KEY `ReviewProductID` (`ProductID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `SellerID` (`SellerID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addressuser`
--
ALTER TABLE `addressuser`
  MODIFY `AddressID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `OrderID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `CountryID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `deliverytype`
--
ALTER TABLE `deliverytype`
  MODIFY `DeliveryTypeID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ordershop`
--
ALTER TABLE `ordershop`
  MODIFY `OrderDetailID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `positiontype`
--
ALTER TABLE `positiontype`
  MODIFY `PositionID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `productdetail`
--
ALTER TABLE `productdetail`
  MODIFY `ProductDetailID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `ReportID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reportcategory`
--
ALTER TABLE `reportcategory`
  MODIFY `ReportCategoryID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviewproduct`
--
ALTER TABLE `reviewproduct`
  MODIFY `ReviewID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `ProductID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addressuser`
--
ALTER TABLE `addressuser`
  ADD CONSTRAINT `CountryID` FOREIGN KEY (`CountryID`) REFERENCES `country` (`CountryID`) ON DELETE CASCADE,
  ADD CONSTRAINT `UserAddressID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `banned`
--
ALTER TABLE `banned`
  ADD CONSTRAINT `BanedID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `CartUserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `ProductCartID` FOREIGN KEY (`ProductDetailID`) REFERENCES `productdetail` (`ProductDetailID`) ON DELETE CASCADE;

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `CheckOutCode` FOREIGN KEY (`PromoCode`) REFERENCES `promotion` (`PromoCode`) ON DELETE CASCADE,
  ADD CONSTRAINT `CheckoutID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `deliverytype`
--
ALTER TABLE `deliverytype`
  ADD CONSTRAINT `DeliveryProductID` FOREIGN KEY (`ProductID`) REFERENCES `stock` (`ProductID`) ON DELETE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `PositionID` FOREIGN KEY (`PositionID`) REFERENCES `positiontype` (`PositionID`) ON UPDATE CASCADE;

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `OrderdetailID` FOREIGN KEY (`OrderDetailID`) REFERENCES `ordershop` (`OrderDetailID`) ON DELETE CASCADE,
  ADD CONSTRAINT `ProductOrderID` FOREIGN KEY (`ProductDetailID`) REFERENCES `productdetail` (`ProductDetailID`) ON DELETE CASCADE;

--
-- Constraints for table `ordershop`
--
ALTER TABLE `ordershop`
  ADD CONSTRAINT `DeliveryTypeID` FOREIGN KEY (`DeliveryTypeID`) REFERENCES `deliverytype` (`DeliveryTypeID`) ON DELETE CASCADE,
  ADD CONSTRAINT `OrderID` FOREIGN KEY (`OrderID`) REFERENCES `checkout` (`OrderID`) ON DELETE CASCADE,
  ADD CONSTRAINT `OrderSellerID` FOREIGN KEY (`SellerID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `ordertracking`
--
ALTER TABLE `ordertracking`
  ADD CONSTRAINT `OrderTrackID` FOREIGN KEY (`OrderDetailID`) REFERENCES `ordershop` (`OrderDetailID`) ON DELETE CASCADE;

--
-- Constraints for table `productdetail`
--
ALTER TABLE `productdetail`
  ADD CONSTRAINT `ProductID` FOREIGN KEY (`ProductID`) REFERENCES `stock` (`ProductID`) ON DELETE CASCADE;

--
-- Constraints for table `productpicture`
--
ALTER TABLE `productpicture`
  ADD CONSTRAINT `ProductPicID` FOREIGN KEY (`ProductID`) REFERENCES `stock` (`ProductID`) ON DELETE CASCADE;

--
-- Constraints for table `promotioncategory`
--
ALTER TABLE `promotioncategory`
  ADD CONSTRAINT `PromoCategoryCode` FOREIGN KEY (`PromoCode`) REFERENCES `promotion` (`PromoCode`) ON DELETE CASCADE,
  ADD CONSTRAINT `PromoCategoryID` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `ReportCatID` FOREIGN KEY (`ReportCategoryID`) REFERENCES `reportcategory` (`ReportCategoryID`) ON DELETE CASCADE,
  ADD CONSTRAINT `ReportEmployee` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE,
  ADD CONSTRAINT `ReportUser` FOREIGN KEY (`ReportUser`) REFERENCES `user` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `ReportUserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `reportpic`
--
ALTER TABLE `reportpic`
  ADD CONSTRAINT `ReportPicID` FOREIGN KEY (`ReportID`) REFERENCES `report` (`ReportID`) ON DELETE CASCADE;

--
-- Constraints for table `reportposition`
--
ALTER TABLE `reportposition`
  ADD CONSTRAINT `ReportID` FOREIGN KEY (`ReportID`) REFERENCES `report` (`ReportID`) ON DELETE CASCADE,
  ADD CONSTRAINT `ReportPoID` FOREIGN KEY (`PositionID`) REFERENCES `positiontype` (`PositionID`) ON DELETE CASCADE;

--
-- Constraints for table `reviewproduct`
--
ALTER TABLE `reviewproduct`
  ADD CONSTRAINT `ReviewOrderID` FOREIGN KEY (`OrderID`) REFERENCES `checkout` (`OrderID`) ON DELETE CASCADE,
  ADD CONSTRAINT `ReviewProductID` FOREIGN KEY (`ProductID`) REFERENCES `stock` (`ProductID`) ON DELETE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `CategoryID` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`),
  ADD CONSTRAINT `SellerID` FOREIGN KEY (`SellerID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
