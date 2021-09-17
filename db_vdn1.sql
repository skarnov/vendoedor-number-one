-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 21, 2016 at 01:36 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vdn1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('1910e8e3b2d916da37bd904b4562c1d2', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.11', 1474456853, 'a:4:{s:9:"user_data";s:0:"";s:8:"admin_id";s:1:"1";s:10:"admin_name";s:9:"Developer";s:11:"grand_total";i:0;}'),
('95d42ceffbb12b2c78e37bb0f8ebc5ed', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.11', 1474456854, ''),
('1c7fa9bb8abc9bf34f4e8d068d1b129f', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.11', 1474457174, 'a:4:{s:9:"user_data";s:0:"";s:8:"admin_id";s:1:"1";s:10:"admin_name";s:9:"Developer";s:11:"grand_total";i:0;}'),
('1fb190d2bd0c855c98af560cabe2ea9a', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.11', 1474456857, 'a:2:{s:9:"user_data";s:0:"";s:11:"grand_total";i:0;}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_access_level` tinyint(1) NOT NULL DEFAULT '0',
  `admin_activation_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_create_time`, `admin_access_level`, `admin_activation_status`) VALUES
(1, 'Developer', 'sk_arnov@hotmail.com', '96e79218965eb72c92a549dd5a330112', '2015-01-20 07:37:10', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billing`
--

CREATE TABLE `tbl_billing` (
  `billing_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `billing_name` varchar(50) DEFAULT NULL,
  `billing_email` varchar(100) DEFAULT NULL,
  `billing_phone` varchar(20) DEFAULT NULL,
  `billing_address` text,
  `billing_country` varchar(50) DEFAULT NULL,
  `billing_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(2) NOT NULL,
  `company_id` int(2) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_publication_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `company_id`, `category_name`, `category_publication_status`) VALUES
(1, 1, 'Hair Accessories', 1),
(2, 1, 'Bath Accessories', 1),
(3, 1, 'Bags', 1),
(4, 1, 'Interior Decoration ', 1),
(5, 1, 'Bed Accessories  ', 1),
(6, 2, 'School Accessories', 1),
(7, 2, 'Kitchen Accessories', 1),
(8, 2, 'Garden', 1),
(9, 2, 'Cellphone Accessories', 1),
(10, 2, 'Bodybuilding', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `company_id` int(2) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_description` text NOT NULL,
  `company_image` varchar(200) NOT NULL,
  `company_publication_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `company_name`, `company_email`, `company_description`, `company_image`, `company_publication_status`) VALUES
(1, 'MK', 'kromil@sapo.pt', 'Somos uma Empresa ligada ao Têxtil-lar, com fabricas a trabalhar exclusivamente para a nossa Empresa na Índia (Nova DELI). Também importamos produtos com qualidade de China. Dispomos de vasta colecção de cortinados, colchas, mantas de pelo, fronhas jogos de cama, tapetes artigos de casa de banho, varões, etc. Temos Artigos com muita qualidade a bom preço, pois estamos habituados a trabalhar com clientes Europeus desde 1993.\n\n\n\n\n\n\n', 'images/company_image/mk.jpg', 1),
(2, '大自然', '1473557384@qq.com', 'Ordering least to Lisbon and surroundings - 300€\nNorth and South - 500€', 'images/company_image/COFRE_DO_MUNDO.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `contributor_number` varchar(50) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `conform_password` varchar(255) DEFAULT NULL,
  `customer_address` varchar(200) NOT NULL,
  `customer_country` varchar(15) NOT NULL,
  `member_since` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_activation_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `contributor_number`, `customer_email`, `customer_phone`, `customer_password`, `conform_password`, `customer_address`, `customer_country`, `member_since`, `customer_activation_status`) VALUES
(1, 'Leo Mundo', 'Sample Number 123', 'lemoge@hotmail.com', '926103721', '915549681', NULL, 'Rua Neves Ferreira Nº7 4esq 1170-273 - Lisboa', 'Portugal', '2015-05-30 17:06:41', 1),
(2, 'Shanto', 'Sample Number 123', 'shanto.nadir@gmail.com', '920362862', '123456', NULL, 'Pontinha ', 'Portugal', '2015-06-01 18:38:00', 1),
(3, 'antonio', 'Sample Number 123', 'antonioarriaga972@gmail.com', '915549681', '915549681', NULL, 'Largo Dário nunes nº5', 'Portugal', '2015-06-05 00:11:07', 1),
(4, 'WANG YUXIONG', 'Sample Number 123', 'WANGYUXIONG1@GMAIL.COM', '963978324', '12345678', NULL, 'AV JOSE DA COSTA MEALHA ED CORETO LJ A-B 8100-501LOULE', '葡萄牙', '2015-09-06 01:02:15', 1),
(5, 'GUO JIAN', 'Sample Number 123', '840720783@qq.com', '966663177', '840720783', NULL, 'Rua Elias Garcia 275-A\nAmadora\n2700-666', 'Portugal', '2015-09-18 03:39:23', 1),
(6, 'Zhang Jianfeng', 'Sample Number 123', '137726790@qq.com', '967232008', '137726790', NULL, 'Rua Dr. Eduardo Castro Nº4 R/C\n6110-218\nVila de Rei', 'Portugal', '2015-09-18 20:05:54', 1),
(7, 'Xiu Chen', '273820729', 'xiuchen1@126.com', '969518798', 'xiuchen', NULL, 'Rua Elias Garcia Nº249cAmadora', 'Portugal', '2015-09-26 04:04:07', 1),
(8, 'FAJUAN ZHANG', 'Sample Number 123', 'xuewei0918@hotmail.com', '965228258', 'fajuanzhang', NULL, 'E.N.379\n2970-648 SESIMBRA', 'Portugal', '2015-09-30 00:13:44', 1),
(9, 'ABUNDANTE', 'Sample Number 123', 'ABUNDANTE168@GMAIL.COM', '966637711', '966637711', NULL, 'RUA  DA LIBERDADEN.39\nALMADA', 'POTUGAL', '2015-10-02 19:55:41', 1),
(11, 'Yong Feng Jiang', 'Sample Number 123', 'abundante@live.cn', '966637711', 'yongfengjiang', NULL, 'Rua Da Liberdade Nº39 Almada', 'Portugal', '2015-10-03 02:23:34', 1),
(12, 'chenyiqin', 'Sample Number 123', 'CHENYIQIN@hotmail.com', '967879421', '123456', NULL, 'RUA DR FRANCISCO SOUSA TAVARES N.5,\n2725-549\nTAPADA DAS MERCES', '葡萄牙', '2015-10-13 20:22:27', 1),
(13, 'Chen Yiqin', 'Sample Number 123', '1751973019@qq.com', '967879421', 'chenyiqin', NULL, 'Rua Dr. Francisco Sousa Tavares Nº5  \n2725-549\nMem-Martins\nNº Cont. - 235726109', 'Portugal', '2015-10-13 22:14:24', 1),
(14, 'Temporary', 'Sample Number 123', 'samucax_94_slb@hotmail.com', '968565681', '123456', NULL, 'ashudfa', 'Portugal', '2015-10-14 21:24:20', 1),
(15, 'zhengzhong sun', 'Sample Number 123', '523220798@qq.com', '964554098', 'zhengzhongsun', NULL, 'rua da azenha n 17 lj eq\n2725 232 men martins\ncontribuinte Nr.272911119', 'portugal', '2015-10-16 02:24:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(10) NOT NULL,
  `news_title` varchar(50) NOT NULL,
  `main_news` text NOT NULL,
  `news_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `news_publication_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(7) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `order_status` varchar(10) NOT NULL DEFAULT 'Pending',
  `order_total` float(10,2) NOT NULL,
  `order_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invoice_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(7) NOT NULL,
  `product_id` int(3) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_sales_quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `company_id` int(2) NOT NULL,
  `category_id` int(2) NOT NULL,
  `product_summary` varchar(100) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_manufacture` varchar(20) NOT NULL,
  `product_weight` varchar(20) NOT NULL,
  `product_photo_0` varchar(255) DEFAULT NULL,
  `product_photo_1` varchar(255) DEFAULT NULL,
  `product_photo_2` varchar(255) DEFAULT NULL,
  `product_quantity` varchar(20) NOT NULL,
  `product_unit_price` varchar(20) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_discount_price` varchar(10) NOT NULL,
  `product_discount_price_status` tinyint(1) NOT NULL,
  `product_discount_percent` varchar(5) NOT NULL,
  `product_discount_percent_status` tinyint(1) NOT NULL,
  `product_publication_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `company_id`, `category_id`, `product_summary`, `product_description`, `product_manufacture`, `product_weight`, `product_photo_0`, `product_photo_1`, `product_photo_2`, `product_quantity`, `product_unit_price`, `product_price`, `product_discount_price`, `product_discount_price_status`, `product_discount_percent`, `product_discount_percent_status`, `product_publication_status`) VALUES
(1, 'Hairbrush Ref:99094', 1, 1, 'Hairbrush', 'Color: Assorted, Quantity:24, Ref:99094 Uni:0.95', '', '24 pieces / box', 'images/product_photo_0/_MG_4658_thumb.jpg', NULL, NULL, '24', '0.95', 22.80, '', 0, '', 0, 1),
(2, 'Hairbrush Ref:99095', 1, 1, 'Hairbrush', 'Color: Assorted, Quantity:24, Ref:99095 Uni:0.95', '', '24 pieces / box', 'images/product_photo_0/_MG_4659_thumb.jpg', NULL, NULL, '24', '0.95', 22.80, '', 0, '', 0, 1),
(3, 'Bath Towels Ref: 99083', 1, 2, 'Bath Towels', 'Color: pink, orange, beige and blue.\nQuantity: 24\nSize: 70x140cm\nRef: 99083\nUni:3.95€', '', '24 pieces / box', 'images/product_photo_0/_MG_4222.JPG', NULL, NULL, '24', '3.949', 94.78, '', 0, '', 0, 1),
(4, 'Bath Towels Ref: 99084', 1, 2, 'Bath Towels', 'Color: light blue, yellow, pink, green and red.\nQuantity: 24\nSize: 70x140cm\nRef: 99084\nUni:5.25€', '', '24 pieces / box', 'images/product_photo_0/_MG_4231.JPG', NULL, NULL, '24', '5.25', 126.00, '', 0, '', 0, 1),
(5, 'Thin Bags Ref:99120', 1, 3, 'Thin bags with design', 'Color: Assorted, Quantity:120,  Ref:99120 Uni:0.12', '', '120 pieces / box', 'images/product_photo_0/_MG_4630_thumb.jpg', NULL, NULL, '120', '0.12', 14.40, '', 0, '', 0, 1),
(6, 'Thin Bags Ref:99121', 1, 3, 'thin bags with design', 'Color: Assorted, Quantity:120, Ref:99121 Uni:0.15', '', '120 pieces / box', 'images/product_photo_0/_MG_4631_thumb.jpg', NULL, NULL, '120', '0.15', 18.00, '', 0, '', 0, 1),
(7, 'Bedspreads Ref:93904', 1, 5, 'Bedspreads leather with standards', 'Color: brown, green, orange, black, blue, red, beige Quantity:20, Size:120x180cm, Ref:93904 Uni:5,95', '', '20 pieces / box', 'images/product_photo_0/_MG_4568_thumb.jpg', NULL, NULL, '20', '5.95', 119.00, '', 0, '', 0, 1),
(8, 'Bedspreads Ref:93905', 1, 5, 'Bedspreads leather with standards', 'Color: orange, green, brown, red, blue, black beige Quantity:20, Size:150x225cm, Ref:93905 Uni:7,95', '', '20 pieces / box', 'images/product_photo_0/_MG_4570_thumb.jpg', NULL, NULL, '20', '7.95', 159.00, '', 0, '', 0, 1),
(9, 'School Objects Ref:17367', 2, 6, 'school objects for painting', 'Quantity:72, Ref:17367 Uni:0.35', '', '72 pieces / box', 'images/product_photo_0/_MG_4729_thumb.jpg', NULL, NULL, '72', '0.35', 25.20, '', 0, '', 0, 1),
(10, 'School Objects Ref:17369', 2, 6, 'School objects for painting', 'Quantity:72, Ref:17369 Uni:0.35', '', '72 pieces / box', 'images/product_photo_0/_MG_4732_thumb.jpg', NULL, NULL, '72', '0.35', 25.20, '', 0, '', 0, 1),
(11, 'School Supplies Ref: 08985', 2, 6, 'Acessories for dossier', 'Color: Assorted Quantity: 12 Uni:0,45 Ref: 08985\n', '', '12 pieces / box', 'images/product_photo_0/_MG_7405_thumb.JPG', NULL, NULL, '12', '0.45', 5.40, '', 0, '', 0, 1),
(12, 'Kitchen Brushes Ref: 04359 ', 2, 7, 'Color: red, blue\nQuantity: 12', 'Ref: 04359\nUni: 0.60', '', '12 pairs / box', 'images/product_photo_0/IMG_4067_thumb.JPG', NULL, NULL, '12', '0.60', 7.20, '', 0, '', 0, 1),
(13, 'Kitchen Brushes Ref: 04817', 2, 7, 'Color: sortie\nQuantity: 6', 'Ref: 04817\nUni: 1.75', '', '6 pairs / box', 'images/product_photo_0/IMG_4070_thumb.JPG', NULL, NULL, '6', '1.75', 10.50, '', 0, '', 0, 1),
(14, 'Garden Hose Ref:06508', 2, 8, '  ', 'Color:Green\n\nQuantaty:1\n\nSize:20m\n\nRef:06508\n\n\nPrice:7,99€', '', '', 'images/product_photo_0/_MG_1063_thumb.JPG', NULL, NULL, '1', '7.99', 7.99, '', 0, '', 0, 1),
(15, 'Garden Hose Ref:06506', 2, 8, '  ', 'Color:Green\n\nQuantaty:1\n\nSize:10m\n\nRef:06506\n\nPrice:5.50€', '', '', 'images/product_photo_0/_MG_1066_thumb.JPG', NULL, NULL, '1', '5.50', 5.50, '', 0, '', 0, 1),
(16, 'Cellphone Cover   Ref:04473', 2, 9, ' Covers for Iphone.', 'Ref:04473\n\nPrice:0.95€\n\nColor:mixed\n\nQuantity:12\n\n\n\n', '', '12 pieces / box', 'images/product_photo_0/_MG_5741_copy_thumb.jpg', NULL, NULL, '12', '0.95', 11.40, '', 0, '', 0, 1),
(17, 'Bodycare  Ref: 00008', 2, 10, '', 'Ref: 00008\nUni: 4.65\nQuantity: 1', '', '1 pair', 'images/product_photo_0/IMG_4246_thumb.JPG', NULL, NULL, '1', '4.65', 4.65, '', 0, '', 0, 1),
(18, 'Slim body   Ref:00009', 2, 10, '  ', 'Ref:00009\n\nPrice:3.25€\n\nColor:Pink and beige \n\nQuantity:1', '', '1', 'images/product_photo_0/_MG_6068_copy_thumb.jpg', NULL, NULL, '1', '3.25', 3.25, '', 0, '', 0, 1),
(19, 'Body Depilation Ref:01351', 2, 10, '  ', 'Color:Pink\n\nQuantity:1\n\nPrice:7.85€\n\nRef:01351', '1', '', 'images/product_photo_0/IMG_5046_thumb.JPG', NULL, NULL, '1', '7.85', 7.85, '', 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(10) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `slider_heading` varchar(30) NOT NULL,
  `slider_subheading` varchar(30) NOT NULL,
  `slider_link` varchar(50) NOT NULL,
  `slider_publication_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `slider_heading`, `slider_subheading`, `slider_link`, `slider_publication_status`) VALUES
(1, 'images/slider_image/slide_01.jpg', 'size ', '1220 px and height 460 px  ', '', 1),
(2, 'images/slider_image/slider1.jpg', 'Welcome to Vendedores', 'Attention Please', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_billing`
--
ALTER TABLE `tbl_billing`
  ADD PRIMARY KEY (`billing_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_billing`
--
ALTER TABLE `tbl_billing`
  MODIFY `billing_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
