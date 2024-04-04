-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 02:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_obls`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `feedback_text`, `created_at`) VALUES
(36, 'cha@gmail.com', 'bhh', '2024-03-13 07:04:31'),
(37, 'admin@gmail.com', 'bnb', '2024-03-13 07:04:56'),
(38, 'hless4326@gmail.com', 'hyvvjv', '2024-03-13 07:10:21'),
(39, '9777767188', 'hjhjh', '2024-03-13 07:11:55'),
(40, 'cha@gmail.com', 'vggfcxfcgfhbjk', '2024-03-13 07:13:11'),
(42, 'ejjr', 'eknr', '2024-03-15 08:01:27'),
(43, 'nnr', 'ej jch \r\n', '2024-03-15 08:02:18'),
(44, 'chananpanda726@gmail.com', 'ke fv', '2024-03-15 08:02:30'),
(45, 'ek v', 'rwejnf', '2024-03-15 08:02:40'),
(46, 'jnejk', 'njekjc', '2024-03-15 08:02:51'),
(47, 'cha@gmail.com', 'hjfv  vbvhfrjvmv\r\ng bg g \r\n \r\ngb \r\nb \r\nb\r\n b\r\n \r\nb\r\n \r\nb \r\n ', '2024-03-15 08:13:40'),
(48, 'cha@gmail.com', 'jhbb', '2024-03-16 06:19:14'),
(49, 'chinmaya', 'guyfjfyf', '2024-03-27 03:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `sent_link`
--

CREATE TABLE `sent_link` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sent_link`
--

