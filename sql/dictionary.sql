-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 07:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dictionary`
--

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `english` varchar(250) NOT NULL,
  `hindi` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telugu` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `lang_id`, `english`, `hindi`, `telugu`) VALUES
(19, 1, 'Do you eat?', 'क्या आप खाते हैं?', 'మీరు తింటారా?'),
(20, 2, 'Are you eating?', 'क्या तुम खा रहे हो?', 'నువ్వు తింటున్నావా?'),
(21, 3, 'Name', 'नाम', 'పేరు'),
(22, 4, 'Nation', 'राष्ट्र', 'దేశం'),
(23, 5, 'Newspaper', 'समाचार पत्र', 'వార్తాపత్రిక'),
(24, 6, 'Necessary', 'ज़रूरी', 'అవసరం'),
(25, 7, 'Nature', 'प्रकृति', 'ప్రకృతి'),
(26, 8, 'Family', 'परिवार', 'కుటుంబం'),
(27, 31, 'Good Morning', 'शुभ प्रभात', 'శుభోదయం'),
(28, 32, 'Welcome', 'स्वागत', 'స్వాగతం'),
(29, 33, 'How are you?', 'क्या हाल है', 'మీరు ఎలా ఉన్నారు'),
(30, 34, 'Your name is Santosh Kumar', 'आपका नाम संतोष कुमार है', 'మీ పేరు సంతృష్ కుమార్'),
(31, 35, 'May I Come In?', 'क्या मैं अंदर आ सकता हूं', 'నేను లోపలికి రావచ్చా'),
(32, 36, 'I want you to work on this application', 'मैं चाहता हूं कि आप इस एप्लिकेशन पर काम करें', 'మీరు ఈ అనువర్తనంలో పనిచేయాలని నేను కోరుకుంటున్నాను'),
(33, 37, 'How is your fever?', 'आपका बुखार कैसा है', 'మీ జ్వరం ఎలా ఉంది'),
(34, 38, 'Why are you not answering my phone calls?', 'आप मेरे फोन कॉल का जवाब क्यों नहीं दे रहे हैं', 'మీరు నా ఫోన్ కాల్‌లకు ఎందుకు సమాధానం ఇవ్వడం లేదు'),
(35, 39, 'You have to report to the duty on 10th January 2022 at 10:00 A.M. (IST)', 'आपको 10 जनवरी 2022 को सुबह 10:00 बजे ड्यूटी पर रिपोर्ट करनी होगी।', 'మీరు జనవరి 10, 2022 న ఉదయం 10:00 గంటలకు విధికి నివేదించాలి'),
(36, 40, 'We will work together in this company', 'हम इस कंपनी में एक साथ काम करेंगे', 'మేము ఈ సంస్థలో కలిసి పనిచేస్తాము');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
