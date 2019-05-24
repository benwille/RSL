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

DROP TABLE IF EXISTS `opponents`;
CREATE TABLE `opponents` (
  `opponentID` int(11) NOT NULL AUTO_INCREMENT,
  `club_name` varchar(255) DEFAULT NULL,
  `stadium` varchar(255) DEFAULT NULL,
  `team` tinyint(1) DEFAULT NULL,
  `abbr` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`opponentID`)
);

DROP TABLE IF EXISTS `matches`;
CREATE TABLE `matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team` tinyint(1) DEFAULT NULL,
  `opponentID` int(11) NOT NULL,
  `homeAway` tinyint(1) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `competition` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`opponentID`) REFERENCES opponents(`opponentID`)
);

DROP TABLE IF EXISTS `players`;
CREATE TABLE `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `startYear` int(4) DEFAULT NULL,
  `endYear` int(4) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `stats`;
CREATE TABLE `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(4) NOT NULL,
  `competition` tinyint(3) DEFAULT NULL,
  `played` int DEFAULT NULL,
  `started` int DEFAULT NULL,
  `minutes` int DEFAULT NULL,
  `goals` int DEFAULT NULL,
  `assists` int DEFAULT NULL,
  `yellow` int DEFAULT NULL,
  `red` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`player_id`) REFERENCES players(`id`)
);

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `home` varchar(255) DEFAULT NULL,
  `away` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
