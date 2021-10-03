CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8 NOT NULL,
  `full_name` text CHARACTER SET utf8 NOT NULL,
  `gender` text CHARACTER SET utf8 NOT NULL,
  `age` int(11) NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
