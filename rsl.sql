DROP TABLE IF EXISTS `news_feed`;
CREATE TABLE `news_feed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `pubDate` datetime,
  `imageLink` varchar(255) DEFAULT NULL,
  `team` varchar(255) DEFAULT NULL,
  `promoted` tinyint(1) DEFAULT NULL,
  `hero` tinyint(1) DEFAULT NULL,
  `team_hero` tinyint(1) DEFAULT NULL,
  `team_featured` tinyint(1) DEFAULT NULL,
  `promoted_banner` varchar(255) DEFAULT NULL,
  `live` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `hashed_password` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_username` (`username`)
);
