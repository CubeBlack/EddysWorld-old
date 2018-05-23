DROP TABLE IF EXISTS `ew_inert`;
CREATE TABLE IF NOT EXISTS `ew_inert` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `ew_inert` (`id`,`name`, `descricao`) VALUES
(1,'igreja', 'Capela catolica, tao antiga quanto a cidade, contruida em pedra'),
(2,'Ferreiro', 'Loja pequena, com armas e armaduras espalhadas pelas paredes');

DROP TABLE IF EXISTS `ew_object`;
CREATE TABLE IF NOT EXISTS `ew_object` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `x` int(8) NOT NULL,
  `y` int(8) NOT NULL,
  `w` int(8) NOT NULL,
  `h` int(8) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `ew_object` (`x`, `y`, `w`, `h`, `tipo`) VALUES
(-25, -25, 50, 50, 'inert'),
(2, 29, 25, 25, 'inert'),
(100, 100, 1, 1, 'personagem');

DROP TABLE IF EXISTS `ew_personagem`;
CREATE TABLE IF NOT EXISTS `ew_personagem` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `ew_personagem` (`id`,`name`, `tipo`) VALUES
(3, 1, 0);

DROP TABLE IF EXISTS `ew_user`;
CREATE TABLE IF NOT EXISTS `ew_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nick` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(16) NOT NULL,
  `tipo` int(8) NOT NULL,
  `personagem` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO `ew_user` (`nick`, `email`, `password`, `tipo`) VALUES
('CubeBlack', 'danie_nerd@hotmail.com', 'Ragnarok13', 4);

DROP TABLE IF EXISTS `ew_dialogo`;
CREATE TABLE IF NOT EXISTS `ew_dialogo`(
	`id` int(8) NOT NULL AUTO_INCREMENT,
	`entrada` varchar(255) NOT NULL,
	`saida` varchar(255) NOT NULL,
	`personagem` int(8) NOT NULL,
	PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;