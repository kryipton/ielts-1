-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 Ara 2019, 13:52:10
-- Sunucu sürümü: 10.4.8-MariaDB
-- PHP Sürümü: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ielts`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `name_az` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `desc_az` text NOT NULL,
  `desc_en` text NOT NULL,
  `desc_ru` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `about`
--

INSERT INTO `about` (`id`, `name_az`, `name_en`, `name_ru`, `img`, `desc_az`, `desc_en`, `desc_ru`) VALUES
(1, 'asd', 'asdas', 'sdasd', 'Blog-post-on-web-dev-.jpg', '<p><span style=\"font-size:18px\">D&uuml;nyanın b&uuml;t&uuml;n istiqamətlərinə.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Baku Holiday Travel b&uuml;t&uuml;n aviaşirkətlərlə əməkdaşlıq edir və İATA sertifikatlaşdırılaraq global bilet sisteminə giriş imkanına malikdir və bununla m&uuml;ştərilərə hər bir istiqamətdə ən sərfəli qiymətlə və zaman baxımından ən rahat aviabiletləri təqdim edir.</span></p>\r\n\r\n<p><span style=\"font-size:18px\"><strong>&Ouml;z sahəsində m&uuml;təxəssis tur menecerlərimiz d&uuml;nyanın b&uuml;t&uuml;n istiqamətlərində turlara ən m&uuml;nasib qiymətləri alaraq m&uuml;ştərilərinə &nbsp;taqdim edir</strong></span></p>\r\n\r\n<p><span style=\"font-size:18px\">Baku Holiday Travel Azərbaycan vətəndaşlarına və xarici vətəndaşlara iş və turizm vizalarının alınmasında k&ouml;məklik g&ouml;stərir. Habelə bizim təcr&uuml;bəli komanda &uuml;zvləri Shengen, USA və digər &ouml;lkələrə viza almaq &uuml;&ccedil;&uuml;n b&uuml;t&uuml;n zəruri sənədləri hazırlamaqda k&ouml;mək edəcək</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Baku Holiday Travel olaraq m&uuml;ştərilərimizə g&ouml;stərdiyimiz peşəkar xidmətlə m&uuml;ştərilərin və əməkdaşlıq etdiyimiz şirkətlərin g&uuml;vənini əldə etmişik.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">M&uuml;ştərilərimizin istəklərinə uyğun peşəkarcasına və qiymət baxımından sərfəli səyahət paketlərini hazırlayaraq &ouml;lkənin ən b&ouml;y&uuml;k və ən etibarlı Səyahət Təşkilatı olmuşuq.</span></p>\r\n', '<p>asd</p>\r\n', '<p>asd</p>\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `blog_category_id` int(11) NOT NULL,
  `name_az` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `desc_az` text NOT NULL,
  `desc_en` text NOT NULL,
  `desc_ru` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `name_az` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `blog_category`
--

INSERT INTO `blog_category` (`id`, `name_az`, `name_en`, `name_ru`, `img`) VALUES
(3, 'asdsd', 'asdsa', 'asdsa', 'graphic-design-tools-Feature_1290x688_MS.jpg'),
(4, 'asdsa', 'asdas', 'asdas', '5ccbff3832642.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name_az` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `desc_az` text NOT NULL,
  `desc_en` text NOT NULL,
  `desc_ru` text NOT NULL,
  `address_az` text NOT NULL,
  `address_en` text NOT NULL,
  `address_ru` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `twitter` text NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `linkedln` text NOT NULL,
  `youtube` text NOT NULL,
  `copy_right` text NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`id`, `name_az`, `name_en`, `name_ru`, `desc_az`, `desc_en`, `desc_ru`, `address_az`, `address_en`, `address_ru`, `phone`, `email`, `twitter`, `facebook`, `instagram`, `linkedln`, `youtube`, `copy_right`, `start_time`, `end_time`) VALUES
