update artistas set created = NULL where CAST(created AS CHAR(20)) = '0000-00-00 00:00:00';
update cidades set created = NULL where CAST(created AS CHAR(20)) = '0000-00-00 00:00:00';
update iconografias set created = NULL where CAST(created AS CHAR(20)) = '0000-00-00 00:00:00';
update instituicoes set created = NULL where CAST(created AS CHAR(20)) = '0000-00-00 00:00:00';
update obra_tipos set created = NULL where CAST(created AS CHAR(20)) = '0000-00-00 00:00:00';
update obras_relacionadas set created = NULL where CAST(created AS CHAR(20)) = '0000-00-00 00:00:00';
update paises set created = NULL where CAST(created AS CHAR(20)) = '0000-00-00 00:00:00';
update users set created = NULL where CAST(created AS CHAR(20)) = '0000-00-00 00:00:00';


alter table artistas ENGINE=InnoDB;
alter table cidades ENGINE=InnoDB;
alter table iconografias ENGINE=InnoDB;
alter table instituicoes ENGINE=InnoDB;
alter table obra_tipos ENGINE=InnoDB;
alter table obras_relacionadas ENGINE=InnoDB;
alter table paises ENGINE=InnoDB;
alter table users ENGINE=InnoDB;
