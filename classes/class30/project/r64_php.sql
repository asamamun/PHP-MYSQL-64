-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 12:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `r64_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `created`) VALUES
(1, 'Automobiles', 'car', '2025-05-08 05:49:52'),
(2, 'Electronics', 'mobile', '2025-05-05 05:31:57'),
(3, 'Fashion & Apparel', 'tshirt', '2025-05-08 04:43:10'),
(4, 'Home & Kitchen', 'home', '2025-05-08 04:43:10'),
(5, 'Health & Beauty', 'heart', '2025-05-08 04:43:10'),
(6, 'Sports & Outdoors', 'football', '2025-05-08 04:43:10'),
(7, 'Toys & Games', 'puzzle-piece', '2025-05-08 04:43:10'),
(8, 'Books & Stationery', 'book', '2025-05-08 04:43:10'),
(9, 'Furniture & Decor', 'couch', '2025-05-08 04:43:10'),
(10, 'Grocery & Food', 'shopping-basket', '2025-05-08 04:43:10'),
(11, 'Pet Supplies', 'paw', '2025-05-08 04:43:10'),
(12, 'Jewelry & Accessories', 'gem', '2025-05-08 04:43:10'),
(13, 'Baby & Kids', 'baby', '2025-05-08 04:43:10'),
(14, 'DIY & Hardware', 'tools', '2025-05-08 04:43:10'),
(15, 'Office Supplies', 'briefcase', '2025-05-08 04:43:10'),
(16, 'Fitness & Wellness', 'dumbbell', '2025-05-08 04:43:10'),
(17, 'Garden & Outdoor', 'leaf', '2025-05-08 04:43:10'),
(18, 'Footwear', 'shoe-prints', '2025-05-08 04:43:10'),
(19, 'Watches', 'clock', '2025-05-08 04:43:10'),
(20, 'Bags & Luggage', 'suitcase', '2025-05-08 04:43:10'),
(21, 'Musical Instruments', 'music', '2025-05-08 04:43:10'),
(22, 'Software & Services', 'laptop-code', '2025-05-08 04:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `images` varchar(512) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `category_id`, `images`, `created_at`, `updated_at`) VALUES
(1, 'Apple Iphone 16', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 800.00, 200, 2, NULL, '2025-05-08 04:40:46', '2025-05-08 04:40:46'),
(2, 'Samsung QN900D 85″ Neo QLED 8K Smart TV', 'NQ8 AI Gen3 Processor\r\n8K AI Upscaling Pro\r\nInfinity Air Design\r\nSamsung Tizen OS\r\nAI Energy Mode\r\nNeo Quantum HDR 8K Pro\r\nWarranty: 3 Years Panel, 3 Years Spare Parts, 3 Years Service', 900.00, 200, 2, NULL, '2025-05-08 04:52:25', '2025-05-08 04:52:25'),
(3, 'Samsung QN900D 85″ Neo QLED 8K Smart TV', 'NQ8 AI Gen3 Processor\r\n8K AI Upscaling Pro\r\nInfinity Air Design\r\nSamsung Tizen OS\r\nAI Energy Mode\r\nNeo Quantum HDR 8K Pro\r\nWarranty: 3 Years Panel, 3 Years Spare Parts, 3 Years Service', 900.00, 200, 2, NULL, '2025-05-08 04:52:45', '2025-05-08 04:52:45'),
(4, 'LG OLED evo C3 55″ 4K TV', 'Model : 55C3PSA\r\nα9 AI Processor 4K Gen6\r\nBrightness Booster\r\nUltra Slim Design\r\nThinQ AI, WebOS, and Hands-Free Voice Recognition\r\nDolby Atmos & Vision, VRR, G-Sync, and FreeSync\r\nWarranty: 2 Year Panel, 1 Year Spare Parts & 1 Year Free Service', 700.00, 75, 2, NULL, '2025-05-08 05:22:40', '2025-05-08 05:22:40'),
(5, 'al imran emon', 'very good', 100000.00, 5, 16, NULL, '2025-05-08 05:26:09', '2025-05-08 05:26:09'),
(6, 'Havells Power Hunk 800w Mixer Grinder', 'Product details of Havells Power Hunk 800w Mixer Grinder 3 Jar\r\nBrand- Havells\r\nPower: 800 watts\r\n3 speed control knob with pulse function\r\nSuperior 304 grade stainless steel blades\r\nBuilt in over load protector for motor safety\r\nFlow breakers in jars for better performance\r\nBreak resistant polycarbonate lids for all jars\r\nHavells mixer grinder has 800 watts copper winded motors which lead to longer life of motor and superior performance\r\nMade In India', 8000.00, 71, 2, NULL, '2025-05-08 05:27:28', '2025-05-08 05:27:28'),
(7, 'Conion 43″ BE-43W9000G UHD 4K Google TV', 'Screen Size: 43″\r\nResolution: (3840 x 2160)\r\nRAM 2GB\r\nROM 16GB\r\nGoogle Tv\r\nVoice Control Remote\r\nPanel Warranty: 04 Years\r\nMotherboard & Spare Parts: 02 Years\r\nFree Service: 02 Years', 400.00, 100, 2, NULL, '2025-05-08 05:27:29', '2025-05-08 05:27:29'),
(8, 'Havells Power Hunk 800w Mixer Grinder', 'Product details of Havells Power Hunk 800w Mixer Grinder 3 Jar\r\nBrand- Havells\r\nPower: 800 watts\r\n3 speed control knob with pulse function\r\nSuperior 304 grade stainless steel blades\r\nBuilt in over load protector for motor safety\r\nFlow breakers in jars for better performance\r\nBreak resistant polycarbonate lids for all jars\r\nHavells mixer grinder has 800 watts copper winded motors which lead to longer life of motor and superior performance\r\nMade In India', 8000.00, 71, 2, NULL, '2025-05-08 05:27:40', '2025-05-08 05:27:40'),
(9, 'Havells Power Hunk 800w Mixer Grinder', 'Product details of Havells Power Hunk 800w Mixer Grinder 3 Jar\r\nBrand- Havells\r\nPower: 800 watts\r\n3 speed control knob with pulse function\r\nSuperior 304 grade stainless steel blades\r\nBuilt in over load protector for motor safety\r\nFlow breakers in jars for better performance\r\nBreak resistant polycarbonate lids for all jars\r\nHavells mixer grinder has 800 watts copper winded motors which lead to longer life of motor and superior performance\r\nMade In India', 8000.00, 71, 2, NULL, '2025-05-08 05:28:53', '2025-05-08 05:28:53'),
(10, 'Havells Power Hunk 800w Mixer Grinder', 'Product details of Havells Power Hunk 800w Mixer Grinder 3 Jar\r\nBrand- Havells\r\nPower: 800 watts\r\n3 speed control knob with pulse function\r\nSuperior 304 grade stainless steel blades\r\nBuilt in over load protector for motor safety\r\nFlow breakers in jars for better performance\r\nBreak resistant polycarbonate lids for all jars\r\nHavells mixer grinder has 800 watts copper winded motors which lead to longer life of motor and superior performance\r\nMade In India', 8000.00, 71, 2, NULL, '2025-05-08 05:28:55', '2025-05-08 05:28:55'),
(11, 'dress', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 300.00, 100, 13, NULL, '2025-05-08 05:31:09', '2025-05-08 05:31:09'),
(12, 'Kids Science Microscope', 'Kids Science Microscope Set Children Educational Toys with LED 100X 400x 1200x Magnification Gift for Microscope Beginner', 999.00, 21, 7, NULL, '2025-05-08 05:34:33', '2025-05-08 05:34:33'),
(13, 'shoe', 'A shoe is an item of footwear intended to protect and comfort the human foot. Though the human foot can adapt to varied terrains and climate conditions, it is vulnerable, and shoes provide protection. Form was originally tied to function, but over time, shoes also became fashion items.', 500.00, 150, 3, NULL, '2025-05-08 05:37:17', '2025-05-08 05:37:17'),
(14, 'jewelry', 'Jewellery refers to decorative items worn for personal adornment, typically made of precious metals like gold and silver, and often incorporating gemstones. It can be attached to the body or clothes and includes items like brooches, rings, necklaces, earrings, pendants, bracelets, and cufflinks. Jewellery is used for personal expression and adornment.', 5000.00, 5, 3, NULL, '2025-05-08 05:39:03', '2025-05-08 05:39:03'),
(15, 'REDTIGER Dash Cam Front Rear, 4K/2.5K Full HD Dash Camera for Cars, Included 32GB Card, Built-in Wi-Fi GPS, 3.16” IPS', '4K+1080P DUAL RECORDING- REDTIGER brings to you F7NP dual dash cam which records video of up to Ultra HD 4K(3840*2160P)+FHD 1080P resolutions. It helps you to read the important details like road signs, vehicle number plates etc. To reduce the blind areas it has the front wide angle of 170 degree and rear wide angle of 140 degree. This helps you during unexpected circumstances like collision to retain and present evidence.', 120.00, 150, 1, NULL, '2025-05-08 05:41:20', '2025-05-08 05:41:20'),
(16, 'shoe', 'A shoe is an item of footwear intended to protect and comfort the human foot. Though the human foot can adapt to varied terrains and climate conditions, it is vulnerable, and shoes provide protection. Form was originally tied to function, but over time, shoes also became fashion items.', 500.00, 150, 3, NULL, '2025-05-08 05:41:40', '2025-05-08 05:41:40'),
(17, 'Foam Climbing Blocks for Toddlers - 5 Piece Climb and Crawl Foam Playset with Calming Green Color and Washable Cover - Nonslip Soft Play Climbing for Toddlers, Baby Gym, Toys Indoors', 'ENJOY LIMITLESS PLAY STYLES with our 5 Piece Foam Climbing Blocks for Toddlers. This toddler soft play set has a square block, two slides, a step block and a large tumbling equipment mat. It\'s designed to encourage creative thinking and enhance motor skills', 100.00, 300, 7, NULL, '2025-05-08 05:43:09', '2025-05-08 05:43:09'),
(18, 'Roll over image to zoom in      3+  2 VIDEOS Modular Kids Play Couch - 15 Pieces Buildable Plush Play Couch Panels with Ball Pit Square, Backrests - Kids Sofa Furniture for Ages 5-12, for Playroom, Bedroom, Classroom', 'BOOST IMAGINATION, problem-solving, and creativity with the HappyKidd Modular Foam Couch for Kids! Measuring 53\" x 26\" x 19\" when assembled as a kid sofa or playroom couch, it can be taken apart into 15 multi-shaped foam pieces to create whatever they can imagine!', 130.00, 150, 9, NULL, '2025-05-08 05:45:13', '2025-05-08 05:45:13'),
(19, 'Walkar Men\'s Sandal Black RTL- 865401385', 'Walkar Men\'s Sandal Black RTL- 865401385\r\n\r\nBrand: Walkar\r\nItem code: 865401385\r\nGender: Men\r\nUpper material: Leather\r\nSole material: PVC\r\n\r\nOutsole: PU\r\nComfortable durable sole\r\nColor: Black (As given picture)\r\nSize: 39, 40, 41, 42, 43, 44', 1790.00, 23, 18, NULL, '2025-05-08 05:46:22', '2025-05-08 05:46:22'),
(20, 'Walkar Men\'s Sandal Black RTL- 865401385', 'Walkar Men\'s Sandal Black RTL- 865401385\r\n\r\nBrand: Walkar\r\nItem code: 865401385\r\nGender: Men\r\nUpper material: Leather\r\nSole material: PVC\r\n\r\nOutsole: PU\r\nComfortable durable sole\r\nColor: Black (As given picture)\r\nSize: 39, 40, 41, 42, 43, 44', 1790.00, 23, 18, NULL, '2025-05-08 05:46:50', '2025-05-08 05:46:50'),
(21, 'The Alchemist', 'দি আলকেমিস্ট হচ্ছে ব্রাজিলিয়ান লেখক পাওলো কোয়েলহো রচিত একটি বিখ্যাত উপন্যাস, যা প্রথম প্রকাশিত হয় ১৯৮৮ সালে। এটি মূলত পর্তুগিজ ভাষায় রচিত হয় এবং অক্টোবর ২০১৪ পর্যন্ত অন্তত ৮০ টি ভাষায় অনুদিত হয়েছে। দি আলকেমিস্ট একটি রূপকধর্মী উপন্যাস যেখানে নায়ক একজন তরুণ আন্দালুসিয়ান মেষপালক।', 150.00, 120, 8, NULL, '2025-05-08 05:47:39', '2025-05-08 05:47:39'),
(22, 'Green Tea', 'গ্রিন টিতে থাকা অ্যান্টিঅক্সিডেন্ট, যার মধ্যে রয়েছে EGCG এবং অন্যান্য ক্যাটেচিন, \"খারাপ\" কোলেস্টেরল (কম ঘনত্বের লাইপোপ্রোটিন বা LDL) এবং মোট কোলেস্টেরল কমায়। গ্রিন টিতে কোয়ারসেটিন এবং থেফ্লাভিন নামক অন্যান্য হৃদরোগ-রক্ষাকারী ফ্ল্যাভোনয়েডও রয়েছে।', 10.00, 5000, 5, NULL, '2025-05-08 06:16:19', '2025-05-08 06:16:19'),
(23, 'Marvel Comics', 'Marvel Comics is a New York City–based comic book publisher, a property of the Walt Disney Company since December 31, 2009, and a subsidiary of Disney Publishing Worldwide since March 2023. Marvel was founded in 1939 by Martin Goodman as Timely Comics,[3] and by 1951 had generally become known as Atlas Comics. The Marvel era began in August 1961 with the launch of The Fantastic Four and other superhero titles created by Stan Lee, Jack Kirby, Steve Ditko, and numerous others. The Marvel brand, which had been used over the years and decades, was solidified as the company\'s primary brand.', 850.00, 20, 8, NULL, '2025-05-08 06:27:41', '2025-05-08 06:27:41'),
(24, 'test', 'test', 666.00, 77, 12, '', '2025-05-08 06:45:08', '2025-05-08 06:45:08'),
(25, 'sadfdsf', 'sadfsdf', 55.00, 55, 15, '', '2025-05-08 06:47:40', '2025-05-08 06:47:40'),
(26, 'asdgfdsag', 'asdgdsafg', 555.00, 55, 11, '495568113_1241407240690674_78307574797072097_n.jpg,7355d472-d5c8-4e7f-a8ad-e9c34ad0db72.jpg,495193576_10171716103050650_4752562443231275877_n.jpg', '2025-05-08 06:49:58', '2025-05-08 06:49:58'),
(27, 'test', 'test', 99.00, 99, 21, '475389896_1184676146996406_678147751464125251_n.jpg,474640907_542587818802367_7740887134878869680_n.jpg,473334087_1155480942602628_7388491413122541218_n.jpg,473238721_1155480905935965_7087156492902926503_n.jpg,pillar (3) (1).jpg', '2025-05-08 06:55:38', '2025-05-08 06:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `recentsearch`
--

CREATE TABLE `recentsearch` (
  `id` int(11) NOT NULL,
  `searchterm` varchar(128) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `role` set('admin','user','superadmin','') NOT NULL DEFAULT 'user',
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `active`, `role`, `created`) VALUES
(7, 'mamun', 'mamun@gmail.com', '324587654', '$2y$10$7Lf1B8207VRcN2/t/Te4Y.Gu58TUo.JCgr3WmxP.davfpBLjVkq6W', 1, 'admin', '2025-05-06 06:12:43'),
(8, 'al imran emon', 'imranemon334@gmail.com', '01567954701', '$2y$10$LH4l0I20FN8pW6M3FEn9EuT5tZjR6ET9tANFSvfKHjt3E4yEau3/2', 1, 'admin', '2025-05-06 06:12:45'),
(9, 'Md. Ishaq Hossain', 'ishaqhossain98@gmail.com', '01783629582', '$2y$10$9SUurMmJMlmm.hIp57hUO.tbSkZKpxOdMe5Tn8p9uWiSfLC5jhnPC', 1, 'admin', '2025-05-06 06:12:47'),
(10, 'rasibul kabir', 'mdfarhadbhuiyan@yahoo.com', '01728510359', '$2y$10$bZMJZSa/IQEMKkT5vvaNBOnSgVutxqfIRPDpxb4Ojx8M3mHeU..TW', 1, 'admin', '2025-05-06 06:12:48'),
(11, 'sume', 'bisew.tahminasumi@gmail.com', '01960474971', '$2y$10$hjyhaIvXbjxA6z1VMZ1bHeRHGIlNTJj/q06isfO1XNEXoE6snoiCy', 1, 'admin', '2025-05-06 06:13:08'),
(12, 'abcd', 'abcd@gmail.com', '', '$2y$10$Cqy7XA6Qs9SEkfH.UlhALe.k16qCIlxkbVi6R.v7NgmmkiA7p9uhe', 1, 'admin', '2025-05-06 06:13:22'),
(13, 'Muntasir', 'muntasirmahmudcn42@gmail.com', '01794000000', '$2y$10$MlQTB0.0/UZByFvxUGB6O.dVYQxUZWOlCVj6fgL.eji3EhE..8gAW', 1, 'admin', '2025-05-06 06:14:08'),
(14, 'Shamima Naznin', 'rune182013@gmail.com', '01776056456', '$2y$10$a4N0j/4.Nety9Q./fXH7sucjmKWd0mX5PCMYZQYF1h5ZK6UewC/pa', 1, 'admin', '2025-05-06 06:15:17'),
(15, 'Tony Stark', 'tony@ironman.com', '+852456789123', '$2y$10$7aJlp/91DVer316eOiudJuecIvkz/3eUza3RB7ZYF6pALv61Ged7a', 1, 'admin', '2025-05-06 06:15:49'),
(17, 'Abdul Aziz Khan', 'abdulazizkhan.web@gmail.com', '01521557565', '$2y$10$6j3rmTnXV.fyTUptKsOtwO8I.FLpSjHa/PFTbXSz/PCwtzgVD1sc2', 1, 'admin', '2025-05-06 06:18:24'),
(20, 'idb bisew', 'idb@gmail.com', '436858765', '$2y$10$2bVCWT3OXC1131/6B/mU8ugKzvGUDsqKq9Uh0cHDNKnpn4NccNoJy', 1, 'admin', '2025-05-06 06:46:17'),
(21, 'muntasir_CR7', 'mmsoft@gmail.com', '01700000000', '$2y$10$qI9cQsMgKgPE/7MuaTTfmuJ0kilg8wnlySUt3mCFgs1rjw0eIAj6e', 1, 'admin', '2025-05-06 06:48:31'),
(22, 'test5', 'test5@gmail.com', '3456897', '$2y$10$DRnMN5WKJVvju2LoTSaWRe6f34bOK7xeEd6EOb9ZWzVPz0VX98sL2', 1, 'admin', '2025-05-07 04:23:58'),
(23, 'test6', 'test6@gmail.com', '123123123', '$2y$10$qRvLKn3Hw8x3U4FYVeZ6GOy0A207kHAKiVCGMKlHYsdYqhpEWnrBS', 1, 'admin', '2025-05-08 04:06:48'),
(24, 'Flash', 'flash@gmail.com', '123456789', '$2y$10$b6tRKQkMYzvVpA7gXzdhMe66T3xidyFEBWvrPcS9btkyWCxTDCuDm', 1, 'admin', '2025-05-08 04:51:43'),
(25, 'Charu', 'jhuma@gmail.com', '0177772345', '$2y$10$5I9bXq4hAUH8HeaXQL0R5uMknnz12RM9xazvYhD3T7g/4dG8NJO.q', 1, 'admin', '2025-05-08 05:34:55'),
(26, 'rakib', 'rakib@gmail.com', '012000000', '$2y$10$U1FXhpMtUZYmLL8aFmjoy.F9zNJCCS0vHXkqcKi.6/EQ8lG3FK9CW', 1, 'admin', '2025-05-08 05:37:55'),
(27, 'Al Imran Emon', 'imran@hotmail.com', '124578', '$2y$10$aWdSoNszt.5ZyoyvZZHqu.Qfb84Wa7j5DpdTWl8fBmuxp00DadI3u', 1, 'admin', '2025-05-08 05:43:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `recentsearch`
--
ALTER TABLE `recentsearch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `recentsearch`
--
ALTER TABLE `recentsearch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
