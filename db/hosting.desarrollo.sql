# SQL Manager 2010 Lite for MySQL 4.6.0.5
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : hosting


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `hosting`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `hosting`;

#
# Structure for the `ftp_groups` table : 
#

CREATE TABLE `ftp_groups` (
  `groupname` varchar(16) NOT NULL DEFAULT '',
  `gid` smallint(6) NOT NULL DEFAULT '5500',
  `members` varchar(16) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='ProFTP group table';

#
# Structure for the `ftp_quota_limits` table : 
#

CREATE TABLE `ftp_quota_limits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ftp_user_id` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `quota_type` enum('user','group','class','all') NOT NULL DEFAULT 'user',
  `per_session` enum('false','true') NOT NULL DEFAULT 'false',
  `limit_type` enum('soft','hard') NOT NULL DEFAULT 'soft',
  `bytes_in_avail` int(10) unsigned NOT NULL DEFAULT '104857600',
  `bytes_out_avail` int(10) unsigned NOT NULL DEFAULT '0',
  `bytes_xfer_avail` int(10) unsigned NOT NULL DEFAULT '0',
  `files_in_avail` int(10) unsigned NOT NULL DEFAULT '0',
  `files_out_avail` int(10) unsigned NOT NULL DEFAULT '0',
  `files_xfer_avail` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Structure for the `ftp_quota_tallies` table : 
#

CREATE TABLE `ftp_quota_tallies` (
  `name` varchar(30) NOT NULL DEFAULT '',
  `quota_type` enum('user','group','class','all') NOT NULL DEFAULT 'user',
  `bytes_in_used` int(10) unsigned NOT NULL DEFAULT '0',
  `bytes_out_used` int(10) unsigned NOT NULL DEFAULT '0',
  `bytes_xfer_used` int(10) unsigned NOT NULL DEFAULT '0',
  `files_in_used` int(10) unsigned NOT NULL DEFAULT '0',
  `files_out_used` int(10) unsigned NOT NULL DEFAULT '0',
  `files_xfer_used` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for the `ftp_users` table : 
#

CREATE TABLE `ftp_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(32) NOT NULL DEFAULT '',
  `passwd` varchar(32) NOT NULL DEFAULT '',
  `uid` smallint(6) NOT NULL DEFAULT '2000',
  `gid` smallint(6) NOT NULL DEFAULT '2000',
  `homedir` varchar(255) NOT NULL DEFAULT '/srv/empty',
  `shell` varchar(16) NOT NULL DEFAULT '/sbin/nologin',
  `count` int(11) NOT NULL DEFAULT '0',
  `accessed` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `status` enum('expired','enable','disable','quota_exeded') DEFAULT 'enable',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COMMENT='ProFTP user table';

#
# Data for the `ftp_groups` table  (LIMIT 0,500)
#

INSERT INTO `ftp_groups` (`groupname`, `gid`, `members`, `description`) VALUES 
  ('hosting',2000,'apache, hosting','Servidor de Hosting, las cuentas habilitadas en este servidor estan habilitadas para publicacion de paginas web mediante el servidor apache+php+mysql'),
  ('fileserver',5500,'3','Servidor de archivos');
COMMIT;

#
# Data for the `ftp_quota_limits` table  (LIMIT 0,500)
#

INSERT INTO `ftp_quota_limits` (`id`, `ftp_user_id`, `name`, `quota_type`, `per_session`, `limit_type`, `bytes_in_avail`, `bytes_out_avail`, `bytes_xfer_avail`, `files_in_avail`, `files_out_avail`, `files_xfer_avail`) VALUES 
  (1,NULL,'cursos','user','false','hard',0,0,0,0,0,0),
  (2,NULL,'apoyoadm','user','false','hard',104857600,0,0,0,0,0),
  (3,NULL,'inventarios','user','false','hard',104857600,0,0,0,0,0),
  (4,NULL,'ccbol','user','false','hard',104857600,0,0,0,0,0),
  (5,NULL,'hustariz','user','false','hard',104857600,0,0,0,0,0),
  (6,NULL,'rayoroa','user','false','hard',209715200,0,0,0,0,0),
  (7,NULL,'glpi','user','false','hard',104857600,0,0,0,0,0);
COMMIT;

#
# Data for the `ftp_quota_tallies` table  (LIMIT 0,500)
#

INSERT INTO `ftp_quota_tallies` (`name`, `quota_type`, `bytes_in_used`, `bytes_out_used`, `bytes_xfer_used`, `files_in_used`, `files_out_used`, `files_xfer_used`) VALUES 
  ('sca','user',0,0,0,0,0,0),
  ('apoyoadm','user',34750213,0,0,0,0,0),
  ('inventarios','user',34417474,0,0,0,0,0),
  ('ccbol','user',0,0,0,0,0,0),
  ('hustariz','user',4096,0,0,0,0,0),
  ('cursos','user',0,0,0,0,0,0),
  ('rayoroa','user',4096,0,0,0,0,0),
  ('glpi','user',7656329,0,0,0,0,0);
COMMIT;

#
# Data for the `ftp_users` table  (LIMIT 0,500)
#

INSERT INTO `ftp_users` (`id`, `userid`, `passwd`, `uid`, `gid`, `homedir`, `shell`, `count`, `accessed`, `modified`, `name`, `email`, `expired`, `status`) VALUES 
  (1,'inventarios','qB95Z7ttsSaM2',2000,2000,'/srv/inventarios.cs.umss.edu.bo','/sbin/nologin',14,'2011-07-09 11:10:43','2011-07-09 11:04:43','Sistema de Registro de Equipos de Computo','admcomputo@cs.umss.edu.bo','2011-12-31','enable'),
  (2,'ccbol','7ciGlfAX8z8eU',2000,2000,'/srv/ccbol.cs.umss.edu.bo','/sbin/nologin',13,'2011-07-09 11:09:46','2011-07-09 11:09:58','Pagina Oficial de la CCBOL-2011 Cochabamba','ccbol@cs.umss.edu.bo','2011-12-31','enable'),
  (3,'apoyoadm','pfyX2imivqn3Y',2000,2000,'/srv/apoyoadm.cs.umss.edu.bo','/sbin/nologin',14,'2011-07-09 11:09:40','2011-07-09 11:04:09','Pagina de Actualizacions del Sistema de Apoyo Administrativo','admcomputo@cs.umss.edu.bo','2011-12-31','enable'),
  (4,'cursos','LCuvBtI/6WJf6',2000,2000,'/srv/cursos.cs.umss.edu.bo','/sbin/nologin',3,'2011-07-09 11:10:15','2011-07-09 11:03:58','Plataforma de Claroline del Laboratorio de Informatica Sistemas','ecaceres@cs.umss.edu.bo','2011-12-31','enable'),
  (10,'hustariz','MYM9YDnDeEKR6',2000,2000,'/srv/hustariz.cs.umss.edu.bo','/sbin/nologin',6,'2011-07-09 11:10:37','2011-07-09 11:04:31','Pagina personal del Lic. Hernan Hustariz','hustariz@cs.umss.edu.bo','2011-07-09','enable'),
  (11,'rayoroa','elhk6GfDRtb7E',2000,2000,'/srv/rayoroa.cs.umss.edu.bo','/sbin/nologin',2,'2011-07-09 11:10:51','2011-07-09 10:57:58','Pagina personal del Lic. Richard Ayoroa','rayoroa@cs.umss.edu.bo','2011-07-09','enable'),
  (12,'glpi','K4iewYs/LsUJk',2000,2000,'/srv/glpi.cs.umss.edu.bo','/sbin/nologin',2,'2011-07-09 11:10:29','2011-07-09 11:08:34','Sitio temporal par el glpi antiguo','admcomputo@cs.umss.edu.bo','2011-07-31','enable'),
  (20,'elvis','',2000,2000,'/srv/test.cs.umss.edu.bo','/sbin/nologin',0,'0000-00-00 00:00:00','2011-07-12 12:57:46','Cuenta de test','test@cs.umss.edu.bo','2012-07-12','enable');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;