-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 04:49 AM
-- Server version: 10.4.11-MariaDB
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
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_code` varchar(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `publisher` varchar(70) NOT NULL,
  `id_book_genre` int(4) NOT NULL,
  `summary` text NOT NULL,
  `stock` int(5) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `total_page` int(5) NOT NULL,
  `location` varchar(50) NOT NULL DEFAULT '''Unknown''',
  `is_available_online` enum('Yes','No') NOT NULL,
  `pdf_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_code`, `title`, `author`, `year`, `isbn`, `publisher`, `id_book_genre`, `summary`, `stock`, `cover`, `total_page`, `location`, `is_available_online`, `pdf_file`, `created_at`, `updated_at`) VALUES
('B0001', 'Belajar Bahasa Pemrograman Java', 'Oong', 2017, '1234561112233', 'KONAMI', 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec imperdiet mauris. Morbi nec lobortis ante. Morbi condimentum mauris at leo ultrices, vel tincidunt sem laoreet. Nullam laoreet diam a commodo gravida. Vestibulum mattis nisl sapien. Morbi condimentum sit amet tortor eu fermentum. Etiam sagittis, tortor vitae molestie hendrerit, magna neque condimentum lectus, sollicitudin viverra arcu ipsum vel mauris. Duis bibendum faucibus urna ut hendrerit.</p>', 24, 'B0001Screenshot_1582380487.png', 220, 'Rak A', 'No', NULL, '2020-06-02 02:58:37', '2020-06-02 02:58:37'),
('B0002', 'Belajar HTML Dasar', 'Oong', 2015, '1112224445567', 'RPL', 2, '<p>Oong</p>', 8, 'B0002Screenshot_1579760092.png', 212, 'Rak A', 'No', NULL, '2020-06-02 03:26:55', '2020-06-02 05:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `book_genre`
--

CREATE TABLE `book_genre` (
  `id_genre` int(4) NOT NULL,
  `book_genre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_genre`
--

INSERT INTO `book_genre` (`id_genre`, `book_genre`) VALUES
(1, 'Fiksi'),
(2, 'Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `fine_type`
--

CREATE TABLE `fine_type` (
  `id_fine_type` int(2) NOT NULL,
  `fine` int(5) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `loan_code` varchar(5) NOT NULL,
  `user_code` varchar(5) NOT NULL,
  `book_code` varchar(5) NOT NULL,
  `loan_date` datetime NOT NULL,
  `extend_date` datetime NOT NULL,
  `return_date` datetime NOT NULL,
  `id_fine_type` int(2) NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT 'Waiting' COMMENT 'Waiting, Borrowed, Returned'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(1) NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_code` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `id_role` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_code`, `name`, `username`, `email`, `address`, `phone`, `password`, `img`, `id_role`, `is_active`, `created_at`, `updated_at`) VALUES
('U0001', 'Oong', 'oong26', 'mkhalil26122000@gmail.com', 'Bondowoso', '085331053300', '$2y$10$zIl9WAoV9tGx5jvxGj9TMe09JlI7R5x/ywwETEAiQUpPj9tHmmm4K', 'U0001avr pin.png', 1, 0, '2020-05-27 00:48:06', '2020-06-01 04:30:14'),
('U0002', 'Khalil', 'mkhalil122', 'khalil@gmail.com', 'Bondowoso', '085331445778', '$2y$10$zIl9WAoV9tGx5jvxGj9TMe09JlI7R5x/ywwETEAiQUpPj9tHmmm4K', 'U00023.PNG', 2, 0, '2020-05-27 00:48:06', '2020-05-29 01:55:45'),
('U0003', 'User 2', 'user2', 'user2@gmail.com', 'Bondowoso', '081445336554', '$2y$10$zIl9WAoV9tGx5jvxGj9TMe09JlI7R5x/ywwETEAiQUpPj9tHmmm4K', NULL, 2, 0, '2020-05-29 01:52:32', '2020-05-29 02:23:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_code`),
  ADD KEY `id_book_category` (`id_book_genre`);

--
-- Indexes for table `book_genre`
--
ALTER TABLE `book_genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `fine_type`
--
ALTER TABLE `fine_type`
  ADD PRIMARY KEY (`id_fine_type`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`loan_code`),
  ADD KEY `user_code` (`user_code`),
  ADD KEY `book_code` (`book_code`),
  ADD KEY `id_fine_type` (`id_fine_type`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_code`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_genre`
--
ALTER TABLE `book_genre`
  MODIFY `id_genre` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fine_type`
--
ALTER TABLE `fine_type`
  MODIFY `id_fine_type` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`id_book_genre`) REFERENCES `book_genre` (`id_genre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`book_code`) REFERENCES `books` (`book_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loans_ibfk_2` FOREIGN KEY (`user_code`) REFERENCES `users` (`user_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loans_ibfk_3` FOREIGN KEY (`id_fine_type`) REFERENCES `fine_type` (`id_fine_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
