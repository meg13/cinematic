DROP DATABASE IF EXISTS ProgettoWeb;
CREATE DATABASE IF NOT EXISTS ProgettoWeb;
USE ProgettoWeb;

# ---------------------------------------------------------------------- #
# Tables                                                                 #
# ---------------------------------------------------------------------- #
# ---------------------------------------------------------------------- #
# Add table "Followership"                                               #
# ---------------------------------------------------------------------- #

CREATE TABLE `Followership` (
  `following_user_id` VARCHAR(255) NOT NULL,
  `followed_user_id` VARCHAR(255) NOT NULL,
  CONSTRAINT `PK_Followership` PRIMARY KEY (`following_user_id`,`followed_user_id`)
);

# ---------------------------------------------------------------------- #
# Add table "Users"                                                      #
# ---------------------------------------------------------------------- #

CREATE TABLE `Users` (
  `username` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255),
  `password` VARCHAR(255),
  `bio` TEXT,
  CONSTRAINT `PK_Followership` PRIMARY KEY (`username`)
);

# ---------------------------------------------------------------------- #
# Add table "Posts"                                                      #
# ---------------------------------------------------------------------- #

CREATE TABLE `Posts` (
  `post_id` INTEGER NOT NULL AUTO_INCREMENT,
  `body` TEXT,
  `user_id` VARCHAR(255),
  `movie_id` VARCHAR(255),
  `stars` INTEGER,
  `date` DATETIME,
  CONSTRAINT `PK_Posts` PRIMARY KEY (`post_id`)
);

# ---------------------------------------------------------------------- #
# Add table "Comments"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `Comments` (
  `comment_id` INTEGER NOT NULL AUTO_INCREMENT,
  `post_id` INTEGER,
  `user_id` VARCHAR(255),
  `body` TEXT,
  CONSTRAINT `PK_Comments` PRIMARY KEY (`comment_id`)
);

# ---------------------------------------------------------------------- #
# Add table "Movies"                                                     #
# ---------------------------------------------------------------------- #

CREATE TABLE `Movies` (
  `movie_id` VARCHAR(255),
  `title` VARCHAR(255),
  CONSTRAINT `PK_Movies` PRIMARY KEY (`movie_id`)
);

# ---------------------------------------------------------------------- #
# Add table "Notifications"                                              #
# ---------------------------------------------------------------------- #

CREATE TABLE `Notifications` (
  `notif_id` INTEGER NOT NULL AUTO_INCREMENT,
  `receiving_user_id` VARCHAR(255),
  `responsable_user_id` VARCHAR(255),
  `type` ENUM('L','P','C','F'),
  `post_id` INTEGER,
  `date` DATETIME,
  `read` BOOL,
  CONSTRAINT `PK_Notifications` PRIMARY KEY (`notif_id`)
);

# ---------------------------------------------------------------------- #
# Add table "ToWatch"                                                    #
# ---------------------------------------------------------------------- #

CREATE TABLE `ToWatch` (
  `user_id` VARCHAR(255),
  `movie_id` VARCHAR(255),
  CONSTRAINT `PK_toWatch` PRIMARY KEY (`user_id`, `movie_id`)
);

# ---------------------------------------------------------------------- #
# Add table "Watched"                                                    #
# ---------------------------------------------------------------------- #

CREATE TABLE `Watched` (
  `user_id` VARCHAR(255),
  `movie_id` VARCHAR(255),
  `date` DATETIME,
  CONSTRAINT `PK_Watched` PRIMARY KEY (`user_id`, `movie_id`)
);

# ---------------------------------------------------------------------- #
# Add table "Likes"                                                      #
# ---------------------------------------------------------------------- #

CREATE TABLE `Likes` (
  `user_id` VARCHAR(255),
  `post_id` INTEGER,
  CONSTRAINT `PK_Likes` PRIMARY KEY (`user_id`, `post_id`)
);
