# SQL Manager 2010 Lite for MySQL 4.6.0.5
# ---------------------------------------
# Host     : db.cs.umss.edu.bo
# Port     : 3306
# Database : hosting


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

/*DROP DATABASE IF EXISTS `hosting`;

CREATE DATABASE `hosting`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `hosting`;
*/
#
# Structure for the `ftp_groups` table : 
#

DROP TABLE IF EXISTS `ftp_groups`;

CREATE TABLE `ftp_groups` (
  `groupname` varchar(16) NOT NULL default '',
  `gid` smallint(6) NOT NULL default '5500',
  `members` varchar(16) NOT NULL default '',
  `description` varchar(255) default NULL,
  PRIMARY KEY  (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='ProFTP group table';

#
# Structure for the `ftp_quota_limits` table : 
#

DROP TABLE IF EXISTS `ftp_quota_limits`;

CREATE TABLE `ftp_quota_limits` (
  `id` int(11) NOT NULL auto_increment,
  `ftp_user_id` int(11) default NULL,
  `name` varchar(30) NOT NULL default '',
  `quota_type` enum('user','group','class','all') NOT NULL default 'user',
  `per_session` enum('false','true') NOT NULL default 'false',
  `limit_type` enum('soft','hard') NOT NULL default 'soft',
  `bytes_in_avail` int(10) unsigned NOT NULL default '104857600',
  `bytes_out_avail` int(10) unsigned NOT NULL default '0',
  `bytes_xfer_avail` int(10) unsigned NOT NULL default '0',
  `files_in_avail` int(10) unsigned NOT NULL default '0',
  `files_out_avail` int(10) unsigned NOT NULL default '0',
  `files_xfer_avail` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Structure for the `ftp_quota_tallies` table : 
#

DROP TABLE IF EXISTS `ftp_quota_tallies`;

CREATE TABLE `ftp_quota_tallies` (
  `name` varchar(30) NOT NULL default '',
  `quota_type` enum('user','group','class','all') NOT NULL default 'user',
  `bytes_in_used` int(10) unsigned NOT NULL default '0',
  `bytes_out_used` int(10) unsigned NOT NULL default '0',
  `bytes_xfer_used` int(10) unsigned NOT NULL default '0',
  `files_in_used` int(10) unsigned NOT NULL default '0',
  `files_out_used` int(10) unsigned NOT NULL default '0',
  `files_xfer_used` int(10) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for the `ftp_users` table : 
#

DROP TABLE IF EXISTS `ftp_users`;

CREATE TABLE `ftp_users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` varchar(32) NOT NULL default '',
  `passwd` varchar(32) NOT NULL default '',
  `uid` smallint(6) NOT NULL default '2000',
  `gid` smallint(6) NOT NULL default '2000',
  `homedir` varchar(255) NOT NULL default '/srv/empty',
  `shell` varchar(16) NOT NULL default '/sbin/nologin',
  `count` int(11) NOT NULL default '0',
  `accessed` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `name` varchar(255) default NULL,
  `email` varchar(50) default NULL,
  `expired` date default NULL,
  `status` enum('expired','enable','disable','quota_exeded') default 'enable',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 COMMENT='ProFTP user table';

#
# Structure for the `user_access` table : 
#

DROP TABLE IF EXISTS `user_access`;

CREATE TABLE `user_access` (
  `user` varchar(32) NOT NULL,
  `host` varchar(50) NOT NULL,
  `date` timestamp NULL default '0000-00-00 00:00:00',
  `action` enum('access','quit') default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for the `user_activities` table : 
#

DROP TABLE IF EXISTS `user_activities`;

CREATE TABLE `user_activities` (
  `user` varchar(32) default NULL,
  `host` varchar(20) default NULL,
  `date` timestamp NULL default '0000-00-00 00:00:00',
  `detail_activity` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for the `ftp_groups` table  (LIMIT 0,500)
#

INSERT INTO `ftp_groups` (`groupname`, `gid`, `members`, `description`) VALUES 
  ('hosting',2000,'hosting','Grupo para las cuentas del servidor de Hosting');
COMMIT;

#
# Data for the `ftp_quota_limits` table  (LIMIT 0,500)
#

INSERT INTO `ftp_quota_limits` (`id`, `ftp_user_id`, `name`, `quota_type`, `per_session`, `limit_type`, `bytes_in_avail`, `bytes_out_avail`, `bytes_xfer_avail`, `files_in_avail`, `files_out_avail`, `files_xfer_avail`) VALUES 
  (1,4,'cursos','user','false','hard',0,0,0,0,0,0),
  (2,3,'apoyoadm','user','false','hard',104857600,0,0,0,0,0),
  (3,1,'inventarios','user','false','hard',104857600,0,0,0,0,0),
  (4,2,'ccbol','user','false','hard',104857600,0,0,0,0,0),
  (5,10,'hustariz','user','false','hard',104857600,0,0,0,0,0),
  (6,11,'rayoroa','user','false','hard',209715200,0,0,0,0,0),
  (7,12,'glpi','user','false','hard',104857600,0,0,0,0,0),
  (8,15,'dotproject','user','false','hard',209715200,0,0,0,0,0),
  (9,26,'pruebas ','user','false','hard',104857600,0,0,0,0,0);
COMMIT;

#
# Data for the `ftp_quota_tallies` table  (LIMIT 0,500)
#

INSERT INTO `ftp_quota_tallies` (`name`, `quota_type`, `bytes_in_used`, `bytes_out_used`, `bytes_xfer_used`, `files_in_used`, `files_out_used`, `files_xfer_used`) VALUES 
  ('sca','user',0,0,0,0,0,0),
  ('apoyoadm','user',16641337,0,0,0,0,0),
  ('inventarios','user',34417474,0,0,0,0,0),
  ('ccbol','user',99373601,0,0,0,0,0),
  ('hustariz','user',4096,0,0,0,0,0),
  ('cursos','user',0,0,0,0,0,0),
  ('rayoroa','user',4096,0,0,0,0,0),
  ('glpi','user',7656329,0,0,0,0,0),
  ('dotproject','user',13166996,0,0,0,0,0);
COMMIT;

#
# Data for the `ftp_users` table  (LIMIT 0,500)
#

INSERT INTO `ftp_users` (`id`, `userid`, `passwd`, `uid`, `gid`, `homedir`, `shell`, `count`, `accessed`, `modified`, `name`, `email`, `expired`, `status`) VALUES 
  (1,'inventarios','qB95Z7ttsSaM2',2000,2000,'/srv/inventarios.cs.umss.edu.bo','/sbin/nologin',14,'2011-07-09 11:10:43','2011-07-09 11:04:43','Sistema de Registro de Equipos de Computo','admcomputo@cs.umss.edu.bo','2011-12-31','enable'),
  (2,'ccbol','X5m3162LsLR/A',2000,2000,'/srv/ccbol.cs.umss.edu.bo','/sbin/nologin',89,'2011-08-17 16:44:48','2011-08-17 16:35:06','Página Oficial de la CCBOL-2011 Cochabamba','ccbol@cs.umss.edu.bo','2011-12-31','enable'),
  (3,'apoyoadm','pfyX2imivqn3Y',2000,2000,'/srv/apoyoadm.cs.umss.edu.bo','/sbin/nologin',27,'2011-07-19 12:23:39','2011-07-19 12:24:24','Página de Actualizacions del Sistema de Apoyo Administrativo','admcomputo@cs.umss.edu.bo','2011-12-31','enable'),
  (4,'cursos','j1U7DTGXsSlys',2000,2000,'/srv/cursos.cs.umss.edu.bo','/sbin/nologin',6,'2011-07-16 10:22:41','2011-07-12 06:56:47','Plataforma de Claroline del Laboratorio de Informatica Sistemas','ecaceres@cs.umss.edu.bo','2011-12-31','enable'),
  (10,'hustariz','MYM9YDnDeEKR6',2000,2000,'/srv/hustariz.cs.umss.edu.bo','/sbin/nologin',6,'2011-07-09 11:10:37','2011-07-09 11:04:31','Página personal del Lic. Hernan Hustariz','hustariz@cs.umss.edu.bo','2011-07-09','enable'),
  (11,'rayoroa','elhk6GfDRtb7E',2000,2000,'/srv/rayoroa.cs.umss.edu.bo','/sbin/nologin',2,'2011-07-09 11:10:51','2011-07-09 10:57:58','Pagina personal del Lic. Richard Ayoroa','rayoroa@cs.umss.edu.bo','2011-07-09','enable'),
  (15,'dotproject','Y9wrsQAL65UGQ',2000,2000,'/srv/dotproject.cs.umss.edu.bo','/sbin/nologin',4,'2011-07-22 12:42:00','2011-07-21 17:12:55','Cuenta de Desarrollo proyecto Dotproyect','dotproject@cs.umss.edu.bo','2011-07-21','enable'),
  (26,'pruebas','OyEKBOkiikrtU',2000,2000,'/srv/pruebas.cs.umss.edu.bo','/sbin/nologin',1,'2011-07-23 13:52:53','2011-07-23 13:41:45','Cuenta para pruebas','admcomputo@cs.umss.edu.bo','2012-07-23','enable');
COMMIT;

#
# Data for the `user_access` table  (LIMIT 0,500)
#

INSERT INTO `user_access` (`user`, `host`, `date`, `action`) VALUES 
  ('ccbol','::ffff:192.168.2.21','2011-08-10 13:51:52','quit'),
  ('ccbol','::ffff:192.168.2.21','2011-08-10 12:15:02','access'),
  ('ccbol','::ffff:192.168.2.21','2011-08-10 12:17:52','access'),
  ('ccbol','::ffff:192.168.2.21','2011-08-10 12:43:07','access'),
  ('ccbol','::ffff:192.168.2.21','2011-08-10 12:58:11','access'),
  ('ccbol','::ffff:192.168.2.21','2011-08-10 13:49:24','access'),
  ('ccbol','::ffff:192.168.2.21','2011-08-10 13:52:09','access'),
  ('ccbol','::ffff:192.168.2.21','2011-08-10 13:52:15','quit'),
  ('ccbol','::ffff:192.168.2.21','2011-08-10 13:52:57','access'),
  ('ccbol','::ffff:192.168.2.21','2011-08-10 13:56:57','quit'),
  ('ccbol','::ffff:167.157.26.101','2011-08-10 16:41:15','access'),
  ('ccbol','::ffff:167.157.26.101','2011-08-10 16:41:16','access'),
  ('ccbol','::ffff:192.168.2.41','2011-08-12 09:19:53','access'),
  ('ccbol','::ffff:192.168.2.41','2011-08-15 16:46:46','access'),
  ('ccbol','::ffff:192.168.2.41','2011-08-15 17:05:58','quit'),
  ('ccbol','::ffff:192.168.2.48','2011-08-15 17:06:19','access'),
  ('ccbol','::ffff:192.168.2.48','2011-08-15 17:07:29','access'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 15:15:49','access'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 15:16:09','quit'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 16:34:50','access'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 16:36:37','quit'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 16:37:59','access'),
  ('ccbol','::ffff:192.168.2.48','2011-08-17 16:38:29','access'),
  ('ccbol','::ffff:192.168.2.48','2011-08-17 16:44:48','access'),
  ('nobody','::ffff:192.168.2.21','2011-08-20 11:32:16','quit');
COMMIT;

#
# Data for the `user_activities` table  (LIMIT 0,500)
#

INSERT INTO `user_activities` (`user`, `host`, `date`, `detail_activity`) VALUES 
  ('ccbol','::ffff:192.168.2.21','2011-08-10 13:49:57','download file  /srv/ccbol.cs.umss.edu.bo/ccbol-2011-05-03.sql in , file  size 72 bytes'),
  ('ccbol','::ffff:192.168.2.21','2011-08-10 13:50:57','delete file /srv/ccbol.cs.umss.edu.bo/ccbol-2011-05-03.sql in , file  size 72 bytes'),
  ('ccbol','::ffff:192.168.2.21','2011-08-10 13:51:36','upload file  /srv/ccbol.cs.umss.edu.bo/ccbol-2011-05-03.sql in , file  size 72 bytes'),
  ('ccbol','::ffff:192.168.2.21','2011-08-10 13:53:38','download file  /srv/ccbol.cs.umss.edu.bo/ccbol-2011-05-03.sql in , file  size 72 bytes'),
  ('ccbol','::ffff:192.168.2.21','2011-08-10 13:55:06','download file  /srv/ccbol.cs.umss.edu.bo/resguardo-ccbol-2011-05-03-RLO-05-25.sql in , file  size 4716281 bytes'),
  ('ccbol','::ffff:192.168.2.21','2011-08-10 13:56:01','download file  /srv/ccbol.cs.umss.edu.bo/resguardo-ccbol-2011-05-03-RLO-05-25.sql in , file  size 4716281 bytes'),
  ('ccbol','::ffff:192.168.2.21','2011-08-10 13:56:29','delete file /srv/ccbol.cs.umss.edu.bo/resguardo-ccbol-2011-05-03-RLO-05-25.sql in , file  size 4716281 bytes'),
  ('ccbol','::ffff:192.168.2.21','2011-08-10 13:56:33','upload file  /srv/ccbol.cs.umss.edu.bo/resguardo-ccbol-2011-05-03-RLO-05-25.sql in , file  size 4716281 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','change dir to /modules, current dir is /modules'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','change dir to /, current dir is /'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/backup_migrate.module in , file  size 36723 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/README.txt in , file  size 3830 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/LICENSE.txt in , file  size 14940 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/backup_migrate.install in , file  size 13448 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/backup_migrate.js in , file  size 2623 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/destinations.email.inc in , file  size 4914 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/backup_migrate.drush.inc in , file  size 9253 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/schedules.inc in , file  size 13187 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/filters.utils.inc in , file  size 6389 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/destinations.inc in , file  size 35889 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/filters.statusnotify.inc in , file  size 3301 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/filters.compression.inc in , file  size 7446 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/files.inc in , file  size 10750 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/db.inc in , file  size 4902 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/destinations.s3.inc in , file  size 5038 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/destinations.db.mysql.inc in , file  size 9770 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/destinations.db.inc in , file  size 9719 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/crud.inc in , file  size 18471 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/filters.encryption.inc in , file  size 5068 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/profiles.inc in , file  size 8872 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/filters.backup_restore.inc in , file  size 5339 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/filters.inc in , file  size 7421 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/destinations.file.inc in , file  size 9609 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/destinations.browser.inc in , file  size 1770 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/destinations.ftp.inc in , file  size 12347 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/includes/db.mysql.inc in , file  size 4733 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/backup_migrate.info in , file  size 448 bytes'),
  ('ccbol','::ffff:167.157.26.10','2011-08-10 16:41:16','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/backup_migrate/backup_migrate.css in , file  size 543 bytes'),
  ('ccbol','::ffff:192.168.2.41','2011-08-12 09:19:58','change dir to public_html, current dir is public_html'),
  ('ccbol','::ffff:192.168.2.41','2011-08-12 09:20:00','change dir to sites, current dir is sites'),
  ('ccbol','::ffff:192.168.2.41','2011-08-12 09:20:01','change dir to all, current dir is all'),
  ('ccbol','::ffff:192.168.2.41','2011-08-12 09:20:02','change dir to modules, current dir is modules'),
  ('ccbol','::ffff:192.168.2.41','2011-08-12 09:20:04','change dir to credenciales, current dir is credenciales'),
  ('ccbol','::ffff:192.168.2.41','2011-08-12 09:20:05','change dir to includes, current dir is includes'),
  ('ccbol','::ffff:192.168.2.41','2011-08-12 09:20:10','download file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/credenciales/includes/lista_usuarios.inc in , file  size 4023 bytes'),
  ('ccbol','::ffff:192.168.2.41','2011-08-12 09:20:29','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/credenciales/includes/lista_usuarios.inc in , file  size 4023 bytes'),
  ('ccbol','::ffff:192.168.2.41','2011-08-12 09:22:12','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/credenciales/includes/lista_usuarios.inc in , file  size 4025 bytes'),
  ('ccbol','::ffff:192.168.2.41','2011-08-15 16:46:48','change dir to public_html, current dir is public_html'),
  ('ccbol','::ffff:192.168.2.41','2011-08-15 16:46:50','change dir to sites, current dir is sites'),
  ('ccbol','::ffff:192.168.2.41','2011-08-15 16:46:51','change dir to all, current dir is all'),
  ('ccbol','::ffff:192.168.2.41','2011-08-15 16:46:52','change dir to modules, current dir is modules'),
  ('ccbol','::ffff:192.168.2.41','2011-08-15 16:46:57','change dir to credenciales, current dir is credenciales'),
  ('ccbol','::ffff:192.168.2.41','2011-08-15 16:46:59','change dir to includes, current dir is includes'),
  ('ccbol','::ffff:192.168.2.41','2011-08-15 16:47:07','download file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/credenciales/includes/lista_usuarios.inc in , file  size 4025 bytes'),
  ('ccbol','::ffff:192.168.2.41','2011-08-15 16:47:12','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/credenciales/includes/lista_usuarios.inc in , file  size 7177 bytes'),
  ('ccbol','::ffff:192.168.2.41','2011-08-15 16:48:19','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/credenciales/includes/lista_usuarios.inc in , file  size 7179 bytes'),
  ('ccbol','::ffff:192.168.2.41','2011-08-15 16:49:53','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/credenciales/includes/lista_usuarios.inc in , file  size 7183 bytes'),
  ('ccbol','::ffff:192.168.2.41','2011-08-15 16:51:23','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/credenciales/includes/lista_usuarios.inc in , file  size 7185 bytes'),
  ('ccbol','::ffff:192.168.2.41','2011-08-15 17:00:58','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/credenciales/includes/certificados.inc in , file  size 1354 bytes'),
  ('ccbol','::ffff:192.168.2.41','2011-08-15 17:01:01','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/credenciales/includes/credenciales.inc in , file  size 4938 bytes'),
  ('ccbol','::ffff:192.168.2.41','2011-08-15 17:01:05','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/credenciales/includes/lista_usuarios.inc in , file  size 7430 bytes'),
  ('ccbol','::ffff:192.168.2.48','2011-08-15 17:06:24','change dir to public_html, current dir is public_html'),
  ('ccbol','::ffff:192.168.2.48','2011-08-15 17:06:30','change dir to sites, current dir is sites'),
  ('ccbol','::ffff:192.168.2.48','2011-08-15 17:06:32','change dir to all, current dir is all'),
  ('ccbol','::ffff:192.168.2.48','2011-08-15 17:06:33','change dir to modules, current dir is modules'),
  ('ccbol','::ffff:192.168.2.48','2011-08-15 17:06:38','change dir to credenciales, current dir is credenciales'),
  ('ccbol','::ffff:192.168.2.48','2011-08-15 17:06:41','change dir to includes, current dir is includes'),
  ('ccbol','::ffff:192.168.2.48','2011-08-15 17:07:29','change dir to /includes, current dir is /includes'),
  ('ccbol','::ffff:192.168.2.48','2011-08-15 17:07:36','download file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/credenciales/includes/lista_usuarios.inc in , file  size 7430 bytes'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 15:15:51','change dir to public_html, current dir is public_html'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 15:15:53','change dir to sites, current dir is sites'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 15:15:54','change dir to all, current dir is all'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 15:15:56','change dir to modules, current dir is modules'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 15:15:58','change dir to credenciales, current dir is credenciales'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 15:15:59','change dir to includes, current dir is includes'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 15:16:06','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/credenciales/includes/lista_usuarios.inc in , file  size 7512 bytes'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 16:34:52','change dir to public_html, current dir is public_html'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 16:34:53','change dir to sites, current dir is sites'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 16:34:54','change dir to all, current dir is all'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 16:34:55','change dir to modules, current dir is modules'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 16:34:57','change dir to credenciales, current dir is credenciales'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 16:34:59','change dir to includes, current dir is includes'),
  ('ccbol','::ffff:192.168.2.41','2011-08-17 16:35:06','upload file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/credenciales/includes/lista_usuarios.inc in , file  size 7542 bytes'),
  ('ccbol','::ffff:192.168.2.48','2011-08-17 16:44:11','change dir to public_html, current dir is public_html'),
  ('ccbol','::ffff:192.168.2.48','2011-08-17 16:44:15','change dir to sites, current dir is sites'),
  ('ccbol','::ffff:192.168.2.48','2011-08-17 16:44:17','change dir to all, current dir is all'),
  ('ccbol','::ffff:192.168.2.48','2011-08-17 16:44:19','change dir to modules, current dir is modules'),
  ('ccbol','::ffff:192.168.2.48','2011-08-17 16:44:21','change dir to credenciales, current dir is credenciales'),
  ('ccbol','::ffff:192.168.2.48','2011-08-17 16:44:23','change dir to includes, current dir is includes'),
  ('ccbol','::ffff:192.168.2.48','2011-08-17 16:44:48','change dir to /includes, current dir is /includes'),
  ('ccbol','::ffff:192.168.2.48','2011-08-17 16:44:51','download file  /srv/ccbol.cs.umss.edu.bo/public_html/sites/all/modules/credenciales/includes/lista_usuarios.inc in , file  size 7542 bytes');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;