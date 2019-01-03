-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2019 at 02:54 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koop`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ID`, `name`) VALUES
(1, 'طرابلس'),
(2, 'بنغازي'),
(3, 'مصراتة'),
(4, 'الزاوية'),
(5, 'زليتن'),
(6, 'البيضاء'),
(7, 'غريان'),
(8, 'طبرق'),
(9, 'صبراتة'),
(10, 'سبها'),
(11, 'الخمس'),
(12, 'درنة'),
(13, 'سرت'),
(14, 'الجميل'),
(15, 'الكفرة'),
(16, 'المرج'),
(17, 'ترهونة'),
(18, 'مسلاتة'),
(19, 'يفرن'),
(20, 'بني وليد'),
(21, 'صرمان'),
(22, 'رقدالين'),
(23, 'الزنتان'),
(24, 'زوارة'),
(25, 'شحات'),
(26, 'أوباري'),
(27, 'الأبيار'),
(28, 'زلطن');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `user_ID`, `bio`) VALUES
(12, 55, ' Student at University of Tripoli Full stack Developer : HTML5, CSS3, Javascript, jQuery, PHP, MySQL, Bootstrap, Laravel Framework | Desktop Applications Developer: JavaFX, Swing | Android Developer : Java '),
(13, 56, 'إدارة منصة العمل الحر الليبية , منصة عمل كوب لنشر و إيجاد الوظائف ,\r\nللتواصل معنا يرجى إرسال رسالة الى البريد الإلكتروني التالي \r\nelfizga@koop.ly \r\nيسرنا سماع اقتراحاتكم و الاجابة عن كامل اسئلتكم .'),
(14, 58, 'شركة تقنيات المستقبل لبيع و تجارة الاجهزة الاكترونية انحاء مدن ليبيا - المكان غريان ارجو التواصل معنا على الرقم التالي لاي استفسار : 0920000000');

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `ID` int(11) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`ID`, `type`) VALUES
(1, 'دوام كامل'),
(2, 'دوام جزئي'),
(3, 'عمل حر'),
(4, 'فترة تدريبية ');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `ID` int(11) NOT NULL,
  `imageURL` varchar(256) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `technician_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`ID`, `imageURL`, `title`, `description`, `technician_ID`) VALUES
(6, '18634_koop_logo.png', 'تصميم موقع', 'تصميم وتطوير منصة كوب الالكترونية للاعمال الحرة ', 25);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `ID` int(11) NOT NULL,
  `customer_ID` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `discription` text,
  `initialPrice` decimal(10,0) DEFAULT NULL,
  `specialization_ID` int(11) NOT NULL,
  `email` text NOT NULL,
  `url` varchar(50) NOT NULL,
  `jobType_ID` int(11) NOT NULL,
  `city_ID` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `request_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`ID`, `customer_ID`, `title`, `discription`, `initialPrice`, `specialization_ID`, `email`, `url`, `jobType_ID`, `city_ID`, `time`, `request_img`) VALUES
