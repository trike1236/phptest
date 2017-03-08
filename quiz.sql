-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 3 朁E09 日 00:01
-- サーバのバージョン： 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `quiz_table`
--

CREATE TABLE `quiz_table` (
  `id` int(5) NOT NULL,
  `type` int(3) DEFAULT NULL,
  `text` varchar(300) NOT NULL,
  `answer_num` int(3) DEFAULT NULL,
  `answer_txt` varchar(300) DEFAULT NULL,
  `count_all` int(11) NOT NULL DEFAULT '0',
  `count_correct` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `quiz_table`
--

INSERT INTO `quiz_table` (`id`, `type`, `text`, `answer_num`, `answer_txt`, `count_all`, `count_correct`) VALUES
(1, 1, '大阪城を建てさせたのは誰？', 3, '明智光秀,織田信長,豊臣秀吉,徳川家康', 0, 0),
(2, 1, 'ムスカ大佐は何歳？', 1, '28歳,38歳,48歳,58歳', 0, 0),
(3, 1, 'アマゾン川が逆流することを何という？', 4, 'ピロロッカ,プロロッカ,ペロロッカ,ポロロッカ', 0, 0),
(4, 1, '次の準惑星のうち、散乱円盤天体に分類されるのはどれ？', 2, '冥王星,エリス,ケレス,ハウメア', 0, 0),
(5, 1, '物理学者・アインシュタインが1922年に来日した際に乗ってきた日本郵船の客船の名前は？', 1, '北野丸,箱根丸,賀茂丸,榛名丸', 0, 0),
(6, 1, '世界で3番目に高い山の名前は？', 4, 'K2,ローツェ,マカルー,カンチェンジュンガ', 0, 0),
(7, 1, '「饂飩」の読み方は何？', 2, 'あんどん,うどん,おんとん,かんとん', 0, 0),
(8, 1, '化学式"C18H29NO3"で表される物質の名前は？', 3, 'カプサイシン,ホモカプサイシン,ジヒドロカプサイシン,ノニバミド', 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` char(12) NOT NULL,
  `add_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `count_all` int(11) NOT NULL DEFAULT '0',
  `count_correct` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `add_time`, `count_all`, `count_correct`) VALUES
(1, 'seto', '2017-03-05 01:32:14', 0, 0),
(2, 'kubo', '2017-03-05 01:36:17', 0, 0),
(3, 'izumo', '2017-03-05 01:36:32', 0, 0),
(4, 'kamikado', '2017-03-05 02:00:41', 0, 0),
(5, 'momikado', '2017-03-05 02:00:55', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz_table`
--
ALTER TABLE `quiz_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz_table`
--
ALTER TABLE `quiz_table`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