(1, ' Əlaqə Baçlıqı Az', ' Əlaqə Baçlıqı en', ' Əlaqə Baçlıqı ru', '<p>Əlaqə az</p>\r\n', '<p>Əlaqə en</p>\r\n', '<p>Əlaqə Ru</p>\r\n', 'Adres Az', 'Adres En', 'Adres Ru', 'tek', 'poct@ASasda', 'Twitter', 'Facebook', 'Instagram', 'Linkedln', 'Youtube', 'Müəllif hüquqları', '11:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name_az` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `desc_az` text NOT NULL,
  `desc_en` text NOT NULL,
  `desc_ru` text NOT NULL,
  `enrolled_users` int(11) NOT NULL,
  `course_time` date NOT NULL,
  `price` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `lectures` int(11) NOT NULL,
  `quizzes` int(11) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `skill_level` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `assessments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `course`
--

INSERT INTO `course` (`id`, `name_az`, `name_en`, `name_ru`, `desc_az`, `desc_en`, `desc_ru`, `enrolled_users`, `course_time`, `price`, `seats`, `img`, `lectures`, `quizzes`, `duration`, `skill_level`, `certificate`, `assessments`) VALUES
(1, 'asd', 'asd', 'asd', '<p>asda</p>\r\n', '<p>sdas</p>\r\n', '<p>d</p>\r\n', 123, '2019-12-17', 123, 123, '804A1250.jpg', 123, 123, 'asdasd', 'asdas', 'das', 'asda');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `course_about`
--

CREATE TABLE `course_about` (
  `id` int(11) NOT NULL,
  `name_az` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `desc_az` text NOT NULL,
  `desc_en` text NOT NULL,
  `desc_ru` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `course_about`
--

INSERT INTO `course_about` (`id`, `name_az`, `name_en`, `name_ru`, `desc_az`, `desc_en`, `desc_ru`) VALUES
(1, 'asd', 'asdasdas', 'asdasdasdasd', 'asdasdasdasdasda', 'sdasdasdasdasdasdasdas', 'dasdasdasasdasdasdadasdaada');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `course_teachers`
--

CREATE TABLE `course_teachers` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name_az` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `desc_az` text NOT NULL,
  `desc_en` text NOT NULL,
  `desc_ru` text NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `events`
--

INSERT INTO `events` (`id`, `name_az`, `name_en`, `name_ru`, `desc_az`, `desc_en`, `desc_ru`, `date`, `start_time`, `end_time`, `img`) VALUES
(1, 'asd', 'asd', 'asd', '<p>adsd</p>\r\n', '<p>asda</p>\r\n', '<p>asdas</p>\r\n', '2019-12-09', '12:00:00', '11:00:00', '5d5bda405449c.jpg'),
(2, 'asdas', 'asdas', 'asdas', '', '', '', '2019-12-24', '12:32:00', '23:04:00', 'indir.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `event_about`
--

CREATE TABLE `event_about` (
  `id` int(11) NOT NULL,
  `name_az` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `desc_az` text NOT NULL,
  `desc_en` text NOT NULL,
  `desc_ru` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `event_about`
--

INSERT INTO `event_about` (`id`, `name_az`, `name_en`, `name_ru`, `desc_az`, `desc_en`, `desc_ru`) VALUES
(1, 'asd', 'asdasdas', 'asdasdasdasd', 'asdasdasdasdasda', 'sdasdasdasdasdasdasdas', 'dasdasdasasdasdasdadasdaada');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `event_gallery`
--

CREATE TABLE `event_gallery` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `name_az` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `desc_az` text NOT NULL,
  `desc_en` text NOT NULL,
  `desc_ru` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `faqs`
--

INSERT INTO `faqs` (`id`, `name_az`, `name_en`, `name_ru`, `desc_az`, `desc_en`, `desc_ru`) VALUES
(1, 'asd1', 'asd', 'asd', 'asd', 'asd', 'asd'),
(2, 'asd2', 'asd', 'asd', 'asd', 'asd', 'asd'),
(3, 'asd3', 'asd', 'asd', 'asd', 'asd', 'asd'),
(4, 'asd4', 'asd', 'asd', 'asd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `faqs_about`
--

CREATE TABLE `faqs_about` (
  `id` int(11) NOT NULL,
  `name_az` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `desc_az` text NOT NULL,
  `desc_ru` text NOT NULL,
  `desc_en` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `name_az` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `desc_az` text NOT NULL,
  `desc_en` text NOT NULL,
  `desc_ru` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name_az`, `name_en`, `name_ru`, `desc_az`, `desc_en`, `desc_ru`, `img`) VALUES
(1, 'asdada', 'asdasda', 'asdasdasd', '<p>asdasd</p>\r\n', '<p>adasd</p>\r\n', '<p>asdas</p>\r\n', '7.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `active_students` int(11) NOT NULL,
  `active_courses` int(11) NOT NULL,
  `alumni` int(11) NOT NULL,
  `awards` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `info`
--

INSERT INTO `info` (`id`, `active_students`, `active_courses`, `alumni`, `awards`) VALUES
(1, 12, 221, 112121, 11);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `logo`
--

INSERT INTO `logo` (`id`, `img`) VALUES
(1, 'avatar.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `main_slide`
--

CREATE TABLE `main_slide` (
  `id` int(11) NOT NULL,
  `title1_az` varchar(255) NOT NULL,
  `title1_en` varchar(255) NOT NULL,
  `title1_ru` varchar(255) NOT NULL,
  `title2_az` varchar(255) NOT NULL,
  `title2_en` varchar(255) NOT NULL,
  `title2_ru` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `main_slide`
--

INSERT INTO `main_slide` (`id`, `title1_az`, `title1_en`, `title1_ru`, `title2_az`, `title2_en`, `title2_ru`, `link`, `img`) VALUES
(1, 'sdasd', 'asdasd', 'asdasd', 'asdas', 'sdsad', 'asdasd', 'https://www.google.com/maps/place/Astara,+Az%C9%99rbaycan/@38.4968365,48.6439823,12z/data=!3m1!4b1!4m5!3m4!1s0x4022683fedf17ac5:0x5411435871e6da47!8m2!3d38.4937845!4d48.6944365?hl=az', 'ford_mustang_ford_car_147558_1920x1080.jpg'),
(2, 'asdsa', 'sda', 'asdas', 'adasd', 'asd', 'asdasd', '', '5ccbff3832642.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name_surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`id`, `name_surname`, `email`, `phone`, `text`) VALUES
(1, 'asdasdasdas', 'asdas', 'asasd', 'asdasdasdasdadas'),
(2, 'asdasd', 'asdas@asdas', 'dasdasd', 'asd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages_about`
--

CREATE TABLE `messages_about` (
  `id` int(11) NOT NULL,
  `name_az` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `desc_az` text NOT NULL,
  `desc_en` text NOT NULL,
  `desc_ru` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `messages_about`
--

INSERT INTO `messages_about` (`id`, `name_az`, `name_en`, `name_ru`, `desc_az`, `desc_en`, `desc_ru`) VALUES
(1, 'ffff', 'asdasdas', 'asdasdasdasd', '<p>asdasdasdasdasda</p>\r\n', '<p>sdasdasdasdasdasdasdas</p>\r\n', '<p>dasdasdasasdasdasdadasdaada</p>\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `study_abroad`
--

CREATE TABLE `study_abroad` (
  `id` int(11) NOT NULL,
  `name_az` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `desc_az` text NOT NULL,
  `desc_en` text NOT NULL,
  `desc_ru` text NOT NULL,
  `img` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `study_abroad`
--

INSERT INTO `study_abroad` (`id`, `name_az`, `name_en`, `name_ru`, `desc_az`, `desc_en`, `desc_ru`, `img`, `link`) VALUES
(1, 'asd', 'asd', 'as', 'dasd', 'asdas', 'd', 'asd', 'asd'),
(2, 'asd', 'asd', 'as', '<p>dasd</p>\r\n', '<p>asdas</p>\r\n', '<p>d</p>\r\n', '614.png', 'asd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name_az` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `title_az` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ru` varchar(255) NOT NULL,
  `desc_az` text NOT NULL,
  `desc_en` text NOT NULL,
  `desc_ru` text NOT NULL,
  `instagram` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `telegram` text NOT NULL,
  `linkedln` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `teachers`
--

INSERT INTO `teachers` (`id`, `name_az`, `name_en`, `name_ru`, `title_az`, `title_en`, `title_ru`, `desc_az`, `desc_en`, `desc_ru`, `instagram`, `facebook`, `twitter`, `telegram`, `linkedln`, `email`, `phone`, `img`) VALUES
(1, 'asd', 'asd', 'asd', 'asd', 'asd', 'asdasd', '<p>asd</p>\r\n', '<p>asd</p>\r\n', '<p>asd</p>\r\n', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '5d5bda405449c_(1).jpg'),
(2, 'cav', 'asd', 'asd', 'asd', 'asd', 'asdasd', '<p>asd</p>\r\n', '<p>asd</p>\r\n', '<p>asd</p>\r\n', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '804A1250.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teachers_about`
--

CREATE TABLE `teachers_about` (
  `id` int(11) NOT NULL,
  `name_az` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `desc_az` text NOT NULL,
  `desc_ru` text NOT NULL,
  `desc_en` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `teachers_about`
--

INSERT INTO `teachers_about` (`id`, `name_az`, `name_en`, `name_ru`, `desc_az`, `desc_ru`, `desc_en`) VALUES
(1, 'asdadasdsad', 'asd', 'asd', '<p>asd</p>\r\n', '<p>asda</p>\r\n', '<p>sd</p>\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `isAdmin`) VALUES
(1, 'super_admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `course_about`
--
ALTER TABLE `course_about`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `course_teachers`
--
ALTER TABLE `course_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `event_about`
--
ALTER TABLE `event_about`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `event_gallery`
--
ALTER TABLE `event_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `faqs_about`
--
ALTER TABLE `faqs_about`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `main_slide`
--
ALTER TABLE `main_slide`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `messages_about`
--
ALTER TABLE `messages_about`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `study_abroad`
--
ALTER TABLE `study_abroad`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `teachers_about`
--
ALTER TABLE `teachers_about`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Tablo için AUTO_INCREMENT değeri `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `course_about`
--
ALTER TABLE `course_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `course_teachers`
--
ALTER TABLE `course_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `event_about`
--
ALTER TABLE `event_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `event_gallery`
--
ALTER TABLE `event_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `faqs_about`
--
ALTER TABLE `faqs_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `main_slide`
--
ALTER TABLE `main_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `messages_about`
--
ALTER TABLE `messages_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `study_abroad`
--
ALTER TABLE `study_abroad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `teachers_about`
--
ALTER TABLE `teachers_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
