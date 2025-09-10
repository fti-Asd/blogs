-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 08, 2025 at 03:42 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `last_name` varchar(128) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `national_code` varchar(10) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `gender` tinyint UNSIGNED NOT NULL DEFAULT '1' COMMENT '0: male | 1: female',
  `mobile` varchar(11) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `email` varchar(128) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `avatar_file_id` bigint UNSIGNED DEFAULT NULL,
  `role_id` int UNSIGNED NOT NULL,
  `username` varchar(128) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1' COMMENT '0: deactive | 1: active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admins_fk1` (`avatar_file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `national_code`, `gender`, `mobile`, `email`, `avatar_file_id`, `role_id`, `username`, `password`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'فاطمه', 'اسدی', '2081107171', 1, '09102524337', 'ftiasg1401@gmail.com', NULL, 1, 'fatemehAdmin', '$2y$12$zWLetI9.ZVu7YPBjeC4h.OZ8zHAk979OOtqLAUZJEmqt2DOlTaFQW', 1, '2025-09-07 10:53:30', '2025-09-07 10:53:30', NULL),
(2, 'ونوشه', 'داوودی', '2081108181', 1, '', 'vanoshe@gmail.com', NULL, 2, 'vanosheAuthor', '$2y$12$zWLetI9.ZVu7YPBjeC4h.OZ8zHAk979OOtqLAUZJEmqt2DOlTaFQW', 1, '2025-09-07 10:57:34', '2025-09-07 10:57:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_levels`
--

DROP TABLE IF EXISTS `admin_levels`;
CREATE TABLE IF NOT EXISTS `admin_levels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level_name` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32;

--
-- Dumping data for table `admin_levels`
--

INSERT INTO `admin_levels` (`id`, `level_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ادمین اصلی', '2025-09-07 10:52:52', '2025-09-07 10:52:52', '2025-09-07 10:52:52'),
(2, 'نویسنده', '2025-09-07 10:52:52', '2025-09-07 10:52:52', '2025-09-07 10:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_fk1` (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `news_id` bigint UNSIGNED NOT NULL,
  `comment_id` bigint UNSIGNED DEFAULT NULL,
  `comment_text` varchar(255) NOT NULL,
  `status` tinyint UNSIGNED NOT NULL COMMENT '0: pending | 1: accepted | 2: rejected',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_fk1` (`comment_id`),
  KEY `comment_fk2` (`news_id`),
  KEY `comment_fk3` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `path` varchar(256) NOT NULL,
  `extension` varchar(10) NOT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_id` bigint UNSIGNED NOT NULL,
  `news_id` bigint UNSIGNED NOT NULL,
  `operation_status` tinyint UNSIGNED NOT NULL COMMENT '0: news created | 1: news updated | 2: news deleted',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `logs_fk1` (`admin_id`),
  KEY `logs_fk2` (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `abstract` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `news_category_id` bigint UNSIGNED NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT '0: draft | 1: published | 2: archived',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `news_fk1` (`news_category_id`),
  KEY `news_fk2` (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf32;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `abstract`, `description`, `news_category_id`, `admin_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'پیشرفت جدید در هوش مصنوعی', 'محققان موفق به توسعه الگوریتمی هوشمند شدند.', 'در گزارشی تازه اعلام شد که پژوهشگران توانسته‌اند الگوریتمی را طراحی کنند که سرعت پردازش داده‌ها را تا دو برابر افزایش می‌دهد.', 7, 1, 1, '2025-09-07 14:29:22', '2025-09-07 14:29:22', '0000-00-00 00:00:00'),
(8, 'نشست سران کشورهای منطقه برگزار شد', 'رهبران کشورهای همسایه برای بررسی مسائل مشترک گرد هم آمدند.', 'این نشست با محوریت همکاری‌های اقتصادی و امنیتی در پایتخت یکی از کشورهای منطقه برگزار شد و توافق‌های جدیدی به امضا رسید.', 8, 1, 1, '2025-09-07 14:29:22', '2025-09-07 14:29:22', '0000-00-00 00:00:00'),
(9, 'کشف سیاره‌ای شبیه زمین', 'دانشمندان ناسا یک سیاره جدید کشف کردند.', 'این سیاره در فاصله ۱۲۰۰ سال نوری از زمین قرار دارد و شرایط آن شباهت زیادی به سیاره ما دارد.', 9, 1, 1, '2025-09-07 14:29:22', '2025-09-07 14:29:22', '0000-00-00 00:00:00'),
(10, 'طرح جدید برای کاهش ترافیک شهری', 'شهرداری از برنامه‌ای تازه رونمایی کرد.', 'در این طرح، مسیرهای ویژه دوچرخه و حمل و نقل عمومی توسعه می‌یابند تا بار ترافیکی شهر کاهش یابد.', 10, 1, 1, '2025-09-07 14:29:22', '2025-09-07 14:29:22', '0000-00-00 00:00:00'),
(11, 'پیروزی تیم ملی در مسابقات آسیایی', 'تیم ملی کشورمان به مرحله نیمه‌نهایی صعود کرد.', 'در دیداری پرهیجان، تیم ملی توانست با نتیجه ۲ بر ۱ حریف خود را شکست دهد و به جمع چهار تیم برتر راه یابد.', 11, 1, 1, '2025-09-07 14:29:22', '2025-09-07 14:29:22', '0000-00-00 00:00:00'),
(12, 'داروی جدید برای درمان بیماری قلبی معرفی شد', 'پژوهشگران داروی نوینی را به ثبت رساندند.', 'این دارو توانسته است در مراحل آزمایشگاهی نتایج بسیار امیدوارکننده‌ای برای کاهش ریسک سکته قلبی نشان دهد.', 12, 1, 1, '2025-09-07 14:29:22', '2025-09-07 14:29:22', '0000-00-00 00:00:00'),
(13, 'عرضه گوشی هوشمند تاشو نسل جدید', 'شرکت بزرگ فناوری از گوشی تاشو جدید خود رونمایی کرد.', 'این گوشی با نمایشگر مقاوم‌تر و باتری قدرتمندتر به بازار عرضه می‌شود و انتظار می‌رود با استقبال گسترده روبه‌رو شود.', 7, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(14, 'اینترنت ماهواره‌ای در مناطق دورافتاده', 'پروژه‌ای تازه برای دسترسی به اینترنت پرسرعت.', 'شرکت‌های فعال در حوزه فناوری اعلام کردند که پوشش اینترنت ماهواره‌ای حالا به مناطق دورافتاده هم رسیده است.', 7, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(15, 'روبات‌های صنعتی هوشمندتر شدند', 'نسل جدید روبات‌ها در کارخانه‌ها استفاده می‌شود.', 'این روبات‌ها قابلیت یادگیری حرکات انسانی را دارند و می‌توانند کارایی تولید را افزایش دهند.', 7, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(16, 'تحول بزرگ در انرژی خورشیدی', 'پنل‌های خورشیدی جدید راندمان بالاتری دارند.', 'محققان موفق شده‌اند پنل‌هایی تولید کنند که تا ۴۰ درصد انرژی بیشتری جذب می‌کنند.', 7, 1, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(17, 'پیشرفت چشمگیر در چاپ سه‌بعدی', 'چاپ سه‌بعدی برای ساخت قطعات پیچیده به‌کار می‌رود.', 'این فناوری اکنون قادر است قطعات فلزی مقاوم و بزرگ را با هزینه کمتر تولید کند.', 7, 1, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(18, 'انتخابات پارلمانی برگزار شد', 'مشارکت مردم در انتخابات قابل توجه بود.', 'طبق گزارش‌ها، میزان مشارکت نسبت به دوره گذشته رشد داشته است.', 8, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(19, 'توافق‌نامه تجاری جدید میان دو کشور', 'دو کشور همسایه قرارداد همکاری اقتصادی امضا کردند.', 'این توافق می‌تواند زمینه‌ساز افزایش صادرات و واردات میان طرفین شود.', 8, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(20, 'سفر رسمی رئیس‌جمهور به اروپا', 'دیدارهای دیپلماتیک در دستور کار قرار گرفت.', 'این سفر با هدف تقویت روابط اقتصادی و سیاسی انجام می‌شود.', 8, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(21, 'تصویب لایحه بودجه سال آینده', 'پارلمان لایحه بودجه را با اصلاحات تصویب کرد.', 'بودجه جدید تمرکز ویژه‌ای بر زیرساخت‌ها و آموزش دارد.', 8, 1, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(22, 'گفت‌وگوی تلفنی وزرای خارجه', 'درباره بحران منطقه‌ای مذاکره شد.', 'دو طرف بر ادامه همکاری‌های مشترک تأکید کردند.', 8, 1, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(23, 'کشف گونه جدید جانوری در اعماق اقیانوس', 'دانشمندان موجودی ناشناخته شناسایی کردند.', 'این گونه می‌تواند به درک بهتر اکوسیستم‌های دریایی کمک کند.', 9, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(24, 'ابداع باتری با عمر ۱۰ برابر', 'محققان موفق به ساخت باتری جدید شدند.', 'این باتری می‌تواند خودروهای برقی را متحول کند.', 9, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(25, 'نقشه‌برداری کامل از مغز انسان', 'پروژه‌ای بین‌المللی به سرانجام رسید.', 'این نقشه می‌تواند درمان بیماری‌های عصبی را آسان‌تر کند.', 9, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(26, 'پژوهش تازه درباره تغییرات اقلیمی', 'دانشمندان نسبت به سرعت گرمایش زمین هشدار دادند.', 'مطالعات نشان می‌دهد که یخ‌های قطب شمال سریع‌تر از پیش‌بینی‌ها ذوب می‌شوند.', 9, 1, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(27, 'ابداع واکسن جدید علیه ویروس ن罕', 'واکسن تازه مراحل اولیه آزمایش را پشت سر گذاشت.', 'نتایج امیدوارکننده‌ای در کنترل بیماری نشان داده است.', 9, 1, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(28, 'راه‌اندازی مراکز مشاوره خانواده', 'شهرداری برنامه‌ای برای تقویت بنیان خانواده آغاز کرد.', 'این مراکز خدمات رایگان مشاوره‌ای ارائه خواهند داد.', 10, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(29, 'کاهش نرخ بیکاری در کشور', 'آمار جدید نشان‌دهنده بهبود وضعیت اشتغال است.', 'در سه ماهه گذشته هزاران شغل جدید ایجاد شده است.', 10, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(30, 'برنامه جدید برای ارتقای آموزش عمومی', 'وزارت آموزش از طرحی تازه خبر داد.', 'این طرح شامل بهبود کیفیت معلمان و زیرساخت‌های مدارس است.', 10, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(31, 'افزایش استقبال از حمل‌ونقل عمومی', 'شهروندان بیشتر از مترو و اتوبوس استفاده می‌کنند.', 'آمارها نشان می‌دهد استفاده از خودرو شخصی کاهش یافته است.', 10, 1, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(32, 'برگزاری جشنواره فرهنگی در پایتخت', 'جشنواره‌ای برای معرفی فرهنگ بومی آغاز شد.', 'این رویداد شامل نمایشگاه صنایع‌دستی و موسیقی محلی است.', 10, 1, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(33, 'قهرمانی تیم والیبال در لیگ جهانی', 'تیم ملی والیبال در دیداری حساس پیروز شد.', 'این قهرمانی برای نخستین بار در تاریخ کشور رقم خورد.', 11, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(34, 'رکوردشکنی دونده جوان', 'دونده ۲۰ ساله رکورد ملی را جابه‌جا کرد.', 'این رکورد در ماده ۱۰۰ متر ثبت شد.', 11, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(35, 'آغاز فصل جدید لیگ فوتبال', 'تیم‌های برتر آماده رقابت هستند.', 'در هفته نخست بازی‌ها، چندین مسابقه پرهیجان برگزار شد.', 11, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(36, 'انتقال ستاره فوتبال به تیم اروپایی', 'بازیکن ملی‌پوش قرارداد جدیدی امضا کرد.', 'این انتقال بزرگترین قرارداد تاریخ فوتبال کشور محسوب می‌شود.', 11, 1, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(37, 'پیروزی تیم بسکتبال در جام ملت‌ها', 'تیم ملی بسکتبال حریف قدرتمند خود را شکست داد.', 'با این پیروزی، تیم به مرحله بعدی رقابت‌ها راه یافت.', 11, 1, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(38, 'شیوع بیماری فصلی کاهش یافت', 'وزارت بهداشت از کاهش آمار مبتلایان خبر داد.', 'این روند نتیجه افزایش واکسیناسیون عمومی بوده است.', 12, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(39, 'جراحی رباتیک موفقیت‌آمیز انجام شد', 'پزشکان از روبات در عمل جراحی استفاده کردند.', 'این روش خطاهای انسانی را به شدت کاهش می‌دهد.', 12, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(40, 'محققان رژیم غذایی جدید پیشنهاد دادند', 'این رژیم می‌تواند خطر بیماری قلبی را کاهش دهد.', 'مواد غذایی سرشار از فیبر و آنتی‌اکسیدان پایه اصلی این رژیم است.', 12, 2, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(41, 'داروی نوین دیابت وارد بازار شد', 'داروی جدید اثر بخشی بهتری دارد.', 'آزمایش‌ها نشان می‌دهد که قند خون بیماران به‌طور پایدارتر کنترل می‌شود.', 12, 1, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00'),
(42, 'افزایش امید به زندگی در کشور', 'آمارها نشان‌دهنده بهبود شاخص‌های سلامت است.', 'افزایش دسترسی به خدمات درمانی از دلایل اصلی این تغییر عنوان شده است.', 12, 1, 1, '2025-09-07 14:32:09', '2025-09-07 14:32:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

DROP TABLE IF EXISTS `news_categories`;
CREATE TABLE IF NOT EXISTS `news_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf32;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'فناوری', '2025-09-07 10:17:06', '2025-09-07 10:17:06', NULL),
(8, 'سیاسی', '2025-09-07 10:17:06', '2025-09-07 10:17:06', NULL),
(9, 'علمی', '2025-09-07 10:17:18', '2025-09-07 10:17:18', NULL),
(10, 'اجتماعی', '2025-09-07 10:37:33', '2025-09-07 10:37:33', NULL),
(11, 'ورزشی', '2025-09-07 10:37:41', '2025-09-07 10:37:41', NULL),
(12, 'سلامت و پزشکی', '2025-09-07 10:37:41', '2025-09-07 10:37:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_images`
--

DROP TABLE IF EXISTS `news_images`;
CREATE TABLE IF NOT EXISTS `news_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `news_id` bigint UNSIGNED NOT NULL,
  `file_id` bigint UNSIGNED NOT NULL,
  `is_default` tinyint NOT NULL DEFAULT '0' COMMENT '0: not default | 1: default',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `news_images_fk1` (`file_id`),
  KEY `news_images_fk2` (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `site_visits`
--

DROP TABLE IF EXISTS `site_visits`;
CREATE TABLE IF NOT EXISTS `site_visits` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(128) NOT NULL,
  `user_agent` varchar(256) CHARACTER SET utf32 COLLATE utf32_general_ci DEFAULT NULL,
  `url` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `site_visites_fk1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `national_code` varchar(10) NOT NULL,
  `gender` tinyint UNSIGNED NOT NULL DEFAULT '1' COMMENT '0: male | 1: female',
  `mobile` varchar(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `avatar_file_id` bigint UNSIGNED DEFAULT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `state_id` bigint UNSIGNED DEFAULT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `military_service_status` tinyint UNSIGNED DEFAULT NULL COMMENT '0: Exempt from service | 1: In service | 2: End of service',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1' COMMENT '0: Inactive | 1: active',
  PRIMARY KEY (`id`),
  KEY `users_fk1` (`avatar_file_id`),
  KEY `users_fk2` (`state_id`),
  KEY `users_fk3` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf32;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `national_code`, `gender`, `mobile`, `email`, `avatar_file_id`, `username`, `password`, `state_id`, `city_id`, `military_service_status`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(5, 'فاطمه', 'اسدی', '2081107171', 1, '09102927220', 'ftiasg1401@gmail.com', NULL, 'asfd12', '$2y$12$zWLetI9.ZVu7YPBjeC4h.OZ8zHAk979OOtqLAUZJEmqt2DOlTaFQW', NULL, NULL, NULL, '2025-09-07 12:45:47', '2025-09-07 12:45:47', NULL, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_fk1` FOREIGN KEY (`avatar_file_id`) REFERENCES `files` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_fk1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_fk2` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_fk3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comments_fk1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `admins_fk2` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `logs_fk1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_fk1` FOREIGN KEY (`news_category_id`) REFERENCES `news_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `news_fk2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `news_images`
--
ALTER TABLE `news_images`
  ADD CONSTRAINT `news_images_fk1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `news_images_fk2` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `site_visits`
--
ALTER TABLE `site_visits`
  ADD CONSTRAINT `site_visites_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk1` FOREIGN KEY (`avatar_file_id`) REFERENCES `files` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `users_fk2` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `users_fk3` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