(22, 12, 'مطلوب مبرمج جافا', ' مطلوب مبرمج جافا للعمل معنا عن بعد لانشاء ويب سيرفيس براتب شهري\r\nمدة العمل 4 ساعات يوميا\r\nاجادة التعامل مع إعداد السيرفر لتشغيل الويب سيرفيس عليه وخصوصا Tomcat\r\nإجادة التعامل مع مشاكل السيرفر عند توقف الويب سيرفيس\r\nإجادة التعامل مع قواعد البيانات MySQL\r\n\r\nإجادة برمجة الاندرويد (يفضل)', '1000', 5, 'mahmoudbebjabir@gmail.com', '', 2, 1, '2018-11-22 15:25:20', '84070_Java-logo-490x301.jpg'),
(23, 13, 'مطلوب كاتب محتوى ', '– المهمة الأساسية لكاتب المحتوى هي تغيير قناعات القرّاء إيجابًا تجاه ما ينشر؛ لذا يسعى من خلال النصوص أو الصور أو المقاطع المرئية التسويقية لاستقطاب الجمهور نحو فكرته للإيمان بها ودعمها.\r\n\r\n– الرد على أسئلة الزوار والمتابعين أو تعليقاتهم بطريقة تفاعلية تزيد قربهم من المنتج أو الرسالة أو الشخصية التي يتحدث عنها.\r\n\r\n– كتابة المحتوى النصي المجرد، أو الوصفي للصور، أو المختصر للفيديو (الموشن جرافيك) ويعتبر الأخير فن يحتاج قدرات نخبوية في الاختصار والتعبير.\r\n\r\nمع خبرة لا تقل عن سنتين في كتابة المحتوى سواء في التدوين او النشرات الصحفية او التقارير و مواقع التواصل الاجتماعي .', '500', 8, 'elfizga@koop.ly', '', 1, 1, '2018-11-22 18:58:11', '1430_30078_63822_blog-2-369x253.jpg'),
(24, 14, 'فني تركيب كاميرات مراقبة', 'فني تركيب كاميرات مراقبة و مكان سكنه داخل مدينة صبراتة و التركيب يكون بأعلى مستوى وبدقة عالية الجودة  , نظام كاميرات لنقل الصور للرصد عن مسافات بعيدة وقصيرة من أجل ضمان سلامة المنشآت والمباني من الداخل والخارج و ساعات العمل صباحية لاي استفسار قدم طلب للوظيفة او راسلنا على الرقم 0910000000\r\n', '150', 5, 'elfizga@koop.ly', '', 3, 9, '2018-11-22 19:20:11', '9753_teq.jpg'),
(25, 13, ' مطلوب موظف it ', 'مطلوب مهندس IT للعمل باحدي شركات البرمجيات والنظم الالكترونية الليبية علما بان المرتب المبدئي 800 دينار قابل للزيادة\r\n\r\nالرجاء ارسال الcv علي elfizga@koop.ly\r\n\r\nلأي استفسار يرجى الاتصال على الرقم 092555555555', '800', 5, 'elfizga@koop.ly', '', 1, 1, '2018-11-22 19:51:33', '28029_shutterstock_318368642.jpg'),
(27, 13, 'hey', 'heyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyheyvv', '100', 3, 'loza@gmail.com', '', 1, 1, '2018-12-24 17:11:59', '13878_8317_tumblr_o3fwzvzomS1t6abt2o1_400.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`ID`, `Name`) VALUES
(1, 'التصميم و الجرافيك'),
(2, 'التسويق الإلكتروني'),
(3, 'تصميم و تطوير مواقع الويب '),
(4, 'تجارة و ادارة الأعمال'),
(5, 'تقنية المعلومات'),
(6, 'خدمات ترجمة '),
(7, 'التصوير الفوتوجرافي'),
(8, 'كتابة المحتوى و المقالات الترويجية'),
(9, 'التعليم الإلكتروني');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `specialization_ID` int(11) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`ID`, `user_ID`, `specialization_ID`, `bio`) VALUES
(25, 54, 3, 'لازورد الفيزقة  16/11/98  ، طالبة في كلية تقنية المعلومات قسم تقنيات الانترنت || تصميم مواقع الويب و التصوير الفوتوغرافي || مصممة منصة كوب للعمل الحر\r\n'),
(26, 57, 5, 'zumord elfizga - 17 years old || high school student , websites designer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(256) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `city_ID` int(11) NOT NULL,
  `userType_ID` int(11) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `firstName`, `lastName`, `email`, `password`, `phone`, `city_ID`, `userType_ID`, `user_img`, `date`) VALUES
(54, 'Lazord', 'El-Fizga', 'lazord@gmail.com', 'Aqswde123', '0945447586', 1, 2, '7215_elfizga.jpg', '2018-11-22 14:58:34'),
(56, 'منصة ', 'كوب', 'elfizga@koop.ly', 'Aqswde123', '0910000000', 1, 1, '33909_koop.jpg', '2018-11-22 15:29:33'),
(57, 'zumord', 'El-Fizga', 'zumord@gmail.com', 'Aqswde123', '0925555555', 1, 2, 'avatar.png', '2018-11-22 18:18:28'),
(58, 'شركة', 'تقنيات المستقبل', 'teq@gmail.com', 'Aqswde123', '0925588555', 7, 1, '76359_14132_company-1-52x52.png', '2018-11-22 19:12:56'),
(59, 'lazord', 'elfizga', 'lazordelfizga@gmail.com', 'Aqswde123', '0978888888', 1, 3, '', '2018-12-19 16:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `ID` int(11) NOT NULL,
  `typeName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`ID`, `typeName`) VALUES
(1, 'CUSTOMER'),
(2, 'TECHNICIAN'),
(3, 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `technician_ID` (`technician_ID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `specialization_ID` (`specialization_ID`),
  ADD KEY `customer_ID` (`customer_ID`),
  ADD KEY `city_ID` (`city_ID`),
  ADD KEY `job_Type` (`jobType_ID`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `specialization_ID` (`specialization_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userType_ID` (`userType_ID`),
  ADD KEY `city_id_fk` (`city_ID`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `technician_ID` FOREIGN KEY (`technician_ID`) REFERENCES `technician` (`ID`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `city_ID` FOREIGN KEY (`city_ID`) REFERENCES `city` (`ID`),
  ADD CONSTRAINT `job_Type` FOREIGN KEY (`jobType_ID`) REFERENCES `job_type` (`ID`),
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`customer_ID`) REFERENCES `customer` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
