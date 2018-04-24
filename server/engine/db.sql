DROP TABLE IF EXISTS `ks_user`;
CREATE TABLE IF NOT EXISTS `ks_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nick` text NOT NULL,
  `email` text NOT NULL,
  `senha` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `ks_user` (`id`, `nick`, `email`, `senha`) VALUES (1, 'asdf', 'asdf@asdf', 'asdf');

DROP TABLE IF EXISTS `ks_dados`;
CREATE TABLE IF NOT EXISTS `ks_dados` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `dado` BLOB NOT NULL,
  `tag` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
INSERT INTO `ks_dados` (`id`, `dado`, `tag`) VALUES (1, 'Exemplo de dado', 'exempmlo');