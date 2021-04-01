-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 01, 2021 at 02:45 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_01`
--

-- --------------------------------------------------------

--
-- Table structure for table `sns_contents`
--

CREATE TABLE `sns_contents` (
  `id` int(11) NOT NULL,
  `u_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `study_theme` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `study_time` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `contents` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sns_contents`
--

INSERT INTO `sns_contents` (`id`, `u_name`, `study_theme`, `study_time`, `contents`, `indate`) VALUES
(1, 'tamura', 'Laravel', '40', 'MVCについて学習した。', '2021-03-25 23:14:31'),
(2, 'tamura', 'Laravel', '60', 'Jetstreamを学習した。', '2021-03-24 22:32:04'),
(3, 'tamura', 'PHP', '60', '認証機能を学習した。', '2021-03-23 23:08:04'),
(4, 'tamura', 'Bootstrap', '30', 'Studied Grid system', '2021-03-22 23:17:02'),
(5, 'nakamura', '英語', '20', '英語の勉強をした。難しい…', '2021-03-21 23:29:35'),
(6, 'tamura', 'Git', '30', 'Git Bashの使い方を勉強した', '2021-03-27 15:58:38'),
(7, 'tamura', 'JS', '45', 'jQuery', '2021-03-20 22:34:30'),
(8, 'tamura', 'CSS', '30', 'Bootstrap', '2021-03-19 22:34:49'),
(9, 'tamura', 'PHP', '120', 'Laravel', '2021-03-20 22:37:59'),
(10, 'nakamura', 'HTML', '30', 'おもしろい', '2021-03-21 00:16:45'),
(14, 'nakamura', 'JS', '40', 'Vueについて基礎を学んだ', '2021-03-22 16:01:35'),
(15, 'tamura', 'Word', '45', 'Shift+Enterで開業できることを学んだ', '2021-03-23 16:19:06'),
(16, 'tamura', '英語', '90', '大統領スピーチのサイトラをした！', '2021-03-24 16:20:29'),
(17, 'nakamura', '業界研究', '30', 'IT業界について勉強した', '2021-03-25 00:57:38'),
(18, 'tamura', 'SQL', '40', 'WHERE LIKE CONCATについて学んだ', '2021-03-26 01:56:09'),
(19, 'tamura', 'Validation', '60', 'inputにValidationを実装した', '2021-03-27 01:14:49'),
(20, 'tamura', '力を入れた点', '100', '＜グラフ＞　勉強時間合計を日毎に集計してグラフ化。難しかった点：日毎に集計するためのSQL文を作成するのがなかなか上手くいきませんでした。。\r\n\r\n＜デザイン＞　レスポンシブデザインにしたかったので、Bootstrapでデザイン、ロゴもHatchfulで作成。', '2021-03-28 03:43:44'),
(21, 'tamura', 'できなかったこと', '50', '＜Laravelでの認証実装 ＞　Breezeを用いて認証自体はできましたが、組み込む時間がなく断念しました。\r\n＜Validation時の入力保持＞　現状、入力が消えてしまうので、POSTで保持したかったですが、時間なく。', '2021-03-28 03:51:36'),
(22, 'tamura', 'できたこと', '240', 'PHP基本4項目（INSERT,SELECT,UPDATE,DELETE）/ ログイン / グラフ / Validation / Pagination / 検索 / Twitter連携', '2021-03-28 03:54:48'),
(23, 'tamura', '使用言語・ライブラリ', '120', 'HTML / CSS (Bootstrap) / PHP（MySQL） / Javascript (jQuery, Chart.js)', '2021-03-28 03:56:25'),
(24, 'tamura', 'きっかけ', '300', 'こつこつ努力を続けられる人は（自分も含めて）少ないのではないかと思い、制作しました。グラフを用いて自身の努力を分かりやすくし、モチベーションアップ・学びの共有の場として、掲示板を作成しました。また、日々のタスク管理としてTodoも用意しました。', '2021-03-29 04:05:55'),
(28, 'tamura', 'やりたかったこと', '30', '１．学習の見える化　２．頑張る人のコミュニティ形成　３．タスク管理', '2021-03-30 18:59:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sns_contents`
--
ALTER TABLE `sns_contents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sns_contents`
--
ALTER TABLE `sns_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
