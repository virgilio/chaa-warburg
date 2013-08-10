

DROP TABLE IF EXISTS `chaaunic_banco_imagens`.`artistas`;
DROP TABLE IF EXISTS `chaaunic_banco_imagens`.`cidades`;
DROP TABLE IF EXISTS `chaaunic_banco_imagens`.`iconografias`;
DROP TABLE IF EXISTS `chaaunic_banco_imagens`.`instituicoes`;
DROP TABLE IF EXISTS `chaaunic_banco_imagens`.`obra_tipos`;
DROP TABLE IF EXISTS `chaaunic_banco_imagens`.`obras`;
DROP TABLE IF EXISTS `chaaunic_banco_imagens`.`obras_relacionadas`;
DROP TABLE IF EXISTS `chaaunic_banco_imagens`.`paises`;
DROP TABLE IF EXISTS `chaaunic_banco_imagens`.`users`;


CREATE TABLE `chaaunic_banco_imagens`.`artistas` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`imagem` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`biografia` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`created` timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
	`modified` timestamp DEFAULT '0000-00-00 00:00:00' NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_unicode_ci,
	ENGINE=MyISAM;

CREATE TABLE `chaaunic_banco_imagens`.`cidades` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nome` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`pais_id` int(11) NOT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=MyISAM;

CREATE TABLE `chaaunic_banco_imagens`.`iconografias` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nome` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=MyISAM;

CREATE TABLE `chaaunic_banco_imagens`.`instituicoes` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nome` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`cidade_id` int(11) NOT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=MyISAM;

CREATE TABLE `chaaunic_banco_imagens`.`obra_tipos` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_unicode_ci,
	ENGINE=MyISAM;

CREATE TABLE `chaaunic_banco_imagens`.`obras` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`imagem` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`ano_inicio` int(11) NOT NULL,
	`ano_fim` int(11) NOT NULL,
	`tamanho_obra` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`descricao` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`tags` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`obra_tipos_id` int(11) NOT NULL,
	`instituicao_id` int(11) NOT NULL,
	`pais_id` int(11) NOT NULL,
	`cidade_id` int(11) NOT NULL,
	`artista_id` int(11) NOT NULL,
	`incerta` tinyint(1) DEFAULT NULL,
	`circa` tinyint(1) DEFAULT NULL,
	`aproximado` tinyint(1) DEFAULT NULL,
	`iconografia_id` int(11) NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_unicode_ci,
	ENGINE=InnoDB;

CREATE TABLE `chaaunic_banco_imagens`.`obras_relacionadas` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`obra_id` int(11) NOT NULL,
	`relacionada_id` int(11) NOT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_unicode_ci,
	ENGINE=MyISAM;

CREATE TABLE `chaaunic_banco_imagens`.`paises` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_unicode_ci,
	ENGINE=MyISAM;

CREATE TABLE `chaaunic_banco_imagens`.`users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`role` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'User',
	`last_login` datetime DEFAULT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_unicode_ci,
	ENGINE=MyISAM;

