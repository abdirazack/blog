CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `commentContent` text NOT NULL,
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `commentCount` int(11) NOT NULL,
  `likeCount` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateUpdated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `favorites` (
  `favoritesID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `datePosted` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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

CREATE TABLE `users` (
  `userID` int(11) NOT NULL COMMENT 'tables primary key',
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `online` varchar(255) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateUpdated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Users Table created abdi helped by nobody';


ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);



ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favoritesID`);


ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);


ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `favorites`
  MODIFY `favoritesID` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'tables primary key';



ALTER TABLE `posts`
  ADD CONSTRAINT `fk_user_pos` FOREIGN KEY (`userid`) REFERENCES `users` (`userID`);


ALTER TABLE `favorites`
  ADD CONSTRAINT `fk_user_fav` FOREIGN KEY (`userid`) REFERENCES `users` (`userID`);

ALTER TABLE `favorites`
  ADD CONSTRAINT `fk_posts_fav` FOREIGN KEY (`postID`) REFERENCES `posts` (`postID`);

ALTER TABLE `comments`
  ADD CONSTRAINT `fk_user_com` FOREIGN KEY (`userid`) REFERENCES `users` (`userID`);

ALTER TABLE `comments`
  ADD CONSTRAINT `fk_posts_com` FOREIGN KEY (`postID`) REFERENCES `posts` (`postID`);
COMMIT;
