CREATE TABLE `hb_config` (
  `id` int(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `stitle` varchar(150) NOT NULL,
  `domain` varchar(150) NOT NULL,
  `dirname` varchar(150) NOT NULL,
  `theme` varchar(50) NOT NULL,
  `icpbeian` varchar(50) NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `hb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `group` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `sex` int(11) NOT NULL,
  `mail` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `hb_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `permission` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `hb_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `alias` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `hb_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` longtext NOT NULL,
  `userid` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `hb_config` (`id`, `title`, `stitle`, `domain`, `dirname`, `theme`, `icpbeian`) VALUES
(0, 'HBlog', 'A Light Blog', 'https://hblog.yuncaioo.com', '/demo/', 'material', '');

INSERT INTO `hb_group` (`id`, `name`, `permission`) VALUES
(NULL, '管理员', '1');

INSERT INTO `hb_category` (`id`, `name`, `alias`) VALUES
(NULL, '分类', 'category');

INSERT INTO `hb_user` (`id`, `user`, `pass`, `group`, `name`, `sex`, `mail`) VALUES
(NULL, 'admin', 'bc2581023a660d864f23d665fc2b8064', 0, '管理员', 1, 'fhyuncai@yuncaioo.com');