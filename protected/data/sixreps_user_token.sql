CREATE TABLE IF NOT EXISTS `sixreps_user_token` (
  `id` int(11) NOT NULL,
  `token` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;