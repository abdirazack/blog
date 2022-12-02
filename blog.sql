-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 07:19 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `commentContent` text NOT NULL,
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `likeCount` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateUpdated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `commentContent`, `postID`, `userID`, `likeCount`, `dateCreated`, `dateUpdated`) VALUES
(1, 'This is a dummy comment', 2, 6, 1, '2022-12-01 18:57:20', '2022-12-01 18:57:20'),
(2, 'Dynamic comment Test One', 2, 6, 0, '2022-12-02 05:29:59', '2022-12-02 05:29:59'),
(9, 'Dynamic comment Test Two', 2, 6, 0, '2022-12-02 05:31:50', '2022-12-02 05:31:50'),
(10, 'Go deadpool', 3, 6, 0, '2022-12-02 05:35:19', '2022-12-02 05:35:19'),
(11, 'Go deadpool Again', 3, 6, 0, '2022-12-02 05:38:31', '2022-12-02 05:38:31'),
(12, 'Tesing waters', 3, 6, 0, '2022-12-02 05:38:53', '2022-12-02 05:38:53'),
(13, 'again one more time', 3, 6, 0, '2022-12-02 05:40:11', '2022-12-02 05:40:11'),
(14, 'Hey abdi, Its me Hitler', 3, 7, 0, '2022-12-02 05:59:31', '2022-12-02 05:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `favoritesID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `datePosted` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `getcomments`
-- (See below for the actual view)
--
CREATE TABLE `getcomments` (
`commentID` int(11)
,`likeCount` int(11)
,`username` varchar(255)
,`avatar` varchar(255)
,`commentContent` text
,`postID` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `viewCount` int(11) NOT NULL,
  `commentCount` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `userID` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateUpdated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `title`, `content`, `picture`, `viewCount`, `commentCount`, `status`, `userID`, `dateCreated`, `dateUpdated`) VALUES
(2, 'SAMPLE TITLE', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam hic adipisci at animi blanditiis beatae perferendis perspiciatis ex fugiat. Iure, ducimus minus explicabo enim architecto perferendis nostrum recusandae neque hic optio nihil delectus alias quibusdam eaque ad ab, sed et. Accusamus hic, qui labore odit quia, laboriosam autem nisi officia esse nesciunt repellendus adipisci quas sed minus. Ipsa modi eum facilis, officiis delectus, rem saepe suscipit aut corrupti dolorum ullam quibusdam in impedit itaque quaerat, ipsum commodi quidem consequuntur aspernatur. Iure voluptatum quo, nisi ipsa quasi quam harum, debitis consequatur numquam suscipit rem vel, eos dolorem quia et eveniet rerum quis labore ipsum doloribus minus distinctio blanditiis error? Dicta laborum reprehenderit omnis autem a nostrum ullam molestias, quo sequi! Doloremque, sint alias dolore recusandae quae velit aliquid assumenda repellendus voluptate eaque quod nulla sunt provident ipsum odit deleniti consectetur eum nostrum corrupti voluptas eius a quo? Nisi veniam recusandae nobis possimus ratione iusto, iure dignissimos quia unde tenetur provident aspernatur porro quas nihil laborum qui officiis libero tempora nemo! Magnam minima laborum, laboriosam aperiam ad inventore consequuntur adipisci aliquid molestias beatae dolore repudiandae possimus delectus nemo similique eos sunt, libero veritatis eaque voluptatem ut tenetur! Fugit delectus adipisci nobis vitae.', './Pictures/Posts/bp.jpg', 0, 0, 'Active', 6, '2022-12-01 13:59:56', '2022-12-01 13:59:56'),
(3, 'SAMPLE TITLE', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam hic adipisci at animi blanditiis beatae perferendis perspiciatis ex fugiat. Iure, ducimus minus explicabo enim architecto perferendis nostrum recusandae neque hic optio nihil delectus alias quibusdam eaque ad ab, sed et. Accusamus hic, qui labore odit quia, laboriosam autem nisi officia esse nesciunt repellendus adipisci quas sed minus. Ipsa modi eum facilis, officiis delectus, rem saepe suscipit aut corrupti dolorum ullam quibusdam in impedit itaque quaerat, ipsum commodi quidem consequuntur aspernatur. Iure voluptatum quo, nisi ipsa quasi quam harum, debitis consequatur numquam suscipit rem vel, eos dolorem quia et eveniet rerum quis labore ipsum doloribus minus distinctio blanditiis error? Dicta laborum reprehenderit omnis autem a nostrum ullam molestias, quo sequi! Doloremque, sint alias dolore recusandae quae velit aliquid assumenda repellendus voluptate eaque quod nulla sunt provident ipsum odit deleniti consectetur eum nostrum corrupti voluptas eius a quo? Nisi veniam recusandae nobis possimus ratione iusto, iure dignissimos quia unde tenetur provident aspernatur porro quas nihil laborum qui officiis libero tempora nemo! Magnam minima laborum, laboriosam aperiam ad inventore consequuntur adipisci aliquid molestias beatae dolore repudiandae possimus delectus nemo similique eos sunt, libero veritatis eaque voluptatem ut tenetur! Fugit delectus adipisci nobis vitae.', './Pictures/Posts/deadpool.jpg', 0, 0, 'Active', 6, '2022-12-01 14:31:00', '2022-12-01 14:31:00'),
(4, 'SAMPLE TITLE', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor, cum! Laboriosam commodi quam, architecto eum accusamus nemo repellendus, magnam omnis dolore beatae quisquam reiciendis doloribus reprehenderit porro. Ducimus, optio blanditiis? Aperiam molestias quia accusamus temporibus quae odio consectetur possimus, eum ad nesciunt suscipit nihil deserunt minima harum qui ipsa dolorum!\r\n', './Pictures/Posts/itachi3.png', 0, 0, 'Active', 6, '2022-12-01 14:49:03', '2022-12-01 14:49:03'),
(5, 'SDSFGHJKLJHGFDF', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor, cum! Laboriosam commodi quam, architecto eum accusamus nemo repellendus, magnam omnis dolore beatae quisquam reiciendis doloribus reprehenderit porro. Ducimus, optio blanditiis? Aperiam molestias quia accusamus temporibus quae odio consectetur possimus, eum ad nesciunt suscipit nihil deserunt minima harum qui ipsa dolorum!\r\n', './Pictures/Posts/ironman.png', 0, 0, 'Active', 6, '2022-12-01 14:49:39', '2022-12-01 14:49:39');

-- --------------------------------------------------------

--
-- Stand-in structure for view `postview`
-- (See below for the actual view)
--
CREATE TABLE `postview` (
`postID` int(11)
,`title` varchar(255)
,`content` text
,`picture` varchar(255)
,`dateCreated` timestamp
,`dateUpdated` timestamp
,`commentCount` int(11)
,`viewCount` int(11)
,`username` varchar(255)
,`avatar` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL COMMENT 'tables primary key',
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateUpdated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Users Table created abdi helped by nobody';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `password`, `avatar`, `status`, `dateCreated`, `dateUpdated`) VALUES
(6, 'abdi', 'abdi@gmail.com', '123', './Pictures/Profiles/itachi2.jpg', 'Active', '2022-11-30 15:20:25', '2022-11-30 15:20:25'),
(7, 'kamal', 'kamal@rick.com', '123', './Pictures/Profiles/solar-system-planets-sun-mercury-venus-earth-mars-jupiter-3840x2402-7708.jpg', 'Active', '2022-12-02 05:59:04', '2022-12-02 05:59:04');

-- --------------------------------------------------------

--
-- Structure for view `getcomments`
--
DROP TABLE IF EXISTS `getcomments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getcomments`  AS SELECT `c`.`commentID` AS `commentID`, `c`.`likeCount` AS `likeCount`, `u`.`username` AS `username`, `u`.`avatar` AS `avatar`, `c`.`commentContent` AS `commentContent`, `c`.`postID` AS `postID` FROM (`comments` `c` join `users` `u` on(`c`.`userID` = `u`.`userID`))  ;

-- --------------------------------------------------------

--
-- Structure for view `postview`
--
DROP TABLE IF EXISTS `postview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `postview`  AS SELECT `p`.`postID` AS `postID`, `p`.`title` AS `title`, `p`.`content` AS `content`, `p`.`picture` AS `picture`, `p`.`dateCreated` AS `dateCreated`, `p`.`dateUpdated` AS `dateUpdated`, `p`.`commentCount` AS `commentCount`, `p`.`viewCount` AS `viewCount`, `u`.`username` AS `username`, `u`.`avatar` AS `avatar` FROM (`posts` `p` join `users` `u` on(`p`.`userID` = `u`.`userID`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `fk_user_com` (`userID`),
  ADD KEY `fk_posts_com` (`postID`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favoritesID`),
  ADD KEY `fk_user_fav` (`userID`),
  ADD KEY `fk_posts_fav` (`postID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `fk_user_pos` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favoritesID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'tables primary key', AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_posts_com` FOREIGN KEY (`postID`) REFERENCES `posts` (`postID`),
  ADD CONSTRAINT `fk_user_com` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `fk_posts_fav` FOREIGN KEY (`postID`) REFERENCES `posts` (`postID`),
  ADD CONSTRAINT `fk_user_fav` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_user_pos` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
