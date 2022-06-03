-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2022 年 6 月 03 日 06:12
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_l07_02`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `email`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'nas', '12345', 0, 0, '2022-05-27 12:09:37', '2022-05-27 12:09:37'),
(2, 'nasnas', '111', 0, 0, '2022-05-27 15:20:58', '2022-05-27 15:20:58'),
(3, '12345@example.com', '123', 0, 0, '2022-05-27 15:39:04', '2022-05-27 15:39:04'),
(4, 'bowwow@example.com', '11111', 0, 0, '2022-05-27 16:10:58', '2022-05-27 16:10:58'),
(5, 'weee@example.com', '111', 0, 0, '2022-05-31 11:39:44', '2022-05-31 11:39:44');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
