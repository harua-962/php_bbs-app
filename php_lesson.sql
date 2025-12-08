-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2025-12-08 03:33:32
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `php_lesson`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `survey`
--

CREATE TABLE `survey` (
  `id` int(11) NOT NULL COMMENT '通し番号 (1, 2, 3...)。A_Iにチェックを入れると自動で番号が振られます。',
  `name` varchar(50) NOT NULL COMMENT '名前。50文字まで',
  `language` varchar(20) NOT NULL COMMENT '言語 (PHPなど)。',
  `created_at` datetime NOT NULL COMMENT '登録日時。'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `survey`
--

INSERT INTO `survey` (`id`, `name`, `language`, `created_at`) VALUES
(1, 'はるまき', 'PHP', '2025-12-08 11:03:13'),
(2, 'はるまき', 'PHP', '2025-12-08 11:03:20'),
(3, 'みみ', 'Python', '2025-12-08 11:04:18'),
(4, 'はるまき', 'Python', '2025-12-08 11:24:46');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '通し番号 (1, 2, 3...)。A_Iにチェックを入れると自動で番号が振られます。', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
