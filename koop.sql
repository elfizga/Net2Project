-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2019 at 11:40 AM
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
(16, 66, 'مطلوب موظف تسويق لشركة النبضة الرقمية للاتصالات وتقنية المعلومات و ذلك حسب المواصفات التالية:\r\nان يكون لديه الخبرة في التسويق و الدعاية.\r\nان تكون لديه فكرة عن الاتصالات وخدمات الانترنت.\r\nان تكون لديه لغة إنجليزية بمستوي جيد علي الأقل.\r\nان يكون العمر ما بين 25 الى 37سنة .\r\nان يكون قادر على تحمل مسؤلية هدا العمل.\r\nان تكون لديه سرعة البديهة وسرعة التعلم.\r\nان يكون قادر على العمل تحت الضغط والعمل بروح الفريق٠\r\n\r\nلمن يرى في نفسه الكفاءة الرجاء ارسال السيرة الذاتيه الى الرابط.\r\nsales@ditt.ly\r\ninfo@ditt.ly'),
(17, 67, 'شركة بيكو بيتي للخدمات الصحية'),
(18, 68, 'شركة روبيانه للخدمات النفطية ، ترغب في توظيف مهندس مدني علي أن تتوفر فيه الشروط الآتية :\r\n-الخبرة العملية في مجال الهندسة المدنية وفي حدود 10 حتي 15 سنة .\r\n- الخبرة الكافية في مجال النفط والغاز.\r\n-الخبرة في مجال البناء والتشيد .\r\n-الالمام والمعرفة التامة ببرامج الكومبيوتر الخاصة بالهندسة وعلي الأخص برنامج الاتوكاد وPrimavera .\r\n-ايجاد اللغة الانجليزية محادثة وكتابة .\r\n-القدرة علي اعداد العطاءات . فمن يأنس في نفسه القدرة والكفاءة في العمل ،ضرورة ارسال السيرة الذاتية علي الايميل :info@rogsco.com ولن تقبل اي طلبات عبر الهاتف ، وسيتم تحديد المقابلة بعد ارسال السيرة الذاتية عالايميل المدكور .'),
(19, 69, 'شركة  آرتك للحلول التقنية والإعلامية');

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
(8, '41347_blog-post-1.jpeg', 'تصميم كوب', 'تصميم منصة العمل الإلكتروني كوب', 25),
(9, '92034_blog-post-2.jpeg', 'The PurpleCode', 'designed the purple code website', 25);

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
(1, 16, 'مطلوب موظف تسويق ', 'مطلوب موظف تسويق لشركة النبضة الرقمية للاتصالات وتقنية المعلومات و ذلك حسب المواصفات التالية:\r\nان يكون لديه الخبرة في التسويق و الدعاية.\r\nان تكون لديه فكرة عن الاتصالات وخدمات الانترنت.\r\nان تكون لديه لغة إنجليزية بمستوي جيد علي الأقل.\r\nان يكون العمر ما بين 25 الى 37سنة .\r\nان يكون قادر على تحمل مسؤلية هدا العمل.\r\nان تكون لديه سرعة البديهة وسرعة التعلم.\r\nان يكون قادر على العمل تحت الضغط والعمل بروح الفريق٠\r\n\r\nلمن يرى في نفسه الكفاءة الرجاء ارسال السيرة الذاتيه الى الرابط.\r\nsales@ditt.ly\r\ninfo@ditt.ly', '800', 2, 'nabda@gmail.com', '', 2, 1, '2019-02-06 10:11:06', '1869_79268_blog-post-6.jpeg'),
(2, 17, ' توظيف مدرسة لغة انجليزية', 'تعلن شركة بيكو بيتي للخدمات الصحية عن رغبتها في توظيف مدرسة لغة انجليزية\r\n\r\nمتطلبات الوظيفة :\r\n- لديها سلاسة ومرونة فالتعامل مع الاطفال\r\n- إجادة اللغة الإنجليزية بمستوي ممتاز\r\n- دوام العمل من 4 مساءً حتي 7 مساءً\r\nعلى من تري نفسها مؤهلة لهذه الوظيفة التقدم الي مقر الشركة الكائن بمنطقة النوفليين زنقة سهي الحسناء بجانب مدرسة محمد محمود بن عثمان\r\nاو الاتصال بنا على الهاتف : 0910030386\r\nو ارسال السيرة الذاتية عبر الايميل الخاص بالشركة : info@bikkubitti.com.ly\r\n', '1200', 9, 'info@bikkubitti.com.ly', '', 1, 1, '2019-02-06 10:20:23', '12229_50843_51571743_2430755763663558_6209754791338311680_n.jpg'),
(3, 18, 'توظيف مهندس مدني', 'شركة روبيانه للخدمات النفطية ، ترغب في توظيف مهندس مدني علي أن تتوفر فيه الشروط الآتية :\r\n-الخبرة العملية في مجال الهندسة المدنية وفي حدود 10 حتي 15 سنة .\r\n- الخبرة الكافية في مجال النفط والغاز.\r\n-الخبرة في مجال البناء والتشيد .\r\n-الالمام والمعرفة التامة ببرامج الكومبيوتر الخاصة بالهندسة وعلي الأخص برنامج الاتوكاد وPrimavera .\r\n-ايجاد اللغة الانجليزية محادثة وكتابة .\r\n-القدرة علي اعداد العطاءات . فمن يأنس في نفسه القدرة والكفاءة في العمل ،ضرورة ارسال السيرة الذاتية علي الايميل :info@rogsco.com ولن تقبل اي طلبات عبر الهاتف ، وسيتم تحديد المقابلة بعد ارسال السيرة الذاتية عالايميل المدكور .', '2500', 4, 'info@rogsco.com', '', 3, 7, '2019-02-06 10:27:51', '34739_51286692_2436208689784932_260294057727623168_n.jpg'),
(4, 19, 'بحث عن مصممين مبدعين وفنيين مبدعين في مجال التحريك الجرافيكي', 'تبحث شركة آرتك للحلول التقنية والإعلامية عن مصممين مبدعين وفنيين مبدعين في مجال التحريك الجرافيكي والمؤثرات البصرية\r\n‎‏Motion graphic & VFX\r\n‎وبمرتب يبدأ من 3500 د.ل (تحدد القيمة النهائية لاحقاً بحسب خبرة المصمم)\r\n‎المواصفات والمهارات المطلوبة:\r\n‎- لديه حس ابداعي عالي في فن الإخراج والتحريك الجرافيكي.\r\n‎- لديه خبرة في برامج التحريك والموشن جرافيك مثل (Adobe After Effect، Nuke ، Adobe composition (.\r\n‎- لديه إلمام على برامج تصميم الجرافيك مثل (Adobe illustrator, Adobe Photoshop, Corel draw , ).\r\n‎- لديه المعرفة والاطلاع على الأعمال المميزة محليا وعالميا في هذا المجال.\r\n‎- لديه الخبرة في هذا المجال.\r\n‎للتقدم على هذه الوظيفة يرجى ارسال السيرة الذاتية أو معرض أعمال على البريد الالكتروني hr@arttech.ly وكتابة وظيفة \"مصمم موشن جرافيك \" في عنوان البريد الالكتروني.\r\n‎- إرسال معرض أعمالك وتصاميمك في هذا المجال.\r\n‎- شهادات خبرة من جهات عمل سابقة (ان وجدت).\r\n‎- شهادات تدريب متخصصة من مراكز تدريب في هذا المجال (ان وجدت).', '3500', 1, 'hr@arttech.ly', '', 3, 1, '2019-02-06 10:35:37', '25552_51144387_2293854387315063_4190716577026408448_n.jpg');

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
(25, 59, 3, 'لازورد الفيزقة  16/11/98  ، طالبة في كلية تقنية المعلومات قسم تقنيات الانترنت || تصميم مواقع الويب و التصوير الفوتوغرافي || مصممة منصة كوب للعمل الحر\r\n'),
(27, 62, 5, 'منى البوعيشي - طالبة تقنية معومات قسم تقنيات الانترنت ,\r\nمصممة و مطورة مواقع ويب بخبرة سنتين '),
(28, 63, 2, 'نور العالم طالبة تقنية معلومات في السنة الرابعة ,\r\nمهندسة برمجيات و اشتغل في مجال التسويق الإلكتروني بخبرة 5 سنوات '),
(29, 64, 8, 'اماني الخليل طالبة تقنية معلومات قسم هندية البرمجيات اعمل في مجال كتابة المحتوى للمواقع و الجرائد الالكترونية و كتابة المقالات الترويجية كعمل حر .'),
(30, 65, 1, 'نور ابو زيد طالبة في كلية تقنية المعلومات جامعة طرابلس تخصص هندسة برمجيات و من هواياتي التصميم الجرافيكي و هذا ما اشتغله كعمل حر .');

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
(59, 'lazord', 'elfizga', 'lazordelfizga@gmail.com', 'Aqswde123', '0978888888', 1, 3, '7215_elfizga.jpg', '2018-12-19 16:21:00'),
(62, 'Muna', 'El-Boashi', 'muna@gmail.com', '123456789', '0912222222', 1, 2, '34507_muna.jpg', '2019-02-06 09:32:28'),
(63, 'Noor', 'Alalem', 'noor.alalem@gmail.com', '123456789', '0925555555', 1, 2, '42839_8317_tumblr_o3fwzvzomS1t6abt2o1_400.jpg', '2019-02-06 09:36:48'),
(64, 'Amani', 'Alkhalel', 'amani@gmail.com', '123456789', '0925588555', 4, 2, '10461_24412_b0fc5b15e26481e04889ce88f57ba8e3--art-text-girl-drawings.jpg', '2019-02-06 09:43:31'),
(65, 'Noor', 'Abuzaid', 'noor.abuzaid@gmail.com', '123456789', '0945555555', 1, 2, '4847_IMG_20171108_214548_198.jpg', '2019-02-06 09:52:48'),
(66, 'شركة النبضة الرقمية للاتصالات ', 'وتقنية المعلومات', 'nabda@gmail.com', '123456789', '0910000000', 1, 1, '24074_79268_blog-post-6.jpeg', '2019-02-06 10:09:23'),
(67, 'شركة بيكو بيتي', ' للخدمات الصحية', 'info@bikkubitti.com.ly', '123456789', '0910030386 ', 1, 1, '50843_51571743_2430755763663558_6209754791338311680_n.jpg', '2019-02-06 10:18:50'),
(68, 'شركة روبيانه ', 'للخدمات النفطية', 'info@rogsco.com', '123456789', '0919999999', 9, 1, '13929_51286692_2436208689784932_260294057727623168_n.jpg', '2019-02-06 10:24:34'),
(69, ' آرتك للحلول التقنية', ' والإعلامية', 'hr@arttech.ly', '123456789', '0917777777', 1, 1, '9633_51144387_2293854387315063_4190716577026408448_n.jpg', '2019-02-06 10:32:53');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

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
