-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2024 at 04:57 AM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeanywhere`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(15) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regdate` datetime NOT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `firstname`, `lastname`, `email`, `password`, `regdate`, `comment`) VALUES
(1, 'Mr', 'Admin', 'admin@test.se', 'admin123', '2023-12-07 13:38:33', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_comments`
--

CREATE TABLE `admin_comments` (
  `commentid` int(15) NOT NULL,
  `uid` int(15) NOT NULL,
  `admin_comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_comments`
--

INSERT INTO `admin_comments` (`commentid`, `uid`, `admin_comment`) VALUES
(8, 6, 'okej det löser jag!'),
(15, 10, 'låter rimligt, fixar!');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(15) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(15) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(7, 'lerfigurer'),
(8, 'tavlor'),
(9, 'kort'),
(10, 'gosedjur');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(15) UNSIGNED NOT NULL,
  `uid` int(15) NOT NULL,
  `specialproduct` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `senddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(15) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(15) NOT NULL,
  `theme_id` int(15) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `product_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `theme_id`, `product_image`, `product_price`, `date`, `product_status`) VALUES
(23, 'cocoa croaker', 'Överraska dina nära och kära med en touch av humor och hjärtevärme med vårt charmiga julkort \"cocoa croaker\". en söt, småputtrande groda njuter av en rykande kopp choklad i en vinteridyll, skapandes en magisk atmosfär av julglädje.', 'julkort, groda, jul ', 9, 6, 'cocoa croaker.jpeg', '111', '2023-12-19 11:53:59', '5'),
(24, 'gift-wrap rabbit', 'denna bedårande kanin  sprider feststämning när den charmigt slår in paket, och  skapar en lekfull och gullig  atmosfär.', 'julkort, kanin, jul', 9, 6, 'gift-wrap rabbit.jpeg', '111', '2023-12-19 11:54:46', '5'),
(25, 'ice-skate berrington', 'fånga magin av vintern med vårt förtrollande julkort \"ice-skate bearington\". en lekfull björn sveper över isen i eleganta skridskor, sprider glädje och festlig energi till alla som ser det.', 'julkort, björn, jul', 9, 6, 'ice-skate berrington.jpeg', '111', '2023-12-19 11:55:32', '5'),
(26, 'merry mousington', 'detta charmiga kort är som en snöflinga av glädje och värme. merry mousington blir den perfekta budbäraren för dina hälsningar och ger varje mottagare ett leende med sitt lekfulla uttryck och juliga klädsel.', 'julkort, mus, jul', 9, 6, 'merry mousington.jpeg', '111', '2023-12-19 11:56:17', '5'),
(27, 'wishlist wilbur ', 'detta lekfulla kort är som en kärleksfull blinkning till barnasinnet och de små glädjeämnen som julen för med sig. med wishlist wilbur blir varje önskan och varje ögonblick en påminnelse om den underbara julandan.', 'julkort, gris, jul', 9, 6, 'wishlist wilbur.jpeg', '111', '2023-12-19 11:57:08', '5'),
(28, 'stocking snatcher', 'låt julhumorn sprudla med vårt skrattframkallande julkort \"stocking snatcher\". en skojig ren med glimten i ögat har gett sig på julstrumpan och snor paket med sitt busiga upptåg.', 'julkort, ren, jul', 9, 6, 'stoocking snatcher.jpeg', '111', '2023-12-19 11:58:02', '5'),
(40, 'dino', 'perfekt som en söt dekoration eller som en trogen vän för de små.', 'gosedjur, dinosaurie, virkning', 10, 5, 'dinovirkad-min.png', '555', '2024-01-06 02:45:08', '10'),
(41, 'elf the worker', 'möjliggör en dos av julmagi med vår virkade lergubbe elf the worker. handgjord med detaljerad precision och en glimt i ögat, denna lilla arbetare är redo att sprida festlig stämning och lekfullhet.', 'elf, lerfigur', 7, 6, 'elf-min.png', '111', '2024-01-06 02:47:06', '10'),
(42, 'slaying goofy', 'med detaljerad design och en twist av humor blir denna figur ett lekfullt tillskott till din festliga dekoration.', 'goofy, lerfigurer, jul', 7, 6, 'goofy-min.png', '111', '2024-01-06 02:48:28', '10'),
(43, 'the grinch & max', 'grinchen och hans lojala hund max är här för att sprida lekfull julglädje! denna bedårande lergubbeduo är redo att lysa upp ditt hem med skratt och charm. perfekt för en festlig touch!', 'grinch, max, lerfigurer', 7, 6, 'grinchmax-min.png', '111', '2024-01-06 02:49:32', '10'),
(44, 'olaf', 'vår olof lergubbe är redo att smälta ditt hjärta! med sin morotsnäsa och lekfulla attityd är denna handgjorda lergubbe en kramvän i vinterkylan. ge ditt hem en touch av magi och värme med olof, din glada lergubbe från frostiga äventyr!', 'olaf, lerfigurer', 7, 6, 'olaf-min.png', '111', '2024-01-06 02:50:19', '10'),
(45, 'piff', 'sprudlande glädje i en liten lergubbe! piff lergubben är din glittrande kompis, redo att förgylla varje stund med sitt lekfulla leende. en charmig touch av glädje!', 'piff, lerfigurer, jul', 7, 6, 'piff-min.png', '111', '2024-01-06 02:51:17', '10'),
(46, 'puff', 'söt, rund och redo att sprida glädje – möt puff, din nya bästa lilla vän! en lekfull touch av charm för att liva upp varje hörn.', 'puff, lerfigurer, jul', 7, 6, 'puff-min.png', '111', '2024-01-06 02:52:42', '10'),
(47, 'crush the turtle', 'mjuk, charmig och full av glädje – vår virkade sköldpadda är den perfekta lilla kompisen. en kärleksfull gåva som sprider leenden.', 'sköldpadda, virkning, gosedjur', 10, 5, 'sköldpaddavirkad-min.png', '555', '2024-01-06 02:54:02', '10'),
(48, 'elly the elephant', 'elly, den lekfulla elefanten, är redo att sprida charm och glädje i ditt hem. ett gulligt tillskott för lekfull atmosfär!', 'elefant, gosedjur', 10, 5, 'virkadelefant-min.png', '555', '2024-01-06 02:54:58', '10'),
(49, 'rocka & val', 'dyk in i havets magi med vårt virkade set av rocka och val. handgjorda för att sprida havets lugn och skönhet. en perfekt duo för alla som älskar den marina charmen', 'gosedjur, hav, fisk', 10, 5, 'virkadhav-min.png', '555', '2024-01-06 02:55:50', '10'),
(50, 'queenie', 'utforska charm och kreativitet med vår virkade queenie. med detaljerad precision och en touch av lekfullhet, är denna söta ko det perfekta sättet att sprida glädje och unikhet.', 'ko, gosedjur', 10, 5, 'virkadko-min.png', '555', '2024-01-06 02:57:16', '10'),
(51, 'teddy björnen fredriksson', 'mjuk, gosig och full av kärlek – vår virkade björn är den perfekta kramkamraten. ge en unik dos av värme med teddy björnen fredriksson.', 'teddy, gosedjur, björn', 10, 5, 'virkadted-min.png', '555', '2024-01-06 02:58:16', '10');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `theme_id` int(15) NOT NULL,
  `theme_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`theme_id`, `theme_title`) VALUES
(5, 'sommar'),
(6, 'jul');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(15) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `admin_comments`
--
ALTER TABLE `admin_comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`theme_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_comments`
--
ALTER TABLE `admin_comments`
  MODIFY `commentid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `theme_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