INSERT INTO `sent_link` (`id`, `subject_name`, `link`, `sent_at`) VALUES
(1, 'JAVA', 'ec', '2024-03-28 08:44:30'),
(2, 'Demo', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 11:45:15'),
(3, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:07:02'),
(4, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:10:36'),
(5, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:10:37'),
(6, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:10:42'),
(7, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:10:43'),
(8, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:10:46'),
(9, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:10:57'),
(10, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:10:58'),
(11, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:00'),
(12, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:01'),
(13, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:16'),
(14, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:17'),
(15, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:19'),
(16, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:20'),
(17, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:23'),
(18, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:32'),
(19, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:33'),
(20, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:36'),
(21, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:38'),
(22, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:38'),
(23, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:40'),
(24, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:56'),
(25, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:56'),
(26, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:57'),
(27, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:58'),
(28, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:11:58'),
(29, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:00'),
(30, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:01'),
(31, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:02'),
(32, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:03'),
(33, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:04'),
(34, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:05'),
(35, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:07'),
(36, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:08'),
(37, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:09'),
(38, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:10'),
(39, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:11'),
(40, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:15'),
(41, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:46'),
(42, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:48'),
(43, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:50'),
(44, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:54'),
(45, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:55'),
(46, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:55'),
(47, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:57'),
(48, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:57'),
(49, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:12:58'),
(50, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:13:00'),
(51, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:13:01'),
(52, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:13:02'),
(53, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:13:04'),
(54, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:13:11'),
(55, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:13:12'),
(56, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:13:13'),
(57, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:13:13'),
(58, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:13:14'),
(59, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:13:16'),
(60, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:13:18'),
(61, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:18:05'),
(62, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:18:39'),
(63, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:21:04'),
(64, 'JAVA', 'https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply', '2024-03-28 13:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `user`, `pass`) VALUES
(1, 'admin', '123'),
(2, 'tipu', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `id` int(11) NOT NULL,
  `quesNo` tinyint(4) NOT NULL,
  `examid` int(11) NOT NULL,
  `rightAns` tinyint(4) NOT NULL,
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesNo`, `examid`, `rightAns`, `ans`) VALUES
(221, 3, 22, 0, 'obtain'),
(222, 3, 22, 0, 'get'),
(223, 3, 22, 0, 'need'),
(224, 3, 22, 1, 'botn 1 &amp; 2'),
(225, 4, 22, 0, 'accept'),
(226, 4, 22, 1, 'reject'),
(227, 4, 22, 0, 'make'),
(228, 4, 22, 0, 'take');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `postid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `comment`, `postid`, `username`) VALUES
(1, 'This is first comment', 27, 'tipu'),
(2, 'Hello world commment', 27, 'tipu'),
(3, 'My another comment', 30, 'tipu'),
(4, 'Hello people', 30, 'tipu'),
(5, 'Hi i am niam', 32, 'niam'),
(6, 'I am tipu', 32, 'tipu'),
(7, 'Hi hello', 29, 'fkarim'),
(8, 'another show', 29, 'fkarim'),
(9, 'threee', 29, 'fkarim'),
(10, 'dsfs ddfs', 29, 'tipu'),
(11, 'sdfsd', 33, 'tipu'),
(12, 'dsfsdf', 27, 'tipu'),
(13, 'ada asd', 33, 'tipu'),
(14, 'aa dasd dasd', 34, 'tipu'),
(15, 'hello buddy', 35, 'tipu'),
(16, 'hello', 29, 'tipu'),
(17, 'asdfs', 29, ''),
(18, 'asdf', 29, 'tipu'),
(19, 'hi there', 29, 'kalam'),
(20, 'hello', 38, 'tipu'),
(21, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et.', 38, 'tipu'),
(22, 'Hyper text pre processing language.', 58, 'chandan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

CREATE TABLE `tbl_exam` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `edate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_exam`
--

INSERT INTO `tbl_exam` (`id`, `name`, `subject`, `author`, `edate`) VALUES
(23, 'Basic HTML', 'Computer Science', 'jagannath123', '2024-03-24 10:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(4) NOT NULL,
  `sub_id` int(4) NOT NULL,
  `pdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `description`, `user_id`, `sub_id`, `pdate`, `image`) VALUES
(54, 'What is Java', '<p>Nothing</p>', 1, 11, '2024-03-14 09:01:52', ''),
(56, 'what is java', '<p>java is a anguage</p>', 16, 11, '2024-03-15 09:18:56', ''),
(57, 'What is Css', '<p>what is css</p>', 14, 11, '2024-03-15 13:06:08', ''),
(58, 'What is HTML', '<p>What why use html</p>', 14, 11, '2024-03-15 13:06:47', ''),
(59, 'what is chain dreive', '<p>chain drive</p>', 14, 12, '2024-03-15 13:07:14', ''),
(69, 'What is ohms law', '<p>Ohms Law</p>', 14, 15, '2024-03-15 13:09:06', ''),
(72, 'What is Torque ?', 'What is torque ?', 14, 12, '2024-03-28 13:59:43', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

CREATE TABLE `tbl_ques` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL,
  `examid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `quesNo`, `ques`, `examid`) VALUES
(56, 3, 'Synonyms of  \'accept\'', 22),
(57, 4, 'Antonyms of  \'deny\'', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

CREATE TABLE `tbl_result` (
  `id` int(11) NOT NULL,
  `exname` varchar(100) NOT NULL,
  `exid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_result`
--

INSERT INTO `tbl_result` (`id`, `exname`, `exid`, `userid`, `score`) VALUES
(25, 'Quiz test 1', 21, 1, 2),
(26, 'Quiz test 1 fall', 22, 1, 1),
(27, 'Quiz test 1', 21, 1, 1),
(28, 'Quiz test 1 fall', 22, 1, 0),
(29, 'Quiz test 1', 21, 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `class` int(11) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `name`, `username`, `password`, `class`, `phone`) VALUES
(14, 'Chandan Charchita Panda', 'chandan', '123', 8, '9777767188'),
(15, 'Ram', 'ram', '123', 1, '+919777767188'),
(16, 'Rohan', 'rohan', '123', 3, '9777767189'),
(17, 'ashis', 'ashis', '123', 2, '2834729485745'),
(18, 'Monalisa Behera', 'mona', '123', 4, '98616 70636'),
(19, 'Prem', 'prem', '', 4, '7842687343274'),
(21, 'Mama Sethi', 'mama', '123', 8, '9777767188');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`id`, `name`) VALUES
(11, 'Computer Science'),
(12, 'Mechanichal'),
(14, 'Civil'),
(15, 'Electrical');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`id`, `name`, `username`, `password`, `degree`, `phone`) VALUES
(9, 'Chandan', 'chandan', '111', 'Btech', '9777767188'),
(11, 'Jagannath Sahu', 'jagannath123', '123', 'Btech fail', '9777767189'),
(12, 'Debashish Biswal', 'debashish@123', '123', 'm.Phill', '9777767189');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `id` int(11) NOT NULL,
  `query` varchar(255) DEFAULT NULL,
  `response` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`id`, `query`, `response`) VALUES
(1, 'Hello', 'Hi there! How can I help you today?'),
(2, 'What is your name?', 'I am a chatbot designed to assist you with your queries.'),
(3, 'How do I navigate through the project?', 'You can explore different sections using the navigation menu.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sent_link`
--
ALTER TABLE `sent_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_result`
--
ALTER TABLE `tbl_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sent_link`
--
ALTER TABLE `sent_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_result`
--
ALTER TABLE `tbl_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
